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

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('user/area_select/', 'UserEriaContoroller@index');

Route::post('register/check/', 'UserController@showRegisterCheck');

Auth::routes();

Route::view('home/', 'home');

Route::view('profile/', 'profile');

Route::view('syoukaijou/', 'syoukaijou_create');


// Route::view('area_select/', 'area_select');
// Route::view('register', 'auth/register');
// Route::view('register_check', 'auth/register_check');
// Route::get('test/', 'UserEriaContoroller@index');
