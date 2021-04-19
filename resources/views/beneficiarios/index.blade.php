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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

<title> Censo Comunal </title>

<x-app-layout>


    <div class="md:px-32 py-2 w-full">
        <ul class='flex cursor-pointer'>

            <li class='py-2 px-6 bg-gray-100 rounded-t-lg text-gray-500 hover:bg-gray-300'><a
                    href="{{route('censo.index')}}" class="" role="menuitem">Recomendaciones</a></li>
            @if ($verificacion = $user)
            <li class='py-2 px-6  bg-gray-100 rounded-t-lg  text-gray-500 hover:bg-gray-300 '><a
                    href="censo/{{ $censo[0]->id }}/edit" class="" role="menuitem"> Datos Básicos</a> </li>
            @else
            <li class='py-2 px-6 bg-gray-100 rounded-t-lg  text-gray-500  hover:bg-gray-300'><a
                    href="{{route('censo.create')}}" class="" role="menuitem">Datos Básicos</a></li>
            @endif
            <li class='py-2 px-6 bg-green-700 text-white  rounded-t-lg  '><a href="{{route('beneficiarios.index')}}"
                    class="" role="menuitem">Beneficiarios</a></li>
        </ul>


        <div class="bg-green-700 shadow-2xl rounded-t-lg px-8 pt-3 pb-4  flex flex-col ">
            <h3 class="text-2xl text-white font-semibold">Mis beneficiarios</h3>

            <p class="text-yellow-200"> {{ Auth::user()->name }}</p>
        </div>
        <div class="shadow overflow-hidden rounded-b-lg border-b overflow-x-auto border-gray-200">

            <table class="min-w-full bg-white " id="editable">
                <thead class="bg-green-800 text-white">
                    <tr>

                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Nucleo <br>Familiar</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Nombre</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Tipo<br>Documento</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Numero</td>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Edad</td>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Genero</td>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Afiliacion salud</td>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">EPS</td>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-xs">Discapacidad <a type="button"
                                class="cursor-pointer text-yellow-300 " data-toggle="modal"
                                data-target="#exampleModalTwo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                </svg>
                            </a></td>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Subsidio<br>Gobierno</td>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Nivel Educativo</td>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs" colspan="2">
                            </td>
                    </tr>
                </thead>

                <tbody class="text-gray-700">
                    @foreach ($beneficiarios as $beneficiario)
                    <tr>


                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->nucleo_fam}}
                        </th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->name}}</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->tipo_doc}}</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->numero}}</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->edad}}</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->genero}}</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->tipo_salud}}</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->salud}}</th>
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->discap}}</th>                        
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->sub_gobierno}}
                        <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->nivel_edu}}
                        </th>
                        <th class="grid grid-cols-2 gap-2 "><a href="beneficiarios/{{ $beneficiario->id }}/edit"
                                class=""> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-pencil-square text-warning" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg> </a>
                            <form action="beneficiarios/{{ $beneficiario->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    onclick="return confirm('¿Estas seguro de eliminar el beneficiario?')" class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                        class=" bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                    </svg></button>

                            </form>
                        </th>




                    </tr>
                    @endforeach
                </tbody>
                <form method="POST" action=" beneficiarios " enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <tfoot class="bg-green-800 text-white">
                        <tr>
                            <td class="text-left py-3 px-4">
                                <div class="relative inline-block text-gray-700">
                                    <select name="nucleo_fam"
                                        class="w-full px-2 h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option hidden>Nucleo familiar</option>
                                        <option value="Conyuge">Conyuge</option>
                                        <option value="Hijo/a">Hijo/a</option>
                                        <option value="Padre/Madre">Padre/Madre</option>
                                        {{-- <option value="C.E">C.E</option> --}}
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </td>

                            <td class="text-left py-3 px-4"><input required name="name" maxlength="50"
                                    class="w-full h-10 px-2 text-xs text-gray-700 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline  "
                                    type="text" placeholder="Nombre" value="{{ old('name') }}" /></td>
                            <td class="text-left py-3 px-4">
                                <div class="relative inline-block text-gray-700">
                                    <select name="tipo_doc"
                                        class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option hidden> Tipo Doc </option>
                                        <option value="R.C">R.C</option>
                                        <option value="T.I">T.I</option>
                                        <option value="C.C">C.C</option>
                                        {{-- <option value="C.E">C.E</option> --}}
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                            <td class="text-left py-3 px-4"><input required name="numero" maxlength="10"
                                    class="w-24 h-10 px-2 text-xs text-gray-700 placeholder-gray-600  rounded-lg "
                                    type="number" placeholder="Numero" value="{{old('number')}}" size="20" /></td>
                            <td class="text-left py-3 px-4"><input required name="edad" maxlength="2"
                                    class="w-full h-10 px-2 text-xs text-gray-700 placeholder-gray-600  rounded-lg "
                                    type="number" placeholder="Edad" min="1" max="99" /></td>
                            <td class="text-left py-2 px-3">
                                <div class="relative inline-block text-gray-700">
                                    <select name="genero"
                                        class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option hidden> Género </option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                        <option value="O">Otro</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                            <td class="text-left py-3 px-4">
                                <div class="relative inline-block text-gray-700">
                                    <select name="tipo_salud"
                                        class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option hidden> Tipo Afiliacion </option>
                                        <option>Ninguna</option>
                                        <option>Subsidiado</option>
                                        <option>Contributivo</option>

                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                            <td class="text-left py-3 px-4">
                                <div class="relative inline-block text-gray-700">
                                    <select name="salud"
                                        class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option hidden> EPS </option>
                                        <option>Ninguna</option>
                                        @foreach ($eps as $entidad)
                                        <option>{{$entidad->name}}</option>
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
                            </td>
                            <td class="text-left py-3 px-4">
                                <div class="relative inline-block text-gray-700">
                                    <select name="discap"
                                        class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option hidden> Discapacidad </option>
                                        <option>Ninguna</option>
                                        <option>Fisica</option>
                                        <option>Intelectual</option>
                                        <option>Sensorial</option>
                                        <option>Psiquica</option>
                                        <option>Viseral</option>
                                        <option>Multiple</option>
                                    </select>
                                    <!-- Button trigger modal -->

                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>


                                </div>
                            </td>
                            <td class="text-left py-3 px-4">
                                <div class="relative inline-block text-gray-700">
                                    <select name="sub_gobierno"
                                        class="w-full h-10 pl-1 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option hidden> SubGobierno </option>
                                        <option>Ninguno</option>
                                        <option>Familias en Accion</option>
                                        <option>Jovenes en Accion</option>
                                        <option>Adulto Mayor</option>
                                        <option>Otro</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                            <td class="text-left py-3 px-4">
                                <div class="relative inline-block text-gray-700">
                                    <select name="nivel_edu"
                                        class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                                        <option hidden> Nivel Edu </option>
                                        <option>Ninguna</option>
                                        <option>Primaria</option>
                                        <option>Secundaria</option>
                                        <option>Universidad</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-xs" colspan="2">
                                </td>
                                {{-- <td class="eliminar"><button class="text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>  
                  </button></td> --}}

                        </tr>
                    </tfoot>
            </table>



        </div>
        <div class="w-full max-w-md ">
            @if ($errors->any())
            <ul>
                <div class="bg-red-100 border border-red-400 text-red-700 px-8 py-2 rounded relative" role="alert">
                    <strong class="font-bold">Por favor corrige los siguientes errores:</strong>
                    @foreach ($errors->all() as $error)
                    <li style="list-style-type: circle " class="capitalize"> {{ $error }}</li>

                    @endforeach
                </div>
            </ul>
            @endif
        </div>
        <div class="form-group pt-2 mt-10 mb-10">
            <button type="submit" name="insertar" value="Insertar Alumno"
                class="bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">Agregar
                Beneficiario</button>
            <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                href="{{route('censo.index')}}">Volver</a>

        </div>
        </form>
        <!-- Modal -->
        <div class="modal hidden fixed top-0 left-0 w-full h-full outline-none fade" id="exampleModalTwo" tabindex="-1"
            role="dialog">
            <div class="modal-dialog relative  pointer-events-none max-w-6xl my-8 mx-auto px-4 sm:px-0" role="document">
                <div
                    class="relative flex flex-col w-full pointer-events-auto bg-white border border-gray-300 rounded-lg">
                    <div class="flex items-start justify-between p-3 border-b border-gray-300 rounded-t">
                        <h5 class="mb-0 text-lg leading-normal font-bold">Informacion Discapacidades</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="relative flex p-3">

                        <div class="w-full p-3">

                            <h4 class="mb-2 text-lg leading-normal font-bold ">Discapacidad Física</h4>


                            <p class="mb-2">Las personas con discapacidad física son aquellas que presentan una
                                disminución importante en las
                                capacidades de movimiento de una o varias partes del cuerpo. Puede referirse a la
                                disminución o
                                incoordinación del movimiento, trastornos en el tono muscular o trastornos del
                                equilibrio.</p>
                            <h4 class="mb-2 text-lg leading-normal font-bold">Discapacidad Sensorial</h4>

                            <p class="mb-2"> La discapacidad sensorial hace referencia a la existencia de limitaciones
                                derivadas de la
                                existencia
                                de deficiencias en alguno de los sentidos
                                que nos permiten percibir el medio sea externo o interno. Existen alteraciones en todos
                                los
                                sentidos, si bien las más conocidas son la
                                discapacidad visual y la auditiva.</p>
                            <h4 class="mb-2 text-lg leading-normal font-bold"> Discapacidad Intelectual</h4>

                            <p class="mb-2"> Discapacidad intelectual se define como toda aquella limitación del
                                funcionamiento intelectual
                                que
                                dificulta la participación social o el
                                desarrollo de la autonomía o de ámbitos como el académico o el laboral, poseyendo un CI
                                inferior
                                a
                                70 y influyendo en diferentes habilidades
                                cognitivas y en la participación social. Existen diferentes grados de discapacidad
                                intelectual,
                                los
                                cuales tienen diferentes implicaciones a
                                nivel del tipo de dificultades que pueden presentar.</p>

                            <h4 class="mb-2 text-lg leading-normal font-bold"> Discapacidad Psíquica</h4>

                            <p class="mb-2">Hablamos de discapacidad psíquica cuando estamos ante una situación en que
                                se
                                presentan alteraciones
                                de tipo conductual y del
                                comportamiento adaptativo, generalmente derivadas del padecimiento de algún tipo de
                                trastorno
                                mental. </p>
                            <h4 class="mb-2 text-lg leading-normal font-bold"> Discapacidad Visceral</h4>

                            <p class="mb-2">Este poco conocido tipo de discapacidad aparece en aquellas personas que
                                padecen algún tipo de
                                deficiencia en alguno de sus órganos, la cual
                                genera limitaciones en la vida y participación en comunidad del sujeto. Es el caso de
                                las que
                                pueden
                                generar la diabetes o los problemas
                                cardíacos.</p>
                            <h4 class="mb-2 text-lg leading-normal font-bold"> Discapacidad Múltiple</h4>

                            <p class=""> Este tipo de discapacidad es la que se deriva de una combinación de
                                limitaciones derivadas de
                                algunas de
                                las anteriores deficiencias. Por
                                ejemplo, un sujeto ciego y con discapacidad intelectual, o de un sujeto parapléjico con
                                sordera.
                            </p>
                            <div class="flex items-center justify-end border-gray-300 p-2">
                                <button type="button"
                                    class="inline-block font-normal text-center px-3 py-2 leading-normal text-base rounded cursor-pointer text-gray-800 bg-gray-300 mr-2"
                                    data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</x-app-layout>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
