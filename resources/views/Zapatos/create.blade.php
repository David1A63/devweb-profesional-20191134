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
    <h3 class="text-white fw-bold">Zapatos</h3>
    <div class="container-fluid bg-light rounded-3 mx-auto" style="width: 98%">
        <form action="/zapatos" method="POST">
            <!---Token de protección para evitar error 419--->
            @csrf
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Modelo</label>
                <input id="modelo" name="modelo" type="text" value="{{ old('modelo') }}" class="form-control" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="1">
                @error('modelo')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Marca</label>
                <input id="marca" name="marca" type="text" value="{{ old('marca') }}" class="form-control" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$" title="No se aceptan caracteres especiales" tabindex="2">
                @error('marca')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Color</label>
                <input id="color" name="color" type="text" value="{{ old('color') }}" class="form-control" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\d;\/,.\-_]{2,30}$" title="No se aceptan caracteres especiales" tabindex="3">
                @error('color')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Talla</label>
                <input id="talla" name="talla" type="number" value="0.00"  step="0.50" class="form-control" pattern="^\d+(?:\.\d{1,2})?$" title="Solo se permiten valores de tallas" tabindex="4">
                @error('talla')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input id="precio" name="precio" type="number" value="0.00" step="0.01" class="form-control" pattern="^\d+(?:\.\d{1,2})?$" title="Solo se permiten valores monetarios" tabindex="5">
                @error('precio')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input id="stock" name="stock" type="number" value="0.00" step="1.00" class="form-control" pattern="^\d+$" title="Solo se permiten números enteros" tabindex="6">
                @error('stock')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror
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
