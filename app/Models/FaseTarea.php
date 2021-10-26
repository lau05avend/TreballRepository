<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaseTarea extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['NombreFase','DescripcionFase'];

    //relacion uno a muchos
    public function Actividades()
    {
        return $this->hasMany(Actividad::class);
    }
}
