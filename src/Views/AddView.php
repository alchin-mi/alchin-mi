<?php


namespace App\Views;


class AddView extends BaseView
{
    protected function getTitle(): string
    {
        return 'Форма для создания задачи';
    }

    protected function getContent($valid, $addSuccess, $data)
    {
        require 'template/add.php';
    }

    protected function render($title, $content)
    {
        require 'template/layout.php';
    }
}