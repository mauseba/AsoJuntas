@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Crear nueva junta</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

 <div class="card">
        <!-- Nav tabs -->
      <div class="card-header">
          <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Datos Basicos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="men1" href="#menu1">Documentos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="men2" href="#menu2">Observaciones</a>
              </li>
          </ul>
      </div>
        
      <div class="card-body">
              {!! Form::open(['route' => 'admin.juntas.store', 'autocomplete' => 'off', 'files' => true]) !!}
  
                  @include('admin.juntas.partials.form')
  
              {!! Form::close() !!}         
      </div>
      <div class="card-footer">
          @if (session('info'))
            <div class="d-flex">
                <a class="btn btn-secondary ml-auto" href="{{route('admin.userjun.create')}}" role="button">Siguiente</a>
              </div>
          @endif
      </div>
 </div>
@stop

@section('css')
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(function() {
    $( "#btns" ).click(function() {
      $( "#men1" ).show("fast");
    });
  });
</script>
@stop