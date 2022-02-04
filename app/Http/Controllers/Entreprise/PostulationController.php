<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\B_section;
use App\Models\Marche;
use App\Models\Postulation;
use App\Models\Produit;
use App\Models\Question;
use App\Models\Reponse_commercial;
use App\Models\Reponse_question;
use App\Models\Reponses_commercial;
use App\Models\Reponses_question;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // reponse_qst[]
        $user_id = auth()->user()->id;
        $postulations = Postulation::where('user_id',$user_id)->where('marche_id',$_POST['marche_id'])->first();

        if($postulations == null){

            $postulation = new Postulation();
            $reponses_commercial = new Reponses_commercial();
            $reponses_question = new Reponses_question();
            $reponses_question->save();
            $reponses_commercial->save();

            $result = array();

            foreach($_FILES AS $file_k=>$file) {
                $k_array = explode("_", $file_k); 
                if(isset($k_array[0]) && $k_array[0] == "reponseqst") {
                    if($file != ''){
                        $file_charge_o = $request->file($file_k);
                        // $file_chargeSaveAsName = time()."_qst.". $file_charge_o->getClientOriginalExtension();
                        $file_chargeSaveAsName = $file['name'];
                        $upload_path = 'Postulations/Marche_'.$_POST['marche_id'].'/Entreprise_'.$user_id.'/';
                        $file = $upload_path . $file_chargeSaveAsName;
                        $success = $file_charge_o->move($upload_path, $file_chargeSaveAsName);

                        $question = new Reponse_question([
                            'reponse' => $file,
                            'question_id' => $k_array[1],
                        ]);
                        $reponses_question->reponse_question()->save($question);
                    }
                }
            }


            foreach($_POST AS $k=>$value) {
                //Explode k (reponseqst_*) into an array with max 2 values
                $k_array = explode("_", $k); 
                if(isset($k_array[0]) && $k_array[0] == "reponseqst") {

                    $question = new Reponse_question([
                        'reponse' => $value,
                        'question_id' => $k_array[1],
                    ]);
                    $reponses_question->reponse_question()->save($question);
                    // $result[$k_array[1]] = $value;
                }elseif(isset($k_array[0]) && $k_array[0] == "type"){
                    array_push($result, $k_array[1]);
                }
            }

            foreach ($result as $prod) {
                $commercial = new Reponse_commercial([
                    'produit_id' => $prod,
                    'type' => $_POST['type_'.$prod],
                    'devis' => $_POST['devis_'.$prod],
                    'prix'=> $_POST['prix_'.$prod],
                ]);
                $reponses_commercial->reponse_commercial()->save($commercial);
            }
            $postulation->marche_id = $_POST['marche_id'];
            $postulation->user_id = $user_id;
            $postulation->etat = 1;
            $postulation->questions_id = $reponses_question->id;
            $postulation->commercials_id = $reponses_commercial->id;
            //etat postulation
            $postulation->save();
            // $postulation->reponses_question()->save($reponses_question);
            // $postulation->reponses_commercial()->save($reponses_commercial);
        }else{
            $reponses_question = $postulations->reponses_question();
            $reponses_commercial = $postulations->reponses_commercial();
            $result = array();

            foreach($_FILES AS $file_k=>$file) {
                $k_array = explode("_", $file_k); 
                if(isset($k_array[0]) && $k_array[0] == "reponseqst") {
                    if($file["name"] != ''){
                        $file_charge_o = $request->file($file_k);
                        // $file_chargeSaveAsName = time()."_qst.". $file_charge_o->getClientOriginalExtension();
                        $file_chargeSaveAsName = $file['name'];
                        $upload_path = 'Postulations/Marche_'.$_POST['marche_id'].'/Entreprise_'.$user_id.'/';
                        $file = $upload_path . $file_chargeSaveAsName;
                        $success = $file_charge_o->move($upload_path, $file_chargeSaveAsName);

                        $question = Reponse_question::where('reponses_question_id','=',$postulations->questions_id)->where('question_id','=',$k_array[1])->update(['reponse'=>$file]);
                    }
                }
            }

            foreach($_POST AS $k=>$value) {
                //Explode k (reponseqst_*) into an array with max 2 values
                $k_array = explode("_", $k); 
                if(isset($k_array[0]) && $k_array[0] == "reponseqst") {
                    if($value != ''){
                        $question = Reponse_question::where('reponses_question_id','=',$postulations->questions_id)->where('question_id','=',$k_array[1])->update(['reponse'=>$value]);
                    }
                    // $question->reponse = $value;
                    // $question->save();
                    // $result[$k_array[1]] = $value;
                }elseif(isset($k_array[0]) && $k_array[0] == "type"){
                    array_push($result, $k_array[1]);
                }
            }
            foreach ($result as $prod) {
                
                $commercial = Reponse_commercial::where('reponses_commercial_id','=',$postulations->commercials_id)->where('produit_id','=',$prod)->update(['type'=>$_POST['type_'.$prod],'devis'=>$_POST['devis_'.$prod],'prix'=>$_POST['prix_'.$prod]]);
                // $commercial->type = $_POST['type_'.$prod];
                // $commercial->devis = $_POST['devis_'.$prod];
                // $commercial->prix = $_POST['prix_'.$prod];
                // $commercial->save();
            }
        }

        return redirect()->route('postulation',$_POST['marche_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $b_sections = B_section::All();
        $marche = Marche::where('id', $id)->get();
        $produits = Produit::where('marche_id', $id)->get();

        $postulations = Postulation::where('marche_id', $id)->first();
        if($postulations !=null){
            $reponses_question = Reponse_question::where('reponses_question_id',$postulations->questions_id)->get();
            $reponses_commercial = Reponse_commercial::where('reponses_commercial_id',$postulations->commercials_id)->get();
            return view("entreprise.postuler", compact(["b_sections","marche","produits","reponses_question","reponses_commercial"]));
        }else{
            return view("entreprise.postuler", compact(["b_sections","marche","produits"]));
        }
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
