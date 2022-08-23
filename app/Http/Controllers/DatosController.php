<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mina;
use Illuminate\Support\Facades\DB;



class DatosController extends Controller
{
    public function inicio(){
         
          $datos = Mina::paginate(4);
         $datos->toArray();
        return view('auth.registerDatos', compact('datos'));
    }

    public function crear(Request $request){
        
        $datonuevo = new Mina;
        $datonuevo->fecha = $request->fecha;
        $datonuevo->lote = $request->lote;
        $datonuevo->nombre = $request->nombre;
        $datonuevo->pesoBruto = $request->pesoBruto;
        $datonuevo->pesoTaza = $request->pesoTaza;
        $datonuevo->placa = $request->placa;
        $datonuevo->Observaciones = $request->Observaciones;

        $datonuevo->save();

        return back()->with('mensaje', 'Dato Resgistrado');

    }

     public function leyes(Request $request){
          $buscar = $request->get('busqueda');
          $datos= Mina::where('lote','LIKE','%'.$buscar.'%')->latest('id')->paginate(4);
        return view('auth.registerLeyes', ['datos'=>$datos, 'buscar'=>$buscar]);
    }



     public function editarDatos($id)
    {
          $datos = Mina::findOrFail($id);
            $datos->toArray();
      return view('auth.editarDatos', compact('datos'));

    }

    public function updateDatos(Request $request, $id)
    {
      
      $datosUpdate = Mina::findOrFail($id);
      $datosUpdate->lote = $request->lote;
      $datosUpdate->zinc = $request->zinc;
      $datosUpdate->plata = $request->plata;
      $datosUpdate->plomo = $request->plomo;
      $datosUpdate->antimonio = $request->antimonio;

      $datosUpdate->save();

       return back()->with('mensaje', 'Leyes actualizadas');

    }
    

    public function caja(Request $request){
          $buscar = $request->get('busqueda');
          $datos= Mina::where('lote','LIKE','%'.$buscar.'%')->latest('id')->paginate(4);
        return view('auth.caja', ['datos'=>$datos, 'buscar'=>$buscar]);
    }

     public function editarAnticipo($id)
    {
          $datos = Mina::findOrFail($id);
            $datos->toArray();
      return view('auth.editarAnticipo', compact('datos'));

    }

    public function updateAnticipo(Request $request, $id)
    {
      
      $datosUpdate = Mina::findOrFail($id);
      $datosUpdate->anticipo = $request->anticipo;
      $datosUpdate->save();

       return back()->with('mensaje', 'Anticipo Guardado');

    }

    

    
}
