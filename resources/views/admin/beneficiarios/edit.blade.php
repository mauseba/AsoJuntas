@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
<h1>Editar Beneficiario</h1>
@stop

@section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>



<div class="card">
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {!! Form::model($beneficiarios, ['route' => ['admin.beneficiarios.update', $beneficiarios], 'method' => 'put'])
        !!}
        <div class="form-group">
            <label> Afiliado:</label>
         <h4> {{ $beneficiarios->nombre}}</h4>
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input required value="{{ $beneficiarios->name }}" name="name" class="form-control " type="text"
                placeholder="Nombre" pattern="[A-Za-z]{1,45}"/>
        </div>
        <div class="row">
            <div class="form-group col">
                <label>Nucleo Familiar</label>
                <select name="nucleo_fam" class="form-control ">

                    <option @if ( $beneficiarios->nucleo_fam == 'Conyuge') selected="selected" @endif
                        value="Conyuge">Conyuge</option>
                    <option @if ( $beneficiarios->nucleo_fam == 'Hijo/a') selected="selected" @endif
                        value="Hijo/a">Hijo/a</option>
                    <option @if ( $beneficiarios->nucleo_fam == 'Padre/Madre') selected="selected" @endif
                        value="Padre/Madre">Padre/Madre</option>

                </select>
            </div>
            <div class="form-group col">
                <label>Subsidio del Gobierno</label>
                <select name="sub_gobierno"
                    class="form-control">
                    <option @if ( $beneficiarios->sub_gobierno == 'Ninguno') selected="selected"
                        @endif >Ninguno</option>
                    <option @if ( $beneficiarios->sub_gobierno == 'Familias en Accion') selected="selected"
                        @endif>Familias en Accion</option>
                    <option @if ( $beneficiarios->sub_gobierno == 'Jovenes en Accion') selected="selected"
                        @endif>Jovenes en Accion</option>
                    <option @if ( $beneficiarios->sub_gobierno == 'Adulto Mayor') selected="selected"
                        @endif>Adulto Mayor</option>
                    <option @if ( $beneficiarios->sub_gobierno == 'Otro') selected="selected"
                        @endif>Otro</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label> Tipo de Documento</label>
                <div class="relative inline-block text-gray-700">
                    <select name="tipo_doc" class="form-control ">
                        <option @if ( $beneficiarios->tipo_doc == 'Ninguna') selected="selected" @endif>Ninguna</option>
                        @foreach ($doc as $do)
                        <option @if ( $beneficiarios->tipo_doc == $do->tipo) selected="selected"
                            @endif>{{$do->nombre}} </option>
                        @endforeach
                        {{-- <option @if ( $beneficiarios->tipo_doc == 'C.E') selected="selected" @endif>C.E</option> --}}
                    </select>
                </div>
            </div>

            <div class="form-group col-3">
                <label>Número de identificación</label>
                <input required name="numero" value="{{ $beneficiarios->numero }}" class="form-control" type="number"
                    placeholder="Numero" size="10" />

            </div>
            <div class="form-group col-3">
                <label>Edad</label>
                <input required name="edad" value="{{ $beneficiarios->edad }}" class="form-control" type="number"
                    placeholder="Edad" min="1" max="99" />

            </div>
            <div class="form-group col-3">
                <label>
                    Género
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="genero" class="form-control">

                        <option @if ( $beneficiarios->genero == 'M') selected="selected" @endif>M</option>
                        <option @if ( $beneficiarios->genero == 'F') selected="selected" @endif>F</option>
                        <option @if ( $beneficiarios->genero == 'O') selected="selected" @endif>O</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label>
                    Tipo de Afiliación de salud
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="tipo_salud" class="form-control">

                        <option @if ( $beneficiarios->tipo_salud == 'Ninguna') selected="selected" @endif>Ninguna
                        </option>
                        <option @if ( $beneficiarios->tipo_salud == 'Subsidiado') selected="selected" @endif>Subsidiado
                        </option>
                        <option @if ( $beneficiarios->tipo_salud == 'Contributivo') selected="selected"
                            @endif>Contributivo
                        </option>

                    </select>

                </div>
            </div>
            <div class="form-group col-3">
                <label>
                    EPS
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="salud" class="form-control">
                        <option @if ( $beneficiarios->salud == 'Ninguna') selected="selected" @endif>Ninguna</option>
                        @foreach ($eps as $entidad)
                        <option @if ( $beneficiarios->salud == $entidad->name) selected="selected"
                            @endif>{{$entidad->name}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-3">
                <label>
                    Discapacidad <a type="button" class="text-warning" data-toggle="modal"
                        data-target=".bd-example-modal-lg"><i class="fas fa-info-circle"></i> </a>
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="discap" class="form-control">

                        <option @if ( $beneficiarios->discap == 'Ninguna') selected="selected" @endif>Ninguna</option>
                        <option @if ( $beneficiarios->discap == 'Fisica') selected="selected" @endif>Fisica</option>
                        <option @if ( $beneficiarios->discap == 'Intelectual') selected="selected" @endif>Intelectual
                        </option>
                        <option @if ( $beneficiarios->discap == 'Sensorial') selected="selected" @endif>Sensorial
                        </option>
                        <option @if ( $beneficiarios->discap == 'Psiquica') selected="selected" @endif>Psiquica</option>
                        <option @if ( $beneficiarios->discap == 'Viseral') selected="selected" @endif>Viseral</option>
                        <option @if ( $beneficiarios->discap == 'Multiple') selected="selected" @endif>Multiple</option>

                    </select>
                </div>
            </div>
            <div class="form-group col-3">
                <label>
                    Nivel Educativo
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="nivel_edu" class=" my-select form-control">

                        @foreach ($estu as $edu)
                        <option @if ( $beneficiarios->nivel_edu == $edu->tipo) selected="selected"  @endif value="{{ $edu->prefijo }}">{{$edu->nombre}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            {!! Form::submit('Actualizar Beneficiario', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
<a class="btn btn-secondary" href="{{route('admin.beneficiarios.index')}}">Volver</a>

@include('admin.beneficiarios.partials.discapacidades')

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
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
        @if (session('info'))
    <script>
        var session = '{{session('info')}}';
        Swal.fire(
        'Success',
        session ,
        'Success'
        )
    </script>
    @endif

     @if (session('error'))
    <script>
        var session = '{{session('error')}}';
        Swal.fire(
        'Error',
        session ,
        'Error'
        )
    </script>
    @endif
@endsection
