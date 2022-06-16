<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;


Route::prefix('students')->group(function () {

    Route::get('/', [StudentsController::class, 'index']);
    Route::get('/get/{id}', [StudentsController::class, 'show']);
    Route::post('/create', [StudentsController::class, 'store']);
    Route::put('/update/{id}', [StudentsController::class, 'update']);
    Route::delete('/delete/{id}', [StudentsController::class, 'destroy']);
});
