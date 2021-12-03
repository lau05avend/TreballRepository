@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
@endsection

@section('title', 'Planilla')

<div>
    {{ Breadcrumbs::render('Planillas') }}
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
            @can('planilla_create')
                @include('livewire.planilla.create')
            @endcan
            @can('planilla_edit')
                @include('livewire.planilla.edit')
            @endcan
        </div>

        <div class="form">

            @if (Storage::disk('public')->exists("planillas/export_material.pdf") )
                <a href="{{ route('pdf') }}" target="_blank" class="rounded-circle" width="150">
                    export_material.pdf
                </a>
                {{-- <iframe width="400" height="400" src="https://docs.google.com/viewer?url=http://127.0.0.1:8000/storage/planillas/export_material.pdf&embedded=true"  frameborder="0"></iframe> --}}
            @endif

            <h1 class="text-center mt-3">Planillas de Afiliación</h1><br>
            {{-- {{ Auth::user()->Planillas()->get() }} --}}
            <div class="position-relative clear-both mt-12 pb-4">
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
                    @can('planilla_active')
                    <div class="float-left pl-6">
                        <label for="filterSearch">Estado
                            <select name="filterSearch" id="filterSearch" wire:model="filterSearch" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                <option value="Active">Activos</option>
                                <option value="Inactive">Eliminados</option>
                            </select>
                        </label>
                    </div>
                    @endcan
                    @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                        <div class="float-left pl-6">
                            <livewire:excel-export model="Planilla" format="xlsx,csv,pdf" />
                        </div>
                    @endif
                    <div class="float-right">
                        <label for="search" class="mr-2">Buscar: </label>
                        <input id="search" name="search" type="text" wire:model="search" class="h-8 border-gray-500 w-72 rounded">
                    </div>
                    @can('planilla_create')
                        <button class="buttonN" wire:click="create()">
                            <span>Agregar Planilla</span>
                            <i class="ion-android-add-circle" style="font-size:19px; margin-left:3px"></i>
                        </button><br>
                    @endcan
                </div>
                @can ('planilla_all')
                    <div class="selectType mb-3" wire:ignore>
                        <div class="pr-4" style="width: 300px; text-align: center;">
                            <label for="selectTipo">Preferencia de Contenido:</label>
                            <select class="inpt form-control" name="selectTipo" id="selectTipo">
                                <option value="All">Todas las Planillas</option>
                                <option value="PerEmpleado">Por empleado</option>
                            </select>
                        </div>
                        <div style="width: 310px;" class="" id="searchEmplDiv">
                            <label for="searchEmpleado">Consultar el empleado:</label>
                            <x-select2 class="inpt form-control" style="width:201px;" id="searchEmpleado" name="searchEmpleado" :options="$usuario"></x-select2>
                        </div>
                    </div>
                @endcan
                <div class="table-responsive">
                    <div wire:loading class="position-absolute top-28 font-semibold text-lg py-1 px-3">
                        <i wire:loading.class="fas fa-spinner fa-spin" ></i>
                        Cargando...
                    </div>
                    @if ($selectTipo == 'PerEmpleado' && $searchEmpleado == null)
                        <div class="div-selectN ">
                            <span class="text-2xl">Seleccione el empleado</span>
                        </div>
                    @else
                        <div class="div-tab">
                            <table class="table datatable table-hover no-footer">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre Empleado</th>
                                        <th>Archivo Planilla</th>
                                        <th>Fecha Inicio Vigencia</th>
                                        <th>Fecha Expiración Vigencia</th>
                                        <th>EstadoPlanilla </th>
                                        @canany(['planilla_edit','planilla_delete','planilla_show'])
                                            <th style="text-align:center; color: #302c2c;">Opciones</th>
                                        @endcanany
                                    </tr>
                                </thead>
                                <tbody id="bodyC">
                                    @forelse ($planillas as $l)
                                    <tr>
                                        <td>{{ $l->id }}</td>
                                        <td>{{ $l->Empleado->NombreCompleto }}</td>
                                        <td>
                                            @if (Storage::disk('public')->exists("$l->ArchivoPlanilla") )
                                                <span id="showPDF" onclick="showPDF({{$l->id}})" class="cursor-pointer hover:underline text-blue-900" width="150">
                                                    {{-- {{$l->ArchivoPlanilla}} --}}
                                                    {{ substr($l->ArchivoPlanilla, 10) }}
                                                </span>
                                            @else
                                            {{ $l->ArchivoPlanilla }}
                                            @endif
                                        </td>
                                        <td>{{ $l->FechaPlanilla?date('d/m/Y', strtotime($l->FechaPlanilla )) : '-' }}</td>
                                        <td>{{ $l->FechaExpiracion?date('d/m/Y', strtotime($l->FechaExpiracion )) : '-' }}</td>
                                        <td><span class="py-1 px-3 rounded-lg {{$l->EstadoPlanilla=='vigente'? 'bg-green-300' : 'bg-red-400'}} ">
                                            {{ $l->EstadoPlanilla }}
                                        </span></td>

                                        @if ($l->isActive == 'Active' && $l->EstadoPlanilla != 'vencida')
                                        <td class="actions ">
                                            @can('planilla_edit')
                                                <button style="margin-top: 5px;" wire:click="edit({{$l->id}})" class="cursor-pointer" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="material-icons">create</i></button>
                                            @endcan
                                            @can('planilla_delete')
                                                <button wire:click="delete({{$l->id}})" class="cursor-pointer" style="font-size: 25px;" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="ion-trash-a"></i></button>
                                            @endcan
                                        </td>
                                        @elseif($l->isActive == 'Inactive')
                                            @can('planilla_active')
                                                <td><button class="bg-green-500 butt hover:bg-green-400 px-3 py-1 rounded" wire:click="delete({{$l->id}})" >Activar</button></td>
                                            @endcan
                                        @elseif($l->EstadoPlanilla == 'vencida')
                                            <td><span>No Aplica</span></td>
                                        @endif
                                    </tr>
                                    @empty
                                        @if($searchEmpleado != null && count($planillas)<=0)
                                        <tr>
                                            <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">Este empleado no tiene planillas de afiliación registradas.</td>
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
                </div>
                @if ($planillas != null && count($planillas)>0)
                <div>
                    {{ $planillas->links('components.custom-pagination-links') }}
                </div>
                @endif
            </div>
        </div>
        @can('planilla_delete')
            @if ($openDelete)
            <x-delete>
                <x-slot name="title">{{$idC->isActive == 'Active'?'Eliminar':'Activar '}} hola</x-slot>
                <x-slot name="body">
                    @if ($idC->isActive == 'Active')
                        <p>¿Esta seguro que desea eliminar el registro {{ $idC->id }} ?</p>
                    @else
                        <p>¿Esta seguro que desea activar el registro {{ $idC->id }} ?</p>
                    @endif
                </x-slot>
                <x-slot name="method">
                    @if ($idC->isActive=='Active')
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="deleteConfirm({{$idC->id}})" >Yes, Delete</button>
                    @else
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="activeConfirm({{$idC->id}})" >Yes, Activar</button>
                    @endif
                </x-slot>
            </x-delete>
            @endif
        @endcan
    </div>
