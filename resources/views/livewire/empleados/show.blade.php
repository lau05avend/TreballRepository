@if ($openShow)
<div wire:ignore.self class="modal fade overflow-scroll" id="ShowEmpleado" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 890px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="float-left" style="flex: auto;margin-right: 34px;">
                    <p class="modal-title display-6 ml-2 max-w-md text-3xl" id="exampleModalLabel">Empleado: {{ $empleado->NombreCompleto }}</p>
                </div>
                <div class="float-right w-72 text-right" style="flex: auto;margin-right: 2px;">
                    <p><strong>Información actualizada en: </strong><br>{{ $empleado?date('d-m-Y h:i A', strtotime($empleado->updated_at )) :'-' }}</p>
                </div>

                <div class="position-relative" style="width: 40px;">
                    <button type="button" class="close position-absolute" wire:click.prevent="cerrarmodal('#ShowEmpleado')" aria-label="Close">
                        <span aria-hidden="true close-btn">X</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div>
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        @if (Storage::disk('public')->exists("$empleado->FotoUsuario") )
                                            <img src="{{ '/storage/'.$empleado->FotoUsuario }}" alt="Admin" class="rounded-circle" width="150">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ $empleado->NombreCompleto }}&color=7F9CF5&background=EBF4FF" alt="Admin" class="rounded-circle" width="150">
                                        @endif
                                        <div class="mt-3">
                                            <h4>{{ $empleado->NombreCompleto }}</h4>
                                            {{-- <p class="text-secondary mb-1">Full Stack Developer</p> --}}
                                            <p class="font-size-sm text-gray-700">{{ $empleado->Rol?$empleado->Rol->NombreRol:'' }}</p>
                                            <a href="mailto:{{ $empleado->CorreoUsuario }}"><button class="btn btn-outline-primary bg-green-600"><i class="far fa-envelope"></i> Enviar e-mail</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="float-left" style="display: flex; width: 50%;">
                                            <i class="material-icons" style="font-size: 21px; margin-top:1.5px;">question_answer</i>
                                            <h6 class="mb-0 ml-1 text-base"> Disponibilidad: </h6>
                                        </div>
                                        <span class="text-gray-600">{{ $empleado->Disponibilidad }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="float-left" style="display: flex; width: 60%;">
                                            <i class="material-icons" style="font-size: 21px; margin-top:1px;">place</i>
                                            <h6 class="mb-0 ml-1 text-base"> Ciudad: </h6>
                                        </div>
                                        <span class="text-gray-600">{{ $empleado->Ciudad?$empleado->Ciudad->ciudad:'' }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="float-left" style="display: flex; width: 80%;">
                                            <i class="material-icons" style="font-size: 21px; margin-top:1px;">assignment_ind</i><h6 class="mb-0 ml-1 text-base"> Edad: </h6>
                                        </div>
                                        <span class="text-gray-600">{{ $empleado->EdadU }}</span>
                                    </li>
                                    <li class="border-gray-600 list-group-item d-flex justify-content-between align-items-center flex-wrap" style="border-top-width: 1px !important;">
                                        <div class="float-left" style="display: flex; width: 80%;">
                                            <i class="material-icons" style="font-size: 21px; margin-top:1.5px;">done_all</i>
                                            <h6 class="mb-0 ml-1 text-base">Obras <br> Terminadas: </h6>
                                        </div>
                                        <span class="text-gray-600">{{ $empleado->Obras()->where('EstadoObra','Terminada')->get()->count() }}</span>
                                    </li>
                                    <li class="border-gray-600 list-group-item d-flex justify-content-between align-items-center flex-wrap" style="border-top-width: 1px !important;">
                                        <div class="float-left" style="display: flex; width: 80%;">
                                            <i class="material-icons" style="font-size: 21px; margin-top:1.5px;">equalizer</i>
                                            <h6 class="mb-0 ml-1 text-base">Obras <br> Actuales: </h6>
                                        </div>
                                        <span class="text-gray-600">{{ $empleado->Obras()->whereIn('EstadoObra',['Sin Iniciar','Activa'])->get()->count() }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Correo Electrónico</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->CorreoUsuario }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Número Documento</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->NumeroDocumento }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Tipo de Documento</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->TipoIdentificacion?$empleado->TipoIdentificacion->TipoIdentificacion:'' }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Número de Celular</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->NumeCelular }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Número de Teléfono</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->NumTelefono }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Fecha de Nacimiento</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->FechaNacimientoU }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Genero</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->GeneroUsuario }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Estado Civil</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->EstadoCivil?$empleado->EstadoCivil->EstadoCivil:'' }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Dirección</h6>
                                        </div>
                                        <div class="col-sm-9 text-gray-600">
                                            {{ $empleado->DireccionUsuario }}
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="row">
                                        <div class="col-sm-12 pr-0">
                                            <div class="float-right text-right">
                                                <span class="text-gray-500"><strong>Usuario Creado en: </strong><br>{{ $empleado?date('d-m-Y h:i A', strtotime($empleado->created_at)) :'-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#ShowEmpleado')">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

