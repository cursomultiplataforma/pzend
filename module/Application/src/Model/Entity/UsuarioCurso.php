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
        return $this->select()->toArray();
    }

    public function getDataId($id)
    {
        $sql = "select * from " . self::TABLE_NAME . " where id = :id ";

        $params = [
            ':id' => $id
        ];

        $data = $this->executeQueryArray($sql, $params);
        return $data;
    }

    public function addData ($data) {
        return $this->insert($data);
    }

    public function updateData ($id, $data) {
        $where = ["ID" => $id];
        return $this->update($data, $where);
    }

    public function deleteData($id)
    {
        $where = ["ID" => $id];
        return parent::delete($where);
    }
}