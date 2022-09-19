<?php


namespace App\Controllers;


use App\Services\SimpleAuth\Auth;

class AuthController
{
    public function __construct()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $this->prepareParam($_POST['login']);
            $email = $this->prepareParam($_POST['password']);

            $valid = $this->validate($name, $email);
            if ($valid === true) {
                $model = new TaskAddModel();
                $addSuccess = $model->addTask($login, $email);
            }
        }
        new AuthView($valid, $addSuccess, $name, $email);
    }

    private function prepareParam($val): string
    {
        return htmlspecialchars($val);
    }

    private function validate($name, $email, $text)
    {
        try {
            $countName = mb_strlen($name);
            if ($countName < 2 || $countName > 150) {
                throw new Exception('Некорректное имя');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Некорректный Email');
            }
            if (empty($text) || mb_strlen($text) > 500) {
                throw new Exception('Некорректно заполнен текст задачи');
            }
        } catch (Exception $e) {
            return $e;
        }

        return true;
    }
}