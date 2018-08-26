<?php

namespace Scr\Core;

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

        ];

        try {
            switch ($controllerName . '.' . $action){
                case '.':
                    $controller = $controllers[''];
                    echo $controller;
                    break;
            }
        }
        catch (\Throwable $throwable) {
            echo $throwable->getMessage();
        }
    }
}