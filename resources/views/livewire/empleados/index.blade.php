@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
<style>
    table.table thead .sorting:before, table.table thead .sorting:after, table.table thead .sorting_asc:before,
    table.table thead .sorting_asc:after, table.table thead .sorting_desc:before, table.table thead .sorting_desc:after,
    table.table thead .sorting_asc_disabled:before, table.table thead .sorting_asc_disabled:after,
    table.table thead .sorting_desc_disabled:before, table.table thead .sorting_desc_disabled:after{
        top: 1.3em !important;
}
</style>
@endsection

@section('title', 'Empleados')

<div>
    {{ Breadcrumbs::render('Empleados') }}
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
                @can('empleado_create')
                    @include('livewire.empleados.create')
                @endcan
                @can('empleado_edit')
                    @include('livewire.empleados.edit')
                @endcan
            @endif
            @if ($openShow)
                @can('empleado_show')
                    @include('livewire.empleados.show')
                @endcan
            @endif
        </div>

        <div class="form">

            <h1 class="text-center mt-3 mb-2">Empleados</h1><br>
            <div class="position-relative clear-both mt-6 pb-4">
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
                    @can('empleado_active')
                        <div class="float-left pl-6">
                            <label for="filterEmpleado">Estado
                                <select name="filterEmpleado" id="filterEmpleado" wire:model="filterEmpleado" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                    <option value="Active">Activos</option>
                                    <option value="Inactive">Eliminados</option>
                                    {{-- <option value="Inactive">Ocupado</option> --}}
                                </select>
                            </label>
                        </div>
                    @endcan
                    @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                        <div class="float-left pl-6">
                            <livewire:excel-export model="Usuario" format="csv,pdf,xlsx" />
                        </div>
                    @endif
                    <div class="float-right">
                        <label for="search" class="mr-2">Buscar: </label>
                        <input id="search" name="search" type="text" wire:model="search" class="h-8 border-gray-500 w-72 px-2 rounded">
                    </div>
                    @can('empleado_create')
                        <button class="buttonN" wire:click="create()">
                            <span>NUEVO</span>
                            <i class="ion-android-add-circle" style="font-size:19px; margin-left:3px"></i>
                        </button><br>
                    @endcan
                </div>
                @if(Auth::user()->can('empleado_access',App\Models\Usuario::class) && !Auth::user()->can('empleado_all',App\Models\Usuario::class))
                    <br><p>{{ $obraCoord->id }}: {{ $obraCoord->NombreObra }}</p>
                @endif
                <div class="table-responsive">
                    <div class="div-tab">
                        <table class="table datatable table-hover no-footer">
                            <thead>
                                <tr>
                                    <th style="padding-right: 35px; text-align: end;width: 60px; padding-bottom: 0px !important;">
                                        Id
                                        {{-- <x-table.sort field="id"></x-table.sort> --}}
                                        @include('components.table.sort', ['field' => 'empleados.id'])
                                    </th>
                                    <th style="padding-right: 35px; padding-bottom: 0px !important;">
                                        Nombre Completo
                                        @include('components.table.sort', ['field' => 'NombreCompleto'])
                                    </th>
                                    <th style="padding-right: 67px; padding-bottom: 0px !important;">
                                        Cargo
                                        @include('components.table.sort', ['field' => 'NombreRol'])
                                    </th>
                                    <th style="padding-right: 30px; width: 178px; padding-bottom: 0px !important;">
                                        Número Documento
                                        @include('components.table.sort', ['field' => 'NumeroDocumento'])
                                    </th>
                                    <th style="padding-right: 35px; padding-bottom: 0px !important; ">
                                        Correo Electronico
                                        @include('components.table.sort', ['field' => 'CorreoUsuario'])
                                    </th>
                                    <th style="padding-right: 35px; padding-bottom: 0px !important;">
                                        Disponibilidad
                                        @include('components.table.sort', ['field' => 'Disponibilidad'])
                                    </th>
                                    <th style="padding-right: 35px; padding-bottom: 0px !important;">
                                        Ciudad
                                        @include('components.table.sort', ['field' => 'ciudad'])
                                    </th>

                                    @canany(['empleado_edit','empleado_delete','empleado_show'])
                                    <th style="text-align:center; color: #302c2c;">Opciones</th>
                                    @endcanany
                                </tr>
                            </thead>
                            <tbody id="bodyC">
                                @forelse ($empleados as $l)
                                <tr>
                                    <td style="text-align:center;">{{ $l->id}}</td>
                                    <td>{{ $l->NombreCompleto }}</td>
                                    <td style="width: 40px;">{{ $l->Rol->NombreRol }}</td>
                                    <td style="width: 85px;">{{ $l->NumeroDocumento  }}</td>
                                    <td style="width: 220px;">{{ $l->CorreoUsuario }}</td>
                                    <td style="width: 40px;">{{ $l->Disponibilidad }}</td>
                                    <td style="width: 108px;">{{ $l->Ciudad->ciudad }}</td>
                                    {{-- <td><img src="{{$l-> }}" alt="" class="imagenusuario" width="80%" height="80%"></td> --}}

                                    @if ($l->EstadoUsuario == 'Active')
                                        <td class="actions ">
                                            @can('empleado_show')
                                                <button style="margin-top: 0px;" wire:click="show({{$l->id}})" class="cursor-pointer" data-toggle="tooltip" data-placement="bottom" title="Ver detalles"><i style="font-size:34px" class="ion-ios-eye-outline"></i></button>
                                            @endcan
                                            @can('empleado_edit')
                                                <button style="margin-top: 5px;" wire:click="edit({{$l->id}})" class="cursor-pointer" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="material-icons">create</i></button>
                                            @endcan
                                            @can('empleado_delete')
                                                <button wire:click="delete({{$l->id}})" class="cursor-pointer" style="font-size: 25px;" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="ion-trash-a"></i></button>
                                            @endcan
                                        </td>
                                    @else
                                        @can('empleado_active')
                                            <td><button class="bg-green-500 butt hover:bg-green-400 px-3 py-1 rounded" wire:click="delete({{$l->id}})" >Activar</button></td>
                                        @endcan
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">No hay resultados para la búsqueda.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    {{ $empleados->links('components.custom-pagination-links') }}
                </div>
            </div>
        </div>
        @can('empleado_active')
            @if ($openDelete)
            <x-delete>
                <x-slot name="title">{{$idE->EstadoUsuario == 'Active'?'Eliminar':'Activar '}} Empleado</x-slot>
                <x-slot name="body">
                    @if ($idE->EstadoUsuario == 'Active')
                        <p>¿Esta seguro que desea eliminar el registro {{ $idE->id }} ?</p>
                    @else
                        <p>¿Esta seguro que desea activar el registro {{ $idE->id }} ?</p>
                    @endif
                </x-slot>
                <x-slot name="method">
                    @if ($idE->EstadoUsuario=='Active')
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="deleteConfirm({{$idE->id}})" >Yes, Delete</button>
                    @else
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="activeConfirm({{$idE->id}})" >Yes, Activar</button>
                    @endif
                </x-slot>
            </x-delete>
            @endif
        @endcan
    </div>
</div>

@push('jss')

<script>
    console.log();
    $('#search').on('blur', function(){
        console.log('blurrr')
    })
</script>

@endpush

