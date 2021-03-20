<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre/Apellidos:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('nombre')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tip_identificacion', 'Tipo de identificacion:') !!}
            {!! Form::select('Tip_identificacion', $documen,null,['class' => 'form-control']) !!}
        
            @error('Tip_identificacion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_identificacion', 'Identificacion: ') !!}
            {!! Form::text('Num_identificacion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de identificacion']) !!}
        
            @error('Num_identificacion')
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
            {!! Form::select('Niv_educacion', $estudio,null, ['class' => 'form-control']) !!}
        
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
            {!! Form::text('Correo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su correo electronico']) !!}
        
            @error('Correo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Cargo', 'Cargo:') !!}
            {!! Form::text('Cargo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su correo electronico']) !!}
        
            @error('Cargo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta_id', 'Junta A. Comunal: ') !!}
            {!! Form::select('junta_id',$juntas,null,['class' => 'form-control']) !!}
        
            @error('junta_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
</div>