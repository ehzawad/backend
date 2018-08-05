<?php

use Illuminate\Http\Request;

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


// List Articles
Route::get('pictures', 'PictureController@index');

// List Single articles
Route::get('picture/{id}', 'PictureController@show');


// Create New articles
Route::post('picture', 'PictureController@store');

// Update article
Route::put('picture', 'PictureController@store');

// delete article
Route::delete('picture/{id}', 'PictureController@destroy');
