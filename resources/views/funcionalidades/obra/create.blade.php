<x-AppLayout>
    @section('title','Obras')

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
    @endsection

    <div>
        <div>
            <a href="{{ route('obra.index') }}" class="position-absolute bg-gray-900 font-extralight cursor-pointer text-white px-3 py-2 top-24 left-7 shadow-sm rounded-md hover:bg-gray-800 ">Index</a>
        </div>
        @livewire('obras.create')
    </div>

</x-AppLayout>
