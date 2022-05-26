<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $table = 'vuelo';
    protected $fillable = [
        'id_avion',
        'tipo_avion',
        'nombre_piloto',
        'nombre_copiloto',
        'pasajeros',
        
        
    ];
    public $timestaps = false;



    public function pasajeross(){
        return $this->hasMany('App\Models\Pasajero');
    }
    
    public function ruta(){
        return $this->belongsTo('App\Models\Ruta');
    } 
    use HasFactory;
}
