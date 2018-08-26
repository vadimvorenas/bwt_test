<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 17:59
 */

namespace Scr\Controller;

use Scr\Core\Templater;

class Controller
{
    public function __invoke()
    {
        return Templater::view('index');
    }
}