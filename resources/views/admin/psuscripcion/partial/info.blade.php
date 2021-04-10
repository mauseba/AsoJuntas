<div class="row">
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('ID', 'Id de afiliacion:') !!}
            {!! Form::text('ID', $userl->id, ['class' => 'form-control', 'readonly']) !!}
    
    
            @error('ID')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
</div>
 
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta', 'Junta de accion comunal:') !!}
            {!! Form::text('junta', $userl->Nombre, ['class' => 'form-control', 'readonly']) !!}
    
    
            @error('junta')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
        
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Nit', 'Nit de la junta A.C:') !!}
            {!! Form::text('Nit', $userl->Nit, ['class' => 'form-control', 'readonly']) !!}
    
    
            @error('Nit')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Resolucion', 'Resolucion de la junta A.C:') !!}
            {!! Form::text('Resolucion', $userl->Resolucion, ['class' => 'form-control', 'readonly']) !!}
    
    
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
            {!! Form::text('nombre', $userl->nombre, ['class' => 'form-control', 'readonly']) !!}


            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Direccion', 'Direccion del afiliado:') !!}
            {!! Form::text('Direccion', $userl->Direccion, ['class' => 'form-control', 'readonly']) !!}
    
    
            @error('Direccion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tdocumento', 'Tipo de documento:') !!}
            {!! Form::text('Tdocumento', $userl->Tip_identificacion, ['class' => 'form-control', 'readonly']) !!}
    
    
            @error('Tdocumento')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Documento', 'N. documento:') !!}
            {!! Form::text('Documento', $userl->Num_identificacion, ['class' => 'form-control', 'readonly']) !!}
    
    
            @error('Documento')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('Expedido', 'Lugar de expedicion del documento:') !!}
            {!! Form::text('Expedido', null, ['class' => 'form-control']) !!}
        
        
            @error('Expedido')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        
        </div>
       
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tipo', 'Seleccione el tipo de certificado') !!}
            {!! Form::select('Tipo',array('0'=>'Afiliacion','1'=>'Residencia'), null, ['class' => 'form-control']) !!}
        
        
            @error('Tipo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        
        </div>
    </div>
</div> 


