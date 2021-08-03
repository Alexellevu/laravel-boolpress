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
Route::get('/', 'PageController@index')->name('home');
Route::get('about', 'PageController@about')->name('about');
Route::get('contacts', 'PageController@contacts')->name('contacts');
Route::post('contacts', 'PageController@sendFormMail')->name('contacts.send');

/* Posts per l'utente */
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');

/* Admin Routes */
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function() {

Route::get('/', 'HomeController@index')->name('dashboard');
Route::resource('posts', PostController::class);

});

/* 
Categories table
-migration
-model
-controller(resources nel namespace ADMIN)
-seeder
*/




