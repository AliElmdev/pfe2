<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contrat;
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
        if($request->type_selections == 'meilleurchoix'){
            if($request->type_filtrage == 'produit'){
                $data = $this->best_prixqualite_produit($request->marche_id);
                
                foreach($data as $v){
                    $postulations = Postulation ::where('marche_id',$request->marche_id)->where('entreprise_id',$v->entreprise_id)->get();
                    $contrat = new Contrat();
                    $contrat->id_produits = $v->produit_id;
                    $contrat->id_marche = $request->marche_id;
                    $contrat->id_entreprise = $v->entreprise_id;
                    $contrat->id_postulation = $postulations->id;
                    $contrat->save();
                }
                return $data;
            }elseif($request->type_filtrage == 'marche'){
                $data = $this->best_prixqualite_marche($request->marche_id);
                $produits = Produit::where('marche_id',$request->marche_id)->select('id')->get();
                
                foreach($data as $v){
                    $postulations = Postulation ::where('marche_id',$request->marche_id)->where('entreprise_id',$v->entreprise_id)->get();
                    foreach($produits as $produit){
                        $contrat = new Contrat();
                        $contrat->id_produits = $produit->id;
                        $contrat->id_marche = $request->marche_id;
                        $contrat->id_entreprise = $v->entreprise_id;
                        $contrat->id_postulation = $postulations->id;
                        $contrat->save();
                    }
                }
                return $data;
            }
        }elseif($request->type_selections == 'moinschere'){
            if($request->type_filtrage == 'produit'){
                $data = $this->min_prix_produit($request->marche_id);
                $data_decode = $data->getContent();
                $data_decode = json_decode($data_decode);
                foreach($data_decode as $v){
                    $postulations = Postulation ::where('marche_id',$request->marche_id)
                                                ->where('entreprise_id',$v->id)->first();
                    $contrat = new Contrat();
                    $contrat->id_produits = $v->produit_id;
                    $contrat->id_marche = $request->marche_id;
                    $contrat->id_entreprise = $v->id;
                    $contrat->id_postulation = $postulations->id;
                    $contrat->save();
                }
                return $data;
            }elseif($request->type_filtrage == 'marche'){
                
                $data = $this->min_prix_marche($request->marche_id);
                $produits = Produit::where('marche_id',$request->marche_id)->select('id')->get();
                foreach($data as $k=>$v){
                    $postulations = Postulation ::where('marche_id',$request->marche_id)->where('entreprise_id',$v->entreprise_id)->get();
                    foreach($produits as $produit){
                        $contrat = new Contrat();
                        $contrat->id_produits = $produit->id;
                        $contrat->id_marche = $request->marche_id;
                        $contrat->id_entreprise = $v->id;
                        $contrat->id_postulation = $postulations->id;
                        $contrat->save();
                    }
                }
                return $data;
            }
        }
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

        return view("selection.selection_commercial", compact(["list_reponses_commercials","list_entreprises","total_price","id"]));
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

    public function best_prixqualite_produit($id){
        $min_prix = [];
        $produits = Produit::where('marche_id','=',$id)->select('id','nom')->get();
        foreach($produits as $produit){
            $prix_min = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
            ->where('postulations.marche_id','=',$id)
            ->where('produit_id','=',$produit->id)
            ->selectRaw('max(note/prix) as prix_quality,prix,note')
            ->first();

            $prix_minn = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
            ->where('postulations.marche_id','=',$id)
            ->where('produit_id','=',$produit->id)
            ->where('prix','=',$prix_min->prix)
            ->where('note','=',$prix_min->note)
            ->selectRaw('(note/prix)*100 as qualiter_prix,prix, entreprise_id as entreprise_id, produit_id')
            ->first();

            $min_prix[$produit->nom] = $prix_minn;
        }
        return response()->json($min_prix);
    }

    public function best_prixqualite_marche($id){
        $prix_min = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
        ->where('postulations.marche_id','=',$id)
        ->groupby('user_id') 
        ->selectRaw('sum(prix) as prix_total,sum(note) as note_total, entreprise_id as entreprise_id , marche_id')
        //->selectRaw('note/prix as qua_pr')
        ->orderby('note_total')
        ->get();
        $prix = 0;
        $minn = 0;
        foreach($prix_min as $index => $prixx){
            if($prix <= ($prixx->note_total / $prixx->prix_total)){
                $minn = $index;
                $prix = ($prixx->note_total / $prixx->prix_total);
            }
        }
        $prix_min[$minn]['qualiter_prix'] = $prix*100;
        return response()->json($prix_min[$minn]);
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
