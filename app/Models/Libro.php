<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
       // Aquí defines las columnas que pueden ser asignadas masivamente
       protected $fillable = [
        'titulo',
        'autor',
        'editorial',
    ];
}
