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


<x-app-layout>
  

        <div class="md:px-32 py-2 w-full">
          <ul class='flex cursor-pointer'>
               
            <li class='py-2 px-6 bg-gray-100 rounded-t-lg text-gray-500 hover:bg-gray-300'><a href="{{route('censo.index')}}" class="" role="menuitem">Recomendaciones</a></li>
            @if ($verificacion = $user)
            <li class='py-2 px-6  bg-gray-100 rounded-t-lg  text-gray-500 hover:bg-gray-300 ' ><a href="censo/{{ $censo[0]->id }}/edit" class="" role="menuitem"> Datos Básicos</a> </li>
            @else
            <li class='py-2 px-6 bg-gray-100 rounded-t-lg  text-gray-500  hover:bg-gray-300' ><a href="{{route('censo.create')}}" class="" role="menuitem">Datos Básicos</a></li>
            @endif
            <li class='py-2 px-6 bg-green-700 text-white  rounded-t-lg  '><a href="{{route('beneficiarios.index')}}" class="" role="menuitem">Beneficiarios</a></li>
          </ul>
            
          
          <div class="bg-green-700 shadow-2xl rounded-t-lg px-8 pt-3 pb-4  flex flex-col ">
            <h3 class="text-2xl text-white font-semibold">Mis beneficiarios</h3>
            
            <p class="text-yellow-200"> {{ Auth::user()->name }}</p>
        </div>
          <div class="shadow overflow-hidden rounded-b-lg border-b overflow-x-auto border-gray-200">
                    
              <table class="min-w-full bg-white "    id="editable" >
                <thead class="bg-green-800 text-white">
                  <tr>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs hidden">#</th>                    
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Nombre</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Tipo_Doc</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Numero</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Edad</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Genero</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Tipo Afiliacion salud</td>
                      <th class="text-left py-3 px-4 uppercase font-semibold text-xs">EPS</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Discapacidad</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">Nivel Educativo</td>
                      <th class="text-left py-3 px-4 uppercase font-semibold text-xs"></td>
                   
                  </tr>
                </thead>
                
              <tbody class="text-gray-700">
                @foreach ($beneficiarios as $beneficiario)                
                <tr>           
                  
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs hidden">{{$beneficiario->user_id}}</th>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->name}}</th>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->tipo_doc}}</th>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->numero}}</td>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->edad}}</td>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->genero}}</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->tipo_salud}}</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->salud}}</td>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->discap}}</td>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs">{{$beneficiario->nivel_edu}}</td>
                  <th class="text-left py-3 px-4 uppercase font-semibold text-xs"><a href="beneficiarios/{{ $beneficiario->id }}/edit" class=""> <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square text-warning" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg> </a> </td>                        
                </tr>
                @endforeach
              </tbody>
              <form method="POST" action=" beneficiarios " enctype="multipart/form-data">
                {{ csrf_field() }}
              <tfoot class="bg-green-800 text-white">
                <tr>
                  <td class="text-left py-3 px-4"><input required name="name"  maxlength="50"class="w-full h-10 px-2 text-xs text-gray-700 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline  " type="text" placeholder="Nombre" value="{{ old('name') }}"/></td>
                  <td class="text-left py-3 px-4"><div class="relative inline-block text-gray-700">
                    <select name="tipo_doc" class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                      <option hidden> Tipo Doc </option>
                      <option value="R.C">R.C</option>
                      <option value="T.I">T.I</option>
                      <option value="C.C">C.C</option>
                      <option value="C.E">C.E</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </div>
                  </div></td>
                  <td class="text-left py-3 px-4"><input required name="numero" maxlength="10" class="w-full h-10 px-2 text-xs text-gray-700 placeholder-gray-600  rounded-lg " type="number" placeholder="Numero" value="{{old('number')}}" size="20"/></td>
                  <td class="text-left py-3 px-4"><input required name="edad" maxlength="2"class="w-full h-10 px-2 text-xs text-gray-700 placeholder-gray-600  rounded-lg " type="number" placeholder="Edad" min="1"  max="99"/></td>                              
                  <td class="text-left py-3 px-4">
                    <div class="relative inline-block text-gray-700">
                        <select name="genero" class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                          <option hidden> Género </option>
                          <option value="M">Masculino</option>
                          <option value="F">Femenino</option>
                          <option value="O">Otro</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                          <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </div>
                      </div>
                    </td>
                  <td class="text-left py-3 px-4">
                    <div class="relative inline-block text-gray-700">
                        <select name="tipo_salud" class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                          <option hidden> Tipo Afiliacion </option>
                          <option>Ninguna</option>                         
                          <option>Subsidiado</option>
                          <option>Contributivo</option>                       
                           
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                          <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </div>
                      </div>
                  </td>
                  <td class="text-left py-3 px-4">
                    <div class="relative inline-block text-gray-700">
                        <select name="salud" class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                          <option hidden> EPS </option>
                          <option>Ninguna</option>
                          @foreach ($eps as $entidad)
                          <option>{{$entidad->name}}</option>
                          @endforeach  
                         
                           
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                          <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                        </div>
                      </div>
                  </td>
                  <td class="text-left py-3 px-4">
                      <div class="relative inline-block text-gray-700">
                    <select name="discap" class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                      <option hidden> Discapacidad </option>
                      <option>Ninguna</option>
                      <option>Fisica</option>
                      <option>Mental</option>
                      <option>Sensorial</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </div>
                  </div></td>
                  <td class="text-left py-3 px-4"><div class="relative inline-block text-gray-700">
                    <select name="nivel_edu" class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                      <option hidden> Nivel Edu </option>
                      <option>Ninguna</option>
                      <option>Primaria</option>
                      <option>Secundaria</option>
                      <option>Universidad</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                      <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                    </div>
                  </div>
                </td>
                <th class="text-left py-3 px-4 uppercase font-semibold text-xs"></td>
                  {{-- <td class="eliminar"><button class="text-red-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>  
                  </button></td> --}}
                  
                </tr>                
              </tfoot>
              </table >

                
              
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
            <div class="form-group pt-2">
              <button type="submit" name="insertar" value="Insertar Alumno" class="bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">Agregar Beneficiario</button>
              <a class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" href="{{route('censo.index')}}">Volver</a>
              
          </div>
              </form>
         
</x-app-layout>





<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>