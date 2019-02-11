<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');
Route::get('/userhome', 'HomeController@index' )->middleware('check_user');

// -------------------------------------------- //

Route::get('addcredentials', 'MyDBController@credentials');
Route::get('databases', 'DatabaseController@listDatabase');
Route::post('tables', 'DatabaseController@listTables');

Route::get('showtabledata/{table}', 'DatabaseController@showAjaxData');
Route::get('ajaxtabledata/fetch_data', 'DatabaseController@fetch_data');

Route::post('connect-new', 'MyDBController@index');

Route::get('changeipp/{ipp}', 'DatabaseController@setIPP');
Route::get('testipp', 'DatabaseController@testipp');


Route::get('sendlaratables/{table}', 'TestLaratablesController@sendData')->name('sendlaratables');
Route::get('testlaratables', 'TestLaratablesController@index');


Route::get('testsp/{tab}', 'TestLaratablesController@testsp');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
