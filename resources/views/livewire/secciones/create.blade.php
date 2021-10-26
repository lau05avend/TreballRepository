<div wire:ignore.self class="modal fade overflow-scroll" id="CreateSecciones" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Seccion</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#CreateSecciones')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="px-14 pb-5" wire:submit.prevent="store()">

                    <div class="form-group">
                        <label for="NombreSeccion">Nombre Seccion:</label>
                        <input type="text" name="NombreSeccion" id="NombreSeccion" wire:model="seccion.NombreSeccion" placeholder="Nombre"><br>   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('seccion.NombreSeccion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="AreaSeccion">Area seccion:</label>
                        <input type="number" name="AreaSeccion" wire:model="seccion.AreaSeccion" id="AreaSeccion" placeholder="Area "><br>
                      @error('seccion.AreaSeccion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>
                    <div class="form-group">
                        <label for="PerimetroSec">Perimetro:</label>
                        <input type="number" name="PerimetroSec" wire:model="seccion.PerimetroSec" id="PerimetroSec" placeholder="Perimetro "><br>
                      @error('seccion.PerimetroSec')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>

                    <div class="form-group">
                        <label for="color_id">Color:</label>
                        <select class="form-select" wire:model="seccion.color_id" class="inpt" name="=color_id" id="color_id">
                            <option value="">Seleccione</option>
                            @forelse ($color as $c)
                            <option value="{{ $c->id }}">{{ $c->Ncolor }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de identificacion para continuar.</option>
                            @endforelse
                        </select>
                        @error('seccion.color_id ')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="diseno_id">Diseño:</label>
                        <select class="form-select" wire:model="seccion.diseno_id" class="inpt" name="diseno_id" id="diseno_id">
                            <option value="">Seleccione</option>
                            @forelse ($diseno as $dn)
                            <option value="{{ $dn->id }}">{{ $dn->ImagenPlano }}</option>
                            @empty
                            <option value="">Ups! Registra algun tipo de identificacion para continuar.</option>
                            @endforelse
                        </select>
                        @error('seccion.diseno_id ')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div>


                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#CreateSecciones')">Close</button>
            </div>
        </div>
    </div>
</div>
