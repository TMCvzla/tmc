<?php

namespace App\Http\Controllers\Auth;

use App\Cliente;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'usu_estatus' => User::$EST_ACTIVO,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Cliente::create([
            'cli_nombre' => $data['name'],
            'cli_ci' => $data['cipre'] . $data['ci'],
            'cli_email' => $data['email'],
            'usu_id' => $user->id,
            'cli_direccionfiscal' => $data['dirfiscal'],
            'cli_direccionenvio' => $data['direnvio'],
            'cli_banco' => $data['banco'],
            'cli_nrocuenta' => $data['cuenta'],
            'cli_tipocuenta' => $data['tipocuenta']
        ]);

        return $user;
    }
}
