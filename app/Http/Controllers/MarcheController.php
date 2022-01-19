<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Domaine;
use App\Models\Marche;
use Illuminate\Http\Request;

class MarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //domaines filtrage test
        if (!empty($request->input("domaine"))) {
            $list_categories = Categorie::all()->where("id_domaine", "=", $request->input("domaine"));
        } else {
            $list_categories =  Categorie::all();
        }

        // marches fitrages test tous les champs
        $list_marches = [];
        if (!empty($request->input("categorie")) && !empty($request->input("limit_date"))) {
            $list_marches = Marche::all()
                ->where("id_categorie", "=", $request->input("categorie"))
                ->where("limit_date", "=", $request->input("limit_date"));
        }
        //  // marches fitrages seul champs
        // categorie
        else if (!empty($request->input("categorie")) && empty($request->input("limit_date"))) {
            $list_marches = Marche::all()->where("id_categorie", "=", $request->input("categorie"));
        }
        // domaine
        else   if (empty($request->input("categorie")) && !empty($request->input("limit_date"))) {
            $list_marches = Marche::all()->where("limit_date", "=", $request->input("limit_date"));
        }
        // tous empty
        else {
            $list_marches = Marche::all();
        }
        //  dd($list_marches);

        $list_domaines = Domaine::all();
<<<<<<< HEAD
        return view("marches", compact(["list_categories", "list_domaines", "list_marches"]));
=======
        $list_marches = Marche::all();
        $catg = Categorie::all()->keyBy('id');
        return view("Marches", compact(["list_categories", "list_domaines", "list_marches","catg"]));
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b
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
