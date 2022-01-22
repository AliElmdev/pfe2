<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Produit;
use App\Models\Question;
use Illuminate\Http\Request;

class EcMarcheCreationController extends Controller
{
    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function showEtatZero()
    {
        $marches = Marche::where('etat',0)->get();
        return view('achat.MarchesEnCoursCreation',compact(["marches"]));
        
        // return view('achat.MarchesEnCoursCreation',[
        //    'marches' => Marche::where('etat',0)->get()
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('achat.AchatCreateMarche',[
            'marche' => Marche::find($id),
            'produits' => Produit::where('marche_id',$id)->get(),
            'questions' => Question::where('marche_id',$id)->get(),
         ]);
    }

    public function store(Request $request){
        $id = $_POST['marche_id'];
        $marche = Marche::find($id);
        $marche->affichage_date = $_POST['dateAffichage'];
        $marche->limit_date = $_POST['dateLimite'];
        $marche->etat = 1;
        $marche->save();

        for($count = 0; $count < count($_POST["question_input"]); $count++){
            $question = new Question([
                'question' => $_POST["question_input"][$count],
                'description' => $_POST["description_input"][$count],
                'type' => $_POST["type_input"][$count],
                'options' => $_POST["option_input"][$count],
                'Questionnaire' => "RFI",
            ]);
            $marche->question()->save($question);
        }   
            
        return redirect('/Marches-en-cours-creation');
    }    
}
