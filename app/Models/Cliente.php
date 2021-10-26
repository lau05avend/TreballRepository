<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $guarded = [];  //desproteger los campos por defecto
    use HasFactory;

    public function TipoIdentificacion(){
        return $this->belongsTo(TipoIdentificacion::class);
    }
    public function TipoCliente(){
        return $this->belongsTo(TipoCliente::class);
    }
     //relacion uno a muchos
    public function Obras(){
        return $this->hasMany(Obra::class);
    }
    public function Novedades(){
        return $this->hasMany(Novedad::class);
    }
}
