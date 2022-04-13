<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    use HasFactory;
    protected $fillable = [
        'public_id',
        'medially',
        'file_url',
        'file_name',
        'file_type',
        'size'
    ];
}
