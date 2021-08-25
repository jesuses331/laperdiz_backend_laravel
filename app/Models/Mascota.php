<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    public function etapas(){
        return $this->belongsTo('App\Models\Etapa');
    }

    public function razas(){
        return $this->belongsTo('App\Models\Raza');
    }
}
