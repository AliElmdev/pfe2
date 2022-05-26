<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;

class RolePermissionEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexroleuser()
    {
        $roles = Role::all();
        $users = User::all();
        return View('admin.AddRoleUser')->with(array('users'=>$users,'roles'=>$roles));
    }

    public function indexrolepermission(){
        $roles = Role::all(); 
        $permissions = Permission::all();
        return View('admin.AddRolePermission')->with(array('roles'=>$roles,'permissions'=>$permissions));  
    }
    
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return View('admin.RolePermission')->with(array('users'=>$users,'roles'=>$roles));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeroleuser(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->users()->detach($request->users);
        foreach($request->users as $user_id){
            $user = config('roles.models.defaultUser')::find($user_id);
            $user->detachAllRoles();
        }
        $role->users()->attach($request->users);
        return redirect()->route('RolePermissionEdit');
    }

    public function storerolepermission(Request $request)
    {
        $role_id = $request->role_id;
        $role = config('roles.models.role')::find($role_id);
        $role->detachAllPermissions();
        $role->attachPermission($request->permissions);//add list permissions
        return redirect()->route('RolePermissionEdit');     
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
