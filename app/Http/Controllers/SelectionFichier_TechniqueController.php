<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Marche;
use App\Models\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SelectionFichier_TechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('selection.selection_fichier_technique',[
            'marche' => Marche::find($id),
            'entreprises' => DB::table('postulations')
                ->join('entreprise_users','postulations.user_id','=','entreprise_users.user_id')
                ->join('entreprises','entreprise_users.entreprise_id','=','entreprises.id')
                ->select('postulations.id AS id_postulation','entreprises.id','entreprises.social_name', 'entreprises.activite_entreprise', 'entreprises.city')
                ->where('postulations.marche_id',$id)
                ->where('etat',3)->get(),  //Etat = 3 => Passer de RFI à selection technique
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
        $postulation->etat = 4;
        $postulation->save();
        return redirect(route('selection_fichierTechnique',['id_marche' => $id_marche]));
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
        $postulation->etat = 0;
        $postulation->save();
        return redirect(route('selection_fichierTechnique',['id_marche' => $id_marche]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_marche,$id_entreprise,$id_postulation)
    {
        return view('selection.selection_fichier_technique_details',[
            'marche' => Marche::find($id_marche),
            'postulation' =>Postulation::find($id_postulation),
            'entreprise' => Entreprise::find($id_entreprise),
            //Questions Techniques Affichage
            'questions' => DB::table('questions')
                ->join('reponse_questions','questions.id','=','reponse_questions.question_id')
                ->join('sections','questions.section_id','=','sections.id')
                ->join('b_sections','sections.b_section_id','=','b_sections.id')
                ->join('postulations','reponse_questions.reponses_question_id','=','postulations.questions_id')
                ->select('questions.question','reponse_questions.reponse','questions.type')
                ->where('b_sections.type_section','RFQ')
                ->where('postulations.id',$id_postulation)
                ->where('questions.marche_id',$id_marche)->get(),
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