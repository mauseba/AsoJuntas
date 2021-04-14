
<x-app-layout>
    
    <div class="md:px-32 py-2 w-full">
        
            <ul class='flex cursor-pointer'>
               
              <li class='py-2 px-6 bg-green-700 rounded-t-lg text-white'>Recomendaciones</li>
              @if ($censo->count() == 1)
              <li class='py-2 px-6 bg-gray-100 rounded-t-lg  text-gray-500  hover:bg-gray-200' ><a href="censo/{{ $censo[0]->id }}/edit" class="" role="menuitem"> Datos Básicos</a> </li>
              @else
              <li class='py-2 px-6 bg-gray-100 rounded-t-lg  text-gray-500  hover:bg-gray-200' ><a href="{{route('censo.create')}}" class="" role="menuitem">Datos Básicos</a></li>
              @endif
              <li class='py-2 px-6 bg-gray-100 rounded-t-lg text-gray-500 hover:bg-gray-200'><a href="{{route('beneficiarios.index')}}" class="" role="menuitem">Beneficiarios</a></li>
            </ul>
        
        <div class="bg-green-700 shadow-2xl rounded-tr-lg px-8 pt-6 pb-8  flex flex-col ">
            <h3 class="text-2xl text-white font-semibold">Censo comunal</h3>

        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8  flex flex-col  ">    
            <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal">                                          
                
            <h3 class="font-bold   text-green-700  pb-2 text-3xl md:text-4xl">Paso 1: Datos Básicos</h3>
           
            <p>
                En esta seccion podrá registrar información personal acerca del afiliado, donde podrá ingresar datos de vivienda, servicios públicos,
                sisben, entre otros.
            </p>

           <h3 class="font-bold font-sans break-normal text-green-700 pt-6 pb-2 text-3xl md:text-4xl">Paso 2: Beneficiarios</h3>
            <p>
                El afiliado tiene el derecho a nombrar uno o varios beneficiarios, quienes normalmente son el cónyuge y los hijos(menores de 14 años). 
                Ellos podrán disfrutar, al igual que todos los asociados, de los servicios de la institución.
            </p>

            <h3 class="font-bold font-sans break-normal text-green-700 pt-6 pb-2 text-3xl md:text-4xl">Paso 3: Guarda tus datos</h3>
            <p class="pb-4">
              Al completar el proceso del censo puedes exportar tus datos ingresados a traves de un PDF y conversarlos.
            </p>
            <a class="bg-green-300   hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center" href="{{route('censo.pdf')}}">Exportar PDF</a>

      {{--       @if ($verificacion = $user)
            <a href="censo/{{ $censo[0]->id }}/edit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Actualizar Censo</a>              
            <a href="{{ route('censo.edit', $censo) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Actualizar Censo</a>              
            @else
            <a href="{{route('censo.create')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Primer Censo</a>
            @endif
            <a href="{{route('beneficiarios.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Beneficiarios</a>
        </div> --}}
        </div>
    </div>     
</x-app-layout>


  


