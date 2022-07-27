<?php

namespace App\Models;

use CodeIgniter\Model;

class AlunoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'alunos';
    protected $primaryKey       = 'matricula';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'matricula','nome','data_nascimento','login_id'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'date';
    protected $createdField  = 'data_matricula';
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

    // /**
    //  * Valida o login caso usuários eja Aluno
    //  *
    //  * @param string $email
    //  * @param string $senha
    //  * @return bool
    //  */
    // public function verificaLogin($email,$senha)
    // {
    //     $user = $this->where('email',$email)->first();
    //     if ($user and password_verify($senha,$user['senha'])) {
    //         return true;
    //     }
    //     return false;
    // }

    /**
     * Cadastra um novo aluno no banco de dados
     *
     * @param string $nome
     * @param string $email
     * @param string $senha
     * @return bool
     */
    public function novoAluno($nome,$nascimento, $login_id)
    {
        // dd($email);
        return $this->insert([
            'nome'=>$nome,
            //'email'=>$email,
            'data_nascimento'=>$nascimento,
            'login_id'=>$login_id
            //'senha'=>password_hash($senha,PASSWORD_DEFAULT)
        ]);
    }

    
    public function alteraAluno($matricula,$nome,$nascimento)
    {
        return $this->update($matricula,['nome'=>$nome,'data_nascimento'=>$nascimento]);
    }

    /**
     * Retorna o aluno com a dada matricula
     *
     * @param int $id
     * @return array
     */
    public function getAlunoById($matricula)
    {
        return $this->where('matricula',$matricula)->first();
    }

    public function getAlunoByLoginId($login_id)
    {
        return $this->where('login_id',$login_id)->first();
    }

    public function getAllAlunos($sort_by = 'nome',$sort_order = 'ASC')
    {
        return $this->select('alunos.nome,alunos.data_nascimento,alunos.matricula,usuarios.email,usuarios.data_matricula')->
        join('usuarios','alunos.login_id = usuarios.id')->orderBy($sort_by,$sort_order)->get()->getResultArray();
    }
}
