<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ingresos;
class IngresosController extends Controller
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
            $ingresos =  ingresos::select('*')
            ->get();
        } else{
            $ingresos =  ingresos::select('*')
            ->where($criterio, 'like', '%'. $buscar . '%')
            ->get();
           
        }
        return response()->json([
            "status" => 200,
            "msg" => "ingresos",
            "data" =>  $ingresos
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
        $ingreso = new ingresos();
        $ingreso->id_proveedor = $request->id_proveedor;
        $ingreso->id_usuario = $request->id_usuario;
        $ingreso->tipo_comprobante = $request->tipo_comprobante;
        $ingreso->impuestos = $request->impuestos;
        $ingreso->total = $request->total;
 
        $ingreso->save();
 
        return response()->json([
         "status" => 200,
         "msg" => "ingreso registrada",
         "data" =>  $ingreso
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
        $ingreso = ingresos::findOrFail($id);
     

        return response()->json([
         "status" => 200,
         "msg" => "ingreso",
         "data" =>  $ingreso
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
        $ingreso = ingresos::findOrFail($id);
        $ingreso->id_proveedor = $request->id_proveedor;
        $ingreso->id_usuario = $request->id_usuario;
        $ingreso->tipo_comprobante = $request->tipo_comprobante;
        $ingreso->impuestos = $request->impuestos;
        $ingreso->total = $request->total;
 
        $ingreso->save();
 
        return response()->json([
         "status" => 200,
         "msg" => "ingreso actualizado",
         "data" =>  $ingreso
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
