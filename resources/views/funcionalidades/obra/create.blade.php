<x-AppLayout>
    @section('title','Obras')

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
    <link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
    @endsection

    <div>
        @livewire('obras.create')
    </div>

    @push('jss')

    @endpush

</x-AppLayout>
