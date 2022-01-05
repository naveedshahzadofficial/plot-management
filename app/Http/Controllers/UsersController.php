<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use DataTables;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendChangePasswordEmailJob;

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
            
            $query = User::whereHas('roles',function($query){
                $query->where('name', '!=' ,'Admin');
               });
         
            return Datatables::of($query)
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
                if($user->user_status=='Active'){
                    $title='Active';
                    $class='label-light-success';
                }else{
                    $title='Inactive';
                    $class=' label-light-danger';
                }
                  $form="<span class='label label-lg font-weight-bold ".$class." label-inline'>$title</span>";
                
                  return $form;
                   
            })
            ->addColumn('action', function(User $user){

                
                if($user->user_status=='Active'){
                    $title='Activate';
                    $class='icon-xl fas fa-toggle-on';
                    $color='btn-outline-success';
                   }else{
                    $title='Deactivate';
                    $class=' icon-xl fas fa-toggle-off';
                    $color="btn-outline-danger";
                   }
             
                   
                  $btn ='<a href="users/'.$user->id.'/edit"" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update">
                  <i class="flaticon2-edit"></i>
              </a>';

            
               $form="<a onclick='activate_inactive(this); return false;'
               href='users/".$user->id."'
               class='btn btn-icon ".$color." btn-circle btn-sm mr-2' title='".$title."'>
               	   <i class=' ".$class."'></i>	           
                      </a>";
              $btn.=$form;
            return $btn;
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
     //  $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'cnic_no' => 'required|unique:users,cnic_no',
            'password' => 'required|same:password_confirmation',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(['id', 'name']);
        $userRoles = $user->roles->pluck('id')->toArray();

        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:password_confirmation',
            'roles' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
      
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user=User::find($id);

        $ststus=$user->user_status;
       if($ststus=='Active'){
           $data['user_status']='Inactive';
     
       }else{
        $data['user_status']='Active';
       }
       $user->update($data);

        return redirect()->route('users.index')->with('success','User deleted successfully');
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
           if (auth()->user()->avatar){
            Storage::delete('/public/users/'.auth()->user()->avatar);
          }
            $userUpdate ['avatar']= $filename;
        }else{
            $userUpdate ['avatar']= $request->old_profile_avatar;
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
