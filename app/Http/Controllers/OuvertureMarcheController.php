<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OuvertureMarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $marche = Marche::where('id',$id)->first();
        if($marche->etat < 5){
            $marche->etat = 5;
            $marche->save();
        }
        return view('selection.ouverture_marche',[
            "marche" => Marche::find($id),
            "nbrRFI" => Postulation::where('marche_id',$id)->where('etat',2)->count(), // Nombre des entreprises dans l'etape de RFI
            "nbrTechnique" => Postulation::where('marche_id',$id)->where('etat',3)->count(), // Nombre des entreprises dans l'etape de technique
            "nbrCommerciale" => Postulation::where('marche_id',$id)->where('etat',4)->count(), // Nombre des entreprises dans l'etape de commerciale
        ]);
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
