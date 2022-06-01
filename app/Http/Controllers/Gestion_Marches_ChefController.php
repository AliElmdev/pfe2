<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Gestion_Marches_ChefController extends Controller
{
    /**
     * Tous les marchés du chef
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_chef)
    {
        return view('chef.tousmarches',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->where('marches.id_chef',$id_chef)
                ->get(),
        ]);
    }

    /**
     * Afficher les marchés en cours
     *
     * @return \Illuminate\Http\Response
     */
    public function current($id_chef)
    {
        return view('chef.marchesEnCours',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->where('marches.id_chef',$id_chef)
                ->whereBetween('marches.etat',[1,7])
                ->get(),
        ]);
    }

    /**
     * Afficher les marchés fermés
     *
     * @return \Illuminate\Http\Response
     */
    public function closed($id_chef)
    {
        return view('chef.marchesFermee',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->where('marches.id_chef',$id_chef)
                ->where('marches.etat',0)
                ->get(),
        ]);
    }
/**
     * Afficher les marchés terminés
     *
     * @return \Illuminate\Http\Response
     */
    public function ended($id_chef)
    {
        return view('chef.marchesTermines',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->where('marches.id_chef',$id_chef)
                ->where('marches.etat',8)
                ->get(),
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
