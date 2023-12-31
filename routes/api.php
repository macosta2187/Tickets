<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/tarea', [TareasController::class, 'Insertar']);
Route::get('/tarea', [TareasController::class, 'ListarTodo']);
Route::get('tarea/{id}', [TareasController::class, 'ListarId']);
Route::get('tarea/titulo/{titulo}', [TareasController::class, 'ListarPorTitulo']);
Route::get('tarea/autor/{autor}', [TareasController::class, 'ListarPorAutor']);
Route::get('tarea/estado/{estado}', [TareasController::class, 'ListarPorEstado']);
Route::delete('/tarea/{id}', [TareasController::class, 'Eliminar']);
Route::post('/tarea/{id}', [TareasController::class, 'Actualizar']);