</div>
</div>
@push('jss')
    <script>
        function showPDF(id){
                $.ajax({
                    url: "{{ asset('/visualizar/') }}/"+id,
                    type: "get",
                    dataType: "html",
                    contentType: false,
                    processData: false
                }).done(function(res){
                    url = JSON.parse(res).response.url
                    window.open('storage/'+url,'_blank');
                }).fail(function(res){
                    console.log(res)
                });
            }

        document.addEventListener('DOMContentLoaded', function() {

            var inputSearch = document.querySelector('#searchEmplDiv');

            if( $('#searchEmpleado').val() == "null"){
                    $("#searchEmpleado option[value='null']").remove();
            }

            if( $('#selectTipo').val() == 'PerEmpleado'){
                $('#searchEmpleado').val(null).trigger('change');
                inputSearch.classList.remove('hidden');
            }
            else if( $('#selectTipo').val() == 'All'){
                $('#searchEmpleado').val(null).trigger('change');
                inputSearch.classList.add('hidden');
            }

            $('#selectTipo').on('change', function(event){
                let value = event.target.value;
                @this.set('selectTipo',value);

                if(value == 'PerEmpleado'){
                    $('#searchEmpleado').val(null).trigger('change');
                    inputSearch.classList.remove('hidden');
                }
                else if(value == 'All'){
                    $('#searchEmpleado').val(null).trigger('change');
                    inputSearch.classList.add('hidden');
                }
            })
            $('#searchEmpleado').on('change', function(event){
                let value = event.target.value;
                @this.set('searchEmpleado',value);
            });



        })
    </script>
@endpush

