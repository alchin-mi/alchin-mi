<?php


namespace App\Views;


class AuthView
{
    public function __construct($valid) {
        require 'template/Auth.php';
    }
}