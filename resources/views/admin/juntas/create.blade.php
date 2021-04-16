@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Nota</strong> Procure cerciorarse en llenar todos los campos en cada pestaña, o no se guardaran los datos.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <h1>Crear nueva junta</h1>
@stop

@section('content')

 <div class="card">
        <!-- Nav tabs -->
      <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs" role="tablist">
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
 </div>
@stop

@section('css')
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@if (session('info'))
    <script>
      var session = '{{session('info')}}';
      Swal.fire({
      title: 'Operacion Completada',
      type: 'info',
      text: session,
      html:
      '<a class="btn btn-warning" href="{{route('admin.userjun.create')}}" role="button">Registrar Usuarios</a>',
      confirmButtonText:'<i class="fas fa-angle-double-left"></i> Volver',
      confirmButtonAriaLabel: 'Thumbs up, Volver'
    })
</script>
@endif

@stop