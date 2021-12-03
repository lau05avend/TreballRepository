@section('title', 'Diseños | Treball')
@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
<style>
    table.table thead .sorting:before, table.table thead .sorting:after, table.table thead .sorting_asc:before,
    table.table thead .sorting_asc:after, table.table thead .sorting_desc:before, table.table thead .sorting_desc:after,
    table.table thead .sorting_asc_disabled:before, table.table thead .sorting_asc_disabled:after,
    table.table thead .sorting_desc_disabled:before, table.table thead .sorting_desc_disabled:after{
        top: 1.3em;
    }
    .dz-default.dz-message span {
        font-size: 21px;
        color: #464343;
    }
</style>
@endsection

<div>
    {{ Breadcrumbs::render('Disenos') }}
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
            @can('diseno_create')
                @include('livewire.diseno.create')
            @endcan
            @can('diseno_show')
                @include('livewire.diseno.show')
            @endcan
            @can('diseno_edit')
                @include('livewire.diseno.edit')
            @endcan
        </div>

        <div class="form">

            <h1 class="text-center mt-3" style="color: black;">Diseños y Planos</h1><br>
            <i class="bx bx-loader bx-spin font-size-16 align-middle mr-2"></i>
            <div class="position-relative clear-both mt-6 pb-4">
                <div class="inline-block w-full">
                    <div class="float-left pl-6">
                        <label for="filter_length">Mostrar
                            <select name="filter_length" id="filter_length" wire:model="perPage"
                                class="py-0.5 focus:ring-0 focus:border-gray-600">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="100">100</option>
                            </select>
                            registros</label>
                    </div>
                    @can('diseno_delete')
                        <div class="float-left pl-6">
                            <label for="filterStateIn">Estado
                                <select name="filterStateIn" id="filterStateIn" wire:model="filterStateIn" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                    <option value="Active">Activos</option>
                                    <option value="Inactive">Eliminado</option>
                                </select>
                            </label>
                        </div>
                    @endcan
                    @can('diseno_all')
                    @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                        <div class="float-left ml-3">
                            <livewire:excel-export model="Diseno" format="csv,pdf,xlsx" />
                        </div>
                    @endif
                    @endcan
                    <div class="float-right">
                        <label for="search" class="mr-2">Buscar: </label>
                        <input id="search" name="search" type="text" wire:model="search"
                            class="h-8 border-gray-500 w-68 rounded">
                    </div>
                    @can('diseno_create')
                        <button class="buttonN" wire:click="create">
                            <span>NUEVO</span>
                            <i class="ion-android-add-circle" style="font-size:19px; margin-left:3px"></i>
                        </button><br>
                    @endcan
                </div>
                @can ('diseno_all')
                    <div class="selectType mb-3" wire:ignore>
                        <div class="pr-4" style="width: 300px; text-align: center;">
                            <label for="selectTipo">Preferencia de Contenido:</label>
                            <select class="inpt form-control" name="selectTipo" id="selectTipo">
                                <option value="All">Todas las obras</option>
                                <option value="PerObra">Por obra</option>
                            </select>
                        </div>
                        <div style="width: 310px;" class="" id="searchObraDiv">
                            <label for="searchObra">Consultar obra:</label>
                            <x-select2 class="inpt form-control" style="width:201px;" id="searchObra" name="searchObra" :options="$obra"></x-select2>
                        </div>
                    </div>
                @endcan
                <div class="table-responsive">
                    <div wire:loading class="position-absolute top-28 font-semibold text-lg py-1 px-3">
                        <i wire:loading.class="fas fa-spinner fa-spin" ></i>
                        Cargando...
                    </div>
                    @if ($selectTipo == 'PerObra' && $searchObra == null)
                        <div class="div-selectN ">
                            <span class="text-2xl">Seleccione el empleado</span>
                        </div>
                    @else
                        <div class="div-tab">
                            <table class="table datatable table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: end;width: 60px;">Id @include('components.table.sort', ['field' => 'id'])</th>
                                        <th style="width: 210px;">Obra  @include('components.table.sort', ['field' => 'NombreObra'])</th>
                                        <th style="width: 90px;">Estado de Obra @include('components.table.sort', ['field' => 'EstadoObra'])</th>
                                        <th style="width: 135px;">Observacion </th>
                                        <th style="width: 145px;">Registrado en @include('components.table.sort', ['field' => 'created_at'])</th>
                                        <th style="width: 145px;">Actualizada en @include('components.table.sort', ['field' => 'updated_at'])</th>
                                        @canany(['diseno_edit','diseno_delete','diseno_show'])
                                            <th style="width: 90px;">Opciones</th>
                                        @endcanany
                                    </tr>
                                </thead>
                                <tbody id="bodyC"></tbody>
                                    @forelse ($disenos as $l)
                                    <tr>
                                        {{-- <td>{{ $l }}</td> --}}
                                        <td>{{ $l->id }}</td>
                                        <th>{{ $l->Obra->NombreObra }}</th>
                                        <th>{{ $l->Obra->EstadoObra }}</th>
                                        <td>{{ $l->ObservacionDiseno == "" ? 'Sin observación' : 'Con observación' }}</td>
                                        <td>{{ $l->created_at?date('d/m/Y h:i A', strtotime($l->created_at )) : '-' }}</td>
                                        <td>{{ $l->updated_at?date('d/m/Y h:i A', strtotime($l->updated_at )) :'-' }}</td>

                                        @canany(['updateMaterial','deleteMaterial','diseno_show'])
                                            @if ($l->isActive == 'Active')
                                                <td class="actions justify-center">
                                                    @can('diseno_show')
                                                        <button><i style="font-size:32px" wire:click="show({{$l->id}})" class="ion-ios-eye-outline"></i></button>
                                                    @endcan
                                                    @can('diseno_edit')
                                                        <button style="margin-top: 5px;" wire:click="edit({{$l->id}})" class="cursor-pointer"><i class="material-icons">create</i></button>
                                                    @endcan
                                                    @can('diseno_delete')
                                                        <button wire:click="delete({{$l->id}})" class="cursor-pointer" style="font-size: 25px;"><i class="ion-trash-a"></i></button>
                                                    @endcan
                                                </td>
                                            @else
                                                @can('diseno_delete')
                                                    <td><button class="bg-green-500 butt hover:bg-green-400 px-3 py-1 rounded" wire:click="delete({{$l->id}})" >Activar</button></td>
                                                @endcan
                                            @endif
                                        @endcanany
                                    </tr>
                                    @empty
                                    @if($searchObra != null && count($disenos)<=0)
                                        <tr>
                                            <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">Esta obra no tiene diseños registradas.</td>
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
                    @if ($disenos != null && count($disenos)>0)
                    <div style="color: black;">
                        {{ $disenos->links('components.custom-pagination-links') }}
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    @can('diseno_delete')
        @if ($openDelete)
            <x-delete>
                <x-slot name="title">{{$idD->isActive == 'Active'?'Eliminar':'Activar '}} Cliente</x-slot>
                <x-slot name="body">
                    @if ($idD->isActive == 'Active')
                        <p>¿Esta seguro que desea eliminar el registro {{ $idD->id }} ?</p>
                    @else
                        <p>¿Esta seguro que desea activar el registro {{ $idD->id }} ?</p>
                    @endif
                </x-slot>
                <x-slot name="method">
                    @if ($idD->isActive=='Active')
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="deleteConfirm({{$idD->id}})" >Yes, Delete</button>
                    @else
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="activeConfirm({{$idD->id}})" >Yes, Activar</button>
                    @endif
                </x-slot>
            </x-delete>
        @endif
    @endcan
</div>


@push('jss')
<script src={{ asset('assets-admin/js/page/accordion.js') }}></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        var inputSearch = document.querySelector('#searchObraDiv');

            if( $('#searchObra').val() == "null"){
                    $("#searchObra option[value='null']").remove();
            }

            if( $('#selectTipo').val() == 'PerObra'){
                $('#searchObra').val(null).trigger('change');
                inputSearch.classList.remove('hidden');
            }
            else if( $('#selectTipo').val() == 'All'){
                $('#searchObra').val(null).trigger('change');
                inputSearch.classList.add('hidden');
            }

            $('#selectTipo').on('change', function(event){
                let value = event.target.value;
                @this.set('selectTipo',value);

                if(value == 'PerObra'){
                    $('#searchObra').val(null).trigger('change');
                    inputSearch.classList.remove('hidden');
                }
                else if(value == 'All'){
                    $('#searchObra').val(null).trigger('change');
                    inputSearch.classList.add('hidden');
                }
            })
            $('#searchObra').on('change', function(event){
                let value = event.target.value;
                @this.set('searchObra',value);
            });
    });
</script>
@endpush

