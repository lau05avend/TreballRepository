<?php

namespace App\Policies;

use App\Models\Actividad;
use App\Models\Obra;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActividadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function AccessActividad(User $user){
        if($user->can('calendario_access')){
            return true;
        }
    }
    public function CreateActividad(User $user, $obra){
        if($user->can('calendario_create')){
            $obra = Obra::find($obra);
            if($obra->EstadoObra == 'Activa' || $obra->EstadoObra == 'Sin Iniciar'){
                return true;
            }
        }
    }
    public function AllActividad(User $user, $obra){
        if($user->can('calendario_all')){
            $obraG = Obra::select(['obras.*'])->where('obras.isActive','Active')->where('obras.id',$obra)->get()->count();
            if($obraG == 1){
                return true;
            }
        }
    }
    public function ShowActividad(User $user){
        if($user->can('calendario_show')){
            return true;
        }
    }
    public function UpdateActividad(User $user, $obra){
        if($user->can('calendario_edit')){
            $obra = Obra::find($obra);
            if($obra->EstadoObra == 'Activa' || $obra->EstadoObra == 'Sin Iniciar'){
                return true;
            }
        }
    }
    public function DeleteActividad(User $user){
        if($user->can('calendario_delete')){
            return true;
        }
    }
    public function ActiveActividad(User $user){
        if($user->can('calendario_active')){
            return true;
        }
    }
    public function CalendarActividad(User $user){
        if($user->can('calendario_usuario_save')){
            return true;
        }
    }

    public function AccessObraCalendar(User $user,$obra){
        if($user->getRoleNames()[0] != 'Cliente' && $user->getRoleNames()[0] != 'Gerente'  && $user->getRoleNames()[0] != 'Coordinador'){
            $obraa = Obra::select(['obras.*'])
                        ->where('obra_usuario.obra_id','=', $obra)
                        ->where('obra_usuario.empleado_id','=', $user->cargo()->get()->first()->id)
                        ->Join('obra_usuario','obras.id','=','obra_id')
                        ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                        ->get()->count();
        }
        else if($user->getRoleNames()[0] == 'Coordinador'){
            $obraa = Obra::select(['obras.*'])
                        ->where('obra_usuario.obra_id','=', $obra)
                        ->where('obra_usuario.empleado_id','=', $user->cargo()->get()->first()->id)->Join('obra_usuario','obras.id','=','obra_id')
                        ->where('obras.isActive','Active')
                        ->get()->count();
        }
        else if($user->getRoleNames()[0] == 'Cliente'){
            $obraa = Obra::select(['obras.*'])->where('obras.cliente_id','=', $user->cargo()->get()->first()->id)->where('obras.id', $obra)
                    ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                    ->get()->count();
        }
        if($obraa >= 1){
            return true;
        }
    }

    public function showBread($op = 0)
    {
        // $this->authorize('AccessObra', Obra::class);
        if($op != 0 && $op > 0){
            return redirect()->route('obra.index')->with('openShow',[true,$op]);
        }
        else if($op == 0){
            return redirect()->route('clientes');
        }
    }

    public function RutasDesarrolladorA(User $user){
        if($user->getRoleNames()[0] == 'Admin'){
            return true;
        }
    }
}
