<!--Se llama a la plantilla principal ya creada-->
@extends('Plantillas.principal')

@section('contenidoPrincipal')
    <!--Breadcrumb-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li id="bread1" class="breadcrumb-item text-light"><a href="/"><i class="fas fa-home"></i>Inicio</a></li>
            <li id="bread2" class="breadcrumb-item active text-light" aria-current="page">Búsquedas Avanzadas</li>
        </ol>
    </nav>
    <h3 class="text-white fw-bold">Zapatos</h3>
    <!--Tabla de Zapatos-->
    <div class="container-fluid bg-primary rounded-3 mx-auto" style="width: 98%">
        <br>
        <a href="/zapatos/create" class="btn btn-success" >CREAR</a>
        <br><br>
        <form action="{{ route('zapatos.index') }}">
            <div class="input-group">
                <div class="form-outline">
                    @csrf
                    <input type="text" id="form1" class="form-control bg-white" placeholder="Buscar..." name="busqueda" value="{{$busqueda}}" pattern="^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{0,60}$" title="No se aceptan caracteres especiales" />
                </div>
                <div>
                    <select class="form-select text-white bg-success border-success" aria-label="Default select example" placeholder="Marca" name="marca" value="">
                        @if($marca=='')
                            <option value="Elige una Marca">Elige una Marca</option>
                        @elseif($marca!='Marcas')
                            <option value="{{ $marca }}">{{ $marca }}</option>
                            <option value="Elige una Marca">Elige una Marca</option>
                        @endif
                        @foreach($marcas as $marca)
                            <option value="{{ strval($marca->marca) }}">{{ $marca->marca }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select class="form-select text-white bg-success border-success" aria-label="Default select example" placeholder="Color" name="color" value="">
                        @if($color=='')
                            <option value="Elige un Color">Elige un Color</option>
                        @elseif($color!='Colores')
                            <option value="{{ $color }}">{{ $color }}</option>
                            <option value="Elige un Color">Elige un Color</option>
                        @endif
                        @foreach($colores as $color)
                            <option value="{{ strval($color->color) }}">{{ $color->color }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="/zapatos" class="btn btn-warning">Limpiar</a>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <br>
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
                @if(count($zapatos)<=0)
                    <tr>
                        <td colspan="8">No hay Resultados</td>
                    </tr>
                @else
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
                @endif
            </tbody>
            <tfoot>
                <td colspan="4">{{$zapatos->links()}}</td>
            </tfoot>
        </table>
        <br>
    </div>
    <br><br>
@endsection
