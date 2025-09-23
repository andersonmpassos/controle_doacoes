<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header('Location: /controle_doacoes/public/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Doações</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/controle_doacoes/public/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand fw-bold" href="index.php?route=dashboard">
                    <i class="bi bi-house-fill me-2"></i>Asilo de Mendigos de Pelotas
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?route=logout" class="text-decoration-none">
                                <i class="bi bi-box-arrow-right me-1"></i>Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container my-5">