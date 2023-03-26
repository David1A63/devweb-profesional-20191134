<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread" class="breadcrumb-item text-light"><a href="/principal"><i class="fas fa-home"></i> Inicio</a></li>
            <li id="bread" class="breadcrumb-item active text-light" aria-current="page">Búsquedas Avanzadas</li>
        </ol>
    </nav>
    <h3>Zapatos</h3>
    <div class="container-fluid bg-light rounded-6 mx-auto" style="width: 98%">
        <form action="/zapatos" method="POST">
            <!---Token de protección para evitar error 419--->
            @csrf
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Modelo</label>
                <input id="modelo" name="modelo" type="text" class="form-control" tabindex="1">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" class="form-control" tabindex="2">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Color</label>
                <input id="color" name="color" type="text" class="form-control" tabindex="3">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Talla</label>
                <input id="talla" name="talla" type="number" value="0.00" step="0.50" class="form-control" tabindex="4">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" value="0.00" step="0.01" class="form-control" tabindex="5">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input id="stock" name="stock" type="number" value="0.00" step="1.00" class="form-control" tabindex="6">
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
