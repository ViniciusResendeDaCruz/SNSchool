<?php

namespace App\Controllers\Ajax;

use App\Controllers\BaseController;
use App\Models\AlunoInscritoDisciplinaModel;
use App\Models\DisciplinaModel;
use App\Models\ProfessorModel;

class Relatorios extends BaseController
{
    private $professorModel;
    private $disciplinasModel;
    private $alunoInscritoDisciplina;

    public function __construct() {
        $this->professorModel = new ProfessorModel();
        $this->disciplinasModel = new DisciplinaModel();
        $this->alunoInscritoDisciplina = new AlunoInscritoDisciplinaModel();
    }
    public function index()
    {
        echo 'Byee';
    }

   

    public function disciplinasProfessor($id)
    {
        return view('relatorios/tabela/disciplinas',['disciplinas' => $this->disciplinasModel->getDisciplinasByProfessor($id)]);
    }
    public function alunosDisciplina($codigo)
    {
        // dd($this->alunoInscritoDisciplina->alunosByDisciplina($codigo));
        return view('relatorios/tabela/alunos',['alunos' => $this->alunoInscritoDisciplina->alunosByDisciplina($codigo)]);
    }
    public function alunosProfessor($matricula)
    {
        return view('relatorios/tabela/alunosProfessor',['alunos'=> $this->alunoInscritoDisciplina->alunosByProfessor($matricula)]);
    }

    public function testeAjaxAntigo($id)
    {
        if ($this->request->isAJAX()) {
            if($nome = $this->professorModel->getProfessorById($id)['nome']){
                $response = [
                    'code'=>'201',
                    'erro'=>false,
                    'mensagem'=> view('relatorios/tabela/disciplina',['disciplinas' => $this->disciplinasModel->getDisciplinasByProfessor($id)])
                ];
            }
            else $response = [
                'code'=>'401',
                'erro'=>true,
                'mensagem'=>'Nenhum usuario encontrado'
            ];
        }else $response = [
            'code'=>'501',
            'erro'=>true,
            'mensagem'=>'Apenas requisicoes ajax sao permitidas'
        ];
        
        return json_encode($response,JSON_PRETTY_PRINT);
    }
}
