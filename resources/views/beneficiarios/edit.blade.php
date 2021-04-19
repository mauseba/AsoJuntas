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
<x-app-layout>

    <div class=" flex flex-col items-center ">
        <div class="flex flex-col bg-green-700  px-4 sm:px-6 md:px-8 lg:px-10 py-4  w-full max-w-md ">
            <h3 class="text-2xl text-white font-semibold">Editar Beneficiario </h3>
        </div>
        <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md ">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="/beneficiarios/{{ $beneficiarios->id }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf()

                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Nucleo Familiar
                </label>
                <div class="relative  text-gray-700 mb-2">
                    <select name="nucleo_fam"
                        class="w-full mb-2 h-10 px-2 text-xs text-gray-700 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">

                        <option @if ( $beneficiarios->nucleo_fam == 'Conyuge') selected="selected" @endif
                            value="Conyuge">Conyuge</option>
                        <option @if ( $beneficiarios->nucleo_fam == 'Hijo/a') selected="selected" @endif
                            value="Hijo/a">Hijo/a</option>
                        <option @if ( $beneficiarios->nucleo_fam == 'Padre/Madre') selected="selected" @endif
                            value="Padre/Madre">Padre/Madre</option>

                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        Nombre
                    </label>
                    <input required value="{{ $beneficiarios->name }}" name="name"
                        class="w-full mb-2 h-10 px-2 text-xs text-gray-700 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline "
                        type="text" placeholder="Nombre" />
                </div>
                <div class="grid grid-flow-col  grid-rows-4 ">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Tipo de Documento
                        </label>
                        <div class="relative inline-block text-gray-700 mb-2">
                            <select name="tipo_doc"
                                class="my-select w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline ">
                                <option @if ( $beneficiarios->tipo_doc == 'R.C') selected="selected" @endif>R.C</option>
                                <option @if ( $beneficiarios->tipo_doc == 'T.I') selected="selected" @endif>T.I</option>
                                <option @if ( $beneficiarios->tipo_doc == 'C.C') selected="selected" @endif>C.C</option>
                                {{-- <option @if ( $beneficiarios->tipo_doc  == 'C.E') selected="selected" @endif>C.E</option> --}}
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold ">
                            Número de identificación
                        </label>
                        <input required name="numero" value="{{ $beneficiarios->numero }}"
                            class=" h-10   pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                            type="number" placeholder="Numero" size="20" maxlength="20" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Edad
                        </label>
                        <input required name="edad" value="{{ $beneficiarios->edad }}" maxlength="2"
                            class=" h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline"
                            type="number" placeholder="Edad" min="1" max="99" />
                    </div>


                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Género
                        </label>
                        <div class="relative inline-block text-gray-700">
                            <select name="genero"
                                class="my-select w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">

                                <option @if ( $beneficiarios->genero == 'M') selected="selected" @endif
                                    value="M">Masculino</option>
                                <option @if ( $beneficiarios->genero == 'F') selected="selected" @endif
                                    value="F">Femenino</option>
                                <option @if ( $beneficiarios->genero == 'O') selected="selected" @endif
                                    value="O">Otro</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Tipo de Afiliación de salud
                        </label>
                        <div class="relative inline-block text-gray-700">
                            <select name="tipo_salud"
                                class="my-select w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">

                                <option @if ( $beneficiarios->tipo_salud == 'Ninguna') selected="selected"
                                    @endif>Ninguna</option>
                                <option @if ( $beneficiarios->tipo_salud == 'Subsidiado') selected="selected"
                                    @endif>Subsidiado</option>
                                <option @if ( $beneficiarios->tipo_salud == 'Contributivo') selected="selected"
                                    @endif>Contributivo</option>

                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            EPS
                        </label>
                        <div class="relative inline-block text-gray-700">
                            <select name="salud"
                                class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                <option @if ( $beneficiarios->salud == 'Ninguna') selected="selected" @endif>Ninguna
                                </option>
                                @foreach ($eps as $entidad)
                                <option @if ( $beneficiarios->salud == $entidad->name) selected="selected"
                                    @endif>{{$entidad->name}}</option>
                                @endforeach



                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Discapacidad
                        </label>
                        <div class="relative inline-block text-gray-700">
                            <select name="discap"
                                class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                <option @if ( $beneficiarios->discap == 'Ninguna') selected="selected"
                                    @endif>Ninguna</option>
                                <option @if ( $beneficiarios->discap == 'Fisica') selected="selected" @endif>Fisica
                                </option>
                                <option @if ( $beneficiarios->discap == 'Intelectual') selected="selected"
                                    @endif>Intelectual</option>
                                <option @if ( $beneficiarios->discap == 'Sensorial') selected="selected"
                                    @endif>Sensorial</option>
                                <option @if ( $beneficiarios->discap == 'Psiquica') selected="selected"
                                    @endif>Psiquica</option>
                                <option @if ( $beneficiarios->discap == 'Viseral') selected="selected"
                                    @endif>Viseral</option>
                                <option @if ( $beneficiarios->discap == 'Multiple') selected="selected"
                                    @endif>Multiple</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Nivel Educativo
                        </label>
                        <div class="relative inline-block text-gray-700">
                            <select name="nivel_edu"
                                class=" my-select w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                <option @if ( $beneficiarios->nivel_edu == 'Ninguna') selected="selected"
                                    @endif>Ninguna</option>
                                <option @if ( $beneficiarios->nivel_edu == 'Primaria') selected="selected"
                                    @endif>Primaria</option>
                                <option @if ( $beneficiarios->nivel_edu == 'Secundaria') selected="selected"
                                    @endif>Secundaria</option>
                                <option @if ( $beneficiarios->nivel_edu == 'Universidad') selected="selected"
                                    @endif>Universidad</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="mb-4">
                    <div class="relative inline-block text-gray-700">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Subsidio Gobierno
                        </label>
                        <select name="sub_gobierno"
                            class="w-full h-10 pl-1 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                            
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
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        
                    </div>
                    </div>
                    <button type="submit" name="insertar" value="Insertar Alumno"
                        class="bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">Actualizar</button>
                    
                    
                
<a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                        href="{{route('beneficiarios.index')}}">Volver</a>


            </form>
        </div>
    </div>

</x-app-layout>

<script>
    // To style only selects with the my-select class
    $('.my-select').selectpicker();

</script>
