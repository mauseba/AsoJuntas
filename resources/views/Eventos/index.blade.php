<header>
    <link href='{{asset('vendor/fullcalendar/main.css')}}' rel='stylesheet'>
</header>

<body>
    <div class="container py-5 px-13">
        <h1 class="text-4xl text-black text-center leading-8 font-bold mt-2 ">Eventos</h1> <br>
        <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
            <div id='calendar'></div>
        </article>
    </div>
    
    <script language="JavaScript" src='{{asset('vendor/fullcalendar/main.js')}}'></script>
    <script language="JavaScript" src='{{asset('vendor/fullcalendar/locales/es.js')}}'></script>
    <script>
        $(function(){
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: 400,
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },

                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    //
                },
                eventClick: function(arg) {
                    
                /*   let Fe = moment(arg.event.start).format('YYYY-MM-DD');
                    let Hi = moment(arg.event.start).format('HH:mm:ss');
                    let Hf = moment(arg.event.end).format('HH:mm:ss');
                    
                    $('#txtid').val(arg.event.id);    
                    $('#txtFecha').val(Fe);
                    $('#txtHoraInicial').val(Hi);
                    $('#txtHoraFinal').val(Hf);
                    $('#ddlJuntas').val();
                    $('#txtAsunto').val(arg.event.title);
                    $('#txtDescripcion').val(arg.event.extendedProps.descripcion);*/


                },
                editable: true,
                dayMaxEvents: true,
                events:"{{url('/eventos')}}"
            });
            
            calendar.render();
        })
    </script>
</body>


