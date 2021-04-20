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

        {!! Form::model($beneficiarios, ['route' => ['admin.beneficiarios.update', $beneficiarios], 'method' => 'put'])
        !!}

        <div class="form-group">
            <label>Nombre</label>
            <input required value="{{ $beneficiarios->name }}" name="name" class="form-control " type="text"
                placeholder="Nombre" />
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

                        <option @if ( $beneficiarios->tipo_doc == 'R.C') selected="selected" @endif>R.C</option>
                        <option @if ( $beneficiarios->tipo_doc == 'T.I') selected="selected" @endif>T.I</option>
                        <option @if ( $beneficiarios->tipo_doc == 'C.C') selected="selected" @endif>C.C</option>
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

                        <option @if ( $beneficiarios->nivel_edu == 'Ninguna') selected="selected" @endif>Ninguna
                        </option>
                        <option @if ( $beneficiarios->nivel_edu == 'Primaria') selected="selected" @endif>Primaria
                        </option>
                        <option @if ( $beneficiarios->nivel_edu == 'Secundaria') selected="selected" @endif>Secundaria
                        </option>
                        <option @if ( $beneficiarios->nivel_edu == 'Universidad') selected="selected" @endif>Universidad
                        </option>
                    </select>
                </div>
            </div>
            {!! Form::submit('Actualizar Beneficiario', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
<a class="btn btn-secondary" href="{{route('admin.beneficiarios.index')}}">Volver</a>


{{-- Modal Informacion de las discapacidades --}}




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Información Discapacidades</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title">Discapacidad Física</h4>
                <p>Las personas con discapacidad física son aquellas que presentan una disminución importante en las
                    capacidades de movimiento de una o varias partes del cuerpo. Puede referirse a la disminución o
                    incoordinación del movimiento, trastornos en el tono muscular o trastornos del equilibrio.</p>
                <h4 class="modal-title">Discapacidad Sensorial</h4>

                <p> La discapacidad sensorial hace referencia a la existencia de limitaciones derivadas de la existencia
                    de deficiencias en alguno de los sentidos
                    que nos permiten percibir el medio sea externo o interno. Existen alteraciones en todos los
                    sentidos, si bien las más conocidas son la
                    discapacidad visual y la auditiva.</p>
                <h4 class="modal-title"> Discapacidad Intelectual</h4>

                <p> Discapacidad intelectual se define como toda aquella limitación del funcionamiento intelectual que
                    dificulta la participación social o el
                    desarrollo de la autonomía o de ámbitos como el académico o el laboral, poseyendo un CI inferior a
                    70 y influyendo en diferentes habilidades
                    cognitivas y en la participación social. Existen diferentes grados de discapacidad intelectual, los
                    cuales tienen diferentes implicaciones a
                    nivel del tipo de dificultades que pueden presentar.</p>

                <h4 class="modal-title"> Discapacidad Psíquica</h4>

                <p>Hablamos de discapacidad psíquica cuando estamos ante una situación en que se presentan alteraciones
                    de tipo conductual y del
                    comportamiento adaptativo, generalmente derivadas del padecimiento de algún tipo de trastorno
                    mental. </p>
                <h4 class="modal-title"> Discapacidad Visceral</h4>

                <p>Este poco conocido tipo de discapacidad aparece en aquellas personas que padecen algún tipo de
                    deficiencia en alguno de sus órganos, la cual
                    genera limitaciones en la vida y participación en comunidad del sujeto. Es el caso de las que pueden
                    generar la diabetes o los problemas
                    cardíacos.</p>
                <h4 class="modal-title"> Discapacidad Múltiple</h4>

                <p> Este tipo de discapacidad es la que se deriva de una combinación de limitaciones derivadas de
                    algunas de
                    las anteriores deficiencias. Por
                    ejemplo, un sujeto ciego y con discapacidad intelectual, o de un sujeto parapléjico con sordera.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
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
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@endsection
