<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header('Location: /controle_doacoes/public/index.php');
    exit;
}
?>

<?php include __DIR__ . "/partials/header.php"; ?>

<div class="container my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold"><?= isset($campanha) ? 'Editar Campanha' : 'Nova Campanha' ?></h2>
        <p class="text-muted">Gerencie os detalhes da campanha no Sistema de Gerenciamento de Doações do Asilo de Mendigos de Pelotas</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form method="POST" action="<?= isset($campanha) ? 'index.php?route=campanhas&action=edit&id=' . htmlspecialchars($campanha['id_campanha']) : 'index.php?route=campanhas&action=create' ?>">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título:</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" required
                                value="<?= isset($campanha) ? htmlspecialchars($campanha['titulo']) : '' ?>">
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="text" id="descricao" name="descricao" class="form-control" required
                                value="<?= isset($campanha) ? htmlspecialchars($campanha['descricao']) : '' ?>">
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                        <a href="<?= htmlspecialchars($_SERVER['HTTP_REFERER'] ?? '/controle_doacoes/public/index.php') ?>" class="btn btn-secondary">
                            Voltar
                        </a>
                        <a href="index.php?route=dashboard" class="btn btn-warning">Menu Principal</a>
                        <a href="/controle_doacoes/controller/AuthController.php?action=logout" class="btn btn-danger">Sair</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include __DIR__ . "/partials/footer.php"; ?>