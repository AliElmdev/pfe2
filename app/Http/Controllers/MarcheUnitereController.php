<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Models\Marche;
use App\Models\Categorie;
use App\Models\Domaine;

=======
use App\Models\Categorie;
use App\Models\Marche;
use Illuminate\Http\Request;
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b

class MarcheUnitereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function index($idmarche)
    {
        $marcheUnitere = Marche::find($idmarche);
        return view("marchepage", compact("marcheUnitere"));
=======
    public function index()
    {

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
<<<<<<< HEAD
        //
=======
        $marche = Marche::find($id);
        $categorie = Categorie::find($marche->id_categorie);
        return view("Marchepage", compact("marche","categorie"));
>>>>>>> 1bef297d9cc3c0358481614f4ae00a338f631b5b
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
