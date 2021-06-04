@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')

    @can('admin.censo.create')
        <a class="btn btn-success btn-sm float-right" href="{{route('admin.censo.create')}}">Nuevos Datos básicos</a>
    @endcan
    
    <h1>Censo comunal</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

   <div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="men1" href="#menu1">Individual</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="men2" href="#menu2">Afil. Censados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" id="men3" href="#menu3">Afil. No censados</a>
            </li>
        </ul>
    </div>
    <div class="card-body ">
        <div class="tab-content ">
            <div id="home" class="tab-pane active">  
                <h3>Listado de Censos</h3>
                @livewire('admin.censo-index')
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Censo Individual</h3>
               @livewire('admin.censo-individual-index')
            </div>
            <div id="menu2" class=" tab-pane fade">
                <h3>Listado Afil. Censados</h3>
                @livewire('admin.censados-index')
            </div>
            <div id="menu3" class=" tab-pane fade">
                <h3>Listado Afil. No Censados</h3>
                @livewire('admin.no-censados-index')
            </div>
        </div>   
    </div>
</div>
@stop

@section('footer')
    <div class="text-center">
        <strong> 
            Copyright © 2021 
            <a href="/">Asojuntas</a>.
        </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-block">
            <b>Version</b>
            1.0
        </div>
    </div>
@stop

@section('css')
   
@stop

@section('js')
   
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

@stop