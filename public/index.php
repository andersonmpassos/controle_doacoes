<?php
require_once __DIR__ . '/../session.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


// Captura a rota de forma segura, rota padrão 'login'
$route = $_GET['route'] ?? 'login';

// Função para verificar acesso usando sessão e Permissão
if (!checkAccess($route)) {
    $role = $_SESSION['nivel'] ?? null;

    if ($role === null) {
        // Não logado, vai para login
        header("Location: index.php?route=login");
        exit;
    } else {
        // Usuário logado, mas sem permissão para a rota solicitada
        $_SESSION['error'] = 'Acesso negado: você não tem permissão para acessar esta página.';

        // Redireciona para uma rota que o papel tem permissão para acessar
        switch ($role) {
            case 'doador':
                header("Location: index.php?route=dashboard");
                break;
            case 'funcionario':
            case 'administrador':
                header("Location: index.php?route=dashboard");
                break;
            default:
                // Caso desconhecido, força logout
                session_unset();
                session_destroy();
                header("Location: index.php?route=login");
                break;
        }
        exit;
    }
}

// Definição do controller e chamada das ações

switch ($route) {
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
    
    case "usuarios":
        require_once __DIR__ . "/../controller/UsuarioController.php";
        $action = $_GET['action'] ?? 'index';
        UsuarioController::$action();
        break;

    case "logout":
        require_once __DIR__ . "/../controller/AuthController.php";
        AuthController::logout();
        break;

    default:
        require_once __DIR__ . "/../controller/AuthController.php";
        AuthController::login();
        break;
}