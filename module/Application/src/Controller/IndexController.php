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

class IndexController extends AbstractRestfulController
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
        $this->response->setStatusCode(200);
        return [
            'content' => 'prueba create'
        ];
    }

    public function getList()
    {
        /*
        $curso = new Curso($this->dbAdapter);
        $data = $curso->getAllData();

        $temario = new Temario($this->dbAdapter);
        $data = $temario->getAllData();

        $usuario = new Usuario($this->dbAdapter);
        $data = $usuario->getAllData();

        $usuario_curso = new UsuarioCurso($this->dbAdapter);
        $data = $usuario_curso->getAllData();
        */
        $data[]=1;

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
        /** @var Response $response */
        $response = $this->getResponse();
        $response->getHeaders()->addHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*'
        ]);
        $response->setContent(json_encode([
            'content' => 'prueba get => ' . $id
        ]));
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
        return $response;
    }

}
