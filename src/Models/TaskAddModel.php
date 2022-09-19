<?php


namespace App\Models;


class TaskAddModel extends BaseModel {
    public function addTask ($name, $email, $text)
    {
        try {
            $this->getConnect()->beginTransaction();
            $sql = "INSERT INTO tasks (name, email, text) VALUES (?,?,?)";
            $this->getConnect()->prepare($sql)->execute([$name, $email, $text]);
            $this->getConnect()->commit();
        }
        catch (Exception $e){
            $this->getConnect()->rollback();
            return $e;
        }
        return true;
    }
}