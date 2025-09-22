<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /controle_doacoes/public/index.php');
    exit;
}

class AdminController {
    public static function dashboard() {
        include __DIR__ . "/../view/dashboard.php";
    }
}