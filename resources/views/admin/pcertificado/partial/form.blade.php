<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('FechaP', 'Fecha') !!}
            {!! Form::date('FechaP',\Carbon\Carbon::now(),['class' => 'form-control','readonly'])!!}
            
            @error('FechaP')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
        
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta', 'Junta de accion comunal') !!}
            <input list="browsers" name="junta" id="junta" class="form-control">
            <datalist id="browsers">
                @foreach ($juntas as $junta)
                    <option value="{{$junta->Nombre}}">
                @endforeach
            </datalist>
                    
    
            @error('junta')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Nit', 'Nit de la junta A.C:') !!}
            {!! Form::text('Nit', null, ['class' => 'form-control','id' => 'nit','readonly']) !!}
    
    
            @error('Nit')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Resolucion', 'Resolucion de la junta A.C:') !!}
            {!! Form::text('Resolucion', null, ['class' => 'form-control','id' => 'resolucion','readonly']) !!}
    
    
            @error('Resolucion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
</div>
<div class="row">
    <div class="col">   
        <div class="form-group">
            {!! Form::label('nombre', 'Nombre del afiliado:') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}


            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Direccion', 'Direccion del afiliado:') !!}
            {!! Form::text('Direccion', null, ['class' => 'form-control']) !!}
    
    
            @error('Direccion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tdocumento', 'Tipo de identificacion:') !!}
            {!! Form::select('Tdocumento',$documen,null, ['class' => 'form-control','required']) !!}
        
            @error('Tdocumento')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Documento', 'Numero de identificacion:') !!}
            {!! Form::text('Documento', null, ['class' => 'form-control']) !!}
    
    
            @error('Documento')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('Expedido', 'Lugar de expedicion del doc. del afiliado:') !!}
            {!! Form::text('Expedido', null, ['class' => 'form-control']) !!}
        
        
            @error('Expedido')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        
        </div>
       
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('tipo', 'Seleccione el tipo de certificado') !!}
            {!! Form::select('tipo',array('afiliacion'=>'Afiliacion','residencia'=>'Residencia','paz-salvo'=>'Paz y Salvo'), null, ['class' => 'form-control']) !!}
        
        
            @error('tipo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        
        </div>
    </div>
</div> 
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('Comprobante', 'Suba el comprobante de la junta:') !!}
            {!! Form::file('Comprobante', ['class' => 'form-control-file', 'accept' => '.pdf, .jpg, .png']) !!}
    
            @error('Comprobante')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <p class="text-danger text-small">*El archivo a subir debe ser tipo .pdf o imagen y no debe ser mayor a 250 kb </p>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Observaciones', 'Observaciones:') !!}
            {!! Form::text('Observaciones', null, ['class' => 'form-control', 'rows' => 4, 'cols' => 15, 'placeholder' => 'Ingrese las observaciones']) !!}

            @error('Observaciones')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>
    </div>
</div>

