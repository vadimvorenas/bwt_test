<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 26.08.2018
 * Time: 23:58
 */

namespace Scr\Model;

use Scr\Core\System;


class UserModel extends SystemModel
{
    protected $db;
    private $table_name = 'users';


    public function __construct(\PDO $db, $auth = false)
    {
        $this->db = $db;
        $email = (string) $_SESSION['login'] ?? '';
        $password = (string) $this->getUserByEmail($email)['password'];
        parent::__construct($auth, $email, $password);
    }

    public function getUsers ()
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("SELECT * FROM %s", $this->table_name);
        $query = $db->prepare($sql);
        $query->execute();

        try{
            return $query->fetchAll();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function getUserByEmail (string $email)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("SELECT * FROM %s WHERE email = :email", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':email', $email);
        $query->execute();

        try{
            return $query->fetch();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function getUserById ($id)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("SELECT * FROM %s WHERE id = :id", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':id', $id);
        $query->execute();

        try{
            return $query->fetch();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function addUser(string $email, string $password)
    {
        $name       =(string) System::trimName($_POST['name']) ?? '';
        $lastname   =(string) System::trimName($_POST['lastname']) ?? '';
        $gender     =(string) System::trimName($_POST['gender']) ?? 'IS NULL';
        $date_birth =(string) System::trimName($_POST['date_birth']) ?? 'IS NULL';
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf(
            "INSERT INTO %s (email, password, username, lastname, gender, date_birth) 
                VALUES (:email, :password, :username, :lastname, :gender, :date_birth)",
                $this->table_name
        );
        $query = $db->prepare($sql);

        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':username', $name);
        $query->bindParam(':lastname', $lastname);
        $query->bindParam(':gender', $gender);
        $query->bindParam(':date_birth', $date_birth);


        try{
            return $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function deletedUser(int $id)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("UPDATE %s SET deleted = 1 WHERE id = : id", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':id',$id);

        try{
            return $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function editUser (int $id, string $email, string $password)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf("UPDATE %s SET email = :email, password = :password  WHERE id = : id", $this->table_name);
        $query = $db->prepare($sql);

        $query->bindParam(':id',$id);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);

        try{
            return $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }
}