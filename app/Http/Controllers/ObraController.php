<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObraController extends Controller
{
    public function index()
    {
        $this->authorize('AccessObra', Obra::class);
        return view('funcionalidades.obra.index');
    }

    public function showBread($op = 0)
    {
        $this->authorize('AccessObra', Obra::class);
        if($op != 0 && $op > 0){
            return redirect()->route('obra.index')->with('openShow',[true,$op]);
        }
        else if($op == 0){
            return redirect()->route('clientes');
        }
            // return dd($op);
    }

    public function create()
    {
        $this->authorize('CreateObra', Obra::class);
        return view('funcionalidades.obra.create');
    }

    public function store($request)
    {
        $this->authorize('CreateObra', Obra::class);
        Obra::create($request->validated());
        return redirect()->route('funcionalidades.obra.index')->with('status',__('Obra creado correctamente.'));
    }

    public function edit(Obra $obra)
    {
        $this->authorize('UpdateObra', $obra);
        return view('funcionalidades.obra.edit', [
            'obra' => $obra,
        ]);
    }

    public function update($request, Obra $obra)
    {
        // $obra->update($request->validated());
        // return redirect()->route('obra.index')->with('status',__('Obra actualizada correctamente.'));
    }

    public function destroy(Obra $obra)
    {
        $this->authorize('DeleteObra', $obra);
        $obra->delete();
        return redirect()->route('obra.index')->with('status',__('Obra eliminada correctamente.'));
    }

    public function show(Obra $obra, $openModal = true)
    {
        $this->authorize('ShowObra', $obra);
        $users = $obra->Usuarios()->get()->sortBy('id');

        return view('funcionalidades.obra.show', [
            'obra' => $obra,
            'users' => $users,
            'openModal' => $openModal
        ]);
        // return view('livewire.obra.obra', [
        //     'obra' => $obra
        // ]);  //para usar con livewire
    }

}
