<?php include __DIR__ . "/partials/header.php"; ?>

<<<<<<< HEAD
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Lista de Doações</h2>
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
                            <th>ID</th>
                            <th>Data</th>
                            <th>Doador</th>
                            <th>Campanha</th>
                            <th>Quantidade</th>
                            <th>Validade</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($doacoes as $doacao) : ?>
                        <tr>
                            <td><?= htmlspecialchars($doacao['id_doacao']) ?></td>
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