<?php

namespace Scr\Core;

use Scr\Controller\Controller;
use Scr\Request\ControllerRequest;
use Scr\Service\ControllerService;

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
            },
            \Scr\Controller\RegistrationAction::class => function(){
                return new \Scr\Controller\RegistrationAction($this->db);
            },
            \Scr\Controller\WeatherAction::class => function(){
                return new \Scr\Controller\WeatherAction($this->db);
            },
            \Scr\Controller\FeedbackController::class => function(){
                return new \Scr\Controller\FeedbackController();
            }
        ];

        try {
            switch ($controllerName . '.' . $action){
                case '.':
                    $controller = $controllers[\Scr\Controller\Controller::class]();
                    echo $controller();
                    break;
                case 'registration.':
                    $controller = $controllers[\Scr\Controller\RegistrationAction::class]();
                    echo $controller->add();
                    break;
                case 'registration.in':
                    $controller = $controllers[\Scr\Controller\RegistrationAction::class]();
                    echo $controller->$action();
                    break;
                case 'weather.':
                    $controller = $controllers[\Scr\Controller\WeatherAction::class]();
                    echo $controller();
                    break;
                case 'feedback.':
                    $controller = $controllers[\Scr\Controller\FeedbackController::class]();
                    echo $controller();
                    break;
                case 'feedback.show':
                    $controller = $controllers[\Scr\Controller\FeedbackController::class]();
                    echo $controller->$action();
                    break;
            }
        }
        catch (\Throwable $throwable) {
            echo $throwable->getMessage();
        }
    }
}