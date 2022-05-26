<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestionMarchesEntreprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tousmarches',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->get(),
        ]);
    }

    public function current()
    {
        return view('admin.marchesEnCours',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->whereBetween('marches.etat',[1,7])
                ->get(),
        ]);
    }


    public function closed()
    {
        return view('admin.marchesFermee',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->where('marches.etat',0)
                ->get(),
        ]);
    }

    public function ended()
    {
        return view('admin.marchesTermines',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
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
