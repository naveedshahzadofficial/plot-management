<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       
        if ($request->ajax()) {
            
            $query = Role::latest();
         
            return Datatables::of($query)
            ->addIndexColumn()
            ->addColumn('name', function (Role $role) {
                return $role->name;
            })
            ->addColumn('action', function(Role $role){
                  $btn ='<a href="roles/'.$role->id.'/edit"" class="btn btn-icon btn-outline-success btn-circle btn-sm mr-2" title="Update">
                  <i class="flaticon2-edit"></i>
              </a>';



               $form="<a onclick='activate_inactive(this); return false;'
               href='roles/".$role->id."'
               class='btn btn-icon  btn-outline-danger btn-circle btn-sm mr-2' title='Delete'>
               	   <i class=' icon-xl fas fa-toggle-off'></i>	           
                      </a>";



                      
              $btn.=$form;
            return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
          
        }

      
        return view('roles.index');

   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('roles.create');
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
            'name' => 'required|unique:roles,name'
        ]);
    
        $role = Role::create(['name' => $request->input('name')]);
    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
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
        $role = Role::find($id);    
        return view('roles.edit',compact('role'));
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
            'name' => 'required'
                ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
     
        Role::find($id)->delete();
        
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }


}
