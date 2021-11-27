<?php

namespace App\Http\Livewire\Obras;

use App\Models\Obra;
use Livewire\Component;

class Show extends Component
{
    public Obra $obra;
    public $users;
    public $openModal = true;

    public function mount(Obra $obra){
        $this->obra = Obra::find($obra->id);
        $this->users = $obra->Usuarios()->get()->sortBy('id');
        // $this->obra = $obra;
    }

    public function render()
    {
        return view('livewire.obras.show');
    }
}
