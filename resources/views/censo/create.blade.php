<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>


<x-app-layout>
    
    <div class="md:px-32 py-8 w-full">
        <div class="bg-green-700 shadow-2xl rounded-t-lg px-8 pt-6 pb-8  flex flex-col ">
            <h3 class="text-2xl text-white font-semibold">Censo comunal</h3>
            
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
            
            {{ Form::open(['route' => 'censo.store']) }}               
            
            
            <div class="-mx-3 md:flex mb-2 pt-2">
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                  <label class="text-gray-700" for="grid-city">
                    {!! Form::label('barrio', 'Barrio/Vereda') !!}
                  </label>
                  
                  <select name="barrio" class="form-select block w-full mt-1">
                    <option selected hidden> -- Seleccionar -- </option>
                    @foreach($barrios as $bar)
                      <option>{{$bar->name}}</option>
                    @endforeach                   
                  </select>
                 
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" for="grid-city">
                     
                        {!! Form::label('direccion', 'Direccion/Finca') !!}
              
                    </label>
                    {{ Form::text('direccion', Input::old('direccion'), ['class'=> 'form-input mt-1 block w-full']) }}                  
                  </div>
                  <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" for="grid-city">
                        {!! Form::label('tipo_vivienda', 'Tipo de Vivienda') !!}
                       
                    </label>
                   {{-- {{ Form::text('tipo_vivienda', Input::old('tipo_vivienda'), ['class'=> 'form-input mt-1 block w-full'])  }} --}}
                   <select id="tipo_vivienda" name="tipo_vivienda" class="form-select block w-full mt-1" onchange="escrituras();">
                    
                    <option selected hidden> -- Seleccionar -- </option>
                      <option escrituras="Si">Propia</option>
                      <option escrituras="No">Arriendo</option>
                      <option escrituras="No">Posada</option>
                                  
                  </select>
                  </div>
                  <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" for="grid-city">
                        {!! Form::label('escrituras', 'Escrituras') !!}
                    </label>
                    
                    {{-- {{ Form::text('escrituras', Input::old('escrituras'), ['class'=> 'form-input mt-1 block w-full']) }} --}}
                    {{-- <select  name="escrituras" class="form-select block  mt-1" disabled>
                  
                                      
                      </select> --}}
                      
                      <input id="escrituras" name="escrituras" type="text" class="form-input mt-1 block w-full bg-gray-200" disabled >                
                  </div>

                  
                
              </div>
              
              <div class=" pt-6">
                <hr class="pt-6"/>
                <label class="text-gray-700 pt-6  text font-bold" >
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
                     <div class=" block  mt-1">
                        <input type="radio" name="agua"  value="Si"  @if(old('agua') == 'Si') checked @endif> Si
                           <input type="radio" name="agua"   value="No" @if(old('agua') == 'No') checked @endif> No
                        </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" >
                        {!! Form::label('energia', 'Energia') !!}                                   
                     </label>
                    

                      <div class=" block  mt-1">
                        <input type="radio" name="energia"  value="Si" @if(old('energia') == 'Si') checked @endif> Si
                           <input type="radio" name="energia" value="No"  @if(old('energia') == 'No') checked @endif> No
                        </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" >
                        {!! Form::label('gas', 'Gas') !!}
                        
                        
                     </label>
                     
                      <div class=" block  mt-1">
                        <input type="radio" name="gas"  value="Si" @if(old('gas') == 'Si') checked @endif> Si
                           <input type="radio" name="gas" value="No" @if(old('gas') == 'No') checked @endif> No
                        </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" >
                        {!! Form::label('alcantarilla', 'Alcantarillado') !!}
                       
                        
                     </label>
                     
                      <div class=" block  mt-1">
                        <input type="radio" name="alcantarilla"  value="Si"  @if(old('alcantarilla') == 'Si') checked @endif> Si
                           <input type="radio" name="alcantarilla"   value="No" @if(old('alcantarilla') == 'No') checked @endif> No
                        </div>

                </div>
               
            </div>

            
            <div class="pt-6">
                <hr class="pt-4 "/>
            </div>
            <div class="-mx-3 md:flex my-2  "> 
                
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('sub_vivienda', 'Subsidio de Vivienda') !!}
                        

                        
                     </label>
                    
                      <div class=" block  mt-1">
                        <input type="radio" name="sub_vivienda"  value="Si"  @if(old('sub_vivienda') == 'Si') checked @endif> Si
                           <input type="radio" name="sub_vivienda"   value="No" @if(old('sub_vivienda') == 'No') checked @endif> No
                        </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700">
                        {!! Form::label('sisben', 'Puntaje Sisben') !!}
               

                        
                     </label>
                     {{-- {{ Form::text('sisben', Input::old('sisben'), ['class'=> 'form-input mt-1 block w-full']) }} --}}
                     <select name="sisben" class="form-select block  mt-1">
                        <option selected hidden value=""> -- Seleccionar -- </option>                  
                        <option>No</option>  
                        <option>0-10</option>
                          <option>10-20</option>  
                          <option>20-30</option>  
                          <option>30-40</option>  
                          <option>40-50</option>  
                          <option>Mas de 50</option>                                                              
                      </select>
                </div>

            </div>

            <div class=" pt-6">
                <hr class="pt-6"/>
                <label class="text-gray-700 pt-6  text font-bold" >
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
                        <input type="radio" name="piso"  value="Si"  @if(old('piso') == 'Si') checked @endif> Si
                           <input type="radio" name="piso"   value="No" @if(old('piso') == 'No') checked @endif> No
                        </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" >
                        {!! Form::label('techo', 'Techo') !!}                                   
                     </label>
                     
                      <div class=" block  mt-1">
                        <input type="radio" name="techo"  value="Si"  @if(old('techo') == 'Si') checked @endif> Si
                           <input type="radio" name="techo"   value="No" @if(old('techo') == 'No') checked @endif> No
                        </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" >
                        {!! Form::label('pañete', 'Pañete') !!}
                        
                        
                     </label>
                     

                      <div class=" block  mt-1">
                        <input type="radio" name="pañete"  value="Si"  @if(old('pañete') == 'Si') checked @endif> Si
                           <input type="radio" name="pañete"   value="No" @if(old('pañete') == 'No') checked @endif> No
                        </div>

                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" >
                        {!! Form::label('baños', 'Baños') !!}
                       
                        
                     </label>
                     

                      <div class=" block  mt-1">
                        <input type="radio" name="baños"  value="Si"  @if(old('baños') == 'Si') checked @endif> Si
                           <input type="radio" name="baños"   value="No" @if(old('baños') == 'No') checked @endif> No
                        </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" >
                        {!! Form::label('baño_nuevo', 'Baño nuevo') !!}
                       
                        
                     </label>
                    
                      <div class=" block  mt-1">
                        <input type="radio" name="baño_nuevo"  value="Si"  @if(old('baño_nuevo') == 'Si') checked @endif> Si
                           <input type="radio" name="baño_nuevo"   value="No" @if(old('baño_nuevo') == 'No') checked @endif> No
                        </div>
                </div>
                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="text-gray-700" >
                        {!! Form::label('vivienda_nueva', 'Vivienda Nueva') !!}
                       
                        
                     </label>
                   
                      <div class=" block  mt-1">
                        <input type="radio" name="vivienda_nueva"  value="Si"  @if(old('vivienda_nueva') == 'Si') checked @endif> Si
                           <input type="radio" name="vivienda_nueva"   value="No" @if(old('vivienda_nueva') == 'No') checked @endif> No
                        </div>
                </div>
              
               
            </div>
            <div class=" pt-6">
            {{ Form::submit('Registrar Censo', ['class'=>'border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline']) }}
            </div>

            {{ Form::close() }}

        </div>
        {{-- <div class="bg-green-700 shadow-2xl rounded px-8 pt-6 pb-8  flex flex-col ">
            <h3 class="text-2xl text-white font-semibold">Beneficiarios</h3>                   
        </div> --}}
    </div>     
</x-app-layout>

<script>
$('#tipo_vivienda').on('change', function(){
	$("#escrituras").val($('#tipo_vivienda option:selected').attr('escrituras'));
});

    </script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>