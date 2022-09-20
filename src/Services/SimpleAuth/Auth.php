<?php


namespace App\Services\SimpleAuth;

use App\Models\AuthModel;


class Auth
{
    static public function login(AuthModel $model): bool
    {
        $user = $model->getUser();
        if ($user[0]['password'] === md5($_POST['password'])) {
            $_SESSION['user'] = $user[0];
            return true;
        }
        return false;
    }

    static public function logout(): void {
        unset($_SESSION['user']);
    }

    static public function isAuthed(): bool {
        if (array_key_exists('user', $_SESSION) && $_SESSION['user'] !== null) {
            return true;
        } else {
            return false;
        }
    }

    static public function getCurrentUser(): ?array {
        if (self::isAuthed()) {
            return $_SESSION['user'];
        }
        return null;
    }
}