<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Posttag;
use App\Http\Controllers\API\PassportController;

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

Route::group(['namespace' => 'API'], function () {
	Route::post('register', [PassportController::class, 'register']);
	Route::post('login', [PassportController::class, 'login']);
	Route::post('logout', 'AuthController@logout')->middleware('auth:api');
});

Route::resource('posts', PostController::class);
