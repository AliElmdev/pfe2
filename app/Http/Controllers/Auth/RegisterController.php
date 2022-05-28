<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegistrationRequest;
use App\Models\EntrepriseUser;
use Error;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'title'=>['required','string', 'max:100'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
        $user = config('roles.models.defaultUser')::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $role = config('roles.models.role')::where('name', '=', 'User')->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        $profile = new Profile([
            'titre' => $data['titre'],
        ]);
        $entreprise = new Entreprise([
            
        ]);
        $user->profile()->save($profile);
        $user->entreprise()->save($entreprise);
        return $user;
    }

    protected function create_cost(RegistrationRequest $data)
    {

        $request = request();

        $certificates = implode(",", $data['certificats']);

        // saving file doc cau
        $profileImage = $request->file('doc_cau');
        $profileImageSaveAsName = time() . Auth::id() . "-CAU." . $profileImage->getClientOriginalExtension();
        $upload_path = 'Companies_files/'.$data['commercial_name'].'/';
        $doc_cau_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        // saving file doc statuts l'entreprise
        $profileImage = $request->file('doc_status_entreprise');
        $profileImageSaveAsName = time() . Auth::id() . "-STATUS." . $profileImage->getClientOriginalExtension();
        $upload_path = 'Companies_files/'.$data['commercial_name'].'/';
        $doc_status_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        // saving file doc copie de l'attestation d'enregistrement au registre du commerce ou équivalent.
        $profileImage = $request->file('doc_registre');
        $profileImageSaveAsName = time() . Auth::id() . "-REGISTRE." . $profileImage->getClientOriginalExtension();
        $upload_path = 'Companies_files/'.$data['commercial_name'].'/';
        $doc_registre_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        // saving file doc des bilans et CPC certifiés des 3 exercices précédents.
        $profileImage = $request->file('doc_cpc');
        $profileImageSaveAsName = time() . Auth::id() . "-CPC." . $profileImage->getClientOriginalExtension();
        $upload_path = 'Companies_files/'.$data['commercial_name'].'/';
        $doc_cpc_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);

        // saving file doc références clients sur l'ensemble d'activités.
        $profileImage = $request->file('ref_clients');
        $profileImageSaveAsName = time() . Auth::id() . "-REF." . $profileImage->getClientOriginalExtension();
        $upload_path = 'Companies_files/'.$data['commercial_name'].'/';
        $doc_ref_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        
        
        $user = config('roles.models.defaultUser')::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $role = config('roles.models.role')::where('name', '=', 'user')->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        $profile = new Profile([
            'title' => $data['title'],
            'service_title' => $data['service_title'],
            'phone' => $data['phone'],
            'lang' => $data['lang'],
        ]);

        $entreprise = new Entreprise([
            'social_name' => $data['social_name'],
            'commercial_name' => $data['commercial_name'],
            'company_type' => $data['company_type'],
            'ice_num' => $data['ice_num'],
            'siret_num' => $data['siret_num'],
            'adresse' => $data['adresse'],
            'zip_code' => $data['zip_code'],
            'city' => $data['city'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            'ismoroccan' => $data['ismoroccan'],
            'iscreated' => $data['iscreated'],
            'effective_total' => $data['effective_total'],
            'doc_cau' => $doc_cau_url,
            'doc_status_entreprise' => $doc_status_url, 
            'doc_registre' => $doc_registre_url,
            'doc_cpc' => $doc_cpc_url,
            'activite_entreprise' => $data['activite_entreprise'],
            'certificats' => $certificates,
            'ref_clients' => $doc_ref_url,
            'rules_accept' => $data['rules_accept'],
        ]);
        $user->profile()->save($profile);
        $user->entreprise()->save($entreprise);
        $entreprise_user = new EntrepriseUser();
        $entreprise_user->user_id = $user->id;
        $entreprise_user->entreprise_id = $entreprise->id;
        $entreprise_user->role = 'primaire';
        $entreprise_user->save();
    
        return redirect()->route('ValiderInscription', ['id' => $entreprise->id]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
}