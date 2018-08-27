<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 27.08.2018
 * Time: 3:41
 */

namespace Scr\Model;


class FeedbackModel
{
    protected $db;
    protected $table_name = 'feedback';

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function addFeedback($name, $email, $text, $id=null)
    {
        $db = $this->db;
        $db->exec('SET NAMES UTF8');

        $sql = sprintf(
            "INSERT INTO %s (email, username, msg, id_user) 
                VALUES (:email, :username, :text, :id_user)",
            $this->table_name
        );
        $query = $db->prepare($sql);

        $query->bindParam(':email', $email);
        $query->bindParam(':username', $name);
        $query->bindParam(':text', $text);
        $query->bindParam(':id_user', $id);


        try{
            return $query->execute();
        }
        catch (\Exception $exception){
            echo $exception;
        }
    }

    public function getAllFeedback()
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

}