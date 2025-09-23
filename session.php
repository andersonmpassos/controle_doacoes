<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tempo máximo de inatividade (15 minutos)
$tempoLimite = 900;

// Checa login apenas se não estiver na rota de login
$currentScript = basename($_SERVER['PHP_SELF']);
if ($currentScript !== 'index.php') {
    $route = $_GET['route'] ?? 'login';
} else {
    $route = $_GET['route'] ?? 'login';
}

// Verifica se o usuário está logado
if (!isset($_SESSION['admin']) && $route !== 'login') {
    session_unset();
    session_destroy();
    header('Location: /controle_doacoes/public/index.php?route=login&timeout=1');
    exit;
}

// Verifica inatividade
if (isset($_SESSION['ultimo_acesso'])) {
    $tempoInativo = time() - $_SESSION['ultimo_acesso'];
    if ($tempoInativo > $tempoLimite) {
        session_unset();
        session_destroy();
        header('Location: /controle_doacoes/public/index.php?route=login&timeout=1');
        exit;
    }
}

// Atualiza o timestamp da última atividade
$_SESSION['ultimo_acesso'] = time();