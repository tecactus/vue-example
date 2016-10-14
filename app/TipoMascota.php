<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMascota extends Model
{
    public function razas()
    {
    	return $this->hasMany(Raza::class);
    }
}
