<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveObraFormRequest;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\TipoObra;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    public function index()
    {
        return view('funcionalidades.obra.index');
    }

    public function create()
    {
        return view('funcionalidades.obra.create');
    }

    public function store($request)
    {
        Obra::create($request->validated());
        return redirect()->route('funcionalidades.obra.index')->with('status',__('Obra creado correctamente.'));
    }

    public function edit(Obra $obra)
    {
        return view('funcionalidades.obra.edit', [
            'obra' => $obra,
        ]);
    }

    public function update($request, Obra $obra)
    {
        $obra->update($request->validated());
        return redirect()->route('obra.index')->with('status',__('Obra actualizada correctamente.'));
    }

    public function destroy(Obra $obra)
    {
        $obra->delete();
        return redirect()->route('obra.index')->with('status',__('Obra eliminada correctamente.'));
    }

    public function show(Obra $obra)
    {
        $usuarios = $obra->Usuarios()->get()->sortBy('id');
        return view('funcionalidades.obra.show');
        // return view('livewire.obra.obra', [
        //     'obra' => $obra
        // ]);  //para usar con livewire
    }

}
