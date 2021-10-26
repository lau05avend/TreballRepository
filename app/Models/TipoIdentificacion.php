<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIdentificacion extends Model
{
    use HasFactory;
    public $timestamps = false;

    //relacion uno a muchos
    public function Usuarios(){
        return $this->hasMany(Usuario::class);
    }
     //relacion uno a muchos
     public function Cliente(){
        return $this->hasMany(Cliente::class);
    }
}
