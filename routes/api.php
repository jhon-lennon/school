<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::prefix('students')->group(function () {

    Route::get('/', [StudentsController::class, 'index']);
    Route::get('/{id}', [StudentsController::class, 'show']);
    Route::post('/create', [StudentsController::class, 'store']);
    Route::put('/{id}', [StudentsController::class, 'update']);
    Route::delete('/{id}', [StudentsController::class, 'destroy']);
});
