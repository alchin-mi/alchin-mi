<?php


namespace App\Services\SimpleAuth;

use App\Models\AuthModel;


class Auth
{
    static public function login($login, $password, AuthModel $model): bool
    {
        $user = $model->getUser($login, $password);
        if ($user[0]['password'] === md5($password)) {
            $_SESSION['user'] = $user[0];
            return true;
        }
        return false;
    }

    static public function logout(): void {
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
}