<?php


namespace App\Views;


class LogoutView {
    public function __construct($valid, $loginSuccess)
    {
        require 'template/logout.php';
    }
}