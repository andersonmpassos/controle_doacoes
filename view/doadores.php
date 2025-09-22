<?php include __DIR__ . "/partials/header.php"; ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Lista de Doadores</h2>
        <a href="index.php?route=doadores&action=create" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Novo Doador
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Número</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        <?php if (!empty($doadores)): ?>
                            <?php foreach ($doadores as $doador): ?>
                                <tr>
                                    <td><?= $contador++ ?></td>
                                    <td><?= htmlspecialchars($doador['nome']) ?></td>
                                    <td><?= htmlspecialchars($doador['email']) ?></td>
                                    <td><?= htmlspecialchars($doador['telefone']) ?></td>
                                    <td class="text-center">
                                        <a href="index.php?route=doadores&action=edit&id=<?= $doador['id_doador'] ?>" 
                                           class="btn btn-sm btn-warning">
                                           <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <a href="index.php?route=doadores&action=delete&id=<?= $doador['id_doador'] ?>" 
                                           class="btn btn-sm btn-danger"
                                           onclick="return confirm('Deseja realmente excluir este doador?');">
                                           <i class="bi bi-trash"></i> Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">Nenhum doador cadastrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>