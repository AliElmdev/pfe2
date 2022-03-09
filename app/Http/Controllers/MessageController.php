<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\EtatMarche;
use App\Models\Marche;
use App\Models\Message;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */
    // controller pour boite message
    public function index()
    {
        $id_receve =  auth()->user()->id;



        // list messsage vue
        $list_messages_vue = DB::table('messages')
            ->join('marches', 'marches.id', '=', 'id_marche')
            ->select('marches.title', 'messages.id_marche', 'marches.limit_date', DB::raw('count(*) as total'))
            ->where("messages.recever_id", $id_receve)
            ->where('Vue', '=', 'Y')
            ->whereNotNull("entreprise_id")
            ->groupby('id_marche')
            ->get();


        $list_messages_non_vue = DB::table('messages')
            ->join('marches', 'marches.id', '=', 'id_marche')
            ->select('marches.title', 'messages.id_marche', 'marches.limit_date', DB::raw('count(*) as total'))
            ->where("messages.recever_id", $id_receve)
            ->where('Vue', '=', 'N')
            ->whereNotNull("entreprise_id")
            ->groupby('id_marche')
            ->get();


        return view("chef.message_boite", compact('list_messages_vue', 'list_messages_non_vue'));
    }


    // afficher les  message partuculier par entreprise

    public function show($id_marche)
    {
        $id_receve =  auth()->user()->id;



        $list_messages_vue = DB::table('entreprises')
            ->join('messages', 'messages.entreprise_id', '=', 'entreprises.id')
            ->join('postulations', 'postulations.entreprise_id', "=", 'entreprises.id')
            ->join('etat_postulaions', "etat_postulaions.id", 'postulations.etat')
            ->select('messages.entreprise_id', 'entreprises.social_name', "etat_postulaions.description as etat", DB::raw('count(*) as total'))
            ->where('Vue', '=', 'Y')
            ->where('messages.id_marche', '=', $id_marche)
            ->whereNotNull("messages.entreprise_id")
            ->groupby('messages.entreprise_id')
            ->get();

        //             SELECT COUNT(*),entreprise_id FROM messages WHERE recever_id=5 AND Vue='N'  id_marche=1
        // GROUP BY(entreprise_id )
        $list_messages_non_vue = DB::table('entreprises')
            ->join('messages', 'messages.entreprise_id', '=', 'entreprises.id')
            ->join('postulations', 'postulations.entreprise_id', "=", 'entreprises.id')
            ->join('etat_postulaions', "etat_postulaions.id", 'postulations.etat')
            ->select('messages.entreprise_id', 'entreprises.social_name', "etat_postulaions.description", DB::raw('count(*) as total'))
            ->where('Vue', '=', 'N')
            ->where('messages.id_marche', '=', $id_marche)
            ->whereNotNull("messages.entreprise_id")
            ->groupby('messages.entreprise_id')
            ->get();



        return view("chef.message_particulier", compact(['list_messages_vue', 'list_messages_non_vue', 'id_marche']));
    }


    // message entreprise chef

    public function enregister($id_marche, $entreprise_id, Request $request)
    {
        $id_receve =  auth()->user()->id;
        $id_envoie =  DB::table('messages')->where('entreprise_id', $entreprise_id)->value('sender_id');


        // tester si le txt input est vide 
        if (!(is_null($request->input('text_input')))) {
            // egregistrer des information 
            $name = new Message();
            $name->id_marche = $id_marche;
            $name->sender_id = $id_receve;
            $name->recever_id = $id_envoie;
            $name->entreprise_id = 0;
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
                    $name->entreprise_id = 0;
                    $name->message =  $file_chargeo; // enregistrer en path uploud 
                    $name->type = "file";
                    $name->save();
                }
            }
        }

        $list = Message::where("id_marche", "=", $id_marche)
            ->where("recever_id", "=", $id_receve)
            ->where("entreprise_id", "=", $entreprise_id)
            ->orwhere("sender_id", "=", $id_receve)
            ->orwhere("entreprise_id", "=", $entreprise_id)
            ->whereNotNull("entreprise_id")
            ->where("id_marche", "=", $id_marche)
            ->get();


        //nom entreprise
        $nom_entreprise = Entreprise::where('id', '=', $entreprise_id)->value('social_name');


        // make message vue
        Message::where("id_marche", "=", $id_marche)
            ->where("recever_id", "=", $id_receve)
            ->update(['vue' => 'Y']);


        return view("chef.message", compact(["list", "id_marche", "entreprise_id", "id_envoie", "nom_entreprise"]));
    }



    public function enregister_entreprise($id_marche, Request $request)

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
