<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Marche;
use App\Models\Produit;
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
    public function index($id_chef)
    {
        return view('chef.tousmarches', [
            'marches' => DB::table('marches')
                ->join('categories', 'marches.id_categorie', '=', 'categories.id')
                ->join('domaines', 'categories.id_domaine', '=', 'domaines.id')
                ->select('marches.*', 'categories.name AS categorie', 'domaines.name AS domaine')
                ->where('marches.id_chef', $id_chef)
                ->get(),
        ]);
    }

    /**
     * Afficher les marchés en cours
     *
     * @return \Illuminate\Http\Response
     */
    public function current($id_chef)
    {
        return view('chef.marchesEnCours', [
            'marches' => DB::table('marches')
                ->join('categories', 'marches.id_categorie', '=', 'categories.id')
                ->join('domaines', 'categories.id_domaine', '=', 'domaines.id')
                ->select('marches.*', 'categories.name AS categorie', 'domaines.name AS domaine')
                ->where('marches.id_chef', $id_chef)
                ->whereBetween('marches.etat', [1, 2])
                ->get(),
        ]);
    }

    /**
     * Afficher les marchés fermés
     *
     * @return \Illuminate\Http\Response
     */
    public function closed($id_chef)
    {
        return view('chef.marchesFermee', [
            'marches' => DB::table('marches')
                ->join('categories', 'marches.id_categorie', '=', 'categories.id')
                ->join('domaines', 'categories.id_domaine', '=', 'domaines.id')
                ->select('marches.*', 'categories.name AS categorie', 'domaines.name AS domaine')
                ->where('marches.id_chef', $id_chef)
                ->whereBetween('marches.etat', [3, 5])
                ->get(),
        ]);
    }
    /**
     * Afficher les marchés terminés
     *
     * @return \Illuminate\Http\Response
     */
    public function ended($id_chef)
    {
        return view('chef.marchesTermines', [
            'marches' => DB::table('marches')
                ->join('categories', 'marches.id_categorie', '=', 'categories.id')
                ->join('domaines', 'categories.id_domaine', '=', 'domaines.id')
                ->select('marches.*', 'categories.name AS categorie', 'domaines.name AS domaine')
                ->where('marches.id_chef', $id_chef)
                ->where('marches.etat', 6)
                ->get(),
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
        return view('chef.marche_modifier', compact(['list_marches_information', 'list_categories', 'list_produits']));
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


        $c_charge = Marche::select('c_charge')->where('id', $id)->first();

        if (is_file($request->file('c_charge'))) {
            $file_charge = $request->file('c_charge');
            $file_SaveAsName = time() . "_marches_" . $file_charge->getClientOriginalName();
            $upload_path = '/Marche_' . $id .  '/';
            $file_chargeo = $upload_path . $file_SaveAsName;
            $success = $file_charge->move($upload_path, $file_SaveAsName);
            // egregistrer des information 
            $c_charge = $file_chargeo;
        }


        Marche::where('id', '=', $id)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'limit_date' => $request->input('limit_date'),
                'affichage_date' => $request->input('date_affichage'),
                'c_charge' => $c_charge,
                'etat' => 0,
                'id_categorie' => $request->input('categorie')
            ]);

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
