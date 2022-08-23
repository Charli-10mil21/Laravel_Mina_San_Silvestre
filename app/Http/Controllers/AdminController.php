<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mina;


class AdminController extends Controller
{
     public function inicio(Request $request){
         $users = User::paginate(4);
          $buscar = $request->get('busqueda');
          $datos= Mina::where('lote','LIKE','%'.$buscar.'%')->latest('id')->paginate(4);
        return view('home',['users'=>$users,'datos'=>$datos, 'buscar'=>$buscar]);
    }

    public function editar($id)
    {
          $users = User::findOrFail($id);
            $users->toArray();
      return view('auth.editar', compact('users'));

    }

    public function update(Request $request, $id)
    {
      $userUpdate = User::findOrFail($id);
      $userUpdate->name = $request->name;
      $userUpdate->email = $request->email;
      $userUpdate->password = $request->password;

      $userUpdate->save();

       return back()->with('mensaje', 'Usuario editado');

    }

    public function eliminar($id)
    {
      $usersEliminar = User::findOrFail($id);
      $usersEliminar->delete();

       return back()->with('mensaje', 'Usuario Eliminado');

    }

    
}
