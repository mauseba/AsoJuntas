@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Creacion de Certificados</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <p class="float-left">Usuario: <strong>{{auth()->user()->name}}</strong> </p>
        @can('admin.pcertificado.index')
        <a class="btn btn-danger float-right" href="{{route('admin.pcertificado.index')}}"><i class="fas fa-window-close"></i></a>
        @endcan
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'admin.pcertificado.store', 'autocomplete' => 'off', 'files' => true]) !!}

            @include('admin.pcertificado.partial.form')

            {!! Form::submit('Crear certificado', ['class' => 'btn btn-primary']) !!}
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


@section('js')
@if (session('info'))
<script>
    var session = '{{session('info')}}';
    Swal.fire(
    'Operacion Completada',
    session ,
    'success'
    )
</script>
@endif
<script>
    $(document).ready(function(){
        $('#junta').on('change',function(){
            var nombre= $(this).val();
            if(nombre != ''){
                $.ajax({
                    url: "{{url('admin/pcertificado/nit')}}",
                    type: "POST",
                    data:{
                        name : nombre,
                        '_token' : $("meta[name='csrf-token']").attr("content")   
                    },
                    success:function(msg){
                        $('#nit').empty();
                        $('#resolucion').empty();
                        $('#nit').val(msg['Nit']);
                        $('#resolucion').val(msg['Resolucion']);
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
        });
    });
</script>
@endsection