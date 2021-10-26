<?php

namespace App\Http\Livewire\Diseno;

use App\Models\Diseno;
use App\Models\Obra;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public Diseno $diseno;

    public function mounth(){
        $this->diseno = new Diseno();
    }
    public array $material = [];
    public $image = [];

    public function render()
    {
        $IdObra = Obra::get();
        return view('livewire.Diseno.create',[
            'obra' => $IdObra
        ]);
    }
    public function rules(){
        return [
            'diseno.ImagenPlano'=> ['required'],
            'diseno.ObservacionDiseno'=> 'required |min: 5',
            'diseno.created_at'=> 'required',
            'diseno.updated_at' => 'required',
            'diseno.obra_id ' => 'required',
        ];
    }
    public function validationAttributes (){
        return [
            'ImagenPlano' => 'Imagen del Plano',
            'ObservacionDiseno' => 'Observación de Diseno',

        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store(){
        $this->validate();
        $this->diseno->save();
        $this->diseno->material()->sync($this->material); // para tabla N:M con usuarios

        // foreach ($this->image as $image) {   // imagenes
        //     $imagen = $image->store('diseno','public');
        //     $this->diseno->Images()->create(['archivo'=>$imagen]);
        // }
        session()->flash('message', 'Registro Diseño creado');
        return redirect()->route('diseno.index');

    }
}
