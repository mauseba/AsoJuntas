@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar Publicacion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home">Encabezado de la publicacion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" id="men1" href="#menu1">Foto de la Publicacion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" id="men2" href="#menu2">Cuerpo de la publicacion</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            {!! Form::model($post,['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

                @include('admin.posts.partials.form')

                {!! Form::submit('Actualizar Publicacion', ['class' => 'btn btn-primary']) !!}

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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/translations/es.js"></script>
<script src="{{ asset('js/summernote-es-ES.js') }}"></script>
    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        ClassicEditor
        .create( document.querySelector( '#extract' ),{
             language: {
                 ui: 'es',
                 content: 'es'
             }
        })
        .catch( error => {
            console.error( error );
        } );

        $('#body').summernote({
            height: 400
            lang: 'es-ES' 
        });

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


@endsection