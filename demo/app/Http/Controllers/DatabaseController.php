<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dynamic;
use Config;
use DB;
use App\Http\Requests;
use App\MyConfig;
use Yajra\Datatables\Datatables;

class DatabaseController extends Controller
{
	

	public function __construct()
	{
		$this->middleware(['auth','check_connection']);
	}


	public function listDatabase() {
		$data = DB::select('SHOW DATABASES');
		$dbs = array();
		$i=0;
		foreach ($data as $key => $value) {
			foreach ($value as $key1 => $val) {
				$dbs[$i] = $val;
				$i++;
			}
		}
		return view('show_databases', [ 'dbs' => $dbs ] );

	}


	public function listTables(Request $request) {
		$this->updateConnection($request->database);

		$request->session()->forget('cols');

		$data = DB::select('SHOW TABLES');
		$tables = array();
		$i=0;
		foreach ($data as $key => $value) {
			foreach ($value as $key1 => $val) {
				$tables[$i] = $val;
				$i++;
			}
		}
		return view('show_tables', [ 'tables' => $tables ] );
	}


	public function showAjaxData($table,Request $request) {

		// return Config::get('database.connections.tenant.database');
		// return session('database');

		if($request->cols) {
			session(['cols' => $request->cols]);
		}
		

		if($table == '') {
			return "<h4> <center> Table Not found </center> </h4>";
		}

		
		$model = new Dynamic([]);
		$model = $model->setTable($table);

		$table_col = [];
		$table_col_select = [];
		$table_col_check = [];
		if($model->count() != 0){
			if( !$request->session()->has('cols') ) {
				$table_col_set = array_keys($model->first()->toArray());
				session(['cols' => $table_col_set]);
			}
			$table_col_select = array_keys($model->first()->toArray());
			$table_col = array_keys($model->first(session('cols'))->toArray());

		}


		return view('show_table_data', [ 
			'table_col' => $table_col, 
			'table_name' => $table, 
			'table_col_select' => $table_col_select
		]);

	}


	public function fetch_data(Request $request) {
		if($request->ajax()) {

			$model = new Dynamic([]);
			$model = $model->setTable($request->table);
			$data = $model->get(session('cols'));

			return Datatables::of($data)->make();

		}
	}



	public function updateConnection($database) {
		Config::set('database.connections.tenant.database', $database );
		Config::set('database.connections.tenant.host', session('host') );
		Config::set('database.connections.tenant.username', session('db_user') );
		Config::set('database.connections.tenant.password', session('db_pass') );
		Config::set('database.default', 'tenant');
		DB::purge('tenant');
		DB::reconnect('tenant');
		session(['database' => $database]);
	}
	

}


// Send Table function 
// public function showAjaxData($table,Request $request) {

// 		// return Config::get('database.connections.tenant.database');
// 		// return session('database');

// 		if($request->cols) {
// 			session(['cols' => $request->cols]);
// 		}

// 		// session(['cols' => ['id','name'] ]);

// 		if($table == '') {
// 			return "<h4> <center> Table Not found </center> </h4>";
// 		}

// 		$item_per_page =  MyConfig::find(1)->value;

// 		$model = new Dynamic([]);
// 		$model->setTable($table);

// 		$table_col = [];
// 		$table_col_select = [];
// 		$table_col_check = [];
// 		if($model->count() != 0){
// 			if( !$request->session()->has('cols') ) {
// 				$table_col_set = array_keys($model->first()->toArray());
// 				session(['cols' => $table_col_set]);
// 			}
// 			$table_col_select = array_keys($model->first()->toArray());
// 			$table_col = array_keys($model->first(session('cols'))->toArray());

// 		}
// 		$table_data = $model->paginate($this->items_per_page,session('cols'))->appends([ 'table' => $table ]);

// 		// return $table_data;

// 		return view('show_table_data', [
// 			'table_data' => $table_data, 
// 			'table_col' => $table_col, 
// 			'table_name' => $table, 
// 			'item_per_page' => $item_per_page,
// 			'table_col_select' => $table_col_select,
// 			'total' => $model->count()
// 			]);

// 	}


//Fetch ajax function
// public function fetch_data(Request $request) {
// 		if($request->ajax()) {
// 			$model = new Dynamic([]);
// 			$model->setTable($request->table);
// 			$table_col = [];
// 			if($model->count() != 0){
// 				$table_col = array_keys($model->first(session('cols'))->toArray());
// 			}

// 			$table_data =  $model->paginate($this->items_per_page,session('cols'))->appends([ 'table' => $request->table ]);
// 			return view('show', ['table_data' => $table_data, 'table_col' => $table_col ])->render();

// 		}
// 	}