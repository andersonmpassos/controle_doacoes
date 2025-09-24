<?php
// session.php
// Controla sessão, timeout e fornece checkAccess($route)

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- Timeout de inatividade (em segundos) ---
$tempoLimite = 900; // 15 minutos

require_once __DIR__ . '/helpers/Permissao.php'; // Importa a classe Permissao

// Função para obter papel atual do usuário, preferencialmente pelo helper Permissao
function getCurrentRole(): ?string {
    return Permissao::currentRole();
}

// Atualiza/Verifica timeout apenas se usuário estiver logado (ou seja, tiver algum nível)
if (getCurrentRole() !== null) {
    if (isset($_SESSION['ultimo_acesso'])) {
        $tempoInativo = time() - $_SESSION['ultimo_acesso'];
        if ($tempoInativo > $tempoLimite) {
            // destruir sessão e forçar login
            session_unset();
            session_destroy();
            // redireciona para login informando timeout
            header('Location: index.php?route=login&timeout=1');
            exit;
        }
    }
    // atualiza último acesso
    $_SESSION['ultimo_acesso'] = time();
}

// --- Função: checkAccess($route) ---
// Retorna true se o papel atual (ou visitante) tem permissão para acessar a rota.
function checkAccess(string $route): bool {
    $role = getCurrentRole(); // pode ser 'administrador','funcionario','doador' ou null (visitante)

    // Rotas públicas (todo mundo pode acessar)
    $publicRoutes = ['login', 'logout'];

    if (in_array($route, $publicRoutes, true)) {
        return true;
    }

    // Mapeia rotas às permissões esperadas, vinculadas ao helper Permissao
    $routePermissionMap = [
        'dashboard' => 'dashboard:view',
        'doadores'  => 'doador:view',
        'doacoes'   => 'doacao:view',
        'campanhas' => 'campanha:view',
        // Adicione outras rotas e permissões conforme seu sistema
        // 'usuarios' => 'usuario:view', por exemplo
    ];

    if (!isset($routePermissionMap[$route])) {
        // Rota não mapeada, negar acesso por segurança
        return false;
    }

    return Permissao::can($routePermissionMap[$route]);
}