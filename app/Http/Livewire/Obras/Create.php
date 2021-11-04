<?php

namespace App\Http\Livewire\Obras;

use App\Models\City;
use App\Models\Cliente;
use App\Models\Image;
use App\Models\Obra;
use App\Models\TipoObra;
use App\Models\Usuario;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public Obra $obra;
    public array $Usuarios = [];
    public $image = [], $identificator;

    use WithFileUploads;

    public function render()
    {
        $tipo_obra = TipoObra::get();
        $cliente = Cliente::where('isActive','Active')->pluck('NombreCC','id')->toArray();
        $ciudad = City::pluck('ciudad','id')->toArray();
        $empleados = Usuario::all()->sortBy('id');
        return view('livewire.obras.create',[
            'ciudad' => $ciudad,
            'tipo_obra' => $tipo_obra,
            'cliente' => $cliente,
            'users' => $empleados
        ]);
    }

    public function mount(){
        $this->obra = new Obra();
        $this->identificator = rand();   //numero aleatorio
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function rules(){
        return [
            'obra.NombreObra'=> ['required', Rule::unique('obras','NombreObra')->ignore($this->obra), 'min:5'],
            'obra.DireccionObra'=> 'required |min: 5',
            'obra.city_id'=> 'required',
            'obra.TipoMaterialSuelo' => 'required',
            'obra.tipo_obra_id' => 'required',
            'obra.cliente_id' => 'required',
            'obra.MedidaArea' => 'min:1',
            'obra.MedidaPerimetro' => '',
            'obra.CondicionDesnivel' => '',
            'obra.DetalleCondicionPiso' => '',
            'obra.DatosAdicionales' => '',
            'obra.DatosAdicionales' => '',
            'image.*' => 'image',
        ];
    }
    public function validationAttributes (){
        return [
            'NombreObra' => 'Nombre obra',
            'cliente_id' => 'Cliente',
            'city_id' => 'Ciudad',
            'DireccionObra'=> 'Direccion Obra',
            'CiudadObra'=> 'Ciudad Obra',
            'TipoMaterialSuelo' => 'Tipo de obra',
            'tipo_obra_id' => 'Tipo de Material Suelo',
        ];
    }

    public function store(){
        $this->validate();
        $this->obra->save();
        $this->obra->Usuarios()->sync($this->Usuarios); // para tabla N:M con usuarios

        foreach ($this->image as $image) {   // imagenes
            $imagen = $image->store('obras','public');
            $this->obra->Images()->create(['archivo'=>$imagen]);
        }

        session()->flash('message', 'Obra Successfully created.');
        return redirect()->route('obra.index');
    }
}
