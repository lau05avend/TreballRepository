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
    <script>
         $('#seeAcordion').on('click',function() {
            alert('acc')
            $("#accordionEmpleados").accordion({
            collapsible: true,
            heightStyle: "content"
            });
         });

    </script>
    @endpush

</x-AppLayout>
