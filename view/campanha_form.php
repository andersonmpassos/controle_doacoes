<?php include __DIR__ . "/partials/header.php"; ?>

<div class="container mt-5">
    <h2><?= isset($campanha) ? 'Editar Campanha' : 'Nova Campanha' ?></h2>

    <?php if(!empty($erro)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título *</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required maxlength="255"
                value="<?= isset($campanha) ? htmlspecialchars($campanha['titulo']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="4"><?= isset($campanha) ? htmlspecialchars($campanha['descricao']) : '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="index.php?route=campanhas" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>