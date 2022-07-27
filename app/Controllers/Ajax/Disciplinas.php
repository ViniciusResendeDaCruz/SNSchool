<?php

namespace App\Controllers\Ajax;

use App\Controllers\BaseController;
use App\Models\AlunoInscritoDisciplinaModel;
use App\Models\DisciplinaModel;

class Disciplinas extends BaseController
{
    private $disciplinaModel;
    private $aluno_inscrito_disciplina;

    public function __construct() {
        $this->disciplinaModel = new DisciplinaModel();   
        $this->aluno_inscrito_disciplina = new AlunoInscritoDisciplinaModel();       
    }
    public function index()
    {
        //
    }

    public function disciplinasGestor()
    {
        // if ($this->session->id != 'G') return redirect()->to('dashboard/deslog');
        return view('disciplinas/tabela/gestor',['disciplinas'=>$this->disciplinaModel->getAllDisciplinas()]);
            
        
    }

    public function disciplinasProfessor($tipo)
    {
        if($tipo == 'livres'){
            return view('disciplinas/tabela/professor/livresTable',['disciplinas'=>$this->disciplinaModel->disciplinasSemProfessor()]);
        }

        return view('disciplinas/tabela/professor/profTable',['disciplinas'=>$this->disciplinaModel->getDisciplinasByProfessor($this->session->id)]);
    }

    public function disciplinasAluno($tipo)
    {
        if($tipo == 'livres'){
            return view('disciplinas/tabela/aluno/livresTable',['disciplinas'=>$this->disciplinaModel->disciplinasLivres($this->session->id)]);
        }

        return view('disciplinas/tabela/aluno/alunoTable',['disciplinas'=>$this->disciplinaModel->disciplinasAluno($this->session->id)]);
    }


    public function modalDisciplina($codigo)
    {
        $disciplina = $this->disciplinaModel->getDisciplinaById($codigo);
        return view('disciplinas/modal/gestor',['codigo'=>$codigo,'nome'=>$disciplina['nome'],'descricao'=>$disciplina['descricao']]);
    }

    public function alteraDisciplina($codigo,$nome,$descricao)
    {
        // if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');
        $post = $this->request->getPost();
        return $this->disciplinaModel->alteraDisciplina($codigo,$nome,$descricao);
    }

    public function novaDisciplina($nome,$descricao)
    {
        // if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');

        // $post = $this->request->getPost();

        return $this->disciplinaModel->novaDisciplina($nome, $descricao);

        // return redirect()->to('disciplinas');
    }

    public function atribuiProfessor($disciplina_codigo)
    {
        // if ($this->session->tipo != 'P') return redirect()->to('dashboard/deslog');

        return $this->disciplinaModel->atribuiProfessor($disciplina_codigo, $this->session->id);
        // return redirect()->to('disciplinas');
    }

    public function desatribuiProfessor($disciplina_codigo)
    {
        if ($this->session->tipo != 'P') return redirect()->to('dashboard/deslog');
        if ($this->session->id != $this->disciplinaModel->getDisciplinaById($disciplina_codigo)['professor_id']) return false;

        return $this->disciplinaModel->desatribuiProfessor($disciplina_codigo);
        // return redirect()->to('disciplinas#tab-2');
    }


    public function atribuiAluno($disciplina_codigo)
    {
        if ($this->session->tipo != 'A') return redirect()->to('dashboard/deslog');

        return $this->aluno_inscrito_disciplina->atribuiAluno($this->session->id, $disciplina_codigo);

        // return redirect()->to('disciplinas?tab=1');
    }

    public function desatribuiAluno($disciplina_codigo)
    {
        if ($this->session->tipo != 'A') return redirect()->to('dashboard/deslog');

        return $this->aluno_inscrito_disciplina->desatribuiAluno($disciplina_codigo, $this->session->id);
        // return redirect()->to('disciplinas?tab=2');
    }

    public function removeDisciplina($codigo)
    {
        if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');

        return $this->disciplinaModel->removeDisciplina($codigo);
        // return redirect()->to('disciplinas');
    }
}
