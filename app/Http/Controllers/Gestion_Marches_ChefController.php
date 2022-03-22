<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\EtatMarche;
use App\Models\Marche;
use App\Models\Produit;
use App\Models\Question;
use Hamcrest\Core\IsNull;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class Gestion_Marches_ChefController extends Controller
{
    /**
     * Tous les marchés du chef
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marches = DB::table('Marches')
            ->join('etat_marches', 'etat_marches.id', '=', 'Marches.etat')
            ->join('categories', 'marches.id_categorie', '=', 'categories.id')
            ->select(
                'marches.id as id',
                'marches.description as description',
                'marches.affichage_date as date_affichage',
                'marches.title as titre',
                'marches.etat as etat_num',
                'etat_marches.description as etat',
                'marches.limit_date as date',
                'categories.name as categ'
            )
            ->groupBy('Marches.id')
            ->where('marches.id_chef', auth()->user()->id)
            ->get();

        return view('chef.marche_information', compact(['marches']));
    }

    /**
     * Afficher les marchés en cours
     *
     * @return \Illuminate\Http\Response
     */
    public function current()
    {

        $marches = DB::table('Marches')
            ->join('etat_marches', 'etat_marches.id', '=', 'Marches.etat')
            ->join('categories', 'marches.id_categorie', '=', 'categories.id')
            ->select(
                'marches.id as id',
                'marches.description as description',
                'marches.affichage_date as date_affichage',
                'marches.title as titre',
                'marches.etat as etat_num',
                'etat_marches.description as etat',
                'marches.limit_date as date',
                'categories.name as categ'
            )
            ->groupBy('Marches.id')
            ->where('marches.id_chef', auth()->user()->id)
            ->whereBetween('marches.etat', [1, 2])
            ->get();

        return view('chef.marche_information', compact(['marches']));
    }

    /**
     * Afficher les marchés fermés
     *
     * @return \Illuminate\Http\Response
     */
    public function closed()
    {

        $marches = DB::table('Marches')
            ->join('etat_marches', 'etat_marches.id', '=', 'Marches.etat')
            ->join('categories', 'marches.id_categorie', '=', 'categories.id')
            ->select(
                'marches.id as id',
                'marches.description as description',
                'marches.affichage_date as date_affichage',
                'marches.title as titre',
                'marches.etat as etat_num',
                'etat_marches.description as etat',
                'marches.limit_date as date',
                'categories.name as categ'
            )
            ->groupBy('Marches.id')
            ->where('marches.id_chef', auth()->user()->id)
            ->whereBetween('marches.etat', [3, 5])
            ->get();

        return view('chef.marche_information', compact(['marches']));
    }
    /**
     * Afficher les marchés terminés
     *
     * @return \Illuminate\Http\Response
     */
    public function ended()
    {


        $marches = DB::table('Marches')
            ->join('etat_marches', 'etat_marches.id', '=', 'Marches.etat')
            ->join('categories', 'marches.id_categorie', '=', 'categories.id')
            ->select(
                'marches.id as id',
                'marches.description as description',
                'marches.affichage_date as date_affichage',
                'marches.title as titre',
                'marches.etat as etat_num',
                'etat_marches.description as etat',
                'marches.limit_date as date',
                'categories.name as categ'
            )
            ->groupBy('Marches.id')
            ->where('marches.id_chef', auth()->user()->id)
            ->where('marches.etat', 6)
            ->get();

        return view('chef.marche_information', compact(['marches']));
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
        $list_marches_information = Db::table('marches')
            ->join('categories', 'categories.id', '=', 'marches.id_categorie')
            ->select('marches.*', 'categories.name as name', 'categories.id as id_cat')
            ->where('marches.id', $id)
            ->first();

        $list_categories = Categorie::all();
        $list_produits = Produit::all()->where('marche_id', $id);

        $questions = Question::all();

        $questions_RFI = DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')
            ->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')
            ->where('type_section', 'RFI')
            ->select('questions.id', 'questions.question')
            ->get();

        $questions_RFQ = DB::table('questions')
            ->join('sections', 'questions.section_id', '=', 'sections.id')
            ->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')
            ->where('type_section', 'RFQ')
            ->select('questions.id', 'questions.question')
            ->get();

        $sections_RFI =  DB::table('sections')
            ->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')
            ->where('type_section', 'RFI')
            ->select("nom_section", "sections.id")
            ->get();

        $sections_RFQ = DB::table('sections')
            ->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')
            ->where('type_section', 'RFQ')
            ->select("nom_section", "sections.id")
            ->get();

        $questions_RFI_marche = DB::table('questions')
            ->join('sections', 'questions.section_id', '=', 'sections.id')
            ->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')
            ->where('type_section', 'RFI')
            ->where('marche_id', $id)
            ->get();

        $questions_RFQ_marche = DB::table('questions')
            ->join('sections', 'questions.section_id', '=', 'sections.id')
            ->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')
            ->where('type_section', 'RFQ')
            ->where('marche_id', $id)
            ->get();

        return view('chef.marche_modifier', compact([
            'list_marches_information',
            'list_categories',
            'list_produits',
            'questions',
            'questions_RFI',
            'questions_RFQ',
            'sections_RFQ',
            'sections_RFI',
            'questions_RFI_marche',
            'questions_RFQ_marche',
        ]));
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


        // 1 its works



        if (is_file($request->file('c_charge_input'))) {
            $file_charge = $request->file('c_charge_input');
            $file_SaveAsName = time() . "_marches_" . $file_charge->getClientOriginalName();
            $upload_path = '/Marche_' . $id .  '/';
            $file_chargeo = $upload_path . $file_SaveAsName;
            $success = $file_charge->move($upload_path, $file_SaveAsName);
            // egregistrer des information 
            $c_charge = $file_chargeo;
        } else {

            $c_charge = Marche::where('id', $id)->value('c_charge');
        }

        Marche::where('id', '=', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('descriptionm'),
                'limit_date' => $request->input('limit_date'),
                'affichage_date' => $request->input('date_affichage'),
                'c_charge' => $c_charge,
                'id_categorie' => $request->input('categorie')
            ]);

        Produit::where('marche_id', "=", $id)->delete();
        if (isset(($_POST["nom"]))) {
            for ($count = 0; $count < count($_POST["nom"]); $count++) {
                $produit = new Produit();
                $produit->nom = $_POST["nom"][$count];
                $produit->commentaire = $_POST["description"][$count];
                $produit->serv_prod = $_POST["serv_prod"][$count];
                $produit->qte = $_POST["qte"][$count];
                $produit->unit = $_POST["unit"][$count];
                $produit->marche_id = $id;
                $produit->save();
            }
        }

        Question::where('marche_id', "=", $id)->delete();
        if (isset($_POST["question_input_rfi"])) {

            DB::table('questions')
                ->join('b_sections', 'questions.section_id', 'b_sections.id')
                ->where('b_sections.type_section', '=', 'RFI')
                ->where('questions.marche_id', "=", $id)
                ->delete();
            for ($count = 0; $count < count($_POST["question_input_rfi"]); $count++) {
                $question = new Question([
                    'question' => $_POST["question_input_rfi"][$count],
                    'description' => $_POST["description_input_rfi"][$count],
                    'type' => $_POST["type_input_rfi"][$count],
                    'options' => $_POST["option_input_rfi"][$count],
                    'section_id' => (int)$_POST["section_input_rfi"][$count],
                    'marche_id' => $id,
                ]);
                $question->save();
            }
        }

        if (isset($_POST["question_input_rfq"])) {

            DB::table('questions')
                ->join('b_sections', 'questions.section_id', 'b_sections.id')
                ->where('b_sections.type_section', '=', 'RFQ')
                ->where('questions.marche_id', "=", $id)
                ->delete();


            for ($count = 0; $count < count($_POST["question_input_rfq"]); $count++) {
                $question = new Question([
                    'question' => $_POST["question_input_rfq"][$count],
                    'description' => $_POST["description_input_rfq"][$count],
                    'type' => $_POST["type_input_rfq"][$count],
                    'options' => $_POST["option_input_rfq"][$count],
                    'section_id' => (int)$_POST["section_input_rfq"][$count],
                    'marche_id' => $id,
                ]);
                $question->save();
            }
        }

        return redirect(route('modifierMarche',  $id));
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
