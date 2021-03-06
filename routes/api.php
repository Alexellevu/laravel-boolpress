<?php

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//senza controller con la closure
/* Route::get('posts', function()
{      
    $posts = Post::all();
    return response()->json([
        'status_code' => 200,
        'response' => $posts
    ]);

}); */


//scorciatoia con paginazione

/* Route::get('posts', function () {
    $posts = Post::paginate(5);
    return $posts;
}); */


//scorciatoia non customizzabile
/* Route::get('posts', function () {
    $posts = Post::all();
    return $posts;
}); */

//scorciatoia con relazioni
