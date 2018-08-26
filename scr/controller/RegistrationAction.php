<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 18:48
 */

namespace Scr\Controller;


use Scr\Core\Templater;

class RegistrationAction
{
    protected $name;
    protected $lastname;
    protected $email;
    protected $gender;
    protected $date_bith;

    public function __invoke(\PDO $db)
    {
        return Templater::view('registration');
        // TODO: Implement __invoke() method.
    }
}