<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function register(){

        return view('auth.register');
    }

    public function registerVerify(Request $request){
        $request->validate([
            'email'=> 'required|unique:users,email',
            'password'=> 'required|min:4',
            'password_confirmation'=>'required|same:password'
        ],[
            'email.required' => 'el email es requerido',
            'email.unique' => 'el email ya ha sido usado',
            'password.required' => 'la contraseña es requerida',
            'password_confirmation.required'=> 'la confirmacion de contraseña es requerida'
        ]);

        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login')->with('sucesss', 'Usuario registrado correctamente');
    }

        public function login(){
            return view('auth.login');
        }

        public function loginVerify(Request $request){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:4'
            ], [
                'email.required' => 'el email es requerido',
                'email.unique' => 'el email ya ha sido usado',
            ]);

            if(Auth::attempt(['email'=>$request->email, 'password' => $request->password])){
                return redirect()->route('dashboard');
            }

            return back()->withError(['invalid_credencials'=>'Usuario o contraseña no valida'])->withInput();
        }

}

