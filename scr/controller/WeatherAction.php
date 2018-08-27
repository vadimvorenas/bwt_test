<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 19:35
 */

namespace Scr\Controller;


use Scr\Core\Templater;
use Scr\Model\Parse;
use Scr\Model\UserModel;

class WeatherAction extends UserModel
{
    public function __construct(\PDO $db)
    {
        parent::__construct($db);
    }

    public function __invoke()
    {
        if ($this->issAuth()) {
            $http = file_get_contents('https://www.gismeteo.ua/weather-zaporizhia-5093/');
            $weather = Parse::parse($http, '<div class="temp">', '<span class="meas">');
            return Templater::view('weather', ['weather' => $weather]);
        }
        else{
            header("Location:/");
        }
        // TODO: Implement __invoke() method.
    }
}