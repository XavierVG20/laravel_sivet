<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedores extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $fillabl = [
    'empresa',
    'n_ruc',
    'direccion',
    'telefono',
    'email',
    'n_contacto',
    't_contacto'];

    public function ingresos()
    {
        return $this->hasOne('App\Models\ingresos');
    }
}
