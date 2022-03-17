<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Domaine;
use App\Models\EtatMarche;
use App\Models\Marche;
use App\Models\Produit;
use App\Models\Reponse_commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $list_marches = Marche::join('categories', 'categories.id', 'marches.id_categorie')
            ->select('marches.*', 'categories.name as categories')
            ->get();
        $catg = Categorie::all()->keyBy('id');
        return view("Marches", compact(["list_categories", "list_domaines", "list_marches", 'catg']));
    }


    public function afficher()
    {
        $list_marches = DB::table('Marches')
            ->join('etat_marches', 'etat_marches.id', '=', 'Marches.etat')
            // ->join('postulations', 'postulations.marche_id', '=', 'marches.id')
            ->select(
                'marches.id as id',
                'marches.description as description',
                'marches.affichage_date as date_affichage',
                'marches.title as titre',
                'marches.etat as etat_num',
                'etat_marches.description as etat',
                'marches.limit_date as date'
            )
            ->groupBy('Marches.id')
            ->where('marches.id_chef', auth()->user()->id)
            ->get();

        $list_etat_marches = EtatMarche::all();
        return view('chef.marche_information', compact(['list_marches', 'list_etat_marches']));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
