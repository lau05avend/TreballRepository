<?php

namespace App\Http\Livewire\Planilla;

use App\Http\Livewire\WithSorting;
use App\Models\Planilla;
use App\Models\Usuario;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;

    public Planilla $planilla;
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
    }

    public function render()
    {
        $usuarios = Usuario::get();
        $planillas = Planilla::latest('updated_at')
            ->when($this->filterPlanilla, function($query){
                $query->where('isActive', $this->filterPlanilla);
            })
            // ->select(['clientes.id as idCl','clientes.NombreCC','obras.*','cities.id as idCity', 'cities.ciudad'])
            // ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
            // ->leftJoin('cities', 'cities.id', '=', 'city_id')
            ->where(function($query){
                $query->orWhere('ArchivoPlanilla','LIKE', '%'.$this->search.'%');
                $query->orWhere('isActive','like','%'.$this->search.'%');
                // ->orWhere('cities.ciudad','like','%'.$this->search.'%')
                // ->orWhere('NombreObra','like','%'.$this->search.'%');
            })
            ->paginate($this->perPage);
        return view('livewire.Planilla.index', [
            'planillas' => $planillas,
            'usuario' => $usuarios
        ]);
    }

    /* -------------------------------- CREAR  ------------------------------------- */

    public function create(){
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
        $this->validate();
        $this->planilla->save();
        $this->cerrarmodal('#CreatePlanilla');
        session()->flash('message', 'Planilla creado satisfactoriamente.');
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->abrirmodal('#EditPlanilla');
        $this->planilla = Planilla::find($id);
    }

    public function update(){
        $this->validate();
        $this->planilla->save();
        $this->cerrarmodal('#EditPlanilla');
        session()->flash('message', 'Planilla actualizado satisfactoriamente.');
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->openDelete = true;
        $this->idC = Planilla::find($id);
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($id){
        Planilla::find($id)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idC->id.' eliminado satisfactoriamente.');
    }

    public function activeConfirm($id){
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
