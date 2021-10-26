@extends('layouts.app')

@section('title','Obras')

@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
@endsection

@section('content')
    <div class="mt-2">
        @livewire('obras.show')
    </div>
@endsection



{{-- @extends('partials/nav')

@section('title','Obra | {{ $obra->NombreObra }}')

@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-acti.css'); }}">
@endsection

@section('content')

    @if (session('success'))
    <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">
        <p id="messag">{{ session('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="form" id="form">
        <a href="{{ route('obra.index') }}" class="btn btn-dark">Volver</a><br><br>
        <div class="form-ob">
            <p class="title"><strong>{{ $obra->NombreObra }}</strong> </p>
            <p class="p-d"><strong>TIPO OBRA:  </strong>{{ $obra->TipoObra->TipoObra  }}</p><br>
            <p><strong>Dirección: </strong> {{ $obra->DireccionObra}}</p>
            <p><strong>Ciudad: </strong> {{ $obra->City->ciudad }}</p>
            <p><strong>Medida Area: </strong> {{ $obra->MedidaArea}}</p>
            <p><strong>Medida Perimetro: </strong> {{ $obra->MedidaPerimetro }}</p>
            <p><strong>Tipo de Material Suelo: </strong> {{ $obra->TipoMaterialSuelo}}</p>
            <p><strong>Cliente: </strong> {{ $obra->cliente->NombreCC}}</p>


            <br>
            <p><strong>FECHA DE REGISTRO: </strong> {{ $obra->created_at?date('d-m-Y h:i:s A', strtotime($obra->created_at )):'-' }}</p>
            <p><strong>ACTUALIZADA POR ULTIMA VEZ: </strong> {{ $obra->updated_at? date('d-m-Y h:i:s A', strtotime($obra->updated_at )):'-' }}</p>
            <div >


                <h2 class="title">Usuarios Asignados</h2><br>
                <ul class="list-disc list-us">
                    @forelse ($users as $u)
                    <li>{{ $u->id.'. '.$u->NombreUsuario.' '.$u->ApellidosUsuario }}: <strong>{{$u->Rol->NombreRol}}</strong></li>
                    @empty
                    <li><strong>NO HAY USUARIOS ASIGNADOS.</strong></li>
                    @endforelse
                </ul>
                <br><br>
            </div>
            <br><br>
        <a href="{{ route("editarusO",$obra) }}" class="btn btn-dark buttonN">EDITAR</a>
        </div>
        {{-- {{ $users }} --}}

    </div>

@endsection --}}
