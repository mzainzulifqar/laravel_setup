<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\Permission;

class RoleController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('permission:view-role',['only' => 'index']);
        $this->middleware('permission:create-role',['only' => ['store','create']]);
        $this->middleware('permission:update-role',['only' => ['edit','update']]);
        $this->middleware('permission:delete-role',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $permissions = Permission::all();
        return view('backend.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        $request->validate(['name' => 'required|unique:roles,name','permission' => 'required']);
        $permissions = permissions_filter($request->permission);

        $roles = Role::create(['name' => $request->name,'permissions' => $permissions]);

        if($roles)
        {
            return back()->with('success','Role has been added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('backend.roles.create',compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if($request->name == $role->name)
        {
            $validation = '';
        }
        else
        {
            $validation = 'required|unique:roles,name';
        }

        $request->validate(['name' => $validation,'permission' => 'required']);

        $role->name  = $request->name;
        $role->permissions = json_encode($request->permission);

        if($role->update())
        {
            return back()->with('success','Role has been updated');
        }
        else {
            return back()->with('warning','Please try again!!!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->delete())
        {
            return back()->with('success','Role has been deleted Successfully');
        }
        else
       {
            return back()->with('warning','Please try again!');
        }
    }
}
