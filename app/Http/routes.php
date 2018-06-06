<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Colocamos la ruta de los empleados que proporciona su RFC
//Route::get('ingresoRFC/{RFC, token}', 'empleadoRFCController@RFC');
//Route::get('ingresoRFC/{RFC, method, _token}', function ($rfc, $method, $token) {
//    return "registro a " . $rfc;
//});

Route::post('ingresoRFC', 'empleadoRFCController@RFC');

Route::get('registro', function () {
    return view('registro');
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('log','LogController');
Route::get('logout','LogController@logout')->name('logout');

Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');

Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function () {
   Route::get('admin', function()
   {
   	 return view('admin.index',['active'=>'0', 'subm'=>'0', 'subm2'=>'0']);
   });
   Route::resource('empleados','EmpleadoController');
});