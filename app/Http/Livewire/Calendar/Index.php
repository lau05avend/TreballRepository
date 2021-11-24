<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\FaseTarea;
use App\Models\Obra;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Index extends Component
{
    use AuthorizesRequests;

    public $eventos = '', $evento = '';
    public $obra_;
    public $respuestaC, $respuestaE;
    // protected $listeners = ['create'];
    public Actividad $actividad;
    public User $user;

    public function mount($obra){
        $this->obra_ = Obra::find($obra);
        $this->userA = Auth::user();
        $this->respuestaC = $this->userA->can('calendario_create')? true : false;
        $this->respuestaE = $this->userA->can('calendario_edit')? true : false;
    }

    public function render()
    {
        $eventos = $this->obra_->Actividades()->get();
        // $eventos = Actividad::select('id','title','start')->get();
        $this->eventos = json_encode($eventos);

        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');
        $obras = Obra::get()->sortBy('id');

        return view('livewire.calendar.index',[
            'estadoA' => $estadoA,
            'faseT' => $faseT,
            'obrasdisp' => $obras
        ]);
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
        if($this->userA->can('calendario_create')){
            $this->respuestaC = true;
            $this->actividad = new Actividad();
            // $this->abrirmodal('#CreateEvento');
        }
        else if($this->userA->can('calendario_create')){
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
        if($this->userA->can('calendario_edit')){
            $this->respuestaE = true;
            // $this->abrirmodal('#CreateEvento');
        }else if(!$this->userA->can('calendario_edit')){
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
