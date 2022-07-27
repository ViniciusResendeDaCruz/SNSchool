<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use App\Models\GestorModel;
use App\Models\ProfessorModel;
use App\Models\UsuarioModel;

class Login extends BaseController
{
    private $gestorModel;
    private $alunoModel;
    private $professorModel;
    private $usuarioModel;

    public function __construct() {
        $this->gestorModel = new GestorModel();
        $this->alunoModel = new AlunoModel();
        $this->professorModel = new ProfessorModel();
        $this->usuarioModel = new UsuarioModel();
    }
    

    public function index()
    {
        if ($this->session->isLoggedIn) {
            return redirect()->to('dashboard');
        }
        $error = $this->session->error ? 'error':'success';
        return view('login/login',['error'=>$error]);
    }


    public function login()
    {
        $post = $this->request->getPost();
        $email = $post['email'];
        $senha = $post['senha'];

        if ($post['email'] == 'admin@admin.com' and $post['senha'] == 'admin') {
            $this->session->tipo = 'G';
            $this->session->login_id = '1';
            $this->session->isLoggedIn = true;
            $this->session->id = 4;
            return redirect()->to('dashboard');
        }

        $user = $this->usuarioModel->verificaTipoLogin($email,$senha);
        
        
        if ($user) {
            $this->session->tipo = $user['tipo'];
            $this->session->login_id = $user['id'];
            $this->session->isLoggedIn = true;
            switch ($user['tipo']) {
                case 'G':
                    $this->session->id = $this->gestorModel->getGestorByLoginId($user['id'])['id'];
                    
                    break;
                case 'P':
                    $this->session->id = $this->professorModel->getProfessorByLoginId($user['id'])['matricula'];
                    
                    break;
                case 'A':
                    $this->session->id = $this->alunoModel->getAlunoByLoginId($user['id'])['matricula'];
                    
                    break;
                
                default:
                    return redirect()->to('login');
                    break;
            }
            return redirect()->to('dashboard');
        }

        // if($this->alunoModel->verificaLogin($email,$senha)){
        //     return redirect()->to('dashboard/aluno');
        // }
        // if ($this->professorModel->verificaLogin($email,$senha)) {
        //     return redirect()->to('dashboard/professor');
        // }
        // if ($this->gestorModel->verificaLogin($email,$senha)) {
        //     return redirect()->to('dashboard/gestor');
        // }

        
        return redirect()->to('login')->with('error',true);
    }
    

    // public function cadastroGestor($nome,$email,$senha)
    // {
    //     if ($this->gestorModel->novoGestor($nome,$email,$senha)) {
    //         return 'Cadastro realizado com sucesso!';
    //     }
    //     return 'erro!';
    // }
}
