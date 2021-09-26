<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



//rutas publicas
Route::post('/login', [AuthController::class, 'login']);
Route::post('/registre', [AuthController::class, 'register']);
   
//rutas protegidas
Route::middleware(['auth:sanctum'])->group(function() { 
    Route::get('/logout', [AuthController::class, 'logout']);
});
