<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\detalle_venta;

class DetalleVentasController extends Controller
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
            $detalle_venta=  detalle_venta::select('*')
            ->get();
        } else{
            $detalle_venta=  detalle_venta::select('*')
            ->where($criterio, 'like', '%'. $buscar . '%')
            ->get();
           
        }
        return response()->json([
            "status" => 200,
            "msg" => "detalle ventas",
            "data" =>  $detalle_venta 
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
        $detalle_venta = new detalle_venta();
        $detalle_venta->id_venta = $request->id_venta;
        $detalle_venta->id_articulo = $request->id_articulo;
        $detalle_venta->cantidad = $request->cantidad;
        $detalle_venta->precio = $request->precio;

        $detalle_venta->save();

        return response()->json([
            "status" => 200,
            "msg" => "detalle _ventas registrado",
            "data" =>  $detalle_venta
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
        
        $detalle_venta = detalle_venta::findOrFail($id);
        return response()->json([
            "status" => 200,
            "msg" => "detalle_venta",
            "data" =>  $detalle_venta
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
        $detalle_venta =  detalle_venta::findOrFail($id);
        $detalle_venta->id_venta = $request->id_venta;
        $detalle_venta->id_articulo = $request->id_articulo;
        $detalle_venta->cantidad = $request->cantidad;
        $detalle_venta->precio = $request->precio;

        $detalle_venta->save();

        return response()->json([
            "status" => 200,
            "msg" => "detalle _ventas actualizado",
            "data" =>  $detalle_venta
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
        $detalle_venta = detalle_venta::find($id);
        $detalle_venta->delete();

        return response()->json([
            "status" => 200,
            "msg" => "detalle _ventas eliminado",
            "data" =>  $detalle_venta
        ]); 
    }
}
