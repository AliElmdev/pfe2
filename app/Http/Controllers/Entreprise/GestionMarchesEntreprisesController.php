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
        $id_entreprise = DB::table('entreprise_users')->where('user_id',auth()->user()->id)->first('entreprise_id');
        return view('Entreprise.tousmarches',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->join('postulations', 'postulations.marche_id', '=', 'marches.id')
                ->where('postulations.entreprise_id',$id_entreprise->entreprise_id)
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->get(),
        ]); 
    }

    public function rfi()
    {
        $id_entreprise = DB::table('entreprise_users')->where('user_id',auth()->user()->id)->first('entreprise_id');
        return view('entreprise.marchesEnCoursRfi',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->join('postulations', 'postulations.marche_id', '=', 'marches.id')
                ->where('postulations.entreprise_id',$id_entreprise->entreprise_id)
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->where('marches.etat',5)
                ->get(),
        ]);
    }

    public function rfq()
    {
        $id_entreprise = DB::table('entreprise_users')->where('user_id',auth()->user()->id)->first('entreprise_id');
        return view('entreprise.marchesEnCoursRfq',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->join('postulations', 'postulations.marche_id', '=', 'marches.id')
                ->where('postulations.entreprise_id',$id_entreprise->entreprise_id )
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->whereBetween('marches.etat',[6,7])
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
