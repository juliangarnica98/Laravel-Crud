<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $table = 'pasajero';
    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'correo',
        'telefono',
        
        
    ];
    public function vuelo(){
        return $this->belongsTo('App\Models\Vuelo');
    }
    public $timestaps = false;
    use HasFactory;
}
