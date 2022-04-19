<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingresos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_proveedor',
        'id_usuario',
        'tipo_comprobante',
        'impuestos',
        'total'
    ];

    public function clientes(){
        return $this->belongsTo('App\Models\clientes');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    
}
