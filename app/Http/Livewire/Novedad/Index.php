<?php

namespace App\Http\Livewire\Novedad;

use App\Events\NovedadEvent;
use App\Exports\UsersExport;
use App\Http\Livewire\WithSorting;
use App\Models\Actividad;
use App\Models\Cliente;
use App\Models\Novedad;
use App\Models\Obra;
use App\Models\TipoNovedad;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    use WithPagination;   // para paginacion
    use WithSorting;
    use AuthorizesRequests;

    public $search;
    public $perPage = '10';
    protected $queryString = [
        'search' => ['except' => ''],
        'filterState' => ['except' => 'Active'],
        'perPage' => ['except' => '10']
    ];
    public Novedad $novedad;
    public $users, $idN, $filterState;
    public $openDelete = false, $openModal = false;
    public $tipoM, $obraSel;
    public User $userA;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingPerPage(){
        $this->resetPage();
    }
    public function updatingFilterState(){
        $this->resetPage();
    }

    public function mount(){
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->novedad = new Novedad();
        $this->filterState = 'Active';
        $this->userA = Auth::user();
        $this->obraSel = null;
    }

    public function render()
    {
        if ($this->authorize('accessNovedad', Novedad::class) && Gate::denies('allNovedad', Novedad::class)) {

            if($this->userA->getRoleNames()[0] == 'Coordinador'){
                $obras = Obra::select(['NombreObra','obras.id'])->leftJoin('obra_usuario','obras.id','=','obra_id')
                    ->where('obra_usuario.empleado_id','=', $this->userA->cargo()->select('empleados.id')->first()['id'])
                    ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                    ->pluck('NombreObra','id')->toArray();

                $lista = Novedad::latest('updated_at')
                    ->when($this->filterState, function($query){
                        $query->where('novedads.isActive', $this->filterState);
                    })
                    ->select(['actividads.id as idA','novedads.*','empleados.id as idE', 'clientes.id as idC', 'obras.cliente_id as clientObra', 'obras.EstadoObra'])
                        ->leftJoin('actividads', 'actividads.id', '=', 'actividad_id')
                        ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
                        ->leftJoin('empleados', 'empleados.id', '=', 'empleado_id') //multitabla
                        ->Join('obras', 'obras.id', '=', 'actividads.obra_id')
                    ->whereNotIn('obras.EstadoObra',['Cancelada','Terminada'])
                    ->where('novedads.empleado_id', $this->userA->cargo()->select('empleados.id')->first()['id'] )
                    ->where(function($query){
                        $query->orWhere('AsuntoNovedad','like','%'.$this->search.'%')
                        ->orWhere('DescripcionN','like','%'.$this->search.'%')
                        ->orWhere('clientes.NombreCC','like','%'.$this->search.'%')
                        ->orWhere('actividads.title','like','%'.$this->search.'%')
                        ->orWhere('empleados.NombreCompleto','like','%'.$this->search.'%');
                    })
                    ->paginate($this->perPage);   //paginacion de elementos
            }
            else if($this->userA->getRoleNames()[0] == 'Cliente'){
                $lista = Novedad::latest('updated_at')
                    ->when($this->filterState, function($query){
                        $query->where('novedads.isActive', $this->filterState);
                    })
                    ->select(['actividads.id as idA','novedads.*', 'clientes.id as idC', 'obras.cliente_id as clientObra', 'obras.EstadoObra'])
                        ->leftJoin('actividads', 'actividads.id', '=', 'actividad_id')
                        ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
                        ->Join('obras', 'obras.id', '=', 'actividads.obra_id')
                    ->whereNotIn('obras.EstadoObra',['Cancelada','Terminada'])
                    ->where('novedads.cliente_id', $this->userA->cargo()->select('clientes.id')->first()['id'] )
                    ->where(function($query){
                        $query->orWhere('AsuntoNovedad','like','%'.$this->search.'%')
                        ->orWhere('DescripcionN','like','%'.$this->search.'%')
                        ->orWhere('clientes.NombreCC','like','%'.$this->search.'%')
                        ->orWhere('actividads.title','like','%'.$this->search.'%');
                    })
                    ->paginate($this->perPage);   //paginacion de elementos

                    $obras = Obra::select(['NombreObra','obras.id'])
                        ->where('obras.cliente_id','=', $this->userA->cargo()->select('clientes.id')->first()['id'])
                        ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                        ->pluck('NombreObra','id')->toArray();

            }
            else{
                $obras = Obra::select(['NombreObra','obras.id'])->leftJoin('obra_usuario','obras.id','=','obra_id')
                    ->where('obra_usuario.empleado_id','=', $this->userA->cargo()->select('empleados.id')->first()['id'])
                    ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                    ->pluck('NombreObra','id')->toArray();

                $lista = Novedad::latest('updated_at')
                    ->when($this->filterState, function($query){
                        $query->where('novedads.isActive', $this->filterState);
                    })
                    ->select(['actividads.id as idA','novedads.*','empleados.id as idE', 'clientes.id as idC', 'obras.cliente_id as clientObra', 'obras.EstadoObra'])
                        ->leftJoin('actividads', 'actividads.id', '=', 'actividad_id')
                        ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
                        ->leftJoin('empleados', 'empleados.id', '=', 'empleado_id') //multitabla
                        ->Join('obras', 'obras.id', '=', 'actividads.obra_id')
                    ->whereNotIn('obras.EstadoObra',['Cancelada','Terminada'])
                    ->where('novedads.empleado_id', $this->userA->cargo()->select('empleados.id')->first()['id'] )
                    ->where(function($query){
                        $query->orWhere('AsuntoNovedad','like','%'.$this->search.'%')
                        ->orWhere('DescripcionN','like','%'.$this->search.'%')
                        ->orWhere('clientes.NombreCC','like','%'.$this->search.'%')
                        ->orWhere('actividads.title','like','%'.$this->search.'%')
                        ->orWhere('empleados.NombreCompleto','like','%'.$this->search.'%');
                    })
                    ->paginate($this->perPage);   //paginacion de elementos
            }
        }
        else if($this->authorize('allNovedad', Novedad::class)){
            $obras = Obra::select(['NombreObra','obras.id'])->leftJoin('obra_usuario','obras.id','=','obra_id')
                ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                ->pluck('NombreObra','id')->toArray();

            $lista = Novedad::latest('updated_at')
            ->when($this->filterState, function($query){
                $query->where('novedads.isActive', $this->filterState);
            })
            ->select(['actividads.id as idA','novedads.*','empleados.id as idE', 'clientes.id as idC', 'obras.cliente_id as clientObra', 'obras.EstadoObra'])
                ->leftJoin('actividads', 'actividads.id', '=', 'actividad_id')
                ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
                ->leftJoin('empleados', 'empleados.id', '=', 'empleado_id') //multitabla
                ->Join('obras', 'obras.id', '=', 'actividads.obra_id')
            ->whereNotIn('obras.EstadoObra',['Cancelada','Terminada'])
            ->where(function($query){
                $query->orWhere('AsuntoNovedad','like','%'.$this->search.'%')
                ->orWhere('DescripcionN','like','%'.$this->search.'%')
                ->orWhere('clientes.NombreCC','like','%'.$this->search.'%')
                ->orWhere('actividads.title','like','%'.$this->search.'%')
                ->orWhere('empleados.NombreCompleto','like','%'.$this->search.'%');
            })
            ->paginate($this->perPage);   //paginacion de elementos
        }

        // $TipoNov=TipoNovedad::all()->sortBy('id');
        $TipoNov=TipoNovedad::pluck('NombreTipoN','id')->toArray();

        $Acti=Actividad::select('actividads.*','actividads.id')->where('obra_id',$this->obraSel)->orderBy('title','asc')
                        ->pluck('title','id')->toArray();

        // $this->lista = $lista;
        return view('livewire.novedad.index', [
            'lista' => $lista,
            'Tiponov'=>$TipoNov,
            'Act'=>$Acti,
            'obras' => $obras,
        ]);
    }

    /* -------------------------------- SHOW  ------------------------------------- */

    public function show($id){
        $this->authorize('ShowNovedad', Novedad::class);

        $this->abrirmodal('#ShowNovedad');
        $nv = Novedad::findOrFail($id);
        $this->novedad = $nv;
    }

    /* -------------------------------- CREAR  ------------------------------------- */

    public function create()
    {
        $this->authorize('createNovedad', Novedad::class);

        $this->tipoM = 'create';
        $this->openModal = true;
        $this->abrirmodal('#CreateNovedad');
        $this->novedad = new Novedad();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function rules(){
        return [
            'novedad.AsuntoNovedad' => 'required',
            // 'novedad.EstadoNovedad' => 'required',
            'novedad.DescripcionN' => 'required',
            'novedad.actividad_id' => 'required',
            // 'novedad.empleado_id' => 'nullable',
            // 'novedad.cliente_id' => 'nullable'
        ];
    }

    public function validationAttributes (){
        return [
            'AsuntoNovedad' => 'Asunto de la Novedad',
            'EstadoNovedad' => 'Estado de Novedad',
            'DescripcionN' => 'Descripción',
            'tipo_novedad_id'=> 'Tipo de Novedad',
            'actividad_id'=> 'Actividad',
            // 'empleado_id' => 'Empleado',
            // 'cliente_id' => 'Cliente',
        ];
    }

    public function store(){
        $this->authorize('createNovedad', Novedad::class);
        $this->validate();

        if ($this->userA->RolExterno == 'empleado') {
            $this->novedad->tipo_novedad_id = 2;
            $this->novedad->empleado_id = $this->userA->cargo()->get()->pluck('id')[0];
        }else if ($this->userA->RolExterno == 'cliente'){
            $this->novedad->tipo_novedad_id = 1;
            $this->novedad->cliente_id = $this->userA->cargo()->get()->pluck('id')[0];
        }
        $this->novedad->save();
        event(new NovedadEvent($this->novedad));
        $this->cerrarmodal('#CreateNovedad');
        $this->obraSel = null;
        session()->flash('message', 'Novedad satisfactoriamente creada.');
    }

    /* -------------------------------- EDIT  ------------------------------------- */

    public function edit($id)
    {
        if($this->userA->can('novedad_edit') || $this->userA->can('novedad_editTime')){
            $this->openModal = true;
            $this->tipoM = 'edit';
            $this->abrirmodal('#EditNovedad');
            $this->novedad = Novedad::find($id);
            $this->obraSel = $this->novedad->Actividad->Obra->id;
        }
    }

    public function update(){
        if($this->userA->can('novedad_edit') || $this->userA->can('novedad_editTime')){
            $this->validate();
            $this->novedad->save();
            $this->cerrarmodal('#EditNovedad');
            // $this->openModal = false;
            session()->flash('message', 'Novedad actualizada satisfactoriamente.');
        }
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($id){   // modal de confirmacion de eliminacion
        $this->authorize('deleteNovedad', Novedad::class);

        $this->openDelete = true;
        $this->idN = Novedad::find($id);
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($id){
        $this->authorize('deleteNovedad', Novedad::class);

        Novedad::find($id)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idN->id.' eliminado satisfactoriamente.');
    }

    public function activeConfirm($id){
        $this->authorize('NovedadActiv', Novedad::class);

        Novedad::find($id)->update(['isActive'=>'Active']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$this->idN->id.' activado satisfactoriamente.');
    }

    /* -------------------------------- MODAL  ------------------------------------- */

    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
    }

    /* -------------------------------- MODAL  ------------------------------------- */
    public function export($modo){
        abort_if(!in_array($modo, ['pdf', 'xlsx','csv']), Response::HTTP_NOT_FOUND);
        // return $modo;

        $users_export = new UsersExport();
        // $users_export->store('users.pdf', 'public');
        return $users_export->download('users.pdf');
        // return Excel::download(new UsersExport, 'users.xlsx');
        // return Excel::download(new NovedadExport($this->lista), 'novedad.'.$modo);
    }


}


