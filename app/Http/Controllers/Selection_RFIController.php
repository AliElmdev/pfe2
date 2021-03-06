<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\EntrepriseUser;
use App\Models\Marche;
use App\Models\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Selection_RFIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $nbr_restant = Postulation::where('marche_id',$id)->where('etat',2)->count();
        if($nbr_restant == 0){
            $marche = Marche::find($id);
            $marche->etat = 6;
            $marche->save();
            return redirect()->route('ouvertureMarche',$id);
        }
        return view('selection.selection_rfi',[
            'marche' => Marche::find($id),
            'entreprises' => DB::table('postulations')
                ->join('entreprise_users','postulations.user_id','=','entreprise_users.user_id')
                ->join('entreprises','entreprise_users.entreprise_id','=','entreprises.id')
                ->select('postulations.id AS id_postulation','entreprises.id','entreprises.social_name', 'entreprises.activite_entreprise', 'entreprises.city')
                ->where('postulations.marche_id',$id)
                ->where('etat',2)->get(),
         ]);
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
    public function accept(Request $request)
    {
        $id = $_GET['id_postulation'];
        $id_marche = $_GET['id_marche'];
        $postulation = Postulation::find($id);
        $postulation->etat = 3;
        $postulation->save();
        return redirect(route('selection_rfi',['id_marche' => $id_marche]));
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refuse(Request $request)
    {
        $id = $_GET['id_postulation'];
        $id_marche = $_GET['id_marche'];
        $postulation = Postulation::find($id);
        $postulation->etat_old = $postulation->etat;
        $postulation->etat = 0;
        $postulation->save();
        return redirect(route('selection_rfi',['id_marche' => $id_marche]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_marche,$id_entreprise,$id_postulation)
    {
        $reponses_questions = Postulation::where('marche_id',$id_marche)->where('entreprise_id',$id_entreprise)->first();

        return view('selection.selection_rfi_details',[
            'marche' => Marche::find($id_marche),
            'postulation' =>Postulation::find($id_postulation),
            'entreprise' => Entreprise::find($id_entreprise),
            // Section :Dossier Fournisseur - Donn??es Saisies - Section avec questions VM
            'reponses_section1' => DB::table('questions')
                ->join('reponse_questions','questions.id','=','reponse_questions.question_id')
                ->Where('reponses_question_id',$reponses_questions->questions_id)
                ->select('question','reponse','type')
                ->where('questions.marche_id',$id_marche)
                ->where('questions.section_id',1)->get(),
            // Section : Dossier Fournisseur - Pi??ces jointes - Section avec questions VM
            'reponses_section2' => DB::table('questions')
                ->join('reponse_questions','questions.id','=','reponse_questions.question_id')
                ->Where('reponses_question_id',$reponses_questions->questions_id)
                ->select('question','reponse','type')
                ->where('questions.marche_id',$id_marche)
                ->where('questions.section_id',2)->get(),
            // Section : Management HSE- section avec VM
            'reponses_section3' => DB::table('questions')
                ->join('reponse_questions','questions.id','=','reponse_questions.question_id')
                ->Where('reponses_question_id',$reponses_questions->questions_id)
                ->select('question','reponse','type')
                ->where('questions.marche_id',$id_marche)
                ->where('questions.section_id',3)->get(),
             // Section : SITUATION FINANCIAIRE 
            'reponses_section4' => DB::table('questions')
                ->join('reponse_questions','questions.id','=','reponse_questions.question_id')
                ->Where('reponses_question_id',$reponses_questions->questions_id)
                ->select('question','reponse','type')
                ->where('questions.marche_id',$id_marche)
                ->where('questions.section_id',4)->get(),
            // Section : EXPERIENCE ET REFERENCES  
            'reponses_section5' => DB::table('questions')
                ->join('reponse_questions','questions.id','=','reponse_questions.question_id')
                ->Where('reponses_question_id',$reponses_questions->questions_id)
                ->select('question','reponse','type')
                ->where('questions.marche_id',$id_marche)
                ->where('questions.section_id',5)->get(),
            // Section : CERTIFICATION 
            'reponses_section6' => DB::table('questions')
                ->join('reponse_questions','questions.id','=','reponse_questions.question_id')
                ->Where('reponses_question_id',$reponses_questions->questions_id)
                ->select('question','reponse','type')
                ->where('questions.marche_id',$id_marche)
                ->where('questions.section_id',6)->get(),
         ]);
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
