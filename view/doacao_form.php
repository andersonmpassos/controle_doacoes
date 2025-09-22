<?php include __DIR__ . "/partials/header.php"; ?>

<<<<<<< HEAD
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><?= isset($doacao) ? 'Editar Doação' : 'Nova Doação' ?></h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="item" class="form-label">Item:</label>
                            <input type="text" id="item" name="item" class="form-control" required
                                value="<?= isset($doacao) ? htmlspecialchars($doacao['item']) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label for="id_doador" class="form-label">Doador:</label>
                            <select id="id_doador" name="id_doador" class="form-select" required>
                                <option value="">Selecione um doador</option>
                                <?php foreach ($doadores as $doador) : ?>
                                    <option value="<?= $doador['id_doador'] ?>"
                                        <?= (isset($doacao) && $doacao['id_doador'] == $doador['id_doador']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($doador['nome']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_campanha" class="form-label">Campanha:</label>
                            <select id="id_campanha" name="id_campanha" class="form-select" required>
                                <option value="">Selecione uma campanha</option>
                                <?php foreach ($campanhas as $campanha) : ?>
                                    <option value="<?= $campanha['id_campanha'] ?>"
                                        <?= (isset($doacao) && $doacao['id_campanha'] == $campanha['id_campanha']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($campanha['titulo']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="data_doacao" class="form-label">Data da Doação:</label>
                            <input type="date" id="data_doacao" name="data_doacao" class="form-control" required
                                value="<?= isset($doacao) ? htmlspecialchars($doacao['data_doacao']) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label for="quantidade" class="form-label">Quantidade:</label>
                            <input type="number" id="quantidade" name="quantidade" class="form-control" required
                                value="<?= isset($doacao) ? htmlspecialchars($doacao['quantidade']) : '' ?>">
                        </div>

                        <div class="mb-3">
                            <label for="validade" class="form-label">Validade:</label>
                            <input type="date" id="validade" name="validade" class="form-control"
                                value="<?= isset($doacao) ? htmlspecialchars($doacao['validade']) : '' ?>">
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