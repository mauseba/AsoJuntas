<x-guest-layout>

    <div class="md:px-32 py-2 w-full">
        <ul class='flex cursor-pointer'>

            <li class='py-2 px-6 bg-gray-100 rounded-t-lg text-gray-500 hover:bg-gray-300'><a
                    href="{{route('censo.index')}}" class="" role="menuitem">Recomendaciones</a></li>
            @if ($verificacion = $user)
            <li class='py-2 px-6 bg-green-700 rounded-t-lg  text-white  '><a href="" class="" role="menuitem"> Datos
                    Básicos</a> </li>
            @else
            <li class='py-2 px-6  rounded-t-lg  text-gray-500  hover:bg-gray-300'><a href="{{route('censo.create')}}"
                    class="" role="menuitem">Datos Básicos</a></li>
            @endif
            <li class='py-2 px-6 bg-gray-100 rounded-t-lg text-gray-500 hover:bg-gray-300'><a
                    href="{{route('beneficiarios.index')}}" class="" role="menuitem">Beneficiarios</a></li>
        </ul>

        <div class="bg-green-700 shadow-2xl rounded-t-lg px-8 pt-3 pb-4  flex flex-col ">
            <h3 class="text-2xl text-white font-semibold">Censo Comunal</h3>

            <p class="text-yellow-200"> {{ Auth::user()->name }}</p>
        </div>

        <div class="bg-white shadow-md rounded-b-lg px-8 pt-6 pb-8  flex flex-col  ">
            @if ($errors->any())
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- <form method="POST" action="/censo/{{ $censo->id}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf() --}}

            {{-- @if(isset($censo)) --}}
            {{ Form::model($censo, ['route' => ['censo.update', $censo->id], 'method' => 'patch']) }}
            {{-- @else --}}
            {{-- {{ Form::open(['route' => 'censo.store']) }} --}}
            {{-- @endif --}}

            <div class="-mx-3 md:flex mb-2 pt-2">

                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" for="grid-city">
                        {!! Form::label('barrio', 'Barrio/Vereda') !!}
                    </label>

                    <select name="barrio" class="form-select block w-full mt-1">

                        @foreach($barrios as $bar)
                        <option @if ( $censo->barrio === $bar->name) selected="selected" @endif>{{$bar->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" for="grid-city">

                        {!! Form::label('direccion', 'Direccion/Finca') !!}

                    </label>
                    {{ Form::text('direccion', old('direccion'), ['class'=> 'form-input mt-1 block w-full']) }}
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" for="grid-city">
                        {!! Form::label('tipo_vivienda', 'Tipo de Vivienda') !!}

                    </label>
                    {{-- {{ Form::text('tipo_vivienda', Input::old('tipo_vivienda'), ['class'=> 'form-input mt-1 block w-full'])  }}
                    --}}
                    <select id="tipo_vivienda" name="tipo_vivienda" class="form-select block w-full mt-1">


                        <option @if ( $censo->tipo_vivienda == 'Propia') selected="selected" @endif value="Propia"
                            escrituras="Si">Propia</option>
                        <option @if ( $censo->tipo_vivienda == 'Arriendo') selected="selected" @endif value="Arriendo"
                            escrituras="No">Arriendo</option>
                        <option @if ( $censo->tipo_vivienda == 'Posada') selected="selected" @endif value="Posada"
                            escrituras="No">Posada</option>

                    </select>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('escrituras', 'Escrituras/Documentos') !!}

                    </label>


                    <input id="escrituras" name="escrituras" type="text"
                        class="form-input mt-1 block w-full bg-gray-200" disabled value="{{ $censo->escrituras }}">

                    {{--  <select  name="escrituras" class="form-select block  mt-1" disabled>
                  
                    <option @if ( $censo->tipo_vivienda  == 'Propia') selected="selected" value='Si' @endif   >Si</option>
                  <option @if ( $censo->tipo_vivienda  == 'Arriendo' OR $censo->tipo_vivienda  == 'Posada' ) selected="selected" value='No' @endif   >No</option>
                
                 
                                  
                  </select> --}}


                </div>
                {{-- <div class=" md:w-1/2 px-3 mb-6 md:mb-0">Esta opcion se guarda automatica mente dependiendo del tipo de vivienda</div> --}}


            </div>

            <div class=" pt-2">
                <hr class="pt-2" />
                <label class="text-gray-700 pt-4 text font-bold">
                    Servicios públicos

                </label>
            </div>

            {{-- Fila --}}
            <div class="-mx-3 md:flex my-2  mb-2  ">


                {{-- columna --}}
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('agua', 'Agua') !!}



                    </label>
                    {{-- {{ Form::text('agua', Input::old('agua'), ['class'=> 'form-input mt-1 block w-full']) }} --}}
                    <div class=" block  mt-1">
                        <input type="radio" name="agua" @if ( $censo->agua == 'Si') checked @endif value="Si"> Si
                        <input type="radio" name="agua" @if ( $censo->agua == 'No') checked @endif value="No"> No
                    </div>
                    {{--  <select name="agua" class="form-select block  mt-1">                       
                      <option @if ( $censo->agua  == 'Si') selected="selected" @endif>Si</option>
                      <option @if ( $censo->agua  == 'No') selected="selected" @endif>No</option>                                                       
                  </select> --}}
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('energia', 'Energia') !!}
                    </label>
                    <div class=" block  mt-1">
                        <input type="radio" name="energia" @if ( $censo->energia == 'Si') checked @endif value="Si"> Si
                        <input type="radio" name="energia" @if ( $censo->energia == 'No') checked @endif value="No"> No
                    </div>


                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('gas', 'Gas') !!}


                    </label>
                    <div class=" block  mt-1">
                        <input type="radio" name="gas" @if ( $censo->gas == 'Si') checked @endif value="Si"> Si
                        <input type="radio" name="gas" @if ( $censo->gas == 'No') checked @endif value="No"> No
                    </div>

                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('alcantarilla', 'Alcantarillado') !!}
                    </label>
                    <div class=" block  mt-1">
                        <input type="radio" name="alcantarilla" @if ( $censo->alcantarilla == 'Si') checked @endif
                        value="Si"> Si
                        <input type="radio" name="alcantarilla" @if ( $censo->alcantarilla == 'No') checked @endif
                        value="No"> No
                    </div>
                </div>
            </div>
            <div class="pt-6">
                <hr class="pt-4 " />
            </div>
            <div class="-mx-3 md:flex my-2  ">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('sub_vivienda', 'Subsidio de Vivienda') !!}
                    </label>
                    <div class=" block  mt-1">
                        <input type="radio" name="sub_vivienda" @if ( $censo->sub_vivienda == 'Si') checked @endif
                        value="Si"> Si
                        <input type="radio" name="sub_vivienda" @if ( $censo->sub_vivienda == 'No') checked @endif
                        value="No"> No
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('sub_gobierno', 'Subsidio del Gobierno') !!}
                    </label>

                    <select name="sub_gobierno" class="form-select block  mt-1">

                        <option @if ( $censo->sub_gobierno == 'Ninguno') selected="selected"
                            @endif >Ninguno</option>
                        <option @if ( $censo->sub_gobierno == 'Familias en Accion') selected="selected"
                            @endif>Familias en Accion</option>
                        <option @if ( $censo->sub_gobierno == 'Jovenes en Accion') selected="selected"
                            @endif>Jovenes en Accion</option>
                        <option @if ( $censo->sub_gobierno == 'Adulto Mayor') selected="selected"
                            @endif>Adulto Mayor</option>
                        <option @if ( $censo->sub_gobierno == 'Otro') selected="selected"
                            @endif>Otro</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('sisben', 'Puntaje Sisben') !!}

                    </label>
                    {{-- {{ Form::text('sisben', Input::old('sisben'), ['class'=> 'form-input mt-1 block w-full']) }}
                    --}}
                    <select name="sisben" class="form-select block  mt-1">
                        <option @if( $censo->sisben == "No" ) selected @endif>No</option>
                        <option @if( $censo->sisben == "Grupo A" ) selected @endif>Grupo A</option>
                        <option @if( $censo->sisben == "Grupo B" ) selected @endif>Grupo B</option>
                        <option @if( $censo->sisben == "Grupo C" ) selected @endif>Grupo C</option>
                        <option @if( $censo->sisben == "Grupo D" ) selected @endif>Grupo D</option>
                    </select>
                </div>


            </div>

            <div class=" pt-6">
                <hr class="pt-6" />
                <label class="text-gray-700 pt-6  text font-bold">
                    Tipo de mejoramiento

                </label>
            </div>
            {{-- Fila --}}
            <div class="-mx-3 md:flex my-2  mb-2  ">
                {{-- columna --}}
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('piso', 'Piso') !!}
                    </label>
                    <div class=" block  mt-1">
                        <input type="radio" name="piso" @if ( $censo->piso == 'Si') checked @endif value="Si"> Si
                        <input type="radio" name="piso" @if ( $censo->piso == 'No') checked @endif value="No"> No
                    </div>

                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('techo', 'Techo') !!}
                    </label>

                    <div class=" block  mt-1">
                        <input type="radio" name="techo" @if ( $censo->piso == 'Si') checked @endif value="Si"> Si
                        <input type="radio" name="techo" @if ( $censo->piso == 'No') checked @endif value="No"> No
                    </div>

                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('pañete', 'Pañete') !!}


                    </label>

                    <div class=" block  mt-1">
                        <input type="radio" name="pañete" @if ( $censo->pañete == 'Si') checked @endif value="Si"> Si
                        <input type="radio" name="pañete" @if ( $censo->pañete == 'No') checked @endif value="No"> No
                    </div>

                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('baños', 'Baños') !!}


                    </label>

                    <div class=" block  mt-1">
                        <input type="radio" name="baños" @if ( $censo->baños == 'Si') checked @endif value="Si"> Si
                        <input type="radio" name="baños" @if ( $censo->baños == 'No') checked @endif value="No"> No
                    </div>

                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('baño_nuevo', 'Baño nuevo') !!}


                    </label>
                    <div class=" block  mt-1">
                        <input type="radio" name="baño_nuevo" @if ( $censo->baño_nuevo == 'Si') checked @endif
                        value="Si"> Si
                        <input type="radio" name="baño_nuevo" @if ( $censo->baño_nuevo == 'No') checked @endif
                        value="No"> No
                    </div>


                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('vivienda_nueva', 'Vivienda Nueva') !!}


                    </label>
                    <div class=" block  mt-1">
                        <input type="radio" name="vivienda_nueva" @if ( $censo->vivienda_nueva == 'Si') checked @endif
                        value="Si"> Si
                        <input type="radio" name="vivienda_nueva" @if ( $censo->vivienda_nueva == 'No') checked @endif
                        value="No"> No
                    </div>

                </div>


            </div>
            <div class=" pt-6">
                <button type="submit" name="insertar" value="Insertar Alumno"
                    class="bg-yellow-300 hover:bg-yellow-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">Actualizar</button>
                {{-- {{ Form::submit('Actualizar Censo', ['class'=>'border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline']) }}
                --}}
                <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                    href="{{route('censo.index')}}">Volver</a>
            </div>

            {{-- {{ Form::close() }} --}}
            </form>

        </div>
        {{-- <div class="bg-green-700 shadow-2xl rounded px-8 pt-6 pb-8  flex flex-col ">
        <h3 class="text-2xl text-white font-semibold">Beneficiarios</h3>                   
    </div> --}}
    </div>
</x-app-layout>

<script>
    $('#tipo_vivienda').on('change', function () {
        $("#escrituras").val($('#tipo_vivienda option:selected').attr('escrituras'));
    });

</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
