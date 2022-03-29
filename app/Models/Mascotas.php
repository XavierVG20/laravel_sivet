<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mascotas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_mascota',
        'id_cliente',
        'especie',
        'raza',
        'sexo',
        'color',
        'fecha_nacimiento'
    ];

    public function historial()
    {
        return $this->hasOne('App\Models\historial');
    }
}
