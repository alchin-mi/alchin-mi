<?php


namespace App\Models;


use Exception;

class AddModel extends BaseModel {
    public function addTask ()
    {
        try {
            $this->getConnect()->beginTransaction();
            $sql = "INSERT INTO tasks (name, email, text) VALUES (?,?,?)";
            $this->getConnect()->prepare($sql)->execute([$_POST['name'], $_POST['email'], $_POST['text']]);
            $this->getConnect()->commit();
        }
        catch (Exception $e){
            $this->getConnect()->rollback();
            return $e;
        }
        return true;
    }
}