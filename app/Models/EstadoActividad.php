<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoActividad extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    //relacion uno a muchos
    public function Actividades()
    {
        return $this->hasMany(Actividad::class);
    }
}
