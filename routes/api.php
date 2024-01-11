<?php

use App\Http\Controllers\Api\CursosController;
use App\Http\Controllers\Api\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/curso' , CursosController::class);
// Route::post('/curso' , [CursosController::class, 'store']);
// Route::get('/todo', [TodoController::class, 'index']);
// Route::post('/todo', [TodoController::class, 'store']);

// Route::get('/todo/{nome}', [TodoController::class, 'index']);
// Route::get('/todo-detail/{id}', [TodoController::class, 'cursoDetalhes']);
