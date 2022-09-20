<?php


namespace App\Controllers;


use App\Models\TaskAddModel;
use App\Views\TaskAddView;
use Exception;

class TaskAddController {
    public function __construct() {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])) {
            $name = $this->prepareParam($_POST['name']);
            $email = $this->prepareParam($_POST['email']);
            $text = $this->prepareParam($_POST['text']);

            $valid = $this->validate($name, $email, $text);
            if ($valid === true) {
                $model = new TaskAddModel();
                $addSuccess = $model->addTask($name, $email, $text);
            }
        }
        new TaskAddView($valid, $addSuccess, $name, $email, $text);
    }

    private function prepareParam ($val): string
    {
        return htmlspecialchars($val);
    }

    private function validate ($name, $email, $text)
    {
        try {
            $countName = mb_strlen($name);
            if ($countName < 2 || $countName > 150)  {
                throw new Exception('Некорректное имя');
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Некорректный Email');
            }
            if (empty($text) || mb_strlen($text) > 500)  {
                throw new Exception('Некорректно заполнен текст задачи');
            }
        }
        catch (Exception $e){
            return $e;
        }

        return true;
    }
}