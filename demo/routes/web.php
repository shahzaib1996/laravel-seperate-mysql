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
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/customer/{id}', 'PagesController@customer');
Route::get('/orders', 'PagesController@orders');

Route::get('/material', 'MaterialController@create')->middleware('check_admin','check_connection');
Route::post('/store', 'MaterialController@store')->middleware('check_admin');
Route::get('/view-materials', 'MaterialController@view');
Route::get('/delete-material/{id}', 'MaterialController@delete')->middleware('check_admin');
Route::get('/edit-material/{id}', 'MaterialController@edit')->middleware('check_admin');
Route::post('/update', 'MaterialController@update')->middleware('check_admin');

Route::get('/brand', 'BrandController@create')->middleware('check_admin');
Route::post('/store-brand', 'BrandController@store')->middleware('check_admin');
Route::get('/view-brands', 'BrandController@view');
Route::get('/delete-brand/{id}', 'BrandController@delete')->middleware('check_admin');
Route::get('/edit-brand/{id}', 'BrandController@edit')->middleware('check_admin');
Route::post('/update-brand', 'BrandController@update')->middleware('check_admin');


// -------------------------------------------- //

Route::get('addcredentials', 'MyDBController@credentials');
Route::get('databases', 'DatabaseController@listDatabase');
Route::post('tables', 'DatabaseController@listTables');
// Route::get('show-table-data', 'DatabaseController@showTableData');
Route::get('showtabledata/{table}', 'DatabaseController@showAjaxData');
Route::get('ajaxtabledata/fetch_data', 'DatabaseController@fetch_data');



Route::post('connect-new', 'MyDBController@index');


Route::get('testing', 'MyDBController@testing')->middleware('check_connection');
Route::get('list-tables', 'MyTestingController@index')->middleware('check_connection');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
