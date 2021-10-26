<?php

namespace App\Http\Livewire\Cliente;

use App\Http\Livewire\WithSorting;
use App\Models\Cliente;
use App\Models\TipoCliente;
use App\Models\TipoIdentificacion;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;   //para paginacion
    use WithSorting;     //para ordenar por titulo

    public Cliente $cliente;
    public $search;
    public $perPage = '10';
    protected $queryString = [
        'search' => ['except' => ''],
        'filterCliente' => ['except' => 'Active']
    ];
    public $openDelete = false, $idC , $filterCliente = 'Active';

    public function updatingSearch(){   //search dinamico, necesario
        $this->resetPage();
    }
    public function updatingPerPage()  // paginacion dinamica, necesario
    {
        $this->resetPage();
    }

    public function updated($propertyName)    //validaciones real-time
    {
        $this->validateOnly($propertyName);
    }

    public function rules(){
        return [
            'cliente.NombreCC' => ['required',Rule::unique('clientes','NombreCC')->ignore($this->cliente)],
            'cliente.NumIdentificacion' => ['required',Rule::unique('clientes','NumIdentificacion')->ignore($this->cliente),'min:5','max:15'],
            'cliente.NumCelular' => 'required|min:10|max:10 ',
            'cliente.NumTelefono' => 'required | min:7 | max:7',
            'cliente.CorreoCliente' => ['required',Rule::unique('clientes','CorreoCliente')->ignore($this->cliente),'email'],
            'cliente.tipo_identificacion_id' => 'required',
            'cliente.tipo_cliente_id' => 'required',
            'cliente.ContrasenaC' => 'required',
            'cliente.FotoL' => 'nullable'
        ];
    }
    public function validationAttributes (){
        return [
            'NombreCC' => 'Nombre Completo',
            'NumIdentificacion' => 'Num.Documento',
            'NumCelular' => 'Num.Celular',
            'NumTelefono' => 'Num.Telefono',
            'CorreoCliente' => 'Correo electronico',
            'tipo_identificacion_id' => 'Tipo Identificación',
            'tipo_cliente_id' => 'Tipo Cliente',
            'ContrasenaC' => 'Contraseña'
        ];
    }

    public function mount(){
        $this->cliente = new Cliente();
        $this->sortBy = 'updated_at';
        $this->sortDirection = 'desc';
    }

    public function render()
    {
        $tipoc = TipoCliente::get();
        $tipoi = TipoIdentificacion::get();
        $clientes = Cliente::
            when($this->filterCliente, function($query){
                $query->where('isActive', $this->filterCliente);
            })
            ->select(['tipo_identificacions.id as idTI', 'tipo_identificacions.TipoIdentificacion','clientes.*'])
            ->leftJoin('tipo_identificacions', 'tipo_identificacions.id', '=', 'tipo_identificacion_id')
            ->where(function($query){    // para search
                $query->orWhere('tipo_identificacions.TipoIdentificacion','like','%'.$this->search.'%')
                ->orWhere('NombreCC','like','%'.$this->search.'%')
                ->orWhere('CorreoCliente','like','%'.$this->search.'%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);   //paginar registros personalizados
        return view('livewire.cliente.index',[
            'clientes' => $clientes,
            'tipoc' => $tipoc,
            'tipoi'=> $tipoi
        ]);
   }

   /* -------------------------------- CREAR  ------------------------------------- */

    public function create(){
        $this->cliente = new Cliente();
        $this->abrirmodal('#CreateCliente');
    }

    public function store(){
        $this->validate();
        $this->cliente->save();
        $this->cerrarmodal('#CreateCliente');
        session()->flash('message', 'Cliente creado satisfactoriamente.');
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->abrirmodal('#EditCliente');
        $this->cliente = Cliente::find($id);
        // $this->cliente->ContrasenaC = '';
    }

    public function update(){
        $this->validate();
        $this->cliente->save();
        $this->cerrarmodal('#EditCliente');
        session()->flash('message', 'Cliente actializado satisfactoriamente.');
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->openDelete = true;
        $this->idC = Cliente::find($id);
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($id){
        Cliente::find($id)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idC->id.' eliminado satisfactoriamente.');
    }

    public function activeConfirm($id){
        Cliente::find($id)->update(['isActive'=>'Active']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idC->id.' activado satisfactoriamente.');
    }

    /* -------------------------------- MODAL  ------------------------------------- */

    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
    }
}
