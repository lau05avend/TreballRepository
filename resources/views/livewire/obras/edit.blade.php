@section('css')
<link rel="stylesheet" href="{{ asset('css/styles-obras.css'); }}">
@endsection
<div class="container-fluid">
    <div class="" id="EditObra" >
        <div class="modal-dialog showo" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Obra</h5>
                </div>
                <div class="modal-body">
                    <form class="px-14 pb-5" wire:submit.prevent="update()">
                        <div class="form-group">
                            <label for="NombreObra"></label>
                            <input wire:model="obra.NombreObra" type="text" name="obra.NombreObra" class="form-control" id="NombreObra"
                                placeholder="Nombre Obra">@error('obraEdit.NombreObra') <span
                                class="error text-danger">{{ $message }}</span> @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="city_id">Ciudad Obra:</label>
                            <select class="form-select" wire:model="obra.city_id" class="inpt" name="city_id" id="city_id">
                                <option value="">Seleccione</option>
                                @forelse ($ciudad as $cl)
                                <option value="{{ $cl->id }}">{{ $cl->ciudad }}</option>
                                @empty
                                <option value="">Ups! Registra clientes para continuar</option>
                                @endforelse
                            </select>
                            @error('obra.city_id')<span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="EstadoObra">Estado de Obra:</label>
                            <select class="form-select" wire:model="obra.EstadoObra" class="inpt" name="EstadoObra" id="EstadoObra">
                                <option value="">Seleccione</option>
                                <option value="Sin Iniciar">Sin Iniciar</option>
                                <option value="Activa">En proceso</option>
                                <option value="Terminada">Terminada</option>
                                <option value="Cancelada">Cancelada</option>
                            </select>
                            @error('obra.EstadoObra')<span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="DireccionObra"></label>
                            <input wire:model="obra.DireccionObra" type="text" class="form-control" id="DireccionObra"
                                placeholder="Direccion Obra">
                                @error('obra.DireccionObra')<span
                                class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="MedidaArea"></label>
                            <input wire:model="obra.MedidaArea" type="text" class="form-control" id="MedidaArea"
                                placeholder="Medida Area">@error('obra.MedidaArea') <span
                                class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="MedidaPerimetro"></label>
                            <input wire:model="obra.MedidaPerimetro" type="text" class="form-control" id="MedidaPerimetro"
                                placeholder="Medida Perimetro">@error('obra.MedidaPerimetro') <span
                                class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="CondicionDesnivel"></label>
                            <input wire:model="obra.CondicionDesnivel" type="text" class="form-control" id="CondicionDesnivel"
                                placeholder="Condicion Desnivel (%)">@error('obra.CondicionDesnivel') <span
                                class="error text-danger">{{ $message }}</span> @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="matsu">Tipo Material Suelo:</label>
                            <label for="TipoMaterialSuelo"></label>
                            <select wire:model="obra.TipoMaterialSuelo" class="form-select" name="TipoMaterialSuelo" class="inpt" id="matsu">
                                <option value="">Seleccione</option>
                                <option value="Cemento">Cemento</option>
                                <option value="Asfalto">Asfalto</option>
                            </select>@error('obra.TipoMaterialSuelo') <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="DetalleCondicionPiso">Detalle Condicion Piso</label>
                            <textarea wire:model="obra.DetalleCondicionPiso" id="DetalleCondicionPiso" class="form-control" name="DetalleCondicionPiso" rows="3"></textarea>
                            @error('obra.DetalleCondicionPiso') <span class="error text-danger">{{ $message }}</span>@enderror
                        </div><br>
                        <div class="form-group">
                            <label for="DatosAdicionales">Datos Adicionales</label>
                            <textarea wire:model="obra.DatosAdicionales" id="DatosAdicionales" class="form-control" name="DatosAdicionales" rows="3"></textarea>
                            @error('obra.DatosAdicionales') <span class="error text-danger">{{ $message }}</span>@enderror
                        </div><br>
                        <div class="form-group">
                            <label for="tipo_obra_id">Tipo Obra</label>
                            <select class="form-control" wire:model="obra.tipo_obra_id" name="tipo_obra_id" id="tipo_obra_id">
                                <option value="">Seleccione</option>
                                @forelse ($tipo_obra as $ty)
                                    <option value="{{ $ty->id }}">{{ $ty->TipoObra }}</option>
                                @empty
                                    <option value="">Ups! Registra tipos de obras para continuar</option>
                                @endforelse
                            </select>
                            @error('obra.tipo_obra_id') <span class="error text-danger">{{ $message }}</span>@enderror
                        </div><br>
                        <div class="form-group">
                            <label for="cliente_id">Cliente</label>
                            <select class="form-control" wire:model="obra.cliente_id" name="cliente_id" id="cliente_id">
                                <option value="">Seleccione</option>
                                @forelse ($cliente as $cl)
                                    <option value="{{ $cl->id }}">{{ $cl->NombreCC }}</option>
                                @empty
                                    <option value="">Ups! Registra clientes para continuar</option>
                                @endforelse
                            </select>
                            @error('obra.cliente_id') <span class="error text-danger">{{ $message }}</span>@enderror
                        </div><br>
                        <div class="form-group mb-5">
                            <label for="formFileMultiple">Profile Photo</label>
                            {{-- <br> {{ $hol .' '.$obra->Images }} --}}
                            <div class="custom-file">
                              <div x-data="{ isUploading: false, progress: 5 }"
                                   x-on:livewire-upload-start="isUploading = true"
                                   x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                   x-on:livewire-upload-error="isUploading = false"
                                   x-on:livewire-upload-progress="progress = $event.detail.progress"
                              >
                                @error('image.*') <span class="error text-danger">{{ $message }}</span> @enderror
                                <input wire:model="image" type="file" class="form-control" id="formFileMultiple" multiple>
                                  <div x-show.transition="isUploading" class="progress progress-sm mt-2 rounded">
                                    <div class="progress-bar bg-primary progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                      <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                  </div>
                              </div>
                              <label class="custom-file-label" for="customFile">
                                @forelse ($image as $image)
                                  <div class="m-2 mx-4 inline-block">
                                    <img src="{{ $image->temporaryUrl() }}" class="img mt-2 w-32 rounded"><br>
                                    <label>{{ $image->getClientOriginalName() }}</label>
                                  </div>
                                @empty
                                  Choose Image
                                @endforelse
                              </label>
                            </div>
                            {{-- <div>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="img d-block mt-2  w-40 rounded">
                                @else
                                <img src="{{ $state['avatar_url'] ?? '' }}" class="img d-block mb-2 w-100 rounded" >
                                @endif
                            </div> --}}
                        </div>
                        <div class="form-group">
                            <h3>Asignar usuarios </h3><br>
                            {{-- <form method="POST" class="form-as" wire:submit.prevent="ObraUsuarios" }}"> --}}

                                @forelse ($users as $u)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model.defer="Usuarios" name="Usuarios" value="{{$u->id}}" id="{{ $u->id }}">
                                    <label class="form-check-label" for="{{ $u->id }}">
                                        {{$u->id.' . '.$u->NombreCompleto}}
                                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Estado:'.$u->EstadoUsuario }}
                                    </label>
                                </div><br>
                                @empty
                                <p>
                                    NO HAY USUARIOS DISPONIBLES.
                                </p>
                                @endforelse
                                <br><br>
                            {{-- </form> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="bg-green-700 inline-block text-base py-1.5 px-3 rounded-md text-green-50 close-modal">Guardar Cambios</button><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

