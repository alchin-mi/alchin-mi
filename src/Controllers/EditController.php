<?php


namespace App\Controllers;


use App\Models\EditModel;
use App\Services\Helpers\Form;
use App\Views\EditVew;

class EditController
{
    use Form;

    public function __construct(int $id)
    {
        $editModel = new EditModel();
        if (count($_POST) == 5 || count($_POST) == 6) {
            $valid = $this->validate();
            if ($valid) {
                $editSuccess = $editModel->editTask($id);
            }
        }
        if ($task = $editModel->getTask($id)) {
            new EditVew($valid, $editSuccess,$task);
        }
    }
}