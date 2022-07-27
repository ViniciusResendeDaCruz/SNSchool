<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use App\Models\GestorModel;
use App\Models\ProfessorModel;
use App\Models\UsuarioModel;

class Cadastro extends BaseController
{
    private $alunoModel;
    private $professorModel;
    private $gestorModel;
    private $usuarioModel;

    public function __construct() {
        $this->alunoModel = new AlunoModel();
        $this->professorModel = new ProfessorModel();
        $this->gestorModel = new GestorModel();
        $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        if ($this->session->tipo == 'G') {
            return view('novo_usuario/gestor', ['nome'=> $this->gestorModel->getGestorById($this->session->id)['nome']]);
        }
        return redirect()->to('dashboard');
    }
    public function novoCadastro()
    {
        // dd($this->request->getPost());
        $post = $this->request->getPost();
        // dd($post['email']);
        $senha = geradorDeSenha(20);
        

        switch ($post['tipo']){
            case 'Aluno':
                if ($this->alunoModel->novoAluno($post['nome'],$post['nascimento'], $this->usuarioModel->novoUsuario($post['email'],$senha,'A'))) $mensagem = 'Sucesso';
                break;

            case 'Professor':
                 if ($this->professorModel->novoProfessor($post['nome'], $this->usuarioModel->novoUsuario($post['email'],$senha,'P'))) $mensagem = 'Sucesso';
                break;

            case 'Gestor':
                if ($this->gestorModel->novoGestor($post['nome'],$this->usuarioModel->novoUsuario($post['email'],$senha,'G'))) $mensagem = 'Sucesso';
                break;

            default:
                $mensagem = "Não foi possível cadastrar o usuário!";
                break;
        }

        if(!enviarSenhaEmail($post['email'],$senha)) $mensagem = 'Erro no envio da senha!';
        return view('novo_usuario/gestor',['mensagem'=>$mensagem,'nome'=> $this->gestorModel->getGestorById($this->session->id)['nome']]);
    }
}
