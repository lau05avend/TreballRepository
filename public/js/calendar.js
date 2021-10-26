document.addEventListener('DOMContentLoaded', function() {

    function getData(url){
        var xhReq = new XMLHttpRequest();
        xhReq.open("GET", url, false);
        xhReq.send(null);
        return JSON.parse(xhReq.responseText);
    }
    var a =  getData(URLp+'/calendarall').map(({ id:id, title:title, fase_tarea_id: resourceId, start:start, end:end,  fase_tarea_id: fase_tarea_id, estado_actividad_id: estado_actividad_id, obra_id:obra_id }) => ({
            id, title, resourceId, start, end,  fase_tarea_id, estado_actividad_id, obra_id
        })
    );
    console.log(a);


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
        initialView: 'resourceTimelineWeek',
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
        minTime: "07:00",
        maxTime: "20:30",
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
            listWeek:{
                displayEventTime: true,
            }
        },
        businessHours: {
            dow: [1, 2, 3, 4, 5, 6], // Monday - Friday
            start: '07:00',
            end: '19:00'
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
                events: getData(URLp+'/calendarall').map(({ id:id, title:title, fase_tarea_id: resourceId, start:start, end:end, fase_tarea_id: fase_tarea_id, estado_actividad_id: estado_actividad_id, obra_id:obra_id }) => ({
                    id,
                    title,
                    resourceId,
                    start,
                    end,
                    estado_actividad_id,
                    fase_tarea_id,
                    obra_id
                })
                ),
                method: 'GET',
                color: 'rgb(169 208 144)',
                borderColor: 'rgb(112 177 68)',
                textColor: 'black' // a non-ajax option
            }
        ],
        select:
      function(start,end){
          console.log(start);
          console.log(end);
          // var selDate = new Date(start);
          // add your function
    },

        dateClick: function(info){
            form.reset();

            var date = new Date(Date.parse(info.dateStr)).toDateString().slice(0, 16)
            console.log(info)
            console.log(date)
            form.start.value = date;
            form.end.value = date;

            $('#evento').modal("show");
        },
        eventClick:function (info){
            var evento = info.event;
            axios.get(URLp+"/calendar/"+evento.id+"/edit").then((repuesta) => {  //acceder a una url
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
            alert(event.title + ' was moved ' + delta + ' days\n' + '(should probably update your database)');
        },
    });


    //funciones de eventos

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
    $("#btnEliminar").on('click',function(){
        const datos = new FormData(form);
        axios.post(URLp+"/calendar/"+datos.id+"/delete").then(    //acceder a una url
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


});
