<x-app-layout>
    @section('title','Obras')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
    @endsection
        <div>
            @livewire('obras.show', [$obra])
        </div>
</x-app-layout>


