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
        //Buscando si hay algún contenido a buscar en el cuadro de busqueda
        $busqueda = trim($request->get('busqueda'));
        //Consulta que devuelve los valores de la tabla Articulo en zapatos.
        $articulos = DB::table('articulos')
        ->select('id', 'nombre', 'marca', 'categoria', 'contenido', 'precio')
        ->where('nombre', 'LIKE', '%'.$busqueda.'%')
        ->orderby('id', 'asc')
        ->paginate(5);
        //Enviando los datos obtenidos a la vista
        return view('Articulos.index', compact('articulos', 'busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //Muestra la pantalla de creación de datos
        return view('Articulos.create');
    }

    public function crear(){
        return view("Articulos.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validarForm(Request $request){
        //Aqui se establecen las reglas de validacion y los mensajes personalizados
        //No olvides que las cadenas de regex deben ir delimitadas por diagonales, ej:
        //regex:/^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/
        $datosValidos = $request->validate([
            'nombre' => 'required|string|min:2|max:30|regex:/^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/',
            'marca' => 'required|string|min:2|max:30|regex:/^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/',
            'categoria' => 'required|string|min:2|max:30|regex:/^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/',
            'contenido' => 'required|string|min:2|max:30|regex:/^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/',
            'precio' => 'required', 'numeric', 'regex:/^\d+(?:\.\d{1,2})?$/',
        ],//Personalizando los mensajes de error
            ['nombre.required'=>'El nombre es obligatorio',
            'nombre.string' => 'Solo se aceptan cadenas de texto',
            'nombre.min' => 'No puede tener menos de 2 caracteres',
            'nombre.max' => 'No puede ser una cadena mayor de 30 caracteres',
            'nombre.regex' => 'No se aceptan caracteres especiales',
            'marca.required'=>'La marca es obligatoria',
            'marca.string' => 'Solo se aceptan cadenas de texto',
            'marca.min' => 'No puede tener menos de 2 caracteres',
            'marca.max' => 'No puede ser una cadena mayor de 30 caracteres',
            'marca.regex' => 'No se aceptan caracteres especiales',
            'categoria.required'=>'La categoria es obligatoria',
            'categoria.string' => 'Solo se aceptan cadenas de texto',
            'categoria.min' => 'No puede tener menos de 2 caracteres',
            'categoria.max' => 'No puede ser una cadena mayor de 30 caracteres',
            'categoria.regex' => 'No se aceptan caracteres especiales',
            'contenido.required'=>'El contenido es obligatorio',
            'contenido.string' => 'Solo se aceptan cadenas de texto',
            'contenido.min' => 'No puede tener menos de 2 caracteres',
            'contenido.max' => 'No puede ser una cadena mayor de 30 caracteres',
            'contenido.regex' => 'No se aceptan caracteres especiales',
            'precio.required'=>'El precio es obligatorio',
            'precio.numeric'=>'Solo se aceptan valores numéricos',
            'precio.regex'=>'Solo se aceptan valores monetarios',
        ]);
        return $datosValidos;
    }

    public function store(Request $request)
    {
        //Se inicia el objeto Articulo
        $articulos = new Articulo();
        //Se validan los datos
        $datosValidados = $this->validarForm($request);
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
        //Se validan los datos
        $datosValidados = $this->validarForm($request);
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
