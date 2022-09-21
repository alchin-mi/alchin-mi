<?php


namespace App\Views;


class LogoutView extends BaseView {
    protected function getTitle(): string
    {
        return 'Форма авторизации';
    }

    protected function getContent($valid, $loginSuccess, $data)
    {
        require 'template/logout.php';
    }

    protected function render($title, $content)
    {
        require 'template/layout.php';
    }
}