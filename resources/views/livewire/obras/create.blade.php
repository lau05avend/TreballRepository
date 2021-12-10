@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
@endsection
<div>
    {{ Breadcrumbs::render('obra/create') }}

    <div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center mt-3" style="color: black;">Crear obra</h3><br>
                    </div>
                    <div class="card-body">
                        <form id="form-steper" method="POST"  role="application" wire:submit.prevent="store()" class="wizard clearfix" novalidate="novalidate">

                            <div class="steps clearfix">
                                <ul role="tablist">
                                    <li role="tab" class="{{ $step == 0 ? 'current' : 'disabled' }}" aria-disabled="false" aria-selected="true">
                                        <a id="form-horizontal-t-0" href="javascript:void(0)" aria-controls="form-horizontal-p-0"><span class="number">1.</span> Datos básicos</a>
                                    </li>
                                    <li role="tab" class="{{ $step == 1 ? 'current' : 'disabled' }}" aria-disabled="true">
                                        <a id="form-horizontal-t-1" href="javascript:void(0)" aria-controls="form-horizontal-p-1"><span class="number">2.</span> Detalles del suelo</a>
                                    </li>
                                    <li role="tab" class="{{ $step == 2 ? 'current' : 'disabled' }}" aria-disabled="true">
                                        <a id="form-horizontal-t-2" href="javascript:void(0)" aria-controls="form-horizontal-p-2"><span class="number">3.</span> Asignar usuarios</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="content clearfix">

                                @if ($step == 0)
                                    <fieldset id="form-horizontal-p-0" role="tabpanel" aria-labelledby="form-horizontal-h-0" class="body current" aria-hidden="false">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="NombreObra">Nombre de Obra</label>
                                                    <input wire:model="obra.NombreObra" type="text" class="form-control  @error('obra.NombreObra') is-invalid @enderror" id="NombreObra" placeholder="Nombre">
                                                    @error('obra.NombreObra') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city_id">Ciudad Obra </label>
                                                    <select class="form-control @error('obra.city_id') is-invalid @enderror" wire:model="obra.city_id" name="city_id" id="city_id">
                                                        <option value="">Seleccione</option>
                                                        @forelse ($ciudad as $key=>$value)
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                        @empty
                                                            <option value="">Ups! Registra ciudades para continuar</option>
                                                        @endforelse
                                                    </select>
                                                    {{-- <x-select2 class="form-control  @error('obra.city_id') is-invalid @enderror" id="city_idReg" name="obra.city_id" :options="$ciudad"></x-select2> --}}
                                                    @error('obra.city_id')<span class="validate-select2">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="DireccionObra">Dirección de Obra </label>
                                                    <input wire:model="obra.DireccionObra" type="text" class="form-control @error('obra.DireccionObra') is-invalid @enderror" id="DireccionObra" placeholder="">
                                                        @error('obra.DireccionObra')<span
                                                        class="invalid-feedback">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tipo_obra_id">Tipo Obra</label>
                                                    <select class="form-control  @error('obra.tipo_obra_id') is-invalid @enderror" wire:model="obra.tipo_obra_id" name="tipo_obra_id" id="tipo_obra_id">
                                                        <option value="">Seleccione</option>
                                                        @forelse ($tipo_obra as $ty)
                                                            <option value="{{ $ty->id }}">{{ $ty->TipoObra }}</option>
                                                        @empty
                                                            <option value="">Ups! Registra tipos de obras para continuar</option>
                                                        @endforelse
                                                    </select>
                                                    @error('obra.tipo_obra_id') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                                </div><br>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cliente_idReg">Cliente</label>
                                                    {{-- <x-select2 class="form-control @error('obra.cliente_id') is-invalid @enderror" id="cliente_idReg" stylee="width: 728px;" name="obra.cliente_id" :options="$cliente"></x-select2> --}}
                                                    <select class="form-control @error('obra.cliente_id') is-invalid @enderror" wire:model="obra.cliente_id" name="cliente_id" id="cliente_id">
                                                        <option value="">Seleccione</option>
                                                        @forelse ($cliente as $key=>$value)
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                        @empty
                                                            <option value="">Ups! Registra clientes para continuar</option>
                                                        @endforelse
                                                    </select>
                                                    @error('obra.cliente_id') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                                </div><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="MedidaPerimetro">Medida del Perímetro Terreno (m)</label>
                                                    <input wire:model="obra.MedidaPerimetro" type="number" class="form-control @error('obra.MedidaPerimetro') is-invalid @enderror" id="MedidaPerimetro"
                                                        placeholder="Medida Perimetro">@error('obra.MedidaPerimetro') <span
                                                        class="invalid-feedback">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="MedidaArea">Medida del Área Terreno (m)</label>
                                                    <input wire:model="obra.MedidaArea" type="number" class="form-control  @error('obra.MedidaArea') is-invalid @enderror" id="MedidaArea"
                                                        placeholder="Medida Area">@error('obra.MedidaArea') <span
                                                        class="invalid-feedback">{{ $message }}</span> @enderror
                                                </div><br>
                                            </div>
                                        </div>
                                    </fieldset>
                                @endif

                                @if ($step == 1)
                                    <fieldset id="form-horizontal-p-1" role="tabpanel" aria-labelledby="form-horizontal-h-1" class="body" aria-hidden="true">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="CondicionDesnivel">Condición Desnivel del Suelo:</label>
                                                    <input wire:model="obra.CondicionDesnivel" type="text" class="form-control  @error('obra.CondicionDesnivel') is-invalid @enderror" id="CondicionDesnivel"
                                                        placeholder="Condicion Desnivel (%)">@error('obra.CondicionDesnivel') <span
                                                        class="invalid-feedback">{{ $message }}</span> @enderror
                                                </div><br>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="matsu">Tipo Material Suelo:</label>
                                                    <label for="TipoMaterialSuelo"></label>
                                                    <select wire:model="obra.TipoMaterialSuelo" class="form-control  @error('obra.TipoMaterialSuelo') is-invalid @enderror" name="TipoMaterialSuelo" class="inpt" id="matsu">
                                                        <option value="">Seleccione</option>
                                                        <option value="Cemento">Cemento</option>
                                                        <option value="Asfalto">Asfalto</option>
                                                    </select>@error('obra.TipoMaterialSuelo') <span class="invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="DetalleCondicionPiso">Detalle Condicion Piso</label>
                                                    <textarea wire:model="obra.DetalleCondicionPiso" id="DetalleCondicionPiso" class="form-control  @error('obra.DetalleCondicionPiso') is-invalid @enderror" name="DetalleCondicionPiso" rows="3"></textarea>
                                                    @error('obra.DetalleCondicionPiso') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                                </div><br>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="DatosAdicionales">Datos Adicionales</label>
                                                    <textarea wire:model="obra.DatosAdicionales" id="DatosAdicionales" class="form-control  @error('obra.DatosAdicionales') is-invalid @enderror" name="DatosAdicionales" rows="3"></textarea>
                                                    @error('obra.DatosAdicionales') <span class="invalid-feedback">{{ $message }}</span>@enderror
                                                </div><br>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-5">
                                                    <label for="formFileMultiple">Profile Photo</label>
                                                    <div class="custom-file">
                                                        <div x-data="{ isUploading: false, progress: 5 }"
                                                            x-on:livewire-upload-start="isUploading = true"
                                                            x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                                            x-on:livewire-upload-error="isUploading = false"
                                                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                                                        >
                                                        <input wire:model="image" type="file" class="form-control  @error('obra.NombreObra') is-invalid @enderror" id="formFileMultiple" multiple>
                                                        <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                                            <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                            <span class="sr-only">40% Complete (success)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @error('image.*') <span class="text-danger">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                @endif

                                @if ($step == 2)
                                    <fieldset id="form-horizontal-p-2" role="tabpanel" aria-labelledby="form-horizontal-h-2" class="body" aria-hidden="true">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h3>Asignar usuarios </h3><br>
                                                    <div id="accordionEmpleados" wire:ignore>
                                                        <h3>Coordinador de proyectos</h3>
                                                        <div>
                                                            @forelse ($users as $u)
                                                                @if ($u->Rol->NombreRol == 'Coordinador de Proyecto')
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" wire:model.defer="Usuarios" name="Ingeniero[]" value="{{$u->id}}" id="id_ingA{{ $u->id }}">
                                                                        <label class="form-check-label" for="id_ingA{{ $u->id }}">
                                                                            {{$u->id.' . '.$u->NombreCompleto}}
                                                                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Ciudad:'.$u?$u->Ciudad->ciudad:'-' }}
                                                                        </label>
                                                                    </div><br>
                                                                @endif
                                                            @empty
                                                            <p>
                                                                NO HAY INGENIEROS ASIGNADOS.
                                                            </p>
                                                            @endforelse
                                                        </div>
                                                        <h3>Ingenieros</h3>
                                                        <div>
                                                            @forelse ($users as $u)
                                                                @if ($u->Rol->NombreRol == 'Ingeniero')
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" wire:model.defer="Usuarios" type="checkbox" name="Ingeniero[]" value="{{$u->id}}" id="id_ingA{{ $u->id }}">
                                                                        <label class="form-check-label" for="id_ingA{{ $u->id }}">
                                                                            {{$u->id.' . '.$u->NombreCompleto}}
                                                                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Ciudad:'.$u?$u->Ciudad->ciudad:'-' }}
                                                                        </label>
                                                                    </div><br>
                                                                @endif
                                                            @empty
                                                            <p>
                                                                NO HAY INGENIEROS ASIGNADOS.
                                                            </p>
                                                            @endforelse
                                                        </div>
                                                        <h3>Instaladores</h3>
                                                        <div>
                                                            @forelse ($users as $u)
                                                                @if ($u->Rol->NombreRol == 'Instalador')
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" wire:model.defer="Usuarios" type="checkbox" name="Instalador[]" value="{{$u->id}}" id="id_instA{{ $u->id }}">
                                                                        <label class="form-check-label" for="id_instA{{ $u->id }}">
                                                                            {{$u->id.' . '.$u->NombreCompleto}}
                                                                            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Ciudad:'.$u?$u->Ciudad->ciudad:'-' }}
                                                                        </label>
                                                                    </div><br>
                                                                @endif
                                                            @empty
                                                            <p>
                                                                NO HAY INSTALADORES ASIGNADOS.
                                                            </p>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                @endif
                            </div>

                            <div class="actions clearfix">
                                <ul role="menu" aria-label="Pagination">
                                    @if ($step == 0)
                                        <li class="disabled" aria-disabled="true"><a wire:click="decreaseStep()" href="javascript:void(0)" role="menuitem">Anterior</a></li>
                                        <li aria-hidden="false" aria-disabled="false"><a wire:click="submitStep()"  href="javascript:void(0)" role="menuitem">Siguiente</a></li>
                                    @elseif ($step == 1)
                                        <li class="" aria-disabled="true"><a wire:click="decreaseStep()" href="javascript:void(0)" role="menuitem">Anterior</a></li>
                                        <li aria-hidden="false" aria-disabled="false"><a wire:click="submitStep()" id="seeAcordion"  href="javascript:void(0)" role="menuitem">Siguiente</a></li>
                                    @elseif ($step == 2)
                                        <li class="" aria-disabled="true"><a wire:click="decreaseStep()" href="javascript:void(0)" role="menuitem">Anterior</a></li>
                                        <li aria-hidden="false" aria-disabled="false"><a wire:click="submitStep()" id="submitEmp" href="javascript:void(0)" role="menuitem">Registrar obra</a></li>
                                    @endif
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('jss')
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>

    if( $('#city_idReg').val() == "null"){
        $("#city_idReg option[value='null']").remove();
    }
    if( $('#cliente_idReg').val() == "null"){
        $("#cliente_idReg option[value='null']").remove();
    }
    $('#city_idReg').on('change', function(e) {
        @this.set('obra.city_id', e.target.value);
    })
    $('#cliente_idReg').on('change', function(e) {
        @this.set('obra.cliente_id', e.target.value);
    })

    var steps = @this.step;
    if(steps == 2){
        alert('2');
    }
    $('#seeAcordion').on('click',function() {
        alert('acc')
        $("#accordionEmpleados").accordion({
        collapsible: true,
        heightStyle: "content"
    });

    })

</script>
@endpush


