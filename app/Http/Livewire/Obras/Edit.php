<?php

namespace App\Http\Livewire\Obras;

use App\Events\ObraEvent;
use App\Models\City;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\TipoObra;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;

class Edit extends Component
{
    use WithFileUploads;

    public Obra $obra;
    public User $userA;
    public $image = [];
    public $Usuarios = [];
    public $step, $totalSteps;
    public $stepActions = [
        'submit1',
        'submit2',
        'submit3'
    ];

    public function mount(Obra $obra){
        // $this->obra = Obra::findOrFail($obra->id);
        // $this->obraEdit = Obra::find($obra->id);
        $this->obra = Obra::find($obra->id);
        $this->step = 0;
        $this->totalSteps = 3;
        $this->userA = Auth::user();
        // $this->Usuarios = $this->obra->Usuarios()->pluck('usuarios.id')->toArray();
    }

    public function rules(){
        return [
            'obra.NombreObra'=> ['required', Rule::unique('obras','NombreObra')->ignore($this->obra), 'min:5'],
            'obra.DireccionObra'=> 'required |min: 5',
            'obra.city_id'=> 'required',
            'obra.TipoMaterialSuelo' => 'required',
            'obra.tipo_obra_id' => 'required',
            'obra.cliente_id' => 'required',
            'obra.MedidaArea' => 'nullable',
            'obra.MedidaPerimetro' => 'nullable',
            'obra.EstadoObra' => 'required',
            'obra.CondicionDesnivel' => 'nullable',
            'obra.DetalleCondicionPiso' => 'nullable',
            'obra.DatosAdicionales' => 'nullable',
            'obra.DatosAdicionales' => 'nullable',
            'image.*' => ['required', 'mimes:jpg,jpeg,png', 'max:1024']
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
            'EstadoObra' => 'Estado de obra',
            'tipo_obra_id' => 'Tipo de Material Suelo',
            'image.*' => 'La imagen seleccionada'
        ];
    }


    public function render()
    {
        // $this->Usuarios = $this->obra->Usuarios()->pluck('usuarios.id')->toArray();
        $tipo_obra = TipoObra::get();
        $cliente = Cliente::where('isActive','Active')->pluck('NombreCC','id')->toArray();
        $ciudad = City::pluck('ciudad','id')->toArray();
        $empleados = Usuario::get()->where('EstadoUsuario','Active')->where('Disponibilidad','Disponible')->sortBy('id');
        return view('livewire.obras.edit', [
            'ciudad' => $ciudad,
            'tipo_obra' => $tipo_obra,
            'cliente' => $cliente,
            'users' => $empleados
        ]);
    }

    public function decreaseStep(){
        if($this->step > 0){
            $this->step--;
        }
    }
    public function submitStep(){
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    public function submit1(){
        $this->validate(
            [
                'obra.NombreObra'=> ['required', Rule::unique('obras','NombreObra')->ignore($this->obra), 'min:5'],
                'obra.DireccionObra'=> 'required |min: 5',
                'obra.city_id'=> 'required',
                'obra.cliente_id' => 'required',
                'obra.tipo_obra_id' => 'required',
                'obra.MedidaArea' => 'nullable',
                'obra.MedidaPerimetro' => 'nullable',
            ],[],[
                'NombreObra' => 'Nombre obra',
                'cliente_id' => 'Cliente',
                'city_id' => 'Ciudad',
                'DireccionObra'=> 'Direccion Obra',
                'CiudadObra'=> 'Ciudad Obra',
            ]);
        $this->step++;
    }

    public function submit2(){
        $this->validate(
            [
                'obra.CondicionDesnivel' => 'nullable',
                'obra.DetalleCondicionPiso' => 'nullable',
                'obra.DatosAdicionales' => 'nullable',
                'obra.TipoMaterialSuelo' => 'required',
                'image.*' => ['required', 'mimes:jpg,jpeg,png', 'max:1024']
            ],[],[
                'CondicionDesnivel' => 'Condicion Desnivel',
                'DetalleCondicionPiso' => 'Detalle Condicion Piso',
                'DatosAdicionales' => 'Datos Adicionales',
                'TipoMaterialSuelo' => 'Tipo de obra',
                'image.*' => 'La imagen seleccionada'
            ]
            );
        $this->step++;
    }

    public function submit3(){
        $this->validate();
        $this->obra->save();
        $this->obra->Usuarios()->sync($this->Usuarios); // para tabla N:M con usuarios

        if(count($this->obra->Images) >0){
            // dd($this->obra->Images);
        }

        foreach ($this->image as $image) {   // imagenes
            $imagen = $image->store('obras','public');
            $this->obra->Images()->create(['archivo'=>$imagen]);
        }

        if(count($this->obra->Usuarios()->get()) > 0 ){
            event(new ObraEvent($this->obra));
        }

        session()->flash('message', 'Obra creada satisfactoriamente.');
        return redirect()->route('obra.index');
    }

    public function update(){
        $this->validate();
        $this->obra->save();
        // $obra->Images()->update(['archivo'=>'holaa'])};

        if(count($this->Usuarios)){
            $this->obra->Usuarios()->sync($this->Usuarios);
            $this->obra->touch();  //update only update_at campo
        }else{
            $this->obra->Usuarios()->detach();
            $this->obra->touch();
        }

        if($this->image){
            if($this->obra->Images()->get()->isEmpty()){
                foreach ($this->image as $image) {
                    $imagen = $image->store('obras','public');
                    // $imagen = $image->storeAs('obras',$image->getClientOriginalName(),'public');
                    $this->obra->Images()->create(['archivo'=>$imagen]);
                }
            }else{
                foreach ($this->obra->Images()->get() as $imageO) {
                    if (Storage::disk('public')->exists($imageO->archivo)) {
                        unlink(storage_path('app/public/'.$imageO->archivo));
                        $this->emit('a','siii');
                    }else{
                        $this->emit('a','noooo');
                    }
                }
                $this->obra->Images()->delete();
                foreach ($this->image as $image) {
                    $imagen = $image->store('obras','public');
                    $this->obra->Images()->create(['archivo'=>$imagen]);
                }
            }
            $this->obra->touch();
        }

        // $img = [new App\Models\Image(['archivo'=>'heyy']),new App\Models\Image(['archivo'=>'hola'])]
        // $obra->Images()->saveMany($img)
        // $this->obra->Images()->update(['archivo'=>$imagen]);


        session()->flash('message', 'Obra actualizada satisfactoriamente.');
        // return redirect()->to('/obras')
        return redirect()->route('obra.index');
        // ->with('message',__('Obra actualizada eghb.'));
    }
}
