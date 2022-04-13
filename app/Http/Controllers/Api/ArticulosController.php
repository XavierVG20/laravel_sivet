<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\articulos;
use App\Models\media;
use  Cloudynary;

class ArticulosController extends Controller
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
        $articulos = articulos::join('categorias','articulos.id_categoria','=','categorias.id')
        ->leftjoin('media', 'articulos.id_media', '=', 'media.id' )
        ->select('articulos.id', 'articulos.id_media','articulos.id_categoria','articulos.codigo','articulos.articulo','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion','media.public_id','media.file_url','media.file_name')
        
        ->orderBy('articulos.id', 'desc')->get();
        } else{
            $articulos = articulos::join('categorias','articulos.id_categoria','=','categorias.id')
            ->leftjoin('media', 'articulos.id_media', '=', 'media.id' )
            ->select('articulos.id', 'articulos.id_media','articulos.id_categoria','articulos.codigo','articulos.articulo','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion','media.public_id','media.file_url','media.file_name')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('articulos.stock','>','0')
            ->orderBy('articulos.id', 'desc')->get();
        }
    
            return response()->json([
                "status" => 200,
                "msg" => "Articulos",
                "data" =>  $articulos
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
        if ($request->hasFile('file')) {
            # clodynary 

            $result = $request->file->storeOnCloudinary('articulos');
 
            $media = new media();
           // $media->idmedia = $request->id;
            $media->public_id = $result->getPublicId();
            $media->medially = $result->getExtension();
            $media->file_url =  $result->getSecurePath();
            $media->file_name = $result->getFileName();
            $media->file_type = $result->getFileType();
            $media->size = $result->getSize();
                       
            $media->save();

            $articulo = new articulos();
            $articulo->id_categoria = $request->id_categoria;
            $articulo->codigo = $request->codigo;
            $articulo->articulo = $request->articulo;
            $articulo->precio_venta = $request->precio_venta;
            $articulo->stock = $request->stock;
            $articulo->descripcion = $request->descripcion;
            $articulo->condicion = '1';
            $articulo->id_media =  $media->id;
            $articulo->save();
            return response()->json([
                "status" => 200,
                "msg" => "Articulos Guardado",
                "data" =>  $articulo , $media
            ]); 
        } else {
            $articulo = new articulos();
            $articulo->id_categoria = $request->id_categoria;
            $articulo->codigo = $request->codigo;
            $articulo->articulo = $request->articulo;
            $articulo->descripcion = $request->descripcion;
            $articulo->stock = $request->stock;
            $articulo->precio_venta = $request->precio_venta;
            $articulo->condicion = '1';
            $articulo->save();
            return response()->json([
                "status" => 200,
                "msg" => "Articulos Guardado",
                "data" =>  $articulo 
            ]); 

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $articulo = articulos::findOrFail($id);
        return response()->json([
          "status" => 200,
          "msg" => "articulo",
          "data" =>  $articulo
      ],200);
    }

    public function listaArticulos(Request $request)
    {
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar==''){
        $articulos = articulos::join('categorias','articulos.id_categoria','=','categorias.id')
        ->leftjoin('media', 'articulos.id_media', '=', 'media.id' )
        ->select('articulos.id', 'articulos.id_media','articulos.id_categoria','articulos.codigo','articulos.articulo','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion','media.public_id','media.file_url','media.file_name')
        
        ->orderBy('articulos.id', 'desc')->get();
        } else{
            $articulos = articulos::join('categorias','articulos.id_categoria','=','categorias.id')
            ->leftjoin('media', 'articulos.id_media', '=', 'media.id' )
            ->select('articulos.id', 'articulos.id_media','articulos.id_categoria','articulos.codigo','articulos.articulo','categorias.nombre as nombre_categoria','articulos.precio_venta','articulos.stock','articulos.descripcion','articulos.condicion','media.public_id','media.file_url','media.file_name')
            ->where('articulos.'.$criterio, 'like', '%'. $buscar . '%')
            ->where('articulos.stock','>','0')
            ->orderBy('articulos.id', 'desc')->get();
        }
    
        return response()->json([
          "status" => 200,
          "msg" => "articulo",
          "data" =>  $articulos
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
        //
        if ($request->hasFile('file')) {
            # clodynary 
            if ($request->public_id) {
                Cloudinary::destroy($request->public_id);

                $result = $request->file->storeOnCloudinary('articulos');
 
                $media = media::findOrFail($request->id_media);;
               // $media->idmedia = $request->id;
                $media->public_id = $result->getPublicId();
                $media->medially = $result->getExtension();
                $media->file_url =  $result->getSecurePath();
                $media->file_name = $result->getFileName();
                $media->file_type = $result->getFileType();
                $media->size = $result->getSize();
                           
                $media->save();
    
                $articulo = articulos::findOrFail($request->id);
                $articulo->id_categoria = $request->id_categoria;
                $articulo->codigo = $request->codigo;
                $articulo->articulo = $request->articulo;
                $articulo->precio_venta = $request->precio_venta;
                $articulo->stock = $request->stock;
                $articulo->descripcion = $request->descripcion;
                $articulo->condicion = '1';
               
                $articulo->save();
                return response()->json([
                    "status" => 200,
                    "msg" => "Articulos editado",
                    "data" =>  $articulo , $media
                ]); 
            } else{
                $articulo = articulos::findOrFail($request->id);
                $articulo->id_categoria = $request->id_categoria;
                $articulo->codigo = $request->codigo;
                $articulo->articulo = $request->articulo;
                $articulo->precio_venta = $request->precio_venta;
                $articulo->stock = $request->stock;
                $articulo->descripcion = $request->descripcion;
                $articulo->condicion = '1';
               
                $articulo->save();
                return response()->json([
                    "status" => 200,
                    "msg" => "Articulos editado",
                    "data" =>  $articulo , $media
                ]); 

            }
           
        } 
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
