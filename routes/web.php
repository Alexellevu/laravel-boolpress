<?php

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

/* Guest Routes */

Route::get('/', function () {
    return view('welcome');
});
Route::resource('layouts', LayoutController::class)->only('index','show');


Auth::routes();


/* Admin Routes */
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function() {

Route::get('/', 'HomeController@index')->name('home');
Route::resource('layouts', LayoutController::class);


});




