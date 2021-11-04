<x-app-layout>
    @section('title','Obra | Registrar')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
    @endsection
        <div>
            @livewire('obras.index')
        </div>
</x-app-layout>


