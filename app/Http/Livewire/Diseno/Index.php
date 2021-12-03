<?php

namespace App\Http\Livewire\Diseno;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Http\Livewire\WithSorting;
use App\Models\Diseno;
use App\Models\Material;
use App\Models\Obra;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithFileUploads;
    use AuthorizesRequests;

    public $search;
    public $selectTipo, $searchObra;
    public $perPage = '5';
    protected $queryString = [
        'search' => ['except' => ''],
        'filterStateIn' => ['except' => 'Active'],
        'selectTipo' => ['except' => 'All'],
        'searchObra' => ['except' => ''],
    ];
    public Diseno $diseno;
    public User $userA;
    public $images = [], $imagesDis = [];
    public $idD, $filterStateIn =  'Active';
    public $openModal = false, $openDelete = false;
    public $listeners = [
        'crearPlano'
    ];
    public $tipoM, $openShow = false;
    public $resinaC = [], $baseC, $cauchoC, $pisosC;

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
    public function hydrate(){
        $this->resetValidation();
    }
    public function mount(){
        $this->diseno = new Diseno();
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->userA = Auth::user();
        $this->searchObra = null;
        $this->selectTipo = 'All';
        // $this->material = new ModelsMaterial();
    }

    public function render()
    {

        if ($this->authorize('AccessDiseno', Diseno::class) && Gate::denies('AllDiseno', Diseno::class)) {
            $disenos = Diseno::select(['disenos.*','obras.NombreObra','EstadoObra'])
                ->leftJoin('obras','obras.id','=','disenos.obra_id')
                ->leftJoin('obra_usuario','obras.id','=','obra_usuario.obra_id')
                ->where('empleado_id','=', $this->userA->cargo()->select('empleados.id')->first()['id'])
                ->where('disenos.isActive','=', 'Active')
                ->where(function($query){
                    $query->orWhere('EstadoObra','LIKE', '%'.$this->search.'%')
                        ->orWhere('NombreObra','like','%'.$this->search.'%');
                })
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage);

             $IdObra = Obra::select(['obras.NombreObra','obras.id'])
                ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                ->leftJoin('obra_usuario','obras.id','=','obra_usuario.obra_id')
                ->where('empleado_id','=', $this->userA->cargo()->select('empleados.id')->first()['id'])->orderBy('id','asc')
                ->pluck('NombreObra','id')->toArray();

        }
        else if($this->authorize('AllDiseno', Diseno::class)){
            if($this->selectTipo == 'All'){
                $disenos = Diseno::select(['disenos.*','obras.NombreObra','EstadoObra'])
                    ->leftJoin('obras','obras.id','=','disenos.obra_id')
                    ->where('disenos.isActive','=', $this->filterStateIn)
                    ->where(function($query){
                        $query->orWhere('EstadoObra','LIKE', '%'.$this->search.'%')
                                ->orWhere('NombreObra','like','%'.$this->search.'%');
                    })
                    ->orderBy($this->sortBy, $this->sortDirection)
                    ->paginate($this->perPage);
            }
            else if($this->selectTipo = 'PerObra'){
                $disenos = null;
                if($this->searchObra != null){
                    $disenos = Diseno::select(['disenos.*','obras.NombreObra','EstadoObra'])
                        ->leftJoin('obras','obras.id','=','disenos.obra_id')
                        ->where('obra_id','=', $this->searchObra)
                        ->where('disenos.isActive','=', $this->filterStateIn)
                        ->where(function($query){
                            $query->orWhere('EstadoObra','LIKE', '%'.$this->search.'%')
                                ->orWhere('NombreObra','like','%'.$this->search.'%');
                        })
                        ->orderBy($this->sortBy, $this->sortDirection)
                        ->paginate($this->perPage);
                }
            }
            $IdObra = Obra::select(['NombreObra','id'])->where('isActive','Active')->orderBy('id','asc')->pluck('NombreObra','id')->toArray();
        }

        $resina = Material::select(['materials.id','DescripcionMat'])->where('isActive','Active')->where('tipo_material_id',1)->get()
                    ->pluck('DescripcionMat','id')->toArray();
        $base = Material::select(['materials.id','Ncolor'])->leftJoin('colors','colors.id' ,'=','color_id')
                    ->where('isActive','Active')->where('tipo_material_id',2)->get()
                    ->pluck('Ncolor','id')->toArray();

        $caucho = Material::select(['materials.id','Ncolor'])
                    ->leftJoin('colors','colors.id' ,'=','color_id')
                    ->where('isActive','Active')->where('tipo_material_id',3)->get()
                    ->pluck('Ncolor','id')->toArray();
        $pisos = Material::select(['materials.id','Ncolor'])
                    ->leftJoin('colors','colors.id' ,'=','color_id')
                    ->where('isActive','Active')->where('tipo_material_id',4)->get()
                    ->pluck('Ncolor','id')->toArray();

        return view('livewire.diseno.index', [
            'disenos' => $disenos,
            'obra' => $IdObra,
            'resina' => $resina,
            'base' => $base,
            'caucho' => $caucho,
            'pisos' => $pisos,
        ]);
    }
    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
    }

    //CREAR ============================================================================

    public function imagesUpdate(){
        $this->authorize('CreateDiseño', Diseno::class);
        $this->emit('disenosUpdate');
        // $this->imagesDiseno();
        // dd($this->imagesDis);
    }

    public function imagesDiseno(){
        foreach($this->images as $image){
            for ($i=0; $i < count($this->images) ; $i++) {
                $this->imagesDis[$i] = Storage::get('public/'.$image['nameFile']);
            }
        }
        dd($this->imagesDis);
    }

    public function removeFile($nameFile){
        if(Storage::disk('public')->exists($nameFile)){
            Storage::delete('public/'.$nameFile);
        }
    }

    public function create(){
        $this->authorize('CreateDiseño', Diseno::class);
        // $this->tipoM = 'create';
        $this->openModal = true;
        $this->diseno = new Diseno();
        $this->emit('modalOpen');
        $this->abrirmodal('#CreateDiseno');
    }

    public function rules(){
        return [
            'images' => ['required'],
            'diseno.ObservacionDiseno'=> ['nullable','min: 8'],
            'diseno.obra_id' => ['required' ],
        ];
    }
    public function validationAttributes (){
        return [
            'ImagenPlano' => 'Imagen del Plano',
            'ObservacionDiseno' => 'Observación de Diseno',
            'obra_id' => 'Obra',
            'images.*' => 'Imagen del Plano'
        ];
    }
    public function messages(){
        return [
            'images.required' => 'Es obligatorio registrar imagenes/archivos.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function store(){
        $this->authorize('CreateDiseño', Diseno::class);
        $this->validate();

        $this->diseno->ImagenPlano = count($this->images);
        $this->diseno->save();

        foreach ($this->images as $image) {   // imagenes
            $this->diseno->Images()->create(['archivo'=>$image['nameFile']]);
        }
        $this->MaterialDiseno();

        $this->cerrarmodal('#CreateDiseno');
        session()->flash('message', 'Diseño creado satisfactoriamente.');

    }


    //SHOW ============================================================================

    public function show($id){
        $this->authorize('ShowDiseño', Diseno::class);
        $this->openModal = true;
        $this->openShow = true;
        $this->abrirmodal('#ShowDiseno');
        $diseno = Diseno::findOrFail($id);
        $this->diseno = $diseno;
        // $this->users = $ob->Usuarios()->get()->sortBy('id');
    }

    //DELETE ============================================================================

    public function delete($diseno){   // modal de confirmacion de eliminacion
        $this->authorize('deleteDiseño', Diseno::class);
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
        $this->authorize('DiseñoEdit', Diseno::class);
        // $this->tipoM = 'edit';
        $this->openModal = true;
        $this->diseno = Diseno::find($id);
        $this->abrirmodal('#EditDiseno');
    }

    public function update(){
        $this->authorize('DiseñoEdit', Diseno::class);
        $this->validate();
        $this->diseno->ImagenPlano = count($this->images);
        $this->diseno->save();

        // dd($this->diseno->Images()->get());
        if(count($this->diseno->Images()->get()) > 0 ){
            foreach($this->diseno->Images()->get() as $img){
                $img->delete();
            }
        }

        foreach ($this->images as $image) {   // imagenes
            $this->diseno->Images()->create(['archivo'=>$image['nameFile']]);

        }
        // $this->MaterialDiseno();

        $this->cerrarmodal('#EditDiseno');
        session()->flash('message', 'Diseño actualizado satisfactoriamente.');

    }


    // =================================================================================

    public function MaterialDiseno(){
        if($this->userA->can('material_diseno_save')){
            $this->diseno->material()->sync($this->resinaC); // para tabla N:M con usuarios
        }
    }

}










