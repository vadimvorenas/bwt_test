<?php

namespace Scr\Core;

use Scr\Controller\Controller;

class Route
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
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
            }
        ];

        try {
            switch ($controllerName . '.' . $action){
                case '.':

                    $controller = $controllers[\Scr\Controller\Controller::class]();
                    echo $controller();
//                    var_dump($controller());

                    break;
            }
        }
        catch (\Throwable $throwable) {
            echo $throwable->getMessage();
        }
    }
}