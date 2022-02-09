<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\Postulation;
use App\Models\Reponse_commercial;
use App\Models\Reponse_question;
use Illuminate\Http\Request;

class SelectionCommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $postulations = Postulation ::where('marche_id',$id)->get();
        //dd($postulations);
        // $array = array();
        // foreach ($postulations as $value) {
        //     array_push($array , [$value->user_id=>$value->marche_id]);
        // }
        // foreach ($array as $key => $value) {
        //     print("hena : ");
        //     print_r($value);
        // }
        $entreprises = [];
        $reponses_commercials = [];
        foreach ($postulations as $postulation) {
            // $entreprises = Entreprise ::where('user_id',$postulation->user_id)->get();
            // $reponses_commercials = Reponse_commercial ::where('reponses_commercial_id',$postulation->commercials_id)->get();
            // dd($reponses_commercials[0]->produit_id);
            
            $entreprises = Entreprise ::where('user_id',$postulation->user_id)->get();
            
            foreach($entreprises as $entreprise){
                $list_entreprises[$postulation->user_id] = $entreprise->social_name;
            }

            $reponses_commercials = Reponse_commercial ::where('reponses_commercial_id',$postulation->commercials_id)->get();
            foreach($reponses_commercials as $reponses_commercial){
                $produits[$reponses_commercial->produit_id] = $reponses_commercial->prix;
            }
            $list_reponses_commercials[$postulation->user_id] = $produits;
            //$entreprises[$postulation->user_id] = Entreprise ::where('user_id',$postulation->user_id)->get();
            //$reponses_commercials[$postulation->user_id] = Reponse_commercial ::where('reponses_commercial_id',$postulation->commercials_id)->get();
            // $entreprises = array($postulation->user_id=>Entreprise ::where('user_id',$postulation->user_id)->get());
            // $reponses_commercials = array($postulation->user_id=>Reponse_commercial ::where('reponses_commercial_id',$postulation->commercials_id)->get());
            // array_push($entreprises[$postulation->user_id],Entreprise ::where('user_id',$postulation->user_id)->get());
            // array_push($reponses_commercials[$postulation->user_id],Reponse_commercial ::where('reponses_commercial_id',$postulation->commercials_id)->get());
        }
        //dd($list_reponses_commercials);
        return view("selection.selection_commercial", compact(["list_entreprises","list_reponses_commercials"]));
        // return view("selection.selection_commercial");
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
