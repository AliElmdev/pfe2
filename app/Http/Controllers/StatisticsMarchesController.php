<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Marche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsMarchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_chef($id)
    {
        $enCours =  Marche::where('id_chef',$id)
            ->whereBetween('etat',[1,2])
            ->count();
        $ferme =  Marche::where('id_chef',$id)
            ->whereBetween('etat',[3,5])
            ->count();
        $termine = Marche::where('id_chef',$id)
            ->where('etat',6)
            ->count();
        $all =  Marche::where('id_chef',$id)
        ->count();
        $data[] = ['enCours' => $enCours, 'ferme' => $ferme, 'termine' => $termine, 'all' => $all];
        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home_chef()
    {
        return  view('chef.statistics');
    }

    public function data_achat($id)
    {
        $enCours =  Marche::where('id_achat',$id)
            ->whereBetween('etat',[1,2])
            ->count();
        $ferme =  Marche::where('id_achat',$id)
            ->whereBetween('etat',[3,5])
            ->count();
        $termine = Marche::where('id_achat',$id)
            ->where('etat',6)
            ->count();
        $all =  Marche::where('id_achat',$id)
        ->count();
        $data[] = ['enCours' => $enCours, 'ferme' => $ferme, 'termine' => $termine, 'all' => $all];
        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home_achat()
    {
        return  view('achat.statistics');
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
