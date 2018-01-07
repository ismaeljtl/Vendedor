<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required|recaptcha',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function postLogin(Request $request)
    {   
        $var = $request->all();
        $user = DB::table('Usuario')->where('usuario', $var['usuario'])->first();

        $intento = $user->intentos;

        if (Hash::check($request->input("contraseña"), $user->clave))
        {
            DB::table('Usuario')->where('id', $user->id)->update(['intentos' => 0]);
            Auth::loginUsingId($user->id);
            return redirect("productos")->with('status', 'true');
        }
        else{
            $intento = $intento + 1;
            DB::table('Usuario')->where('id', $user->id)->update(['intentos' => $intento]);
            if ($intento == 3){
                return redirect("/")->with('status', 'usuario bloqueado');
            }
            return redirect("/")->with('status', 'false');
        }
    }

    public function getLogout(){   
        Auth::logout();
        session()->flush();
        return redirect("/")->with('status', 'false');
    }
}
