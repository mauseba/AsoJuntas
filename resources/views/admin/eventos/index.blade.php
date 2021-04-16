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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@stop

@section('js')

    <script src='{{asset('vendor/fullcalendar/main.js')}}'></script>>
    <script src='{{asset('vendor/fullcalendar/locales/es.js')}}'></script>>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.33/moment-timezone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


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
                    $("#ddlJuntas").selectpicker("refresh");

                    $('#btnEditar').hide();
                    $('#btnEliminar').hide();
                    $('#btnGuardar').show();

                    $('#evento_modal').modal({backdrop: 'static', keyboard: false});
                    

                    calendar.unselect();
                },
                eventClick: function(arg) {
                    limpiar();
                    let Fe = moment(arg.event.start).format('YYYY-MM-DD');
                    let Hi = moment(arg.event.start).format('HH:mm:ss');
                    let Hf = moment(arg.event.end).format('HH:mm:ss');

                    console.log(arg.event.extendedProps.descripcion);
                    $('#txtid').val(arg.event.id);    
                    $('#txtFecha').val(Fe);
                    $('#txtHoraInicial').val(Hi);
                    $('#txtHoraFinal').val(Hf);
                    $('#ddlJuntas').val();
                    $('#txtAsunto').val(arg.event.title);
                    $('#txtDescripcion').summernote("code", arg.event.extendedProps.descripcion);

                    $('#btnEditar').show();
                    $('#btnEliminar').show();
                    $('#btnGuardar').hide();

                    $('#evento_modal').modal({backdrop: 'static', keyboard: false});

                },
                editable: true,
                dayMaxEvents: true,
                events:"{{url('admin/eventos/show')}}"
            });
            
            calendar.render();
            $('#evento_modal').on('hidden.bs.modal', function() { calendar.refetchEvents(); }); 
        })

        $('#txtDescripcion').summernote({
            height: 300
        });

        $('#ddlJuntas').selectpicker();

        $('#btnGuardar').click(function(){
            objEvento=recolectarDatos("POST");
            enviarInformacion('',objEvento);
        });

        $('#btnEliminar').click(function(){
            objEvento=recolectarDatos("DELETE");
            enviarInformacion('/'+$('#txtid').val(),objEvento);
        });

        $('#btnEditar').click(function(){
            objEvento= recolectarDatos("PATCH");
            enviarInformacion('/'+$('#txtid').val(),objEvento);
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
        
        function enviarInformacion(accion,objEvento){

            $.ajax({
                url: "{{url('admin/eventos')}}"+accion,
                type: "POST",
                data: objEvento,
                success:function(msg){
                    $('#evento_modal').modal('hide'); 
                    Swal.fire(
                    'Operacion Completada',
                    'El evento se creo o modifico con exito' ,
                    'success'
                    )
     
                },
                error: function(){
                    Swal.fire(
                    'Operacion no Completada',
                    'Hubo un error en la operacion' ,
                    'error'
                    )
                }
            })

        }
         
        function limpiar(){

            $('#txtid').val("");   
            $('#txtFecha').val("");
            $('#txtHoraInicial').val("");
            $('#txtHoraFinal').val("");
            $("#ddlJuntas").val('default').selectpicker("refresh");
            $('#txtAsunto').val("");
            $('#txtDescripcion').summernote("reset")

        }

    </script>
@stop