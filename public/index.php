<?php
$route = $_GET['route'] ?? 'login';

switch($route) {
    case "login":
        require_once __DIR__ . "/../controller/AuthController.php";
        AuthController::login();
        break;

    case "dashboard":
        require_once __DIR__ . "/../controller/AdminController.php";
        AdminController::dashboard();
        break;

    case "doadores":
        require_once __DIR__ . "/../controller/DoadorController.php";
        // Chama o roteamento interno do controller
        $action = $_GET['action'] ?? 'index';
        DoadorController::$action();
        break;

    case "doacoes":
        require_once __DIR__ . "/../controller/DoacaoController.php";
        $action = $_GET['action'] ?? 'index';
        DoacaoController::$action();
        break;

    
    case "campanhas":
        require_once __DIR__ . "/../controller/CampanhaController.php";
        $action = $_GET['action'] ?? 'index';
        CampanhaController::$action();
        break;

    default:
        require_once __DIR__ . "/../controller/AuthController.php";
        AuthController::login();
        break;
}