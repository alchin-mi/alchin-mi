<?php


namespace App\Views;


class AddView {
    public function __construct($valid, $addSuccess) {
        require 'template/add.php';
    }
}