<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dynamic;
use Config;
use DB;
use App\Http\Requests;


class DatabaseController extends Controller
{

	private $items_per_page = 10;

	public function __construct()
	{
		$this->middleware(['auth','check_connection']);
	}

	public function setIPP() {

	}

	public function getIPP() {
		
	}


	public function index() {

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

	public function showTableData(Request $request) {
		// $data = DB::table($request->table)->get();
		// return view('show_table_data', [ 'data' => $data ] );

		// Testing Eloquent
		$model = new Dynamic([]);
		$model->setTable($request->table);
		
		$table_col = [];
		if($model->count() != 0){
			$table_col = array_keys($model->first()->toArray());
		}
		$table_data = $model->paginate(10)->appends([ 'table' => $request->table ]);
		
		return view('show_table_data', [ 'table_data' => $table_data, 'table_col' => $table_col ] );


	}

	public function showAjaxData($table) {
		// $data = DB::table($request->table)->get();
		// return view('show_table_data', [ 'data' => $data ] );

		if($table == '') {
			return "<h4> <center> Table Not found </center> </h4>";
		}
		
		// // Testing Eloquent
		$model = new Dynamic([]);
		$model->setTable($table);
		
		// $table_col = [];
		// if($model->count() != 0){
		// 	$table_col = array_keys($model->first()->toArray());
		// }
		// $table_data = $model->paginate(10)->appends([ 'table' => $request->table ]);
		
		// return view('show_ajax_data', [ 'table_data' => $table_data, 'table_col' => $table_col ] );

		// ===========

		$table_col = [];
		if($model->count() != 0){
			$table_col = array_keys($model->first()->toArray());
		}
		$table_data = $model->paginate($this->items_per_page)->appends([ 'table' => $table ]);

		return view('show_table_data', ['table_data' => $table_data, 'table_col' => $table_col, 'table_name' => $table ]);

		// ===========


	}

	

	public function fetch_data(Request $request) {
		if($request->ajax()) {
			$model = new Dynamic([]);
			$model->setTable($request->table);
			$table_col = [];
			if($model->count() != 0){
				$table_col = array_keys($model->first()->toArray());
			}
			
			$table_data =  $model->paginate($this->items_per_page)->appends([ 'table' => $request->table ]);
			return view('show', ['table_data' => $table_data, 'table_col' => $table_col ])->render();
			
		}
	}


	public function updateConnection($table) {
		Config::set('database.connections.tenant.database', $table );
		Config::set('database.connections.tenant.host', session('host') );
		Config::set('database.connections.tenant.username', session('db_user') );
		Config::set('database.connections.tenant.password', session('db_pass') );
		Config::set('database.default', 'tenant');
		DB::purge('tenant');
		DB::reconnect('tenant');
		session(['database' => $table]);
	}
	

}
