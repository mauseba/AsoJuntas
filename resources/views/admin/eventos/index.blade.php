@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Calendario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div id='calendar'></div>
        </div>
    </div>

    @include('admin.eventos.create')

@stop

@section('css')
    <link href='{{asset('vendor/fullcalendar/main.css')}}' rel='stylesheet' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/css/bootstrap-multiselect.css" rel="stylesheet">
@stop

@section('js')
    <script src='{{asset('vendor/fullcalendar/main.js')}}'></script>>
    <script src='{{asset('vendor/fullcalendar/locales/es.js')}}'></script>>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone.min.js"></script>

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
                    limpiar();
                    let Fe = moment(arg.start).format('YYYY-MM-DD');
                    let Hi = moment(arg.start).format('HH:mm:ss');
                    let Hf = moment(arg.end).format('HH:mm:ss');
                    
                    $('#txtFecha').val(Fe);
                    $('#txtHoraInicial').val(Hi);
                    $('#txtHoraFinal').val(Hf);

                    $('#btnEditar').prop("disabled",true);
                    $('#btnEliminar').prop("disabled",true);
                    $('#btnGuardar').prop("disabled",false);

                    $('#evento_modal').modal();
                    

                    calendar.unselect();
                },
                eventClick: function(arg) {
                    limpiar();
                    let Fe = moment(arg.event.start).format('YYYY-MM-DD');
                    let Hi = moment(arg.event.start).format('HH:mm:ss');
                    let Hf = moment(arg.event.end).format('HH:mm:ss');
                    
                    $('#txtid').val(arg.event.id);    
                    $('#txtFecha').val(Fe);
                    $('#txtHoraInicial').val(Hi);
                    $('#txtHoraFinal').val(Hf);
                    $('#ddlJuntas').val();
                    $('#txtAsunto').val(arg.event.title);
                    $('#txtDescripcion').val(arg.event.extendedProps.descripcion);

                    $('#btnEditar').prop("disabled",false);
                    $('#btnEliminar').prop("disabled",false);
                    $('#btnGuardar').prop("disabled",true);

                    $('#evento_modal').modal();

                },
                editable: true,
                dayMaxEvents: true,
                events:"{{url('admin/eventos/show')}}"
            });
            
            calendar.render();
            $('#evento_modal').on('hidden.bs.modal', function() { calendar.refetchEvents(); }); 
        })


        $('#btnGuardar').click(function(){
            objEvento=recolectarDatos("POST");
            enviarInformacion(objEvento);
        });

        $('#btnEliminar').click(function(){
            objEvento=recolectarDatos("DELETE");
            editarInformacion('/'+$('#txtid').val(),objEvento);
        });

        $('#btnEditar').click(function(){
            objEvento= recolectarDatos("PATCH");
            editarInformacion('/'+$('#txtid').val(),objEvento);
        });


        function recolectarDatos(method){
            
            nuevoEvento={
                Fecha:$('#txtFecha').val(),
                hora_inicio:$('#txtHoraInicial').val(),
                hora_final:$('#txtHoraFinal').val(),
                juntas:$('#ddlJuntas').val(),
                Asunto:$('#txtAsunto').val(),
                opcion:$('input[name="opcion"]:checked').val(),
                descripcion:$('#txtDescripcion').val(),
                '_token' : $("meta[name='csrf-token']").attr("content"),
                '_method':method
            }

            return(nuevoEvento);
        }

        function enviarInformacion(objEvento){
            $.ajax({
                url: "{{route('admin.eventos.store')}}",
                type: "POST",
                data: objEvento,
                success:function(msg){
                    console.log('no hubo ningun problema');
                    $('#evento_modal').modal('hide'); 
     
                },
                error: function(){alert("Hay un error");}
            })

        }
        
        function editarInformacion(accion,objEvento){

            $.ajax({
                url: "{{url('admin/eventos')}}"+accion,
                type: "POST",
                data: objEvento,
                success:function(msg){
                    console.log('no hubo ningun problema');
                    $('#evento_modal').modal('hide'); 
     
                },
                error: function(){alert("Hay un error");}
            })

        }
         
        function limpiar(){

            $('#txtid').val("")   
            $('#txtFecha').val("");
            $('#txtHoraInicial').val("");
            $('#txtHoraFinal').val("");
            $('#ddlJuntas').val("");
            $('#txtAsunto').val("");
            $('#txtDescripcion').val("");

        }

    </script>
     <script>
        $('#ddlJuntas').multiselect();
    </script>
@stop