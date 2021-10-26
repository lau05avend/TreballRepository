<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seccion extends Model
{
    use HasFactory;

    protected $guarded = [];  //desproteger los campos por defecto

    // relacion uno a muchos inversa
    public function Diseno(){
        return $this->belongsTo(Diseno::class);
    }

     // relacion uno a muchos inversa
     public function Color(){
        return $this->belongsTo(Color::class);
    }

}
