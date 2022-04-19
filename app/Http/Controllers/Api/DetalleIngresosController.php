<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\detalle_ingreso;
class DetalleIngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar == "") {
            $detalle_ingreso=  detalle_ingreso::select('*')
            ->get();
        } else{
            $detalle_ingreso=  detalle_ingreso::select('*')
            ->where($criterio, 'like', '%'. $buscar . '%')
            ->get();
           
        }
        return response()->json([
            "status" => 200,
            "msg" => "detalle ingresos",
            "data" =>  $detalle_ingreso 
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
        $detalle_ingreso = new detalle_ingreso();
        $detalle_ingreso->id_ingreso = $request->id_ingreso;
        $detalle_ingreso->id_articulo = $request->id_articulo;
        $detalle_ingreso->cantidad = $request->cantidad;
        $detalle_ingreso->precio = $request->precio;

        $detalle_ingreso->save();

        return response()->json([
            "status" => 200,
            "msg" => "detalle _ingresos registrado",
            "data" =>  $detalle_ingreso
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
        $detalle_ingreso = detalle_ingreso::findOrFail($id);
        return response()->json([
            "status" => 200,
            "msg" => "detalle_ingreos",
            "data" =>  $detalle_ingreso
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
        $detalle_ingreso = detalle_ingreso::findOrFail($id);
        $detalle_ingreso->id_ingreso = $request->id_ingreso;
        $detalle_ingreso->id_articulo = $request->id_articulo;
        $detalle_ingreso->cantidad = $request->cantidad;
        $detalle_ingreso->precio = $request->precio;

        $detalle_ingreso->save();

        return response()->json([
            "status" => 200,
            "msg" => "detalle _ingresos actualizado",
            "data" =>  $detalle_ingreso
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
        $detalle_ingreso = detalle_ingreso::find($id);
        $detalle_ingreso->delete();

        return response()->json([
            "status" => 200,
            "msg" => "detalle _ingresos eliminado",
            "data" =>  $detalle_ingreso
        ]); 
    }
}
