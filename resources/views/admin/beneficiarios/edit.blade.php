@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Editar Beneficiario</h1>
@stop

@section('content')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
             @endif
            
            {!! Form::model($beneficiarios, ['route' => ['admin.beneficiarios.update', $beneficiarios], 'method' => 'put']) !!}

                <div class="form-group">                   
                        <label >Nombre</label>
                        <input required value="{{ $beneficiarios->name }}" name="name" class="form-control " type="text" placeholder="Nombre"/>                   
                </div>
                <div class="form-group">
                    <label >  Tipo de Documento</label>
                    <div class="relative inline-block text-gray-700">
                        <select name="tipo_doc"  class="form-control ">
                            
                            <option @if ( $beneficiarios->tipo_doc  == 'R.C') selected="selected" @endif>R.C</option>
                            <option @if ( $beneficiarios->tipo_doc  == 'T.I') selected="selected" @endif>T.I</option>
                            <option @if ( $beneficiarios->tipo_doc  == 'C.C') selected="selected" @endif>C.C</option>
                            <option @if ( $beneficiarios->tipo_doc  == 'C.E') selected="selected" @endif>C.E</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">                   
                    <label >Número de identificación</label>
                    <input required name="numero" value="{{ $beneficiarios->numero }}" class="form-control"  type="number" placeholder="Numero" size="10"/>
                                 
                </div>
                <div class="form-group">                   
                    <label >Edad</label>
                    <input required name="edad" value="{{ $beneficiarios->edad }}" class="form-control" type="number" placeholder="Edad" min="1"  max="99"/>
                  
                </div>
                <div class="form-group">
                    <label  >
                        Género
                    </label>
                    <div class="relative inline-block text-gray-700">
                        <select name="genero" class="form-control">
                            
                            <option @if ( $beneficiarios->genero  == 'M') selected="selected" @endif>M</option>
                          <option @if ( $beneficiarios->genero  == 'F') selected="selected" @endif>F</option>
                          <option @if ( $beneficiarios->genero  == 'LGBTI') selected="selected" @endif>LGBTI</option>
                        </select>
                        
                      </div>
                </div>
                <div class="form-group">
                    <label  >
                        Tipo de Afiliación de salud
                    </label>
                    <div class="relative inline-block text-gray-700">
                        <select name="tipo_salud" class="form-control">
                           
                          <option @if ( $beneficiarios->tipo_salud  == 'Ninguna') selected="selected" @endif>Ninguna</option>                         
                          <option @if ( $beneficiarios->tipo_salud  == 'Subsidiado') selected="selected" @endif>Subsidiado</option>
                          <option @if ( $beneficiarios->tipo_salud  == 'Contributivo') selected="selected" @endif>Contributivo</option>                       
                           
                        </select>
                       
                      </div>
                </div>
                <div class="form-group">
                    <label  >
                       EPS
                    </label>
                    <div class="relative inline-block text-gray-700">
                        <select name="salud" class="form-control">
                            
                          <option @if ( $beneficiarios->salud  == 'Ninguna') selected="selected" @endif>Ninguna</option>
                          @foreach ($eps as $entidad)
                          <option @if ( $beneficiarios->salud  == $entidad) selected="selected" @endif>{{$entidad->name}}</option>
                          @endforeach  
                         
                           
                        </select>
                       
                      </div>
                </div>
                <div class="form-group">
                    <label  >
                        Discapacidad
                    </label>
                    <div class="relative inline-block text-gray-700">
                        <select name="discap"  class="form-control">
                           
                            <option @if ( $beneficiarios->discap  == 'Ninguna') selected="selected" @endif>Ninguna</option>
                          <option @if ( $beneficiarios->discap  == 'Fisica') selected="selected" @endif>Fisica</option>
                          <option @if ( $beneficiarios->discap  == 'Mental') selected="selected" @endif>Mental</option>
                          <option @if ( $beneficiarios->discap  == 'Sensorial') selected="selected" @endif>Sensorial</option>
                        </select>
                       
                      </div>
                </div>
                <div class="form-group">
                    <label  >
                        Nivel Educativo
                    </label>
                    <div class="relative inline-block text-gray-700">
                        <select name="nivel_edu" class=" my-select form-control">
                            
                            <option  @if ( $beneficiarios->nivel_edu  == 'Ninguna') selected="selected" @endif>Ninguna</option>
                          <option  @if ( $beneficiarios->nivel_edu  == 'Primaria') selected="selected" @endif>Primaria</option>
                          <option  @if ( $beneficiarios->nivel_edu  == 'Secundaria') selected="selected" @endif>Secundaria</option>
                          <option  @if ( $beneficiarios->nivel_edu  == 'Universidad') selected="selected" @endif>Universidad</option>
                        </select>
                       
                </div>
                
                {!! Form::submit('Actualizar Beneficiario', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
                </div>
        </div>
        
    </div>
    <a class="btn btn-secondary" href="{{route('admin.beneficiarios.index')}}">Volver</a>
   {{--  <div class="flex flex-col bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-md w-full max-w-md ">                               
        
        <form method="POST" action="/beneficiarios/{{ $beneficiarios->id }}" enctype="multipart/form-data"> 
            @method('PATCH')
            @csrf()

            
            
            
                
            
               </form>
            
            
    </div> --}}
    
    
     
@stop
@section('footer')
    <div class="text-center">
        <strong> 
            Copyright © 2021 
            <a href="/">Asojuntas</a>.
        </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-block">
            <b>Version</b>
            1.0
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
    

@endsection