<?php

use App\Http\Controllers\PostsController;
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

// Routes api pour les posts
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/{slug}', [PostsController::class, 'show']);
Route::post('/posts/add', [PostsController::class, 'store']);
Route::put('/posts/update/{slug}', [PostsController::class, 'update']);
//Route::post('posts/{id}/update', [PostsController::class, 'update']);
Route::delete('/posts/delete/{slug}', [PostsController::class, 'destroy']);

// Routes api pour les commentaires

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
