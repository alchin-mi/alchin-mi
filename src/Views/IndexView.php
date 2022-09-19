<?php


namespace App\Views;



class IndexView {
    public function __construct($data) {
        $pagination = '';
        foreach ($data['paginator']->toArray() as $page) {
            $href = "<a class='page-link' href=\"{$page["url"]}\">{$page["label"]}</a>";
            $activeClass = ($page["is_current"]) ? " active" : "";
            $pagination .= "<li class='page-item{$activeClass}'>{$href}</li>".PHP_EOL;
        }
        $sort = $_SESSION['sort'];

        require 'template/index.php';
    }

    private function getSortUrl (int $val): string
    {
        return http_build_query(array_diff(array_merge($_GET, ['sort' => $val]), array('')));
    }
}