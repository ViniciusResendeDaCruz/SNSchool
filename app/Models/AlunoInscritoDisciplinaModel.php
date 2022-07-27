<?php

namespace App\Models;

use CodeIgniter\Model;

class AlunoInscritoDisciplinaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'aluno_inscrito_disciplinas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id','disciplina_id','aluno_id'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    /**
     * Retorna todas as disciplinas do aluno
     *
     * @param int $matricula_aluno
     * @return array
     */
    public function getCodigoDisciplinasByAluno($matricula_aluno)
    {
        return $this->select('disciplina_id')->where('aluno_id',$matricula_aluno)->get()->getResultArray();
    }


//          SELECT disciplinas.codigo FROM `aluno_inscrito_disciplinas`
//  	    JOIN disciplinas ON disciplina_id = disciplinas.codigo
// 	        where aluno_id = 36
    

    public function atribuiAluno($aluno_matricula,$disciplina_codigo)
    {
        return $this->insert([
            'disciplina_id'=>$disciplina_codigo,
            'aluno_id'=>$aluno_matricula
        ]);
    }

    public function desatribuiAluno($disciplina_codigo,$aluno_matricula)
    {
        return $this->where(['aluno_id'=>$aluno_matricula,'disciplina_id'=>$disciplina_codigo])->delete();
    }

/**
 * Retorna todos os alunos cadastrados em uma disciplina
 *
 * @param string $codigo
 * @return array
 */
    public function alunosByDisciplina($codigo)
    {
        return $this->select('alunos.*,usuarios.email')->
        join('alunos','aluno_id = alunos.matricula')->
        join('usuarios','usuarios.id=alunos.login_id')->
        where('disciplina_id',$codigo)->get()->getResultArray();
    }

    public function alunosByProfessor($matricula)
    {
        return $this->select('alunos.*, disciplinas.nome as discNome,usuarios.email')->
        join('alunos','aluno_id = alunos.matricula')->
        join('disciplinas','disciplina_id=disciplinas.codigo')->
        join('professores','disciplinas.professor_id=professores.matricula')->
        join('usuarios','alunos.login_id=usuarios.id')->
        where('professores.matricula',$matricula)->
        get()->
        getResultArray();
    }

    
}
