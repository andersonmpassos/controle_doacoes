<?php
$route = $_GET['route'] ?? 'login';

switch($route) {
    case "login":
        require_once "../controller/AuthController.php";
        AuthController::login();
        break;
    case "dashboard":
        require_once "../controller/AdminController.php";
        AdminController::dashboard();
        break;
    case "doadores":
        require_once "../controller/DoadorController.php";
        DoadorController::index();
        break;
    case "novo_doador":
        require_once "../controller/DoadorController.php";
        DoadorController::create();
        break;
    // Adicione rotas para campanhas, doacoes, etc.
    default:
        require_once "../controller/AuthController.php";
        AuthController::login();
}
?>