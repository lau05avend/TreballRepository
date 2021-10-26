{{-- @extends('partials.nav')
@section('title','Obra | Treball')
@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
@endsection

@section('content')
    <div >
        @livewire('obras.index')
    </div>
@endsection --}}


<x-app-layout>
    @section('title','Obra | Registrar')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
    @endsection
        <div>
            @livewire('obras.index')
        </div>
</x-app-layout>


