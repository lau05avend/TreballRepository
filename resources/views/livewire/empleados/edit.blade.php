<div wire:ignore.self class="modal fade overflow-scroll" id="EditEmpleado" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Empleados</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#EditEmpleado')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="update()">
                    <div class="form-group">
                        <label for="NombreCompleto-{{$empleado?$empleado->id:''}}">Nombre Completo:</label>
                        <input type="text" class="form-control" name="NombreCompleto" id="NombreCompleto-{{$empleado?$empleado->id:''}}" wire:model="empleado.NombreCompleto" placeholder="Nombre">   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('empleado.NombreCompleto')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="NumeroDocumento-{{$empleado?$empleado->id:''}}">Número de Documento:</label>
                        <input type="number" class="form-control" name="NumeroDocumento" wire:model="empleado.NumeroDocumento" id="NumeroDocumento-{{$empleado?$empleado->id:''}}" placeholder="Num.Documento">
                      @error('empleado.NumeroDocumento')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="NumeCelular-{{$empleado?$empleado->id:''}}">Num.Celular:</label>
                        <input type="number" class="form-control" name="NumeCelular" id="NumeCelular-{{$empleado?$empleado->id:''}}" wire:model="empleado.NumeCelular" placeholder="Num.Celular">
                    @error('empleado.NumeCelular')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="NumTelefono-{{$empleado?$empleado->id:''}}">Num.Telefono:</label>
                        <input type="number" class="form-control" name="NumTelefono" wire:model="empleado.NumTelefono" id="NumTelefono-{{$empleado?$empleado->id:''}}" placeholder="Num.Telefono">
                        @error('empleado.NumTelefono')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="FechaNacimientoU-{{$empleado?$empleado->id:''}}">Fecha Nacimiento:</label>
                        <input type="date" class="form-control" name="FechaNacimientoU" id="FechaNacimientoU-{{$empleado?$empleado->id:''}}" wire:model="empleado.FechaNacimientoU" placeholder="FechaNacimiento">
                        @error('empleado.FechaNacimientoU')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="CorreoUsuario-{{$empleado?$empleado->id:''}}">Email:</label>
                        <input type="text" class="form-control" name="CorreoUsuario" id="CorreoUsuario-{{$empleado?$empleado->id:''}}" wire:model="empleado.CorreoUsuario" placeholder="Correo electronico">
                        @error('empleado.CorreoUsuario')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="GeneroEmpleado-{{$empleado?$empleado->id:''}}">Genero</label>
                        <select class="form-select" name="GeneroUsuario" id="GeneroUsuario-{{$empleado?$empleado->id:''}}" wire:model="empleado.GeneroUsuario">
                            <option value="">Seleccione</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('empleado.GeneroUsuario')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="FotoUsuario-{{$empleado?$empleado->id:''}}">Foto Usuario</label>
                        <input type="" class="form-control" name="FotoUsuario" id="FotoUsuario-{{$empleado?$empleado->id:''}}" wire:model="empleado.FotoUsuario" placeholder="Foto Empleado">
                        @error('empleado.FotoUsuario')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="DireccionUsuario-{{$empleado?$empleado->id:''}}">Direccion</label>
                        <input type="text" class="form-control" name="DireccionUsuario" id="DireccionUsuario-{{$empleado?$empleado->id:''}}" wire:model="empleado.DireccionUsuario" placeholder="Dirrecion Empleado">
                        @error('empleado.DireccionUsuario')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="EdadU-{{$empleado?$empleado->id:''}}">Edad</label>
                        <input type="text" class="form-control" name="EdadU" id="EdadU-{{$empleado?$empleado->id:''}}" wire:model="empleado.EdadU" placeholder="Edad">
                        @error('empleado.EdadU')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Disponibilidad-{{$empleado?$empleado->id:''}}">Disponibilidad</label>
                        <select class="form-select" wire:model="empleado.Disponibilidad" class="inpt" name="Disponibilidad" id="Disponibilidad-{{$empleado?$empleado->id:''}}">
                            <option value="">Seleccione</option>
                            <option value="Ocupado">Ocupado</option>
                            <option value="No Disponible">No Disponible</option>
                            <option value="Disponible">Disponible</option>
                        </select>
                        @error('empleado.Disponibilidad')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipo_identificacion_id-{{$empleado?$empleado->id:''}}">Tipo de Identificacion:</label>
                        <select class="form-select" wire:model="empleado.tipo_identificacion_id" class="inpt" name="tipo_identificacion_id" id="tipo_identificacion_id-{{$empleado?$empleado->id:''}}">
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
                        <label for="rol_id-{{$empleado?$empleado->id:''}}">Rol de Usuario:</label>
                        <select class="form-select" wire:model="empleado.rol_id" class="inpt" name="rol_id" id="rol_id-{{$empleado?$empleado->id:''}}">
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
                        <label for="estado_civil_id-{{$empleado?$empleado->id:''}}">Estado Civil:</label>
                        <select class="form-select" wire:model="empleado.estado_civil_id" class="inpt" name="EstadoCivil" id="EstadoCivil-{{$empleado?$empleado->id:''}}">
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
                        <label for="city_id-{{$empleado?$empleado->id:''}}">Ciudad:</label>
                        <select class="form-select" wire:model="empleado.city_id" class="inpt" name="city_id" id="city_id-{{$empleado?$empleado->id:''}}">
                            <option value="">Seleccione</option>
                            @forelse ($ciudad as $ciu)
                            <option value="{{ $ciu->id }}">{{ $ciu->ciudad }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de empleado para continuar.</option>
                            @endforelse
                        </select>
                        @error('empleado.city_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>






                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary close-modal">Save</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#EditEmpleado')">Close</button>
            </div>
        </div>
    </div>
</div>
