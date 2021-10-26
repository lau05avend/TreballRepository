<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];  //desproteger los campos por defecto
    use HasFactory;
    public $timestamps = false;

    // relacion uno a muchos inversa
    public function Usuario(){
        return $this->hasMany(Usuario::class, 'city_id', 'id');
    }
    public function Obras(){
        return $this->hasMany(Obra::class);
    }
}
