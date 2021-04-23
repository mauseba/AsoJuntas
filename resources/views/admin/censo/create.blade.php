@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
<h1>Crear Datos básicos</h1>
@stop

@section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger col-4" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card">
    <div class="card-body">
        {{ Form::open(['route' => 'admin.censo.store']) }}
        <div class="form-group">
                {!! Form::label('user_id', 'Afiliado') !!}

                <select id="user_id" name="user_id" class="form-control" >

                    <option selected hidden>Seleccionar</option>
                    @foreach ($user as $users)
                        <option value="{{ $users->id }}">{{ $users->name}}</option>
                    @endforeach
                   

                </select>
        </div>
        <div class="form-group">

            {!! Form::label('barrio', 'Barrio/Vereda') !!}


            <select name="barrio" class="form-control">
                <option selected hidden>Seleccionar</option>
                @foreach($barrios as $bar)
                <option>{{$bar->name}}</option>
                @endforeach
            </select>

        </div>


        {!! Form::label('direccion', 'Direccion/Finca') !!}


        {{ Form::text('direccion', Input::old('direccion'), ['class'=> 'form-control']) }}

        <div class="row justify-content-center">
            <div class="col-4">
                {!! Form::label('tipo_vivienda', 'Tipo de Vivienda') !!}


                {{-- {{ Form::text('tipo_vivienda', Input::old('tipo_vivienda'), ['class'=> 'form-input mt-1 block w-full'])  }}
                --}}
                <select id="tipo_vivienda" name="tipo_vivienda" class="form-control" onchange="escrituras();">

                    <option selected hidden>Seleccionar</option>
                    <option escrituras="Si">Propia</option>
                    <option escrituras="No">Arriendo</option>
                    <option escrituras="No">Posada</option>

                </select>
            </div>
            <div class="col-4">

                {!! Form::label('escrituras', 'Escrituras/Documentos') !!}


                {{-- {{ Form::text('escrituras', Input::old('escrituras'), ['class'=> 'form-input mt-1 block w-full']) }}
                --}}
                {{-- <select  name="escrituras" class="form-select block  mt-1" disabled>
                  
                                      
                      </select> --}}

                <input id="escrituras" name="escrituras" type="text" class="form-control" disabled>
            </div>
        </div>
        <hr class="pt-6" />
        <label class="form-group">
            Servicios públicos

        </label>

        <div class="row justify-content-start">

            <div class="col-2">
                {!! Form::label('agua', 'Agua') !!}
                <div class=" form-check">
                    <input type="radio" name="agua" value="Si" @if(old('agua')=='Si' ) checked @endif> Si
                    <input type="radio" name="agua" value="No" @if(old('agua')=='No' ) checked @endif> No
                </div>
            </div>
            <div class="col-2">
                {!! Form::label('energia', 'Energia') !!}



                <div class=" form-check">
                    <input type="radio" name="energia" value="Si" @if(old('energia')=='Si' ) checked @endif> Si
                    <input type="radio" name="energia" value="No" @if(old('energia')=='No' ) checked @endif> No
                </div>
            </div>
            <div class="col-2">

                <label class="text-gray-700">
                    {!! Form::label('gas', 'Gas') !!}
                </label>

                <div class="form-check">
                    <input type="radio" name="gas" value="Si" @if(old('gas')=='Si' ) checked @endif> Si
                    <input type="radio" name="gas" value="No" @if(old('gas')=='No' ) checked @endif> No
                </div>
            </div>

            <div class="col-2">

                <label class="text-gray-700">
                    {!! Form::label('alcantarilla', 'Alcantarillado') !!}


                </label>

                <div class=" form-check">
                    <input type="radio" name="alcantarilla" value="Si" @if(old('alcantarilla')=='Si' ) checked @endif>
                    Si
                    <input type="radio" name="alcantarilla" value="No" @if(old('alcantarilla')=='No' ) checked @endif>
                    No
                </div>





            </div>
        </div>
        <hr />

        <div class="row justify-content-start">

            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('sub_vivienda', 'Subsidio de Vivienda') !!}



                </label>

                <div>
                    <input type="radio" name="sub_vivienda" value="Si" @if(old('sub_vivienda')=='Si' ) checked @endif>
                    Si
                    <input type="radio" name="sub_vivienda" value="No" @if(old('sub_vivienda')=='No' ) checked @endif>
                    No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('sub_gobierno', 'Subsidio del gobierno') !!}



                </label>
                {{-- {{ Form::text('sisben', Input::old('sisben'), ['class'=> 'form-input mt-1 block w-full']) }} --}}
                <select name="sub_gobierno" class="form-control ">
                     <option >Ninguno</option>
                    <option  >Familias en Accion</option>
                    <option  >Jovenes en Accion</option>
                    <option  >Adulto Mayor</option>
                    <option  >Otro</option>
                </select>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('sisben', 'Puntaje Sisben') !!}



                </label>
                {{-- {{ Form::text('sisben', Input::old('sisben'), ['class'=> 'form-input mt-1 block w-full']) }} --}}
                <select name="sisben" class="form-control">
                    <option selected hidden > Seleccionar </option>
                    <option>No</option>
                    <option>Grupo A</option>
                    <option>Grupo B</option>
                    <option>Grupo C</option>
                    <option>Grupo D</option>
                </select>
            </div>

        </div>
        <hr class="pt-6" />
        <div class=" pt-6">

            <label class="text-gray-700 pt-6  text font-bold">
                Tipo de mejoramiento

            </label>
        </div>

        {{-- Fila --}}
        <div class="row ">


            {{-- columna --}}
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('piso', 'Piso') !!}



                </label>

                <div class="form-check">
                    <input type="radio" name="piso" value="Si" @if(old('piso')=='Si' ) checked @endif> Si
                    <input type="radio" name="piso" value="No" @if(old('piso')=='No' ) checked @endif> No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('techo', 'Techo') !!}
                </label>

                <div class="form-check">
                    <input type="radio" name="techo" value="Si" @if(old('techo')=='Si' ) checked @endif> Si
                    <input type="radio" name="techo" value="No" @if(old('techo')=='No' ) checked @endif> No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('pañete', 'Pañete') !!}


                </label>


                <div class=" form-check">
                    <input type="radio" name="pañete" value="Si" @if(old('pañete')=='Si' ) checked @endif> Si
                    <input type="radio" name="pañete" value="No" @if(old('pañete')=='No' ) checked @endif> No
                </div>

            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('baños', 'Baños') !!}


                </label>


                <div class=" form-check">
                    <input type="radio" name="baños" value="Si" @if(old('baños')=='Si' ) checked @endif> Si
                    <input type="radio" name="baños" value="No" @if(old('baños')=='No' ) checked @endif> No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('baño_nuevo', 'Baño nuevo') !!}


                </label>

                <div class=" form-check">
                    <input type="radio" name="baño_nuevo" value="Si" @if(old('baño_nuevo')=='Si' ) checked @endif> Si
                    <input type="radio" name="baño_nuevo" value="No" @if(old('baño_nuevo')=='No' ) checked @endif> No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('vivienda_nueva', 'Vivienda Nueva') !!}


                </label>

                <div class=" form-check">
                    <input type="radio" name="vivienda_nueva" value="Si" @if(old('vivienda_nueva')=='Si' ) checked
                        @endif>
                    Si
                    <input type="radio" name="vivienda_nueva" value="No" @if(old('vivienda_nueva')=='No' ) checked
                        @endif>
                    No
                </div>
            </div>


        </div>
        <div class="row mt-4">
            {{ Form::submit('Registrar Censo', ['class'=>'btn btn-success']) }}
        </div>

        {{ Form::close() }}
    </div>
</div>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script>
    $('#tipo_vivienda').on('change', function () {
        $("#escrituras").val($('#tipo_vivienda option:selected').attr('escrituras'));
    });

</script>

@endsection
