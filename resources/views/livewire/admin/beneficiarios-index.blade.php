<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col">
        <input wire:model="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="col">   
        <input wire:model="documento" class="form-control" placeholder="Documento">
            </div>
            <div class="col">   
        <input wire:model="numero" class="form-control" placeholder="Numero">
    </div>
        <div class="col">   
        <input wire:model="edad" class="form-control" placeholder="Edad">
    </div>
        <div class="col">   
        <input wire:model="genero" class="form-control" placeholder="Genero">
    </div>
        <div class="col">   
        <input wire:model="afiliacion" class="form-control" placeholder="Afiliacion">
    </div>
        <div class="col">   
        <input wire:model="eps" class="form-control" placeholder="EPS">
        {{-- <select name="salud" class="w-full h-10 pl-3 pr-6 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline">
                           
            <option>Ninguna</option>
            @foreach ($eps as $entidad)
            <option>{{$entidad->name}}</option>
            @endforeach  
           
             
          </select> --}}
    </div>
        <div class="col">   
        <input wire:model="discapacidad" class="form-control" placeholder="Discapacidad">
    </div>
        <div class="col">   
        <input wire:model="edu" class="form-control" placeholder="Nivel Edu">
    </div>

    </div>

    @if ($beneficiarios->count())
        
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th >ID</th>
                        <th >Nombre</th>
                        <th >Tipo_Doc</th>
                        <th >Numero</th>
                        <th >Edad</th>
                        <th >Genero</th>
                        <th >Afiliacion salud</th>
                        <th >EPS</th>
                        <th >Discapacidad</th>
                        <th >Nivel Educativo</th>
                        <th >Afiliado</th>
                        <th colspan="2"></th> 
                    </tr>
                </thead>

                <tbody>
                    @foreach ($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{$beneficiario->id}}</td>                           
                            <td>{{$beneficiario->name}}</td>
                            <td>{{$beneficiario->tipo_doc}}</td>
                            <td>{{$beneficiario->numero}}</td>
                            <td>{{$beneficiario->edad}}</td>
                            <td>{{$beneficiario->genero}}</td>
                            <td>{{$beneficiario->tipo_salud}}</td>
                            <td>{{$beneficiario->salud}}</td>
                            <td>{{$beneficiario->discap}}</td>
                            <td>{{$beneficiario->nivel_edu}}</td>
                            <td>{{$beneficiario->user_id }}</td>

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
