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
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Campanhas</h2>
        <a href="index.php?route=doadores&action=create" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nova Campanha
        </a>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Título</th>
                            <th style="width: 60%;">Descrição</th>
                            <th class="text-center" style="width: 20%;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($campanhas)) : ?>
                            <?php foreach ($campanhas as $campanha) : ?>
                            <tr>
                                <td><?= htmlspecialchars($campanha['titulo']) ?></td>
                                <td style="width: 60%;"><?= htmlspecialchars($campanha['descricao']) ?></td>
                                <td class="text-center" style="width: 20%;">
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
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">Nenhuma campanha cadastrada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>