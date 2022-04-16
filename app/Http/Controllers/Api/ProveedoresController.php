<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\proveedores;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        $criterio = $request->criterio;
        if ($buscar == "") {
            $proveedores = proveedores::select('*')
            ->get();
        } else {
            $proveedores  = proveedores::select('*')
            ->where($criterio, 'like', '%'. $buscar . '%')
            ->get();
        }

       return response()->json([
           "status" => 200,
           "msg" => "Proveedores",
           "data"=> $proveedores
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
        $proveedor =  new proveedores();
        $proveedor->empresa = $request->empresa;
        $proveedor->n_ruc = $request->n_ruc;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->email = $request->email;
        $proveedor->n_contacto = $request->n_contacto;
        $proveedor->t_contacto = $request->t_contacto;

        $proveedor->save();

        return response()->json([
            'status' => 200,
            'msg' => 'Proveedor registrado',
            'data' => $proveedor
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
        $proveedor =proveedores::findOrFail($id);
      
        return response()->json([
          "status" => 200,
          "msg" => "Proveedor",
          "data" =>  $proveedor
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
        $proveedor =proveedores::findOrFail($id);
        $proveedor->empresa = $request->empresa;
        $proveedor->n_ruc = $request->n_ruc;
        $proveedor->direccion = $request->direccion;
        $proveedor->telefono = $request->telefono;
        $proveedor->email = $request->email;
        $proveedor->n_contacto = $request->n_contacto;
        $proveedor->t_contacto = $request->t_contacto;

        $proveedor->save();
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
