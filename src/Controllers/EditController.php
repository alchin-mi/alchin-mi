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
        if (count($_POST) == 6) {
            $valid = $this->validate();
        }
        if ($task = (new EditModel())->getTask($id)) {
            new EditVew($task, $valid);
        }
    }
}