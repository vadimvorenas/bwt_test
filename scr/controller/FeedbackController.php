<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 21:50
 */

namespace Scr\Controller;

use Scr\Model\UserModel;
use Scr\Core\Templater;
use Scr\Core\System;
use Scr\Model\FeedbackModel;

class FeedbackController extends UserModel
{
    protected $model;

    public function __construct(\PDO $db)
    {
        $this->model = new FeedbackModel($db);
        parent::__construct($db);
    }

    public function __invoke()
    {
        if (count($_POST) > 0) {
            $email      = System::trimName((string)$_POST['email'] ?? null);
            $name       = System::trimName((string)$_POST['name'] ?? '');
            $text       = System::trimName((string)$_POST['text'] ?? '');
            $user = $this->getUserByEmail((string) $_SESSION['login']) ?? '';

            $msgName = $this->chekedName() === true ? true : $this->chekedName();
            $msgEmail = $email != '' ? '' : 'Required value';
            $msgText = $this->chekedText() === true ? true : $this->chekedText();
            $refferer   = $_GET['refferer'] ?? '/';
            $msg = '';

            if ($this->chekedText() === true) {
                if (!empty($_POST["g-recaptcha-response"])){
                    if (
                        $this->chekedName() === true
                        && filter_var($email, FILTER_VALIDATE_EMAIL) !== false
                        && System::reCaptcha()
                        )
                    {
                        $this->model->addFeedback($name, $email, $text, $user['id']);
                        header("Location:$refferer");
                        exit();
                    }
                }
                else {
                    $msg = 'The captcha code was not tested on the server1';
                }
            }


        }
        else{
            if ($this->issAuth()) {
                $user = $this->getUserByEmail($_SESSION['login']);
                return Templater::view('feedback', [
                    'name' => $user['username'],
                    'email' => $user['email']
                ]);
            } else {
                return Templater::view('feedback');
            }
        }

        return $this->inner = Templater::view('feedback', [
            'email' => $email,
            'msg' => $msg,
            'msgText' => $msgText,
            'name' => $name,
            'text' => $text,
            'msgEmail' => $msgEmail,
            'msgName' => $msgName,
        ]);
    }

    public function show()
    {
        if ($this->issAuth()) {
            return Templater::view('feedbackShow', ['feedback' => $this->model->getAllFeedback()]);
        }
        else{
            header("Location:http://bwttest/");
        }
    }
}