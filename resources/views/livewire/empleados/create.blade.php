<div wire:ignore.self class="modal fade overflow-scroll" id="CreateEmpleado" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Empleado</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreateEmpleado')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="store()">
                    <div class="form-group">
                        <label for="NombreCompleto">Nombre Completo:</label>
                        <input type="text" class="form-control" name="NombreCompleto" id="NombreCompleto" wire:model="empleado.NombreCompleto" placeholder="Nombre">   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('empleado.NombreCompleto')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="NumeroDocumento">Número de Documento:</label>
                        <input type="number" class="form-control" name="NumeroDocumento" wire:model="empleado.NumeroDocumento" id="NumeroDocumento" placeholder="Num.Documento">
                      @error('empleado.NumeroDocumento')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="NumeCelular">Num.Celular:</label>
                        <input type="number" class="form-control" name="NumeCelular" id="NumeCelular" wire:model="empleado.NumeCelular" placeholder="Num.Celular">
                    @error('empleado.NumeCelular')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="NumTelefono">Num.Telefono:</label>
                        <input type="number" class="form-control" name="NumTelefono" wire:model="empleado.NumTelefono" id="NumTelefono" placeholder="Num.Telefono">
                        @error('empleado.NumTelefono')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="FechaNacimientoU">Fecha Nacimiento:</label>
                        <input type="date" class="form-control" name="FechaNacimientoU" id="FechaNacimientoU" wire:model="empleado.FechaNacimientoU" placeholder="FechaNacimiento">
                        @error('empleado.FechaNacimientoU')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="CorreoUsuario">Email:</label>
                        <input type="text" class="form-control" name="CorreoUsuario" id="CorreoUsuario" wire:model="empleado.CorreoUsuario" placeholder="Correo electronico">
                        @error('empleado.CorreoUsuario')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="GeneroEmpleado">Genero</label>
                        <select class="form-select" name="GeneroUsuario" id="GeneroUsuario" wire:model="empleado.GeneroUsuario">
                            <option value="">Seleccione</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('empleado.GeneroUsuario')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="FotoUsuario">Foto Usuario</label>
                        <input type="" class="form-control" name="FotoUsuario" id="FotoUsuario" wire:model="empleado.FotoUsuario" placeholder="Foto Empleado">
                        @error('empleado.FotoUsuario')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DireccionUsuario">Direccion</label>
                        <input type="text" class="form-control" name="DireccionUsuario" id="DireccionUsuario" wire:model="empleado.DireccionUsuario" placeholder="Dirrecion Empleado">
                        @error('empleado.DireccionUsuario')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="EdadU">Edad</label>
                        <input type="text" class="form-control" name="EdadU" id="EdadU" wire:model="empleado.EdadU" placeholder="Edad">
                        @error('empleado.EdadU')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Disponibilidad">Disponibilidad</label>
                        <select class="form-select" wire:model="empleado.Disponibilidad" class="inpt" name="Disponibilidad" id="Disponibilidad">
                            <option value="">Seleccione</option>
                            <option value="Ocupado">Ocupado</option>
                            <option value="No Disponible">No Disponible</option>
                            <option value="Disponible">Disponible</option>
                        </select>
                        @error('empleado.Disponibilidad')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_identificacion_id">Tipo de Identificacion:</label>
                        <select class="form-select" wire:model="empleado.tipo_identificacion_id" class="inpt" name="tipo_identificacion_id" id="tipo_identificacion_id">
                            <option value="">Seleccione</option>
                            @forelse ($tipoiden as $ti)
                            <option value="{{ $ti->id }}">{{ $ti->TipoIdentificacion }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de identificacion para continuar.</option>
                            @endforelse
                        </select>
                        @error('empleado.tipo_identificacion_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="rol_id">Rol de Usuario:</label>
                        <select class="form-select" wire:model="empleado.rol_id" class="inpt" name="rol_id" id="rol_id">
                            <option value="">Seleccione</option>
                            @forelse ($rol as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->NombreRol }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de identificacion para continuar.</option>
                            @endforelse
                        </select>
                        @error('empleado.rol_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado_civil_id">Estado Civil:</label>
                        <select class="form-select" wire:model="empleado.estado_civil_id" class="inpt" name="EstadoCivil" id="EstadoCivil">
                            <option value="">Seleccione</option>
                            @forelse ($estadocivil as $ec)
                            <option value="{{ $ec->id }}">{{ $ec->EstadoCivil }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de empleado para continuar.</option>
                            @endforelse
                        </select>
                        @error('empleado.estado_civil_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="city_id">Ciudad:</label>
                        <select class="form-select" wire:model="empleado.city_id" class="inpt" name="city_id" id="city_id">
                            <option value="">Seleccione</option>
                            @forelse ($ciudad as $ciu)
                            <option value="{{ $ciu->id }}">{{ $ciu->ciudad }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de empleado para continuar.</option>
                            @endforelse
                        </select>
                        @error('empleado.city_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="contrasena">Contraseña:</label>
                        <input type="password" class="form-control" name="contrasena" id="contrasena" wire:model="empleado.contrasena" placeholder="contrasena">
                        @error('empleado.contrasena')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateEmpleado')">Close</button>
            </div>
        </div>
    </div>
</div>
