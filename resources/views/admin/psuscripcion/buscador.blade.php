@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Certificados para afiliados</h1>
@stop

@section('content')
    <div class="card">
        @if ($users)
            <div class="card-header">
                <a class="btn btn-danger float-right" href="{{route('admin.psuscripcion.index')}}"><i class="fas fa-window-close"></i></a>
                <form action="{{route('admin.psuscripcion.certificado')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">seleccione la identificacion del afiliado:</label><br>
                                <select id="user" name="usuario" class="selectpicker" data-live-search="true" >
                                    <option selected>Seleccione...</option>
                                    @foreach ($users as $user)
                                        <option value={{$user->user_id}} >{{$user->Num_identificacion}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success" ><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
        <div class="card-body">
            {!! Form::open(['route' => 'admin.psuscripcion.generarcer']) !!}
                @include('admin.psuscripcion.partial.info')
                
                {!! Form::submit('Crear certificado', ['class' => 'btn btn-primary','target'=>'_blank']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
 
@stop
@section('footer')
    <div class="text-center">
        <strong> 
            Copyright © 2021 
            <a href="/">Asojuntas</a>.
        </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-block">
            <b>Version</b>
            1.0
        </div>
    </div>
@stop

@section('css') 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@stop

@section('js')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $(function() {
            $('#user').selectpicker();
        });
    </script>
    @if (session('error'))
    <script>
        var session = '{{session('error')}}';
        Swal.fire(
        'Error',
        session ,
        'error'
        )
    </script>
    @endif
@stop
