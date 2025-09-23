<?php
// Inicia a sessão se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tempo máximo de inatividade em segundos (ex: 15 minutos)
$timeout_duration = 900; 

// Verifica se o usuário está logado
if (!isset($_SESSION['admin'])) {
    header('Location: /controle_doacoes/public/index.php');
    exit;
}

// Verifica se a sessão expirou por inatividade
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header('Location: /controle_doacoes/public/index.php?timeout=1');
    exit;
}

// Atualiza o timestamp da última atividade
$_SESSION['last_activity'] = time();

class AdminController {
    public static function dashboard() {
        include __DIR__ . "/../view/dashboard.php";
    }
}