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
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*-----------------------------------*\
    $ROTAS Usuário
\*-----------------------------------*/
Route::get('/usuario/{idUsuario?}', [UsuarioController::class, 'index']);
Route::post('/usuario/salvar',[UsuarioController::class, 'store']);
Route::get('/usuario/excluir/{idUsuario}',[UsuarioController::class, 'destroy']);

/*-----------------------------------*\
    $ROTAS Empresa
\*-----------------------------------*/
Route::get('/empresa/{idEmpresa?}', [EmpresaController::class, 'index']);
Route::post('/empresa/salvar', [EmpresaController::class, 'store']);
Route::get('/empresa/excluir/{idEmpresa}', [EmpresaController::class, 'destroy']);