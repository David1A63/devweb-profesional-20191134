<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Llamando al modelo Zapato
use App\Models\Zapato;
use Illuminate\Support\Facades\DB;

class ZapatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        //Lectura de datos
        $busqueda = $request->get('busqueda');
        $marca = $request->get('marca');
        $color = $request->get('color');
        $query = Zapato::query();
        //Esto carga en los select de la vista las marcas que existen en la tabla zapatos
        $marcas = $this->consultarMarcas();
        //Esto carga en los select de la vista los colores que existen en la tabla zapatos
        $colores = $this->consultarColores();
        //Cuando requieras hacer una busqueda con más de un campo es
        //necesario pasar todos los atributos sin importar si están vacios o no
        if(strval($busqueda)=='' && strval($marca)=='' && strval($color)==''){
            //Cargando los datos al index (Función principal)
            $zapatos = $this->consultarZapatos5();
        }else{
            $zapatos = $this->search(strval($busqueda), strval($marca), strval($color));
        }
        return view('Zapatos.index', compact('zapatos', 'busqueda', 'marca', 'color', 'marcas', 'colores'));
    }

    public function consultarZapatos5(){
        $zapatos = DB::table('zapatos')
        ->select('id', 'modelo', 'marca', 'color', 'talla', 'precio', 'stock')
        ->orderby('id', 'asc')
        ->paginate(5);
        return $zapatos;
    }

    public function consultarColores(){
        $colores = DB::table('zapatos')
        ->select('color')
        ->distinct()
        ->orderby('color', 'asc')
        ->get();
        return $colores;
    }

    public function consultarMarcas(){
        $marca = DB::table('zapatos')
        ->select('marca')
        ->distinct()
        ->orderby('marca', 'asc')
        ->get();
        return $marca;
    }

    public function search(string $busqueda, string $marca, string $color){
        //Busqueda por modelo - Funciona Correcto
        if($busqueda!='' && $marca=='Elige una Marca' && $color=='Elige un Color'){
            $zapatos = DB::table('zapatos')
            ->select('id', 'modelo', 'marca', 'color', 'talla', 'precio', 'stock')
            ->where('modelo', 'LIKE', '%'.$busqueda.'%')
            ->orderby('id', 'asc')
            ->paginate(5);
        }
        //Busqueda por marca - Funciona Correctamente
        if($busqueda=='' && $marca!='Elige una Marca' && $color=='Elige un Color'){
            $zapatos = DB::table('zapatos')
            ->select('id', 'modelo', 'marca', 'color', 'talla', 'precio', 'stock')
            ->where('marca', $marca)
            ->orderby('id', 'asc')
            ->paginate(5);
        }
        //Busqueda por color - Funciona Correctamente
        if($busqueda=='' && $marca=='Elige una Marca' && $color!='Elige un Color'){
            $zapatos = DB::table('zapatos')
            ->select('id', 'modelo', 'marca', 'color', 'talla', 'precio', 'stock')
            ->where('color', $color)
            ->orderby('id', 'asc')
            ->paginate(5);
        }
        //Busqueda por modelo y marca - Funciona Correctamente
        if($busqueda!='' && $marca!='Elige una Marca' && $color=='Elige un Color'){
            $zapatos = DB::table('zapatos')
            ->select('id', 'modelo', 'marca', 'color', 'talla', 'precio', 'stock')
            ->where('modelo', 'LIKE', '%'.$busqueda.'%')
            ->where('marca', $marca)
            ->orderby('id', 'asc')
            ->paginate(5);
        }
        //Busqueda por modelo y color - Funciona Correctamente
        if($busqueda!='' && $marca=='Elige una Marca' && $color!='Elige un Color'){
            $zapatos = DB::table('zapatos')
            ->select('id', 'modelo', 'marca', 'color', 'talla', 'precio', 'stock')
            ->where('modelo', 'LIKE', '%'.$busqueda.'%')
            ->where('color', $color)
            ->orderby('id', 'asc')
            ->paginate(5);
        }
        //Busqueda por marca y color - Funciona Correctamente
        if($busqueda=='' && $marca!='Elige una Marca' && $color!='Elige un Color'){
            $zapatos = DB::table('zapatos')
            ->select('id', 'modelo', 'marca', 'color', 'talla', 'precio', 'stock')
            ->where('marca', $marca)
            ->where('color', $color)
            ->orderby('id', 'asc')
            ->paginate(5);
        }
        //Busqueda por modelo, marca y color - Funciona Correctamente
        if($busqueda!='' && $marca!='Elige una Marca' && $color!='Elige un Color'){
            $zapatos = DB::table('zapatos')
            ->select('id', 'modelo', 'marca', 'color', 'talla', 'precio', 'stock')
            ->where('modelo', 'LIKE', '%'.$busqueda.'%')
            ->where('marca', $marca)
            ->where('color', $color)
            ->orderby('id', 'asc')
            ->paginate(5);
        }
        return $zapatos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retorna la vista create
        return view('Zapatos.create');
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
            'modelo' => 'required|string|min:2|max:30|regex:/^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/',
            'marca' => 'required|string|min:2|max:30|regex:/^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/',
            'color' => 'required|string|min:2|max:30|regex:/^[A-Za-z0-9áéíóúüñÑÁÉÍÓÚÜ\s]{2,30}$/',
            'talla' => 'required|number|regex:/^\d+(?:\.\d{1,2})?$/',
            'precio' => 'required|number|regex:/^\d+(?:\.\d{1,2})?$/',
            'stock' => 'required|number|regex:/^\d+$/',
        ], //Personalizando los mensajes de error
        [
            'modelo.required' => 'El nombre del modelo es obligatorio',
            'marca.required' => 'El nombre de la marca es obligatorio',
            'color.required' => 'El color es obligatorio',
            'talla.required' => 'La talla es obligatoria',
            'precio.required' => 'El precio es obligatorio',
            'stock.required' => 'El stock es obligatorio',
            'modelo.string' => 'Solo se aceptan cadenas de texto',
            'marca.string' => 'Solo se aceptan cadenas de texto',
            'color.string' => 'Solo se aceptan cadenas de texto',
            'talla.number' => 'Solo se aceptan valores numéricos',
            'precio.number' => 'Solo se aceptan valores numéricos',
            'stock.number' => 'Solo se aceptan valores númericos',
            'modelo.min' => 'No pueden tener menos de 2 caracteres',
            'marca.min' => 'No pueden tener menos de 2 caracteres',
            'color.min' => 'No pueden tener menos de 2 caracteres',
            'modelo.max' => 'No pueden tener más de 30 caracteres',
            'marca.max' => 'No pueden tener más de 30 caracteres',
            'color.max' => 'No pueden tener más de 30 caracteres',
            'modelo.regex' => 'No se aceptan caracteres especiales',
            'marca.regex' => 'No se aceptan caracteres especiales',
            'color.regex' => 'No se aceptan caracteres especiales',
            'talla.regex' => 'No se aceptan caracteres especiales',
            'precio.regex' => 'No se aceptan caracteres especiales',
            'stock.regex' => 'No se aceptan caracteres especiales',
        ]);
        return $datosValidos;
    }

    public function store(Request $request)
    {
        //Se inicia el objeto Zapato
        $zapatos = new Zapato();
        //Se validan los datos
        $datosValidados = $this->validarForm($request);
        //Se piden los datos de la vista
        $zapatos->modelo = $request->get('modelo');
        $zapatos->marca = $request->get('marca');
        $zapatos->color = $request->get('color');
        $zapatos->talla = $request->get('talla');
        $zapatos->precio = $request->get('precio');
        $zapatos->stock = $request->get('stock');
        //Se registran los datos almacenados
        $zapatos->save();
        //Redirecciona a zapatos
        return redirect('/zapatos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $zapato = Zapato::find($id);
        //Devuelve la vista con los datos consultados
        return view('Zapatos.edit')->with('zapato', $zapato);
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
        //Busca un solo zapatos por el id que se esta editando
        $zapato = Zapato::find($id);
        //Se validan los datos
        $datosValidados = $this->validarForm($request);
        //Se piden los datos de la vista
        $zapato->modelo = $request->get('modelo');
        $zapato->marca = $request->get('marca');
        $zapato->color = $request->get('color');
        $zapato->talla = $request->get('talla');
        $zapato->precio = $request->get('precio');
        $zapato->stock = $request->get('stock');
        //Se registran los datos almacenados
        $zapato->save();
        //Redirecciona a zapatos
        return redirect('/zapatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zapato = Zapato::find($id);
        $zapato->delete();
        return redirect('/zapatos');
    }
}
