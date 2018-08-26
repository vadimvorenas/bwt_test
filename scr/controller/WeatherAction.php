<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 19:35
 */

namespace Scr\Controller;


use Scr\Core\Templater;

class WeatherAction
{

    public function __invoke(\PDO $db)
    {
        return Templater::view('weather');
        // TODO: Implement __invoke() method.
    }
}