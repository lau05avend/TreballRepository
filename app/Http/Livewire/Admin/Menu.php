<?php

namespace App\Http\Livewire\Admin;

use App\Models\Obra;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        $obrasRec = Obra::take(10)->latest('created_at');
        return view('livewire.admin.menu', [
            'obraslast' => $obrasRec
        ]);
    }
}
