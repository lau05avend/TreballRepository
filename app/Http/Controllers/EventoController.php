<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\Evento;
use App\Models\FaseTarea;
use App\Models\Obra;
use App\Http\Requests\CronogramaRequestSave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EventoController extends Controller
{
    public function index($obra)
    {
        $this->authorize('AccessActividad', Actividad::class);
        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');
        $obrass = Obra::all();
        $obra = Obra::find($obra);
        $actividadBread = $obra->Actividades()->where('Actividads.isActive','=','Active')->get()->first();
        return view('funcionalidades.calendar.index',[
            'estadoA' => $estadoA,
            'faseT' => $faseT,
            'obrasdisp' => $obrass,
            'idobr' => $obra,
            'actividadBread' => $actividadBread
        ]);
    }

    public function allA($obra)
    {
        // $evento = Actividad::all();
        $obra = Obra::find($obra);
        $evento = $obra->Actividades()->get();
        return response()->json($evento);
    }
    public function allF()
    {
        $fase = FaseTarea::all();
        return response()->json($fase);
    }

    public function show(Evento $evento)
    {
        $this->authorize('ShowActividad', Actividad::class);
        return response()->json($evento);
    }

    public function create(){
    }

    public function store($obra, CronogramaRequestSave $request)
    {
        $this->authorize('CreateActividad', Actividad::class);
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
            // 'obra_id' => $request->obra_id,
            'obra_id' => $obra,
        ]);
        return $actividad;
    }

    public function edit($obra, Actividad $evento)
    {
        $this->authorize('UpdateActividad', Actividad::class);
        $evento->start = date('Y-m-d\TH:i', strtotime($evento->start));
        $evento->end = date('Y-m-d\TH:i', strtotime($evento->end));
        if ($evento->obra_id == $obra) {
            return response()->json($evento);
        }
    }

    public function update(Request $request, Actividad $evento)
    {
        $this->authorize('UpdateActividad', Actividad::class);
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
