<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 18:48
 */

namespace Scr\Controller;


use Scr\Core\Templater;
use Scr\Request\ControllerRequest;

class RegistrationAction
{
    public function __invoke(ControllerRequest $request)
    {
        return Templater::view('registration');
        // TODO: Implement __invoke() method.
    }
}