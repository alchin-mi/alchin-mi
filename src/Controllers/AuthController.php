<?php


namespace App\Controllers;


use App\Models\AuthModel;
use App\Models\BaseModel;
use App\Services\SimpleAuth\Auth;
use App\Views\AuthView;
use App\Views\LogoutView;
use Exception;

class AuthController
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            if (isset($_POST['login']) && isset($_POST['password'])) {

                $valid = $this->validate($_POST['login'], $_POST['password']);
                $login = $this->prepareParam($_POST['login']);
                $password = $this->prepareParam($_POST['password']);

                if ($valid === true) {
                    $model = new AuthModel();
                    $loginSuccess = Auth::login($login, $password, $model);
                    if ($loginSuccess) {
                        new LogoutView($valid, $loginSuccess);
                        exit();
                    }
                }
            }
            new AuthView($valid, $loginSuccess, $login, $password);
        } else {
            if (isset($_POST['logout']) && $_POST['logout'] == 1) {
                Auth::logout();
                new AuthView(false, false, false, false);
                exit();
            }
            new LogoutView($valid, $loginSuccess, $login, $password);
        }
    }

    private function prepareParam($val): string
    {
        return htmlspecialchars($val);
    }

    private function validate($login, $password)
    {
        try {
            $countName = mb_strlen($login);
            if ($countName < 2 || $countName > 150) {
                throw new Exception('Некорректный логин');
            }
            if (mb_strlen($password) < 2 || mb_strlen($password) > 50) {
                throw new Exception('Некорректно заполнен пароль');
            }
        } catch (Exception $e) {
            return $e;
        }

        return true;
    }
}