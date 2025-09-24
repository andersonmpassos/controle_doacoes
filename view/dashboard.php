<?php
require_once __DIR__ . '/../helpers/Permissao.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Exige permissão para acessar o dashboard
Permissao::require('dashboard:view');

// Obtém o papel atual do usuário
$tipo = Permissao::currentRole();

include __DIR__ . "/partials/header.php";
?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success text-center">
        <?= htmlspecialchars($_SESSION['success']) ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger text-center">
        <?= htmlspecialchars($_SESSION['error']) ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>


<div class="container my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Painel de Doações</h2>
        <p class="text-muted">Bem-vindo ao Sistema de Gerenciamento de Doações, Campanhas e Doadores</p>
    </div>

    <div class="row g-4 justify-content-center">
        <div class="col-md-3">
            <a href="index.php?route=doadores" class="text-decoration-none">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-people-fill display-4 text-primary"></i>
                        <h5 class="mt-3">Ver Doadores</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="index.php?route=doacoes" class="text-decoration-none">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-box-seam display-4 text-success"></i>
                        <h5 class="mt-3">Ver Doações</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3">
            <a href="index.php?route=campanhas" class="text-decoration-none">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <i class="bi bi-megaphone-fill display-4 text-warning"></i>
                        <h5 class="mt-3">Ver Campanhas</h5>
                    </div>
                </div>
            </a>
        </div>

        <?php if ($tipo === 'administrador'): ?>
            <div class="col-md-3">
                <a href="index.php?route=usuarios" class="text-decoration-none">
                    <div class="card shadow-sm border-0 text-center h-100">
                        <div class="card-body">
                            <i class="bi bi-person-gear display-4 text-dark"></i>
                            <h5 class="mt-3">Gerenciar Usuários</h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>

    </div>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>