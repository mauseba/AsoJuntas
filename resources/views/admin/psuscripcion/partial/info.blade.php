<div>
    <div>
        <div class="form-group">
            <p>¿El afiliado esta a paz y salvo?</p>
            <input type="radio"  name="opcion" value="0">
            <label for="Si">Si</label><br>
            <input type="radio"  name="opcion" value="1">
            <label for="No">No</label><br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('id', 'Id de afiliacion:') !!}
            {!! Form::text('id', null, ['class' => 'form-control','id'=>'id', 'readonly']) !!}
    
    
            @error('id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
</div>
 
<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta', 'Junta de accion comunal:') !!}
            {!! Form::text('junta', null, ['class' => 'form-control','id'=>'junta', 'readonly']) !!}
    
    
            @error('junta')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
        
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Nit', 'Nit de la junta A.C:') !!}
            {!! Form::text('Nit', null, ['class' => 'form-control','id'=>'Nit', 'readonly']) !!}
    
    
            @error('Nit')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Resolucion', 'Resolucion de la junta A.C:') !!}
            {!! Form::text('Resolucion', null, ['class' => 'form-control','id'=>'Resolucion', 'readonly']) !!}
    
    
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
            {!! Form::text('nombre', null, ['class' => 'form-control','id'=>'nombre', 'readonly']) !!}


            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Direccion', 'Direccion del afiliado:') !!}
            {!! Form::text('Direccion', null, ['class' => 'form-control','id'=>'Direccion', 'readonly']) !!}
    
    
            @error('Direccion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Tdocumento', 'Tipo de documento:') !!}
            {!! Form::text('Tdocumento', null, ['class' => 'form-control','id'=>'Tdocumento', 'readonly']) !!}
    
    
            @error('Tdocumento')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Documento', 'N. documento:') !!}
            {!! Form::text('Documento', null, ['class' => 'form-control','id'=>'Documento', 'readonly']) !!}
    
    
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
            {!! Form::label('Tipo', 'Seleccione el tipo de certificado') !!}
            {!! Form::select('Tipo',array('0'=>'Afiliacion','1'=>'Residencia','2'=>'Paz y Salvo','3'=>'Sana Tenencia'), null, ['class' => 'form-control']) !!}
        
        
            @error('Tipo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        
        </div>
    </div>
</div> 



