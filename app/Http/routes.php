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

Route::get('registro', function () { return view('registro');  });

Route::get('/', function () {    return view('welcome'); });

Route::resource('log','LogController');
Route::get('logout','LogController@logout')->name('logout');

Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');

Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

Route::group(['middleware' => 'auth'], function () {
   
   Route::get('perfil', 'FrontController@perfil')->name('perfil');
   Route::get('download/{file}','FrontController@download')->name('download');
   // Authentication routes...
   Route::resource('usuarios', 'usercontroller');

   Route::get('admin', function()
   {
   	 return view('admin.index',['active'=>'0', 'subm'=>'0', 'subm2'=>'0']);
   });
   
   Route::get('empleados/personal','EmpleadoController@datosper');
   Route::get('empleados/lista','EmpleadoController@lista')->name('empleados.lista');
   Route::get('empleados/editarall','EmpleadoController@editarall')->name('empleados.editarall');
   Route::get('empleados/oficiop/{id}','EmpleadoController@oficiop')->name('empleados.oficiop');
   Route::get('empleados/contrato/{id}','EmpleadoController@contrato')->name('empleados.contrato');
   Route::get('empleados/expediente','EmpleadoController@expediente')->name('empleados.expediente');
   Route::get('empleados/GuardarDOC','EmpleadoController@GuardarDOC')->name('empleados.GuardarDOC');
   Route::put('empleados/GuardarDOC','EmpleadoController@GuardarDOC')->name('empleados.GuardarDOC');
   Route::get('empleados/comprobantes','EmpleadoController@comprobantes')->name('empleados.comprobantes');
   
   Route::resource('empleados','EmpleadoController');
   
   // Catálogo de MAOS
   Route::resource('maos','MaosController');
   // Catálogo de Tarifas
   Route::resource('tarifas','TarifasController');

   Route::get('subirAvatar', 'StorageController@subirAvatar')->name('subirAvatar');
   Route::post('temp/crearAvatar', 'StorageController@GuardarAvatar');

});