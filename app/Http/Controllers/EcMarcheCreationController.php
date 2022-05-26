<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Produit;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class EcMarcheCreationController extends Controller
{
    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function showEtatZero()
    {
        $marches = Marche::where('etat',1)->get();
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
        // $val = DB::table('sections')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFQ')->select("nom_section","sections.id as id_section_rfq")->get();
        // dd($val);
        return view('achat.AchatCreateMarche',[
            'marche' => Marche::find($id),
            'produits' => Produit::where('marche_id',$id)->get(),
            'questions' => Question::all(),
            'questions_RFI' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFI')->select('questions.id','questions.question')->get(),
            'questions_RFQ' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFQ')->select('questions.id','questions.question')->get(),
            'sections_RFI' => DB::table('sections')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFI')->select("nom_section","sections.id")->get(),
            'sections_RFQ' => DB::table('sections')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFQ')->select("nom_section","sections.id")->get(),
            'questions_RFI_marche' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFI')->where('marche_id',$id)->get(),
            'questions_RFQ_marche' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFQ')->where('marche_id',$id)->get(), 
        ]);
    }

    public function store(Request $request){
        $id = $_POST['marche_id'];

        $marche = Marche::find($id);
        $marche->affichage_date = $_POST['dateAffichage'];
        $marche->limit_date = $_POST['dateLimite'];
        $marche->etat = 2;
        $marche->id_achat = Auth::user()->id;
        $marche->save();

        if(isset($_POST["question_input_rfi"])){
            for($count = 0; $count < count($_POST["question_input_rfi"]); $count++){
                $question = new Question([
                    'question' => $_POST["question_input_rfi"][$count],
                    'description' => $_POST["description_input_rfi"][$count],
                    'type' => $_POST["type_input_rfi"][$count],
                    'options' => $_POST["option_input_rfi"][$count],
                    'section_id' => (int)$_POST["section_input_rfi"][$count],
                    'marche_id' => $_POST["marche_id"],
                ]);
                $question->save();
            }       
        }
        
        if(isset($_POST["question_input_rfq"])){
            for($count = 0; $count < count($_POST["question_input_rfq"]); $count++){
                $question = new Question([
                    'question' => $_POST["question_input_rfq"][$count],
                    'description' => $_POST["description_input_rfq"][$count],
                    'type' => $_POST["type_input_rfq"][$count],
                    'options' => $_POST["option_input_rfq"][$count],
                    'section_id' => (int)$_POST["section_input_rfq"][$count],
                    'marche_id' => $_POST["marche_id"],
                ]);
                $question->save();
            }  
        }
            
        return redirect('/Marches-en-cours-creation');
    }    
}
