<?php


namespace App\Services\SimpleAuth;

use App\Models\BaseModel;
use PDO;


class Auth
{
    private $connect;
    const TABLE = 'users';
    public function __construct()
    {
        $model = new BaseModel();
        $this->connect = $model->getConnect();
    }

    public function login($login, $password): bool
    {
        $sql = "SELECT password FROM " . self::TABLE . " WHERE login = ? LIMIT 1";
        if ($stmt = $this->connect->prepare($sql)) {
            $stmt->execute([$login]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result['password'] === md5($password)) {
                $_SESSION['user'] = $login;
                return true;
            }
        }
        return false;
    }

    public function logout(): void {
        unset($_SESSION['user']);
    }

    public function isAuthed(): bool {
        if (array_key_exists('user', $_SESSION) && $_SESSION['user'] !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function getCurrentUser(): ?array {
        if ($this->isAuthed()) {
            return $this->findBylogin($_SESSION['user']);
        }
        return null;
    }

    public function findBylogin($login): ?array {
        if ($stmt = $this->connect->prepare("SELECT id, login FROM " . self::TABLE . " WHERE login = ? LIMIT 1")) {
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $stmt->bind_result($id, $found);
            $stmt->store_result();
            $stmt->fetch();
            $numRows = $stmt->num_rows;
            $stmt->free();
            if ($numRows === 1) {
                $a = ['id' => $id, 'login' => $found];
                return $a;
            }
        }
        return null;
    }
}