<?php
session_start();
if (!isset($_SESSION['admin'])) header('Location: index.php');

class AdminController {
    public static function dashboard() {
        include __DIR__."/../view/dashboard.php";
    }
}