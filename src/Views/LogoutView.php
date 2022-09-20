<?php


namespace App\Views;


class LogoutView {
    public function __construct($valid = false, $loginSuccess = false)
    {
        require 'template/logout.php';
    }
}