<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Freshbitsweb\Laratables\Laratables;
use App\Dynamic;
use DB;
use Config;

class TestLaratablesController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','check_connection']);
		
	}

	public function index() {
		return view('testlaratables', [ 'table_name' => 'reviews' ] );
	}
	public function sendData($table) {

		$model = new Dynamic([]);
		$model->setTable('reviews');
		return Laratables::recordsOf(Dynamic::class);
	}

}
