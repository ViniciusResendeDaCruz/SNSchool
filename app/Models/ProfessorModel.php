<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfessorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'professores';
    protected $primaryKey       = 'matricula';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'matricula','nome','login_id'
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
     * Valida o login caso usuários seja Professor
     *
     * @param string $email
     * @param string $senha
     * @return bool
     */
    public function verificaLogin($email,$senha, $login_id)
    {
        $user = $this->where('email',$email)->first();
        if ($user and password_verify($senha,$user['senha'])) {
            return true;
        }
        return false;
    }

    /**
     * Cadastra um novo professor no banco de dados
     *
     * @param string $nome
     * @param string $email
     * @param string $senha
     * @return bool
     */
    public function novoProfessor($nome,$login_id)
    {
        return $this->insert([
            'nome'=>$nome,
            'login_id'=>$login_id
            // 'email'=>$email,
            // 'senha'=>password_hash($senha,PASSWORD_DEFAULT)
        ]);
    }


    public function alteraProfessor($matricula,$nome)
    {
        return $this->update($matricula,['nome'=>$nome,'teste'=>'teste']);
    }

    /**
     * Retorna o professor dada sua matricula
     *
     * @param int $amtricula
     * @return array
     */
    public function getProfessorById($matricula)
    {
        return $this->where('matricula',$matricula)->first();
    }

    public function getProfessorByLoginId($login_id)
    {
        return $this->where('login_id',$login_id)->first();
    }

    public function getAllProfessores($sort_by = 'nome',$sort_order = 'ASC')
    {
        return $this->select('professores.nome,professores.matricula,usuarios.email,usuarios.data_matricula')->
        join('usuarios','professores.login_id = usuarios.id')->orderBy($sort_by,$sort_order)->get()->getResultArray();
    }
}
