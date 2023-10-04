<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/tarea', [TareasController::class, 'Insertar']);
Route::get('/tarea', [TareasController::class, 'ListarTodo']);
Route::get('tareas/{id}', [TareasController::class, 'ListarId']);
Route::delete('/tarea/{id}', [TareasController::class, 'Eliminar']);
Route::post('/tarea/{id}', [TareasController::class, 'Actualizar']);