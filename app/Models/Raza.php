<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'talla_id'
    ];

    public function tallas(){
        return $this->belongsTo('App\Models\Talla');
    }

    public function mascotas(){
        return $this->hasMany('App\Models\Mascota');
   }
}
