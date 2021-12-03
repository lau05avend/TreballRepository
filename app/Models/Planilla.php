<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    use HasFactory;
    protected $guarded = [];//desproteger los campos por defecto

    protected $dates = [
        'created_at', 
        'updated_at'
        // 'FechaExpiracion',
        // 'FechaPlanilla'
    ];

    public function Empleado(){
        return $this->belongsTo(Usuario::class, 'empleado_id');
    }

}


