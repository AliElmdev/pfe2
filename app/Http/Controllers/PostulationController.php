<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Produit;
use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // marche info
        $marche = Marche::find($id);
        // type 'cr','cm','f','on
        // filrage par session
        //1

        // $list_questions = DB::select("Select * from questions qst,sections sect,grand_sections grsect
        //                                 where qst.section_id = sect.id and grsect.id = sect.id_grand_section ORDER BY qst.section_id");

        $list_questions  = DB::table('questions')
            ->join('sections', 'questions.section_id', '=', 'sections.id')
            ->join('grand_sections', 'grand_sections.id', '=', 'sections.id_grand_section')
            ->select('questions.*', 'sections.id as sect_id', 'grand_sections.id as grp_id', 'grand_sections.type_section as type')
            ->where('questions.marche_id', '=', $id)
            ->orderBy('grp_id')
            ->orderBy('sect_id')
            ->get();

        $list = [];
        foreach ($list_questions as $questions) {
            array_push($list, [$questions->type => [$questions->grp_id => [$questions->sect_id => $questions]]]);
        }
        dd($list);

        // arr = array($list_questions[0]->name => $list_questions);


        // foreach($list_questions as $questions){
        //     if($questions)
        // }
        // $arr = array($list_questions[0]->name => $list_questions);

        // $list_produit = Produit::all()->where('marche_id', '=', $id);
        // return view("entreprise.postulertest", compact([
        //     "list_questions", 'list_produit', "marche"
        // ]));

        $list_produit = Produit::all()->where('marche_id', '=', $id);
        return view("entreprise.postulertest", compact([
            "list", 'list_produit', "marche"
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
