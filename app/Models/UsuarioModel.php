<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email','senha','id','tipo'
    ];

    // Dates
    protected $useTimestamps = true;
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

    /**
     * Verifica o login e retorna o usuario
     *
     * @param string $email
     * @param string $senha
     * @return string|bool
     */
    public function verificaTipoLogin($email,$senha)
    {
        $user = $this->where('email',$email)->first();
        if ($user and password_verify($senha,$user['senha'])) {
            return $user;
        }
        return false;
    }

    /**
     * cadastra um novo usuário no banco de dados,
     * apenas altera seus dados caso o mesmo ja exista
     *
     * @param string $email
     * @param string $senha
     * @param string $tipo
     * @return bool
     */
    public function novoUsuario($email,$senha,$tipo)
    {
        return $this->insert([
            'email'=>$email, 
            'senha'=> password_hash($senha,PASSWORD_DEFAULT),
            'tipo'=> $tipo
        ],true);
    }

    public function alteraUsuario($id,$email,$senha)
    {
        if($senha != ''){
            
            return $this->where('id',$id)->update($id,[
                'email'=>$email, 
                'senha'=> password_hash($senha,PASSWORD_DEFAULT),
            ]);
        }
       

        return $this->where('id',$id)->update($id,[
            'email'=>$email, 
        ]);
    }
    

    public function verificaGestor($id)
    {
        return $this->where('id',$id)->first() == 'G' ? true : false;
    }

    /**
     * Retorna um usuário com o id passado por parâmetro
     *
     * @param int $id
     * @return array
     */
    public function getUsuariobyId($id)
    {
        return $this->where('id',$id)->first();
    }

    

}
