@section('css')
<style>
</style>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endsection

<div>
    <div>
        @include('livewire.calendar.create')
    </div>

    {{-- {{ $obra }} <br /> --}}
    <div id='calendar-container' wire:ignore>
        <div id='calendar'></div>
    </div>
</div>

@push('jss')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/main.min.js"></script>
    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.9.0/locales-all.js"></script>

    <script>
        document.addEventListener('livewire:load', function() {
            // var Draggable = FullCalendar.Draggable;
            var calendarEl = document.getElementById('calendar');
            let form = document.getElementById("form-act");
            var checkbox = document.getElementById('drop-remove');

            var data =   @this.eventos;    //datos desde lw controller
            console.log(data);

            // CALENDARIO

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale:"es",
                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                headerToolbar:{
                    left: 'prev,next today',
                    center: 'title',
                    right:
                    'dayGridMonth,timeGridWeek,timeGridDay,listWeek,resourceTimelineWeek'
                },
                aspectRatio: 1.8,
                expandRows: true,

                editable: true,
                selectable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                // displayEventTime: false,
                eventTimeFormat: { // like '14:30:00'
                    hour: '2-digit',
                    minute: '2-digit',
                    // second: '2-digit',
                    hour12: true
                },

                navLinks: true, // can click day/week names to navigate views
                buttonText: {
                    resourceTimelineWeek:'Actividades'
                },

                eventSources: [
                    {
                        events: JSON.parse(data),
                        // method: 'GET',  //para sacar los eventos de url
                        color: 'rgb(169 208 144)',
                        borderColor: 'rgb(112 177 68)',
                        textColor: 'black' // a non-ajax option
                    }
                ],

                dateClick: function(info){

                    // window.livewire.emit('create');
                    form.reset();

                    var date = new Date(Date.parse(info.dateStr)).toISOString().slice(0,16)
                    form.start.value = date;
                    form.end.value = date;

                    $('#evento').modal("show");
                },

                eventClick: function (info){
                    var evento = info.event;
                    // console.log(URLp)
                    axios.get(URLp+"/calendar/"+evento.id+"/edit").then(    //acceder a una url
                    // $('#evento').modal("show");
                    // axios.get(@this.getEvent(evento.id)).then(
                    (repuesta) => {
                        // console.log(respuesta)
                        $('#evento').modal("show");
                        form.id.value = repuesta.data.id;
                        form.title.value = repuesta.data.title;
                        form.description.value = repuesta.data.DescripcionActividad;
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
                },

        //     dateClick(info)  {
        //        var title = prompt('Enter Event Title');
        //        var date = new Date(info.dateStr + 'T00:00:00');
        //        if(title != null && title != ''){
        //          calendar.addEvent({
        //             title: title,
        //             start: date,
        //             allDay: true
        //           });
        //          var eventAdd = {title: title,start: date};
        //          @this.addevent(eventAdd);
        //          alert('Great. Now, update your database...');
        //        }else{
        //         alert('Event Title Is Required');
        //        }
        //     },
        //     droppable: true, // this allows things to be dropped onto the calendar
        //     drop: function(info) {
        //         // is the "remove after drop" checkbox checked?
        //         if (checkbox.checked) {
        //         // if so, remove the element from the "Draggable Events" list
        //         info.draggedEl.parentNode.removeChild(info.draggedEl);
        //         }
        //     },
        //     eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
        //     loading: function(isLoading) {
        //             if (!isLoading) {
        //                 // Reset custom events
        //                 this.getEvents().forEach(function(e){
        //                     if (e.source === null) {
        //                         e.remove();
        //                     }
        //                 });
        //             }
        //         }
            });
            calendar.render();
            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });
        });


        //functions
        $("#btnSave").on('click',function(){
        const datos = new FormData(form);
        console.log(datos);
        axios.post(URLp+"/calendar/", datos).then(    //acceder a una url
            (repuesta) => {
                // calendar.refetchEvents();  // actualizar el calendario
                $('#evento').modal("hide");
                $("#calendar").fullCalendar('renderEvents', { id:id, title:title, fase_tarea_id: resourceId, start:start, end:end, fase_tarea_id: fase_tarea_id, estado_actividad_id: estado_actividad_id, obra_id:obra_id});
        }). catch(
            error => {
                if(error.response){
                    console.log(error.response.data);
                }
            }
        )
    });

    </script>
@endpush
