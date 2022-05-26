<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use App\Models\Vuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class VueloController extends Controller
{
   public function index(){
        $vuelos = Vuelo::all();
       
      //   $vuelo = Vuelo::find(1);
      //   dd($vuelo->ruta);

        
        return view('vuelo.index', ['vuelos' => $vuelos]);
   }
}
