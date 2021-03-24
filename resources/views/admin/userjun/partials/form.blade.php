<html>
    <body>
        <div class="container" id="dv">
            <h3 class="text-center">Datos del asociado</h3>
            <div class="d-flex">
                <input class="btn btn-primary ml-auto" id="btn" type="button" value="Agregar">
                <input type="button" class="remove btn btn-danger" id="btnE"  value="remove" style="display:none;" >
            </div>
            <div class="row">
                <div class="col-6"  >
                    <div class="form-group" >
                        {!! Form::label('nombre', 'Nombre/Apellidos:') !!}
                        {!! Form::text('nombre[]', null, ['class' => 'form-control','placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
                    
                        @error('nombre')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('Tip_identificacion', 'Tipo de identificacion:') !!}
                        {!! Form::select('Tip_identificacion[]',$documen,null, ['class' => 'form-control']) !!}
                    
                        @error('Tip_identificacion[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('Num_identificacion', 'Identificacion: ') !!}
                        {!! Form::text('Num_identificacion[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de identificacion']) !!}
                    
                        @error('Num_identificacion[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div>
                 
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('Sexo', 'Sexo: ') !!}
                        {!! Form::select('Sexo[]',array('M' => 'Masculico','F' => 'Femenino','O'=> 'Otro'), null, ['class' => 'form-control']) !!}
                    
                        @error('Sexo[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div> 
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('Edad', 'Edad:') !!}
                        {!! Form::text('Edad[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la edad del Asociado']) !!}
                    
                        @error('Edad[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('Num_contacto', 'Telefono:') !!}
                        {!! Form::text('Num_contacto[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de telefonico']) !!}
                    
                        @error('Num_contacto[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('Niv_educacion', 'Nivel de educacion') !!}
                        {!! Form::select('Niv_educacion[]', $estudio, null, ['class' => 'form-control']) !!}
                    
                        @error('Niv_educacion[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div>
            
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('Correo	', 'Correo:') !!}
                        {!! Form::text('Correo[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo del asociado']) !!}
                    
                        @error('Correo[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div>
                <div class="col">
                    <div class="form-group1">
                        {!! Form::label('Cargo', 'Cargo:') !!}
                        {!! Form::text('Cargo[]', 'asociado', ['class' => 'form-control', 'readonly']) !!}
                    
                        @error('Cargo[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    
                    </div>
                </div>
                <div class="col">
                    <div class="form-group1">
                        {!! Form::label('junta_id', 'Junta A. Comunal: ') !!}
                        {!! Form::select('junta_id[]',$junta,null, ['class' => 'form-control']) !!}
                    
                        @error('junta_id[]')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div><br>
            
    </body>
</html>

        

