<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Retorna a listagem de todos os registros ou apenas um
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idUsuario = 0)
    {
        if ($idUsuario == null) {
            $usuario = Usuario::all(['idUsuario','nome','email','telefone','dataNasc','cidade','idEmpresa']);
        } else {
            $usuario = Usuario::Where('idUsuario', $idUsuario)->first();
        }
        return response()->json($usuario, 200);
    }
    
    /**
     * Realiza o salvamento do novo registro no BD
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('idUsuario') == null) { 
            $usuario = new Usuario();
        } else {
            $usuario = Usuario::Where('idUsuario', $request->get('idUsuario'))->first();
        }

        $usuario->nome = $request->get('nome');
        $usuario->email = $request->get('email');
        $usuario->telefone = $request->get('telefone');
        $usuario->dataNasc = $request->get('dataNasc');
        $usuario->cidade = $request->get('cidade');
        $usuario->idEmpresa = $request->get('idEmpresa');
        $usuario->save();

        return response()->json($usuario, 201);
    }

    /**
     * Realiza a exclusão do registro informado via get
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUsuario)
    {
        if ($idUsuario != null) {
            $usuario = Usuario::Where('idUsuario', $idUsuario)->first();
            $usuario->delete();
            return response()->json('', 200);
        }
    }

    /**
     * -
     */
    public function create()
    {

    }
}