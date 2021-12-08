<?php

namespace App\Http\Livewire\Planilla;

use App\Http\Livewire\WithSorting;
use App\Models\Planilla;
use App\Models\User;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithFileUploads;
    use AuthorizesRequests;

    public Planilla $planilla;
    public User $userA;
    public $prub, $selectTipo, $searchEmpleado;
    public $search, $filePlanilla;
    public $perPage = '10';
    public $openDelete = false, $idC , $filterSearch = 'Active';
    protected $queryString = [
        'search' => ['except' => ''],
        'filterSearch' => ['except' => 'Active'],
        'selectTipo' => ['except' => 'All'],
        'searchEmpleado' => ['except' => ''],
        'perPage' => ['except' => '10']
    ];

    public function updatingSearch(){   //search dinamico, necesario
        $this->resetPage();
    }
    public function updatingPerPage()  // paginacion dinamica, necesario
    {
        $this->resetPage();
    }
    public function updatingFilterSearch()  // paginacion dinamica, necesario
    {
        $this->resetPage();
    }
    public function updatingSelectTipo(){
        $this->resetPage();
        // $this->reset('searchEmpleado');
    }

    public function updatedPlanillaFechaPlanilla()  // paginacion dinamica, necesario
    {
        $this->planilla->FechaExpiracion = Carbon::parse($this->planilla->FechaPlanilla)->addDays(30);
        $this->planilla->FechaExpiracion = $this->planilla->FechaExpiracion->format('Y-m-d');
        // dd($this->planilla->FechaExpiracion);
        $this->emit('changeF', $this->planilla->FechaExpiracion);
    }
    public function hydrate()
    {
        $this->resetValidation();
    }

    public function mount(){
        $this->userA = Auth::user();
        $this->planilla = new Planilla();
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->selectTipo = 'All';
        $this->searchEmpleado = null;
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
            if($this->selectTipo == 'All'){
                $planillas = Planilla::latest('updated_at')
                ->select(['empleados.id as idE','empleados.NombreCompleto','planillas.*'])
                ->leftJoin('empleados', 'empleados.id', '=', 'empleado_id')
                ->when($this->filterSearch, function($query){
                    $query->orWhere('isActive', $this->filterSearch);
                })
                ->where('empleados.EstadoUsuario','Active')
                ->where(function($query){
                    // $query->where('empleados.EstadoUsuario','Active');
                    $query->orWhere('ArchivoPlanilla','LIKE', '%'.$this->search.'%');
                    $query->orWhere('EstadoPlanilla','LIKE','%'.$this->search.'%');
                    $query->orWhere('empleados.NombreCompleto','LIKE', '%'.$this->search.'%');
                })
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage);
            }
            else if($this->selectTipo = 'PerEmpleado'){
                $planillas = null;
                if($this->searchEmpleado != null){
                    $planillas = Planilla::latest('updated_at')
                        ->select(['empleados.id as idE','empleados.NombreCompleto','planillas.*'])
                        ->leftJoin('empleados', 'empleados.id', '=', 'empleado_id')
                        ->when($this->filterSearch, function($query){
                            $query->orWhere('isActive', $this->filterSearch);
                        })
                        ->where('empleados.EstadoUsuario','Active')
                        ->where('planillas.empleado_id',$this->searchEmpleado)
                        ->where(function($query){
                            // $query->where('empleados.EstadoUsuario','Active');
                            $query->orWhere('ArchivoPlanilla','LIKE', '%'.$this->search.'%');
                            $query->orWhere('EstadoPlanilla','LIKE','%'.$this->search.'%');
                            $query->orWhere('empleados.NombreCompleto','LIKE', '%'.$this->search.'%');
                        })
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
                }
            }
        }

        $usuarios= Usuario::select(['NombreCompleto','id'])->where('EstadoUsuario','Active')->orderBy('id','asc')->pluck('NombreCompleto','id')->toArray();
        return view('livewire.Planilla.index', [
            'planillas' => $planillas,
            'usuarios' => $usuarios
        ]);
    }

    /* -------------------------------- CREAR  ------------------------------------- */

    public function create(){
        $this->authorize('CreatePl', Planilla::class);
        $this->planilla = new Planilla();
        if($this->searchEmpleado != null){
            $this->planilla->empleado_id = $this->searchEmpleado;
        }
        else{
            $this->planilla->empleado_id = null;
        }
        // $this->planilla->ArchivoPlanilla = null;
        $this->abrirmodal('#CreatePlanilla');
        $this->emit('createOpen');
    }

    public function updated($propertyName)    //validaciones real-time
    {
        $this->validateOnly($propertyName);
    }

    public function rules(){
        return [
            'filePlanilla' => ['required', 'file', 'mimes:pdf','max:204800'],
            'planilla.FechaPlanilla' => ['required','date','after_or_equal:'.date('Y-m-d') ],
            'planilla.FechaExpiracion' => ['required','date','after:'.$this->planilla->FechaPlanilla],
            // 'planilla.EstadoPlanilla' => 'required',
            'planilla.empleado_id' => 'required'
        ];
    }

    public function validationAttributes (){
        return [
            'ArchivoPlanilla' => 'Archivo Planilla',
            'FechaPlanilla' => 'Fecha de inicio Vigencia',
            'FechaExpiracion' => 'Fecha de planilla',
            // 'EstadoPlanilla' => 'Estado de Planilla',
            'empleado_id' => 'Empleado',
        ];
    }

    public function messages (){
        return [
            'planilla.FechaPlanilla.after_or_equal' => 'La fecha de inicio Vigencia debe ser una fecha posterior a hoy.'
        ];
    }


    public function store(){
        $this->authorize('CreatePl', Planilla::class);
        $this->validate();
        $imagen = $this->filePlanilla->storeAs(
            'planillas',
            ('afiliacion_'.str_replace(" ","",$this->planilla->Empleado->NombreCompleto).'_'.Carbon::parse($this->planilla->FechaPlanilla)->format('F').'.pdf' ),
            'public');

        $this->planilla->ArchivoPlanilla = $imagen;
        $this->planilla->EstadoPlanilla = 'vigente';
        $this->planilla->save();
        $this->cerrarmodal('#CreatePlanilla');
        session()->flash('message', 'Planilla creado satisfactoriamente.');
        // $this->emit('saveEmpl', );
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->authorize('UpdatePl', Planilla::class);
        $this->planilla = Planilla::find($id);
        $this->abrirmodal('#EditPlanilla');
        $this->emit('FechaExpiracion', [$this->planilla->id,$this->planilla->FechaPlanilla,$this->planilla->FechaExpiracion]);
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
