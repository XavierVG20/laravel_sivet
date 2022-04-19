<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;
    protected $table = 'historial';
    protected $fillable = [
        'descripcion',
        'diagnostico',
        'tratamiento',
        'id_mascota',
        'id_cita'
    ];

    public function mascotas(){
        return $this->belongsTo('App\Models\mascotas');
    }
    public function citas(){
        return $this->belongsTo('App\Models\citas');
    }
}
