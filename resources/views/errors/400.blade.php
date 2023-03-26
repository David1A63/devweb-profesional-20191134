<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread" class="breadcrumb-item text-light"><a href="/principal"><i class="fas fa-home"></i> Inicio</a></li>
            <li id="bread" class="breadcrumb-item active text-light" aria-current="page">Error 400</li>
        </ol>
    </nav>
    <!--Llamando a la imagen-->
    <img class="error-img" src="{{ asset('img/error400.PNG') }}" alt="">
@endsection
