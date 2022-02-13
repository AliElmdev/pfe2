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
    public static function afficher($id_marche)
    {
        $id_marche = 1;
        $id_receve = 2; // marches 9aleb
        $id_envoie = 1; // autentificate
        // SELECT * 
        // FROM chats c
        //     LEFT JOIN chats c2
        //         ON c.sender_id=c2.receiver_id
        //       WHERE c.sender_id=1 AND c.receiver_id=2 AND c.id_marche=1;


        // $list = Chat::where( "chats.id_marche", "=", "c1.id_marche")
        //     ->where("chats.receiver_id", "=", $id_receve)
        //     ->where("chats.id_marche", "=", $id_marche)
        //     ->get();

        $list = Chat::where("id_marche", "=", $id_marche)
            ->where("receiver_id", "=", $id_receve)
            ->where("sender_id", "=",    $id_envoie)
            ->orwhere("receiver_id", $id_envoie)
            ->where("sender_id", "=", $id_receve)
            ->where("id_marche", "=", $id_marche)
            ->get();

        return view("entreprise.chat", compact(["list", "id_marche",  "id_receve", "id_envoie"]));
    }

    // enregistrer les chats
    public function enregister($id_marche, Request $request)

    {
        $id_marche = 1;
        $id_receve = 1; // marches 9aleb
        $id_envoie = 2; // autentificate



        // tester si le txt input est vide 
        if (!(is_null($request->input('text_input')))) {
            // egregistrer des information 
            $name = new Chat();
            $name->id_marche = $id_marche;
            $name->sender_id = $id_envoie;
            $name->receiver_id = $id_receve;
            $name->message = $request->input('text_input');
            $name->typ = "txt";
            $name->save();
        }
        // tester si le file input est vide
        if (!(is_null($request->file('file_input')))) {
            // enregister les file en rep and uplouad
            $file_charge = $request->file('file_input');
            $file_SaveAsName = time() . "_message_" . $file_charge->getClientOriginalName();
            $upload_path = 'Messages/Marche_' . $id_marche . '/Envoie_' . $id_envoie . '/';
            $file_chargeo = $upload_path . $file_SaveAsName;
            $success = $file_charge->move($upload_path, $file_SaveAsName);
            // egregistrer des information 
            $name = new Chat();
            $name->id_marche = $id_marche;
            $name->sender_id = $id_envoie;
            $name->receiver_id = $id_receve;
            $name->message =  $file_chargeo; // enregistrer en path uploud 
            $name->typ = "file";
            $name->save();
        }

        return ChateController::afficher($id_marche);
    }
}
