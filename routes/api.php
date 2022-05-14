<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

/*-----------------------------------*\
    $ROTAS Usuário
\*-----------------------------------*/
Route::get('usuario', [UsuarioController::class, 'index']);
Route::get('usuario/{id}', [UsuarioController::class, 'show']);
Route::post('usuario', [UsuarioController::class, 'store']);
Route::put('usuario/{id}', [UsuarioController::class, 'update']);
Route::delete('usuario/{id}', [UsuarioController::class,'destroy']);

/*-----------------------------------*\
    $ROTAS Empresa
\*-----------------------------------*/
Route::get('empresa', [EmpresaController::class, 'index']);
Route::get('empresa/{id}', [EmpresaController::class, 'show']);
Route::post('empresa', [EmpresaController::class, 'store']);
Route::put('empresa/{id}', [EmpresaController::class, 'update']);
Route::delete('empresa/{id}', [EmpresaController::class,'destroy']);