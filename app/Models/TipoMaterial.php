<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    protected $guarded = [];  //desproteger los campos por defecto
    public $timestamps = false;

    use HasFactory;

    //relacion uno a muchos
    public function Materiales(){
        return $this->hasMany(Material::class);
    }
}
