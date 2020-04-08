<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use DB;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Role";
        $roles = Role::all();
        return view('admin.role.index', compact('roles', 'page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Role";
        $permission = Permission::pluck('name', 'id');
        return view('admin.role.create', compact('permission', 'page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'permission' => 'required|array',
            'permission.*' => 'required|string'   
   
        ],[
            'name.required' => "Name field is required",
            'permission.required' => "You must select Permissions",
            'permission.*.required' => "You must Select a permission"

        ]);
    
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
        foreach ($request->permission as $value) {
            $role->attachPermission($value);
        }
        
        Session::flash('success', 'Successfully Role Create');
        return redirect()->route('role.index');
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
        //dd($id);
        $page_name = 'Role Edit';
        $role = Role::find($id);
        $permission = Permission::pluck('name','id');
        $selectedPermission = DB::table('permission_role')->where('permission_role.role_id',$id)->pluck('permission_id')->toArray();
        return view('admin.role.edit',compact('page_name','permission','selectedPermission','role'));
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
        $this->validate($request,[
            'name' => 'required',
            'permission' => 'required|array',
            'permission.*' => 'required'   
   
        ],[
            'name.required' => "Name field is required",
            'permission.required' => "You must select Permissions",
            'permission.*.required' => "You must Select a permission"

        ]);
    
        $role = Role::find($id);
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        DB::table('permission_role')->where('role_id',$id)->delete();
        foreach ($request->permission as $value) {
            $role->attachPermission($value);
        }

        Session::flash('success', 'Successfully Role Edit');

        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::where('id',$id)->delete();

        Session::flash('success', 'Successfully Role Delete');
        return redirect()->route('role.index');
    }
}
