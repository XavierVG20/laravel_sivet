<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\citas;
class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $criterio = $request->criterio;
        $buscar = $request->buscar;

        if ($buscar == "") {
            $citas = citas::select('*')
            ->get();
        } else {
            $citas = citas::select('*')
            ->where($criterio, 'like', '%'. $buscar . '%')
            ->get();
        }

        return response()->json([
            'status' => 200,
            'msg' => 'citas',
            'data' => $citas
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
        $cita = new citas();

        $cita->descripcion =  $request->descripcion;
        $cita->fecha_reserva = $request->fecha_reserva;
        $cita->estado = 1;

        $cita->save();
            return response()->json([
            'status' => 200,
            'msg' => 'citas registrada',
            'data' => $cita
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
        $cita = citas::findOrFail($id);

        return response()->json([
            'status' => 200,
            'msg' => 'cita',
            'data' => $cita
        ]);
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
        $cita = citas::findOrFail($id);

        $cita->descripcion =  $request->descripcion;
        $cita->fecha_reserva = $request->fecha_reserva;
        $cita->estado = $request->estado;

        $cita->save();
        return response()->json([
            'status' => 200,
            'msg' => 'citas actualizada',
            'data' => $cita
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
