<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categorias;
class CategoriaController extends Controller
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

        $categorias = categorias::all();
 
    return response()->json([
        "status" => 200,
        "msg" => "Categorias",
        "data" =>  $categorias
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
    $categoria = new categorias();
    $categoria->nombre = $request->nombre;
    $categoria->descripcion = $request->descripcion;
    $categoria->condicion = '1';
    $categoria->save();
    return response()->json([
        "status" => 200,
        "msg" => "Categoria Guardada"
    ]); 
  }
 /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorias  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      try {
        $categoria = categorias::findOrFail($request->id);
        return response()->json([
          "status" => 200,
          "msg" => "Categorias",
          "data" =>  $categoria
      ],200);
        } catch (\Throwable $th){
          return response($th->getMessage(), 400);
        }
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request)
  {
      # code...
      $categoria = categorias::findOrFail($request->id);
      $categoria->nombre = $request->nombre;
      $categoria->descripcion = $request->descripcion;
      $categoria->condicion = '1';
      $categoria->save();

      return response()->json([
        "status" => 200,
        "msg" => "Categoria Actualizada"
    ]); 
  }
  public function desactivar(Request $request)
  {
      $categoria = categorias::findOrFail($request->id);
      $categoria->condicion = '0';
      $categoria->save();
      return response()->json([
        "status" => 200,
        "msg" => "Categoria desactivada"
    ]); 
  }

  public function activar(Request $request)
  {
      $categoria = categorias::findOrFail($request->id);
      $categoria->condicion = '1';
      $categoria->save();

      return response()->json([
        "status" => 200,
        "msg" => "Categoria activada"
    ]); 
  }
  public function delete(Request $request)
  {
      # code...
  }
}
