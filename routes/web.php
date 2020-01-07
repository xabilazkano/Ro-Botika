<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/registerform', function (){
	return view('auth.register');
})->name('registerform');

Route::get('/usuarios', 'UsuariosController@index')->name('usuarios.index');
Route::get('/usuarios/{id}', 'UsuariosController@destroy')->name('usuarios.delete');
Route::get('/usuarios/{id}/edit', 'UsuariosController@edit')->name('usuarios.edit');
Route::put('/usuarios/{id}', 'UsuariosController@update')->name('usuarios.update');

Route::post('/Contacto', 'ContactController@store')->name('store');

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Auth::routes(['verify' => true]);

Route::get('/verify', 'Auth\RegisterController@index')->name('verify');

Route::get('/landingPage', function(){
  return view('landingpage');
})->name('landingpage');

Route::get('/admin', 'AdminController@index')->name('homeAdmin');

Route::get('/home', 'HomeController@index')->name('homeStandar');

Route::group(['middleware' => ['auth','verified']], function(){
  Route::resource('patients','PatientController')->only(['index','show']);
  Route::resource('beds','BedController')->only(['index','show']);
  Route::resource('assistances','AssistanceController')->only(['index','show']);
  Route::resource('medicines','MedicineController')->only(['index','show']);
});

Route::group(['middleware' => ['role']], function () {
  Route::resource('adminPatients','PatientController')->only(['create','store','edit','update','destroy']);
  Route::resource('adminBeds','BedController')->only(['create','store','edit','update','destroy']);
  Route::resource('adminAssistances','AssistanceController')->only(['create','store','edit','update','destroy']);
  Route::resource('adminMedicines','MedicineController')->only(['create','store','edit','update','destroy']);
});
