<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Freshbitsweb\Laratables\Laratables;
use App\Dynamic;
use DB;
use Config;
use Yajra\Datatables\Datatables;


class TestLaratablesController extends Controller
{
	public function __construct()
	{
		// $this->middleware(['auth','check_connection']);
		
	}

	public function index() {
		return view('testlaratables', [ 'table_name' => 'reviews' ] );
	}
	public function sendData($table) {

		$model = new Dynamic([]);
		$model->setTable('reviews');
		return Laratables::recordsOf(Dynamic::class);
	}

	public function sendview() {
		$table = 'products';

		// if($request->cols) {
		// 	session(['cols' => $request->cols]);
		// }

		// session(['cols' => ['id','name'] ]);

		if($table == '') {
			return "<h4> <center> Table Not found </center> </h4>";
		}

		
		$model = new Dynamic([]);
		$model = $model->setTable($table);
		
		

		$table_col = [];
		$table_col_select = [];
		if($model->count() != 0){
			// if( !$request->session()->has('cols') ) {
			// 	$table_col_set = array_keys($model->first()->toArray());
			// 	session(['cols' => $table_col_set]);
			// }
			$table_col_select = array_keys($model->first()->toArray());
			$table_col = array_keys($model->first(session('cols'))->toArray());

		}
		$table_data = $model->get();

		// return $table_data;

		return view('test_dt', [
			'table_data' => $table_data, 
			'table_col' => $table_col, 
			'table_name' => $table
			]);


		// return view('test_dt');
	}

	public function sendyd() {
		// $users = Product::all();
		$model = new Dynamic([]);
		$model = $model->setTable('products');
		$users = $model->get();

		// $table_col = [];
		// $table_col_select = [];
		// $table_col_check = [];
		// if($model->count() != 0){
		// 	if( !$request->session()->has('cols') ) {
		// 		$table_col_set = array_keys($model->first()->toArray());
		// 		session(['cols' => $table_col_set]);
		// 	}
		// 	$table_col_select = array_keys($model->first()->toArray());
		// 	$table_col = array_keys($model->first(session('cols'))->toArray());

		// }

		// return $users;
        return Datatables::of($users)->make();
	}

}
