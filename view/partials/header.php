<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../../helpers/Permissao.php";

$role = \Permissao::currentRole();

if ($role === 'visitante') {
    header('Location: /controle_doacoes/public/index.php?route=login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Metas, CSS e ícones aqui -->
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php?route=dashboard">
                <i class="bi bi-house-fill me-2"></i>Asilo de Mendigos de Pelotas
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=doadores">
                            <i class="bi bi-people-fill me-1"></i>Doadores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=doacoes">
                            <i class="bi bi-box-seam me-1"></i>Doações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=campanhas">
                            <i class="bi bi-megaphone-fill me-1"></i>Campanhas
                        </a>
                    </li>

                    <?php if ($role === 'administrador'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?route=usuarios">
                                <i class="bi bi-person-gear me-1"></i>Gerenciar Usuários
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?route=logout">
                            <i class="bi bi-box-arrow-right me-1"></i>Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container my-5">