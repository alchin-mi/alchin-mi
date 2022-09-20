<?php


namespace App\Views;


class TaskAddView {
    public function __construct($valid, $addSuccess, $name, $email, $text) {
        require 'template/taskAdd.php';
    }
}