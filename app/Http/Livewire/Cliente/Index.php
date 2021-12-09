<?php

namespace App\Http\Livewire\Cliente;

use App\Http\Livewire\WithSorting;
use App\Mail\RegristrarUsuarios;
use App\Models\Cliente;
use App\Models\TipoCliente;
use App\Models\TipoIdentificacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;
use livewire\mail;
use livewire\MessageReceived;


class Index extends Component
{
    use WithPagination;   //para paginacion
    use WithSorting;     //para ordenar por titulo
    use AuthorizesRequests;
    public Cliente $cliente;
    public $search;
    public $perPage = '10';
    public $con;
    public User $userA;
    protected $queryString = [
        'search' => ['except' => ''],
        'filterCliente' => ['except' => 'Active']
    ];
    public $openDelete = false, $idC , $filterCliente = 'Active';
    public $caracteres = 'abcdefghijklmnopqestuvxyzABCDEFGHIJKLMNOPQRSTUBWXYZ0123456789%$#&/+-[]*~|?¡¿;´';
    public $longitud = 10;

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

    public function mount(){
        $this->cliente = new Cliente();
        $this->sortBy = 'updated_at';
        $this->sortDirection = 'desc';
        $this->userA = Auth::user();
    }

    public function render()
    {
        $this->authorize('accessClie', Cliente::class);
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

   /*  */

   /* -------------------------------- CREAR  ------------------------------------- */

   public function hydrate()
    {
        $this->resetValidation();
    }

    public function rules(){
        return [
            'cliente.NombreCC' => ['required',Rule::unique('clientes','NombreCC')->ignore($this->cliente)],
            'cliente.NumIdentificacion' => ['required',Rule::unique('clientes','NumIdentificacion')->ignore($this->cliente),'min:5','max:15'],
            'cliente.NumCelular' => 'required|digits:10',
            'cliente.NumTelefono' => 'required | min:7 ',
            'cliente.CorreoCliente' => ['required',Rule::unique('clientes','CorreoCliente')->ignore($this->cliente),'email'],
            'cliente.tipo_identificacion_id' => 'required',
            'cliente.tipo_cliente_id' => 'required',
            // 'cliente.ContrasenaC' => 'required',
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
            // 'ContrasenaC' => 'Contraseña'
        ];
    }

    public function create(){
        $this->authorize('createClie', Cliente::class);
        $this->cliente = new Cliente();
        $this->abrirmodal('#CreateCliente');
    }

    public function store(){
        $this->validate();

        // $this->cliente->ContrasenaC = Hash::make(substr(str_shuffle($this->caracteres), 0, $this->longitud));
        $this->cliente->ContrasenaC = Hash::make($this->cliente->NumIdentificacion);
        $this->cliente->save();
        $this->cerrarmodal('#CreateCliente');
        session()->flash('message', 'Cliente creado satisfactoriamente.');

        $newCliente = Cliente::where('NombreCC',$this->cliente->NombreCC)->get()->first();
        event(new Registered($user = $newCliente->User()->get()->first() ));

    }



    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->authorize('editClie', Cliente::class);

        $this->abrirmodal('#EditCliente');
        $this->cliente = Cliente::find($id);
        // $this->cliente->ContrasenaC = '';
    }

    public function update(){

        $this->authorize('editClie', Cliente::class);
        $this->validate();
        $this->cliente->ContrasenaC = Hash::make($this->cliente->NumIdentificacion);
        $this->cliente->save();
        $this->cerrarmodal('#EditCliente');
        session()->flash('message', 'Cliente actializado satisfactoriamente.');
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->authorize('deleteClie', Cliente::class);
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
        $this->authorize('activeClie', Cliente::class);
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
