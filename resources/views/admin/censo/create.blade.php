@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
<h1>Crear Datos básicos</h1>
@stop

@section('content')



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

            <select id="user_id" name="user_id" class="selectpicker" data-live-search="true">

                <option selected hidden>Seleccionar</option>
                @foreach ($user as $users)
                <option data-subtext='{{$users->Num_identificacion}}' value="{{ $users->id }}">{{ $users->nombre}}
                </option>
                @endforeach


            </select>
        </div>
        <div class="form-group">

            {!! Form::label('barrio', 'Barrio/Vereda') !!}


            <select name="barrio" class="form-control">
                <option selected hidden>Seleccionar</option>
                @foreach($barrios as $bar)
                <option value="{{$bar->id}}">{{$bar->name}}</option>
                @endforeach
            </select>

        </div>



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
                    <option>Ninguno</option>
                    <option>Familias en Accion</option>
                    <option>Jovenes en Accion</option>
                    <option>Adulto Mayor</option>
                    <option>Otro</option>
                </select>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('sisben', 'Puntaje Sisben') !!}



                </label>
                {{-- {{ Form::text('sisben', Input::old('sisben'), ['class'=> 'form-input mt-1 block w-full']) }} --}}
                    <select  name="sisben"class="selectpicker" data-container="body" data-live-search="true">
                        <option selected hidden> Seleccionar </option>
                        <optgroup label="Grupo A" data-subtext="Pobreza extrema">
                            <option>A1</option>
                            <option>A2</option>
                            <option>A3</option>
                            <option>A4</option>
                            <option>A5</option>                           
                        </optgroup>
                        <optgroup label="Grupo B" data-subtext="Pobreza moderada">
                            <option>B1</option>
                            <option>B2</option>
                            <option>B3</option>
                            <option>B4</option>
                            <option>B5</option>                           
                            <option>B6</option>                           
                            <option>B7</option>                           
                        </optgroup>
                        <optgroup label="Grupo C" data-subtext="Vulnerable">
                            <option>C1</option>
                            <option>C2</option>
                            <option>C3</option>
                            <option>C4</option>
                            <option>C5</option>                           
                            <option>C6</option>                           
                            <option>C7</option>                           
                            <option>C8</option>                           
                            <option>C9</option>                           
                            <option>C10</option>                           
                            <option>C11</option>                           
                            <option>C12</option>                           
                            <option>C13</option>                           
                            <option>C14</option>                           
                            <option>C15</option>                           
                            <option>C16</option>                           
                            <option>C17</option>                           
                            <option>C18</option>                           
                        </optgroup>
                        <optgroup label="Grupo D" data-subtext="No pobre, No vulnerable">
                            <option>D1</option>
                            <option>D2</option>
                            <option>D3</option>
                            <option>D4</option>
                            <option>D5</option>                           
                            <option>D6</option>                           
                            <option>D7</option>                           
                            <option>D8</option>                           
                            <option>D9</option>                           
                            <option>D10</option>                           
                            <option>D11</option>                           
                            <option>D12</option>                           
                            <option>D13</option>                           
                            <option>D14</option>                           
                            <option>D15</option>                           
                            <option>D16</option>                           
                            <option>D17</option>                           
                            <option>D18</option>                            
                            <option>D19</option>                            
                            <option>D20</option>                            
                            <option>D21</option>                            
                        </optgroup>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@stop

@section('js')

<script>
    $('#tipo_vivienda').on('change', function () {
        $("#escrituras").val($('#tipo_vivienda option:selected').attr('escrituras'));
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
@if (session('error'))
<script>
    var session = '{{session('
    error ')}}';
    Swal.fire(
        'Error',
        session,
        'error'
    )

</script>
@endif
<script>
    $(function () {
        $('#user').selectpicker();
    });

</script>

@endsection
