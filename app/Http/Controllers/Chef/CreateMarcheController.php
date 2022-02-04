<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use App\Http\Requests\StoreMarcheRequest;
use App\Models\Marche;
use App\Models\Produit;

class CreateMarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chef.create_project');
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
        $file_chargeSaveAsName = time() . "_Charge." . $file_charge_o->getClientOriginalName();;
        $upload_path = 'Marches/' . $request['titre_input'] . '/'; //messages/id entreprise/id messahe
        $file_charge = $upload_path . $file_chargeSaveAsName; // telechager
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


        for ($count = 0; $count < count($_POST["nom"]); $count++) {
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
