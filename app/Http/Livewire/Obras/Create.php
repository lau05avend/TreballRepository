<?php

namespace App\Http\Livewire\Obras;

use App\Events\ObraEvent;
use App\Models\City;
use App\Models\Cliente;
use App\Models\Image;
use App\Models\Obra;
use App\Models\TipoObra;
use App\Models\User;
use App\Models\Usuario;
use App\Notifications\ObraNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public Obra $obra;
    public User $userA;
    public array $Usuarios = [];
    public $image = [], $identificator;
    public $step, $totalSteps;
    public $stepActions = [
        'submit1',
        'submit2',
        'submit3'
    ];

    use WithFileUploads;

    public function render()
    {
        $tipo_obra = TipoObra::get();
        $cliente = Cliente::where('isActive','Active')->pluck('NombreCC','id')->toArray();
        $ciudad = City::pluck('ciudad','id')->toArray();
        $empleados = Usuario::get()->where('EstadoUsuario','Active')->where('Disponibilidad','Disponible')->sortBy('id');
        return view('livewire.obras.create',[
            'ciudad' => $ciudad,
            'tipo_obra' => $tipo_obra,
            'cliente' => $cliente,
            'users' => $empleados
        ]);
    }

    public function mount(){
        $this->step = 0;
        $this->totalSteps = 3;
        $this->obra = new Obra();
        $this->identificator = rand();   //numero aleatorio
        $this->userA = Auth::user();
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
            'tipo_obra_id' => 'Tipo de Material Suelo',
            'image.*' => 'La imagen seleccionada'
        ];
    }

    public function store(){
        // $this->validate();
        // $this->obra->save();
        // $this->obra->Usuarios()->sync($this->Usuarios); // para tabla N:M con usuarios

        // foreach ($this->image as $image) {   // imagenes
        //     $imagen = $image->store('obras','public');
        //     $this->obra->Images()->create(['archivo'=>$imagen]);
        // }

        // if(count($this->obra->Usuarios()->get()) > 0 ){
        //     event(new ObraEvent($this->obra));
        // }

        // session()->flash('message', 'Obra Successfully created.');
        // return redirect()->route('obra.index');
    }
}
