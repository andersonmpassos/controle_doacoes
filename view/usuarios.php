<?php
include __DIR__ . "/partials/header.php";

require_once __DIR__ . '/../helpers/Permissao.php';
$tipo = Permissao::currentRole();
?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Usuários</h2>
        <a href="index.php?route=usuarios&action=create" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Novo Usuário
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Nível</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)): ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td><?= htmlspecialchars($usuario['nome']) ?></td>
                                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                                    <td><?= htmlspecialchars($usuario['nivel']) ?></td>
                                    <td class="text-center">
                                        <a href="index.php?route=usuarios&action=edit&id=<?= $usuario['id_admin'] ?>" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <a href="index.php?route=usuarios&action=delete&id=<?= $usuario['id_admin'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este usuário?');">
                                            <i class="bi bi-trash"></i> Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Nenhum usuário cadastrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>