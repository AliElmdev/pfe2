<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\Http\Requests\StoreMarcheRequest;
use App\Models\Marche;
use App\Models\Produit;
use App\Models\Question;

class CreateMarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chef.create_project',[
            'questions' => Question::all(),
            'questions_RFI' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFI')->select('questions.id','questions.question')->get(),
            'questions_RFQ' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFQ')->select('questions.id','questions.question')->get(),
            'sections_RFI' => DB::table('sections')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFI')->select("nom_section","sections.id")->get(),
            'sections_RFQ' => DB::table('sections')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFQ')->select("nom_section","sections.id")->get(),
            // 'questions_RFI_marche' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFI')->where('marche_id',-1)->get(),
            // 'questions_RFQ_marche' => DB::table('questions')->join('sections', 'questions.section_id', '=', 'sections.id')->join('b_sections', 'sections.b_section_id', '=', 'b_sections.id')->where('type_section','RFQ')->where('marche_id',-1)->get(), 
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
    public function store(StoreMarcheRequest $request)
    {
        
        $file_charge_o = $request->file('file_charge');
        $file_chargeSaveAsName = time()."_Charge.". $file_charge_o->getClientOriginalExtension();
        $upload_path = 'Marches/'.$request['titre_input'].'/';
        $file_charge = $upload_path . $file_chargeSaveAsName;
        $success = $file_charge_o->move($upload_path, $file_chargeSaveAsName);


        // $values = array('title' => $_POST["titre_input"],'description' => $_POST["desc_input"],
        // 'id_categorie' => $_POST["categ_input"],'c_charge' => $file_charge);

        $marche = new Marche([
            'title' => $_POST["titre_input"],
            'description' => $_POST["desc_input"],
            'id_categorie' => $_POST["categ_input"],
            'c_charge' => $file_charge,
        ]);

        $marche->save();
        //DB::table('marches')->insert($values);


        for($count = 0; $count < count($_POST["nom"]); $count++){
            $produit = new Produit([
                'nom' => $_POST["nom"][$count],
                'commentaire' => $_POST["description"][$count],
                'serv_prod' => $_POST["serv_prod"][$count],
                'qte' => $_POST["qte"][$count],
                'unit' => $_POST["unit"][$count],
            ]);
            $marche->produit()->save($produit);
        }
        //dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
