<?php

namespace App\Http\Livewire\Secciones;

use App\Http\Livewire\WithSorting;
use App\Models\Color;
use App\Models\Diseno;
use App\Models\Obra;
use App\Models\seccion;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AuthorizesRequests;

    public User $userA;
    public Seccion $seccion;
    public $search;
    public $perPage = '10';
    protected $queryString = [
        'search' => ['except' => ''],
        'filterSecciones' => ['except' => 'Active'],
        'searchDiseno' => ['except' => ''],
    ];
    public $openDelete = false, $openModal = false, $openShow = false, $idS , $filterSecciones = 'Active';
    public $searchDiseno = null, $selectObraD = null;

    public function updatingSearch(){   //search dinamico, necesario
        $this->resetPage();
    }
    public function updatingPerPage(){
        $this->resetPage();
    }
    public function updatingFilterSecciones(){
        $this->resetPage();
    }
    public function hydrate(){
        $this->resetValidation();
    }

    public function mount(){
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->searchDiseno = null;
        $this->userA = Auth::user();
        $this->seccion = new Seccion();
    }

    public function render()
    {
        $this->authorize('accessSeccion', Seccion::class);

        if ($this->authorize('AccessDiseno', Diseno::class) && Gate::denies('AllDiseno', Diseno::class)) {

            $obrasD = $this->userA->Cargo()->get()->first()->Obras()->where('obras.isActive','Active')
                            ->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])->pluck('NombreObra','obras.id')->toArray();

            $disenos = Diseno::where('isActive', 'Active')->where('obra_id',$this->selectObraD)
                        ->orderBy('id','asc')->pluck('id','id')->toArray();

            $seccioness = Seccion::select(['seccions.*', 'colors.id as idC'])
                ->leftJoin('colors', 'colors.id', '=', 'color_id')
                ->where('diseno_id',$this->searchDiseno)
                ->when($this->filterSecciones, function($query){
                    $query->where('seccions.isActive', $this->filterSecciones);
                })
            ->where(function($query){
                $query->orWhere('NombreSeccion','LIKE', '%'.$this->search.'%');
                $query->orWhere('isActive','like','%'.$this->search.'%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        }
        else if($this->authorize('AllDiseno', Diseno::class)){
            $obrasD = Obra::where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                            ->orderBy('id','asc')->pluck('NombreObra','id')->toArray();
            $disenos = Diseno::where('isActive', 'Active')->where('obra_id',$this->selectObraD)
                        ->orderBy('id','asc')->pluck('id','id')->toArray();

            $seccioness = Seccion::select(['seccions.*', 'colors.id as idC'])
                ->leftJoin('colors', 'colors.id', '=', 'color_id')
                ->where('diseno_id',$this->searchDiseno)
            ->when($this->filterSecciones, function($query){
                $query->where('isActive', $this->filterSecciones);
            })
            ->where(function($query){
                $query->orWhere('NombreSeccion','LIKE', '%'.$this->search.'%');
                $query->orWhere('isActive','like','%'.$this->search.'%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        }
        $color = Color::get();

        return view('livewire.secciones.index', [
            'seccioness' => $seccioness,
            'disenos' => $disenos,
            'color' => $color,
            'obrasD' => $obrasD
        ]);
    }

    /* -------------------------------- CREAR  ------------------------------------- */

    public function create(){
        $this->authorize('createSeccion',Seccion::class);
        $this->seccion = new seccion();
        $this->openModal = true;
        $this->abrirmodal('#CreateSecciones');
    }

    public function updated($propertyName)    //validaciones real-time
    {
        $this->validateOnly($propertyName);
    }

    public function rules(){
        return [
            'seccion.NombreSeccion' => 'required',
            'seccion.AreaSeccion' => 'required',
            'seccion.PerimetroSec' => 'required',
            'seccion.color_id' => 'required',
            'seccion.diseno_id' => 'required',
        ];
    }
    public function validationAttributes (){
        return [
            'NombreSeccion' => 'Nombre Seccion',
            'AreaSeccion' => 'Area Seccion',
            'PerimetroSec' => 'Perimetro Seccion',
            'diseno' => 'Diseño',
            'color_id' => 'Color'
        ];
    }

    public function store(){
        $this->authorize('createSeccion',Seccion::class);
        $this->validate();
        $this->seccion->save();
        $this->cerrarmodal('#CreateSecciones');
        session()->flash('message', 'Seccion creada satisfactoriamente.');
    }

    /* -------------------------------- SHOW  ------------------------------------- */

    public function show($id){
        $this->authorize('showSeccion', Seccion::class);
        $this->openModal = true;
        $this->openShow = true;
        $this->abrirmodal('#ShowSeccion');
        $seccion = Seccion::findOrFail($id);
        $this->seccion = $seccion;
        // $this->users = $ob->Usuarios()->get()->sortBy('id');
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->authorize('editSeccion',Seccion::class);
        $this->openModal = true;
        $this->seccion = seccion::find($id);
        $this->abrirmodal('#EditSecciones');
    }

    public function update(){
        $this->authorize('editSeccion',Seccion::class);
        $this->validate();
        $this->seccion->save();
        $this->cerrarmodal('#EditSecciones');
        session()->flash('message', 'Seccion actualizado satisfactoriamente.');
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->authorize('deleteSeccion',Seccion::class);
        $this->openDelete = true;
        $this->idS = seccion::find($id);
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($id){
        $this->authorize('deleteSeccion',Seccion::class);
        seccion::find($id)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idS->id.' eliminado satisfactoriamente.');
    }

    public function activeConfirm($id){
        $this->authorize('activeSeccion',Seccion::class);
        seccion::find($id)->update(['isActive'=>'Active']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idS->id.' activado satisfactoriamente.');
    }

    /* -------------------------------- MODAL  ------------------------------------- */

    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
    }
}
