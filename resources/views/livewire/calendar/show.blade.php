<div  wire:ignore.self class="modal fade" id="showActividad" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 100%; width: 700px;" role="document">
        <div class="modal-content">
            @if($evento)
            <div class="card h-full mb-0">
                <div class="card-header">
                    <button type="button" class="float-left mr-4 " id="showClose">
                        <span class="text-3xl" >&times;</span>
                    </button>
                    <h4></h4>
                    @canany(['calendario_edit','calendario_delete','calendario_usuario_save'])
                    <div class="card-header-action">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle options-show" aria-expanded="false">Opciones</a>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 26px, 0px); top: 0px; left: 0px; will-change: transform;">
                                @can('calendario_edit')
                                    <a id="drop-edit" onclick="edit({{ $evento->id }},{{ $evento->Usuarios }})" class="dropdown-item has-icon cursor-pointer"><i class="fas fa-eye"></i>Editar</a>
                                @endcan
                                @can('calendario_usuario_save')
                                    <a class="dropdown-item has-icon cursor-pointer" onclick="asign({{ $evento->Usuarios }})"><i class="far fa-edit"></i> Asignar Empleados</a>
                                @endcan
                                @can('calendario_delete')
                                    <div class="dropdown-divider"></div>
                                    <a id="drop-delete" onclick="deleteA({{ $evento->id }})" class="dropdown-item has-icon text-danger cursor-pointer"><i class="far fa-trash-alt"></i>
                                    Delete</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    @endcanany
                </div>
                <div class="card-body" style="color: #665e5e;">
                    <div class="flex mb-2" style="color: #464242;">
                        <i class="float-left ml-1 mr-3 material-icons" style="color: #69a798;">insert_invitation</i>
                        <h4 class="left w-full mb-3" style="font-size:23px !important;">{{ $evento->title }}</h4><br>
                        <div class="right w-40 mt-1"><span class="px-3 py-1 bg-green-500 text-white rounded-md">{{ $evento->EstadoActividad?$evento->EstadoActividad->NombreEstado:'-' }}</span></div>
                    </div>
                    <div style="padding: 0 15px" class="form-row text-center">
                        <span class="col-md-6">
                            <strong>Inicia:</strong> {{ $evento->start }}
                        </span>
                        {{-- <i class="material-icons">remove</i> --}}
                        <span class="col-md-6">
                            <strong>Termina:</strong> {{ $evento->end }}
                        </span>
                    </div><br>
                    <div class="flex mt-2 py-2">
                        <i style="font-size: 22px;margin-top: 1px;" class="ml-1 mr-3.5 material-icons">dashboard</i>
                        <div class="w-full pr-5"><strong>Detalles de la Actividad:</strong><br>{{ $evento->DescripcionActividad }}</div>
                    </div>
                    <div class="form-row mt-2 mb-3 py-2">
                        <div class="col-md-6">
                            <i  style="font-size: 22px;margin-top: 2px;vertical-align: bottom;" class="ml-1 mr-3.5 material-icons">date_range</i>
                            <strong>Días de duración de la actividad: </strong>{{ $evento->CantidadDias == null ? '0': $evento->CantidadDias  }}
                        </div>
                        <div class="col-md-6">
                            <i  style="font-size: 22px;margin-top: 2px;vertical-align: bottom;" class="ml-1 mr-1 material-icons">autorenew</i>
                            <strong>Fase Tarea: </strong>{{ $evento->FaseTarea?$evento->FaseTarea->NombreFase:'-' }}
                        </div>
                    </div>
                    <div class="form-row py-2 mb-2" id="obrasyle">
                        <i style="vertical-align: middle;" id="a" class=" material-icons ml-1 mr-3.5">photo_library</i>
                        <div class="col-md-8 w-full mr-5">
                            <strong>Obra: </strong>
                            <span>{{ $evento->Obra->NombreObra }}</span><br><span>{{ $evento->Obra->EstadoObra }}</span>
                        </div>
                        <div class="col-md-1 pt-2" id="icons-obra">
                            <i class="material-icons cursor-pointer hover:text-gray-500" wire:click="redirectObra" data-toggle="tooltip" data-placement="bottom" title="Ver obra" style="font-size: 22px;">launch</i>
                        </div>
                    </div>
                    <div class="flex py-2 mt-2 mb-2">
                        <i style="font-size: 18px; margin-top: 3px;" class="fas fa-users ml-1 mr-3.5"></i>
                        <div class="w-full">
                            <span class="text-lg font-bold mt-3">Empleados asignados</span><br />
                            <span style="font-size:12.6px; ">{{ $evento->Usuarios->count() }} empleados, </span>
                            @if (count($evento->Usuarios) )
                                <span style="font-size:12.6px; ">{{ $evento->Usuarios->where('rol_id',4)->count() }} Ingenieros, </span>
                                <span style="font-size:12.6px; ">{{ $evento->Usuarios->where('rol_id',3)->count() }} Instaladores</span>
                            @endif
                            <ul class="mr-8 mt-2.5">
                                @foreach($evento->Usuarios as $user)
                                    <li class="form-row">
                                        <div class="col-md-6">
                                            @if (Storage::disk('public')->exists("$user->FotoUsuario") )
                                                <img src="{{ '/storage/'.$user->FotoUsuario }}" alt="Admin" class="rounded-circle" width="24px">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ $user->NombreCompleto }}&color=7F9CF5&background=EBF4FF" alt="Admin" class="rounded-circle" width="24">
                                            @endif
                                            <span class="ml-2">{{ $user->NombreCompleto }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="text-right mb-4 mt-4" style="color: #3b434a;"><span class="font-semibold">Ultima modificación: </span>{{ $evento->updated_at?$evento->updated_at->diffForHumans():'-' }}</div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@push('jss')
<script>

    let form = document.getElementById("form-act");
    function edit(id, us){
         @this.set('asignadosE', us)
        axios.get(URLp+'/obras/'+numObra+'/cronograma/'+id+"/edit").then((repuesta) => {  //acceder a una url
            form.id.value = repuesta.data.id;
            form.title.value = repuesta.data.title;
            form.description.value = repuesta.data.DescripcionActividad;
            form.start.value = repuesta.data.start;
            form.end.value = repuesta.data.end;
            form.estado_actividad_id.value = repuesta.data.estado_actividad_id;
            form.fase_tarea_id.value = repuesta.data.fase_tarea_id;
            form.obra_id.value = repuesta.data.obra_id;


            $('#CreateEvento').modal("show");
        }). catch(
        error => {
            if(error.response){
                console.log(error.response.data);
            }
        });
        $('#showActividad').modal('hide');
    }

    $('#showActividad').on('shown.bs.modal', function(){
        $("#showClose").on('click',function(){
            $('#showActividad').modal("hide");
        });
    })

    function deleteA(id){
        $('#showActividad').modal('hide');
        Swal.fire({
            title: '¿Estas seguro de eliminar esta actividad?',
            text: "No serás capaz de revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(38 94 91)',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar'
            }).then((result) => {
            if (result.isConfirmed) {
                @this.eventDelete(id)
                @this.refreshCalendar()
                Swal.fire(
                'Eliminado!',
                'La actividad ha sido eliminada.',
                'success'
                )
            }
            })
    }

    function asign(us){
        @this.set('asignadosE', us)
        $('#showActividad').modal('hide');
        $('#UsuariosActividad').modal('show');

            us.forEach(element => {
                if(element.rol_id == 4){
                    $("#id_ingA"+element.id).attr('checked', true)
                }
                else if(element.rol_id == 3){
                    $("#id_instA"+element.id).attr('checked', true)
                }
            });
    }

</script>

@endpush

