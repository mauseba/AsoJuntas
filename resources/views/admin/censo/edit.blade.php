@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
<h1>Editar Datos básicos</h1>
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
        {!! Form::model($censo, ['route' => ['admin.censo.update', $censo], 'method' => 'put'])
        !!}
        
        <div class="form-group">
            <label> Afiliado:</label>
          {{ $censo->nombre}}
        </div>
        <div class="form-group">

            {!! Form::label('barrio', 'Barrio/Vereda') !!}


            <select name="barrio" class="form-control">
                
                @foreach($barrios as $bar)
                <option @if ($censo->barrio == $bar->id)   selected @endif value="{{$bar->id}}">{{$bar->name}}</option>
                @endforeach
            </select>

        </div>


        {!! Form::label('direccion', 'Direccion/Finca') !!}


       <input  type="text" class="form-control"  value="{{ $censo->Direccion }}" disabled>

        <div class="row justify-content-center">
            <div class="col-4">
                {!! Form::label('tipo_vivienda', 'Tipo de Vivienda') !!}


                {{-- {{ Form::text('tipo_vivienda', Input::old('tipo_vivienda'), ['class'=> 'form-input mt-1 block w-full'])  }}
                --}}
                <select id="tipo_vivienda" name="tipo_vivienda" class="form-control" onchange="escrituras();">

                    
                    <option @if ($censo->tipo_vivienda == "Propia")   selected @endif escrituras="Si">Propia</option>
                    <option @if ($censo->tipo_vivienda == "Arriendo")   selected @endif escrituras="No">Arriendo</option>
                    <option @if ($censo->tipo_vivienda == "Posada")   selected @endif escrituras="No">Posada</option>

                </select>
            </div>
            <div class="col-4">

                {!! Form::label('escrituras', 'Escrituras/Documentos') !!}


                {{-- {{ Form::text('escrituras', Input::old('escrituras'), ['class'=> 'form-input mt-1 block w-full']) }}
                --}}
                {{-- <select  name="escrituras" class="form-select block  mt-1" disabled>
                  
                                      
                      </select> --}}

                <input id="escrituras" name="escrituras" type="text" class="form-control"  value="{{ $censo->escrituras }}" disabled>
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
                    <input type="radio" name="agua" value="Si" @if( $censo->agua == "Si" ) checked @endif> Si
                    <input type="radio" name="agua" value="No" @if( $censo->agua == "No" ) checked @endif> No
                </div>
            </div>
            <div class="col-2">
                {!! Form::label('energia', 'Energia') !!}



                <div class=" form-check">
                    <input type="radio" name="energia" value="Si" @if( $censo->energia == "Si" ) checked @endif> Si
                    <input type="radio" name="energia" value="No" @if( $censo->energia == "No" ) checked @endif> No
                </div>
            </div>
            <div class="col-2">

                <label class="text-gray-700">
                    {!! Form::label('gas', 'Gas') !!}
                </label>

                <div class="form-check">
                    <input type="radio" name="gas" value="Si" @if( $censo->gas == "Si" ) checked @endif> Si
                    <input type="radio" name="gas" value="No" @if( $censo->gas == "No" ) checked @endif> No
                </div>
            </div>

            <div class="col-2">

                <label class="text-gray-700">
                    {!! Form::label('alcantarilla', 'Alcantarillado') !!}


                </label>

                <div class=" form-check">
                    <input type="radio" name="alcantarilla" value="Si" @if( $censo->alcantarilla == "Si" ) checked @endif>
                    Si
                    <input type="radio" name="alcantarilla" value="No" @if( $censo->alcantarilla == "No" ) checked @endif>
                    No
                </div>





            </div>
        </div>
        <hr />

        <div class="row justify-content-start">

            <div class="col-3">
                <label class="text-gray-700">
                    {!! Form::label('sub_vivienda', 'Subsidio de Vivienda') !!}



                </label>

                <div>
                    <input type="radio" name="sub_vivienda" value="Si" @if( $censo->sub_vivienda == "Si" ) checked @endif>
                    Si
                    <input type="radio" name="sub_vivienda" value="No" @if( $censo->sub_vivienda == "No" ) checked @endif>
                    No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('sub_gobierno', 'Subsidio del gobierno') !!}



                </label>
                {{-- {{ Form::text('sisben', Input::old('sisben'), ['class'=> 'form-input mt-1 block w-full']) }} --}}
                <select name="sub_gobierno" class="form-control ">
                    
                    <option @if($censo->sub_gobierno == "Ninguno") selected @endif>Ninguno</option>
                    <option @if($censo->sub_gobierno == "Familias en Accion") selected @endif>Familias en Accion</option>
                    <option @if($censo->sub_gobierno == "Jovenes en Accion") selected @endif>Jovenes en Accion</option>
                    <option @if($censo->sub_gobierno == "Adulto Mayor") selected @endif>Adulto Mayor</option>
                    <option @if($censo->sub_gobierno == "Otro") selected @endif>Otro</option>
                </select>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('sisben', 'Puntaje Sisben') !!}



                </label>
                {{-- {{ Form::text('sisben', Input::old('sisben'), ['class'=> 'form-input mt-1 block w-full']) }} --}}
                <select  name="sisben"class="selectpicker" data-container="body" data-live-search="true">
                        
                        <optgroup label="Grupo A" data-subtext="Pobreza extrema">
                            <option @if( $censo->sisben == "A1" ) selected @endif>A1</option>
                            <option @if( $censo->sisben == "A2" ) selected @endif>A2</option>
                            <option @if( $censo->sisben == "A3" ) selected @endif>A3</option>
                            <option @if( $censo->sisben == "A4" ) selected @endif>A4</option>
                            <option @if( $censo->sisben == "A5" ) selected @endif>A5</option>                           
                        </optgroup>
                        <optgroup label="Grupo B" data-subtext="Pobreza moderada">
                            <option @if( $censo->sisben == "B1" ) selected @endif>B1</option>
                            <option @if( $censo->sisben == "B2" ) selected @endif>B2</option>
                            <option @if( $censo->sisben == "B3" ) selected @endif>B3</option>
                            <option @if( $censo->sisben == "B4" ) selected @endif>B4</option>
                            <option @if( $censo->sisben == "B5" ) selected @endif>B5</option>                           
                            <option @if( $censo->sisben == "B6" ) selected @endif>B6</option>                           
                            <option @if( $censo->sisben == "B7" ) selected @endif>B7</option>                           
                        </optgroup>
                        <optgroup label="Grupo C" data-subtext="Vulnerable">
                            <option @if( $censo->sisben == "C1" ) selected @endif>C1</option>
                            <option @if( $censo->sisben == "C2" ) selected @endif>C2</option>
                            <option @if( $censo->sisben == "C3" ) selected @endif>C3</option>
                            <option @if( $censo->sisben == "C4" ) selected @endif>C4</option>
                            <option @if( $censo->sisben == "C5" ) selected @endif>C5</option>                           
                            <option @if( $censo->sisben == "C6" ) selected @endif>C6</option>                           
                            <option @if( $censo->sisben == "C7" ) selected @endif>C7</option>                           
                            <option @if( $censo->sisben == "C8" ) selected @endif>C8</option>                           
                            <option @if( $censo->sisben == "C9" ) selected @endif>C9</option>                           
                            <option @if( $censo->sisben == "C10" ) selected @endif>C10</option>                           
                            <option @if( $censo->sisben == "C11" ) selected @endif>C11</option>                           
                            <option @if( $censo->sisben == "C12" ) selected @endif>C12</option>                           
                            <option @if( $censo->sisben == "C13" ) selected @endif>C13</option>                           
                            <option @if( $censo->sisben == "C14" ) selected @endif>C14</option>                           
                            <option @if( $censo->sisben == "C15" ) selected @endif>C15</option>                           
                            <option @if( $censo->sisben == "C16" ) selected @endif>C16</option>                           
                            <option @if( $censo->sisben == "C17" ) selected @endif>C17</option>                           
                            <option @if( $censo->sisben == "C18" ) selected @endif>C18</option>                           
                        </optgroup>
                        <optgroup label="Grupo D" data-subtext="No pobre, No vulnerable">
                            <option @if( $censo->sisben == "D1" ) selected @endif>D1</option>
                            <option @if( $censo->sisben == "D2" ) selected @endif>D2</option>
                            <option @if( $censo->sisben == "D3" ) selected @endif>D3</option>
                            <option @if( $censo->sisben == "D4" ) selected @endif>D4</option>
                            <option @if( $censo->sisben == "D5" ) selected @endif>D5</option>                           
                            <option @if( $censo->sisben == "D6" ) selected @endif>D6</option>                           
                            <option @if( $censo->sisben == "D7" ) selected @endif>D7</option>                           
                            <option @if( $censo->sisben == "D8" ) selected @endif>D8</option>                           
                            <option @if( $censo->sisben == "D9" ) selected @endif>D9</option>                           
                            <option @if( $censo->sisben == "D10" ) selected @endif>D10</option>                           
                            <option @if( $censo->sisben == "D11" ) selected @endif>D11</option>                           
                            <option @if( $censo->sisben == "D12" ) selected @endif>D12</option>                           
                            <option @if( $censo->sisben == "D13" ) selected @endif>D13</option>                           
                            <option @if( $censo->sisben == "D14" ) selected @endif>D14</option>                           
                            <option @if( $censo->sisben == "D15" ) selected @endif>D15</option>                           
                            <option @if( $censo->sisben == "D16" ) selected @endif>D16</option>                           
                            <option @if( $censo->sisben == "D17" ) selected @endif>D17</option>                           
                            <option @if( $censo->sisben == "D18" ) selected @endif>D18</option>                            
                            <option @if( $censo->sisben == "D19" ) selected @endif>D19</option>                            
                            <option @if( $censo->sisben == "D20" ) selected @endif>D20</option>                            
                            <option @if( $censo->sisben == "D21" ) selected @endif>D21</option>                            
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
                    <input type="radio" name="piso" value="Si" @if ($censo->piso == "Si")   checked @endif> Si
                    <input type="radio" name="piso" value="No" @if ($censo->piso == "No")   checked @endif> No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('techo', 'Techo') !!}
                </label>

                <div class="form-check">
                    <input type="radio" name="techo" value="Si" @if ($censo->techo == "Si")   checked @endif> Si
                    <input type="radio" name="techo" value="No" @if ($censo->techo == "No")   checked @endif> No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('pañete', 'Pañete') !!}


                </label>


                <div class=" form-check">
                    <input type="radio" name="pañete" value="Si" @if ($censo->pañete == "Si")   checked @endif> Si
                    <input type="radio" name="pañete" value="No" @if ($censo->pañete == "No")   checked @endif> No
                </div>

            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('baños', 'Baños') !!}


                </label>


                <div class=" form-check">
                    <input type="radio" name="baños" value="Si" @if ($censo->baños == "Si")   checked @endif> Si
                    <input type="radio" name="baños" value="No" @if ($censo->baños == "No")   checked @endif> No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('baño_nuevo', 'Baño nuevo') !!}


                </label>

                <div class=" form-check">
                    <input type="radio" name="baño_nuevo" value="Si" @if ($censo->baño_nuevo == "Si")   checked @endif> Si
                    <input type="radio" name="baño_nuevo" value="No" @if ($censo->baño_nuevo == "No")   checked @endif> No
                </div>
            </div>
            <div class="col-2">
                <label class="text-gray-700">
                    {!! Form::label('vivienda_nueva', 'Vivienda Nueva') !!}


                </label>

                <div class=" form-check">
                    <input type="radio" name="vivienda_nueva" value="Si" @if ($censo->vivienda_nueva == "Si")   checked @endif>
                    Si
                    <input type="radio" name="vivienda_nueva" value="No" @if ($censo->vivienda_nueva == "No")   checked @endif>
                    No
                </div>
            </div>


        </div>
        <div class="row mt-4">
            {{ Form::submit('Actualizar Datos básicos', ['class'=>'btn btn-success']) }}
        </div>

        {{ Form::close() }}
    </div>
</div>
<a class="btn btn-secondary" href="{{route('admin.censo.index')}}">Volver</a>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
    $('#tipo_vivienda').on('change', function () {
        $("#escrituras").val($('#tipo_vivienda option:selected').attr('escrituras'));
    });

</script>

@endsection
