<?php
require_once __DIR__."/../model/Admin.php";
session_start();

class AuthController {
    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $admin = Admin::findByEmail($_POST['email']);
            if ($admin && password_verify($_POST['senha'],$admin['senha'])) {
                $_SESSION['admin'] = $admin;
                header('Location: index.php?route=dashboard');
                exit;
            } else {
                $error = "Usuário ou senha incorretos!";
            }
        }
        include __DIR__."/../view/login.php";
    }
    public static function logout() {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
if(isset($_GET['action']) && $_GET['action']=='logout') AuthController::logout();