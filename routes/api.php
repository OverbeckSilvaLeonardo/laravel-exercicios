<?php

use App\Http\Controllers\EventoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return ['message' => 'Minha API Laravel'];
});

//Route::get('/evento', [EventoController::class, 'listar']);
//Route::post('/evento', [EventoController::class, 'criar']);
//Route::delete('/evento/{id}', [EventoController::class, 'excluir']);

Route::prefix('evento')->group(function () {
    Route::get('', [EventoController::class, 'listar']);
    Route::get('{id}', [EventoController::class, 'buscar']);
    Route::post('', [EventoController::class, 'criar']);
    Route::delete('{id}', [EventoController::class, 'excluir']);
});
