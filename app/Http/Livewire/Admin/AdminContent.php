<?php

namespace App\Http\Livewire\Admin;

use App\Models\Obra;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminContent extends Component
{

    public User $userA;

    public function mount(){
        $this->userA = Auth::user();
    }

    public function render()
    {
        if($this->userA->getRoleNames()[0] != 'Admin' && $this->userA->getRoleNames()[0] != 'Gerente' && $this->userA->getRoleNames()[0] != 'Coordinador'){

            $obraCalendar = $this->userA->Cargo()->get()->first()->Obras()->where('obras.isActive','Active')
                                ->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])->get();
            if(count($obraCalendar) <= 0 ){
                $obraCalendar = 0;
            }
            else if( count($obraCalendar) > 0){
                $obraCalendar = $obraCalendar->first()['id'];
            }
        }
        else if($this->userA->getRoleNames()[0] == 'Coordinador'){
            $obraCalendar = $this->userA->Cargo()->get()->first()->Obras()->select('obras.id')->where('obras.isActive','Active')->get()->first()['id'];
        }
        if($this->userA->getRoleNames()[0] == 'Gerente'){
            $obraCalendar = Obra::where('obras.isActive','Active')->get()->first()['id'];
        }else if($this->userA->getRoleNames()[0] == 'Admin'){
            $obraCalendar = Obra::get()->first()['id'];
        }

        return view('livewire.admin.admin-content',[
            'obraCal' => $obraCalendar
        ]);
    }
}
