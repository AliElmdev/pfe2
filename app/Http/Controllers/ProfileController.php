<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile', [
            'user' => DB::table('users')
            ->join('profiles','users.id','=','profiles.user_id')
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->select('users.name AS nom','users.email','profiles.service_title','profiles.phone','roles.description AS role')
            ->where('users.id',$id)->first(),

            'marcheRFI' => DB::table('postulations')
            ->join('entreprise_users','entreprise_users.entreprise_id','=','postulations.entreprise_id')
            ->where('entreprise_users.user_id',Auth::user()->id)
            ->where('postulations.etat',3)
            ->count(),

            'marcheRFQ' => DB::table('postulations')
            ->join('entreprise_users','entreprise_users.entreprise_id','=','postulations.entreprise_id')
            ->where('entreprise_users.user_id',Auth::user()->id)
            ->whereBetween('postulations.etat',[4,5])
            ->count(),

            'marcheAllEntreprise' => DB::table('postulations')
            ->join('entreprise_users','entreprise_users.entreprise_id','=','postulations.entreprise_id')
            ->where('entreprise_users.user_id',Auth::user()->id)
            ->count(),

            'marchesEnCoursChef' => Marche::where('id_chef',$id)
            ->whereBetween('etat',[1,2])
            ->count(),

            'marchesEnCoursAchat' => Marche::where('id_achat',$id)
            ->whereBetween('etat',[1,2])
            ->count(),

            'marchesFermesChef' => Marche::where('id_chef',$id)
            ->whereBetween('etat',[3,5])
            ->count(),          
            
            'marchesFermesAchat' => Marche::where('id_achat',$id)
            ->whereBetween('etat',[3,5])
            ->count(), 

            'marchesTerminesChef' => Marche::where('id_chef',$id)
            ->where('etat',6)
            ->count(),   
            
            'marchesTerminesAchat' => Marche::where('id_achat',$id)
            ->where('etat',6)
            ->count(), 

            'marchesAllChef' => Marche::where('id_chef',$id)
            ->count(),  

            'marchesAllAchat' => Marche::where('id_achat',$id)
            ->count(), 
        ]);
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
        Profile::where('user_id',$id)
            ->update(['phone'=>$request->input('phone')]);
      
        return redirect(route('profile',['id' => $id]));
      
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
