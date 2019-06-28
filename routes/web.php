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


Route::get('/add','studentController@add');
Route::post('/do_add','studentController@do_add');
Route::get('/index','studentController@index');
Route::get('/del','studentController@del');
Route::get('/update','studentController@update');
Route::post('/do_update','studentController@do_update');


Route::get('/register','loginController@register');
Route::post('/register_do','loginController@register_do');
Route::get('/login','loginController@login');
Route::post('/login_do','loginController@login_do');
Route::get('/list','loginController@list'); 


Route::get('/add_zhou','zhouController@add_zhou');
Route::post('/do_add_zhou','zhouController@do_add_zhou');
Route::get('/index_zhou','zhouController@index_zhou');
Route::get('/del_zhou','zhouController@del_zhou');
Route::get('/update_zhou','zhouController@update_zhou');
Route::post('/do_update_zhou','zhouController@do_update_zhou');
Route::get('/sou_zhou','zhouController@sou_zhou');


Route::get('/user','userController@index');

Route::get('/index_shop','shopController@index_shop');


Route::get('/login_admin','adminController@login_admin');
Route::any('/do_login_admin','adminController@do_login_admin');
Route::get('/index_admin','adminController@index_admin');
Route::get('/add_admin','adminController@add_admin');
Route::post('/do_add_admin','adminController@do_add_admin');
Route::get('/list_admin','adminController@list_admin');
Route::get('/shang_add_admin','adminController@shang_add_admin');
Route::post('/do_shang_add_admin','adminController@do_shang_add_admin');
Route::get('/shang_list_admin','adminController@shang_list_admin');
Route::get('/del_admin','adminController@del_admin');
Route::get('/update_admin','adminController@update_admin');
Route::get('/tian_admin','adminController@tian_admin');
Route::post('/do_tian_admin','adminController@do_tian_admin');
Route::get('xue_admin','adminController@xue_admin');
Route::get('/xue_del_admin','adminController@xue_del_admin');
Route::get('/xue_update_admin','adminController@xue_update_admin');
Route::post('/do_xue_update_admin','adminController@do_xue_update_admin');

Route::prefix('/')->group(function(){
	Route::get('/','indexController@index_index');
	Route::any('/login_index','indexController@login_index');
	Route::get('/logout','indexController@logout');
	Route::get('/list_index','indexController@list_index');
	Route::get('/details_index','indexController@details_index');
	Route::get('/cart_index','indexController@cart_index');
	Route::get('/cart_shi_index','indexController@cart_shi_index');
	Route::get('/Settlement_index','indexController@Settlement_index');
	Route::get('/do_settlement_index','indexController@do_settlement_index');
	Route::get('/pay','AliPayController@pay');
	Route::get('/return_url','indexController@return_url');
	Route::get('/asynUrl','indexController@asynUrl');
});

