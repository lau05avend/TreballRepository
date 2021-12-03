<?php

namespace App\Http\Livewire\Empleados;

use App\Http\Livewire\WithSorting;
use App\Models\City;
use App\Models\EstadoCivil;
use App\Models\Rol;
use App\Models\TipoIdentificacion;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AuthorizesRequests;

    public $search;
    public Usuario $empleado;
    public User $userA;

    public $perPage;
    public $openDelete = false, $openModal = false,$openShow = false, $idE , $filterEmpleado = 'Active', $obraCoord;
    protected $queryString = [
        'search' => ['except' => ''],
        'filterEmpleado' => ['except' => 'Active'],
        'sortBy' => ['except' => 'empleados.id'],
        'sortDirection' => ['except' => 'asc']
    ];

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingFilterEmpleado(){
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        if($this->authorize('AcessEmpleado', Usuario::class) && Gate::denies('EmpleadoAll', Usuario::class) ){
            $this->obraCoord = $this->userA->cargo()->first()->Obras()->get()->first();
            $empleados = Usuario::select(['empleados.*','rols.id as idR','tipo_identificacions.id as idIden'])
                ->leftJoin('obra_usuario','empleados.id','=','empleado_id')
                ->leftJoin('tipo_identificacions', 'tipo_identificacions.id', '=', 'tipo_identificacion_id')
                ->leftJoin('rols', 'rols.id', '=', 'rol_id')
                ->where('obra_usuario.obra_id', $this->obraCoord['id'])
                ->whereNotIn('obra_usuario.empleado_id', [$this->userA->cargo()->get()->first()['id'] ])
                ->where(function($query){
                    $query->orWhere('NombreCompleto','LIKE', '%'.$this->search.'%');
                    $query->orWhere('NumeroDocumento','like','%'.$this->search.'%');
                    $query->orWhere('NombreRol','like','%'.$this->search.'%');
                    $query->orWhere('TipoIdentificacion', 'like', '%'.$this->search.'%');
                    $query->orWhere('CorreoUsuario', 'like', '%'.$this->search.'%');
                    $query->orWhere('Disponibilidad', 'like', '%'.$this->search.'%');
                })
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage);

        }
        else if ($this->authorize('EmpleadoAll', Usuario::class)){
            $empleados = Usuario::
            select(['empleados.*', 'rols.id as idR','tipo_identificacions.id as idIden', 'estado_civils.id as idEC',
            'tipo_identificacions.TipoIdentificacion as TipoIdentificacions'])
                ->leftJoin('cities', 'cities.id', '=', 'city_id')
                ->leftJoin('estado_civils', 'estado_civils.id', '=', 'estado_civil_id')
                ->leftJoin('tipo_identificacions', 'tipo_identificacions.id', '=', 'tipo_identificacion_id')
                ->leftJoin('rols', 'rols.id', '=', 'rol_id') //multitabla
                ->when($this->filterEmpleado, function($query){
                    $query->where('empleados.EstadoUsuario', $this->filterEmpleado);
                })
                ->where(function($query){
                    $query->orWhere('NombreCompleto','LIKE', '%'.$this->search.'%');
                    $query->orWhere('NumeroDocumento','like','%'.$this->search.'%');
                    $query->orWhere('NombreRol','like','%'.$this->search.'%');
                    $query->orWhere('ciudad','like','%'.$this->search.'%');
                    $query->orWhere('TipoIdentificacion', 'like', '%'.$this->search.'%');
                    $query->orWhere('EstadoCivil', 'like', '%'.$this->search.'%');
                    $query->orWhere('CorreoUsuario', 'like', '%'.$this->search.'%');
                    $query->orWhere('Disponibilidad', 'like', '%'.$this->search.'%');
                })
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage);
        }

        $estadocivil = EstadoCivil::get();
        $rol = Rol::get();
        $ciudad = City::get();
        $tipoiden = TipoIdentificacion::get();

        return view('livewire.empleados.index', [
            'empleados' => $empleados,
            'estadocivil' => $estadocivil,
            'rol' => $rol,
            'ciudad' => $ciudad,
            'tipoiden' => $tipoiden,
        ]);
    }

    public function mount(){
        $this->sortBy = 'NombreCompleto';
        $this->sortDirection = 'desc';
        $this->perPage = '5';
        $this->empleado = new Usuario();
        $this->userA = Auth::user();
    }


    /* -------------------------------- MODAL  ------------------------------------- */

    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
        if($this->openShow){
            $this->openShow = false;
        }
    }

    /* -------------------------------- CREAR  ------------------------------------- */

    public function create(){
        $this->authorize('createEmpleado', Usuario::class);
        $this->openModal = true;
        $this->empleado = new Usuario();
        $this->abrirmodal('#CreateEmpleado');
    }

    public function updated($propertyName)    //validaciones real-time
    {
        $this->validateOnly($propertyName);
    }

    public function hydrate()
    {
        $this->resetValidation();
    }

    public function rules(){
        return [
            'empleado.NombreCompleto' => ['required',Rule::unique('empleados','NombreCompleto')->ignore($this->empleado)],
            'empleado.NumeroDocumento' => ['required',Rule::unique('empleados','NumeroDocumento')->ignore($this->empleado),'min:5','max:15'],
            'empleado.NumeCelular' => 'required|min:10|max:10 ',
            'empleado.NumTelefono' => 'required | min:7 | max:7',
            'empleado.FechaNacimientoU' => 'required',
            'empleado.CorreoUsuario' => ['required',Rule::unique('empleados','CorreoUsuario')->ignore($this->empleado),'email'],
            'empleado.GeneroUsuario' => 'required',
            'empleado.DireccionUsuario' => 'required',
            'empleado.EdadU' => 'required',
            'empleado.Disponibilidad' => 'required',
            'empleado.rol_id' => 'required',
            'empleado.city_id' => 'required',
            'empleado.tipo_identificacion_id' => 'required',
            'empleado.estado_civil_id' => 'required',
            'empleado.contrasena' => 'required',
            'empleado.FotoUsuario' => 'nullable'
        ];
    }
    public function validationAttributes (){
        return [
            'NombreCompleto' => 'Nombre Completo',
            'NumeroDocumento' => 'Número de Documento',
            'NumeCelular' => 'Número de Celular',
            'NumTelefono' => 'Número de Telefono',
            'FechaNacimientoU' => 'Fecha de Nacimiento',
            'CorreoUsuario' => 'Correo electronico',
            'GeneroUsuario' => 'Genero de Usuario',
            'DireccionUsuario' => 'Dirección',
            'EdadU' => 'Edad',
            'tipo_identificacion_id' => 'Tipo Identificación',
            'rol_id' => 'Rol de Usuario',
            'city_id' => 'Ciudad',
            'estado_civil_id' => 'Estado Civil',
            'contrasena' => 'Contraseña',
        ];
    }

    public function store(){
        $this->authorize('createEmpleado', Usuario::class);
        $this->validate();
        $this->empleado->contrasena = Hash::make($this->empleado->contrasena);
        $this->empleado->save();
        $this->cerrarmodal('#CreateEmpleado');
        session()->flash('message', 'Empleado creado satisfactoriamente.');

        $newEmpleado = Usuario::where('NombreCompleto',$this->empleado->NombreCompleto)->get()->first();
        event(new Registered($user = $newEmpleado->User()->get()->first() ));
    }

    /* -------------------------------- SHOW  ------------------------------------- */

    public function show($idE){
        $this->authorize('EmpleadoShow', Usuario::class);

        $this->openShow = true;
        $this->abrirmodal('#ShowEmpleado');
        $empleado = Usuario::findOrFail($idE);
        $this->empleado = $empleado;
        // $this->users = $ob->Usuarios()->get()->sortBy('id');
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->authorize('EditEmpleado', Usuario::class);
        $this->openModal = true;
        $this->abrirmodal('#EditEmpleado');
        $this->empleado = Usuario::find($id);
    }

    public function update(){
        $this->authorize('EditEmpleado', Usuario::class);
        $this->validate();
        $this->empleado->contrasena = Hash::make($this->empleado->contrasena);
        $this->empleado->save();
        $this->cerrarmodal('#EditEmpleado');
        // $this->openModal = false;
        session()->flash('message', 'Empleado actualizado satisfactoriamente.');
    }


    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->authorize('deleteEmpleado', Usuario::class);
        $this->openDelete = true;
        $this->idE = Usuario::find($id);
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($id){
        Usuario::find($id)->update(['EstadoUsuario'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idE->id.' eliminado satisfactoriamente.');
    }

    public function activeConfirm($id){
        Usuario::find($id)->update(['EstadoUsuario'=>'Active']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idE->id.' activado satisfactoriamente.');
    }

}
