<div wire:ignore.self class="modal fade overflow-scroll" id="CreateCliente" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Cliente</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreateCliente')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="store()">

                    <div class="form-group">
                        <label for="NombreCC">Nombre Completo:</label>
                        <input type="text" name="NombreCC" id="NombreCC" wire:model="cliente.NombreCC" placeholder="Nombre"><br>   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('cliente.NombreCC')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="NumDocU">Num.Documento:</label>
                        <input type="number" name="NumIdentificacion" wire:model="cliente.NumIdentificacion" id="NumeroDocumento" placeholder="Num.Documento"><br>
                      @error('cliente.NumIdentificacion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="NumCelular">Num.Celular:</label>
                        <input type="number" name="NumCelular" id="NumCelular" wire:model="cliente.NumCelular" placeholder="Num.Celular"><br>
                    @error('cliente.NumCelular')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="NumTelefono">Num.Telefono:</label>
                        <input type="number" name="NumTelefono" wire:model="cliente.NumTelefono" id="NumTelefono" placeholder="Num.Telefono"><br>
                        @error('cliente.NumTelefono')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="CorreoCliente">Correo electronico:</label>
                        <input type="text" name="CorreoCliente" id="CorreoCliente" wire:model="cliente.CorreoCliente" placeholder="Correo electronico"><br>
                        @error('cliente.CorreoCliente')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>

                    <div class="form-group">
                        <label for="tipo_identificacion_id">Tipo de Identificacion:</label>
                        <select class="form-select" wire:model="cliente.tipo_identificacion_id" class="inpt" name="tipo_identificacion_id" id="tipo_identificacion_id">
                            <option value="">Seleccione</option>
                            @forelse ($tipoi as $cl)
                            <option value="{{ $cl->id }}">{{ $cl->TipoIdentificacion }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de identificacion para continuar.</option>
                            @endforelse
                        </select>
                        @error('cliente.tipo_identificacion_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="tipo_cliente_id">Tipo de Cliente:</label>
                        <select class="form-select" wire:model="cliente.tipo_cliente_id" class="inpt" name="tipo_cliente_id" id="tipo_cliente_id">
                            <option value="">Seleccione</option>
                            @forelse ($tipoc as $cl)
                            <option value="{{ $cl->id }}">{{ $cl->nombreTipoC }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de cliente para continuar.</option>
                            @endforelse
                        </select>
                        @error('cliente.tipo_cliente_id')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="ContrasenaC">Contraseña:</label>
                        <input type="password" name="ContrasenaC" id="ContrasenaC" wire:model="cliente.ContrasenaC" placeholder="contrasena"><br>
                        @error('cliente.ContrasenaC')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>

                    <button type="submit" wire:loading.delay.longest.attr="disabled" class="btn btn-primary close-modal">
                        <i wire:loading.delay.longest.class="fas fa-spinner fa-spin" ></i>
                        Save
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateCliente')">Close</button>
            </div>
        </div>
    </div>
</div>

