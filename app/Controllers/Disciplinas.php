<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlunoInscritoDisciplinaModel;
use App\Models\AlunoModel;
use App\Models\DisciplinaModel;
use App\Models\GestorModel;
use App\Models\ProfessorModel;
use CodeIgniter\Cache\Handlers\RedisHandler;
use CodeIgniter\HTTP\RedirectResponse;

class Disciplinas extends BaseController
{
    private $alunoModel;
    private $professorModel;
    private $gestorModel;
    private $usuarioModel;
    private $disciplinaModel;
    private $aluno_inscrito_disciplina;

    public function __construct()
    {
        $this->alunoModel = new AlunoModel();
        $this->professorModel = new ProfessorModel();
        $this->gestorModel = new GestorModel();
        // $this->usuarioModel = new UsuarioModel();
        $this->disciplinaModel = new DisciplinaModel();
        $this->aluno_inscrito_disciplina = new AlunoInscritoDisciplinaModel();
    }

    public function index()
    {
        switch ($this->session->tipo) {
            case 'A':
                // $disciplinasLivres = $this->disciplinaModel->disciplinasNãoMatriculadas($aluno_matricula);
                $codigos = array('');
                foreach ($this->aluno_inscrito_disciplina->getCodigoDisciplinasByAluno($this->session->id) as $disciplina) array_push($codigos, $disciplina['disciplina_id']);
                
                $countAll = count($codigos);
                $disciplinasLivres = $this->disciplinaModel->disciplinasLivresPage($codigos, 6, 'alunosLivre');
                $countLivre = $this->disciplinaModel->countDisciplinasLivres($codigos);

                return view('disciplinas/aluno', [
                    'nome' => $this->alunoModel->getAlunoById($this->session->id)['nome'],
                    'countAll'=>$countAll,
                    'countLivres'=>$countLivre
                ]);
                break;

            case 'P':
                $disciplinasLivres = $this->disciplinaModel->disciplinasSemProfessor();
                $disciplinasProfessor = $this->disciplinaModel->getDisciplinasByProfessor($this->session->id);
                return view('disciplinas/professor', [
                    'nome' => $this->professorModel->getProfessorById($this->session->id)['nome'],
                    'disciplinasLivres' => $disciplinasLivres,
                    'disciplinasProfessor' => $disciplinasProfessor,
                    'professor' => null

                ]);
                break;

            case 'G':
                $disciplinas = $this->disciplinaModel->getAllDisciplinasPage(6, 'gestorAll');
                return view('disciplinas/gestor', ['nome' => $this->gestorModel->getGestorById($this->session->id)['nome'], 'disciplinas' => $disciplinas, 'pager' => $this->disciplinaModel->pager, 'professor' => null]);
                break;
            default:
                return redirect()->to('dashboard/deslog');
                break;
        }
    }

    public function atribuiProfessor($disciplina_codigo)
    {
        if ($this->session->tipo != 'P') return redirect()->to('dashboard/deslog');

        $this->disciplinaModel->atribuiProfessor($disciplina_codigo, $this->session->id);
        return redirect()->to('disciplinas');
    }

    public function desatribuiProfessor($disciplina_codigo)
    {
        if ($this->session->tipo != 'P') return redirect()->to('dashboard/deslog');
        if ($this->session->id != $this->disciplinaModel->getDisciplinaById($disciplina_codigo)['professor_id']) return redirect()->to('dashboard');

        $this->disciplinaModel->desatribuiProfessor($disciplina_codigo);
        return redirect()->to('disciplinas#tab-2');
    }





    public function novaDisciplina()
    {
        if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');

        $post = $this->request->getPost();

        $this->disciplinaModel->novaDisciplina($post['nome'], $post['descricao']);

        return redirect()->to('disciplinas');
    }
    
    public function removeDisciplina($codigo)
    {
        if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');

        $this->disciplinaModel->removeDisciplina($codigo);
        return redirect()->to('disciplinas');
    }

    public function atribuiAluno($disciplina_codigo)
    {
        if ($this->session->tipo != 'A') return redirect()->to('dashboard/deslog');

        $this->aluno_inscrito_disciplina->atribuiAluno($this->session->id, $disciplina_codigo);

        return redirect()->to('disciplinas?tab=1');
    }

    public function desatribuiAluno($disciplina_codigo)
    {
        if ($this->session->tipo != 'A') return redirect()->to('dashboard/deslog');

        $this->aluno_inscrito_disciplina->desatribuiAluno($disciplina_codigo, $this->session->id);
        return redirect()->to('disciplinas?tab=2');
    }

    public function alteraDisciplina()
    {
        if ($this->session->tipo != 'G') return redirect()->to('dashboard/deslog');
        $post = $this->request->getPost();
        $this->disciplinaModel->alteraDisciplina($post['disciplina_codigo'],$post['nome'],$post['descricao']);
        return redirect()->to('disciplinas');
    }
}
