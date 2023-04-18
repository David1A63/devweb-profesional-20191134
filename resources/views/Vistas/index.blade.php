<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item active text-light" aria-current="page"><i class="fas fa-home"></i> Inicio</li>
        </ol>
    </nav>
    <!--Llamando a la imagen-->
    <center><h3 class="text-white fw-bold">SuperMercado, el mejor lugar para comprar!!!</h3></center><br>
    <!--Carrusel-->
    <div class="container-slider">
        <div class="slider" id="slider">
            <div class="slider__section">
                <img src="{{ asset('img/super1.jpg')}}" alt="" class="slider__img">
            </div>
            <div class="slider__section">
                <img src="{{ asset('img/super2.jpg')}}" alt="" class="slider__img">
            </div>
            <div class="slider__section">
                <img src="{{ asset('img/super3.jpg')}}" alt="" class="slider__img">
            </div>
            <div class="slider__section">
                <img src="{{ asset('img/super4.jpg')}}" alt="" class="slider__img">
            </div>
        </div>
        <div class="slider__btn slider__btn--right" id="btn-right">&#62;</div>
        <div class="slider__btn slider__btn--left" id="btn-left">&#60;</div>
    </div>
@endsection
