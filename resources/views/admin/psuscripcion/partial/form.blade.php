<div class="row">
    <div class="col-3">
        <div class="form-group">
            {!! Form::label('FechaP', 'Fecha') !!}
            {!! Form::date('FechaP',\Carbon\Carbon::now(),['class' => 'form-control'])!!}
            
            @error('FechaP')
                <small class="text-danger">{{$message}}</small>
            @enderror
        
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('Mes', 'Mes de pago:') !!}
            {!! Form::select('Mes',array(
                'Enero' => 'Enero',
                'Febrero' => 'Febrero',
                'Marzo' => 'Marzo',
                'Abril' => 'Abril',
                'Mayo' => 'Mayo',
                'Junio' => 'Junio',
                'Julio' => 'Julio',
                'Agosto' => 'Agosto',
                'Septiembre' => 'Septiembre',
                'Octubre' => 'Octubre',
                'Noviembre' => 'Noviembre',
                'Diciembre' => 'Diciembre'
            ),null, ['class' => 'form-control']) !!}

            @error('Mes')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('junta_id', 'Junta de accion comunal:') !!}
            {!! Form::select('junta_id',$juntas,null, ['class' => 'form-control']) !!}

            @error('junta_id')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('tipo', 'Tipo de pago:') !!}
            {!! Form::select('tipo',array('suscripcion'=>'Suscripcion','bimestral'=>'Bimestral','anual'=>'Anual'),null, ['class' => 'form-control']) !!}

            @error('tipo')
                <small class="text-danger">{{$message}}</small>
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