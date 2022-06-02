<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Domaine;
use App\Models\Marche;
use App\Models\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_categories = Categorie::all();
        $list_domaines = Domaine::all();
        $list_marches = Marche::where('etat',3)->get();
        $catg = Categorie::all()->keyBy('id');
        return view("Marches", compact(["list_categories", "list_domaines", "list_marches","catg"]));
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
        // $marche = Marche::where('id',$id)->first();
        // return view("chef.marchesuivie", compact(["marche"]));

        if (Auth::user()->hasRole('chef')){
            $marche = Marche::where('id',$id)->first();
            return view('chef.marchesuivie',[
                "marche" => Marche::find($id),
                "nbrRFI" => Postulation::where('marche_id',$id)->where('etat','>=',2)->orWhere('etat_old','>=',2)->count(), // Nombre des entreprises dans l'etape de RFI
                "nbrTechnique" => Postulation::where('marche_id',$id)->where('etat','>=',3)->orWhere('etat_old','>=',3)->count(), // Nombre des entreprises dans l'etape de technique
                "nbrCommerciale" => Postulation::where('marche_id',$id)->where('etat','>=',4)->orWhere('etat_old','>=',4)->count(), // Nombre des entreprises dans l'etape de commerciale
                "entreprisegagnant" => Postulation::where('marche_id',$id)->where('etat','>=',5)->orWhere('etat_old','>=',5)->count(), // Nombre des entreprises dans l'etape de commerciale
            ]);
        }else if(Auth::user()->hasRole('achat')){
            $marche = Marche::where('id',$id)->first();
            return view('achat.marchesuivie',[
                "marche" => Marche::find($id),
                "nbrRFI" => Postulation::where('marche_id',$id)->where('etat','>=',2)->orWhere('etat_old','>=',2)->count(), // Nombre des entreprises dans l'etape de RFI
                "nbrTechnique" => Postulation::where('marche_id',$id)->where('etat','>=',3)->orWhere('etat_old','>=',3)->count(), // Nombre des entreprises dans l'etape de technique
                "nbrCommerciale" => Postulation::where('marche_id',$id)->where('etat','>=',4)->orWhere('etat_old','>=',4)->count(), // Nombre des entreprises dans l'etape de commerciale
                "entreprisegagnant" => Postulation::where('marche_id',$id)->where('etat','>=',5)->orWhere('etat_old','>=',5)->count(), // Nombre des entreprises dans l'etape de commerciale
            ]);
        }
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
