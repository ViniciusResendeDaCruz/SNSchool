<?php

namespace App\Models;

use CodeIgniter\Model;

class DisciplinaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'disciplinas';
    protected $primaryKey       = 'codigo';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'codigo','nome','descricao','professor_id'
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
     * Retorna a disciplina de um determinado id
     *
     * @param int $id
     * @return array
     */
    public function getDisciplinaById($codigo)
    {
        return $this->where('codigo',$codigo)->first();
    }

    /**
     * Cadastra uma nova disciplina no banco de dados
     *
     * @param string $nome
     * @param string $descricao
     * @return bool
     */
    public function novaDisciplina($nome,$descricao)
    {
        return $this->insert(['nome'=>$nome,'descricao'=>$descricao],false);
    }

    /**
     * Atribui uma disciplina a um professor
     *
     * @param int $disciplina_id
     * @param int $professor_id
     * @return bool
     */
    public function atribuiProfessor($disciplina_id,$professor_id)
    {
        return $this->update($disciplina_id,['professor_id'=>$professor_id]);
    }

    /**
     * Desassocia o professor referente aquela disciplina
     *
     * @param int $disciplina_codigo
     * @return bool
     */
    public function desatribuiProfessor($disciplina_codigo)
    {
        return $this->update($disciplina_codigo,['professor_id'=>null]);
    }

    /**
     * Retorna todas as disciplinas dado um professor
     *
     * @param int $professor_id
     * @return array
     */
    public function getDisciplinasByProfessor($professor_id)
    {
        return $this->where('professor_id',$professor_id)->orderBy('nome','asc')->get()->getResultArray();
    }

    /**
     * Retorna todas as disciplinas cadastradas no banco de dados
     *
     * @return array
     */
    public function getAllDisciplinas($sort_by = 'nome',$sort_order = 'ASC')
    {
        return $this->select('professores.nome as profNome,professores.matricula as matricula,disciplinas.codigo,disciplinas.nome,disciplinas.descricao,disciplinas.professor_id')->
        join('professores','disciplinas.professor_id = professores.matricula','left')->orderBy($sort_by,$sort_order)->get()->getResultArray();
    }

    /**
     * Retorna todas as disciplinas cadastradas no banco de dados em formato de paginas
     *
     * @param int $page
     * @param string $nome
     * @return array
     */
    public function getAllDisciplinasPage($page,$nome)
    {
        return $this->select('professores.nome as profNome,disciplinas.codigo,disciplinas.nome,disciplinas.descricao,disciplinas.professor_id')->
        join('professores','disciplinas.professor_id = professores.matricula','left')->orderBy('disciplinas.nome','asc')->paginate($page,$nome);
    }

    /**
     * Remove uma disciplina do banco de dados
     *
     * @param int $codigo
     * @return bool
     */
    public function removeDisciplina($codigo)
    {
        return $this->delete($codigo);
    }

    public function disciplinasSemProfessor()
    {
        return $this->where('professor_id',null)->orderBy('nome','asc')->get()->getResultArray();
    }



    
    // public function disciplinasLivres($codigo_disciplinas_aluno)
    // {
    //     if (count($codigo_disciplinas_aluno) == 0) {
    //         array_push($codigo_disciplinas_aluno,'nulo');
    //     }
    //     // dd($codigo_disciplinas_aluno);
    //     return $this->select('professores.nome,disciplinas.codigo,disciplinas.nome,disciplinas.descricao,disciplinas.professor_id')->whereNotIn('codigo',$codigo_disciplinas_aluno)->orderBy('nome','asc')->get()->getResultArray();
    // }

    // SELECT disciplinas.nome from disciplinas
    // where disciplinas.codigo not in(
    //     SELECT disciplinas.codigo FROM `aluno_inscrito_disciplinas`
    //      JOIN disciplinas ON disciplina_id = disciplinas.codigo
    //     where aluno_id = 36
    // )

    public function disciplinasLivres($matriculaAluno)
    {
        $subQuery = $this->db->table('aluno_inscrito_disciplinas')->select('disciplinas.codigo')->join('disciplinas','disciplina_id = disciplinas.codigo')->where('aluno_id',$matriculaAluno);
    //    dd($subQuery);
        return $this->whereNotIn('codigo',$subQuery)->get()->getResultArray();
    }

    public function disciplinasLivresPage($codigo_disciplinas_aluno,$page_number,$page_name)
    {
        if (count($codigo_disciplinas_aluno) == 0) {
            array_push($codigo_disciplinas_aluno,'nulo');
        }
        // dd($codigo_disciplinas_aluno);
        return $this->
        select('professores.nome as profNome,disciplinas.codigo,disciplinas.nome,disciplinas.descricao,disciplinas.professor_id')->
        join('professores','disciplinas.professor_id = professores.matricula','left')->
        whereNotIn('codigo',$codigo_disciplinas_aluno)->orderBy('disciplinas.nome','asc')->
        paginate($page_number,$page_name);
    }

    // public function disciplinasAluno($codigo_disciplinas_aluno)
    // {
    //     if (count($codigo_disciplinas_aluno) == 0) {
    //         $codigo_disciplinas_aluno = array('');
    //     }
    //     return $this->select('professores.nome as profNome,disciplinas.codigo,disciplinas.nome,disciplinas.descricao,disciplinas.professor_id')->
    //     join('professores','disciplinas.professor_id = professores.matricula','left')->whereIn('codigo',$codigo_disciplinas_aluno)->orderBy('nome','asc')->get()->getResultArray();
    // }

    public function disciplinasAluno($matriculaAluno)
    {
        $subQuery = $this->db->table('aluno_inscrito_disciplinas')->select('disciplinas.codigo')->join('disciplinas','disciplina_id = disciplinas.codigo')->where('aluno_id',$matriculaAluno);
    //    dd($subQuery);
        return $this->whereIn('codigo',$subQuery)->get()->getResultArray();
    }




    public function disciplinasAlunoPage($codigo_disciplinas_aluno,$page_number,$page_name)
    {
        if (count($codigo_disciplinas_aluno) == 0) {
            $codigo_disciplinas_aluno = array('');
        }
        return $this->select('professores.nome as profNome,disciplinas.codigo,disciplinas.nome,disciplinas.descricao,disciplinas.professor_id')->
        join('professores','disciplinas.professor_id = professores.matricula','left')->whereIn('codigo',$codigo_disciplinas_aluno)->orderBy('nome','asc')->paginate($page_number,$page_name);
    }

    public function alteraDisciplina($codigo,$nome,$descricao)
    {
        return $this->update($codigo,['nome'=>$nome,'descricao'=>$descricao]);
    }

    public function countDisciplinasLivres($codigo_disciplinas_aluno)
    {
        return $this->select('count(*) as count')->whereNotIn('codigo',$codigo_disciplinas_aluno)->get()->getResultArray()[0]['count'];
    }
}
