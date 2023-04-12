<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Llamando el modelo de Articulo
use App\Models\Articulo;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $busqueda = trim($request->get('busqueda'));
        $articulos = DB::table('articulos')
        ->select('id', 'nombre', 'marca', 'categoria', 'contenido', 'precio')
        ->where('nombre', 'LIKE', '%'.$busqueda.'%')
        ->orderby('id', 'asc')
        ->paginate(5);
        return view('Articulos.index', compact('articulos', 'busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Muestra la pantalla de creación de datos
        return view('Articulos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se inicia el objeto Articulo
        $articulos = new Articulo();
        //Se validan los datos
        $request->validate([
            'nombre' => ['required'],
            'marca' => ['required'],
            'categoria' => ['required'],
            'contenido' => ['required'],
            'precio' => ['required'],
        ]);
        //Se piden los datos de la vista
        $articulos->nombre = $request->get('nombre');
        $articulos->marca = $request->get('marca');
        $articulos->categoria = $request->get('categoria');
        $articulos->contenido = $request->get('contenido');
        $articulos->precio = $request->get('precio');
        //Se registran los datos almacenados
        $articulos->save();
        //Redirecciona a articulos
        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Consulta por el ID seleccionado a editar
        $articulo = Articulo::find($id);
        //Devuelve la vista con los datos consultados
        return view('Articulos.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Busca un solo articulo por el id que se esta editando
        $articulo = Articulo::find($id);
        //Se piden los datos de la vista
        $articulo->nombre = $request->get('nombre');
        $articulo->marca = $request->get('marca');
        $articulo->categoria = $request->get('categoria');
        $articulo->contenido = $request->get('contenido');
        $articulo->precio = $request->get('precio');
        //Se registran los datos almacenados
        $articulo->save();
        //Redirecciona a articulos
        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();
        return redirect('/articulos');
    }
}
