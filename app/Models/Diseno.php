<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    use HasFactory;
    protected $guarded = [];//proteger los datos por defecto

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function Obra(){
        return $this->belongsTo(Obra::class);
    }

    //relacion uno a muchos
    public function secciones(){
        return $this->hasMany(seccion::class);
    }
    public function material(){
        return $this->belongsToMany(Material::class, 'material_diseno');
    }

    //relacion polimorfica
    public function Images()
    {
        return $this->morphMany(Image::class, 'modelo');
    }

}
