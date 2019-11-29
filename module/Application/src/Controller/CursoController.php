<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Db\Adapter\Adapter;
use Zend\Http\Response;
use Application\Model\Entity\Curso;

class CursoController extends MasterController
{
    /** @var Adapter */
    private $dbAdapter;
    private $curso;
    /**
     * IndexController constructor.
     * @param $dbAdapter
     */
    public function __construct($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->curso = new Curso($this->dbAdapter);
    }

    public function getList()
    {
        $data = $this->curso->getAllData();
        $data =  $this->array_change_key_case_recursive($data, CASE_LOWER);

        /** @var Response $response */
        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        $response->setContent(json_encode($data));
        $response->setStatusCode(200);
        return $response;
    }

    public function create($data)
    {
        $data =  $this->array_change_key_case_recursive($data, CASE_UPPER);
        $res = $this->curso->addData($data);

        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        $response->setContent(json_encode($data));

        if ($res == true) {
            $response->setStatusCode(200);
        } else {
            $response->setStatusCode(500);
        }
        return $response;
    }

    public function options()
    {
        /** @var Response $response */
        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => "*",
            'Access-Control-Allow-Methods' => 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Origin, Content-Type, X-Auth-Token',
            'Content-Type' => 'application/json'
        ]);
        return $response;
    }

    /* hasta aquí */

    public function update($id, $data)
    {
        $res = $this->curso->updateData($id,$data);

        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        $response->setContent(json_encode([$res]));

        if ($res == true) {
            $response->setStatusCode(200);
        } else {
            $response->setStatusCode(500);
        }
        return $response;
    }

    public function delete($id)
    {
        $res = $this->curso->deleteData($id);

        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        $response->setContent(json_encode([$res]));

        if ($res == true) {
            $response->setStatusCode(200);
        } else {
            $response->setStatusCode(500);
        }
        return $response;
    }
}
