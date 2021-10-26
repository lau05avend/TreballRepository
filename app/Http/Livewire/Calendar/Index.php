<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\FaseTarea;
use App\Models\Obra;
use Livewire\Component;

class Index extends Component
{
    public $eventos = '', $evento = '';
    public $obra;
    // protected $listeners = ['create'];
    public Actividad $actividad;

    public function mount($idobra){
        $this->obra = Obra::find($idobra);
        // $this->actividad = new Actividad();
    }

    public function render()
    {
        $eventos = $this->obra->Actividades()->get();
        // $eventos = Actividad::select('id','title','start')->get();
        $this->eventos = json_encode($eventos);

        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');
        $obras = Obra::get()->sortBy('id');

        return view('livewire.calendar.index',[
            'estadoA' => $estadoA,
            'faseT' => $faseT,
            'obras' => $obras
        ]);
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
        $this->emit('console');
        // $this->obra = Obra::find(15);
    }

    public function store(){
        $this->validate();
        $this->actividad->save();
        session()->flash('message', 'Actividad creada satisfactoriamente.');
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

}
