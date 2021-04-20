@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
<h1>Agregar Beneficiario</h1>
@stop

@section('content')
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif

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

        {{ Form::open(['route' => 'admin.beneficiarios.store']) }}

        <div class="form-group">
            {!! Form::label('user_id', 'Afiliado') !!}

            <select id="user_id" name="user_id" class="form-control">
                <option selected hidden>Seleccionar</option>
                @foreach ($user as $users)
                <option value="{{ $users->id }}">{{ $users->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {!! Form::label('nucleo_fam', 'Nucleo Familiar') !!}

            <select id="nucleo_fam" name="nucleo_fam" class="form-control">
                <option selected hidden>Seleccionar</option>
                <option value="Conyuge">Conyuge</option>
                <option value="Hijo/a">Hijo/a</option>
                <option value="Padre/Madre">Padre/Madre</option>
            </select>
        </div>

        <div class="form-group">
            <label>Nombre del Beneficiario</label>
            <input required name="name" class="form-control " type="text" placeholder="Nombre" />
        </div>
        <div class="form-group">
            <label>Subsidio Gobierno</label>
            <select name="sub_gobierno"
                class="form-control">
                <option hidden>Seleccionar</option>
                <option>Ninguno</option>
                <option>Familias en Accion</option>
                <option>Jovenes en Accion</option>
                <option>Adulto Mayor</option>
                <option>Otro</option>
            </select>
        </div>
        <div class="row">
            <div class="form-group col-3">
                <label> Tipo de Documento</label>
                <div class="relative inline-block text-gray-700">
                    <select name="tipo_doc" class="form-control ">
                        <option hidden>Seleccionar</option>
                        <option>R.C</option>
                        <option>T.I</option>
                        <option>C.C</option>
                        {{-- <option >C.E</option> --}}
                    </select>
                </div>
            </div>
            <div class="form-group col-3">
                <label>Número de identificación</label>
                <input required name="numero" class="form-control" type="number" placeholder="Numero" size="10" />

            </div>
            <div class="form-group col-3">
                <label>Edad</label>
                <input required name="edad" class="form-control" type="number" placeholder="Edad" min="1" max="99" />

            </div>
            <div class="form-group  col-3">
                <label>
                    Género
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="genero" class="form-control">

                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O"> Otro</option>
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

                        <option>Ninguna</option>
                        <option>Subsidiado </option>
                        <option>Contributivo </option>

                    </select>

                </div>
            </div>
            <div class="form-group col-3">
                <label>
                    EPS
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="salud" class="form-control">
                        <option>Ninguna</option>
                        @foreach ($eps as $entidad)
                        <option>{{$entidad->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group col-3">
                <label>
                    Discapacidad
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="discap" class="form-control">
                        <option>Ninguna</option>
                        <option>Fisica</option>
                        <option>Intelectual</option>
                        <option>Sensorial</option>
                        <option>Psiquica</option>
                        <option>Viseral</option>
                        <option>Multiple</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-3">
                <label>
                    Nivel Educativo
                </label>
                <div class="relative inline-block text-gray-700">
                    <select name="nivel_edu" class=" my-select form-control">

                        <option>Ninguna</option>
                        <option>Primaria</option>
                        <option>Secundaria </option>
                        <option>Universidad </option>
                    </select>
                </div>

            </div>
        </div>
        <div class="mt-4">
            {!! Form::submit('Agregar Beneficiario', ['class' => 'btn btn-primary ']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

<a class="btn btn-secondary " href="{{route('admin.beneficiarios.index')}}">Volver</a>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@endsection
