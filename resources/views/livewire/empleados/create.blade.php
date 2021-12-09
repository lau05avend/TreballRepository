<div wire:ignore.self class="modal fade overflow-scroll" id="CreateEmpleado" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document" style="max-width: 100%; width: 805px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: 500;color: black;font-size: 22px;" id="exampleModalLabel">Formulario de registro empleado</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreateEmpleado')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5 mt-4" wire:submit.prevent="store()">
                    <div class="form-group">
                        <label for="NombreCompleto">Nombre Completo </label><span class="text-red-600">*</span>
                        <input type="text" class="form-control @error('empleado.NombreCompleto') is-invalid @enderror" name="NombreCompleto" id="NombreCompleto" wire:model="empleado.NombreCompleto" placeholder="">   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('empleado.NombreCompleto')<span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="NumeroDocumento">Número de Documento </label><span class="text-red-600">*</span>
                            <input type="number" class="form-control @error('empleado.NumeroDocumento') is-invalid @enderror" name="NumeroDocumento" wire:model="empleado.NumeroDocumento" id="NumeroDocumento" placeholder="">
                          @error('empleado.NumeroDocumento')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_identificacion_id">Tipo de Identificacion </label><span class="text-red-600">*</span>
                            <select class="form-control @error('empleado.tipo_identificacion_id') is-invalid @enderror" wire:model="empleado.tipo_identificacion_id" class="inpt" name="tipo_identificacion_id" id="tipo_identificacion_id">
                                <option value="">Seleccione</option>
                                @forelse ($tipoiden as $ti)
                                <option value="{{ $ti->id }}">{{ $ti->TipoIdentificacion }}</option>
                                @empty
                                <option value="">Ups! Registra algun tipo de identificacion para continuar.</option>
                                @endforelse
                            </select>
                            @error('empleado.tipo_identificacion_id')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="CorreoUsuario">Email </label><span class="text-red-600">*</span>
                            <input type="text" class="form-control @error('empleado.CorreoUsuario') is-invalid @enderror" name="CorreoUsuario" id="CorreoUsuario" wire:model="empleado.CorreoUsuario" placeholder="">
                            @error('empleado.CorreoUsuario')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rol_id">Cargo/función </label><span class="text-red-600">*</span>
                            <select class="form-control @error('empleado.rol_id') is-invalid @enderror" wire:model="empleado.rol_id" class="inpt" name="rol_id" id="rol_id">
                                <option value="">Seleccione</option>
                                @forelse ($rol as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->NombreRol }}</option>
                                @empty
                                <option value="">Ups! Registra algun tipo de identificacion para continuar.</option>
                                @endforelse
                            </select>
                            @error('empleado.rol_id')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="city_id">Ciudad </label><span class="text-red-600">*</span>
                            <select class="form-control @error('empleado.city_id') is-invalid @enderror" wire:model="empleado.city_id" class="inpt" name="city_id" id="city_id">
                                <option value="">Seleccione</option>
                                @forelse ($ciudad as $ciu)
                                <option value="{{ $ciu->id }}">{{ $ciu->ciudad }}</option>
                                @empty
                                <option value="">Ups! Registra algun tipo de empleado para continuar.</option>
                                @endforelse
                            </select>
                            @error('empleado.city_id')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-7">
                            <label for="DireccionUsuario">Dirección </label><span class="text-red-600">*</span>
                            <input type="text" class="form-control @error('empleado.DireccionUsuario') is-invalid @enderror" name="DireccionUsuario" id="DireccionUsuario" wire:model="empleado.DireccionUsuario" placeholder="">
                            @error('empleado.DireccionUsuario')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="NumeCelular">Num.Celular </label><span class="text-red-600">*</span>
                            <input type="number" class="form-control @error('empleado.NumeCelular') is-invalid @enderror" name="NumeCelular" id="NumeCelular" wire:model="empleado.NumeCelular" placeholder="">
                        @error('empleado.NumeCelular')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="NumTelefono">Num.Telefono </label><span class="text-red-600">*</span>
                            <input type="number" class="form-control @error('empleado.NumTelefono') is-invalid @enderror" name="NumTelefono" wire:model="empleado.NumTelefono" id="NumTelefono" placeholder="">
                            @error('empleado.NumTelefono')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="estado_civil_id">Estado Civil </label><span class="text-red-600">*</span>
                            <select class="form-control @error('empleado.estado_civil_id') is-invalid @enderror" wire:model="empleado.estado_civil_id" class="inpt" name="EstadoCivil" id="EstadoCivil">
                                <option value="">Seleccione</option>
                                @forelse ($estadocivil as $ec)
                                <option value="{{ $ec->id }}">{{ $ec->EstadoCivil }}</option>
                                @empty
                                <option value="">Ups! Registra algun tipo de empleado para continuar.</option>
                                @endforelse
                            </select>
                            @error('empleado.estado_civil_id')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="FechaNacimientoU">Fecha Nacimiento </label><span class="text-red-600">*</span>
                            <input type="date" class="form-control @error('empleado.FechaNacimientoU') is-invalid @enderror" name="FechaNacimientoU" id="FechaNacimientoU" wire:model="empleado.FechaNacimientoU" placeholder="FechaNacimiento">
                            @error('empleado.FechaNacimientoU')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="GeneroEmpleado">Genero </label><span class="text-red-600">*</span>
                            <select class="form-control @error('empleado.GeneroUsuario') is-invalid @enderror" name="GeneroUsuario" id="GeneroUsuario" wire:model="empleado.GeneroUsuario">
                                <option value="">Seleccione</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Otro">Otro</option>
                            </select>
                            @error('empleado.GeneroUsuario')<span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <select class="form-control @error('empleado.Disponibilidad') is-invalid @enderror" wire:model="empleado.Disponibilidad" class="inpt" name="Disponibilidad" id="Disponibilidad">
                            <option value="Disponible" selected>Disponible</option>
                            <option value="Ocupado">Ocupado</option>
                            <option value="No Disponible">No Disponible</option>
                        </select>
                        @error('empleado.Disponibilidad')<span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden"
                                        wire:model="photo"
                                        x-ref="photo"
                                        x-on:change="
                                                photoName = $refs.photo.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.photo.files[0]);
                                        " />

                            <x-jet-label for="photo" style="font-size: 15px !important;" value="{{ __('Foto') }}" />

                            @if(!$errors->first('photo'))
                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" x-show="photoPreview">
                                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                </div>
                            @endif

                            <x-jet-secondary-button class="mt-2 mr-2 text-black" type="button" x-on:click.prevent="$refs.photo.click()">
                                {{ __('SELECCIONA UNA NUEVA FOTO') }}
                            </x-jet-secondary-button>
                            @error('photo')<br><span class="validate-photo">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-12 mb-5" style="text-align: center;">
                        <button x-data="{photoName: null, photoPreview: null}" type="submit" wire:loading.delay.longest.attr="disabled" style="width:200px;" class="btn-forms">
                            <i wire:loading.delay.longest.class="fas fa-spinner fa-spin" ></i>
                            Registrar empleado
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('jss')

<script>
</script>

@endpush

