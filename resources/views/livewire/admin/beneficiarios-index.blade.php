
<div class="card">
    
      
    <div class="card-header">
         
        
        
        
        <div class="row">
            <div class="col">
        <input wire:model="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col">   
        
        <select wire:model="documento" class="form-control text-muted">
            <option value=""> Tipo Doc </option>
            <option value="R.C">R.C</option>
            <option value="T.I">T.I</option>
            <option value="C.C">C.C</option>
            <option value="C.E">C.E</option>
          </select>
            </div>
            <div class="col">   
        <input wire:model="numero" class="form-control" placeholder="Numero">
    </div>
        <div class="col-md-2">   
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Rango Edad</span>
                </div>
                <input wire:model="edad_max" class="form-control" placeholder="Max" >
                <input wire:model="edad_min" class="form-control" placeholder="Min" >
              </div>
            
           
    </div>
        <div class="col">   
        
        <select wire:model="genero" class="form-control text-secondary">
            <option value=""> Género </option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
            <option value="O">Otro</option>
          </select>
    </div>
        <div class="col">   
       
        <select  wire:model="afiliacion" class="form-control text-secondary">
            <option value=""> Tipo Afiliacion </option>
            <option>Ninguna</option>                         
            <option>Subsidiado</option>
            <option>Contributivo</option>                       
             
          </select>
    </div>
        <div class="col">   
        <input wire:model="eps" class="form-control" placeholder="EPS">
        {{-- <select name="salud" class="form-control">
                           
            <option>Ninguna</option>
            @foreach ($eps as $entidad)
            <option>{{$entidad->name}}</option>
            @endforeach  
           
             
          </select> --}}
    </div>
        <div class="col">   
        
        <select wire:model="discapacidad" class="form-control text-secondary">
            <option value=""> Discapacidad </option>
            <option>Ninguna</option>
            <option>Fisica</option>
            <option>Mental</option>
            <option>Sensorial</option>
          </select>
    </div>
        <div class="col">   
        
        <select wire:model="edu" class="form-control text-secondary">
            <option value=""> Nivel Edu </option>
            <option>Ninguna</option>
            <option>Primaria</option>
            <option>Secundaria</option>
            <option>Universidad</option>
          </select>
    </div>
    <div class="col">   
    <input wire:model="afiliado" class="form-control" placeholder="ID-Afiliado">
    </div>
    </div>

    @if ($beneficiarios->count())
        
        <div class="card-body">
            <div class="table-responsive">
            <table id="beneficiarios"class="table table-striped">
                <thead>
                    <tr>
                        
                        <th >#</th>                     
                        <th >Nombre</th>
                        <th >Tipo_Doc</th>
                        <th >Numero</th>
                        <th >Edad</th>
                        <th >Genero</th>
                        <th >Afiliacion salud</th>
                        <th >EPS</th>
                        <th >Discapacidad</th>
                        <th>Nivel Educativo</th>
                        <th >Afiliado</th>
                        <th colspan="2">                                                                       
                            <div>Exportar</div>                                    
                            <a class="btn btn-danger text-white" wire:click="exportar">PDF</a>
                            {{-- <a class="btn btn-success  text-white" wire:click="exportarXL" >Excel</a>                                                               --}}
                         </th> 
                    </tr>
                </thead>

                <tbody>
                    @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{$loop->iteration}}</td>                                                                                 
                            <td>{{$beneficiario->name}}</td>
                            <td>{{$beneficiario->tipo_doc}}</td>
                            <td>{{$beneficiario->numero}}</td>
                            <td>{{$beneficiario->edad}}</td>
                            <td>{{$beneficiario->genero}}</td>
                            <td>{{$beneficiario->tipo_salud}}</td>
                            <td>{{$beneficiario->salud}}</td>
                            <td>{{$beneficiario->discap}}</td>
                            <td>{{$beneficiario->nivel_edu}}</td>
                            <td><a href="{{route('admin.users.index')}}">{{$beneficiario->user['id'].'-'.$beneficiario->user['name'] }}</a></td>

                            <td width="10px">
                                {{-- @can('admin.beneficiarios.edit') --}}
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.beneficiarios.edit', $beneficiario)}}">Editar</a>
                                {{-- @endcan --}}
                            </td>
                            <td width="10px">
                                {{-- @can('admin.beneficiarios.destroy') --}}
                                    <form action="{{route('admin.beneficiarios.destroy', $beneficiario)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                {{-- @endcan --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        
        <div class="card-footer">
            {{$beneficiarios->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro ...</strong>
        </div>
    @endif
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"></script>
<script>
    
    $(document).ready(function() {
  $("#beneficiarios").DataTable();
});
    </script>