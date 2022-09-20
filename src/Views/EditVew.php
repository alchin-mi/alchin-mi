<?php


namespace App\Views;


class EditVew
{
    public function __construct(array $task, $valid)
    {
        require 'template\edit.php';
    }
}