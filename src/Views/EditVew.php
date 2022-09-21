<?php


namespace App\Views;


class EditVew extends BaseView
{
    protected function getTitle(): string
    {
        return 'Форма для создания задачи';
    }

    protected function getContent($valid, $editSuccess, $task)
    {
        require 'template/edit.php';
    }

    protected function render($title, $content)
    {
        require 'template/layout.php';
    }
}