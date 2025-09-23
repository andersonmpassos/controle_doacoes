<?php
// Inicia a sessão apenas se ainda não estiver ativa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tempo máximo de inatividade em segundos (ex: 15 minutos)
$tempoLimite = 100;

// Pega a rota atual
$route = $_GET['route'] ?? 'login';

// Só checa login e timeout se não estiver na tela de login
if ($route !== 'login') {
    // Se usuário não estiver logado
    if (!isset($_SESSION['admin'])) {
        session_unset();
        session_destroy();
        header('Location: index.php?route=login&timeout=1');
        exit;
    }

    // Se houver registro do último acesso, verifica inatividade
    if (isset($_SESSION['ultimo_acesso'])) {
        $tempoInativo = time() - $_SESSION['ultimo_acesso'];
        if ($tempoInativo > $tempoLimite) {
            session_unset();
            session_destroy();
            header('Location: index.php?route=login&timeout=1');
            exit;
        }
    }

    // Atualiza timestamp do último acesso
    $_SESSION['ultimo_acesso'] = time();
}