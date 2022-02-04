<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ChateController extends Controller
{

    // afficher le centenu de char
    public static function afficher($id_marche, $id_receve, $id_envoie)
    {
        $id_marche = 1;
        $id_receve = 1; // marches 9aleb
        $id_envoie = 2; // autentificate
        //     SELECT * 
        // FROM chats c
        //     INNER JOIN chats c2
        //         ON c.sender_id=c2.receiver_id
        //   	WHERE c.sender_id=1 AND c.receiver_id=2 AND c.id_marche=1;

        // model
        $list = DB::table(DB::raw('chats as c, chats as c2'))
            // ->leftJoin("chats as c2", "c.sender_id", "=", "c2.receiver_id")
            ->where("c.sender_id", "=", $id_envoie)
            ->where("c.receiver_id", "=", $id_receve)
            ->where("c.id_marche", "=", $id_marche)
            ->get();

        // ->select('chats.user','chat.rr')
        // ->join('chats c2', '');
        // $list = DB::select(
        //     "SELECT *  FROM chats c
        //        INNER JOIN chats c2
        //            ON c.sender_id=c2.receiver_id
        //          WHERE c.sender_id=1 AND c.receiver_id=2 AND c.id_marche=1;"
        // );


        // $list = Chat::where([['id_marche', '=', $id_marche], ['sender_id', '=', $id_envoie], ['receiver_id', '=',  $id_envoie]])->get();
        return view("entreprise.chat", compact(['list', 'id_marche', 'id_receve', 'id_envoie']));
    }

    // enregistrer les chats
    public function enregister($id_marche, $id_receve, $id_envoie, Request $request)

    {

        // if (!(isEmpty($name->message))) {

        if (!(is_null($request->input('text_input')))) {
            $name = new Chat();
            $name->id_marche = $id_marche;
            $name->sender_id = $id_envoie;
            $name->receiver_id = $id_receve;
            $name->message = $request->input('text_input');
            $name->typ = "txt";
            $name->save();
        }
        // dd(!(is_null($request->input("file_input"))));
        if (!(is_null($request->input('file_input')))) {


            $file_charge = $request->input('file_input');
            $file_SaveAsName = time() . "_message." . $file_charge->getClientOriginalName();;
            $upload_path = 'Messages/' . $request->input('file_input') . '/'; //messages/id entreprise/id messahe
            $file_chargeo = $upload_path . $file_SaveAsName; // telechager
            $success = $file_charge->move($upload_path, $file_SaveAsName);
            $name = new Chat();
            $name->id_marche = $id_marche;
            $name->sender_id = $id_envoie;
            $name->receiver_id = $id_receve;
            $name->message =  $file_chargeo;
            $name->typ = "file";
            $name->save();
        }


        // }

        // DB::insert('insert into chats values(,');

        // if (!($request->input('name', 'input_txt')->is_nan)) {

        // } else if ($request->input('name', '')) {
        //     $name->message = $request->input('name', '');
        //     $name->save();
        // }
        return ChateController::afficher($id_marche, $id_receve, $id_envoie);
    }
}
