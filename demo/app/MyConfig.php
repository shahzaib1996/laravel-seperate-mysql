<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyConfig extends Model
{
	protected $connection = 'mysql';
    protected $table = 'config';
}
