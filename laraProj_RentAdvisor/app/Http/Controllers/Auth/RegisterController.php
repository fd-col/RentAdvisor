<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    use RegistersUsers; // è un trait, la versione sviluppata è un ovverride

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest'); //attiva il middleware di autenticazione, il middleware è in grado di riconoscere l'utente guest (che esiste già)
    }                               //questo fa sì che se un utente già loggato accede a questo controller, esso viene rifiutato

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) //oltre le request, è possibile definire delle r. di validazione anche nel controller
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'min:8', 'max:40', 'unique:users'],
            'nome' => ['required', 'string', 'max:191'],
            'cognome' => ['required', 'string', 'max:191'],
            'genere' => ['required', 'in:M,F,ND'],
            'data_nascita' => ['required', 'date_format:Y-m-d'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'telefono' => ['nullable', 'string','max:13'],
            'password' => ['required', 'string', 'min:8', 'max:191', 'confirmed'],
            'role' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'nome' => $data['nome'],
            'cognome' => $data['cognome'],
            'genere' => $data['genere'],
            'data_nascita' => $data['data_nascita'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
}
