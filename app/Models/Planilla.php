<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    use HasFactory;
    protected $guarded = [];//desproteger los campos por defecto

    public function planilla(){
        return $this->belongsTo(Planilla::class);
    }

}

