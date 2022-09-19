<?php


namespace App\Controllers;

use App\Models\IndexModel;
use App\Views\IndexView;

class IndexController {
    public function __construct() {
        $this->setSort($_GET['sort'] ?? null);
        $this->setLimit($_GET['limit'] ?? null);
        $model = new IndexModel();
        new IndexView($model->getAllTasks());
    }

    private function setLimit (?int $gLimit)
    {
        if ($gLimit || !$_SESSION['limit']) {
            switch($gLimit){
                case 10:
                    $limit = 10;
                    break;
                case 5:
                    $limit = 5;
                    break;
                default:
                    $limit = 3;
            }
            $_SESSION['limit'] = $limit;
        }
    }

    private function setSort (?int $sort)
    {
        $_SESSION['sort'] = (int) $sort > 0 && $sort < 9 ? $sort : ($_SESSION['sort'] ?: 1)    ;
    }
}