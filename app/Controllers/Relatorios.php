<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use App\Models\DisciplinaModel;
use App\Models\GestorModel;
use App\Models\ProfessorModel;

class Relatorios extends BaseController
{
    private $alunoModel;
    private $professorModel;
    private $gestorModel;
    private $disciplinaModel;
    // private $usuarioModel;

    public function __construct()
    {
        $this->alunoModel = new AlunoModel();
        $this->professorModel = new ProfessorModel();
        $this->gestorModel = new GestorModel();
        $this->disciplinaModel = new DisciplinaModel();
        // $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        switch ($this->session->tipo) {
            case 'A':
                return view('relatorios/aluno', ['nome' => $this->alunoModel->getAlunoById($this->session->id)['nome'],
                'professores' => $this->professorModel->getAllProfessores(),
                'disciplinas' => $this->disciplinaModel->disciplinasAluno($this->session->id)]);
                break;

            case 'P':
                return view('relatorios/professor', ['nome' => $this->professorModel->getProfessorById($this->session->id)['nome'],
                'professores' => $this->professorModel->getAllProfessores(),
                'disciplinas' => $this->disciplinaModel->getDisciplinasByProfessor($this->session->id),
                'myId'=>$this->session->id]);
                break;

            case 'G':
                return view('relatorios/gestor', [
                    'nome' => $this->gestorModel->getGestorById($this->session->id)['nome'],
                    'professores' => $this->professorModel->getAllProfessores(),
                    'disciplinas' => $this->disciplinaModel->getAllDisciplinas()
                ]);
                break;
            default:
                return redirect()->to('dashboard/deslog');
                break;
        }
    }

    public function testeAjax($id)
    {
        return 'Teste ralizado com sucesso para o professor '.$this->professorModel->getProfessorById($id)['nome'];
    }
}
