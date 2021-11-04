@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
@endsection

@section('title','Novedades | Treball')

<div class="shadow-2xl pt-8 px-5 bg-white">

    <!--========== CONTENT ==========-->

    <div>
        {{-- @if ($openModal) --}}
            @include('livewire.novedad.create')
            @include('livewire.novedad.edit')
        {{-- @endif --}}
    </div>
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

    <div class="form">
        {{-- <x-select2 class="inpt form-control" id="actividad_id" name="novedad.actividad_id" modalTipo="CreateNovedad" wire:model="novedad.actividad_id" :options="$Act"></x-select2>
        <x-select2 class="inpt form-control" id="tipo_novedad_id" modalTipo="CreateNovedad" name="novedad.tipo_novedad_id" multiple wire:model="novedad.tipo_novedad_id" :options="$Tiponov"></x-select2> --}}
        <h1 class="text-center mt-3">Novedad</h1><br>
        {{-- {{ Auth::user()->cargo()->get()->pluck('id')[0] }} --}}
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
                <div class="float-left pl-6">
                    <label for="filterState">Estado
                        <select name="filterState" id="filterState" wire:model="filterState" class="py-0.5 focus:ring-0 focus:border-gray-600">
                            <option value="Active">Activos</option>
                            <option value="Inactive">Eliminado</option>
                        </select>
                    </label>
                </div>
                @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <div class="float-left ml-2">
                    <livewire:excel-export model="Novedad" format="csv" />
                    <livewire:excel-export model="Novedad" format="xlsx" />
                    <livewire:excel-export model="Novedad" format="pdf" />
                </div>
                @endif
                <div class="float-right">
                    <label for="search" class="mr-2">Buscar: </label>
                    <input id="search" name="search" type="text" wire:model="search" class="h-8 border-gray-500 w-72 rounded">
                </div>
                <button class="buttonN position-absolute bg-gray-800 py-2 px-4 -top-16 right-2" wire:click="create()">NUEVO</button><br>
            </div>
            <div class="div-tab overflow-x-auto">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                        <th>AsuntoNovedad</th>
                        <th>EstadoNovedad</th>
                        <th>DescripcionN</th>
                        <th>tipo_novedad</th>
                        <th>actividad</th>
                        <th>Empleado</th>
                        <th>cliente</th>
                        <th>Registrado en</th>
                        <th>Actualizado</th>

                        <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="bodyC">
                        @forelse ($lista as $l)
                        <tr>
                            <td>{{ $l->id }}</td>
                            <td>{{ $l->AsuntoNovedad }}</td>
                            <td>{{ $l->EstadoNovedad }}</td>
                            <td>{{ $l->DescripcionN }}</td>
                            <td>{{ $l->TipoNovedad->NombreTipoN }}</td>
                            <td>{{ $l->Actividad->title }}</td>
                            <td>{{ $l->Usuario? $l->Usuario->NombreCompleto:'-' }}</td>
                            <td>{{ $l->Cliente?$l->Cliente->NombreCC:'-' }}</td>
                            <td>{{ date_format($l->created_at, 'jS M Y') }}</td>
                            <td>{{ $l->updated_at? $l->updated_at :'' }}</td>

                            @if ($l->isActive == 'Active')
                                <td><button wire:click="edit({{$l->id}})" class="bg-red-400 butt hover:bg-red-300">Editar</button>
                                <button class="bg-yellow-200 butt hover:bg-yellow-300" wire:click="delete({{$l->id}})" >Eliminar</button></td>
                            @else
                                <td><button class="bg-green-500 butt hover:bg-green-400" wire:click="delete({{$l->id}})" >Activar</button></td>
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
                {{ $lista->links() }}
            </div>
        </div>

    </div>
    @if ($openDelete)
        <x-delete>
            <x-slot name="title">{{$idN->isActive == 'Active'?'Eliminar':'Activar '}} Novedad</x-slot>
            <x-slot name="body">
                @if ($idN->isActive == 'Active')
                    <p>¿Esta seguro que desea eliminar el registro {{ $idN->id }} ?</p>
                @else
                    <p>¿Esta seguro que desea activar el registro {{ $idN->id }} ?</p>
                @endif
            </x-slot>
            <x-slot name="method">
                @if ($idN->isActive=='Active')
                <button type="button" class="btn btn-danger close-modal" wire:click.prevent="deleteConfirm({{$idN->id}})" >Yes, Delete</button>
                @else
                <button type="button" class="btn btn-danger close-modal" wire:click.prevent="activeConfirm({{$idN->id}})" >Yes, Activar</button>
                @endif
            </x-slot>
        </x-delete>
    @endif
</div>
</div>
