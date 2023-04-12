<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item text-light"><a href="/"><i class="fas fa-home"></i> Inicio</a></li>
            <li id="bread2" class="breadcrumb-item active text-light" aria-current="page">Editar</li>
        </ol>
    </nav>
    <h3 class="text-white fw-bold">Zapatos</h3>
    <div class="container-fluid bg-light rounded-3 mx-auto" style="width: 98%">
        <form action="/zapatos/{{ $zapato->id}}" method="POST">
            <!---Token de protección para evitar error 419--->
            @csrf
            <!---Metodo Put--->
            @method('put')
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Modelo</label>
                <input id="modelo" name="modelo" type="text" class="form-control" value="{{$zapato->modelo}}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" class="form-control" value="{{$zapato->marca}}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Color</label>
                <input id="color" name="color" type="text" class="form-control" value="{{$zapato->color}}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="3">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Talla</label>
                <input id="talla" name="talla" type="number" step="0.5" class="form-control" value="{{ $zapato->talla }}" pattern="^\d+(?:\.\d{1,2})?$" title="Solo se permiten valores de tallas" tabindex="4">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" step="0.01" class="form-control" value="{{ $zapato->precio }}" pattern="^\d+(?:\.\d{1,2})?$" title="Solo se permiten valores monetarios" tabindex="5">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input id="stock" name="stock" type="number" step="1.00" class="form-control" value="{{ $zapato->stock }}" pattern="^\d+$" title="Solo se permiten números enteros" tabindex="6">
            </div>
            <div>
                <a href="/zapatos" class="btn btn-secondary" tabindex="7">Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="8">Guardar</button>
            </div>
            <br>
        </form>
    </div>
    <br><br>
@endsection
