<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;
    protected $fillable  = [
        'n_empresa',
        'n_ruc',
        'direccion',
        'email',
        'descripcion',

    ];
}
