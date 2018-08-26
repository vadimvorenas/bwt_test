<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 21:50
 */

namespace Scr\Controller;


use Scr\Core\Templater;

class FeedbackController
{

    public function __invoke()
    {
        return Templater::view('feedback');
        // TODO: Implement __invoke() method.
    }

    public function show()
    {
        return Templater::view('feedbackShow');
    }
}