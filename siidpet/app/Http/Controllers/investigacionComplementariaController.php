<?php

namespace App\Http\Controllers;

use App\Models\InvestigacionComplementaria;
use Illuminate\Http\Request;

class investigacionComplementariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se obtienen todos los objetos de la tabla flagrancia
        $investigacionComplementaria = InvestigacionComplementaria::all();
        return response( $investigacionComplementaria );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se validan los datos a traves de laravel
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_vencimiento' => 'required',
        ]);

        //Se usa la función create() con el request que guarda el objeto
        $investigacionComplementaria = InvestigacionComplementaria::create( $request->all() );

        // Puedes realizar otras acciones después de la creación, como redireccionar o devolver una respuesta JSON
        return response()->json(['mensaje' => 'Datos guardados con éxito', 'investigacion_complementaria' => $investigacionComplementaria ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Se obtiene el registro de la base de datos
        $investigacionComplementaria = InvestigacionComplementaria::find($id);

        //Compara si la consulta encontró datos
        if (! $investigacionComplementaria ) {
            return response()->json(['mensaje' => 'Datos de la investigacion complementaria no encontrados'], 404);
        }

        //Lo retorna con un código 201
        return response()->json(['investigacion_complementaria' => $investigacionComplementaria], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // Encontramos el dato con el id
        $investigacionComplementaria = InvestigacionComplementaria::find($id);

        // Verifica si el usuario existe
        if (! $investigacionComplementaria ) {
            return response()->json(['mensaje' => 'Datos de la investigacion complementaria no encontrados'], 404);
        }

        // Actualiza los datos con los nuevos datos proporcionados
        $investigacionComplementaria->update($request->all());

        // Puedes devolver una respuesta JSON, un mensaje de éxito, etc.
        return response()->json(['mensaje' => 'Datos actualizados con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar el usuario por su ID
        $investigacionComplementaria = InvestigacionComplementaria::find($id);

        // Verificar si el usuario existe
        if ( $investigacionComplementaria ) {
            // Eliminar el usuario
            $investigacionComplementaria->delete();
            return response()->json(['mensaje' => 'Datos de la investigacion complementaria eliminados correctamente'], 201);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el dato'], 201);
        }
    }
}
