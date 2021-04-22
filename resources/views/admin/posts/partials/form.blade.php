<div class="tab-content">
    <div id="home" class="container tab-pane active">  
        <div class="form-group">
            {!! Form::label('name', 'Titulo:') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el titulo de la publicacion']) !!}

            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>

        <div class="form-group">
            {!! Form::label('slug', 'Slug:') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug de la publicacion', 'readonly']) !!}
            
            @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Categoría') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

            @error('category_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            <p class="font-weight-bold">Etiquetas</p>

            @foreach ($tags as $tag)
                
                <label class="mr-2">
                    {!! Form::checkbox('tags[]', $tag->id, null) !!}
                    {{$tag->name}}
                </label>

            @endforeach

            @error('tags')
                <br>
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <p class="font-weight-bold">Estado</p>

            <label>
                {!! Form::radio('status', 1, true) !!}
                Borrador
            </label>

            <label>
                {!! Form::radio('status', 2) !!}
                Publicado
            </label>

            @error('status')
                <br>
                <small class="text-danger">{{$message}}</small>
            @enderror

        </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
        <div class="row mb-3">
            <div class="col">
                <div class="image-wrapper">
                    @isset ($post->image)
                        <img id="picture" src="{{Storage::url($post->image->url)}}">
                    @else
                        <img id="picture" src="{{asset('imagenes/Girasoles.jpg')}}">
                    @endisset
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    {!! Form::label('file', 'Imagen que se mostrará en la publicacion') !!}
                    {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                    @error('file')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

            </div>
        </div>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>    
        <div class="form-group">
            {!! Form::label('extract', 'Extracto:') !!}
            {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}

            @error('extract')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Cuerpo de la publicacion:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

            @error('body')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>

    </div>
</div>