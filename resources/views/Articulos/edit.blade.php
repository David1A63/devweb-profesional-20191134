<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item text-light"><a href="/"><i class="fas fa-home"></i>Inicio</a></li>
            <li id="bread2" class="breadcrumb-item active text-light" aria-current="page">Editar</li>
        </ol>
    </nav>
    <h3 class="text-white fw-bold">Articulos</h3>
    <div class="container-fluid bg-light rounded-3 mx-auto" style="width: 98%">
        <form action="/articulos/{{ $articulo->id}}" method="POST">
            <!---Token de protección para evitar error 419--->
            @csrf
            <!---Metodo Put--->
            @method('put')
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" class="form-control" value="{{$articulo->nombre}}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="1">
                @error('nombre')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" class="form-control" value="{{$articulo->marca}}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="2">
                @error('marca')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <input id="categoria" name="categoria" type="text" class="form-control" value="{{$articulo->categoria}}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="3">
                @error('categoria')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Contenido</label>
                <input id="contenido" name="contenido" type="text" class="form-control" value="{{ $articulo->contenido }}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="4">
                @error('contenido')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="0.01" class="form-control" value="{{ $articulo->precio }}" pattern="^\d+(?:\.\d{1,2})?$" title="Solo se permiten valores monetarios" tabindex="5">
                @error('precio')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
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
