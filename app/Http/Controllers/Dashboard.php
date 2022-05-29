<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Entreprise;
use App\Models\EntrepriseUser;
use App\Models\Marche;
use App\Models\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;

class Dashboard extends Controller
{
    use HasRoleAndPermission;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('admin')) {
            $EntreprisesCount = Entreprise::all()->count();
            $MarchesCount = Marche::all()->count();
            $depenses = Contrat::whereYear('created_at', date('Y'))->sum('prix');
            return view('admin.dashboard',compact(["EntreprisesCount","MarchesCount","depenses"]));
        }
        if ($user->hasRole('user')) {
            $id_entreprise = EntrepriseUser::where('user_id',$user->id)->first('entreprise_id');
            $NbrContrats = Contrat::where('etat',0)
            ->join('entreprise_users', 'entreprise_id', '=', 'id_entreprise')
            ->where('user_id',$user->id)
            ->count();
            $NbrRfi = DB::table('postulations')->where('etat',2)
            ->join('entreprise_users', 'postulations.entreprise_id', '=', 'entreprise_users.entreprise_id')
            ->where('entreprise_users.user_id',$user->id)
            ->count();
            $NbrRfq = DB::table('postulations')->whereBetween('etat',[3,4])
            ->join('entreprise_users', 'postulations.entreprise_id', '=', 'entreprise_users.entreprise_id')
            ->where('entreprise_users.user_id',$user->id)
            ->count();
            $listofrfi = DB::table('postulations')->where('postulations.etat',2)
            ->join('entreprise_users', 'postulations.entreprise_id', '=', 'entreprise_users.entreprise_id')
            ->join('marches', 'marches.id', '=', 'postulations.marche_id')
            ->where('entreprise_users.user_id',$user->id)
            ->get();
            $listofrfq = DB::table('postulations')->whereBetween('postulations.etat',[3,4])
            ->join('entreprise_users', 'postulations.entreprise_id', '=', 'entreprise_users.entreprise_id')
            ->join('marches', 'marches.id', '=', 'postulations.marche_id')
            ->where('entreprise_users.user_id',$user->id)
            ->get();
            return view('entreprise.dashboard',compact(["NbrContrats","NbrRfi","NbrRfq","listofrfi","listofrfq"]));
        }
        if ($user->hasRole('chef')) {
            return redirect()-> route('statistics_chef');
        }
        if ($user->hasRole('achat')) {
            return redirect()-> route('statistics_achat');
        }
        return view('homepage');
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
