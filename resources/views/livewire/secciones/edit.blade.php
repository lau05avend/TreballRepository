
<div wire:ignore.self class="modal fade overflow-scroll" id="EditSecciones" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                <button type="button" class="close" wire:click.prevent="cerrarmodal('#EditSecciones')" aria-label="Close">
                    <span aria-hidden="true close-btn">X</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $seccion }}
                <form class="px-14 pb-5" wire:submit.prevent="update()">
                    <div class="form-group">
                        <label for="NombreSeccion">Nombre Sección:</label>
                        <input type="text" name="NombreSeccion" id="NombreSeccion" wire:model="seccion.NombreSeccion" placeholder="Nombre"><br>   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('seccion.NombreSeccion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>

                    <div class="form-group">
                        <label for="AreaSeccion">Area Sección:</label>
                        <input type="text" name="AreaSeccion" id="AreaSeccion" wire:model="seccion.AreaSeccion" placeholder="Nombre"><br>   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('seccion.AreaSeccion')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>

                    <div class="form-group">
                        <label for="PerimetroSec">Perimetro Sección:</label>
                        <input type="text" name="PerimetroSec" id="PerimetroSec" wire:model="seccion.PerimetroSec" placeholder="Nombre"><br>   {{-- wire:modal parecido a name, para manejar datos desde el controlador --}}
                        @error('seccion.PerimetroSec')<span class="error text-danger">{{ $message }}</span> @enderror
                    </div><br>






                    <button type="submit" class="btn btn-primary close-modal">Save</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#EditSecciones')">Close</button>
            </div>
        </div>
    </div>
</div>



