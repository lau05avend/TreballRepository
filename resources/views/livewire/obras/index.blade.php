

<div class="-mt-5">
    <div class="container-fluid px-0 -pr-2">
        <!--========== CONTENT ==========-->

        <div>
            @if ($openModal)
                @include('livewire.obras.show')
            @endif
        </div>

        {{ Breadcrumbs::render('obrasG') }}
        <div class="row justify-content-center pl-2 position-relative">
            {{-- <div>
                @include('livewire.obra.create')
                @include('livewire.obra.show')
                @include('livewire.obra.edit')
            </div> --}}
            <div class="card">
                <p class="title-o text-5xl pb-4">Obras</p>
                <div class="flex-wrap mb-2 ml-4" x-data="{
                                                checked:1,
                                                activeClasses: 'text-gray-700 font-semibold border-gray-600',
                                                inactiveClasses: 'text-gray-500 border-green-500'
                                            }">
                    <div class="butt-status w-90 bg-white text-center justify-between flex flex-wrap ml-5 mt-1">
                        @can('obra_all')
                            <label id="filterState" class="cursor-pointer py-2 px-3 mx-1 border-b-4" @click="checked = 1"
                                :class="checked === 1 ? activeClasses : inactiveClasses">Todas
                                <input type="radio" class="hidden" name="filterState" value="" wire:model="filterState" id="filterState" checked>
                            </label>
                        @endcan
                        <label id="filterState" class="cursor-pointer py-2 px-3 mx-1 border-b-4" @click="checked = 2"
                            :class="checked === 2 ? activeClasses : inactiveClasses" x-transition:enter-start.opacity>Sin Iniciar
                            <input type="radio" class="hidden" name="filterState" value="Sin Iniciar" wire:model="filterState" id="filterState">
                        </label>
                        <label id="filterState" class="cursor-pointer py-2 px-3 mx-1 border-b-4" @click="checked = 3"
                            :class="checked === 3 ? activeClasses : inactiveClasses">En proceso
                            <input type="radio" class="hidden" name="filterState" value="Activa" wire:model="filterState" id="filterState">
                        </label>
                        @can('ObraTerminadaCancelada', App\Models\Obra::class)
                            <label id="filterState" class="cursor-pointer py-2 px-3 mx-1 border-b-4" @click="checked = 4"
                                :class="checked === 4 ? activeClasses : inactiveClasses">Terminada
                                <input type="radio" class="hidden" name="filterState" value="Terminada" wire:model="filterState" id="filterState">
                            </label>
                            <label id="filterState" class="cursor-pointer py-2 px-3 mx-1 border-b-4" @click="checked = 5"
                                :class="checked === 5 ? activeClasses : inactiveClasses">Cancelada
                                <input type="radio" class="hidden" name="filterState" value="Cancelada" wire:model="filterState" id="filterState">
                            </label>
                        @endcan
                        @can('ActiveObra')
                            <label id="estadoObra" class="cursor-pointer py-2 px-3 mx-1 border-b-4" @click="checked = 6"
                                :class="checked === 6 ? activeClasses : inactiveClasses">Eliminadas
                                <input type="radio" class="hidden" name="filterState" value="Inactive" wire:model="filterState" id="estadoObra">
                            </label>
                        @endcan
                    </div>
                    @can('obra_create')
                        <a class="float-right mr-3 btn btn-dark " href="{{ route('obra.create') }}" id="addobra">
                            <i class="fa fa-plus"></i> Agregar Obra
                        </a>
                    @endcan
                </div>
            </div>
            @if (session()->has('message'))
                <div id="success" class="position-absolute advise alert alert-success w-auto flex flex-row shadow-2xl bg-green-500 pl-20 items-center alert-dismissible fade show" role="alert">
                    <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-8 w-8 flex-shrink-0 rounded-full">
                        <span class="text-green-500">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd">
                                </path>
                            </svg>
                        </span>
                    </div>
                    <p id="messag" class="ml-5 items-center text-lg mb-0 text-green-50"> {{ session('message') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="contOb mx-0 mt-2 block">
                    <div class="px-3 pb-4">
                        <input wire:model='search' type="text" class="form-control rounded-sm focus:border-gray-700 shadow-none" name="search" id="search" placeholder="Buscar Obra">
                    </div>
                    <div class="flex flex-wrap mx-0 justify-center">
                        @forelse ($obras as $ob)
                            <div data-id="{{ $ob->id }}"
                                class="obra-div bg-white  rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300">
                                <div class="h-32 justify-center flex">
                                    @if ($ob->Images()->first())
                                    <img class="max-h-28 " src="{{ '/storage/'. $ob->Images()->first()->archivo }}" alt="img">
                                    @else
                                        {{-- <p>NO HAY IMAGENES ASIGNADAS</p> --}}
                                        <img src="https://images.unsplash.com/photo-1547517023-7ca0c162f816" alt="">
                                    @endif
                                </div>
                                <div class="items-center mb-16">
                                    <div class="title_card">
                                        <h1 class="font-semibold" id="title">{{ $ob->id.'. '.$ob->NombreObra }}</h1>
                                    </div>
                                    <p class=" text-indigo-600 font-semibold">{{ $ob->EstadoObra }}</p>
                                    <small class="mt-2 font-semibold">Modificada {{ $ob->updated_at?$ob->updated_at->diffForHumans():'---' }}</small>
                                </div>
                                <div class="title_info">
                                    <br><button
                                    wire:click="show({{$ob->id}})"
                                    id="detail"
                                        class="text-white text-md font-semibold bg-green-400 py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-500 transform-gpu hover:scale-110 ">
                                        {{-- <a href="{{ route('obra.show', $ob) }}">DETALLE</a> --}}
                                        DETALLE
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="py-8 mx-2 bg-purple-50 w-full rounded-sm shadow-md">
                                <h3 class="text-center text-2xl text-semibold">No hay resultados para la búsqueda "{{ $search }} ".</h3>
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-4">
                        {{ $obras->links() }}
                    </div>
            </div>

        </div>
    </div>
</div>

@push('jss')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Livewire.emit('emit_to_parent')
            @this.on('foo', () => {
                alert('ddf')
                @this.show(12)
            });
        });
    </script>
@endpush

@section('scripts')
    @include('sweetalert::alert')
    <script src="{{ asset('js/script-obra.js'); }}"></script>
@endsection

