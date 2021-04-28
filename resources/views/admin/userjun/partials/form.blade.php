
<div class="card-body" id="dv">
    <h3 class="text-center">Datos del afiliado</h3>
    <div class="d-flex">
        <input class="btn btn-primary ml-auto" id="btn" type="button" value="+">
        <input type="button" class="remove btn btn-danger" id="btnE"  value="-" style="display:none;" >
    </div>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                {!! Form::label('FechaC', 'Fecha de registro') !!}
                {!! Form::date('FechaC[]',\Carbon\Carbon::now(),['class' => 'form-control'])!!}
                
                @error('FechaC')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6"  >
            <div class="form-group" >
                {!! Form::label('nombre', 'Nombre/Apellidos:') !!}
                {!! Form::text('nombre[]', null, ['class' => 'form-control','maxlength' => '50','placeholder' => 'Ingrese el nombre del afiliado','required']) !!}
            
                @error('nombre')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('Tip_identificacion', 'Tipo de identificacion:') !!}
                {!! Form::select('Tip_identificacion[]',$documen,null, ['class' => 'form-control','required']) !!}
            
                @error('Tip_identificacion[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('Num_identificacion', 'Identificacion: ') !!}
                {!! Form::text('Num_identificacion[]', null, ['class' => 'form-control','maxlength' => '11', 'placeholder' => 'Ingrese el numero de identificacion','pattern' => "[0-9]{5,11}",'required']) !!}
            
                @error('Num_identificacion[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>    
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('Direccion', 'Direccion: ') !!}
                {!! Form::text('Direccion[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion','required']) !!}
            
                @error('Direccion[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div> 
        <div class="col">
            <div class="form-group">
                {!! Form::label('Genero', 'Genero: ') !!}
                {!! Form::select('Genero[]',array('M' => 'Masculino','F' => 'Femenino','O'=> 'Otro'), null, ['class' => 'form-control','required']) !!}
            
                @error('Genero[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div> 
        <div class="col">
            <div class="form-group">
                {!! Form::label('estrato', 'Estrato de vivienda: ') !!}
                {!! Form::select('estrato[]',array( 1=> '1', 2=> '2', 3=> '3', 4=> '4', 5=> '5'), null, ['class' => 'form-control','required']) !!}
            
                @error('estrato[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div> 
        <div class="col">
            <div class="form-group">
                {!! Form::label('Edad', 'Edad:') !!}
                {!! Form::text('Edad[]', null, ['class' => 'form-control','minlength' => '1','maxlength' => '3', 'placeholder' => 'Ingrese la edad','pattern' => "[0-9]+",'required']) !!}
            
                @error('Edad[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('Num_contacto', 'Telefono:') !!}
                {!! Form::text('Num_contacto[]', null, ['class' => 'form-control','maxlength' => '15', 'placeholder' => 'Ingrese el numero de telefonico','pattern' => "([0-9])*",'required']) !!}
            
                @error('Num_contacto[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('Niv_educacion', 'Nivel de educacion') !!}
                {!! Form::select('Niv_educacion[]', $estudio, null, ['class' => 'form-control','required']) !!}
            
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
                {!! Form::email('Correo[]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo del afiliado','pattern'=>'[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$','required']) !!}
            
                @error('Correo[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>
        <div class="col">
            <div class="form-group1">
                {!! Form::label('Cargo', 'Cargo:') !!}
                {!! Form::text('Cargo[]', 'afiliado', ['class' => 'form-control','readonly','required']) !!}
            
                @error('Cargo[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>
        <div class="col">
            <div class="form-group1">
                {!! Form::label('junta_id', 'Junta A. Comunal: ') !!}
                {!! Form::select('junta_id[]',$junta,null, ['class' => 'form-control','required']) !!}
            
                @error('junta_id[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group1">
                {!! Form::label('comision_id', 'Comision') !!}
                {!! Form::select('comision_id[]',array(
                    'Normales' => $comisionN,
                    'Especiales' => $comisionE,
                ), null, ['class' => 'form-control','required']) !!}
            
                @error('comision_id[]')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            
            </div>
        </div>
    </div>
</div>


