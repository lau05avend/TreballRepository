@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
@endsection

@section('title', 'Diseño')

<div class="shadow-2xl pt-8 px-5 bg-white">
    <div class="container-fluid px-0 -pr-2">
        <!--========== CONTENT ==========-->

        <div>
            @if ($openModal)
                {{-- @livewire('diseno.edit') --}}
                {{-- @include('livewire.diseno.show')--}}
                @include('livewire.diseno.create')
                @include('livewire.Diseno.edit')
            @endif
            {{-- @switch($tipoM)
                @case('create')
                    @livewire('diseno.create')
                    @include('livewire.diseno.create')
                    @break
                @case('edit')
                    @livewire('diseno.edit')
                    @break
                @case('show')
                    @include('livewire.diseno.show')
                @break

                @default
            @endswitch --}}
        </div>

        <div class="row justify-content-center pl-2 form">
                <h1 class="title-o text-5xl mb-5 text-center mt-3">Diseno</h1>
            {{ Auth::user()->getPermissionsViaRoles() }}
            @if (session('message'))
                <div id="success" class="position-absolute top-24 right-5 advise alert alert-success w-auto flex flex-row shadow-2xl bg-green-500 pl-20 items-center alert-dismissible fade show" role="alert">
                    <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-8 w-8 flex-shrink-0 rounded-full">
                        <span class="text-green-500">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd">
                                </path>
                            </svg>
                        </span>
                    </div>
                    <p id="messag" class="ml-5 items-center text-lg mb-0 text-green-50 mr-4"> {{ session('message') }}</p>
                    <button type="button" class="btn-close mt-1" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
                        <label for="filterStateIn">Estado
                            <select name="filterStateIn" id="filterStateIn" wire:model="filterStateIn" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                <option value="Active">Activos</option>
                                <option value="Inactive">Eliminado</option>
                            </select>
                        </label>
                    </div>
                    <div class="float-right">
                        <label for="search" class="mr-2">Buscar: </label>
                        <input id="search" name="search" type="text" wire:model="search" class="h-8 border-gray-500 w-72 rounded">
                    </div>
                    @can('diseno_create')
                    <button class="buttonN" wire:click="create()">NUEVO</button><br>
                    @endcan
                </div>
                <div class="div-tab overflow-x-auto">
                    <table class=" table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Imagen Plano</th>
                                <th>Observacion Diseño</th>
                                <th>creado en</th>
                                <th>Actualizado en</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="bodyC">
                            @forelse ($disenos as $l)
                            <tr>
                                <td>{{ $l->id }}</td>
                                <td class="imagen"><img src="{{ '/storage/'. $l->ImagenPlano }}" alt="imagen"></td>
                                <td>{{ $l->ObservacionDiseno }}</td>
                                <td>{{ $l->created_at?date('d-m-Y h:i:s A', strtotime($l->created_at )) : '-' }}</td>
                                <td>{{ $l->updated_at?date('d-m-Y h:i:s A', strtotime($l->updated_at )) :'-' }}</td>
                                <td><img src="{{$l->FotoL }}" alt="" class="imagenusuario" width="80%" height="80%"></td>
                                @if ($l->isActive == 'Active')
                                @can('diseno_delete')
                                    <td><button class="bg-yellow-200 butt hover:bg-yellow-300" wire:click="delete({{$l->id}})" >Eliminar</button>
                                    @endcan
                                    @can('diseno_edit')
                                    <button wire:click="edit({{$l->id}})" class="bg-red-400 butt hover:bg-red-300">Editar</button></td>
                                    @endcan

                                @else

                                    <td><button class="bg-green-500 butt hover:bg-green-400" wire:click="delete({{$l->id}})" >Activar</button></td>

                                @endif
                            </tr>
                            {{-- @livewire('diseno.edit', ['diseno'=>$l]) --}}
                            @empty
                            <tr>
                                <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">No hay resultados para la búsqueda {{ $search }}.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $disenos->links() }}
                </div>
            </div>
        </div>
        @if ($openDelete)
            <x-delete>
                <x-slot name="title">{{$idD->isActive == 'Active'?'Eliminar':'Activar '}} diseno</x-slot>
                <x-slot name="body">
                    @if ($idD->isActive == 'Active')
                        <p>¿Esta seguro que desea eliminar el registro {{ $idD->id }} ?</p>
                    @else
                        <p>¿Esta seguro que desea activar el registro {{ $idD->id }} ?</p>
                    @endif
                </x-slot>
                <x-slot name="method">
                    @if ($idD->isActive=='Active')
                    <button type="b00utton" class="btn btn-danger close-modal" wire:click.prevent="deleteConfirm({{$idD->id}})" >Yes, Delete</button>
                    @else
                    <button type="button" class="btn btn-danger close-modal" wire:click.prevent="activeConfirm({{$idD->id}})" >Yes, Activar</button>
                    @endif
                </x-slot>
            </x-delete>
        @endif
    </div>

