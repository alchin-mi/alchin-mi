<?php


namespace App\Services\Helpers;


use Exception;

trait Form
{
    private function validate ()
    {
        try {
            foreach ($_POST as $key => &$val) {
                call_user_func(__CLASS__.'::check'.ucfirst($key), $val);
                $val = htmlspecialchars($val);
            }
        }
        catch (Exception $e){
            return $e;
        }

        return true;
    }

    private static function checkName (string $name)
    {
        $count = mb_strlen($name);
        if ($count < 2 || $count > 150)  {
            throw new Exception('Некорректное имя');
        }
    }
    private static function checkEmail (string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Некорректный Email');
        }
    }
    private static function checkText (string $text)
    {
        if (empty($text) || mb_strlen($text) > 500)  {
            throw new Exception('Некорректно заполнен текст задачи');
        }
    }

    private static function checkOldText (string $text)
    {
        // пустышка
    }
    private static function checkId (int $id)
    {
        if ($id < 1) {
            throw new Exception('Некорректный идентификатор');
        }
    }
    private static function checkLogin (string $login)
    {
        $count = mb_strlen($login);
        if ($count < 2 || $count > 150) {
            throw new Exception('Некорректный логин');
        }
    }
    private static function checkPassword (string $password)
    {
        if (mb_strlen($password) < 2 || mb_strlen($password) > 50) {
            throw new Exception('Некорректно заполнен пароль');
        }
    }
    private static function checkStatus (int $status)
    {
        if ($status !== 1) {
            throw new Exception('Некорректно заполнен статус');
        }
    }
}