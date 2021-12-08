<div wire:ignore.self class="modal fade overflow-scroll" id="ShowNovedad" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" style="max-width: 100%;width: 800px;" role="document">
        <div class="modal-content">
            @if ($novedad)
            <div class="card mb-0">
                <div class="btn-toolbar p-3" role="toolbar">
                    <div class="btn-group mr-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-inbox"></i></button>
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="fa fa-exclamation-circle"></i></button>
                        <button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button>
                    </div>
                    <div class="btn-group mr-2 mb-2 mb-sm-0">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-tag"></i> <i class="mdi mdi-chevron-down ml-1"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Updates</a>
                            <a class="dropdown-item" href="#">Social</a>
                            <a class="dropdown-item" href="#">Team Manage</a>
                        </div>
                    </div>

                    <div style="position: absolute;right: 20px;">
                        <button type="button" class="close" wire:click.prevent="cerrarmodal('#ShowNovedad')" aria-label="Close">
                            <span aria-hidden="true close-btn">X</span>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="media mb-4">
                        @if ($novedad->reportadoPor)
                            @php
                                $photo = str_replace('/storage/', '', $novedad->reportadoPor->user->profile_photo_url )
                            @endphp
                            @if (Storage::disk('public')->exists($photo))
                                <img  class="d-flex mr-3 rounded-circle avatar-sm" width="60" src="{{ '/storage/'. $photo }}" alt="#" data-toggle="tooltip" title="" data-original-title="{{ $novedad->reportadoPor->user->name }}">
                            @else
                                <img  class="d-flex mr-3 rounded-circle avatar-sm" src="https://ui-avatars.com/api/?name={{ $novedad->reportadoPor->user->name }}&color=7F9CF5&background=EBF4FF" alt="#" data-toggle="tooltip" title="" data-original-title="{{ $novedad->reportadoPor->user->name }}">
                            @endif
                            <div class="media-body">
                                <h5 class="font-size-14 mt-1">{{ $novedad->reportadoPor?$novedad->reportadoPor->user->name:'' }}</h5>
                                <small class="text-muted">{{ $novedad->reportadoPor?$novedad->reportadoPor->user->email:'' }}</small>
                            </div>
                        @endif
                    </div>

                    <h4 class="mt-1 font-size-16">{{ $novedad->AsuntoNovedad }}</h4>

                    <p>{{ $novedad->DescripcionN }}</p>
                    <hr>
                    <p><strong>Novedad: </strong>{{ $novedad->EstadoNovedad }}</p>
                    <p><strong>Tipo de Novedad: </strong>{{ $novedad->TipoNovedad?$novedad->TipoNovedad->NombreTipoN:'-' }}</p>
                    {{-- {{ $novedad }} --}}

                    <div class="row py-4 px-6">
                        <div class="col-md-12 ">
                            <div class="card pb-4 pt-3">
                                <h5 class="text-center py-2 px-2 mt-2">Información Novedad</h5>
                                <div class="py-2 text-center">
                                    <a href="javascript:void(0);" class="font-weight-medium">Obra: <span>{{ $novedad->Actividad?$novedad->Actividad->Obra->NombreObra:'-' }}</span> </a><br>
                                    <a href="javascript:void(0);" class="font-weight-medium">Actividad: <span>{{ $novedad->Actividad?$novedad->Actividad->title:'-' }}</span> </a>

                                    <br><br>
                                    <a href="javascript:void(0);" class="font-weight-medium">Notificada: <span>{{ $novedad->created_at?$novedad->created_at->diffForHumans():'-' }}</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            @endif

        </div>
    </div>
</div>
