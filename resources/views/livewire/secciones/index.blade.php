@section('css')

<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
@endsection

@section('title', 'Secciondes de diseño | Treball')

<div>
    {{ Breadcrumbs::render('Secciones') }}
    <div class="cardCustom">

        <!--========== CONTENT ==========-->
        @if (session('message'))
        <div id="success"
            class="advise alert alert-success w-auto flex flex-row shadow-2xl items-center alert-dismissible fade show"
            role="alert">
            <div
                class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-8 w-8 flex-shrink-0 rounded-full">
                <span class="text-green-500">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            <p id="messag" class="ml-5 items-center text-lg mb-0"> {{ session('message') }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="position-absolute">
            @if ($openModal)
                @can('seccion_create')
                    @include('livewire.secciones.create')
                @endcan
                @can('seccion_edit')
                    @include('livewire.secciones.edit')
                @endcan
            @endif
        </div>

        <div class="form">

            <h1 class="text-center mt-3">Secciones</h1>
            <div class="position-relative clear-both mt-14 pb-4">
                <div class="inline-block w-full">
                    <div class="float-left pl-6">
                        <label for="filter_length">Mostrar
                            <select name="filter_length" id="filter_length" wire:model="perPage" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="100">100</option>
                            </select>
                        registros</label>
                    </div>
                    @can('seccion_active')
                        <div class="float-left pl-6">
                            <label for="filterSecciones">Estado
                                <select name="filterSecciones" id="filterSecciones" wire:model="filterSecciones" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                    <option value="Active">Activos</option>
                                    <option value="Inactive">Eliminado</option>
                                </select>
                            </label>
                        </div>
                    @endcan
                    <div class="float-right">
                        <label for="search" class="mr-2">Buscar: </label>
                        <input id="search" name="search" type="text" wire:model="search" class="h-8 border-gray-500 w-72 rounded">
                    </div>
                    @can('seccion_create')
                        <button class="buttonN" wire:click="create()">
                            <span>NUEVO</span>
                            <i class="ion-android-add-circle" style="font-size:19px; margin-left:3px"></i>
                        </button><br>
                    @endcan
                </div>
                <div class="selectType mb-3" wire:ignore.self>
                    <div style="width: 310px;" class="" id="searchObraDiv">
                        <label for="searchObraD">Seleccione una obra:</label>
                        <x-select2 class="inpt form-control" style="width:201px;" id="searchObraD" name="searchObraD" :options="$obrasD"></x-select2>
                    </div>
                    <div class="pr-4" style="width: 300px; text-align: center;">
                        <label for="searchDiseno">Seleccione un diseño:</label>
                        <select class="inpt form-control" style="width:241px;" wire:model="searchDiseno" id="searchDiseno" name="searchDiseno" >
                            <option value="">Escoja el diseño</option>
                            @forelse ($disenos as $key => $value)
                            <option value="{{ $key }}">Diseño {{ $value }}</option>
                            @empty
                            @if ($selectObraD != null && $disenos == null)
                                <option value="" selected>No hay diseños en esta obra</option>
                            @endif
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <div wire:loading class="position-absolute top-28 font-semibold text-lg py-1 px-3">
                        <i wire:loading.class="fas fa-spinner fa-spin" ></i>
                        Cargando...
                    </div>
                    @if ($searchDiseno == "" || $selectObraD == null)
                        <div class="div-selectN ">
                            <span class="text-2xl">Seleccione el diseño</span>
                        </div>
                    @else

                        <div class="div-tab">
                            <table class=" table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id @include('components.table.sort', ['field' => 'id'])</th>
                                        <th>Nombre Seccion @include('components.table.sort', ['field' => 'NombreSeccion'])</th>
                                        <th>área @include('components.table.sort', ['field' => 'AreaSeccion'])</th>
                                        <th>Perímetro @include('components.table.sort', ['field' => 'PerimetroSec'])</th>
                                        <th>Color @include('components.table.sort', ['field' => 'Ncolor'])</th>
                                        <th>Diseño @include('components.table.sort', ['field' => 'diseno_id'])</th>
                                        <th>Actualizada en @include('components.table.sort', ['field' => 'updated_at'])</th>
                                        {{-- <th>isActive</th> --}}
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyC">
                                    @forelse ($seccioness as $l)
                                    <tr>
                                        <td>{{ $l->id }}</td>
                                        <td>{{ $l->NombreSeccion}}</td>
                                        <td>{{ $l->AreaSeccion }}</td>
                                        <td>{{ $l->PerimetroSec }}</td>
                                        <td>{{ $l->Color->Ncolor }}</td>
                                        <td>{{ $l->diseno_id }}</td>
                                        <td>{{ $l->updated_at?date('d-m-Y h:i:s A', strtotime($l->updated_at )) :'-' }}</td>

                                        @canany(['seccion_edit','seccion_delete','seccion_show'])
                                            @if ($l->isActive == 'Active')
                                                <td class="actions">
                                                    @can('seccion_show')
                                                        <button><i style="font-size:32px" class="ion-ios-eye-outline"></i></button>
                                                    @endcan
                                                    @can('seccion_edit')
                                                        <button style="margin-top: 5px;" wire:click="edit({{$l->id}})" class="cursor-pointer"><i class="material-icons">create</i></button>
                                                    @endcan
                                                    @can('seccion_delete')
                                                        <button wire:click="delete({{$l->id}})" class="cursor-pointer" style="font-size: 25px;"><i class="ion-trash-a"></i></button>
                                                    @endcan
                                                </td>
                                            @else
                                                @can('seccion_active')
                                                    <td><button class="bg-green-500 butt hover:bg-green-400 px-3 py-1 rounded" wire:click="delete({{$l->id}})" >Activar</button></td>
                                                @endcan
                                            @endif
                                        @endcanany
                                    </tr>
                                    @empty
                                        @if($searchDiseno != null && count($seccioness)<=0)
                                            <tr>
                                                <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">Este diseño no tiene secciones registrados.</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">No hay resultados para la búsqueda.</td>
                                            </tr>
                                        @endif
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endif
                    @if ($searchDiseno != null && count($seccioness)>0)
                        <div style="color: black;">
                            {{ $seccioness->links('components.custom-pagination-links') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @can('seccion_delete')
        @if ($openDelete)
            <x-delete>
                <x-slot name="title">{{$idS->isActive == 'Active'?'Eliminar':'Activar '}} hola</x-slot>
                <x-slot name="body">
                    @if ($idS->isActive == 'Active')
                        <p>¿Esta seguro que desea eliminar el registro {{ $idS->id }} ?</p>
                    @else
                        <p>¿Esta seguro que desea activar el registro {{ $idS->id }} ?</p>
                    @endif
                </x-slot>
                <x-slot name="method">
                    @if ($idS->isActive=='Active')
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="deleteConfirm({{$idS->id}})" >Yes, Delete</button>
                    @else
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="activeConfirm({{$idS->id}})" >Yes, Activar</button>
                    @endif
                </x-slot>
            </x-delete>
        @endif

        @endcan
    </div>
</div>

@push('jss')
<script defer>
    document.addEventListener("DOMContentLoaded", () => {
        var inputSearch = document.querySelector('#searchObraDiv');

            if( $('#searchDiseno').val() == "null"){
                    $("#searchDiseno option[value='null']").remove();
            }

            if( $('#searchObraD').val() == null){
                $('#searchDiseno').val(null).trigger('change');
            }

            $('#searchObraD').on('change', function(event){
                let value = event.target.value;
                @this.set('selectObraD',value);
                $('#searchDiseno').val("");
                console.log(@json($disenos))
            })
    });
</script>
@endpush
