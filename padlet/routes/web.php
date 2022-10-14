<?php

use App\Http\Controllers\PaddletController;
use Illuminate\Support\Facades\Route;


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
Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@do']);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/paddlets', PaddletController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
