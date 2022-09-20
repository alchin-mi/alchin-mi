<?php


namespace App\Controllers;


use App\Models\AuthModel;
use App\Services\Helpers\Form;
use App\Services\SimpleAuth\Auth;
use App\Views\AuthView;
use App\Views\LogoutView;

class AuthController
{
    use Form;
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            if (count($_POST) == 2) {
                $valid = $this->validate();

                if ($valid === true) {
                    $loginSuccess = Auth::login(new AuthModel());
                    if ($loginSuccess) {
                        new LogoutView($valid, $loginSuccess);
                        exit();
                    }
                }
            }
            new AuthView($valid, $loginSuccess);
        } else {
            if (isset($_POST['logout']) && $_POST['logout'] == 1) {
                Auth::logout();
                new AuthView();
                exit();
            }
            new LogoutView();
        }
    }
}