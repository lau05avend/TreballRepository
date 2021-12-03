<?php

namespace App\Http\Livewire\Obras;

use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\WithSorting;
use App\Models\Obra;
use App\Models\Image;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use AuthorizesRequests;

    public $search;
    public $perPage = '5';
    protected $listeners = ["emit_to_parent" => 'openShowModal'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filterState' => ['except' => '']
    ];
    public Obra $obra;
    public User $userA;
    public $users, $idO, $filterState, $filterStateIn;
    public $openModal = false;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function updatingPerPage(){
        $this->resetPage();
    }
    public function updateFilterState(){
        $this->perPage = '';
    }


    public function verifyShow()
    {
        if(session()->has('openShow')){
            // dd(session('openShow'));
            $ob = session('openShow');
            $this->show($ob);
        }
    }

    public function emit_to_parent()
    {
            $this->emit("foo");
    }

    public function mount(){
        $this->verifyShow();
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->filterState = '';
        $this->filterStateIn = '';
        $this->userA = Auth::user();
    }

    public function render()
    {
        dd(phpinfo());
        if ($this->authorize('AccessObra', Obra::class) && Gate::denies('AllObra', Obra::class)) {
            if($this->userA->getRoleNames()[0] != 'Cliente') {
                $obras = Obra::select(['obras.*','clientes.id as idCl','clientes.NombreCC','cities.id as idCity', 'cities.ciudad'])
                    ->leftJoin('obra_usuario','obras.id','=','obra_id')
                    ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
                    ->leftJoin('cities', 'cities.id', '=', 'obras.city_id')
                    ->where('empleado_id','=', $this->userA->cargo()->select('empleados.id')->first()['id'])
                    ->where(function($query){
                        $query->orWhere('EstadoObra','LIKE', '%'.$this->search.'%');
                        $query->orWhere('clientes.NombreCC','like','%'.$this->search.'%')
                        ->orWhere('cities.ciudad','like','%'.$this->search.'%')
                        ->orWhere('NombreObra','like','%'.$this->search.'%');
                    })
                    ->paginate($this->perPage);
            }
            else if($this->userA->getRoleNames()[0] == 'Cliente') {
                $obras = $this->userA->ObrasC()
                        ->where(function($query){
                            $query->orWhere('EstadoObra','LIKE', '%'.$this->search.'%');
                            $query->where('obras.isActive','=', 'Active');
                            $query->orWhere('NombreObra','like','%'.$this->search.'%');
                        })
                        ->paginate($this->perPage);
            }
        }
        else if($this->authorize('AllObra', Obra::class)){
            $obras = Obra::latest('updated_at')
            ->when($this->filterState != 'Inactive' && $this->filterState != '', function($query){
                return $query->where('obras.isActive','Active')
                    ->where('EstadoObra', $this->filterState);
            })
            ->when($this->filterState == 'Inactive', function($query){
                return $query->Inactive();
            })
            ->when($this->filterState == '', function($query){
                return $query
                    ->where('obras.isActive','Active');
            })
            // ->whereNotIn('obras.isActive', ['Inactive'])
            ->select(['clientes.id as idCl','clientes.NombreCC','obras.*','cities.id as idCity', 'cities.ciudad'])
            ->leftJoin('clientes', 'clientes.id', '=', 'cliente_id')
            ->leftJoin('cities', 'cities.id', '=', 'city_id')
            ->where(function($query){
                $query->orWhere('EstadoObra','LIKE', '%'.$this->search.'%');
                $query->orWhere('clientes.NombreCC','like','%'.$this->search.'%')
                ->orWhere('cities.ciudad','like','%'.$this->search.'%')
                ->orWhere('NombreObra','like','%'.$this->search.'%');
            })
            ->paginate($this->perPage);
        }


        return view('livewire.obras.index', [
            'obras' => $obras,
        ]);
    }

    /* -------------------------------- MODAL  ------------------------------------- */

    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
    }

    /* -------------------------------- SHOW  ------------------------------------- */

    public function show($id){
        $this->openModal = true;
        $this->abrirmodal('#showModel');
        $ob = Obra::findOrFail($id);
        $this->obra = $ob;
        $this->users = $ob->Usuarios()->get()->sortBy('id');
    }

    /* -------------------------------- DELETE  ------------------------------------- */

    public function delete($obra){   // modal de confirmacion de eliminacion
        $this->openModal = true;
        $this->idO = $obra;
        $this->cerrarmodal('#showModel');
        $this->abrirmodal('#deleteConfirm');
    }
    public function deleteConfirm($obra){
        Obra::find($obra)->update(['isActive'=>'Inactive']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$obra.' eliminado satisfactoriamente.');
        $this->idO = '';
    }

    public function activeConfirm($obra){
        Obra::find($obra)->update(['isActive'=>'Active']);
        $this->cerrarmodal('#deleteConfirm');
        session()->flash('message', 'Registro '.$obra.' activado satisfactoriamente.');
        $this->idO = '';
    }

}

