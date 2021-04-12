@extends('adminlte::page')

@section('title', 'Asojuntas')

@section('content_header')
    <h1>Bienvenido a Asojuntas, <strong>{{auth()->user()->name}}</strong> </h1>
@stop

@section('content')
    <p> IP de acceso: <strong>{{request()->ip()}}</strong> <br> Fecha de verificacion de email: <strong>{{auth()->user()->email_verified_at}}</strong> </p>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('imagenes/reunion.jpg')}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>ASOJUNTAS</h1>
                <p>Asociacion de juntas de accion comunal del municipio de Algeciras</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('imagenes/junta.JPG')}}" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>ASOJUNTAS</h1>
                <p>Asociacion de juntas de accion comunal del municipio de Algeciras</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('imagenes/junta2.jpg')}}" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>ASOJUNTAS</h1>
                <p>Asociacion de juntas de accion comunal del municipio de Algeciras</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
      <div>
        <br>
      </div>

@stop

@section('css')
<style>
  .carousel .carousel-item {
  height: 600px;
}

.carousel-item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: auto;
}
</style>
@stop

@section('js')
   
@stop