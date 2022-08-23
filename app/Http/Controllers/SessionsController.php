<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store()
    {
        if(auth()->attempt(request(["email", "password"])) == false) {
            return back()->withErrors([
                'message' => 'el correo o contraseña es incorrecto, porfavor intente de nuevo',]);
        }


        if(auth()->user()->cargo == 'Administrador'){
            return redirect()->to('/home');
        }else{
            if(auth()->user()->cargo == 'registrador'){
                return redirect()->to('/datos');
            }else{
                if(auth()->user()->cargo == 'Encargado Leyes'){
                    return redirect()->to('/leyes');
                }else{
                    if (auth()->user()->cargo == 'caja') {
                        return redirect()->to('/caja');
                    }
                }
            }
        }
        
    }


}
