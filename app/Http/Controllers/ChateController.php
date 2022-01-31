<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChateController extends Controller
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
    }
    public function afficher($id_marche, $id_receve, $id_envoie)
    {
        $id_marche = 1;
        $id_receve = 1;
        $id_envoie = 2;
        //     SELECT * 
        // FROM chats c
        //     INNER JOIN chats c2
        //         ON c.sender_id=c2.receiver_id
        //   	WHERE c.sender_id=1 AND c.receiver_id=2 AND c.id_marche=1;
        $list = DB::table('chats c')
            ->leftJoin("chats c2 ", "c.sender_id", "=", "c2.receiver_id");
        // ->select('chats.user','chat.rr')
        // ->join('chats c2', '');
        // $list = DB::select(
        //     "SELECT *  FROM chats c
        //        INNER JOIN chats c2
        //            ON c.sender_id=c2.receiver_id
        //          WHERE c.sender_id=1 AND c.receiver_id=2 AND c.id_marche=1;"
        // );

        // $list = Chat::where([['id_marche', '=', $id_marche], ['sender_id', '=', $id_envoie], ['receiver_id', '=',  $id_envoie]])->get();
        dd($list);
        return view("entreprise.chate", compact(['list', 'id_marche', 'id_receve', 'id_envoie']));
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
