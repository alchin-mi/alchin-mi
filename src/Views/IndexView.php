<?php


namespace App\Views;



class IndexView extends BaseView
{
    protected function getTitle(): string
    {
        return 'Список задач';
    }

    protected function getContent($valid, $editSuccess, $data)
    {
        $pagination = '';
        foreach ($data['paginator']->toArray() as $page) {
            $href = "<a class='page-link' href=\"{$page["url"]}\">{$page["label"]}</a>";
            $activeClass = ($page["is_current"]) ? " active" : "";
            $pagination .= "<li class='page-item{$activeClass}'>{$href}</li>".PHP_EOL;
        }
        $sort = $_SESSION['sort'];
        require 'template/index.php';
    }

    protected function render($title, $content)
    {
        require 'template/layout.php';
    }

    private function getSortUrl (int $val): string
    {
        return http_build_query(array_diff(array_merge($_GET, ['sort' => $val]), array('')));
    }
}