<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cliente',
        'id_usuario',
        'tipo_comprobante',
        'impuestos',
        'total'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function clientes(){
        return $this->belongsTo('App\Models\clientes');
    }
}
