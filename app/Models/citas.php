<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    use HasFactory;
    protected  $fillable = [
        'descripcion',
        'fecha_reserva',
        'estado'
    ]; 

    public function historial()
    {
        return $this->hasOne('App\Models\historial');
    }
    
}
