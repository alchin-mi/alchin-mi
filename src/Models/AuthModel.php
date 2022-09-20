<?php


namespace App\Models;


use PDO;

class AuthModel extends BaseModel
{
    const TABLE = 'users';
    public function getUser(): ?array
    {
        if ($stmt = $this->getConnect()->prepare("SELECT id, name, login, password FROM " . self::TABLE . " WHERE login = :login LIMIT 1")) {
            $stmt->bindParam(":login", $_POST['login'], PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }
        }
        return null;
    }
}