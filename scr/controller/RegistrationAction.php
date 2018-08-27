<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 18:48
 */

namespace Scr\Controller;

use Scr\Core\Templater;
use Scr\Model\UserModel;
use Scr\Core\System;

class RegistrationAction
{
    protected $db;
    protected $name;
    protected $user;


    public function __construct(\PDO $db)
    {
        $this->db = $db;
        $this->user = new UserModel($this->db);
    }

    public function in()
    {
        if (count($_POST) > 0){
            $email      =(string) System::trimName($_POST['email']);
            $password   =(string) System::trimName($_POST['password']);
            $user = $this->user->getUserByEmail($email);
            $refferer   = $_GET['refferer'] ?? '/weather';
            $msgIs = $email == '' && $password == '' ? 'Required value' : '';

                if ($this->user->decodeHash($password, (string)$user['password'])) {
                    $_SESSION['auth'] = true;
                    $_SESSION['login'] = $email;

                    if (isset($_POST['saveMe'])) {
                        setcookie('login', $this->user->encodeHash($email), time() + 3600 * 24 * 7);
                        setcookie('pass', $this->user->encodeHash($password), time() + 3600 * 24 * 7);
                    }
                    header("location:$refferer");
                    exit();
                } else {
                    $msg = 'Login or password incorrect';
                }
            }
            else{
                $msg = 'Passwords are incorrect';
            }


        return $this->inner = Templater::view('login', [
            'email' => $email,
            'msg' => $msg,
            'msgIs' => $msgIs
        ]);
    }

    public function add()
    {
        if (count($_POST) > 0){
            $email      = System::trimName((string)$_POST['email'] ?? null);
            $password   = System::trimName((string)$_POST['password'] ?? '');
            $name       = System::trimName((string)$_POST['name'] ?? '');
            $lastname   = System::trimName((string)$_POST['lastname'] ?? '');
            $gender     = System::trimName((string)$_POST['gender'] ?? '');
            $date_birth = System::trimName((string)$_POST['date_birth'] ?? '');
            $passwrod_confirmation = (string) System::trimName((string)$_POST['password_confirmation' ?? '']);

            $refferer   = $_GET['refferer'] ?? '/weather';
            $login_hash = '';
            $id = '';
            $password_hash = '';
            $msgName = $this->user->chekedName() === true ? '' : $this->user->chekedName();
            $msgLastname = $this->user->chekedLastname() === true ? '' : $this->user->chekedLastname();
            $msgEmail = ($email != '') ? '' : 'Required value';


            if ($this->user->chekedName() === true && $this->user->chekedLastname() === true && System::reCaptcha()) {
                if ($password === $passwrod_confirmation
                    && $password != ''
                    && mb_strlen($password) >= 6
                        ) {
                    if (empty($this->user->getUserByEmail($email)) && $email != '' && $password != '') {
                        $login_hash = $this->user->encodeHash($email);
                        $password_hash = $this->user->encodeHash($password);
                        $this->user->addUser($email, $password_hash);
                        $id = $this->user->getUserByEmail($email);
                        $_SESSION['auth'] = true;

                        if ($this->user->decodeHash($email, $login_hash) && $this->user->decodeHash($password, $password_hash)) {
                            $_SESSION['auth'] = true;

                            if (isset($_POST['saveMe'])) {
                                setcookie('login', $this->user->encodeHash($email), time() + 3600 * 24 * 7);
                                setcookie('pass', $this->user->encodeHash($password), time() + 3600 * 24 * 7);
                            }
                            header("location:$refferer");
                            exit();
                        }
                        else {
                            $msg = 'Логин или пароль неверны';
                        }
                    }
                    else {
                        $msgEmail = 'Такой пользователь уже существует';
                    }
                }
                else {
                    $msg = 'Пароли не совпадают or length password min:6';
                }
            }
            else {
                $msg = 'The captcha code was not tested on the server1';
            }
        }

        return $this->inner = Templater::view('registration', [
            'email' => $email,
            'msg' => $msg,
            'name' => $name,
            'lastname' => $lastname,
            'gender' => $gender,
            'date_birth' => $date_birth,
            'msgEmail' => $msgEmail,
            'msgName' => $msgName,
            'msgLastname' => $msgLastname
        ]);
    }

    public function out ()
    {
        $msg = '';
        if (count($_POST ) > 0) {
            $refferer = $_GET['refferer'] ?? '/';
            if (!empty($_POST['out'])) {
                $_SESSION['auth'] = false;
                $_SESSION['login'] = false;
                setcookie('login', 0, time() - 3600 * 24 * 365);
                setcookie('pass', 0, time() - 3600 * 24 * 365);
            }
            if (!empty($_POST['no'])){
                header("location:$refferer");
                exit();
            }

            header("location:$refferer");
            exit();
        }
        return $this->inner = Templater::view('logout', [
            'msg' => $msg
        ]);
    }

}