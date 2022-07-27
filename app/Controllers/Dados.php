<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoModel;
use App\Models\DisciplinaModel;
use App\Models\GestorModel;
use App\Models\ProfessorModel;
use App\Models\UsuarioModel;

class Dados extends BaseController
{
    private $gestorModel;
    private $alunoModel;
    private $professorModel;
    private $disciplinaModel;

    public function __construct()
    {
        $this->gestorModel = new GestorModel();
        $this->alunoModel = new AlunoModel();
        $this->professorModel = new ProfessorModel();
        $this->disciplinaModel = new DisciplinaModel();
    }

    public function index()
    {
        if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');

        return view('dados\datatable', [
            'nome' => $this->gestorModel->getGestorById($this->session->id)['nome'],
            'alunos' => $this->alunoModel->getAllAlunos(),
            'professores' => $this->professorModel->getAllProfessores(),
            'disciplinas' => $this->disciplinaModel->getAllDisciplinas()

        ]);
    }

    public function tabelaAlunos($sort_by = 'nome', $sort_order = 'ASC')
    {
        if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');
        return view('dados\alunos', [
            'nome' => $this->gestorModel->getGestorById($this->session->id)['nome'],
            'alunos' => $this->alunoModel->getAllAlunos($sort_by, $sort_order),
            'sort_by' => $sort_by,
            'sort_order' => $sort_order
        ]);
    }

    public function tabelaProfessores($sort_by = 'nome', $sort_order = 'ASC')
    {
        if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');

        return view('dados\professores', [
            'nome' => $this->gestorModel->getGestorById($this->session->id)['nome'],
            'professores' => $this->professorModel->getAllProfessores($sort_by, $sort_order),
            'sort_by' => $sort_by,
            'sort_order' => $sort_order
        ]);
    }

    public function tabelaDisciplinas($sort_by = 'nome', $sort_order = 'ASC')
    {
        if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');

        return view('dados\disciplinas', [
            'nome' => $this->gestorModel->getGestorById($this->session->id)['nome'],
            'disciplinas' => $this->disciplinaModel->getAllDisciplinas($sort_by, $sort_order),
            'sort_by' => $sort_by,
            'sort_order' => $sort_order
        ]);
    }
}
