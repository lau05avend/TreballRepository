<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    protected $guarded = [];  //desproteger los campos por defecto

    use HasFactory;
    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function TipoNovedad(){
        return $this->belongsTo(TipoNovedad::class);
    }
    public function Usuario(){
        return $this->belongsTo(Usuario::class, 'empleado_id', 'id');
    }
    public function Actividad(){
        return $this->belongsTo(Actividad::class);
    }

}
