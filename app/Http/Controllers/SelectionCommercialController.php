<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\EntrepriseUser;
use App\Models\Postulation;
use App\Models\Produit;
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
        $list_entreprises = [];
        $list_reponses_commercials = [];
        $list_produits = Produit::where('marche_id',$id)->select('id')->get();
        $total_price = array('Total');
        foreach ($postulations as $postulation) {
            $entreprises = Entreprise ::where('user_id','=',$postulation->user_id)->select('commercial_name')->first();
            $list_entreprises[$postulation->user_id] = $entreprises->commercial_name;
        }
        foreach($postulations as $postulation){
            $reponses_commercials = Reponse_commercial ::where('reponses_commercial_id',$postulation->commercials_id)->get();
            $total = 0;
            foreach($reponses_commercials as $reponses_commercial){
                $total += $reponses_commercial->prix;
            }
            array_push($total_price, $total);
        }



        foreach($list_produits as $produit){
            $produit_prix = array($produit->id);
            foreach ($postulations as $postulation) {
                //$entreprise_id = EntrepriseUser::where('user_id','=',$postulation->user_id)->select('entreprise_id')->first();
                // $entreprises = Entreprise ::where('id','=',$entreprise_id)->select('commercial_name')->first();
                $entreprises = Entreprise ::where('user_id','=',$postulation->user_id)->select('commercial_name')->first();
                //$list_entreprises[$postulation->user_id] = $entreprises->commercial_name;                                    
                $reponses_commercials = Reponse_commercial ::where('reponses_commercial_id',$postulation->commercials_id)->get();
                foreach($reponses_commercials as $reponses_commercial){
                    if($reponses_commercial->produit_id == $produit->id){
                        array_push($produit_prix, $reponses_commercial->prix);
                    }
                }
                $list_reponses_commercials[$produit->id] = $produit_prix;
            }
        }

        
        //return view("selection.selection_commercial", compact(["list_entreprises","list_reponses_commercials"]));

        return view("selection.selection_commercial", compact(["list_reponses_commercials","list_entreprises","total_price"]));
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


    public function min_prix_produit($id){
        $min_prix = [];
        $produits = Produit::where('marche_id','=',$id)->select('id','nom')->get();
        foreach($produits as $produit){
            $prix_min = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
            ->where('postulations.marche_id','=',$id)
            ->where('produit_id','=',$produit->id)
            ->selectRaw('Min(prix) as prix')->first();

            $prix_minn = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
            ->where('postulations.marche_id','=',$id)
            ->where('produit_id','=',$produit->id)
            ->where('prix','=',$prix_min->prix)
            ->selectRaw('prix, entreprise_id as id, produit_id')
            ->first();

            $min_prix[$produit->nom] = $prix_minn;
        }
        return response()->json($min_prix);
    }

    public function min_prix_marche($id){
        $min_prix = [];
        $produits = Produit::where('marche_id','=',$id)->select('id','nom')->get();
        $prix_min = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
        ->where('postulations.marche_id','=',$id)
        ->groupby('user_id')
        ->selectRaw('sum(prix) as prix_total, entreprise_id as entreprise_id , marche_id')
        ->orderby('prix_total')
        ->first();
        return response()->json($prix_min);
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
