<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item text-light"><a href="/"><i class="fas fa-home"></i> Inicio</a></li>
            <li id="bread2" class="breadcrumb-item active text-light" aria-current="page">Error 404</li>
        </ol>
    </nav>
    <!--Llamando a la imagen-->
    <img class="error-img" src="{{ asset('img/error404.PNG') }}" alt="">
@endsection
