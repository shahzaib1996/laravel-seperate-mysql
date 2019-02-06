<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{	


	protected $fillable = [
		'name', 'details', 'price'
	]; 

    public function reviews() {
    	return $this->hasMany('App\Review');
    }
}
