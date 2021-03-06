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
    <div class="modal fade" id="evento_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Agregar Evento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="formulario_evento">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Fecha</label>
                                <input type="date" class="form-control" id="txtFecha" name="txtFecha">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Hora inicial</label>
                                <input type="time" class="form-control" id="txtHoraInicial" name="txtHoraInicial">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Hora Final</label>
                                <input type="time" class="form-control" id="txtHoraFinal" name="txtHoraFinal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Juntas</label>
                                <select id="ddlJuntas" class="form-control">
                                    <option value="">Seleccione...</option>
                                    @foreach ($juntas as $junta)
                                        <option value="{{$junta->id}}">{{$junta->Vereda}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Asunto</label>
                                <input type="text" class="form-control" id="txtAsunto" name="txtAsunto">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <p>¿Desea enviar un correo a los participante?</p>
                            <input type="radio" id="1" name="opcion" value="1">
                            <label for="si">Si</label><br>
                            <input type="radio" id="2" name="opcion" value="0">
                            <label for="no">No</label><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="">Descripcion</label>
                            <textarea id="txtDescripcion" class="form-control" name="txtDescripcion" cols="40" rows="10" ></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" id="btnGuardar" >Guardar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
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

                    $('#evento_modal').modal();

                    calendar.unselect();
                },
                eventClick: function(arg) {
                    limpiar();
                    console.log(arg.event.end);
                    let Fe = moment(arg.event.start).format('YYYY-MM-DD');
                    let Hi = moment(arg.event.start).format('HH:mm:ss');
                    let Hf = moment(arg.event.end).format('HH:mm:ss');

                    $('#txtFecha').val(Fe);
                    $('#txtHoraInicial').val(Hi);
                    $('#txtHoraFinal').val(Hf);
                    $('#ddlJuntas').val();
                    $('#txtAsunto').val(arg.event.title);
                    $('#txtDescripcion').val(arg.event.extendedProps.descripcion);
                   

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

            console.log(nuevoEvento['opcion']);

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
        function limpiar(){
            
            $('#txtFecha').val("");
            $('#txtHoraInicial').val("");
            $('#txtHoraFinal').val("");
            $('#ddlJuntas').val("");
            $('#txtAsunto').val("");
            $('#txtDescripcion').val("");

        }

    </script>
@stop