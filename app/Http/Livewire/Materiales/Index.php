<?php

namespace App\Http\Livewire\Materiales;

use App\Http\Livewire\WithSorting;
use App\Imports\MaterialImport;
use App\Models\Color;
use App\Models\Material as ModelsMaterial;
use App\Models\TipoMaterial;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;   // para paginacion
    use WithSorting;
    use AuthorizesRequests;

    public ModelsMaterial $material;  //modelo para gestionar mat
    public User $userA;

    public $search;//datatable
    public $perPage;
    protected $queryString = [
        'search' => ['except' => ''],
        'filterState' => ['except' => 'Active']
    ];  //urfli filtro
    public $TipoMaterial, $color, $idM, $filterState, $openDelete = false, $openModal=false;
    public $import;

    public function updatingSearch(){
        $this->resetPage(); //search por page
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }
    public function updated($propertyName)   //validacion tm
    {
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->sortBy = 'id';
        $this->perPage = '5';
        $this->sortDirection = 'desc';
        $this->material = new ModelsMaterial();
        $this->filterState = 'Active';
        $this->userA = Auth::user();

    }

    public function render()   //renderiza el componente/
    {
        // $this->authorize('accessMaterial', Material::class);
        $this->TipoMaterial = TipoMaterial::pluck('NombreTipoM','id')->toArray();
        $this->color = Color::pluck('Ncolor','id')->toArray();
        $materiales = ModelsMaterial::
            select(['colors.id as idC','colors.Ncolor','materials.*','tipo_material_id as idTipoM', 'tipo_materials.NombreTipoM'])
            ->leftJoin('colors', 'colors.id', '=', 'color_id')
            ->leftJoin('tipo_materials', 'tipo_materials.id', '=', 'tipo_material_id') //multitabla
            // ->where('colors.Ncolor','negro')
            ->when($this->filterState, function($query){
                if($this->userA->can('material_active')){
                    $query->where('materials.isActive', $this->filterState);
                }
            })
            ->where(function($query){
                $query->orWhere('materials.DescripcionMat','like','%'.$this->search.'%')
                ->orWhere('tipo_materials.NombreTipoM','like','%'.$this->search.'%')
                ->orWhere('colors.Ncolor','like','%'.$this->search.'%');
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.Material.index', with(
            ['materiales' => $materiales,
            'TipoMaterial' =>$this->TipoMaterial,
            'color' => $this->color ]));
    }

    /* -------------------------------- CREAR  ------------------------------------- */


    public function create(){
        $this->authorize('createMaterial', Material::class);
        $this->abrirmodal('#CreateMaterial');
        $this->material = new ModelsMaterial();
        $this->material->tipo_material_id = null;
        $this->material->color_id = null;
    }

    public function rules(){ //reglas
        return [
            'material.DescripcionMat' => 'required|min:6',
            'material.tipo_material_id' => 'required',
            'material.color_id' => 'nullable'
        ];
    }
    public function validationAttributes (){
        return [// error
            'tipo_material_id' => 'Tipo de Material',
            'DescripcionMat' => 'Descripción'
        ];
    }

    public function store(){
        $this->authorize('createMaterial', Material::class);
        $this->validate();
        $this->material->save();   //guarda el registro
        // $newMaterial = $this->validate();
        // ModelsMaterial::create($newMaterial);
        $this->cerrarmodal('#CreateMaterial');
        session()->flash('message', 'Material creado satisfactoriamente.');
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id){
        $this->authorize('updateMaterial', Material::class);
        $this->abrirmodal('#EditMaterial');
        $this->material = ModelsMaterial::find($id);
    }

    public function update(){  // update bd
        $this->authorize('updateMaterial', Material::class);
        $this->validate();
        $this->material->save();
        $this->cerrarmodal('#EditMaterial');
        session()->flash('message', 'Material actualizado satisfactoriamente.');
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->authorize('deleteMaterial', Material::class);
        $this->openDelete = true;
        $this->idM = ModelsMaterial::find($id);
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($id){
        $this->authorize('deleteMaterial', Material::class);
        ModelsMaterial::find($id)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idM->id.' eliminado satisfactoriamente.');
    }

    public function activeConfirm($id){
        $this->authorize('MaterialActive', Material::class);
        ModelsMaterial::find($id)->update(['isActive'=>'Active']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idM->id.' activado satisfactoriamente.');
    }

    /* -------------------------------- MODAL  ------------------------------------- */

    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
    }

    public function import(Request $request)
    {
        $file = $this->import;
        Excel::import(new MaterialImport, $request->file('file')->store('temp'));

        return redirect('/')->with('message', 'All good!');
    }

}
