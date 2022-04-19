<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ventas;

class VentasController extends Controller
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
            $ventas =  ventas::select('*')
            ->get();
        } else{
            $ventas =  ventas::select('*')
            ->where($criterio, 'like', '%'. $buscar . '%')
            ->get();
           
        }
        return response()->json([
            "status" => 200,
            "msg" => "ventas",
            "data" =>  $ventas
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
       $venta = new ventas();
       $venta->id_cliente = $request->id_cliente;
       $venta->id_usuario = $request->id_usuario;
       $venta->tipo_comprobante = $request->tipo_comprobante;
       $venta->impuestos = $request->impuestos;
       $venta->total = $request->total;

       $venta->save();

       return response()->json([
        "status" => 200,
        "msg" => "venta registrada",
        "data" =>  $venta
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
        $venta = ventas::findOrFail($id);
     

       return response()->json([
        "status" => 200,
        "msg" => "venta",
        "data" =>  $venta
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
        $venta = ventas::findOrFail($id);
        $venta->id_cliente = $request->id_cliente;
        $venta->id_usuario = $request->id_usuario;
        $venta->tipo_comprobante = $request->tipo_comprobante;
        $venta->impuestos = $request->impuestos;
        $venta->total = $request->total;
 
        $venta->save();
 
        return response()->json([
         "status" => 200,
         "msg" => "venta actualizada",
         "data" =>  $venta
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
