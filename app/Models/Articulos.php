<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articulos extends Model
{
    use HasFactory;
    protected  $fillable = [
        'id_categoria',
        'codigo',
        'articulo',
        'descripcion',
        'stock',
        'precio_venta',
        'condicion'
    ];

    public function categorias()
    {
        return $this->belongsTo('App\Models\categorias');
    }
}
