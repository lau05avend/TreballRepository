<?php

namespace App\Http\Livewire\Calendar;

use App\Events\ActividadEvent;
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

    public $eventos = '';
    public Actividad $evento;
    public $obra_, $users, $asignadosE = [];
    public $respuestaC, $respuestaE, $inputA;
    protected $listeners = ['postAdded'];
    public Actividad $actividad;
    public User $user;

    public function mount($obra){
        $this->obra_ = Obra::find($obra);
        $this->userA = Auth::user();
        $this->inputA = null;
        $this->users = $this->obra_->usuarios;
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
        $eventos = $this->obra_->Actividades()->where('isActive','Active')->get();
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

    }

    public function refreshCalendar(){
        $this->emit('refreshCalendar');
    }

    /* --------------------------------  SHOW  ------------------------------------- */

    public function getEvent($idEv){
        $this->evento = new Actividad;
        $evento = Actividad::find($idEv);
        $evento->start = Carbon::parse($evento->start)->locale('es')->isoFormat('dddd d \d\e MMMM h:mm a');
        $evento->end = Carbon::parse($evento->end)->locale('es')->isoFormat('dddd d \d\e MMMM h:mm a');
        $this->evento = $evento;
        return $evento;
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

    public function asignarEmpleados($ing){
        $this->evento->Usuarios()->sync($ing);
        if(count($this->evento->Usuarios()->get() ) > 0 ){
            event(new ActividadEvent($this->evento));
        }
        // $this->evento = new Actividad();
        $this->asignadosE = [];
        return true;
    }

    public function redirectObra(){
        return redirect()->route('obra.index')->with('openShow',$this->obra_->id);
    }

    public function redirectEmpleado($id){
        return redirect()->route('empleado')->with('openShow',$id);
    }

    public function edit(){
        if($this->userA->can('UpdateActividad',[Actividad::class, $this->obra_->id]) ){
            $this->respuestaE = true;
            // $this->abrirmodal('#CreateEvento');
        }else if(!$this->userA->can('UpdateActividad',[Actividad::class, $this->obra_->id]) ){
            $this->respuestaE = false;
        }
    }

    public function eventDelete($id) {
        $eventDel = Actividad::find($id);
        $eventDel->update(['isActive'=>'Inactive']);
        // $event->delete();
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
