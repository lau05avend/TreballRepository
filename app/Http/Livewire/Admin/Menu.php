<?php

namespace App\Http\Livewire\Admin;

use App\Models\Obra;
use Livewire\Component;

class Menu extends Component
{
    public $newObras = [];

    public function mount(){

    }

    public function newObras(){
        $this->newObras[0] = Obra::whereMonth('created_at',date('m'))
                            ->whereYear('created_at', date('Y'))
                            ->get()
                            ->count();

        $oldObras = Obra::whereMonth('created_at',(date('m')-1))   //arregalr enero PROBLEMA FUTURO
                    ->whereYear('created_at', date('Y'))
                    ->get()
                    ->count();
        // $this->newObras[1] = round((100 * $oldObras)/$this->newObras[0]);

        $totalPercent = 100/20; // porcentaje por cada obra
        $this->newObras[1] = ( $totalPercent*1 - $totalPercent*5 );  //diferencia entre mes anterior y actual
    }

    public function render()
    {
        $this->newObras();
        $obrasRec = Obra::take(10)->latest('created_at');
        return view('livewire.admin.menu', [
            'obraslast' => $obrasRec
        ]);
    }
}
