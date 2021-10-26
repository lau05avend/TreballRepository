<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    
    //relacion uno a muchos
    public function seccion(){
        return $this->hasMany(seccion::class);
    }

    //relacion uno a muchos
    public function Material(){
        return $this->hasMany(Material::class);
    }
}
