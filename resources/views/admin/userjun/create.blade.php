@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Crear Afiliados de junta</h1>
@stop

@section('content')
    <div class="card">  
        <div class="card-body" >
            {!! Form::open(['route' => 'admin.userjun.store']) !!}

                <div  class="container_div">
                    @include('admin.userjun.partials.form')
                </div>
                
                    {!! Form::submit('Crear Afiliado', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(function() {
        $('#btn').click(function(){
            var div_copy = $('#dv').clone(true);
            div_copy.find("div.form-group").children().val("");//para quitar el valor
            div_copy.find("input.remove").show();
            $('.container_div').append(div_copy);
        });
        
        $("#btnE").click(function(){
            $(this).closest("#dv").remove();
        });

        $('#comisionN').click(function(){
            $("#com").hide();
            $("#com2").hide();
            $("#comision2").val("");
            $("#comision").val("");
            $("#com1").show();
        });

        $("#comisionE").click(function(){
            $("#com").hide();
            $("#com1").hide();
            $("#comision1").val("");
            $("#comision").val("");
            $("#com2").show();
        });
    });
</script>
@stop