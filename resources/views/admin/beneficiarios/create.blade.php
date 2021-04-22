@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
<h1>Agregar Beneficiario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-danger float-right" href="{{route('admin.beneficiarios.index')}}"><i class="fas fa-window-close"></i></a>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{ Form::open(['route' => 'admin.beneficiarios.store']) }}
           

                @include('admin.beneficiarios.partials.form')

            
                {!! Form::submit('Agregar Beneficiario', ['class' => 'btn btn-primary ']) !!}
                {!! Form::close() !!}
           
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    @if (session('error'))
    <script>
        var session = '{{session('error')}}';
        Swal.fire(
        'Error',
        session ,
        'error'
        )
    </script>
    @endif
    <script>
        $(function() {
            $('#user').selectpicker();
        });
    </script>
@endsection
