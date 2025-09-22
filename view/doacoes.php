<?php include __DIR__ . "/partials/header.php"; ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Doações</h2>
        <a href="index.php?route=doacoes&action=create" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nova Doação
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Item</th>
                            <th>Data</th>
                            <th>Doador</th>
                            <th>Campanha</th>
                            <th>Quantidade</th>
                            <th>Validade</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($doacoes)): ?>
                            <?php foreach ($doacoes as $doacao): ?>
                                <tr>
                                    <td><?= htmlspecialchars($doacao['item']) ?></td>
                                    <td><?= htmlspecialchars($doacao['data_doacao']) ?></td>
                                    <td><?= htmlspecialchars($doacao['nome_doador']) ?></td>
                                    <td><?= htmlspecialchars($doacao['titulo_campanha']) ?></td>
                                    <td><?= htmlspecialchars($doacao['quantidade']) ?></td>
                                    <td><?= htmlspecialchars($doacao['validade']) ?></td>
                                    <td class="text-center">
                                        <a href="index.php?route=doacoes&action=edit&id=<?= $doacao['id_doacao'] ?>" 
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Editar
                                        </a>
                                        <a href="index.php?route=doacoes&action=delete&id=<?= $doacao['id_doacao'] ?>" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Deseja realmente excluir esta doação?');">
                                        <i class="bi bi-trash"></i> Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Nenhuma doação cadastrada.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>