<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="">seleccione el nombre del afiliado:</label><br>
            <select id="user" name="user_id" class="selectpicker" data-live-search="true" >
                @foreach ($users as $user)
                        <option  data-subtext='{{$user->Num_identificacion}}' value={{$user->id}} >{{$user->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('nucleo_fam', 'Nucleo Familiar') !!}
    {!! Form::select('nucleo_fam', array('Seleccionar','Conyuge'=>'Conyuge','Hijo/a'=>'Hijo/a','Padre/Madre'=>'Padre/Madre'),null, ['class' => 'form-control']) !!}

<div class="form-group">
    {!! Form::label('name', 'Nombre del Beneficiario') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del beneficiario']) !!}

</div>
<div class="form-group">
    {!! Form::label('sub_gobierno', 'Subsidio Gobierno:') !!}
    {!! Form::select('sub_gobierno', array('Seleccionar','Ninguno'=>'Ninguno','Familias en Accion'=>'Familias en Accion','Jovenes en Accion'=>'Jovenes en Accion','Adulto Mayor'=>'Adulto Mayor','Otro'=>'Otro'),null, ['class' => 'form-control']) !!}

</div>
<div class="row">
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('tipo_doc', 'Tipo de Documento') !!}
            {!! Form::select('tipo_doc',$doc,null, ['class' => 'form-control']) !!}
            
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('numero', 'Número de identificación:') !!}
            {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su número de identificacións']) !!}
    
        </div>
    </div>
   <div class="col-3">
        <div class="form-group">
            {!! Form::label('edad', 'Edad:') !!}
            <input required name="edad" class="form-control" type="number" placeholder="Edad" min="1" max="99" />

        </div>
   </div>
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('genero', 'Género:') !!}
            {!! Form::select('genero',array('M' => 'Masculino','F' => 'Femenino','O'=> 'Otro'), null, ['class' => 'form-control','required']) !!}
        </div>
    </div>

</div>
<div class="row">
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('tipo_salud', 'Tipo de Afiliación de salud:') !!}
            {!! Form::select('tipo_salud', array('Ninguna'=>'Ninguna','Subsidiado'=>'Subsidiado','Contributivo'=>'Contributivo'),null, ['class' => 'form-control']) !!}
        </div>
    </div>
   <div class="col-3">
        <div class="form-group">
            {!! Form::label('salud', 'EPS:') !!}
        
            <select name="salud" class="form-control">
                <option>Ninguna</option>
                @foreach ($eps as $entidad)
                <option>{{$entidad->name}}</option>
                @endforeach
            </select>

        </div>
   </div>
   <div class="col-3">
        <div class="form-group">
            {!! Form::label('discap', 'Discapacidad:') !!}
            {!! Form::select('discap', array('Ninguna'=>'Ninguna',
            'Fisica'=>'Fisica',
            'Intelectual'=>'Intelectual',
            'Sensorial'=>'Sensorial',
            'Psiquica'=>'Psiquica',
            'Viseral'=>'Viseral',
            'Multiple'=>'Multiple'),null, ['class' => 'form-control']) !!}
        </div>
   </div>
    <div class="col-3">
        <div class="form-group ">
            {!! Form::label('nivel_edu', 'Nivel Educativo:') !!}
            {!! Form::select('nivel_edu', $estu, null, ['class' => 'form-control']) !!}
    
        </div>
    </div>
    
</div>