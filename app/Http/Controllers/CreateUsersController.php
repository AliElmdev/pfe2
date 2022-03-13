<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\DepartementUser;
use App\Models\User;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;

class CreateUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $departements = Departement::all();
        return view('admin.createusers', compact(["roles","departements"]));
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
    public function store(Request $request)
    {
        $user = new User([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request[str_random(8)]),
        ]);
        $user->save();
        $role = config('roles.models.role')::where('name', '=', $request['user_role'])->first();  //choose the default role upon user creation.
        $user->attachRole($role); 
        if($request['user_role'] == 'chef'){
            $attache_departement = new DepartementUser();
            $attache_departement->departement_id = $request['departement'];
            $attache_departement->user_id = $user->id;
            $attache_departement->save();
        }
        return redirect(route('create_user'));
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
