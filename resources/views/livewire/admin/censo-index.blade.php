<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col">
        <input wire:model="barrio" class="form-control" placeholder="Barrio">
            </div>
            <div class="col">   
        <input wire:model="direccion" class="form-control" placeholder="direccion">
            </div>
            <div class="col">   
        <input wire:model="tipo_vivienda" class="form-control" placeholder="Tipo vivienda">
    </div>
        <div class="col">   
        <input wire:model="energia" class="form-control" placeholder="Energia">
    </div>
        <div class="col">   
        <input wire:model="gas" class="form-control" placeholder="Gas">
    </div>
        <div class="col">   
        <input wire:model="agua" class="form-control" placeholder="Agua">
    </div>
    <div class="col">   
        <input wire:model="alcantarilla" class="form-control" placeholder="Alcantarilla">
    </div>
    <div class="col">   
        <input wire:model="escrituras" class="form-control" placeholder="Escrituras">
    </div>
    <div class="row">
        <div class="col">   
            <input wire:model="sisben" class="form-control" placeholder="Sisben">
        </div>
        <div class="col">   
            <input wire:model="sub_vivienda" class="form-control" placeholder="Sub Vivienda">
        </div>
        <div class="col">   
            <input wire:model="piso" class="form-control" placeholder="Piso">
        </div>
        <div class="col">   
            <input wire:model="techo" class="form-control" placeholder="Techo">
        </div>
        <div class="col">   
            <input wire:model="pañete" class="form-control" placeholder="Pañete">
        </div>
        <div class="col">   
            <input wire:model="baños" class="form-control" placeholder="Baño">
        </div>
        <div class="col">   
            <input wire:model="baño_nuevo" class="form-control" placeholder="Baño Nuevo">
        </div>
        <div class="col">   
            <input wire:model="vivienda_nueva" class="form-control" placeholder="Vivienda Nueva">
        </div>
    </div>
    </div>

    @if ($censo->count())
        
        <div class="card-body">
            <div class="table-responsive">
            <table  class="table table-striped {{-- table-bordered table-sm --}}" cellspacing="0" 
         >
                <thead>
                    <tr>
                        <th >ID</th>
                        <th >Afiliado</th>
                        <th >Barrio</th>
                        <th >Direccion</td>
                        <th >Tipo Vivienda</td>
                        <th >Energia</td>
                        <th >Gas</td>
                        <th >Agua</td>
                        <th >Alcantarilla</td>
                        <th >Escrituras</td> 
                        <th >Sisben</td> 
                        <th  >Sub Vivienda</td> 
                        <th >Piso</td> 
                        <th >Techo</td> 
                        <th >Pañete</td> 
                        <th >Baños</td> 
                        <th >Baño Nuevo</td> 
                        <th >Vivienda Nueva</td> 
                        <th colspan="2"></td>    
                    </tr>
                </thead>

                <tbody>
                    @foreach ($censo as $censos)
                        <tr>
                            <td>{{$censos->id}}</td>
                            <td>{{$censos->user_id}}</td>                            
                            <td>{{$censos->barrio}}</td>
                            <td>{{$censos->direccion}}</td>
                            <td>{{$censos->tipo_vivienda}}</td>
                            <td>{{$censos->energia}}</td>
                            <td>{{$censos->gas}}</td>
                            <td>{{$censos->agua}}</td>
                            <td>{{$censos->alcantarilla}}</td>
                            <td>{{$censos->escrituras}}</td>
                            <td>{{$censos->sisben}}</td>
                            <td>{{$censos->sub_vivienda}}</td>
                            <td>{{$censos->piso}}</td>
                            <td>{{$censos->techo}}</td>
                            <td>{{$censos->pañete}}</td>
                            <td>{{$censos->baños}}</td>
                            <td>{{$censos->baño_nuevo}}</td>
                            <td>{{$censos->vivienda_nueva}}</td>
                            
                            <td with="5px">
                               
                            </td>
                            <td with="5px">
                                
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
        
        <div class="card-footer">
            {{$censo->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro ...</strong>
        </div>
    @endif
</div>

