<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = 'ruta';
    protected $fillable = [
        'descripcion',
        'precio',
        
    ];
    public $timestaps = false;
    
    public function vuelo(){
        return $this->hasOne('App\Models\Vuelo');
    }
    
    use HasFactory;
    
}
