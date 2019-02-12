<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dynamic;
use DB;
use Config;

class ProcedureController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth','check_database']);
		
	}
	public function inex() {

	}
	public function procedures() {
		// return DB::select("call selecttable('".$tab."')");
		$pro = DB::select("select * from information_schema.routines where routine_type = 'PROCEDURE' AND routine_schema = '".session('database')."' ");
		// return $pro;
		// return DB::select("SELECT * FROM information_schema.parameters WHERE SPECIFIC_NAME = 'xyz'");
		return view('test', [ 'pro' => $pro ] );
		// $pp = "";
		// $arr = [ 'reviews', '2', '4' ];
		// for($i=0;$i<count($arr);$i++) {
		// 	$pp .= "'";
		// 	$pp .= $arr[$i];
		// 	$pp .= "',";

		// }
		// return $pp;
		// return DB::select("call xyz(?,?,?)",array('reviews',1,3));
		
	}

	public function getPara(Request $request) {

		$para = DB::select("SELECT * FROM information_schema.parameters WHERE SPECIFIC_NAME = '$request->procedure'");

		return view('list_sp_para', [ 'procedure' => $request->procedure, 'para' => $para ] );
	}
	public function runSP(Request $request) {

		$pro = $request->procedure;
		$fields = $request->Fields;
		$f_type = $request->F_type;

		// return $pro;

		$qs = "";
		if($fields) {
			for($i=0;$i<count($fields);$i++) {
				$qs .= "?";
				if($i != (count($fields)-1) ) {
					$qs .= ",";
				}
			}		
		} else {
			$fields = [];
		}
		
		// return DB::select("call ".$pro."(".$qs.")",$fields);
		$table_data = DB::select("call ".$pro."(".$qs.")",$fields);

		$table_col = [];
		$i = 0;
		if($table_data) {
			foreach ($table_data[0] as $key => $value) {
				$table_col[$i] = $key;
				$i++;
			}
		}

		return view('display_sp_result' , [ 'table_data' => $table_data, 'table_col' => $table_col, 'pro_name' => $pro ]);


	}
}
