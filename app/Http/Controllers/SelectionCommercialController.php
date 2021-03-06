<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contrat;
use App\Models\Entreprise;
use App\Models\EntrepriseUser;
use App\Models\Marche;
use App\Models\Postulation;
use App\Models\Produit;
use App\Models\Reponse_commercial;
use App\Models\Reponse_question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                $data_decode = $data->getContent();
                $data_decode = json_decode($data_decode);
                $post = Postulation::where('marche_id',$request->marche_id)->where('etat',4)->get();
                foreach($post as $postu){
                    $postu->etat_old = $postu->etat;
                    $postu->etat = 0;
                    $postu->save();
                }
                foreach($data_decode as $v){
                    $postulations = Postulation ::where('marche_id',$request->marche_id)->where('entreprise_id',$v->entreprise_id)->first();
                    $postulations->etat_old = 5;
                    $postulations->etat = 5;
                    $postulations->save();
                    $contrat = new Contrat();
                    $contrat->id_produits = $v->produit_id;
                    $contrat->id_marche = $request->marche_id;
                    $contrat->id_entreprise = $v->entreprise_id;
                    $contrat->id_postulation = $postulations->id;
                    $contrat->prix = $v->prix;
                    $contrat->etat = 0;
                    $contrat->save();
                }
            }elseif($request->type_filtrage == 'marche'){
                $data = $this->best_prixqualite_marche($request->marche_id);
                $data_decode = $data->getContent();
                $data_decode = json_decode($data_decode);
                $produits = Produit::where('marche_id',$request->marche_id)->select('id')->get();
                $post = Postulation::where('marche_id',$request->marche_id)->where('etat',4)->get();
                foreach($post as $postu){
                    $postu->etat_old = $postu->etat;
                    $postu->etat = 0;
                    $postu->save();
                }
                $postulations = Postulation ::where('marche_id',$request->marche_id)
                                            ->where('entreprise_id',$data_decode->entreprise_id)->first();
                $postulations->etat_old = 5;
                $postulations->etat = 5;
                $postulations->save();
                foreach($produits as $produit){
                    $prix = Reponse_commercial::where('reponses_commercial_id',$postulations->commercials_id)
                                                ->join('produits', 'produits.id','=','produit_id') 
                                                ->where('produit_id',$produit->id)
                                                ->selectRaw('qte*prix as prix_produit')
                                                ->first();
                    $contrat = new Contrat();
                    $contrat->id_produits = $produit->id;
                    $contrat->id_marche = $request->marche_id;
                    $contrat->id_entreprise = $data_decode->entreprise_id;
                    $contrat->id_postulation = $postulations->id;
                    $contrat->prix = $prix->prix_produit;
                    $contrat->etat = 0;
                    $contrat->save();
                }
            }
        }elseif($request->type_selections == 'moinschere'){
            if($request->type_filtrage == 'produit'){
                $data = $this->min_prix_produit($request->marche_id);
                $data_decode = $data->getContent();
                $data_decode = json_decode($data_decode);
                $post = Postulation::where('marche_id',$request->marche_id)->where('etat',4)->get();
                foreach($post as $postu){
                    $postu->etat_old = $postu->etat;
                    $postu->etat = 0;
                    $postu->save();
                }
                foreach($data_decode as $v){
                    $postulations = Postulation ::where('marche_id',$request->marche_id)
                                                ->where('entreprise_id',$v->id)->first();
                    $postulations->etat_old = 5;
                    $postulations->etat = 5;
                    $postulations->save();
                    $contrat = new Contrat();
                    $contrat->id_produits = $v->produit_id;
                    $contrat->id_marche = $request->marche_id;
                    $contrat->id_entreprise = $v->id;
                    $contrat->id_postulation = $postulations->id;
                    $contrat->prix = $v->prix_total;
                    $contrat->etat = 0;
                    $contrat->save();
                }
            }elseif($request->type_filtrage == 'marche'){
                
                $data = $this->min_prix_marche($request->marche_id);
                $data_decode = $data->getContent();
                $data_decode = json_decode($data_decode);
                $produits = Produit::where('marche_id',$request->marche_id)->select('id')->get();
                $post = Postulation::where('marche_id',$request->marche_id)->where('etat',4)->get();
                foreach($post as $postu){
                    $postu->etat_old = $postu->etat;
                    $postu->etat = 0;
                    $postu->save();
                }
                $postulations = Postulation ::where('marche_id',$request->marche_id)
                                            ->where('entreprise_id',$data_decode->entreprise_id)->first();
                $postulations->etat_old = 5;
                $postulations->etat = 5;
                $postulations->save();
                foreach($produits as $produit){
                    $prix = Reponse_commercial::where('reponses_commercial_id',$postulations->commercials_id)
                                                ->join('produits', 'produits.id','=','produit_id') 
                                                ->where('produit_id',$produit->id)
                                                ->selectRaw('qte*prix as prix_produit')
                                                ->first();
                    $contrat = new Contrat();
                    $contrat->id_produits = $produit->id;
                    $contrat->id_marche = $request->marche_id;
                    $contrat->id_entreprise = $data_decode->entreprise_id;
                    $contrat->id_postulation = $postulations->id;
                    $contrat->prix = $prix->prix_produit;
                    $contrat->etat = 0;
                    $contrat->save();
                }
            }
        }
        $marche = Marche::where('id',$request->marche_id)->first();
        $marche->etat = 8;
        $marche->save(); 
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postulations = Postulation ::where('marche_id',$id)->where('etat','<>',0)->get();
        $list_entreprises = [];
        $list_reponses_commercials = [];
        $list_qte = [];
        $list_produits = Produit::where('marche_id',$id)->select()->get();
        $total_price = array('Total');
        foreach ($postulations as $postulation) {
            $entreprises = Entreprise ::where('user_id','=',$postulation->user_id)->select('commercial_name')->first();
            $list_entreprises[$postulation->user_id] = $entreprises->commercial_name;
        }
        foreach($postulations as $postulation){
            $reponses_commercials = Reponse_commercial ::where('reponses_commercial_id',$postulation->commercials_id)
                                                       ->join('produits', 'produits.id','=','produit_id') 
                                                       ->get();
            $total = 0;
            foreach($reponses_commercials as $reponses_commercial){
                $total += $reponses_commercial->prix*$reponses_commercial->qte;
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
                        //$produit_prix[$index] = $reponses_commercial->prix;
                        array_push($produit_prix, $reponses_commercial->prix);
                    }
                }
                $list_reponses_commercials[$produit->id] = $produit_prix;
                $list_qte[$produit->id] = $produit->qte;
            }
        }
        $marche = Marche::where('id',$id)->first();
        //return view("selection.selection_commercial", compact(["list_entreprises","list_reponses_commercials"]));
        return view("selection.selection_commercial", compact(["list_reponses_commercials","list_entreprises","total_price","id","list_qte","marche"]));
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
            ->where('postulations.etat','<>',0)
            ->where('produit_id','=',$produit->id)
            ->selectRaw('Min(prix) as prix')->first();

            $prix_minn = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
            ->where('postulations.marche_id','=',$id)
            ->where('postulations.etat','<>',0)
            ->join('produits', 'produits.id','=','produit_id') 
            ->where('produit_id','=',$produit->id)
            ->where('prix','=',$prix_min->prix)
            ->selectRaw('prix, entreprise_id as id, produit_id,(prix*qte) as prix_total')
            ->first();

            $min_prix[$produit->nom] = $prix_minn;
        }
        return response()->json($min_prix);
    }

    public function min_prix_marche($id){
        $min_prix = [];
        $produits = Produit::where('marche_id','=',$id)->select('id','nom')->get();
        $prix_min = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
        ->join('produits', 'produits.id','=','produit_id') 
        ->where('postulations.marche_id','=',$id)
        ->where('postulations.etat','<>',0)
        ->groupby('user_id') 
        ->selectRaw('sum(prix*qte) as prix_total, entreprise_id as entreprise_id , produits.marche_id')
        ->orderby('prix_total')
        ->first();
        return response()->json($prix_min);
    }
    

    public function best_prixqualite_produit($id){
        $min_prix = [];
        $produits = Produit::where('marche_id','=',$id)->select('id','nom')->get();
        foreach($produits as $produit){
            $prix_min = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
            ->join('produits', 'produits.id','=','produit_id') 
            ->where('postulations.marche_id','=',$id)
            ->where('postulations.etat','<>',0)
            ->where('produit_id','=',$produit->id)
            ->selectRaw('max(note/(prix*qte)) as prix_quality,prix,note')
            ->groupby('prix','note')
            ->first();

            $prix_minn = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
            ->join('produits', 'produits.id','=','produit_id') 
            ->where('postulations.marche_id','=',$id)
            ->where('postulations.etat','<>',0)
            ->where('produit_id','=',$produit->id)
            ->where('prix','=',$prix_min->prix)
            ->where('note','=',$prix_min->note)
            ->selectRaw('(note/(prix*qte))*100 as qualiter_prix,prix*qte as prix, entreprise_id as entreprise_id, produit_id')
            ->first();

            $min_prix[$produit->nom] = $prix_minn;
        }
        return response()->json($min_prix);
    }


    // public function best_prixqualite_produit($id){
    //     $min_prix = [];
    //     $produits = Produit::where('marche_id','=',$id)->select('id','nom')->get();
    //     foreach($produits as $produit){
    //         $prix_min = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
    //         ->where('postulations.marche_id','=',$id)
    //         ->where('produit_id','=',$produit->id)
    //         ->selectRaw('max(note/prix) as prix_quality,prix,note')
    //         ->first();

    //         $prix_minn = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
    //         ->where('postulations.marche_id','=',$id)
    //         ->where('produit_id','=',$produit->id)
    //         ->where('prix','=',$prix_min->prix)
    //         ->where('note','=',$prix_min->note)
    //         ->selectRaw('(note/prix)*100 as qualiter_prix,prix, entreprise_id as entreprise_id, produit_id')
    //         ->first();

    //         $min_prix[$produit->nom] = $prix_minn;
    //     }
    //     return response()->json($min_prix);
    // }

    public function best_prixqualite_marche($id){
        $prix_min = Reponse_commercial::join('postulations', 'reponses_commercial_id', '=', 'postulations.commercials_id')
        ->join('produits', 'produits.id','=','produit_id') 
        ->where('postulations.marche_id','=',$id)
        ->where('postulations.etat','<>',0)
        ->selectRaw('sum(prix*qte) as prix_total,sum(note) as note_total, entreprise_id, produits.marche_id')
        ->groupby('entreprise_id') 
        //->selectRaw('note/prix as qua_pr')
        //->orderby('note_total')
        ->get();
        $prix_qualite_min= 0;
        $min_index = 0;
        foreach($prix_min as $index => $prixx){
            if($prix_qualite_min<= ($prixx->note_total / $prixx->prix_total)){
                $min_index = $index;
                $prix_qualite_min= ($prixx->note_total / $prixx->prix_total);
            }
        }
        $prix_min[$min_index]['qualiter_prix'] = $prix_qualite_min*100;
        return response()->json($prix_min[$min_index]);
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
