<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread" class="breadcrumb-item text-light"><a href="/principal"><i class="fas fa-home"></i> Inicio</a></li>
            <li id="bread" class="breadcrumb-item active text-light" aria-current="page">Búsquedas Simples</li>
        </ol>
    </nav>
    <h3>Articulos</h3>
    <div class="container-fluid bg-light rounded-6 mx-auto" style="width: 98%">
        <form action="/articulos/{{ $articulo->id}}" method="POST">
            <!---Token de protección para evitar error 419--->
            @csrf
            <!---Metodo Put--->
            @method('put')
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control" value="{{$articulo->nombre}}" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" class="form-control" value="{{$articulo->marca}}" tabindex="2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <input id="categoria" name="categoria" type="text" class="form-control" value="{{$articulo->categoria}}" tabindex="3">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Contenido</label>
                <input id="contenido" name="contenido" type="text" class="form-control" value="{{ $articulo->contenido }}" tabindex="4">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="0.01" class="form-control" value="{{ $articulo->precio }}" tabindex="5">
            </div>
            <div>
                <a href="/articulos" class="btn btn-secondary" tabindex="6">Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
            </div>
            <br>
        </form>
    </div>
    <br><br>
@endsection
