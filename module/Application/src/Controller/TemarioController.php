<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Db\Adapter\Adapter;
use Zend\Http\Response;
use Application\Model\Entity\Temario;

class TemarioController extends MasterController
{
    /** @var Adapter */
    private $dbAdapter;
    /**
     * IndexController constructor.
     * @param $dbAdapter
     */
    public function __construct($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
    }

    public function create($data)
    {
      /*  $data["ID"] = 11;
        $data["TEMA"] = "JQuery";
        $data["DESCRIPCION"] = "JQuery descripción";
        $data["ID_CURSO"] = 1;
      */

        $temario = new Temario($this->dbAdapter);
        $res = $temario->addData($data);

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
        $temario = new Temario($this->dbAdapter);
        $data = $temario->getAllData();

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

    public function get($id)
    {
        $temario = new Temario($this->dbAdapter);
        $data = $temario->getDataId($id);

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
        $id = 7;
        $datos["TEMA"] = "JQuery333";
        $datos["DESCRIPCION"] = "JQuery descripción333";
        $datos["ID_CURSO"] = 2;

        $temario = new Temario($this->dbAdapter);
        $res = $temario->updateData($id,$datos);

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
        $temario = new Temario($this->dbAdapter);
        $res = $temario->deleteData($id);

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
