<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    /**
     * Retorna a listagem de todos os registros ou apenas um
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idEmpresa = 0)
    {
        if ($idEmpresa == null)
            $empresa = Empresa::all(['idEmpresa','nome','cnpj','endereco','idUsuario']);
        else
            $empresa = Empresa::Where('idEmpresa', $idEmpresa)->first();
        return response()->json($empresa, 200);
    }
    
    /**
     * Realiza o salvamento do novo registro no BD
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->get('idEmpresa') == null) 
            $empresa = new Empresa();
        else 
            $empresa = Empresa::Where('idEmpresa', $request->get('idEmpresa'))->first();

        /* devemos fazer as validações aqui */
        $arrayValidacao = new EmpresaController();
        $validator = Validator::make($request->all(), $arrayValidacao->validaDados($request->all()));

        if (!$validator->passes()) 
            return $validator->errors();

        $empresa->nome = $request->get('nome');
        $empresa->cnpj = $request->get('cnpj');
        $empresa->endereco = $request->get('endereco');
        $empresa->idEmpresa = $request->get('idEmpresa');
        $empresa->save();

        return response()->json($empresa, 201);
    }

    /**
     * Exibe um registro específico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Empresa::findOrFail($id);
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
    public function destroy($idEmpresa)
    {
        if ($idEmpresa != null) {
            $empresa = Empresa::Where('idEmpresa', $idEmpresa)->first();
            $empresa->delete();
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
            'cnpj' => ['required'],
            'endereco' => ['required'],
            'idUsuario' => ['required'],
        ];
        return $this->validacao;
    }
}
