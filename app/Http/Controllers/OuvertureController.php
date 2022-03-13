<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marche;
use App\Models\Postulation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OuvertureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Marches = DB::table('marches')->join('etat_marches', 'etat_marches.id', '=', 'etat')
        ->select('marches.id as id','title','marches.description as description','etat_marches.description as etat','etat_marches.id as etat_id','limit_date')                   
        ->get();
        $currentTime = Carbon::now();
        $nbr_postulations = [];
        $postulations = Postulation::select('marche_id',DB::raw('COUNT(marche_id) as nbr_postulations'))->groupby('marche_id')->get();
        foreach($postulations as $postulation){
            $nbr_postulations[$postulation->marche_id] = $postulation->nbr_postulations;
        }
        return view('selection.Ouverture', compact(["Marches","currentTime","nbr_postulations"]));
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
