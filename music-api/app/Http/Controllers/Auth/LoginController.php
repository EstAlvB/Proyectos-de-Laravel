<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){
    
        $credentials = $request->validated();

        if(Auth::attempt($credentials)){
            
            //evita la vulnerabilidad session fixation -->
            $request->session()->regenerate(); 
            return redirect()->route('home');
        }

        return redirect('login')->withErrors(__('auth.failed'));
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        //Por seguridad --->
        $request->session()->invalidate(); //invalida la sesion
        $request->session()->regenerateToken(); //regenera el token csrf

        return redirect()->to('/');
    }
}
