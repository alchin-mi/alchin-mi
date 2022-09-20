<?php


namespace App\Controllers;


use App\Models\AddModel;
use App\Services\Helpers\Form;
use App\Views\AddView;

class AddController {
    use Form;
    public function __construct() {
        if (count($_POST) == 3) {
            $valid = $this->validate();
            if ($valid === true) {
                $model = new AddModel();
                $addSuccess = $model->addTask();
            }
        }
        new AddView($valid, $addSuccess);
    }
}