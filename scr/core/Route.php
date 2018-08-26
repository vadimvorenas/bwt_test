<?php

namespace Scr\Core;

use Scr\Controller\Controller;
use Scr\Request\ControllerRequest;
use Scr\Service\ControllerService;

class Route
{
    protected $db;
    private $request;
    private $service;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
        $this->service = new ControllerService($this->db);
        $this->request = new ControllerRequest($this->service);
        $this->start();
    }

    public function start ()
    {

        list($controllerName, $action, $id) = explode('/', $_GET['path']);
        $controllerName = mb_strtolower($controllerName);
        $action = mb_strtolower($action);

        $controllers = [
            \Scr\Controller\Controller::class => function (){
                return new \Scr\Controller\Controller();
            },
            \Scr\Controller\RegistrationAction::class => function(){
                return new \Scr\Controller\RegistrationAction();
            }
        ];

        try {
            switch ($controllerName . '.' . $action){
                case '.':
                    $controller = $controllers[\Scr\Controller\Controller::class]();
                    echo $controller(new ControllerRequest(new ControllerService($this->db)));
                    break;
                case 'registration.':
                    $controller = $controllers[\Scr\Controller\RegistrationAction::class]();
                    echo $controller($this->request);
                    break;
            }
        }
        catch (\Throwable $throwable) {
            echo $throwable->getMessage();
        }
    }
}