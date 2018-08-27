<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 27.08.2018
 * Time: 0:06
 */

namespace Scr\Model;

use Scr\Core\System;

class SystemModel
{
    private $auth;
    protected $email;
    protected $password;

    public function __construct(bool $auth, $email, $password)
    {
        $this->auth = $auth;
        $this->email = $email;
        $this->password = $password;
    }

    public function encodeHash(string $string)
    {
        return password_hash($string, PASSWORD_ARGON2I);
        // TODO: Implement encodeHashId() method.
    }

    public function decodeHash(string $string, string $hash)
    {
        return password_verify($string, $hash);
        // TODO: Implement decodeHashId() method.
    }

    public function issAuth()
    {
        if (isset($_SESSION['auth'])){
            $this->auth = $_SESSION['auth'];
        }
        if (!$this->auth && isset($_COOKIE['login']) && isset($_COOKIE['pass']))
        {
            if ( $this->decodeHash($this->email, $_COOKIE['login'] )
                && $this->decodeHash($this->password, $_COOKIE['pass']) )
            {
                $_SESSION['auth'] = true;
                $this->auth = true;
            }
            else
            {
                $this->auth = false;
            }
        }
        return $this->auth;
    }

    public function chekedName()
    {
        $name       = System::trimName((string)$_POST['name']) ?? '';

        if (mb_strlen($name) <= 128 && $name!='' && mb_strlen($name) >= 4){
            if (System::check($name, '~^[a-z\d][a-zа-пр-яё\d]*[_-]?[a-zа-пр-яё\d]*[a-zа-пр-яё\d]$~i')){
                return true;
            }
            else{
                return $msg = 'Неверный формат Name';
            }
        }
        else{
            return $msg= 'Name не должно быть пустым or length - min:4, max:128';
        }

    }

    public function chekedText()
    {
        $name       = System::trimName((string)$_POST['text']) ?? '';

        if (mb_strlen($name) <= 1000 && $name!='' && mb_strlen($name) >= 4){
            if (!System::check($name /*"~^[a-zа-пр-яё\d][a-zа-пр-яё\d]*[_-]?[a-zа-пр-яё\d]*[a-zа-пр-яё\d]$~i"*/)){
                return true;
            }
            else{
                return $msg = 'Неверный формат Text';
            }
        }
        else{
            return $msg= 'Text не должно быть пустым or length - min:4, max:1000';
        }

    }

    public function chekedLastname()
    {
        $lastname   = System::trimName((string)$_POST['lastname']) ?? '';

        if (mb_strlen($lastname) <= 128 && $lastname!='' && mb_strlen($lastname) >= 4){
            if (System::check($lastname, '~^[a-z\d][a-zа-пр-яё\d]*[_-]?[a-zа-пр-яё\d]*[a-zа-пр-яё\d]$~i')){
                return true;
            }
            else{
                return $msg = 'Неверный формат Lastname';
            }
        }
        else{
            return $msg = 'Lastname не должно быть пустым or length - min:4, max:128';
        }
    }

    /**
     * @return mixed
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param mixed $auth
     */
    public function setAuth($auth): void
    {
        $this->auth = $auth;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        if ($this->issAuth())
            return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        if ($this->issAuth())
            $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        if ($this->issAuth())
            return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        if ($this->issAuth())
            $this->password = $password;
    }

}