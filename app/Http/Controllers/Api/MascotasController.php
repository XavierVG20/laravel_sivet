<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mascotas;
class MascotasController extends Controller
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
        if ($buscar==''){
        $mascotas = mascotas::join('clientes','mascotas.id_cliente','=','clientes.id')
        ->select('*','clientes.id', 'clientes.nombres','clientes.telefono','clientes.email','clientes.num_id')
        
        ->orderBy('mascotas.id', 'desc')->get();
        } else{
            $mascotas = mascotas::join('clientes','mascotas.id_cliente','=','clientes.id')
            ->select('*','clientes.id', 'clientes.nombres','clientes.telefono','clientes.email','clientes.num_id')
            ->where('mascotas.'.$criterio, 'like', '%'. $buscar . '%')
            ->orderBy('mascotas.id', 'desc')->get();
        }
        return response()->json([
            "status" => 200,
            "msg" => "Mascotas",
            "data" =>  $mascotas
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
        $mascota = new mascotas();
        $mascota->nombre_mascota =  $request->nombre_mascota;
        $mascota->id_cliente = $request->id_cliente;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->sexo = $request->sexo;
        $mascota->color = $request->color;
        $mascota->fecha_nacimiento = $request->fecha_nacimiento;
        $mascota->id_media = $request->id_media;

        $mascota->save();
        return response()->json([
            "status" => 200,
            "msg" => "Mascota registrada",
            "data" =>  $mascota
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
        $mascota = mascotas::join('clientes','mascotas.id_cliente','=','clientes.id')
        ->select('*','clientes.id', 'clientes.nombres','clientes.telefono','clientes.email','clientes.num_id')
        ->where('mascotas.id','=',$id)
        ->orderBy('mascotas.id', 'desc')->get();
        return response()->json([
            "status" => 200,
            "msg" => "Mascota",
            "data" =>  $mascota
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
        
        $mascota = mascotas::findOrFail($id);
        $mascota->nombre_mascota =  $request->nombre_mascota;
        $mascota->id_cliente = $request->id_cliente;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->sexo = $request->sexo;
        $mascota->color = $request->color;
        $mascota->fecha_nacimiento = $request->fecha_nacimiento;
        $mascota->id_media = $request->id_media;

        $mascota->save();
        return response()->json([
            "status" => 200,
            "msg" => "Mascota actualizada",
            "data" =>  $mascota
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
