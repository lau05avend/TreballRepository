<x-app-layout>
    @section('title','Obras')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
    @endsection
        <div>
            @livewire('obras.index')
        </div>
    @section('js')
    <script>

    @endsection
</x-app-layout>


