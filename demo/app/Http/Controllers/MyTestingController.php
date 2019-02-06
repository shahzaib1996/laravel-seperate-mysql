<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MyTestingController extends Controller
{
    public function index() {
    	return DB::select('SHOW DATABASES');
    }
}
