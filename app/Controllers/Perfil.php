<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use App\Models\GestorModel;
use App\Models\ProfessorModel;
use App\Models\UsuarioModel;
use Exception;

class Perfil extends BaseController
{
    private $alunoModel;
    private $professorModel;
    private $gestorModel;
    private $usuarioModel;

    public function __construct()
    {
        $this->alunoModel = new AlunoModel();
        $this->professorModel = new ProfessorModel();
        $this->gestorModel = new GestorModel();
        $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        $user_login = $this->usuarioModel->getUsuariobyId($this->session->login_id);
        $mensagem = $this->session->mensagem ? $this->session->mensagem : null;

        switch ($this->session->tipo) {
            case 'A':
                $user = $this->alunoModel->getAlunoById($this->session->id);
                return view('perfil/aluno', ['nome' => $user['nome'], 'user' => $user, 'user_login' => $user_login, 'mensagem' => $mensagem]);
                break;

            case 'P':
                $user = $this->professorModel->getProfessorById($this->session->id);
                return view('perfil/professor', ['nome' => $user['nome'], 'user' => $user, 'user_login' => $user_login, 'mensagem' => $mensagem]);
                break;

            case 'G':
                $user = $this->gestorModel->getGestorById($this->session->id);
                return view('perfil/gestor', ['nome' => $user['nome'], 'user' => $user, 'user_login' => $user_login, 'mensagem' => $mensagem]);
                break;
            default:
                return redirect()->to('dashboard/deslog');
                break;
        }
    }

    public function alteraDados()
    {
        $post = $this->request->getPost();

        if ($post['senha'] != $post['repete_senha']) {
            $mensagem = 'As senhas não se correspondem';
            return redirect()->to('perfil')->with('mensagem', $mensagem);
        }


        switch ($this->session->tipo) {
            case 'A':
                try {
                    $this->alunoModel->alteraAluno($this->session->id, $post['nome'], $post['nascimento']);
                    $this->usuarioModel->alteraUsuario($this->session->login_id, $post['email'], $post['senha']);
                    $mensagem = 'sucesso';
                } catch (Exception $e) {
                    $mensagem = $e->getMessage();
                }

                break;

            case 'P':
                try {
                    $this->professorModel->alteraProfessor($this->session->id, $post['nome']);
                    $this->usuarioModel->alteraUsuario($this->session->login_id, $post['email'], $post['senha']);
                    $mensagem = 'sucesso';
                } catch (Exception $e) {
                    $mensagem = $e->getMessage();
                }
                break;
            case 'G':
                try {
                    $this->gestorModel->alteraGestor($this->session->id, $post['nome']);
                    $this->usuarioModel->alteraUsuario($this->session->login_id, $post['email'], $post['senha']);
                    $mensagem = 'sucesso';
                } catch (Exception $e) {
                    $mensagem = $e->getMessage();
                }
                break;
        }

        return redirect()->to('perfil')->with('mensagem', $mensagem);
    }
}
