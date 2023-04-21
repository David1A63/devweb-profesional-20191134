<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item text-light"><a href="/"><i class="fas fa-home"></i>Inicio</a></li>
            <li id="bread2" class="breadcrumb-item active text-light" aria-current="page">Búsquedas Simples</li>
        </ol>
    </nav>
    <h3 class="text-white fw-bold">Artículos</h3>
    <!--Tabla de Articulos-->
    <div class="container-fluid rounded-3 bg-primary" style="width: 98%">
        <br>
        <a href="/articulos/create" class="btn btn-success">CREAR</a>
        <br><br>
        <form action="{{ route('articulos.index') }}" method="get">
            <div class="input-group">
                <div class="form-outline">
                    <input type="text" id="form1" class="form-control bg-white" placeholder="Buscar..." name="busqueda" value="{{$busqueda}}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{5,60}$" title="No se aceptan caracteres especiales"/>
                </div>
                <div>
                    <a href="/articulos" class="btn btn-warning">Limpiar</a>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <br>
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
                @if(count($articulos)<=0)
                    <tr>
                        <td colspan="8">No hay Resultados</td>
                    </tr>
                @else
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
                @endif
            </tbody>
            <tfoot>
                <td colspan="4">{{ $articulos->links() }}</td>
            </tfoot>
        </table>
        <br>
    </div>
    <br><br>
@endsection
