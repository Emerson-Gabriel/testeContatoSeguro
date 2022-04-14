<?php

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
Route::get('/usuario/{idUsuario?}','UsuarioController@index');
Route::post('/usuario/salvar','UsuarioController@store');
Route::get('/usuario/excluir/{idUsuario}','UsuarioController@destroy');

/*-----------------------------------*\
    $ROTAS Empresa
\*-----------------------------------*/
Route::get('/empresa/{idEmpresa?}','EmpresaController@index');
Route::post('/empresa/salvar','EmpresaController@store');
Route::get('/empresa/excluir/{idEmpresa}','EmpresaController@destroy');