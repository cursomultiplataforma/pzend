<?php
namespace Application\Model\Entity;

use Zend\Db\TableGateway\TableGateway;

class Temario extends MasterTable
{
    const TABLE_NAME = 'TEMARIO';

    public function __construct($dbAdapter)
    {
        parent::__construct(self::TABLE_NAME, $dbAdapter);
    }

    public function getAllData()
    {
        return $this->select()->toArray();
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