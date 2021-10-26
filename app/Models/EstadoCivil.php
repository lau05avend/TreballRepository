<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    protected $guarded = [];  //desproteger los campos por defecto

    use HasFactory;

    // relacion uno a muchos inversa
    public function Usuario(){
        return $this->hasMany(Usuario::class);
    }

}
