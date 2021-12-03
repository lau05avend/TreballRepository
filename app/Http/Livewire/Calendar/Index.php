<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\FaseTarea;
use App\Models\Obra;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Index extends Component
{
    use AuthorizesRequests;

    public $eventos = '', $evento = '';
    public $obra_;
    public $respuestaC, $respuestaE, $inputA;
    protected $listeners = ['postAdded'];
    public Actividad $actividad;
    public User $user;

    public function mount($obra){
        $this->obra_ = Obra::find($obra);
        $this->userA = Auth::user();
        $this->inputA = null;
        $this->respuestaC = $this->userA->can('CreateActividad', [Actividad::class, $obra]) ? true : false;
        $this->respuestaE = $this->userA->can('UpdateActividad',[Actividad::class, $this->obra_->id] )? true : false;
    }

    public function defineObra(){
        $this->validate([
            'inputA' => 'required'
        ],
        [
            'inputA.required' => 'Este campo es obligatorio.'
        ]);
        return redirect()->route('calendar.index',$this->inputA);
    }

    public function render()
    {
        if ($this->authorize('calendario_access', Obra::class) && Gate::denies('calendario_all', Obra::class)) {
            if($this->userA->getRoleNames()[0] != 'Cliente' && $this->userA->getRoleNames()[0] != 'Coordinador' ) {

                $obras = Obra::select(['NombreObra','obras.id'])->leftJoin('obra_usuario','obras.id','=','obra_id')
                        ->where('obra_usuario.empleado_id','=', $this->userA->cargo()->select('empleados.id')->first()['id'])
                        ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                        ->pluck('NombreObra','id')->toArray();
            }
            else if($this->userA->getRoleNames()[0] == 'Coordinador'){
                $obras =  Obra::select(['NombreObra','obras.id'])->leftJoin('obra_usuario','obras.id','=','obra_id')
                        ->where('obra_usuario.empleado_id','=', $this->userA->cargo()->select('empleados.id')->first()['id'])
                        ->where('obras.isActive','Active')
                        ->pluck('NombreObra','id')->toArray();
            }
            else if($this->userA->getRoleNames()[0] == 'Cliente') {
                $obras = $this->userA->Cargo()->get()->first()->Obras()
                        ->where('obras.isActive','Active')->whereIn('obras.EstadoObra',['Sin Iniciar','Activa'])
                            ->pluck('NombreObra','id')->toArray();

                $eventos = $this->obra_->Actividades()->get();
            }

        }
        else if($this->authorize('calendario_all', Obra::class)){
            $obras = Obra::select(['NombreObra','id'])->where('isActive','Active')
                        ->orderBy('id','asc')->pluck('NombreObra','id')->toArray();
        }
        $eventos = $this->obra_->Actividades()->get();
        $this->eventos = json_encode($eventos);

        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');

        return view('livewire.calendar.index',[
            'estadoA' => $estadoA,
            'faseT' => $faseT,
            'obrasdisp' => $obras
        ]);
    }

    public function postAdded($actividad){
        $this->actividad = Actividad::find($actividad['id']);
        if($this->actividad->created_at ==  $this->actividad->updated_at){
            dd('creaaaar');
        }

    }

    public function neh(){
        $this->emit('refreshCalendar');
    }

    /* --------------------------------  SHOW  ------------------------------------- */

    public function getEvent($idEv){

        $evento = Actividad::find($idEv);
        $evento->start = date('Y-m-d\TH:i', strtotime($evento->start));
        $evento->end = date('Y-m-d\TH:i', strtotime($evento->end));
        // $eventos = Actividad::select('id','title','start')->get();

        return  json_encode($evento);
    }

    /* --------------------------------  CREATE  ------------------------------------- */

    public function rules(){
        return [
            'actividad.title' => 'required',
            'actividad.DescripcionActividad' => 'required',
            'actividad.start' => 'required',
            'actividad.end' => 'required',
            'actividad.estado_actividad_id' => 'required',
            'actividad.fase_tarea_id' => 'required',
            'actividad.obra_id' => 'required'
        ];
    }

    public function create(){
        if($this->userA->can('CreateActividad', [Actividad::class, $this->obra_->id]) ){
            $this->respuestaC = true;
            $this->actividad = new Actividad();
            // $this->abrirmodal('#CreateEvento');
        }
        else if($this->userA->can('CreateActividad', [Actividad::class, $this->obra_->id]) ){
            $this->respuestaC = false;
        }
    }

    public function store(){
        $this->validate();
        $this->actividad->save();
        session()->flash('message', 'Actividad creada satisfactoriamente.');
    }

    /* --------------------------------  EDIT  ------------------------------------- */

    public function edit(){
        if($this->userA->can('UpdateActividad',[Actividad::class, $this->obra_->id]) ){
            $this->respuestaE = true;
            // $this->abrirmodal('#CreateEvento');
        }else if(!$this->userA->can('UpdateActividad',[Actividad::class, $this->obra_->id]) ){
            $this->respuestaE = false;
        }
    }


    // public function addevent($event)
    // {
    //     $input['title'] = $event['title'];
    //     $input['start'] = $event['start'];
    //     Actividad::create($input);
    // }


    /* --------------------------------  DELETE  ------------------------------------- */

    public function eventDrop($event, $oldEvent)
    {
    //   $eventdata = Actividad::find($event['id']);
    //   $eventdata->start = $event['start'];
    //   $eventdata->save();
    }

    /* -------------------------------- MODAL  ------------------------------------- */

    public function abrirmodal($Nmodal){
        $this->emit('openModal', $Nmodal);
    }
    public function cerrarmodal($Nmodal){
        $this->emit('closeModal', $Nmodal);
    }

}
