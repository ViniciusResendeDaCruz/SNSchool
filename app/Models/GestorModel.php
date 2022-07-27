<?php

namespace App\Models;

use CodeIgniter\Model;

class GestorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gestores';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id','nome','login_id'
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
     * Cadastra um novo gestor no banco de dados,
     * apenas altera seus dados caso já exista
     *
     * @param string $nome
     * @param string $email
     * @param string $senha
     * @return bool
     */
    public function novoGestor($nome, $login_id)
    {
        return $this->save([
            'nome'=>$nome,
            'login_id'=>$login_id
            // 'email'=>$email,
            // 'senha'=>password_hash($senha,PASSWORD_DEFAULT)
        ]);
    }
    public function alteraGestor($id,$nome)
    {
        return $this->update($id,['nome'=>$nome]);
    }

     /**
     * Valida o login caso usuários seja Gestor
     *
     * @param string $email
     * @param string $senha
     * @return bool
     */
    public function verificaLogin($email,$senha)
    {
        $user = $this->where('email',$email)->first();
        if ($user and password_verify($senha,$user['senha'])) {
            return true;
        }
        return false;
    }

    /**
     * Retorna o gestor com o dado Id
     *
     * @param int $id
     * @return array
     */
    public function getGestorById($id)
    {
        return $this->where('id',$id)->first();
    }

    public function getGestorByLoginId($login_id)
    {
        return $this->where('login_id',$login_id)->first();
    }
    
}
