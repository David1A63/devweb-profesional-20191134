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
    <!--Tabla de Zapatos-->
    <div class="container-fluid bg-primary rounded-6 mx-auto" style="width: 98%">
        <br>
        <a href="/zapatos/create" class="btn btn-success" >CREAR</a>
        <br><br>
        <table id="zapatos" class="table align-middle table-stripped table-responsive mb-0 bg-white text-dark" style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Color</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!---Recibimos los datos--->
                @foreach($zapatos as $zapato)
                    <tr>
                        <td>{{ $zapato->id }}</td>
                        <td>{{ $zapato->modelo }}</td>
                        <td>{{ $zapato->marca }}</td>
                        <td>{{ $zapato->color }}</td>
                        <td>{{ $zapato->talla }}</td>
                        <td>{{ $zapato->precio }}</td>
                        <td>{{ $zapato->stock }}</td>
                        <!---Botones que iran en la sección de Acciones--->
                        <td>
                            <form action="{{ route('zapatos.destroy', $zapato->id) }}" method="POST">
                                <a href="/zapatos/{{ $zapato->id }}/edit" class="btn btn-info">Editar</a>
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
