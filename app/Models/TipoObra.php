<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoObra extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tipo_obras";
    protected $fillable = ['TipoObra', 'DescripcionTO'];

    //relacion uno a muchos
    public function Obras(){
        return $this->hasMany(Obra::class);  //metodo encargado de recuperar la coleccion de obras que pertenecen a ese tipo
    }
    public function latestOrder()   //obtener las obras registradas mas recientes
    {
        return $this->hasOne(Obra::class)->latestOfMany();
    }
    public function oldestOrder() //obtener la mas antigua
    {
        return $this->hasOne(Obra::class)->oldestOfMany();
    }
}
