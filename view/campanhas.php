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
        <h2 class="fw-bold">Lista de Campanhas</h2>
        <p class="text-muted">Gerencie as campanhas registradas no Sistema de Gerenciamento de Doações do Asilo de Mendigos de Pelotas</p>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Campanhas Registradas</h5>
                <a href="index.php?route=campanhas&action=create" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Cadastrar Campanha
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($campanhas as $campanha) : ?>
                        <tr>
                            <td><?= htmlspecialchars($campanha['id_campanha']) ?></td>
                            <td><?= htmlspecialchars($campanha['titulo']) ?></td>
                            <td><?= htmlspecialchars($campanha['descricao']) ?></td>
                            <td class="text-center">
                                <a href="index.php?route=campanhas&action=edit&id=<?= htmlspecialchars($campanha['id_campanha']) ?>" 
                                   class="btn btn-sm btn-warning me-1">
                                   <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <a href="index.php?route=campanhas&action=delete&id=<?= htmlspecialchars($campanha['id_campanha']) ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Deseja realmente excluir esta campanha?');">
                                   <i class="bi bi-trash"></i> Excluir
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="/controle_doacoes/controller/AuthController.php?action=logout" class="btn btn-outline-danger">
            <i class="bi bi-box-arrow-right"></i> Sair
        </a>
        <?php
            $paginaAnterior = $_SERVER['HTTP_REFERER'] ?? '/controle_doacoes/public/index.php';
        ?>
        <a href="<?= htmlspecialchars($paginaAnterior) ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left-circle"></i> Voltar
        </a>
        <a href="index.php?route=dashboard" class="btn btn-primary">
            <i class="bi bi-speedometer2"></i> Voltar ao Menu Principal
        </a>
    </div>
    
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>