<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padrino extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'origen',
        'destino',
        'fecha',
        'telefono',
    ];
}
