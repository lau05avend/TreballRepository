document.addEventListener('DOMContentLoaded', function() {

    

    function getData(url){
        var xhReq = new XMLHttpRequest();
        xhReq.open("GET", url, false);
        xhReq.send(null);
        return JSON.parse(xhReq.responseText);
    }
    var attr = [];

    // =========== Calendario ===========


    // let form = document.querySelector("#form-act");
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
        aspectRatio: 1.8,
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
            timeGridWeek:{
                titleFormat: { year: 'numeric', month: 'long', day: 'numeric' }
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
        // contentHeight: 'auto',
        displayEventTime: false,
        navLinks: true,
        editable: true,
        selectable: true,
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
        droppable: true, // this allows things to be dropped onto the calendar

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
                // getData(URLp+'/calendarall/'+numObra).map(({ id:id, title:title, fase_tarea_id: resourceId, start:start, end:end, fase_tarea_id: fase_tarea_id, estado_actividad_id: estado_actividad_id, obra_id:obra_id }) => ({
                //     id,
                //     title,
                //     resourceId,
                //     start,
                //     end,
                //     estado_actividad_id,
                //     fase_tarea_id,
                //     obra_id
                // })
                // ),
                // method: 'GET',
                color: 'rgb(169 208 144)',
                borderColor: 'rgb(112 177 68)',
                textColor: 'black' // a non-ajax option
            }
        ],
        selectMirror: true,
        select: function(start,end){
            form.reset();
            // var date = new Date(Date.parse(info.dateStr)).toISOString().slice(0, 16)
            form.start.value = moment(start.startStr).format('YYYY-MM-DDTHH:mm:ss');
            form.end.value = moment(start.endStr).format('YYYY-MM-DDTHH:mm:ss');
            form.obra_id.value = numObra;
            if(start.resource){
                form.fase_tarea_id.value = start.resource.id
            }
            $('#evento').modal("show");

        //   console.log(start);
        },

        eventClick:function (info){
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
                $('#evento').modal("show");
            }). catch(
            error => {
                if(error.response){
                    console.log(error.response.data);
                }
            });
        },


        //parra probaaar
        loading: function(bool) {
            if (bool)
                $('#loading').show();
            else
                $('#loading').hide();
        },
        eventDrop: function(event, delta) {
            console.log(event)
            console.log(event.title)
            console.log(event.event.title + ' was moved ' + event.delta + ' days\n' + '(should probably update your database)');
            console.log(event.delta)
        },
    });


    //funciones de eventos

    $("#btnSave").on('click',function(){
        const datos = new FormData(form);
        axios.post(URLp+'/obras/'+numObra+'/cronograma', datos).then(    //acceder a una url
            (respuesta) => {
                console.log(respuesta)
                calendar.refetchEvents();  // actualizar el calendario
                $('#evento').modal("hide");
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
                        // if($('#'+attribute)){

                        // }
                        // else{
                            $('#'+attribute+'Message').html(message[0]);
                        // }
                        attr.push('#'+attribute);
                    })
                    console.log(attr)
                    console.log(error.response.data.errors);
                }
            }
        )
    });
    $(attr).each(function(atrr){
        $(atrr).on('blur', function(){
            // if($(this).val().trim() != "") {
            //     $('#'+attr+'Message').text() = '';
            // }
            alert(this)
        })
    })
    $("#btnEliminar").on('click',function(){
        const datos = new FormData(form);
        axios.post(URLp+'/obras/'+numObra+'/cronograma'+datos.id+"/delete").then(    //acceder a una url
            (repuesta) => {
                calendar.refetchEvents();  // actualizar el calendario
                $('#evento').modal("hide");
        }). catch(
            error => {
                if(error.response){
                    console.log(error.response.data);
                }
            }
        )
    });

    $("#btnUpdate").on('click',function(){
        var evento = info.event;
        axios.get(URLp+"/calendar/"+evento.id+"/edit").then(    //acceder a una url
        (repuesta) => {
            $('#evento').modal("show");
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
    $("#close").on('click',function(){
        $('#evento').modal("hide");
    });
    $("#newActividad").on('click',function(){
        form.reset();
        $('#evento').modal("show");
    });

    calendar.render();
    calendar.refetchEvents();

});
