<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/games', 'Api\GamesController@index');
    Route::get('/genres', 'Api\GenresController@index');
    Route::get('/platforms', 'Api\PlatformsController@index');
    Route::post('/games/search', 'Api\GamesController@search');
    Route::get('/mark-as-favorite/{game}', 'Api\FavoritesController@markAsFavorite');
});