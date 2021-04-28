<div class="row">
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('FechaC', 'Fecha de registro') !!}
            {!! Form::date('FechaC',\Carbon\Carbon::now(),['class' => 'form-control'])!!}
            
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
            {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('nombre')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tip_identificacion', 'Tipo de identificacion:') !!}
            {!! Form::select('Tip_identificacion',$documen,null, ['class' => 'form-control']) !!}
        
            @error('Tip_identificacion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_identificacion', 'Identificacion: ') !!}
            {!! Form::text('Num_identificacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de identificacion']) !!}
        
            @error('Num_identificacion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
     
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('Direccion', 'Direccion: ') !!}
            {!! Form::text('Direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion']) !!}
        
            @error('Direccion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div> 
    <div class="col">
        <div class="form-group">
            {!! Form::label('Genero', 'Genero: ') !!}
            {!! Form::select('Genero',array('M' => 'Masculino','F' => 'Femenino','O'=> 'Otro'), null, ['class' => 'form-control']) !!}
        
            @error('Genero[]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div> 
    <div class="col">
        <div class="form-group">
            {!! Form::label('estrato', 'Estrato de vivienda: ') !!}
            {!! Form::select('estrato',array( 1 => '1', 2 => '2', 3 => '3', 4=> '4', 5=> '5'),null, ['class' => 'form-control']) !!}
        
            @error('estrato')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div> 
    <div class="col">
        <div class="form-group">
            {!! Form::label('Edad', 'Edad:') !!}
            {!! Form::text('Edad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la edad del Asociado']) !!}
        
            @error('Edad')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_contacto', 'Telefono:') !!}
            {!! Form::text('Num_contacto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de telefonico']) !!}
        
            @error('Num_contacto')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Niv_educacion', 'Nivel de educacion') !!}
            {!! Form::select('Niv_educacion', $estudio, null, ['class' => 'form-control']) !!}
        
            @error('Niv_educacion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>

</div>
<div class="row">

    <div class="col">
        <div class="form-group">
            {!! Form::label('Correo	', 'Correo:') !!}
            {!! Form::text('Correo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo del afiliado']) !!}
        
            @error('Correo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="directivos form-group">
            {!! Form::label('Cargo', 'Cargo:') !!}
            {!! Form::select('Cargo', array('afiliado'=>'Afiliado','presidente'=>'Presidente/a','vicepresidente'=>'Vicepresidente/a','secretario'=>'Secretario/a','tesorero'=>'Tesorero/a','fiscal'=>'Fiscal'),null, ['class' => 'form-control']) !!}
        
            @error('Cargo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta_id', 'Junta A. Comunal: ') !!}
            {!! Form::select('junta_id',$juntas,null, ['class' => 'form-control']) !!}
        
            @error('junta_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('comision_id', 'Comision') !!}
            {!! Form::select('comision_id',array(
                'Normales' => $comisionN,
                'Especiales' => $comisionE,
            ), null, ['class' => 'form-control']) !!}
        
            @error('comision_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>

</div>

