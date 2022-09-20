<?php


namespace App\Views;


class AuthView {
    public function __construct($valid = false, $loginSuccess = false)
    {
        require 'template/auth.php';
    }
}