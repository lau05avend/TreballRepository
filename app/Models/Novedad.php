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

    public function reportadoPor() {
        if($this->cliente_id != null && $this->empleado_id == null){
            return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
        }else if($this->empleado_id != null && $this->cliente_id == null){
            return $this->belongsTo(Usuario::class, 'empleado_id', 'id');
        }
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function Actividad(){
        return $this->belongsTo(Actividad::class);
    }

}
