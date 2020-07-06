<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get('/{lang}', function ($lang) {
//     App::setLocale($lang);
//     return view('welcome');
// });
// 

Route::get('/', 'AuthController@login');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');


// Route::get('/dashboard', '/login');
Route::group(['middleware' => ['auth', 'CheckRole:admin,pegawai']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    Route::get('/employees', 'EmployeesController@index');
    Route::post('/employees/create', 'EmployeesController@create');
    Route::get('/employees/{employees}/{locale}/edit', 'EmployeesController@edit');
    Route::post('/employees/{employees}/{locale}/update', 'EmployeesController@update');
    Route::get('/employees/{employees}/{locale}/delete', 'EmployeesController@delete');


    Route::get('/tasks', 'TasksController@index');
    Route::post('/tasks/create', 'TasksController@create');
    Route::get('/tasks/{tasks}/edit', 'TasksController@edit');
    Route::post('/tasks/{tasks}/update', 'TasksController@update');
    Route::get('/tasks/{tasks}/delete', 'TasksController@delete');

    Route::get('/setuser', 'SettingController@index');
});

Route::group(['middleware' => ['auth', 'CheckRole:pegawai']], function () {
    Route::get('/mytasks', 'TasksController@mytasks');
});

Route::get('/logout', 'AuthController@logout');
