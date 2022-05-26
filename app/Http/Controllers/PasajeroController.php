<?php

namespace App\Http\Controllers;
use App\Models\Pasajero;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Vuelo;

class PasajeroController extends Controller
{
    public function index(){
        $pasajeros = Pasajero::all();

        // $vuelo = Vuelo::find(1);
        // dd($vuelo->pasajeross);

        return view('pasajero.index', ['rutas' => $pasajeros]);
   }
}
