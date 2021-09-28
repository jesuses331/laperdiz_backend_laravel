<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = [
        'autor',
        'titulo',
        'descripcion',
        'ciudad',
        'resumen',
        
    ];

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
