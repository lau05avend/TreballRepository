<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\Evento;
use App\Models\FaseTarea;
use App\Models\Obra;
use App\Http\Requests\CronogramaRequestSave;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class EventoController extends Controller
{

    public User $userA;

    public function index($obra){
        if ($this->authorize('AccessActividad', Actividad::class) && Gate::denies('calendario_all', Actividad::class)) {
            $this->authorize('AccessObraCalendar', [Actividad::class, $obra]);
        }else{
            $this->authorize('AllActividad', [Actividad::class, $obra] );
        }

        $obraModal = $this->verifyShow();
        $obra = Obra::find($obra);

        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');
        $actividadBread = $obra->Actividades()->where('Actividads.isActive','=','Active')->get()->first();
        return view('funcionalidades.calendar.index',[
            'estadoA' => $estadoA,
            'faseT' => $faseT,
            'idobr' => $obra,
            'actividadBread' => $actividadBread,
            'obraModal' => $obraModal,
            'users' => $obra->usuarios,
        ]);
    }

    public function allA($obra){
        if ($this->authorize('AccessActividad', Actividad::class) && Gate::denies('calendario_all', Actividad::class)) {
            $this->authorize('AccessObraCalendar', [Actividad::class, $obra]);
        }
        else{
            $this->authorize('AllActividad', [Actividad::class, $obra] );
        }

        $obra = Obra::find($obra);

        $evento = $obra->Actividades()->get();
        return response()->json($evento);
    }
    public function allF(){
        $fase = FaseTarea::all();
        return response()->json($fase);
    }


    public function showCalendarObra($obra = 0){
        $this->authorize('AccessActividad', Actividad::class);
        if($obra != 0 && $obra > 0){
            return redirect()->route('calendar.index', $obra)->with('openShow',$obra);
        }
        else if($obra == 0){
            return redirect()->route('dashboard')->with('noObra', true);
        }
    }
    public function verifyShow(){
        if(session()->has('openShow')){
            $obra = session('openShow');
            return $obra;
        }
    }

    public function show($obra, $eventoE)
    {
        $this->authorize('ShowActividad', Actividad::class);
        $eventoE = Actividad::find($eventoE);
        return response()->json($eventoE);
    }

    public function create(){
    }

    public function store($obra, CronogramaRequestSave $request)
    {
        $this->authorize('CreateActividad', [Actividad::class, $obra]);
        $actividad = Actividad::updateOrCreate(['id' => $request->id],[
            'title' => $request->title,
            'DescripcionActividad' => $request->description,
            'estado_actividad_id' => $request->estado_actividad_id,
            'fase_tarea_id' => $request->fase_tarea_id,
            'obra_id' => $request->obra_id,
            'start' => $request->start,
            'end' => $request->end,
            'estado_actividad_id' => $request->estado_actividad_id,
            'fase_tarea_id' => $request->fase_tarea_id,
            'obra_id' => $request->obra_id
        ]);

        $actividad->Usuarios()->sync($request->Empleados);
        // $actividad->Usuarios()->attach($request->Instalador);

        // $ac = $actividad;

        // $actividadP = Actividad::where('title', '=', $request->title)->get()->first();
        // $actividadP = Actividad::find($ac->data->id);
        // dd($actividadP);

        // if(Carbon::parse($actividadP->created_at) == Carbon::now() ){
        //     dd('yep');
        // }

        return $actividad;
    }

    public function edit($obra, Actividad $evento)
    {
        $this->authorize('UpdateActividad', [Actividad::class, $obra]);
        $evento->start = date('Y-m-d\TH:i', strtotime($evento->start));
        $evento->end = date('Y-m-d\TH:i', strtotime($evento->end));
        if ($evento->obra_id == $obra) {
            return response()->json($evento);
        }
    }

    public function update(Request $request, Actividad $evento, $obra)
    {
        $this->authorize('UpdateActividad', [Actividad::class, $obra]);
        $evento->update($request->validate([
            'title' => 'required',
            'DescripcionActividad' => 'required',
            'start' => 'required',
            'end' => 'required',
            'estado_actividad_id' => 'required',
            'fase_tarea_id' => 'required',
            'obra_id' => 'required'
        ]) );
        return response()->json($evento);
    }

    public function destroy(Evento $evento)
    {
        $this->authorize('DeleteActividad', Actividad::class);
        $evento->delete();
        return response()->json($evento);
    }
}
