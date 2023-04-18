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
    <center><h3 class="text-white fw-bold">SuperMercado, el mejor lugar para comprar!!!</h3></center>
    <!--Carrusel-->

@endsection
