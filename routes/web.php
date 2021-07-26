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
/* Altre Pagine non connesse ad un entitá/modello  */
Route::get('/', 'PageController@index');
Route::get('about', 'PageController@about');
Route::get('contacts', 'PageController@contacts');

/* Posts per l'utente */
Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');


Auth::routes();


/* Admin Routes */
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function() {

Route::get('/', 'HomeController@index')->name('dashboard');
Route::resource('posts', PostController::class);


});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
