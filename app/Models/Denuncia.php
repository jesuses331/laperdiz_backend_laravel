<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'ciudad',
        'resumen',
        
    ];

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
