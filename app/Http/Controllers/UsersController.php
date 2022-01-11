<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\SpecialEconomicZone;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendChangePasswordEmailJob;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('name', function (User $user) {
                return $user->name;
            })
            ->addColumn('email', function (User $user) {
                return $user->email;
            })
            ->addColumn('role', function (User $user) {
                return $user->roles()->pluck('name')->implode('');
            })
            ->addColumn('status', function (User $user) {
                return '<span class="label label-lg font-weight-bold label-inline '.($user->user_status?'label-light-success':'label-light-danger').'">'.($user->user_status?'Active':'Inactive').'</span>';
            })
            ->addColumn('action', function(User $user){
                $actionBtn ='<a href="'.route('users.edit',$user).'" class="btn btn-icon btn-outline-success btn-circle btn-xs mr-2" title="Update"> <i class="flaticon2-edit"></i> </a>';
                $actionBtn .='<a onclick="activate_inactive(this); return false;" href="'.route('users.destroy',$user).'" class="btn btn-icon btn-circle btn-xs mr-2 '.($user->user_status?'btn-outline-success':'btn-outline-danger').'" title="'.($user->user_status?'Deactivate':'Activate').'"> <i class="'.($user->user_status?'icon-xl fas fa-toggle-on':'icon-xl fas fa-toggle-off').'"></i> </a>';
            return $actionBtn;
            })
            ->rawColumns(['action','status'])
            ->make(true);

        }
        return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get(['id', 'name']);
        $specialEconomicZones = SpecialEconomicZone::where('status',1)->get();
     //  $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles', 'specialEconomicZones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('role_id'));

        return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = $user->roles->pluck('id')->toArray();
        $user->role_id = $roles[0]??null;
        $roles = Role::get(['id', 'name']);
        $specialEconomicZones = SpecialEconomicZone::where('status',1)->get();

        return view('users.edit', compact('user', 'roles', 'specialEconomicZones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }
        $user->update($input);
        $user->syncRoles($request->input('role_id'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->update(['user_status'=>!$user->user_status]);

        return redirect()
            ->route('users.index')
            ->with('success_message', 'User status has been changed successfully.');
    }

    public function profile(){
        $user = Auth::user();
        return view('users.profile',compact('user'));
    }


    public function profileUpdate(ProfileUpdateRequest $request){

        $validated = $request->validated();
        $userUpdate = [
            'name'          =>  $request->name,
            'mobile_no'    =>  $request->mobile_no,
            'cnic_no'      =>  $request->cnic_no
        ];

        if($request->hasFile('profile_avatar')){
            $filename = $request->profile_avatar->getClientOriginalName();
           $request->profile_avatar->storeAs('users',$filename,'public');
           if (auth()->user()->profile_file){
            Storage::delete('/public/users/'.auth()->user()->profile_file);
          }
            $userUpdate ['profile_file']= $filename;
        }else{
            $userUpdate ['profile_file']= $request->old_profile_avatar;
        }

        $user = User::findorfail(auth()->user()->id);
        $user->update($userUpdate);

         session()->flash(
            'status', 'Your profile has been successfully updated.'
        );
         return redirect()->route('profile');
    }


    public function changePassword(){
        return view('users.change_password');
    }

    public function passwordUpdate(ChangePasswordRequest $request){
     User::find(auth()->user()->id)->update(['password'=> Hash::make($request->password)]);
      $user = User::find(auth()->user()->id);
      $user->new_password=$request->password;

      dispatch(new SendChangePasswordEmailJob($user->toArray()));


        return redirect()->back()->with('success','Password has been change successfully.');
    }

}
