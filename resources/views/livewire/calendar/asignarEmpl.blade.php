<div  wire:ignore.self class="modal fade" id="UsuariosActividad" style="overflow-y: scroll;" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 100%; width: 700px;" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding: 18px 5px 5px 20px; border: none;">
                <button type="button" class="float-left mr-4 close" id="closeAU">
                    <span class="text-3xl" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-0">
                <form action="" id="form-users" method="POST">
                    @csrf

                    <div class="form-group" id="userGroup">
                        <h3>Asignar usuarios {{ $evento?$evento->title:'' }}</h3><br>
                        <div id="accordionUs" wire:ignore>
                            <h3>Ingenieros</h3>
                            <div>
                                @forelse ($users as $u)
                                    @if ($u->Rol->NombreRol == 'Ingeniero')
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="Ingeniero[]" value="{{$u->id}}" id="id_ingA{{ $u->id }}">
                                            <label class="form-check-label" for="id_ingA{{ $u->id }}">
                                                {{$u->id.' . '.$u->NombreCompleto}}
                                                <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Estado:'.$u->EstadoUsuario }}
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
                                            <input class="form-check-input" type="checkbox" name="Instalador[]" value="{{$u->id}}" id="id_instA{{ $u->id }}">
                                            <label class="form-check-label" for="id_instA{{ $u->id }}">
                                                {{$u->id.' . '.$u->NombreCompleto}}
                                                <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{'Estado:'.$u->EstadoUsuario }}
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
                </form>
            </div>
            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-secondary" id="cancelar">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnSaveAsig">Guardar</button>
            </div>
        </div>
    </div>
</div>
@push('jss')

<script>
    $('#showActividad').on('shown.bs.modal', function(){
        $("#closeAU").on('click',function(){
           $('#UsuariosActividad').modal("hide");
        });

    })
    $('#cancelar').on('click', function(){
        $('#UsuariosActividad').modal("hide");
    })

    let formUs = document.getElementById("form-users");

    function clearCheckbox(){
        var users = @json($users);
        users.forEach(element => {
            $('#id_ingA'+element.id).attr('checked', false)
            $("#id_instA"+element.id).attr('checked', false)
        })
    }

    $('#UsuariosActividad').on('show.bs.modal', function (e) {
        $("#accordionUs").accordion({
            collapsible: true,
            heightStyle: "content"
        });
        clearCheckbox();
    })

    $("#btnSaveAsig").on('click',function(){
        const datosUs = new FormData(formUs);
        var ing = datosUs.getAll("Instalador[]");
        var ins = datosUs.getAll("Ingeniero[]").concat(ing)
        console.log(ins)
        @this.asignarEmpleados(ins)
        $('#UsuariosActividad').modal("hide");

        Swal.fire({
            title: 'Bien!',
            text: 'Empleados asignados satisfactoriamente.',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
    })


</script>

@endpush

