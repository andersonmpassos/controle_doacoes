<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['admin'])) {
    header('Location: /controle_doacoes/public/index.php');
    exit;
}

include __DIR__ . "/partials/header.php";
?>

<div class="container my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Painel do Administrador</h2>
        <p class="text-muted">Bem-vindo ao Sistema de Gerenciamento de Doações, Campanhas e Doadores do Asilo de Mendigos de Pelotas</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-3">
            <a href="index.php?route=doadores" class="text-decoration-none">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-people-fill display-4 text-primary"></i>
                        <h5 class="mt-3">Gerenciar Doadores</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="index.php?route=doacoes" class="text-decoration-none">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-box-seam display-4 text-success"></i>
                        <h5 class="mt-3">Gerenciar Doações</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="index.php?route=campanhas" class="text-decoration-none">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-megaphone-fill display-4 text-warning"></i>
                        <h5 class="mt-3">Gerenciar Campanhas</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="index.php?route=logout" class="text-decoration-none">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-box-arrow-right display-4 text-danger"></i>
                        <h5 class="mt-3">Sair</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>