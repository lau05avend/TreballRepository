<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $guarded = [];  //desproteger los campos por defecto

    use HasFactory;

    public $orderable = [
        'id',
        'DescripcionMat',
        'updated_at',
        'created_at',
    ];

     // relacion uno a muchos inversa
     public function Color(){
        return $this->belongsTo(Color::class);
    }
     // relacion uno a muchos inversa
     public function TipoMaterial(){
        return $this->belongsTo(TipoMaterial::class);
    }
    public function diseno(){
        return $this->belongsToMany(diseno::class);
    }


}
