<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use App\Models\GestorModel;
use App\Models\ProfessorModel;
// use App\Models\UsuarioModel;

class Dashboard extends BaseController
{
    private $alunoModel;
    private $professorModel;
    private $gestorModel;
    private $usuarioModel;

    public function __construct() {
        $this->alunoModel = new AlunoModel();
        $this->professorModel = new ProfessorModel();
        $this->gestorModel = new GestorModel();
        // $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        switch ($this->session->tipo) {
            case 'A':
                return view('dashboard/aluno', ['nome'=> $this->alunoModel->getAlunoById($this->session->id)['nome']]);
                break;

            case 'P':
                return view('dashboard/professor', ['nome'=> $this->professorModel->getProfessorById($this->session->id)['nome']]);
                break;

            case 'G':
                return view('dashboard/gestor', ['nome'=> $this->gestorModel->getGestorById($this->session->id)['nome']]);
                break;
            default:
                return redirect()->to('dashboard/deslog');
                break;
        }
    }




    // public function aluno()
    // {
    //     return view('dashboard/aluno', ['nome'=> $this->alunoModel->getAlunoById($this->session)]);
    // }

    // public function professor()
    // {
    //     return view('dashboard/professor');
    // }

    // public function gestor()
    // {
    //     return view('dashboard/gestor');
    // }

    public function deslog()
    {
        $this->session->destroy();
        return redirect()->to('login');
    }
    
}
