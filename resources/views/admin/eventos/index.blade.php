@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>index</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div id='calendar'></div>
        </div>
    </div>
@stop

@section('css')
    <link href='{{asset('vendor/fullcalendar/main.css')}}' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    
@stop

@section('js')
    <script src='{{asset('vendor/fullcalendar/main.js')}}'></script>>
    <script src='{{asset('vendor/fullcalendar/locales/es.js')}}'></script>>
    <script>
        $(function(){
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                themeSystem: 'bootstrap',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
 
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    console.log(arg);
                 /*var title = prompt('Event Title:');
                    if (title) {
                    calendar.addEvent({
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                        })
                    }*/
                    calendar.unselect()
                },
            });

            calendar.render();
        })
    </script>
@stop