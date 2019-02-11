<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Freshbitsweb\Laratables\Laratables;
use App\Dynamic;
use DB;

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

	public function testsp($tab) {
		// return DB::select("call selecttable('".$tab."')");
		$pro = DB::select('SHOW PROCEDURE STATUS');
		// return $pro;
		return view('test', [ 'pro' => $pro ] );
		// return DB::select("call r_b_d('2019-01-26','2019-01-30')");
		
	}
}
