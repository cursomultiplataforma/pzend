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
use Application\Model\Entity\UsuarioCurso;

class UsuarioCursoController extends AbstractRestfulController
{
    /** @var Adapter */
    private $dbAdapter;
    private $usuarioCurso;
    /**
     * IndexController constructor.
     * @param $dbAdapter
     */
    public function __construct($dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->usuarioCurso = new UsuarioCurso($this->dbAdapter);
    }

    public function create($data)
    {
/*
        $data["LOGIN_USUARIO"] = "julio.holgado";
        $data["ID_CURSO"] = 3;
*/
        $res = $this->usuarioCurso->addData($data);

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
        $data = $this->usuarioCurso->getAllData();

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

    public function get($dato)
    {
        if (is_numeric($dato)) {
            $data = $this->usuarioCurso->getAllCurso($dato);
        } else {
            $data = $this->usuarioCurso->getAllUser($dato);
        }

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
        /** @var Response $response */
        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        $response->setContent(json_encode(["options"]));
        return $response;
    }

    public function update($id, $data)
    {
        /*$datos["login_usuario"] = $_REQUEST["usuario"];
        $datos["id_curso"] = $id;
        */
        /*
        $datos["ID_CURSO"] = 3;
        $datos["LOGIN_USUARIO"] = "daniel.perez";
        */

        $res = $this->usuarioCurso->updateData($id,$datos);

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
        $res = $this->usuarioCurso->deleteData($id);

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
