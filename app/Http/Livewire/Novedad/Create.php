<?php

namespace App\Http\Livewire\Novedad;

use App\Models\Actividad;
use App\Models\Cliente;
use App\Models\Novedad;
use App\Models\TipoNovedad;
use App\Models\Usuario;
use Facade\FlareClient\Http\Client;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public Novedad $novedad;
    public array $Usuarios = [];
    public $image;
    public $TipoNov, $Acti, $Cli, $Usu;

    use WithFileUploads;

    public function mount(){
        $this->novedad = new Novedad();
        $this->TipoNov=TipoNovedad::all()->sortBy('id');
        $this->Acti=Actividad::all()->sortBy('id');
        $this->Usu=Usuario::all()->sortBy('id');
        $this->Cli=Cliente::all()->sortBy('id');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function rules(){
        return [
            'AsuntoNovedad' => 'required',
            'EstadoNovedad' => 'required',
            'DescripcionN' => 'required',
            'tipo_novedad_id' => 'required',
            'actividad_id' => 'required',
            'usuario_id' => 'nulleable',
            'cliente_id' => 'nulleable'
        ];
    }
    public function validationAttributes (){
        return [
            'AsuntoNovedad' => 'Asunto de la Novedad',
            'EstadoNovedad' => 'Cliente',
            'DescripcionN' => 'Ciudad',
            'tipo_novedad_id'=> 'Direccion Obra',
            'actividad_id'=> 'Ciudad Obra',
            'usuario_id' => 'Tipo de obra',
            'cliente_id' => 'Tipo de Material Suelo',

        ];
    }

    public function store(){
        $this->validate();
        $this->novedad->save();
        // $this->obra->Usuarios()->sync($this->Usuarios);

        session()->flash('message', 'Novedad satisfactoriamente creada.');
        return redirect()->route('novedad.index');
    }

}
