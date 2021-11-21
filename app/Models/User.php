<?php

namespace App\Models;

use Illuminate\Auth\Notifications;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'NumeroDocumento'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function cargo() {
        if($this->RolExterno == 'empleado'){
            return $this->hasOne(Usuario::class,'user_id');
        }else if($this->RolExterno == 'cliente'){
            return $this->hasOne(Cliente::class,'user_id');
        }
    }

    // has many through
    public function Planillas()
    {
        return $this->hasManyThrough(Planilla::class,Usuario::class, 'user_id','empleado_id');
    }
    public function Obras()
    {
        return $this->cargo()
            ->join('obra_usuario','empleado_id','=','empleados.id')
            ->leftJoin('obras','obras.id','=','obra_usuario.obra_id')
            ->select('obras.*');

        // return $this->hasManyThrough('obra_usuario',Usuario::class, 'user_id','empleado_id');
    }

    // public function cliente(){
    //     return $this->hasOne(Cliente::class, 'user_id');
    // }
    // public function empleado(){
    //     return $this->hasOne(Usuario::class,'user_id');
    // }

}
