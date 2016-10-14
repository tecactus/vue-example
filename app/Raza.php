<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    public function tipo_mascota()
    {
    	return $this->belongsTo(TipoMascota::class);
    }
}
