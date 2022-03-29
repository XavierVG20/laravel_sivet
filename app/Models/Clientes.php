<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'num_id',
        'telefono',
        'email'
    ];
    public function ventasa()
    {
        return $this->hasOne('App\Models\ventas');
    }
    
}
