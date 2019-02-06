<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Str;
use Illuminate\Console\Command;


class MyDBController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(Request $request) {

		session(['host' => $request->host]);
		session(['database' => $request->database]);
		session(['db_user' => $request->db_user]);
		session(['db_pass' => $request->db_pass]);

		return redirect('databases');


	}

	public function credentials() {
		return view('credentials');
	}

	public function testing() {
		
		return DB::select('SHOW TABLES');
	}

}
