<?php

namespace App\Http\Livewire\Planilla;

use App\Http\Livewire\WithSorting;
use App\Models\Planilla;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AuthorizesRequests;

    public Planilla $planilla;
    public User $userA;
    public $prub;
    public $search;
    public $perPage = '10';
    protected $queryString = ['search' => ['except' => ''], 'filterPlanilla' => ['except' => 'Active']];
    public $openDelete = false, $idC , $filterPlanilla = 'Active';

    public function updatingSearch(){   //search dinamico, necesario
        $this->resetPage();
    }
    public function updatingPerPage()  // paginacion dinamica, necesario
    {
        $this->resetPage();
    }

    public function mount(){
        $this->userA = Auth::user();
        // $this->prub = 'a';
    }

    public function render()
    {
        if ($this->authorize('AccessPl', Planilla::class) && Gate::denies('AllPl', Planilla::class)) {
            $planillas = $this->userA->Planillas()
            ->where(function($query){
                $query->orWhere('EstadoPlanilla','LIKE','%'.$this->search.'%');
            })
            ->paginate($this->perPage);
        }
        else if($this->authorize('AllPl', Planilla::class)){
            $planillas = Planilla::latest('updated_at')
            ->select(['empleados.id as idE','empleados.NombreCompleto','planillas.*'])
            ->leftJoin('empleados', 'empleados.id', '=', 'empleado_id')
            ->when($this->filterPlanilla, function($query){
                $query->where('isActive', $this->filterPlanilla);
            })
            ->where(function($query){
                $query->orWhere('ArchivoPlanilla','LIKE', '%'.$this->search.'%');
                $query->orWhere('EstadoPlanilla','LIKE','%'.$this->search.'%');
                $query->orWhere('empleados.NombreCompleto','LIKE', '%'.$this->search.'%');
            })
            ->paginate($this->perPage);
        }
        // if($this->userA->hasPermissionTo(Permission::find(1)->id)){}
        //$this->userA->getRoleNames()[0]

        // $this->userA->can('planilla_access');
        $usuarios = Usuario::get();
        return view('livewire.Planilla.index', [
            'planillas' => $planillas,
            'usuario' => $usuarios
        ]);
    }

    /* -------------------------------- CREAR  ------------------------------------- */

    public function create(){
        $this->authorize('CreatePl', Planilla::class);
        $this->planilla = new Planilla();
        $this->abrirmodal('#CreatePlanilla');
    }

    public function updated($propertyName)    //validaciones real-time
    {
        $this->validateOnly($propertyName);
    }

    public function rules(){
        return [
            'planilla.ArchivoPlanilla' => 'required',
            'planilla.FechaExpiracion' => 'required',
            'planilla.EstadoPlanilla' => 'required',
            'planilla.empleado_id' => 'required'
        ];
    }
    public function validationAttributes (){
        return [
            'ArchivoPlanilla' => 'Archivo Planilla',
            'FechaExpiracion' => 'Fecha de expiración',
            'EstadoPlanilla' => 'Estado de Planilla',
            'empleado_id' => 'Empleado',
        ];
    }

    public function store(){
        $this->authorize('CreatePl', Planilla::class);
        $this->validate();
        $this->planilla->save();
        $this->cerrarmodal('#CreatePlanilla');
        session()->flash('message', 'Planilla creado satisfactoriamente.');
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->authorize('UpdatePl', Planilla::class);
        $this->abrirmodal('#EditPlanilla');
        $this->planilla = Planilla::find($id);
    }

    public function update(){
        $this->authorize('UpdatePl', Planilla::class);
        $this->validate();
        $this->planilla->save();
        $this->cerrarmodal('#EditPlanilla');
        session()->flash('message', 'Planilla actualizado satisfactoriamente.');
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->authorize('DeletePl', Planilla::class);
        $this->openDelete = true;
        $this->idC = Planilla::find($id);
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($id){
        $this->authorize('DeletePl', Planilla::class);
        Planilla::find($id)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idC->id.' eliminado satisfactoriamente.');
    }

    public function activeConfirm($id){
        $this->authorize('DeletePl', Planilla::class);
        Planilla::find($id)->update(['isActive'=>'Active']);
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
