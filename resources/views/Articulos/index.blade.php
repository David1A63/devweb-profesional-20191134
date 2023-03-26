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
    <!--Tabla de Zapatos-->
    <div class="container-fluid bg-primary rounded-6 mx-auto" style="width: 98%">
        <br>
        <a href="/articulos/create" class="btn btn-success"  style="--mdb-bg-opacity: 0.5;">CREAR</a>
        <br><br>
        <table id="articulos" class="table align-middle table-stripped mb-0 bg-white text-dark" style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Contenido</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!---Recibimos los datos--->
                @foreach($articulos as $articulo)
                    <tr>
                        <td>{{ $articulo->id }}</td>
                        <td>{{ $articulo->nombre }}</td>
                        <td>{{ $articulo->marca }}</td>
                        <td>{{ $articulo->categoria }}</td>
                        <td>{{ $articulo->contenido }}</td>
                        <td>{{ $articulo->precio }}</td>
                        <!---Botones que iran en la sección de Acciones--->
                        <td>
                            <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST">
                                <a href="/articulos/{{ $articulo->id }}/edit" class="btn btn-info">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div>
    <br><br>
@endsection
