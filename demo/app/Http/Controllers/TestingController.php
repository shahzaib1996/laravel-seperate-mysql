<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function showName($name) {
    	return view('unit', [ 'name' => $name ] );
    }
}
