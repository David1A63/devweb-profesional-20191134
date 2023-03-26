<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Llamando al modelo Zapato
use App\Models\Zapato;

class ZapatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Realizamos la consulta de datos
        $zapatos = Zapato::All();
        //Enviamos los datos a la vista
        return view('Zapatos.index')->with('zapatos', $zapatos);
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
    public function store(Request $request)
    {
        //Se inicia el objeto Zapato
        $zapatos = new Zapato();
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
