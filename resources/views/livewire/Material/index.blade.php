
@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
@endsection

<div>
    <div class="shadow-2xl pt-8 px-5 bg-white">

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
            @include('livewire.Material.create')
            @include('livewire.Material.edit')
        </div>

        <div class="form">

            <h1 class="text-center mt-3" style="color: black;">Material</h1><br>
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
                    <div class="float-left pl-6">
                        <label for="filterState">Estado
                            <select name="filterState" id="filterState" wire:model="filterState" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                <option value="Active">Activos</option>
                                <option value="Inactive">Eliminado</option>
                            </select>
                        </label>
                    </div>
                    @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                    <div class="float-left pl-2">
                        <livewire:excel-export model="Material" format="csv" />
                        <livewire:excel-export model="Material" format="xlsx" />
                        <livewire:excel-export model="Material" format="pdf" />
                    </div>
                    @endif
                    <div class="float-right">
                        <label for="search" class="mr-2">Buscar: </label>
                        <input id="search" name="search" type="text" wire:model="search"
                            class="h-8 border-gray-500 w-68 rounded">
                    </div>
                    <button class="buttonN" wire:click="create">NUEVO</button><br>
                </div>
                <div class="div-tab overflow-x-auto">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id @include('components.table.sort', ['field' => 'id'])</th>
                                <th>Descripcion Material  @include('components.table.sort', ['field' => 'DescripcionMat'])</th>
                                <th>color @include('components.table.sort', ['field' => 'Ncolor'])</th>
                                <th>tipo material @include('components.table.sort', ['field' => 'NombreTipoM'])</th>
                                <th>Registrado en @include('components.table.sort', ['field' => 'created_at'])</th>
                                <th>Actualizada en @include('components.table.sort', ['field' => 'updated_at'])</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="bodyC">
                            @forelse ($materiales as $l)
                            <tr>
                                <td>{{ $l->id }}</td>
                                <td>{{ $l->DescripcionMat }}</td>
                                <td>{{ $l->Color?$l->Color->Ncolor:'-'}}</td>
                                <td>{{ $l->TipoMaterial->NombreTipoM}}</td>
                                <td>{{ $l->created_at? $l->created_at : '' }}</td>
                                <td>{{ $l->updated_at? $l->updated_at :'' }}</td>

                                @if ($l->isActive == 'Active')
                                    <td><button wire:click="edit({{$l->id}})" class="bg-red-400 butt hover:bg-red-300">Editar</button></td>
                                    <td><button class="bg-yellow-200 butt hover:bg-yellow-300" wire:click="delete({{$l->id}})" >Eliminar</button></td>
                                @else
                                    <td><button class="bg-green-500 butt hover:bg-green-400" wire:click="delete({{$l->id}})" >Activar</button></td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">No hay
                                    resultados para la búsqueda {{ $search }}.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div style="color: black;">
                    {{ $materiales->links() }}
                </div>
            </div>

        </div>
    </div>
    @if ($openDelete)
        <x-delete>
            <x-slot name="title">{{$idM->isActive == 'Active'?'Eliminar':'Activar '}} Cliente</x-slot>
            <x-slot name="body">
                @if ($idM->isActive == 'Active')
                    <p>¿Esta seguro que desea eliminar el registro {{ $idM->id }} ?</p>
                @else
                    <p>¿Esta seguro que desea activar el registro {{ $idM->id }} ?</p>
                @endif
            </x-slot>
            <x-slot name="method">
                @if ($idM->isActive=='Active')
                <button type="button" class="btn btn-danger close-modal" wire:click.prevent="deleteConfirm({{$idM->id}})" >Yes, Delete</button>
                @else
                <button type="button" class="btn btn-danger close-modal" wire:click.prevent="activeConfirm({{$idM->id}})" >Yes, Activar</button>
                @endif
            </x-slot>
        </x-delete>
    @endif
</div>


