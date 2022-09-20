<?php


namespace App\Models;


use PDO;

class EditModel extends BaseModel
{
    public function getTask (int $id): ?array
    {
        if ($stmt = $this->getConnect()->prepare('SELECT * FROM tasks WHERE id = :id LIMIT 1')) {
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result[0]) {
                return $result[0];
            }
        }
    }
}