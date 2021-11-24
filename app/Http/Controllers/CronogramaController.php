<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\Evento;
use App\Models\FaseTarea;
use App\Models\Obra;
use App\Http\Requests\CronogramaRequestSave;

class CronogramaController extends Controller
{
    public function index($obra)
    {
        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');
        $obrass = Obra::all();
        return view('funcionalidades.calendar.index',[
            'estadoA' => $estadoA,
            'faseT' => $faseT,
            'obrasdisp' => $obrass,
            'idobr' => $obra
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
        return response()->json($evento);
    }

    public function create(){
    }

    public function store($obra, CronogramaRequestSave $request)
    {
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
        $evento->start = date('Y-m-d\TH:i', strtotime($evento->start));
        $evento->end = date('Y-m-d\TH:i', strtotime($evento->end));
        if ($evento->obra_id == $obra) {
            return response()->json($evento);
        }
    }

    public function update(Request $request, Actividad $evento)
    {
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
        $evento->delete();
        return response()->json($evento);
    }
}
