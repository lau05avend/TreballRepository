<?php

namespace App\Http\Livewire\Obras;

use App\Models\City;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\TipoObra;
use App\Models\Usuario;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public Obra $obra;
    public $image = [];
    public $Usuarios = [];

    public function mount(Obra $obra){
        // $this->obra = Obra::findOrFail($obra->id);
        // $this->obraEdit = Obra::find($obra->id);
        $this->obra = $obra;
        // $this->Usuarios = $this->obra->Usuarios()->pluck('usuarios.id')->toArray();
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
            'obra.EstadoObra' => 'required',
            'obra.MedidaArea' => 'min:1',
            'obra.MedidaPerimetro' => 'Nullable',
            'obra.CondicionDesnivel' => 'Nullable',
            'obra.DetalleCondicionPiso' => 'Nullable',
            'obra.DatosAdicionales' => 'Nullable',
            'obra.DatosAdicionales' => 'Nullable',
            'image.*' => 'Nullable|image'
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

    public function render()
    {
        // $this->Usuarios = $this->obra->Usuarios()->pluck('usuarios.id')->toArray();
        $tipo_obra = TipoObra::get();
        $cliente = Cliente::get();
        $ciudad = City::get();
        $empleados = Usuario::all()->sortBy('id');
        return view('livewire.obras.edit', [
            'ciudad' => $ciudad,
            'tipo_obra' => $tipo_obra,
            'cliente' => $cliente,
            'users' => $empleados
        ]);
    }

    public function update(){
        $this->validate();
        // $obra->Images()->update(['archivo'=>'holaa'])};
        $this->obra->save();

        if(count($this->Usuarios)){
            $this->obra->Usuarios()->sync($this->Usuarios);
        }else{
            $this->obra->Usuarios()->detach();
        }

        if($this->image){
            if($this->obra->Images()->get()->isEmpty()){
                foreach ($this->image as $image) {
                    $imagen = $image->store('obras','public');
                    $this->obra->Images()->create(['archivo'=>$imagen]);
                }
            }else{
                $this->obra->Images()->delete();
                foreach ($this->image as $image) {
                    $imagen = $image->store('obras','public');
                    $this->obra->Images()->create(['archivo'=>$imagen]);
                }
            }
        }


        // $obra = $this->obra;
        // $img = [new App\Models\Image(['archivo'=>'heyy']),new App\Models\Image(['archivo'=>'hola'])]
        // $obra->Images()->saveMany($img)
        // $this->obra->Images()->update(['archivo'=>$imagen]);

        session()->flash('message', 'Obra actualizada satisfactoriamente.');
        return redirect()->route('obra.index');
    }
}
