<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class messagerieController extends Controller
{

    // enregistrer les chats
    public function enregister($id_marche, Request $request)

    {
        $id_envoie  =  DB::table('marches')->where('id', $id_marche)->value('id_chef');
        $id_receve =  auth()->user()->id; // autentificate ranjbouh mn id marches

        // select id entreprise where id_user =..
        $entreprise_id = DB::table("entreprise_users")->where('user_id',  $id_receve)->value('entreprise_id');

        // tester si le txt input est vide 
        if (!(is_null($request->input('text_input')))) {
            // egregistrer des information 
            $name = new Message();
            $name->id_marche = $id_marche;
            $name->sender_id = $id_receve;
            $name->recever_id = $id_envoie;
            $name->entreprise_id = $entreprise_id;
            $name->message = $request->input('text_input');
            $name->type = "txt";
            $name->save();
        }

        if (!(is_null($request->file('file_input')))) {
            // tester si le file input est vide
            $files = $request->file('file_input');
            if ($request->hasFile('file_input')) {
                foreach ($files as $file) {
                    // enregister les file en rep and uplouad
                    $file_charge = $file;
                    $file_SaveAsName = time() . "_message_" . $file_charge->getClientOriginalName();
                    $upload_path = 'Messages/Marche_' . $id_marche . '/Envoie_' . $id_envoie . '/';
                    $file_chargeo = $upload_path . $file_SaveAsName;
                    $success = $file_charge->move($upload_path, $file_SaveAsName);
                    // egregistrer des information 
                    $name = new Message();
                    $name->id_marche = $id_marche;
                    $name->sender_id = $id_receve;
                    $name->recever_id = $id_envoie;
                    $name->entreprise_id = $entreprise_id;
                    $name->message =  $file_chargeo; // enregistrer en path uploud 
                    $name->type = "file";
                    $name->save();
                }
            }
        }
        // SELECT * FROM messages WHERE recever_id=4 AND entreprise_id=1 AND id_marche=1 OR  recever_id=2 AND sender_id=4 AND id_marche=1

        $list = Message::where("id_marche", "=", $id_marche)
            ->where("recever_id",  $id_envoie)
            ->where('entreprise_id', $entreprise_id)

            ->orwhere("id_marche", "=", $id_marche)
            ->where("sender_id",  $id_envoie)

            ->get();


        // // make message vue
        Message::where("id_marche", "=", $id_marche)
            ->where("recever_id", "=", $id_receve)
            ->update(['vue' => 'Y']);


        return view("entreprise.messagerie_page", compact(["list", "id_marche",  "id_receve", "entreprise_id", "id_envoie"]));
    }
}
