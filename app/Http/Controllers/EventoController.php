<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\EstadoActividad;
use App\Models\Evento;
use App\Models\FaseTarea;
use App\Models\Obra;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $estadoA = EstadoActividad::get()->sortBy('id');
        $faseT = FaseTarea::get()->sortBy('id');
        $obra = Obra::all();
        return view('funcionalidades.calendar.index',[
            'estadoA' => $estadoA,
            'faseT' => $faseT,
            'obra' => $obra
        ]);
    }

    public function allA()
    {
        $evento = Actividad::all();
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

    public function create()
    {
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'start' => 'required',
        //     'end' => 'required',
        //     'estado_actividad_id' => 'required',
        //     'fase_tarea_id' => 'required',
        //     'obra_id' => 'required'
        // ]);
        // Evento::create($request->only('title','description','start','end'));
        Actividad::updateOrCreate(['id' => $request->id],[
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
    }

    public function edit(Actividad $evento)
    {
        $evento->start = date('Y-m-d\TH:i', strtotime($evento->start));
        $evento->end = date('Y-m-d\TH:i', strtotime($evento->end));
        return response()->json($evento);
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
