<?php


namespace App\Views;


class AuthView extends BaseView {
    protected function getTitle(): string
    {
        return 'Форма авторизации';
    }

    protected function getContent($valid, $loginSuccess, $data)
    {
        require 'template/auth.php';
    }

    protected function render($title, $content)
    {
        require 'template/layout.php';
    }
}