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
use Illuminate\Foundation\Auth\RegistersUsers;


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

    public function showRegistrationForm()
    {
        return view('auth.register0');
    }
}