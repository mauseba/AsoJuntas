<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-md"> 
        <input wire:model="barrio" class="form-control" placeholder="Barrio">
        
            </div>
        <div class="col-md">   
            <input wire:model="direccion" class="form-control" placeholder="direccion">
        </div>
    <div class="col-md">   
        <select wire:model="tipo_vivienda" class="form-control ">
            <option selected value="">Tipo Vivienda</option>
            <option value="Arriendo">Arriendo</option>
            <option value="Propia">Propia</option>
            <option value="Posada">Posada</option>
        </select>
    </div>
        <div class="col-md">   
        
        <select wire:model="energia" class="form-control ">
            <option selected value="">Energia</option>
            <option value="Si">Si</option>
            <option value="No">No</option>            
        </select>
    </div>
        <div class="col-md">   
        
        <select wire:model="gas" class="form-control ">
            <option selected value="">Gas</option>
            <option value="Si">Si</option>
            <option value="No">No</option>            
        </select>
    </div>
        <div class="col-md">   
        
        <select wire:model="agua" class="form-control ">
            <option selected value="">Agua</option>
            <option value="Si">Si</option>
            <option value="No">No</option>            
        </select>
    </div>
    <div class="col-md">   
        
        <select wire:model="alcantarilla" class="form-control ">
            <option selected value="">Alcantarilla</option>
            <option value="Si">Si</option>
            <option value="No">No</option>            
        </select>
    </div>
    <div class="col-md">   
        
        <select wire:model="escrituras" class="form-control ">
            <option selected value="">Escrituras</option>
            <option value="Si">Si</option>
            <option value="No">No</option>            
        </select>
    </div>
        </div>
    <div class="row">
        <div class="col-md">   
            
            <select wire:model="sisben" class="form-control ">
                <option selected value="">Sisben</option>
                <option value="Si">Si</option>
                <option value="No">No</option>            
            </select>
        </div>
        <div class="col-md">   
            
            <select wire:model="sub_vivienda" class="form-control ">
                <option selected value="">Sub Vivienda</option>
                <option value="Si">Si</option>
                <option value="No">No</option>            
            </select>
        </div>
        <div class="col-md">   
            
            <select wire:model="piso" class="form-control ">
                <option selected value="">Piso</option>
                <option value="Si">Si</option>
                <option value="No">No</option>            
            </select>
        </div>
        <div class="col-md">   
            
            <select wire:model="techo" class="form-control ">
                <option selected value="">Techo</option>
                <option value="Si">Si</option>
                <option value="No">No</option>            
            </select>
        </div>
        <div class="col-md">   
            
            <select wire:model="pañete" class="form-control">
                <option selected value="">Pañete</option>
                <option value="Si">Si</option>
                <option value="No">No</option>            
            </select>
        </div>
        <div class="col-md">   
            
            <select wire:model="baños" class="form-control">
                <option selected value="">Baño</option>
                <option value="Si">Si</option>
                <option value="No">No</option>            
            </select>
        </div>
        <div class="col-md">   
            
            <select wire:model="baño_nuevo" class="form-control">
                <option selected value="">Baño Nuevo</option>
                <option value="Si">Si</option>
                <option value="No">No</option>            
            </select>
        </div>
        <div class="col-md">   
            
            <select wire:model="vivienda_nueva" class="form-control">
                <option selected value="">Vivienda Nueva</option>
                <option value="Si">Si</option>
                <option value="No">No</option>            
            </select>
        </div>
    </div>

    @if ($censo->count())
    <div class="row mt-2">
    <div class="mt-2" >Exportar</div>                                    
    <a class="btn btn-danger text-white " wire:click="exportar">PDF</a>
    
        <div class="col-md">              
            <input wire:model="afiliado" class="form-control w-25 p-3" placeholder="Afiliado">               
                </div>
    </div>
    {{-- <a class="btn btn-success text-white  " >Excel</a> --}}
        <div class="card-body">
            <div class="table-responsive">
            <table  class="table table-striped {{-- table-bordered table-sm --}}" cellspacing="0"   >
                <thead>
                    <tr>
                        <th >#</th>
                        <th >Afiliado</th>
                        <th >Barrio</th>
                        <th >Direccion</td>
                        <th >Tipo Vivienda</td>
                        <th >Energia</td>
                        <th >Gas</td>
                        <th >Agua</td>
                        <th >Alcantarillado</td>
                        <th >Escrituras</td> 
                        <th >Sisben</td> 
                        <th  >Sub Vivienda</td> 
                        <th >Piso</td> 
                        <th >Techo</td> 
                        <th >Pañete</td> 
                        <th >Baños</td> 
                        <th >Baño Nuevo</td> 
                        <th >Vivienda Nueva</td> 
                        <th col-mdspan="2">    </td>    
                    </tr>
                </thead>

                <tbody>
                    @foreach ($censo as $censos)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$censos->user['id'].'-'.$censos->user['name']}}</td>                            
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
                                {{-- <a class="btn btn-danger text-white " href="{{ route('pdf.censoIndividual'),$censo}}">PDF</a> --}}
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
