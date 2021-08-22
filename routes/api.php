<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\UserController;

use App\Http\Controllers\api\AddressController;

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

// Route::group(['prefix' => 'users', 'middleware' => 'auth:api'], function(){
//     Route::post('/', 'api\canadadrives\MainController@index');
// });

Route::group(['prefix' => 'users'], function(){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
    Route::patch('/addPoint/{id}', [UserController::class, 'addPoint']);
    Route::patch('/subPoint/{id}', [UserController::class, 'subPoint']);

    Route::group(['prefix' => '{user_id}/addresses'], function(){
        Route::post('/', [AddressController::class, 'store']);
    });
});
