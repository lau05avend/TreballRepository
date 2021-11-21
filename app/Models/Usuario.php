<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = "empleados";

    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //relacion uno a muchos
    public function Rol(){
        return $this->belongsTo(Rol::class);
    }
    public function EstadoCivil(){
        return $this->belongsTo(EstadoCivil::class);
    }
    public function Ciudad(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function TipoIdentificacion(){
        return $this->belongsTo(TipoIdentificacion::class);
    }
     //relacion uno a muchos
     public function Novedades(){
        return $this->hasMany(Novedad::class, 'novedad_id');
     }
     public function Planillas(){
        return $this->hasMany(Planilla::class, 'empleado_id');
     }

    //relacion muchos a muchos
    public function Actividades(){
        return $this->belongsToMany(Actividad::class)->withTimestamps();
    }

    public function Obras(){
        return $this->belongsToMany(Obra::class,'obra_usuario', 'empleado_id', 'obra_id', 'id', 'id')->withTimestamps();
    }
}

/*
METODOS CHEVRES
- Usuario::find(3)->Actividades->orderBy('NombreActividad')->get();
-

*/
