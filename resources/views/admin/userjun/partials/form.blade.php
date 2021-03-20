<div class="content bg-warning text-dark">
    <h3>Presidente</h3>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre/Apellidos:') !!}
            {!! Form::text('presi[nombre]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('presi[nombre]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tip_identificacion', 'Tipo de identificacion:') !!}
            {!! Form::select('presi[Tip_identificacion]',$documen,null, ['class' => 'form-control']) !!}
        
            @error('presi[Tip_identificacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_identificacion', 'Identificacion: ') !!}
            {!! Form::text('presi[Num_identificacion]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de identificacion']) !!}
        
            @error('presi[Num_identificacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_contacto', 'Telefono:') !!}
            {!! Form::text('presi[Num_contacto]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de telefonico']) !!}
        
            @error('presi[Num_contacto]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Niv_educacion', 'Nivel de educacion') !!}
            {!! Form::select('presi[Niv_educacion]', $estudio,null, ['class' => 'form-control']) !!}
        
            @error('presi[Niv_educacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Correo	', 'Correo:') !!}
            {!! Form::text('presi[Correo]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('presi[Correo]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Cargo', 'Cargo:') !!}
            {!! Form::text('presi[Cargo]', 'presidente', ['class' => 'form-control', 'readonly']) !!}
        
            @error('presi[Cargo]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta_id', 'Junta A. Comunal: ') !!}
            {!! Form::select('presi[junta_id]',array($junta->id => $junta->Vereda), ['class' => 'form-control']) !!}
        
            @error('presi[junta_id]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
</div>
<div class="content bg-warning text-dark">
    <h3>Secretario</h3>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre/Apellidos:') !!}
            {!! Form::text('secre[nombre]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('secre[nombre]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tip_identificacion', 'Tipo de identificacion:') !!}
            {!! Form::select('secre[Tip_identificacion]',$documen,null, ['class' => 'form-control']) !!}
        
            @error('secre[Tip_identificacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_identificacion', 'Identificacion: ') !!}
            {!! Form::text('secre[Num_identificacion]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de identificacion']) !!}
        
            @error('secre[Num_identificacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_contacto', 'Telefono:') !!}
            {!! Form::text('secre[Num_contacto]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de telefonico']) !!}
        
            @error('secre[Num_contacto]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Niv_educacion', 'Nivel de educacion') !!}
            {!! Form::select('secre[Niv_educacion]',$estudio,null, ['class' => 'form-control']) !!}
        
            @error('secre[Niv_educacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Correo	', 'Correo:') !!}
            {!! Form::text('secre[Correo]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('secre[Correo]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Cargo', 'Cargo:') !!}
            {!! Form::text('secre[Cargo]', 'secretario/a', ['class' => 'form-control', 'readonly']) !!}
        
            @error('secre[Cargo]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta_id', 'Junta A. Comunal: ') !!}
            {!! Form::select('secre[junta_id]',array($junta->id => $junta->Vereda), ['class' => 'form-control']) !!}
        
            @error('secre[junta_id]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
</div>
<div class="content bg-warning text-dark">
    <h3>Tesorero</h3>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre/Apellidos:') !!}
            {!! Form::text('teso[nombre]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('teso[nombre]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tip_identificacion', 'Tipo de identificacion:') !!}
            {!! Form::select('teso[Tip_identificacion]',$documen,null,  ['class' => 'form-control']) !!}
        
            @error('teso[Tip_identificacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_identificacion', 'Identificacion: ') !!}
            {!! Form::text('teso[Num_identificacion]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de identificacion']) !!}
        
            @error('teso[Num_identificacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_contacto', 'Telefono:') !!}
            {!! Form::text('teso[Num_contacto]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de telefonico']) !!}
        
            @error('teso[Num_contacto]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Niv_educacion', 'Nivel de educacion') !!}
            {!! Form::select('teso[Niv_educacion]',$estudio,null, ['class' => 'form-control']) !!}
        
            @error('teso[Niv_educacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Correo	', 'Correo:') !!}
            {!! Form::text('teso[Correo]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('teso[Correo]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Cargo', 'Cargo:') !!}
            {!! Form::text('teso[Cargo]', 'tesorero/a', ['class' => 'form-control', 'readonly']) !!}
        
            @error('teso[Cargo]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta_id', 'Junta A. Comunal: ') !!}
            {!! Form::select('teso[junta_id]',array($junta->id => $junta->Vereda), ['class' => 'form-control']) !!}
        
            @error('teso[junta_id]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
</div>
<div class="content bg-warning text-dark">
    <h3>Representante</h3>
</div>
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre/Apellidos:') !!}
            {!! Form::text('repre[nombre]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('repre[nombre]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tip_identificacion', 'Tipo de identificacion:') !!}
            {!! Form::select('repre[Tip_identificacion]',$documen,null, ['class' => 'form-control']) !!}
        
            @error('repre[Tip_identificacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_identificacion', 'Identificacion: ') !!}
            {!! Form::text('repre[Num_identificacion]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de identificacion']) !!}
        
            @error('repre[Num_identificacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Num_contacto', 'Telefono:') !!}
            {!! Form::text('repre[Num_contacto]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de telefonico']) !!}
        
            @error('repre[Num_contacto]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Niv_educacion', 'Nivel de educacion') !!}
            {!! Form::select('repre[Niv_educacion]', $estudio,null, ['class' => 'form-control']) !!}
        
            @error('repre[Niv_educacion]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Correo	', 'Correo:') !!}
            {!! Form::text('repre[Correo]', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la ubicacion de la junta']) !!}
        
            @error('repre[Correo]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Cargo', 'Cargo:') !!}
            {!! Form::text('repre[Cargo]', 'representante', ['class' => 'form-control', 'readonly']) !!}
        
            @error('repre[Cargo]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta_id', 'Junta A. Comunal: ') !!}
            {!! Form::select('repre[junta_id]',array($junta->id => $junta->Vereda), ['class' => 'form-control']) !!}
        
            @error('repre[junta_id]')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
</div>

