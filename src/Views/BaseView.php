<?php


namespace App\Views;


abstract class BaseView {
    public function __construct($valid = false, $success = false, $data = false) {
        ob_start();
        $this->getContent($valid, $success, $data);
        $content = ob_get_clean();
        $this->render($this->getTitle(), $content);
    }

    abstract protected function getTitle(): string;
    abstract protected function getContent($valid, $addSuccess, $data);
    abstract protected function render($title, $content);
}