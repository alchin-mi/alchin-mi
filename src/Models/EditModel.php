<?php


namespace App\Models;


use Exception;
use PDO;

class EditModel extends BaseModel {
    public function getTask(int $id): ?array
    {
        if ($stmt = $this->getConnect()->prepare('SELECT * FROM tasks WHERE id = :id LIMIT 1')) {
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result[0]) {
                return $result[0];
            }
        }
        return null;
    }

    public function editTask(int $id)
    {
        try {
            $this->getConnect()->beginTransaction();

            $moderated = $_POST['text'] != $_POST['oldText'] ? 1 : 0;

            $sql = "UPDATE tasks SET 
                 name = :name, 
                 email = :email, 
                 text = :text, 
                 status = :status ".
                    ($moderated? ", moderated = :moderated" : '') ."
                WHERE id = :id LIMIT 1";

            $stmt = $this->getConnect()->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $stmt->bindParam(':text', $_POST['text'], PDO::PARAM_STR);
            $stmt->bindParam(':status', $_POST['status'], PDO::PARAM_INT);
            if ($moderated) {
                $stmt->bindParam(':moderated', $moderated, PDO::PARAM_INT);
            }
            $stmt->execute();
            $this->getConnect()->commit();
            return true;
        } catch (Exception $e) {
            $this->getConnect()->rollback();
            return $e;
        }
    }
}