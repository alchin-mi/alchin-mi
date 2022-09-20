<?php


namespace App\Views;


class AuthView {
    public function __construct($valid, $loginSuccess, $login, $password)
    {
        require 'template/auth.php';
    }
}