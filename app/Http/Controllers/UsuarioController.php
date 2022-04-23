<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Retorna a listagem de todos os registros ou apenas um
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idUsuario = 0)
    {
        if ($idUsuario == null)
            $usuario = Usuario::all(['idUsuario','nome','email','telefone','dataNasc','cidade','idEmpresa']);
        else
            $usuario = Usuario::Where('idUsuario', $idUsuario)->first();
        return response()->json($usuario, 200);
    }
    
    /**
     * Realiza o salvamento do novo registro no BD
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('idUsuario') == null) 
            $usuario = new Usuario();
        else 
            $usuario = Usuario::Where('idUsuario', $request->get('idUsuario'))->first();

        /* devemos fazer as validações aqui */
        $arrayValidacao = new UsuarioController();
        $validator = Validator::make($request->all(), $arrayValidacao->validaDados($request->all()));

        if (!$validator->passes()) 
            return $validator->errors();

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
     * Exibe um registro específico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    /**
     * Atualiza um registro específico
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            return response()->json('Registro excluído com sucesso', 200);
        }
    }

    /**
     * Valida os dados do form
     */
    public function validaDados()
    {
        //validações
        $this->validacao = [
            'nome' => ['required'],
            'email' => ['required'],
            'idEmpresa' => ['required'],
        ];
        return $this->validacao;
    }
}