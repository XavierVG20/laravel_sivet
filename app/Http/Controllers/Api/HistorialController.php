<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\historial;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar == "") {
            $historial =  historial::select('*')
            ->get();
        } else{
            $historial =  historal::select('*')
            ->where($criterio, 'like', '%'. $buscar . '%')
            ->get();
           
        }
        return response()->json([
            "status" => 200,
            "msg" => "historial",
            "data" =>  $historial
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $historial = new historial();

        $historial->descripcion = $request->descripcion;
        $historial->diagnostico = $request->diagnostico;
        $historial->tratamiento = $request->tratamiento;
        $historial->id_mascota = $request->id_mascota;
        $historial->id_cita = $request->id_cita;

        $historial->save();

         return response()->json([
            "status" => 200,
            "msg" => "historial registrado",
            "data" =>  $historial
        ]); 


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historial = historial::findOrFail($id);
        return response()->json([
            "status" => 200,
            "msg" => "historial",
            "data" =>  $historial
        ],200);
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
        $historial = historial::findOrFail($id);

        $historial->descripcion = $request->descripcion;
        $historial->diagnostico = $request->diagnostico;
        $historial->tratamiento = $request->tratamiento;
        $historial->id_mascota = $request->id_mascota;
        $historial->id_cita = $request->id_cita;

        $historial->save();

         return response()->json([
            "status" => 200,
            "msg" => "historial actualizado",
            "data" =>  $historial
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
