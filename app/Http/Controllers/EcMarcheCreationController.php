<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Produit;
use Illuminate\Http\Request;

class EcMarcheCreationController extends Controller
{
    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function showEtatZero()
    {
        return view('achat.MarchesEnCoursCreation',[
           'marches' => Marche::where('etat',0)->get()
        ]);
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
            'produits' => Produit::where('marche_id',$id)->get()
         ]);
    }

    public function store(Request $request){
        $id = $request->input('id_marche');
        $marche = Marche::find($id);
        $marche->affichage_date = $request->input('dateAffichage');
        $marche->limit_date = $request->input('dateLimite');
        $marche->etat = 1;
        $marche->save();
        return redirect('/Marches-en-cours-creation');
    }

}
