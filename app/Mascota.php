<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
	protected $fillable = ['nombre', 'raza_id'];

    public function raza()
    {
    	return $this->belongsTo(Raza::class);
    }
}
