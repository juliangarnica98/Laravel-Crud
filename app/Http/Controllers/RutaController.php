<?php

namespace App\Http\Controllers;
use App\Models\Ruta;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator; 


class RutaController extends Controller
{
    //index rutas
    public function index(Request $request){     
        Paginator::useBootstrap();
        $rutas = Ruta::orderBy('id', 'desc')->paginate(6);
        if($request->ajax())
        {
            return view('ruta.tablaRuta', ['rutas' => $rutas])->render();
        }
        return view('ruta.index',['rutas' => $rutas]);
    }
    
    //listar con ajax
    public function listar(){     
        //return datatables()->collection(Ruta::all())->toJson();
        Paginator::useBootstrap();
        $rutas = Ruta::orderBy('id', 'desc')->paginate(6);
        return view('ruta.tablaRuta',['rutas' => $rutas]);
    }
    
    //guardar nueva ruta
    public function store(Request $request){
        $ruta = New Ruta();
        $ruta->descripcion = $request->origen." - ".$request->destino ;
        $ruta->precio = "COP $".number_format($request->precio, 0);
        $ruta->save();
        return response()->json($ruta);
    }
}
