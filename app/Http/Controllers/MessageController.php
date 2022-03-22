<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\EtatMarche;
use App\Models\Marche;
use App\Models\Message;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

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
            ->join(
                'marches',
                'marches.id',
                '=',
                'id_marche'
            )
            ->select(
                'marches.title',
                'messages.id_marche',
                'marches.limit_date',
                DB::raw('count(*) as total')
            )
            ->where("messages.recever_id", $id_receve)
            ->where('Vue', '=', 'Y')
            ->whereNotNull("entreprise_id")
            ->groupby('id_marche')
            ->get();


        $list_messages_non_vue = DB::table('messages')
            ->join('marches', 'marches.id', '=', 'id_marche')
            ->select(
                'marches.title',
                'messages.id_marche',
                'marches.limit_date',
                DB::raw('count(*) as total')
            )
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
            ->select('messages.entreprise_id as entreprise_id', 'entreprises.social_name', "etat_postulaions.description as etat", DB::raw('count(*) as total'))
            ->where('Vue', '=', 'Y')
            ->where('messages.id_marche', '=', $id_marche)
            ->whereNotNull("messages.entreprise_id")
            ->groupby('messages.entreprise_id')
            ->get();

        //             SELECT COUNT(*),entreprise_id FROM messages WHERE recever_id=5 AND Vue='N'  id_marche=1
        // GROUP BY(entreprise_id )
        $list_messages_non_vue = DB::table('entreprises')
            ->join(
                'messages',
                'messages.entreprise_id',
                '=',
                'entreprises.id'
            )
            ->join(
                'postulations',
                'postulations.entreprise_id',
                "=",
                'entreprises.id'
            )
            ->join(
                'etat_postulaions',
                "etat_postulaions.id",
                'postulations.etat'
            )
            ->select(
                'messages.entreprise_id as entreprise_id',
                'entreprises.social_name',
                "etat_postulaions.description as etat",
                DB::raw('count(*) as total')
            )
            ->where('Vue', '=', 'N')
            ->where(
                'messages.id_marche',
                '=',
                $id_marche
            )
            ->whereNotNull("messages.entreprise_id")
            ->groupby('messages.entreprise_id')
            ->get();


        return view(
            "chef.message_particulier",
            compact(['list_messages_vue', 'list_messages_non_vue', 'id_marche'])
        );
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

            if ($request->hasFile('file_input')) {
                $files = $request->file('file_input');
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
            ->where("recever_id", "=", $id_envoie)
            ->where("id_marche", "=", $id_marche)

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


        $list = Message::where("id_marche", "=", $id_marche)
            ->where("recever_id",  $id_receve)
            ->where("sender_id", $id_envoie)

            // ->where('entreprise_id', $entreprise_id)


            ->orwhere("sender_id",  $id_envoie)
            ->where("id_marche", "=", $id_marche)
            ->where('entreprise_id', $entreprise_id)
            ->orwhere('entreprise_id', '=', $entreprise_id)
            ->where("id_marche", "=", $id_marche)
            ->whereNotNull("entreprise_id")
            ->get();


        // // make message vue
        Message::where("id_marche", "=", $id_marche)
            ->where("recever_id", "=", $id_receve)
            ->update(['vue' => 'Y']);


        return view("entreprise.messagerie_page", compact(["list", "id_marche",  "id_receve", "entreprise_id", "id_envoie"]));
    }
    public function notificationMessage($id_marche)
    {
        $id_receve =  auth()->user()->id;


        //             SELECT COUNT(*),entreprise_id FROM messages WHERE recever_id=5 AND Vue='N'  id_marche=1
        // GROUP BY(entreprise_id )
        $list_messages_non_vue = DB::table('entreprises')
            ->join(
                'messages',
                'messages.entreprise_id',
                '=',
                'entreprises.id'
            )
            ->select(
                'messages.entreprise_id as entreprise_id',
                'messages.message as message ',
                DB::raw('count(*) as total')
            )
            ->where('Vue', '=', 'N')
            ->where(
                'messages.recever_id',
                '=',
                $id_receve
            )
            ->whereNotNull("messages.entreprise_id")
            ->groupby('messages.entreprise_id')
            ->get();
        $list_messages_non_vue = DB::table('messages')
            ->select(
                DB::raw('count(*) as total')
            )
            ->where('Vue', '=', 'N')
            ->where(
                'recever_id',
                '=',
                $id_receve
            )
            ->whereNotNull("messages.entreprise_id")
            ->get();

        foreach ($list_messages_non_vue as $item) {
            $count = $item->total;
        }

        $div = "<a class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <i class=\"fas fa-envelope fa-fw\"></i>\"  <!-- Counter - Messages -->"
            + " <span class='badge badge-danger badge-counter' id='noti_number'>" + $count + "</span>  </a>   <!-- Dropdown - Messages -->";
        "<div class='dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='messagesDropdown'>
            <h6 class='dropdown-header'> Message Center</h6>"
            +      "  <div>";

        foreach ($list_messages_non_vue as $item) {
            $div .=

                "<a class='dropdown-item d-flex align-items-center' href='#'>" +
                " <div class='dropdown-list-image mr-3'>" +
                // "<img class='rounded-circle' src='img/undraw_profile_3.svg' alt='...'> " +
                "<div class='status-indicator bg-warning'></div> </div> <div>" +
                "<div class='text-truncate'>" + $item->message +
                "</div>" +
                +"<div class='small text-gray-500'>Morgan Alvarez · 2d</div></div></a></div>";
        }
        $div .= "<a class='dropdown-item text-center small text-gray-500' href='#'>Read More Messages</a></div>";

        return  $div;
    }


    public function entreprise()
    {
        $id_receve =  auth()->user()->id;



        // list messsage vue
        $list_messages_vue = DB::table('messages')
            ->join(
                'marches',
                'marches.id',
                '=',
                'id_marche'
            )
            ->select(
                'marches.title',
                'messages.id_marche',
                'marches.limit_date',
                DB::raw('count(*) as total')
            )
            ->where("messages.recever_id", $id_receve)
            ->where('Vue', '=', 'Y')
            ->whereNotNull("entreprise_id")
            ->groupby('id_marche')
            ->get();


        $list_messages_non_vue = DB::table('messages')
            ->join('marches', 'marches.id', '=', 'id_marche')
            ->select(
                'marches.title',
                'messages.id_marche',
                'marches.limit_date',
                DB::raw('count(*) as total')
            )
            ->where("messages.recever_id", $id_receve)
            ->where('Vue', '=', 'N')
            ->whereNotNull("entreprise_id")
            ->groupby('id_marche')
            ->get();

        $list_messages_postuler = DB::table('postulations')
            ->join('marches', 'marches.id', '=', 'postulations.marche_id')
            ->whereNotIn('postulations.marche_id', function ($q) {
                $q->select('id_marche')->from('messages');
            })
            ->select(
                'marches.title',
                'marches.id as id_marche',
                'marches.limit_date',
                DB::raw('count(*) as total')
            )
            ->where("postulations.user_id", $id_receve)
            ->whereNotNull("postulations.entreprise_id")
            ->groupby('id_marche')
            ->get();


        return view("entreprise.message_boite", compact(['list_messages_vue', 'list_messages_non_vue', 'list_messages_postuler']));
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
