<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Marche;
use App\Models\Postulation;
use App\Models\Produit;
use App\Models\Reponse_commercial;
use App\Models\Reponses_commercial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class SelectionFichier_TechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $nbr_restant = Postulation::where('marche_id',$id)->where('etat',3)->count();
        if($nbr_restant == 0){
            $marche = Marche::find($id);
            $marche->etat = 7;
            $marche->save();
            return redirect()->route('ouvertureMarche',$id);
        }
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
        $id_marche = $_GET['id_marche'];
        $id = $_GET['id_postulation'];
       $items = Produit::where('marche_id',$id_marche)->get();
       $reponsesCommercial = Postulation::where('id','=',$id)->select('commercials_id')->first();
       $reponseCommercial = Reponse_commercial::where('reponses_commercial_id','=',$reponsesCommercial->commercials_id)->get();
       foreach ($reponseCommercial as $reponse) {
            $note = $_GET['produit_Note'.$reponse->produit_id];
            $reponse->note = $note;
            $reponse->save();
        }
        
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
        $postulation->etat_old = $postulation->etat;
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
            'produits' => Produit::where('marche_id',$id_marche)->get(),
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
