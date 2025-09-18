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
        // O controller já possui roteamento interno por action
        break;

    case "doacoes":
        require_once __DIR__ . "/../controller/DoacaoController.php";
        // O controller já possui roteamento interno por action
        break;
    
    case "campanhas":
        require_once __DIR__ . "/../controller/CampanhaController.php";
        break;


    // Aqui você pode adicionar novas rotas (ex: campanhas, etc)

    default:
        require_once __DIR__ . "/../controller/AuthController.php";
        AuthController::login();
        break;
}