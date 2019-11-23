<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Db\Adapter\Adapter;
use Zend\Http\Response;
use Application\Model\Entity\Usuario;

class UsuarioController extends AbstractRestfulController
{
    /** @var Adapter */
    private $dbAdapter;
    private $usuario;
    /**
     * IndexController constructor.
     * @param $dbAdapter
     */
    public function __construct($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->usuario = new Usuario($this->dbAdapter);
    }

    public function create($data)
    {
      /*  $data["ID"] = 11;
        $data["TEMA"] = "JQuery";
        $data["DESCRIPCION"] = "JQuery descripción";
        $data["ID_CURSO"] = 1;
      */
        $res = $this->usuario->addData($data);

        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        $response->setContent(json_encode([$data]));

        if ($res == true) {
            $response->setStatusCode(200);
        } else {
            $response->setStatusCode(500);
        }
        return $response;
    }

    public function getList()
    {
        $data = $this->usuario->getAllData();

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

    public function get($id)
    {
        $data = $this->usuario->getDataId($id);

        /** @var Response $response */
        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        $response->setContent(json_encode([$data]));
        $response->setStatusCode(200);
        return $response;
    }

    public function options()
    {
        die ("options");

        /** @var Response $response */
        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        return $response;
    }

    public function update($id, $data)
    {
        /*
        $id = 7;
        $datos["TEMA"] = "JQuery333";
        $datos["DESCRIPCION"] = "JQuery descripción333";
        $datos["ID_CURSO"] = 2;
        */

        $res = $this->usuario->updateData($id,$datos);

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
        $res = $this->usuario->deleteData($id);

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
