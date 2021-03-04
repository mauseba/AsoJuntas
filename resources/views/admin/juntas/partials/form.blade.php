<div class="form-group">
    {!! Form::label('name', 'Titulo:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la noticia']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>
    @enderror

</div>

