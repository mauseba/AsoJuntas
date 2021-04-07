<div class="row">
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('FechaC', 'Fecha') !!}
            {!! Form::date('FechaC',\Carbon\Carbon::now(),['class' => 'form-control', 'readonly'])!!}
            
            @error('FechaC')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('Nit', 'Numero de Nit:') !!}
    {!! Form::text('Nit', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de Nit de la junta']) !!}

    @error('Nit')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('Direccion', 'Vereda/Barrio:') !!}
    {!! Form::text('Direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la ubicacion de la junta']) !!}

    @error('Direccion')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la junta']) !!}

    @error('Nombre')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('Correo', 'Correo:') !!}
    {!! Form::text('Correo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo de la junta ']) !!}

    @error('Correo')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>


<div class="row mb-3">
    <div class="col">
        <div class="form-group">
            {!! Form::label('D_Resolucion', 'Suba la resolucion de la junta') !!}
            {!! Form::file('D_Resolucion', ['class' => 'form-control-file', 'accept' => '.pdf']) !!}
    
            @error('D_Resolucion')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <p class="text-danger text-small">*El archivo a subir debe ser tipo .pdf y no debe ser mayor a 512 kb </p>

        </div>
    
    </div>
    
    <div class="col">
        <div class="form-group">
            {!! Form::label('D_NIT', 'Suba el documento del NIT') !!}
            {!! Form::file('D_NIT', ['class' => 'form-control-file', 'accept' => '.pdf']) !!}
    
            @error('D_NIT')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <p class="text-danger text-small">*El archivo a subir debe ser tipo .pdf y no debe ser mayor a 512 kb </p>
        </div>
    
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('D_Recibopago', 'Suba el documento el recibo de pago') !!}
            {!! Form::file('D_Recibopago', ['class' => 'form-control-file', 'accept' => '.pdf']) !!}
    
            @error('D_Recibopago')
                <span class="text-danger">{{$message}}</span>
            @enderror
            <p class="text-danger text-small">*El archivo a subir debe ser tipo .pdf y no debe ser mayor a 512 kb </p>

        </div>
    
    </div>

</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>

    <label>
        {!! Form::radio('status', 1) !!}
        Activa
    </label>

    <label>
        {!! Form::radio('status', 2) !!}
        Inactiva
    </label>

    @error('status')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
<div class="form-group">
    {!! Form::label('Observaciones', 'Observaciones de la junta:') !!}
    {!! Form::textarea('Observaciones',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40, 'placeholder' => 'Ingrese alguna observacion (opcional)']) !!}

    @error('Observaciones')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>
