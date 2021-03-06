@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-general.css'); }}">
@endsection

@section('title','Novedades | Treball')

<div>
    {{ Breadcrumbs::render('NovedadesBC') }}
    <div class="cardCustom">

        <!--========== CONTENT ==========-->

        <div>
            {{-- @if ($openModal) --}}
            @can('novedad_create')
                @include('livewire.novedad.create')
            @endcan

            @canany(['novedad_edit','novedad_editTime'])
                @include('livewire.novedad.edit')
            @endcanany
            @can('novedad_show')
                @include('livewire.novedad.show')
            @endcan
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
                    @can('novedad_all')
                    <div class="float-left pl-6">
                        <label for="filterState">Estado
                            <select name="filterState" id="filterState" wire:model="filterState" class="py-0.5 focus:ring-0 focus:border-gray-600">
                                <option value="Active">Activos</option>
                                <option value="Inactive">Eliminado</option>
                            </select>
                        </label>
                    </div>
                    @endcan

                    @can('novedad_all')
                        @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                        <div class="float-left ml-2">
                            <livewire:excel-export model="Novedad" format="csv,pdf,xlsx" />
                        </div>
                        @endif
                    @endcan
                    <div class="float-right">
                        <label for="search" class="mr-2">Buscar: </label>
                        <input id="search" name="search" type="text" wire:model="search" class="h-8 border-gray-500 w-72 rounded">
                    </div>
                    @can('novedad_create')
                        <button class="buttonN position-absolute bg-gray-800 py-2 px-4 -top-16 right-2" wire:click="create()">NUEVO</button><br>
                    @endcan
                </div>
                <table class="mt-6 table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">
                            </th>
                            <th colspan="3">
                                <div class="inbox-header">
                                    <div class="mail-option">
                                        <div class="email-btn-group m-l-15">
                                            <div class="btn-group mr-4 mb-2 float-left mb-sm-0">
                                                <button type="button" class=" btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ml-1"></i>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    <a class="dropdown-item" href="#">Todas</a>
                                                    <a class="dropdown-item" href="#">Sin Atender</a>
                                                    <a class="dropdown-item" href="#">En espera</a>
                                                    <a class="dropdown-item" href="#">Atentida</a>
                                                </div>
                                            </div>
                                            <div class="btn-group mr-2 ml-2 mb-2 mb-sm-0" style="margin-top: -17px;">
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                                                <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                                            </div>
                                            <a href="#" class="col-dark-gray waves-effect m-r-20" title="Archive" data-toggle="tooltip">
                                                <i class="material-icons">archive</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <th class="hidden-xs" colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lista as $l)
                            <tr class="unread">
                                <td class="tbl-checkbox">
                                    <label class="form-check-label">
                                        <input type="checkbox">
                                        <span class="form-check-sign"></span>
                                    </label>
                                </td>
                                <td class="hidden-xs">#{{ $l->id }}</td>
                                <td class="hidden-xs">{{ $l->reportadoPor->user->name }}</td>
                                <td class="max-texts">
                                    <a href="#">
                                        @if($l->reportadoPor->user->getRoleNames()[0] == 'Cliente')
                                            <span class="badge badge-success" style="width:80px;margin-right:24px;">Cliente</span>
                                        @else
                                            <span class="badge badge-secondary" style="margin-right:24px;">Empleado</span>
                                        @endif
                                        {{ $l->AsuntoNovedad }}</a>
                                </td>
                                <td class="text-right"> {{ date_format($l->created_at, 'jS M Y') }} </td>
                                @canany(['novedad_edit','novedad_delete','novedad_active','novedad_show'])

                                @if ($l->isActive == 'Active')
                                    <td class="actions">
                                        @can('novedad_show')
                                        <button wire:click="show({{$l->id}})"><i style="font-size:32px" class="ion-ios-eye-outline"></i></button>                                            
                                        @endcan
                                        @canany(['novedad_edit','novedad_editTime'])
                                            <button style="margin-top: 5px;" wire:click="edit({{$l->id}})" class="cursor-pointer"><i class="material-icons">create</i></button>
                                        @endcanany
                                        @can('novedad_delete')
                                            <button wire:click="delete({{$l->id}})" class="cursor-pointer" style="font-size: 25px;"><i class="ion-trash-a"></i></button>
                                        @endcan
                                    </td>
                                @else
                                    @can('novedad_active')
                                        <td><button class="bg-green-500 butt hover:bg-green-400 px-3 py-1 rounded" wire:click="delete({{$l->id}})" >Activar</button></td>
                                    @endcan
                                @endif


                                @endcanany
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="font-bold text-gray-800 text-center px-4 py-3 sm:px-6 ">No hay resultados para la b??squeda.</td>
                            </tr>
                        @endforelse

                    </tbody>
                  </table>
                <div>
                {{ $lista->links('components.custom-pagination-links') }}
                </div>
            </div>
            <div style="color: black;">

                    </div>

        </div>
        @if ($openDelete)
            <x-delete>
                <x-slot name="title">{{$idN->isActive == 'Active'?'Eliminar':'Activar '}} Novedad</x-slot>
                <x-slot name="body">
                    @if ($idN->isActive == 'Active')
                        <p>??Esta seguro que desea eliminar el registro {{ $idN->id }} ?</p>
                    @else
                        <p>??Esta seguro que desea activar el registro {{ $idN->id }} ?</p>
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

@push('jss')
<script>
    if( $('#obra_idReg').val() == "null"){
        $("#obra_idReg option[value='null']").remove();
    }
    if( $('#obra_idAct').val() == "null"){
        $("#obra_idAct option[value='null']").remove();
    }
</script>
@endpush

