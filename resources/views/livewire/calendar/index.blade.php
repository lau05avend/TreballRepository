@section('css')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endsection

<div>
    <div>
        <div>
            @can('calendario_create')
                @include('funcionalidades.calendar.create')
            @endcan
            @include('livewire.calendar.modalAsk')
            @can('calendario_show')
                @include('livewire.calendar.show')
            @endcan
            @can('calendario_edit')
                @include('livewire.calendar.asignarEmpl')
            @endcan
        </div>

        <div class="float-left" style="margin-top: -62px;">
            <button type="button" class="btn btn-outline-dark" id="OpenSelectO" data-toggle="tooltip" data-placement="right" title="Consultar otra obra">
                <i class="fas fa-random" style="font-size: 13px !important;"></i>
                <span class="text-sm">Cambiar obra</span>
            </button>
        </div>
        <div class="card p">
            <div class="card-header justify-center">
                <div class="mt-4 mb-9 text-center">
                    <span class="text-4xl w-full text-gray-900 mt-4">Cronograma de Actividades</span><br>
                    <span class="text-2xl w-full text-gray-900 mb-10 mt-2">{{ $obra_->NombreObra }}</span>
                </div>
            </div>
            <div class="card-body">
                {{-- <div style="width:350px;">
                    <x-select2 class="inpt form-control" id="selectObra" wire:ignore name="selectObra" :options="$obrasdisp"></x-select2>
                </div> --}}
                <div class="mb-9 position-relative" wire:ignore>
                    <div id="loading">
                        <span>CARGANDO...</span>
                    </div>

                    @can('CreateActividad',[App\Models\Actividad::class,$obra_->id ] )
                        <button class="btn btn-outline-dark position-absolute -top-14 right-0" id="newActividad">
                            <span class="text-base">Agregar Actividad</span>
                            <i class="ion-android-add-circle" style="font-size:19px; margin-left:4px"></i>
                        </button>
                    @endcan

                    <div id="calendar"></div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('jss')
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            $('#OpenSelectO').on('click', function(){
                $('#staticBackdrop').modal('show');
            })

            if(obraModal != null){
                $('#staticBackdrop').modal('show');
            }

            var createPermissions = false;

            function getData(url){
                var xhReq = new XMLHttpRequest();
                xhReq.open("GET", url, false);
                xhReq.send(null);
                return JSON.parse(xhReq.responseText);
            }
            var attr = [];

            // ========================= PERMISIONS ============================

            function openCreate() {
                @this.create()
                if(@this.respuestaC){
                    return true;
                }
                else{
                    return false;
                }
            }
            function openEdit() {
                @this.edit()
                if(@this.respuestaE){
                    return true;
                }
                else{
                    return false;
                }
            }

            // ========================= MODAL ============================

            $("#closebtn").on('click',function(){
                $('#CreateEvento').modal("hide");
            });
            $("#close").on('click',function(){
                $('#CreateEvento').modal("hide");
            });

            if( $('#obra_id').val() == "null"){
                    $("#obra_id option[value='null']").remove();
            }

            $("#newActividad").on('click',function(){
                if(openCreate()){
                    form.reset();
                    $('#CreateEvento').modal("show");
                }
            });

            // ========================= CALENDARIO ============================

            let form = document.getElementById("form-act");
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {

                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                locale:"es",
                headerToolbar:{
                    left: 'prev,next today',
                    center: 'title',
                    right:
                    'dayGridMonth,timeGridWeek,timeGridDay,listWeek,resourceTimelineWeek'
                },
                buttonText: {
                    resourceTimelineWeek:'Actividades'
                },
                initialView: 'timeGridWeek',
                resourceAreaHeaderContent: 'Fase',
                nowIndicator: true,
                // aspectRatio: 1.6,
                expandRows: true,
                scrollTime :  "07:00:00",
                scrollTimeReset: false,
                slotMinTime: '06:00:00',
                slotMaxTime: '20:30:00',
                slotDuration: '00:30:00',
                slotLabelInterval: 30,
                eventMaxStack: 2,
                views:{
                    dayGridMonth:{
                        dayHeaderFormat:{ weekday: 'long'},

                    },
                    timeGridDay:{
                        titleFormat: { year: 'numeric', month: 'long', day: 'numeric' }
                    },
                    timeGrid: {
                        dayMaxEventRows: 3 // adjust to 6 only for timeGridWeek/timeGridDay
                    },
                    listWeek:{
                        displayEventTime: true,
                    },
                    resourceTimelineWeek: {
                        slotDuration: '00:30:00',
                        slotLabelInterval: {minutes: 30},
                        eventMaxStack: true,
                        aspectRatio: 1.9,
                        nowIndicator: true,
                    }
                },
                businessHours: {
                    daysOfWeek: [1, 2, 3, 4, 5, 6], // Monday - Friday
                    startTime: '07:00',
                    endTime: '19:00'
                },
                /*validRange:
                    function(currentDate) {
                    // Generate a new date for manipulating in the next step
                    var startDate = new Date(currentDate.valueOf());
                    var endDate = new Date(currentDate.valueOf());

                    // Adjust the start & end dates, respectively
                    startDate.setDate(startDate.getDate() - 1); // One day in the past
                    endDate.setDate(endDate.getDate() + 2); // Two days into the future

                    return { start: startDate, end: endDate };
                }, */

                // allDayText: '',
                displayEventTime: false,
                navLinks: true,
                editable: true,
                selectable: true,
                selectAllow: function(selectInfo){
                    console.log(openCreate())
                    return openCreate();
                },
                eventAllow: function(dropInfo, draggedEvent){
                    console.log(dropInfo)
                    console.log(draggedEvent)
                    return openEdit();
                },
                dayMaxEvents: true,  // allow "more" link when too many events
                eventTimeFormat: { // like '14:30:00'
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: 'short',
                    omitZeroMinute: true,
                    // second: '2-digit',
                    meridiem: false,
                    hour12: true,
                },
                slotLabelFormat:{
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                    },//se visualizara de esta manera 01:00 AM en la columna de horas
                droppable: false, // this allows things to be dropped onto the calendar

                resources: getData(URLp+'/faseall').map(({ id:id, NombreFase:title, DescripcionFase: description }) => ({
                    id,title,description})
                ),
                eventSources: [
                    {
                        events:
                        function (info, successCallback, failureCallback) {
                            $.ajax({
                                url: URLp+'/calendarall/'+numObra,
                                type: 'GET',
                                success: function (response) {
                                    var events = [];
                                    console.log(response);
                                    if (response.length > 0) {
                                        $.each(response, function (i, v) {
                                            events.push({
                                                id: v.id,title: v.title,start: v.start,end: v.end,resourceId: v.fase_tarea_id,estado_actividad_id: v.estado_actividad_id,obra_id: v.obra_id
                                            });
                                        });
                                    } else {
                                        console.log('No hay actividades aún.')
                                    }
                                    return successCallback(events);
                                },
                                error: function (error) {
                                    console.log(error);
                                }
                            })},
                        color: 'rgb(169 208 144)',
                        borderColor: 'rgb(112 177 68)',
                        textColor: 'black', // a non-ajax option
                    }
                ],
                selectMirror: true,
                select: function(start,end){
                    // if(createPermissions){
                        form.reset();
                        // var date = new Date(Date.parse(info.dateStr)).toISOString().slice(0, 16)
                        form.start.value = moment(start.startStr).format('YYYY-MM-DDTHH:mm:ss');
                        form.end.value = moment(start.endStr).format('YYYY-MM-DDTHH:mm:ss');
                        form.obra_id.value = numObra;
                        if(start.resource){
                            form.fase_tarea_id.value = start.resource.id
                        }
                        $('#CreateEvento').modal("show");
                    // }

                //   console.log(start);
                },

                eventClick:function(info){
                    var evento = info.event;
                    axios.get(URLp+'/obras/'+numObra+'/cronograma/'+evento.id).then((eventoE) => {
                        @this.getEvent(evento.id)

                        $('#showActividad').modal('show');
                    }). catch(
                    error => {
                        if(error.response){
                            console.log(error.response.data);
                        }
                    });
                },
                /*function (info){
                    var evento = info.event;
                    // console.log(evento)
                    axios.get(URLp+'/obras/'+numObra+'/cronograma/'+evento.id+"/edit").then((repuesta) => {  //acceder a una url
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
                },*/

                // ========================= OTHER CALENDARIO ============================
                loading: function(bool) {
                    if (bool)
                        $('#loading').show();
                    else
                        $('#loading').hide();
                },
                eventDrop: function(event, delta) {
                    // console.log(event)
                    // console.log(event.title)
                    // console.log(event.event.title + ' was moved ' + event.delta + ' days\n' + '(should probably update your database)');
                    // console.log(event.delta)
                },
            });


            //funciones de eventos

            // ========================= CREAR CALENDARIO ============================

            $("#btnSave").on('click',function(){
                const datos = new FormData(form);

                var ing = datos.getAll("Instalador[]");
                var ins = datos.getAll("Ingeniero[]")
                var empleados = [ ...ing, ...ins ];
                console.log(empleados);

                if( $('#asignUs').is(":checked") ){
                    datos.append('Empleados', JSON.stringify(empleados))
                }

                axios.post(URLp+'/obras/'+numObra+'/cronograma', datos).then(    //acceder a una url
                    (respuesta) => {
                        console.log(respuesta)
                        Livewire.emit('postAdded', respuesta.data);
                        console.log(respuesta.data.created_at)
                        calendar.refetchEvents();  // actualizar el calendario
                        $('#CreateEvento').modal("hide");
                        Swal.fire({
                            title: 'Bien!',
                            text: 'Actividad guardada satisfactoriamente.',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        // $("#calendar").fullCalendar('renderEvents', { id:id, title:title, fase_tarea_id: resourceId, start:start, end:end, fase_tarea_id: fase_tarea_id, estado_actividad_id: estado_actividad_id, obra_id:obra_id});
                }). catch(
                    error => {
                        if(error.response){
                            $.each(error.response.data.errors, function name(attribute,message) {
                                $('#'+attribute+'Message').html(message[0]);

                                attr.push('#'+attribute+'Message');
                            })
                            console.log(error.response.data.errors);
                        }
                    }
                )
            });

            $('.input-event').each(function(){
                $(this).focus(function(){
                    var thisAlert = $(this);
                    // console.log(thisAlert)
                    // console.log(thisAlert[0].id)

                    $('#'+thisAlert[0].id+'Message').html('');
                });
            })


            // ========================= ELIMINAR CALENDARIO ============================

            $("#btnEliminar").on('click',function(){
                const datos = new FormData(form);
                console.log(datos);
                axios.post(URLp+'/obras/'+numObra+'/cronograma'+datos.id+"/delete").then(    //acceder a una url
                    (repuesta) => {
                        calendar.refetchEvents();  // actualizar el calendario
                        $('#CreateEvento').modal("hide");
                }). catch(
                    error => {
                        if(error.response){
                            console.log(error.response.data);
                        }
                    }
                )
            });

            // ========================= ACTUALIZAR CALENDARIO ============================

            $("#btnUpdate").on('click',function(){
                var evento = info.event;
                axios.get(URLp+"/calendar/"+evento.id+"/edit").then(    //acceder a una url
                (repuesta) => {
                    $('#CreateEvento').modal("show");
                    form.id.value = repuesta.data.id;
                    form.title.value = repuesta.data.title;
                    form.description.value = repuesta.data.description;
                    form.start.value = repuesta.data.start;
                    form.end.value = repuesta.data.end;
                    form.estado_actividad_id.value = repuesta.data.estado_actividad_id,
                    form.fase_tarea_id.value = repuesta.data.fase_tarea_id,
                    form.obra_id.value = repuesta.data.obra_id
                }). catch(
                error => {
                    if(error.response){
                        console.log(error.response.data);
                    }
                });
            });


            // ========================= RENDERIZAR CALENDARIO ============================

            calendar.render();
            calendar.refetchEvents();

            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents();
            });


        });

    </script>
    {{-- <script src="{{ asset('js/calendar.js') }}" defer></script> --}}
@endpush
