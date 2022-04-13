<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','descripcion','condicion'];
    
    public function articulos()
    {
        return $this->hasMany('App\Models\articulo');
    }

}
