<?php

namespace App\Http\Livewire\Secciones;

use App\Http\Livewire\WithSorting;
use App\Models\Color;
use App\Models\Diseno;
use App\Models\seccion;
use App\Models\Usuario;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;

    public Seccion $seccion;
    public $search;
    public $perPage = '10';
    protected $queryString = ['search' => ['except' => ''], 'filterSecciones' => ['except' => 'Active']];
    public $openDelete = false, $openModal = false, $idS , $filterSecciones = 'Active';

    public function updatingSearch(){   //search dinamico, necesario
        $this->resetPage();
    }
    public function updatingPerPage()  // paginacion dinamica, necesario
    {
        $this->resetPage();
    }

    public function mount(){
        $this->sortBy = 'updated_at';
        $this->sortDirection = 'desc';
        $this->seccion = new Seccion();
    }

    public function render()
    {
        $diseno = Diseno::get();
        $color = Color::get();
        $seccioness = seccion::
            select(['seccions.*', 'colors.id as idC'])
                ->leftJoin('colors', 'colors.id', '=', 'color_id')
            ->when($this->filterSecciones, function($query){
                $query->where('isActive', $this->filterSecciones);
            })
            // ->select(['clientes.id as idCl','clientes.NombreCC','obras.*','cities.id as idCity', 'cities.ciudad'])
            // ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
            // ->leftJoin('cities', 'cities.id', '=', 'city_id')
            ->where(function($query){
                $query->orWhere('NombreSeccion','LIKE', '%'.$this->search.'%');
                $query->orWhere('isActive','like','%'.$this->search.'%');
                // ->orWhere('cities.ciudad','like','%'.$this->search.'%')
                // ->orWhere('NombreObra','like','%'.$this->search.'%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.secciones.index', [
            'seccioness' => $seccioness,
            'diseno' => $diseno,
            'color' => $color,
        ]);
    }

    /* -------------------------------- CREAR  ------------------------------------- */

    public function create(){
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
        $this->validate();
        $this->seccion->save();
        $this->cerrarmodal('#CreateSecciones');
        session()->flash('message', 'Seccion creada satisfactoriamente.');
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->openModal = true;
        $this->seccion = seccion::find($id);
        $this->abrirmodal('#EditSecciones');
    }

    public function update(){
        $this->validate();
        $this->seccion->save();
        $this->cerrarmodal('#EditSecciones');
        session()->flash('message', 'Seccion actualizado satisfactoriamente.');
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->openDelete = true;
        $this->idS = seccion::find($id);
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($id){
        seccion::find($id)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idS->id.' eliminado satisfactoriamente.');
    }

    public function activeConfirm($id){
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
