@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar Junta de Accion Comunal</h1>
@stop

@section('content')

<div class="card">
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
        {!! Form::model( $junta,['route' => ['admin.juntas.update', $junta], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            @include('admin.juntas.partials.form2')

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
<style>
    .image-wrapper{
             position: relative;
             padding-bottom: 30%;
         }
 
         .image-wrapper img{
             position: absolute;
             object-fit: cover;
             width: 30%;
             height: 100%;
         }
 </style>
@stop

@section('js')
<script>
        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>
 
@stop