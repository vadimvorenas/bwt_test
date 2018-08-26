<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 23:58
 */

namespace Scr\Model;


class UserModel
{
    protected $db;
    private $table_name = '';
    protected $name;
    protected $lastname;
    protected $email;
    protected $password;
    protected $gender;
    protected $date_bith;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }
}