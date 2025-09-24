<?php
include __DIR__ . "/partials/header.php";

require_once __DIR__ . '/../helpers/Permissao.php';
$tipo = Permissao::currentRole();
?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Campanhas</h2>
        <?php if($tipo === 'administrador'): ?>
            <a href="index.php?route=campanhas&action=create" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nova Campanha
            </a>
        <?php endif; ?>
    </div>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Título</th>
                            <th style="width: 60%;">Descrição</th>
                            <?php if($tipo === 'administrador'): ?>
                                <th class="text-center" style="width: 20%;">Ações</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($campanhas)) : ?>
                            <?php foreach ($campanhas as $campanha) : ?>
                            <tr>
                                <td><?= htmlspecialchars($campanha['titulo']) ?></td>
                                <td style="width: 60%;"><?= htmlspecialchars($campanha['descricao']) ?></td>
                                <?php if($tipo === 'administrador'): ?>
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
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?= $tipo === 'administrador' ? '3' : '2' ?>" class="text-center">Nenhuma campanha cadastrada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>