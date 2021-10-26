<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $guarded = [];  //desproteger los campos por defecto

    protected $dates = [
        'dateFiled',
        'updated_at',
        'created_at'
    ];

    //consultas personalizadas
    public function scopeInactive($query){
        return $query->where('obras.isActive','Inactive');
    }

    // relacion uno a muchos inversa
    public function TipoObra(){
        return $this->belongsTo(TipoObra::class);
    }
    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }
    public function City(){
        return $this->belongsTo(City::class);
    }

    //relacion uno a muchos
    public function Actividades(){
        return $this->hasMany(Actividad::class);
    }
    public function Disenos(){
        return $this->hasMany(Diseno::class);
    }

    //relacion muchos a muchos
    public function Usuarios(){
        return $this->belongsToMany(Usuario::class, 'obra_usuario', 'obra_id', 'empleado_id', 'id', 'id')->withTimestamps();
    }

    // relacion polimorfica

    public function Images()
    {
        return $this->morphMany(Image::class, 'modelo');
    }

}

/*
para probar los registros registrados en la bd, se usa:
1. php artisan tinker
2. use app\models\Obra
3.   //para consultar alguna obra

4. $obra->Actividades;  //para acceder a todas las actividades de esa determinada obra.


SENTENCIAS CHEVRES ejs
- $user->posts()->where('active', 1)->get();
-$comment = Post::find(1)->comments()
                    ->where('title', 'foo')
                    ->first();

*/
