<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GestionMarchesEntreprisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function refuser()
    {
        $user = Auth::user();
        return view('entreprise.marchesRefuser',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('postulations','marches.id','=','postulations.marche_id')
                ->where('postulations.user_id',$user->id)
                ->where('postulations.etat',0)
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine','postulations.etat as post_etat')
                ->get(),
        ]);
    }

    public function tous()
    {
        $user = Auth::user();
        return view('entreprise.tousmarches',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine')
                ->join('postulations','marches.id','=','postulations.marche_id')
                ->where('postulations.user_id',$user->id)
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine','postulations.etat as post_etat')
                ->get(),
        ]);
    }


    public function rfi()
    {
        $user = Auth::user();
        return view('entreprise.marchesRfi',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->join('postulations','marches.id','=','postulations.marche_id')
                ->where('postulations.user_id',$user->id)
                ->where('postulations.etat',2)
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine','postulations.etat as post_etat')
                ->get(),
        ]);
    }

    public function rfq()
    {
        $user = Auth::user();
        return view('entreprise.marchesRfq',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->join('postulations','marches.id','=','postulations.marche_id')
                ->where('postulations.user_id',$user->id)
                ->whereBetween('postulations.etat',[3,4])
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine','postulations.etat as post_etat')
                ->get(),
        ]);
    }

    public function gagner()
    {
        $user = Auth::user();
        return view('entreprise.marchesGagner',[
            'marches' => DB::table('marches')
                ->join('categories','marches.id_categorie','=','categories.id')
                ->join('domaines','categories.id_domaine','=','domaines.id')
                ->join('postulations','marches.id','=','postulations.marche_id')
                ->where('postulations.user_id',$user->id)
                ->where('postulations.etat',5)
                ->select('marches.*','categories.name AS categorie','domaines.name AS domaine','postulations.etat as post_etat')
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
