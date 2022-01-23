<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Produit;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'questions' => Question::all(),
            'questions_RFI' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->where('type_section','RFI')->get(),
            'questions_RFQ' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->where('type_section','RFQ')->get(),
            'sections_RFI' => Section::where('type_section','RFI')->get(),
            'sections_RFQ' => Section::where('type_section','RFQ')->get(),
            'questions_RFI' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->where('type_section','RFI')->where('marche_id',$id)->get(),
            'questions_RFQ' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->where('type_section','RFQ')->where('marche_id',$id)->get(),
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
                'section_id' => (int)$_POST["section_input"][$count],
                'marche_id' => $_POST["marche_id"],
            ]);
            $question->save();
        }   
            
        return redirect('/Marches-en-cours-creation');
    }    
}
