<?php

namespace App\Http\Controllers;

use App\Models\Marche;
use App\Models\Message;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MessageChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_receve =  auth()->user()->id;


        // $list_messages = Message::where('recever_id', $id_receve)->get();


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
        // tester si le file input est vide
        if (!(is_null($request->file('file_input')))) {
            // enregister les file en rep and uplouad
            $file_charge = $request->file('file_input');
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

        $list = Message::where("id_marche", "=", $id_marche)
            ->where("recever_id", "=", $id_receve)
            ->where("entreprise_id", "=", $entreprise_id)
            ->orwhere("sender_id", "=", $id_receve)
            ->orwhere("entreprise_id", "=", $entreprise_id)
            ->whereNotNull("entreprise_id")
            ->where("id_marche", "=", $id_marche)
            ->get();


        // make message vue
        Message::where("id_marche", "=", $id_marche)
            ->where("recever_id", "=", $id_receve)
            ->update(['vue' => 'Y']);


        return view("chef.message", compact(["list", "id_marche", "entreprise_id", "id_envoie"]));
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
    public function show($id_marche)
    {
        // // select id entreprise where id_user =..
        $id_receve =  auth()->user()->id;

        // list messsage vue par chef 
        $list_messages_vue =
            //  Message::selectRaw('count(*) as  total,entreprise_id')
            //     ->where("recever_id", $id_receve)
            //     // ->having('salary', '<', 10000)
            //     ->where('Vue', '=', 'N')
            //     ->where('id_marche', '=', $id_marche)
            //     ->whereNotNull("entreprise_id")
            //     ->groupby('entreprise_id')
            //     ->get();
            DB::table('messages')
            ->join('entreprises', 'entreprises.id', '=', 'entreprise_id')
            ->select('messages.entreprise_id', 'entreprises.social_name', DB::raw('count(*) as total'))
            // ->where("recever_id", $id_receve)
            ->where('Vue', '=', 'Y')
            ->where('id_marche', '=', $id_marche)
            ->whereNotNull("entreprise_id")
            ->groupby('entreprise_id')
            ->get();
        //             SELECT COUNT(*),entreprise_id FROM messages WHERE recever_id=5 AND Vue='N'  id_marche=1
        // GROUP BY(entreprise_id )
        $list_messages_non_vue = DB::table('messages')
            ->join('entreprises', 'entreprises.id', '=', 'entreprise_id')
            ->select('messages.entreprise_id', 'entreprises.social_name', DB::raw('count(*) as total'))
            // ->where("recever_id", $id_receve)
            ->where('Vue', '=', 'N')
            ->where('id_marche', '=', $id_marche)
            ->whereNotNull("entreprise_id")
            ->groupby('entreprise_id')
            ->get();



        return view("chef.message_particulier", compact(['list_messages_vue', 'list_messages_non_vue', 'id_marche']));
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
