<?php

namespace App\Http\Livewire\Diseno;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Http\Livewire\WithSorting;
use App\Models\Diseno;
use App\Models\Obra;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithFileUploads;
    use AuthorizesRequests;

    public $search;
    public $perPage = '5';
    protected $queryString = [
        'search' => ['except' => ''],
        'filterStateIn' => ['except' => 'Active']
    ];
    public Diseno $diseno;
    public User $userA;
    public $image = null;
    public $idD, $filterStateIn =  'Active';
    public $openModal = false, $openDelete = false;
    public $tipoM;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingPerPage()
    {
        $this->resetPage();
    }
    public function updateFilterState(){
        $this->perPage = '';
    }
    public function mount(){
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->userA = Auth::user();
        // $this->material = new ModelsMaterial();
    }

    public function render()
    {
        $this->authorize('AllDis');
        
        $IdObra = Obra::get();
        $disenos = Diseno::latest('updated_at')
            ->when($this->filterStateIn, function($query){
                $query->where('isActive', $this->filterStateIn);
            })
            // ->select(['clientes.id as idCl','clientes.NombreCC','obras.*','cities.id as idCity', 'cities.ciudad'])
            // ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
            // ->leftJoin('cities', 'cities.id', '=', 'city_id')
            ->where(function($query){
                $query->orWhere('ImagenPlano','LIKE', '%'.$this->search.'%');
                $query->orWhere('isActive','like','%'.$this->search.'%');
                // ->orWhere('cities.ciudad','like','%'.$this->search.'%')
                // ->orWhere('NombreObra','like','%'.$this->search.'%');
            })
            ->paginate($this->perPage);
        return view('livewire.diseno.index', [
            'disenos' => $disenos,
            'obra' => $IdObra
        ]);
    }
    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
        // $this->diseno = null;
    }

    //SHOW ============================================================================

    public function show($id){
        // $this->authorize('showSeccion');
        $this->tipoM = 'show';
        $this->openModal = true;
        $this->abrirmodal('#showModel');
        $ob = Diseno::findOrFail($id);
        $this->obra = $ob;
        $this->users = $ob->Usuarios()->get()->sortBy('id');
    }

    //DELETE ============================================================================

    public function delete($diseno){   // modal de confirmacion de eliminacion
        // $this->authorize('deleteDs');
        $this->openDelete = true;
        $this->idD = Diseno::find($diseno);
        // $this->cerrarmodal('#showModel');
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($diseno){
        Diseno::find($diseno)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$diseno.' eliminado satisfactoriamente.');
        // $this->idD = "";
    }

    public function activeConfirm($obra){
        // $this->authorize('seccion_active');
        Diseno::find($obra)->update(['isActive'=>'Active']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$obra.' activado satisfactoriamente.');
        // $this->idD = null;
    }

    //EDITAR ============================================================================

    public function edit($id){
        // $this->authorize('updateDs');
        // $this->tipoM = 'edit';
        $this->openModal = true;
        $this->diseno = Diseno::find($id);
        $this->abrirmodal('#EditDiseno');
    }

    public function update(){
        // $this->authorize('updateDs');
        $this->validate();
        $imagen = $this->image->store('disenos','public');
        $this->diseno->ImagenPlano = $imagen;

        $this->diseno->save();
        $this->cerrarmodal('#EditDiseno');
        session()->flash('message', 'Diseño actualizado satisfactoriamente.');
    }

    //CREAR ============================================================================

    public function create(){
        // $this->authorize('createDs');
        // $this->tipoM = 'create';
        $this->openModal = true;
        $this->diseno = new Diseno();
        $this->abrirmodal('#CreateDiseno');
    }

    public function rules(){
        return [
            // 'diseno.ImagenPlano'=> ['required' ],
            'diseno.ObservacionDiseno'=> ['required','min: 5'],
            'diseno.obra_id' => ['required' ],
            'image' => ['required','image'],
        ];
    }
    public function validationAttributes (){
        return [
            'ImagenPlano' => 'Imagen del Plano',
            'ObservacionDiseno' => 'Observación de Diseno',
            'obra_id' => 'Obra',
            'image' => 'Imagen del Plano'
        ];
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store(){
        $this->validate();
        $imagen = $this->image->store('disenos','public');
        $this->diseno->ImagenPlano = $imagen;
        $this->diseno->save();

        // $this->diseno->material()->sync($this->material); // para tabla N:M con usuarios

        // foreach ($this->image as $image) {   // imagenes
        //     $imagen = $image->store('obras','public');
        //     $this->obra->Images()->create(['archivo'=>$imagen]);
        // }

        $this->cerrarmodal('#CreateDiseno');
        session()->flash('message', 'Diseño creado satisfactoriamente.');

    }


    // =================================================================================

}










