<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MatriculaController;
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


Route::apiResource('aluno',AlunoController::class);
Route::apiResource('docente', DocenteController::class);
Route::apiResource('disciplina', DisciplinaController::class);
Route::controller(MatriculaController::class)->group(function () {
    Route::get('/matricula/{id}', 'show');
    Route::get('/matriculas', 'index');
});