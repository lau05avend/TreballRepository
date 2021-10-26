<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCliente extends Model
{
    protected $guarded = [];  //desproteger los campos por defecto

    use HasFactory;
  //relacion uno a muchos
  public function Cliente(){
    return $this->hasMany(Cliente::class);
}
}
