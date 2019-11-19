<?php
namespace Application\Model\Entity;

use Zend\Db\TableGateway\TableGateway;

class UsuarioCurso extends MasterTable
{
    const TABLE_NAME = 'USUARIO_CURSO';

    public function __construct($dbAdapter)
    {
        parent::__construct(self::TABLE_NAME, $dbAdapter);
    }

    public function getAllData()
    {
        $sql = "select * 
                from usuario_curso uc, curso c, usuario u
                where uc.login_usuario = u.login
                and uc.id_curso = c.id
                ";
        return $this->executeQueryArray($sql);
    }

    public function getAllUser($user) {
        $sql = "select * 
                from usuario_curso uc, curso c, usuario u
                where uc.login_usuario = u.login
                and uc.id_curso = c.id
                and uc.login_usuario = :login
                ";
        $params[":login"] = $user;

        return $this->executeQueryArray($sql,$params);
    }

    public function getAllCurso($id_curso) {
        $sql = "select * 
                from usuario_curso uc, curso c, usuario u
                where uc.login_usuario = u.login
                and uc.id_curso = c.id
                and uc.id_curso = :id_curso
                ";
        $params[":id_curso"] = $id_curso;

        return $this->executeQueryArray($sql,$params);
    }

    public function addData ($data) {
        return $this->insert($data);
    }

    public function updateData ($id, $data) {
        if (is_numeric($id)) {
            $where = ["ID_CURSO" => $id];
        } else {
            $where = ["LOGIN_USUARIO" => $id];
        }

        return $this->update($data, $where);
    }

    public function deleteData($id)
    {
        if (is_numeric($id)) {
            $where = ["ID_CURSO" => $id];
        } else {
            $where = ["LOGIN_USUARIO" => $id];
        }
        return parent::delete($where);
    }
}