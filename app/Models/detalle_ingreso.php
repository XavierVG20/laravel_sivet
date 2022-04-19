<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_ingreso extends Model
{
    use HasFactory;
    protected $table = 'detalle_ingreso';
    protected $fillable = [
        'id_ingreso',
        'id_articulo',
        'cantidad',
        'precio',
    ];
}
