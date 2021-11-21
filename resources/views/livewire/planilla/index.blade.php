@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
@endsection

@section('title', 'Planilla')

<div class="shadow-2xl pt-8 px-5 mb-4 bg-white">

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
        @include('livewire.planilla.create')
        @include('livewire.planilla.edit')
        {{-- @include('livewire.hola.delete') --}}
    </div>

    <div class="form">

        <h1 class="text-center mt-3">Planillas de Afiliación</h1><br>
        {{-- {{ Auth::user()->Planillas()->get() }} --}}
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
                @can('planilla_active')
                    <div class="float-left pl-6">
                        <label for="filterPlanilla">Estado
                            <select name="filterPlanilla" id="filterPlanilla" wire:model="filterPlanilla" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                <option value="Active">Activos</option>
                                <option value="Inactive">Eliminado</option>
                            </select>
                        </label>
                    </div>
                @endcan
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                    <div class="float-left pl-6">
                        <livewire:excel-export model="Planilla" format="csv" />
                        <livewire:excel-export model="Planilla" format="xlsx" />
                        <livewire:excel-export model="Planilla" format="pdf" />
                    </div>
                @endif
                <div class="float-right">
                    <label for="search" class="mr-2">Buscar: </label>
                    <input id="search" name="search" type="text" wire:model="search" class="h-8 border-gray-500 w-72 rounded">
                </div>
                @can('planilla_create')
                    <button class="buttonN" wire:click="create()">NUEVO</button><br>
                @endcan
            </div>
            <div class="div-tab overflow-x-auto">
                <table class=" table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                        <th>ArchivoPlanilla</th>
                        <th>FechaExpiracion</th>
                        <th>EstadoPlanilla </th>
                        <th>Empleado</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        {{-- <th>isActive</th> --}}
                        <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bodyC">
                        @forelse ($planillas as $l)
                        <tr>
                            <td>{{ $l->id }}</td>
                            <td>{{ $l->ArchivoPlanilla }}</td>
                            <td>{{ $l->FechaExpiracion }}</td>
                            <td>{{ $l->EstadoPlanilla }}</td>
                            <td>{{ $l->Empleado->NombreCompleto }}</td>
                            <td>{{ $l->created_at?date('d-m-Y h:i:s A', strtotime($l->created_at )) : '-' }}</td>
                            <td>{{ $l->updated_at?date('d-m-Y h:i:s A', strtotime($l->updated_at )) :'-' }}</td>
                            @if ($l->isActive == 'Active')
                                @can('planilla_edit')
                                    <td><button wire:click="edit({{$l->id}})" class="bg-red-400 butt hover:bg-red-300">Editar</button></td>
                                @endcan
                                @can('planilla_delete')
                                    <td><button class="bg-yellow-200 butt hover:bg-yellow-300" wire:click="delete({{$l->id}})" >Eliminar</button></td>
                                @endcan
                            @else
                                @can('planilla_active')
                                    <td><button class="bg-green-500 butt hover:bg-green-400" wire:click="delete({{$l->id}})" >Activar</button></td>
                                @endcan
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">No hay resultados para la búsqueda {{ $search }}.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                {{-- {{ $planillas->links() }} --}}
            </div>
        </div>
    </div>
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
</div>
