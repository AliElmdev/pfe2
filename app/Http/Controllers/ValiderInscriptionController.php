<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ValiderInscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprise_id = 3;
        $entreprise = Entreprise::where('user_id','=',$entreprise_id)->first();
        $user = User::where('id','=',$entreprise_id)->first();
        Mail::to('alielmakhroubi00@gmail.com')->send(new TestMail($entreprise,$user));
        return view("entreprise.valider_inscrip");
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
        //
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
    public function edit($id,$valider)
    {
        $entreprise = Entreprise::where('id','=',$id)->first();
        $user = $entreprise->user();
        if(isset($entreprise) && $entreprise->confirm == 0){
            $entreprise->confirm = 1;
            $entreprise->save();
            Mail::to($user->email)->send(new TestMail($entreprise,$user));
        }
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
