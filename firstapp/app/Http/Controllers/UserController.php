<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //página principal al iniciar sesión
    public function showCorrectHomepage(){
        if (auth()->check()) {
            return view('homepage-feed');
        } else{
            return view('homepage');
        }
    }

    //inicio de sesión
    public function login(Request $request){
        $entradas = $request->validate([
            'loginusername'=>'required',
            'loginpassword'=>'required'
        ]);

        if (auth()->attempt(['username' => $entradas['loginusername'], 'password' => $entradas['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success','Has iniciado correctamente tu sesión');
        } 
        else{
            return redirect('/')->with('error','Error al iniciar sesión, intentalo de nuevo');
        }
    }

    //cerrar sesión
    public function logout(){
        auth()->logout();
        return redirect('/')->with('success','Has cerrado tu sesión exitosamente');
    }

    //Regitro de usuarios a la BD
    public function register(Request $request){
        $entradas = $request->validate([
            'username' => ['required','min:3','max:20',Rule::unique('users','username')],
            'email' => ['required','email',Rule::unique('users','email')],
            'password' => ['required','min:8','confirmed']
        ]);
        
        $entradas['password'] = bcrypt($entradas['password']);
        
        $user = User::create($entradas);
        auth()->login($user);
        return redirect('/')->with('success','Cuenta creada');
    }
}
