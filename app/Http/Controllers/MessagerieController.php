<?php

namespace App\Http\Controllers;

use App\Models\Messagerie;
use Illuminate\Http\Request;

class messagerieController extends Controller
{

    // enregistrer les chats
    public function enregister($id_marche, Request $request)

    {
        // if (auth()->user()->isAdmin()) {
        //     $id_envoie = 2; // autentificate
        // } elseif (auth()->user()->isChef()) {
        // } elseif (auth()->user()->isUser()) {
        // } elseif (auth()->user()->isAchat()) {
        // }
        $id_receve = auth()->user()->id;
        $id_envoie = 2; // autentificate ranjbouh mn id marches


        // tester si le txt input est vide 
        if (!(is_null($request->input('text_input')))) {
            // egregistrer des information 
            $name = new Messagerie();
            $name->id_marche = $id_marche;
            $name->sender_id = $id_receve;
            $name->recever_id = $id_envoie;
            $name->message = $request->input('text_input');
            $name->type = "txt";
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
            $name = new Messagerie();
            $name->id_marche = $id_marche;
            $name->sender_id = $id_receve;
            $name->recever_id = $id_envoie;
            $name->message =  $file_chargeo; // enregistrer en path uploud 
            $name->type = "file";
            $name->save();
        }

        $list = Messagerie::where("id_marche", "=", $id_marche)
            ->where("recever_id", "=", $id_receve)
            ->where("sender_id", "=",  $id_envoie)
            ->orwhere("recever_id", $id_envoie)
            ->where("sender_id", "=", $id_receve)
            ->where("id_marche", "=", $id_marche)
            ->get();




        // make message vue
        Messagerie::where("id_marche", "=", $id_marche)
            ->where("recever_id", "=", $id_receve)
            ->where("sender_id", "=", $id_envoie)
            ->update(['vue' => 'Y']);

        return view("entreprise.messagerie_page", compact(["list", "id_marche",  "id_receve", "id_envoie"]));
    }
}
