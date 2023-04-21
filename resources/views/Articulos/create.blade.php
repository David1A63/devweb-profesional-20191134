<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item text-light"><a href="/"><i class="fas fa-home"></i>Inicio</a></li>
            <li id="bread2" class="breadcrumb-item active text-light" aria-current="page">Crear</li>
        </ol>
    </nav>
    <h3 class="text-white fw-bold">Artículos</h3>
    <div class="container-fluid bg-light rounded-3 mx-auto" style="width: 98%">
    <form action="/articulos" method="POST">
            <!---Token de protección para evitar error 419--->
            @csrf
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}" class="form-control" tabindex="1">
                @error('nombre')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" class="form-control" value="{{ old('marca') }}" tabindex="2">
                @error('marca')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <input id="categoria" name="categoria" type="text" class="form-control" value="{{ old('categoria') }}" tabindex="3">
                @error('categoria')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Contenido</label>
                <input id="contenido" name="contenido" type="text" class="form-control" value="{{ old('contenido') }}" tabindex="4">
                @error('contenido')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" value="{{ old('precio') }}" step="0.01" class="form-control" value="{{ old('precio') }}"  tabindex="5">
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
