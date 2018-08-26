<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 17:59
 */

namespace Scr\Controller;

use Scr\Core\Templater;
use Scr\Request\ControllerRequest;

class Controller
{
    public function __invoke(/*ControllerRequest $request*/)
    {
//        return '1111';
        return Templater::view('index');
    }
}