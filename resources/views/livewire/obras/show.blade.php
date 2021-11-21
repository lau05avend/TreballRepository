<div wire:ignore.self class="modal fade overflow-y-auto" id="showModel" data-backdrop="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog showo" role="document">
        <div class="modal-content">
            <div class="modal-header pl-4 py-4">

                {{-- {{ $obra }} --}}
                <p class="modal-title display-6 ml-2 max-w-md text-3xl float-left" id="exampleModalLabel">Obra: {{ $obra?$obra->NombreObra:'' }}</p>

                <div class="float-right w-72 text-right">
                    <p><strong>Actualizada en: </strong><br>{{ $obra?date('d/m/Y h:i:s A', strtotime($obra->updated_at )) :'-' }}</p>
                </div>
                <button type="button" class="close float-right" wire:click.prevent="cerrarmodal('#showModel')" aria-label="Close">
                     <span aria-hidden="true close-btn" class=" text-2xl">x</span>
                </button>
            </div>
           <div class="modal-body">
               <div>
                   <p class="float-right text-xl"><strong>Obra {{ $obra?$obra->EstadoObra:'' }}</strong></p><br><br>
                   <p><strong>Tipo Obra: </strong>{{ $obra?$obra->TipoObra->TipoObra:'' }}</p>
                   <p><strong>Cliente: </strong>{{ $obra?$obra->cliente->NombreCC:'' }}</p>
                   <p><strong>Dirección Obra: </strong> {{ $obra?$obra->DireccionObra:'' }} </p>
                   <p><strong>Ciudad Obra: </strong> {{ $obra?$obra->City->ciudad:'' }}</p>
                   @if ($obra && $obra->isActive == 'Inactive')
                   <p><strong>Estado Obra: </strong> {{ $obra?$obra->isActive:'' }}</p>
                   @endif

                   <div class="mt-5 dirbottom">
                       <h4>Imagenes de Obra</h4>
                       <div class="flex flex-wrap">
                           @forelse ($obra->Images as $img)
                            {{-- {{ $img }} --}}
                            <div class="w-32 m-4">
                                <img class="cursor-pointer" src="{{ '/storage/'. $img->archivo }}" alt="img">
                            </div>
                            @empty
                                <p>NO HAY IMAGENES ASIGNADAS</p>
                            @endforelse
                       </div>
                       {{-- {{ $obra?$obra->Images:''}} --}}
                   </div>

                   <div class="mt-5 px-6 dirbottom">
                        <h5 class="text-center mb-5">DETALLES ESTADO DEL SUELO</h5>
                        <p class="float-right mr-6"><strong>Verificación: </strong>{{ $obra?$obra->EstadoVerificacion?'Aprobado':'Pendiente':'' }}</p><br><br>
                        <p><strong>Tipo Material Suelo: </strong> {{ $obra?$obra->TipoMaterialSuelo:'' }}</p>
                        <p><strong>Medida Área (m2): </strong>{{ $obra?$obra->MedidaArea:'' }} </p>
                        <p><strong>Medida Perimetro (m): </strong>{{ $obra?$obra->MedidaPerimetro:'' }}</p>
                        <p><strong>Condición de Desnivel (%): </strong>{{ $obra?$obra->CondicionDesnivel:'' }}</p>
                        <p><strong>Detalle del Condición Suelo</strong><br>{{ $obra?$obra->DetalleCondicionPiso:'' }}</p>
                        <p><strong>Datos Adicionales: </strong><br>{{ $obra?$obra->DatosAdicionales:'' }}</p><br><br>
                   </div>
                   <div class="mt-5 px-10 mb-3 dirbottom">
                        <h5 class="text-center mb-5 ">Empleados Asignados</h5>
                        <ul class="list-disc list-us">
                            @if ($users)
                                @forelse ($users as $u)
                                    <li>{{ $u->id.'. '.$u->NombreCompleto }}: <strong>{{$u->Rol->NombreRol}}</strong></li>
                                @empty
                                    <li><strong>NO HAY USUARIOS ASIGNADOS AÚN</strong> </li>
                                @endforelse
                            @else
                            @endif
                            {{-- {{$users}} --}}
                        </ul>
                        <br><br>
                   </div>
               </div>
               @canany(['obra_edit','obra_delete'])
                <div class="justify-center flex-wrap flex mt-12">
                    <a type="button" href="{{ route('obra.edit', $obra?$obra->id:'' ) }}"  id="fdionm" class="bg-yellow-300 rounded-lg py-2 mr-8 px-4 text-gray-50 w-28 text-md hover:text-white font-semibold close-modal">EDITAR</a>
                    @if ($obra->isActive == 'Active')
                    <button type="button" wire:click="delete({{$obra}})" id="fdionm" class="bg-red-500 rounded-lg py-2 px-4 text-gray-50 w-28 text-md font-semibold close-modal">ELIMINAR</button>
                    @else
                    <button type="button" wire:click="delete({{$obra}})" id="fdionm" class="bg-red-500 rounded-lg py-2 px-4 text-gray-50 w-28 text-md font-semibold close-modal">ACTIVAR</button>
                    @endif
                </div>
               @endcanany
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" wire:click.prevent="cerrarmodal('#showModel')" >Close</button>
            </div>
        </div>
    </div>
</div>
@can('obra_delete')
    @if ($openModal)
    <x-delete>
        <x-slot name="title">{{$obra->isActive == 'Active'?'Eliminar':'Activar '}} Obra</x-slot>
        <x-slot name="body">
            @if ($obra->isActive == 'Active')
                <p>¿Esta seguro que desea eliminar el registro {{ $obra->id }} ?</p>
            @else
                <p>¿Esta seguro que desea activar el registro {{ $obra->id }} ?</p>
            @endif
        </x-slot>
        <x-slot name="method">
            @if ($obra->isActive=='Active')
            <button type="button" class="btn btn-danger close-modal" wire:click.prevent="deleteConfirm({{$obra->id}})" >Yes, Delete</button>
            @else
            <button type="button" class="btn btn-danger close-modal" wire:click.prevent="activeConfirm({{$obra->id}})" >Yes, Activar</button>
            @endif
        </x-slot>

    </x-delete>
    @endif
@endcan

