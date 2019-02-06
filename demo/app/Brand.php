<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function material() {
    	return $this->belongsTo('App\Material');
    }
}
