<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;

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

Route::prefix('bands')->group(function () {
    Route::get('/', [BandController::class, 'getAll']);
    Route::post('/', [BandController::class, 'store']);
    Route::get('/gender/{gender}', [BandController::class, 'getBandsByGender']);
    Route::get('/{id}', [BandController::class, 'getById']);
});
