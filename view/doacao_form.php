<?php include __DIR__ . "/partials/header.php"; ?>

<div class="container mt-5">
    <h2><?= isset($doacao) ? 'Editar Doação' : 'Nova Doação' ?></h2>

    <?php if(!empty($erro)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>


    <form method="POST" action="">
        <div class="mb-3">
            <label for="nomeItem" class="form-label">Item *</label>
            <input type="text" id="nomeItem" name="nomeItem" class="form-control" required maxlength="255"
                value="<?= isset($doacao) ? htmlspecialchars($doacao['nomeItem']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="id_doador" class="form-label">Doador *</label>
            <select id="id_doador" name="id_doador" class="form-select" required>
                <option value="">Selecione um doador</option>
                <?php foreach($doadores as $doador): ?>
                    <option value="<?= $doador['id_doador'] ?>" 
                        <?= (isset($doacao) && $doacao['id_doador']==$doador['id_doador']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($doador['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_campanha" class="form-label">Campanha *</label>
            <select id="id_campanha" name="id_campanha" class="form-select" required>
                <option value="">Selecione uma campanha</option>
                <?php foreach($campanhas as $campanha): ?>
                    <option value="<?= $campanha['id_campanha'] ?>" 
                        <?= (isset($doacao) && $doacao['id_campanha']==$campanha['id_campanha']) ? 'selected' : '' ?>>
                        <?= htmlspecialchars($campanha['titulo']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_doacao" class="form-label">Data da Doação *</label>
            <input type="date" id="data_doacao" name="data_doacao" class="form-control" required
                value="<?= isset($doacao) ? htmlspecialchars($doacao['data_doacao']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade *</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" required min="1"
                value="<?= isset($doacao) ? htmlspecialchars($doacao['quantidade']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="validade" class="form-label">Validade</label>
            <input type="date" id="validade" name="validade" class="form-control"
                value="<?= isset($doacao) ? htmlspecialchars($doacao['validade']) : '' ?>">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="index.php?route=doacoes" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>