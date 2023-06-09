<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Backend\LaguController;
use App\Http\Controllers\PenumpangController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);

Route::apiResource('produks', ProdukController::class);

Route::apiResource('lagus', LaguController::class);

// Route::group(['prefix'=>'lagu'], function(){
//     Route::group(['middleware'=>'auth:sanctum'], function(){
//         Route::get('get_all','Backend\LaguController@getAll');
//         Route::post('tambah','Backend\LaguController@LaguStore');
//         Route::post('update','Backend\LaguController@LaguUpdate');
//         Route::post('delete','Backend\LaguController@destroy'); 
//     });
// });

Route::apiResource('penumpangs', PenumpangController::class);
