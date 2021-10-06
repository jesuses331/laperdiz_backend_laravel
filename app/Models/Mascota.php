<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'detalle',
        'etapa_id',
        'estado',
        'raza_id'
    ];

    public function etapas(){
        return $this->belongsTo('App\Models\Etapa');
    }

    public function razas(){
        return $this->belongsTo('App\Models\Raza');
    }

    public function images(){
        return $this->morphMany('App\Models\Image','imageable');
    }
}
