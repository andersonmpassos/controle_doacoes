<?php include __DIR__ . "/partials/header.php"; ?>

<div class="container mt-5">
    <h2><?= isset($doador) ? 'Editar Doador' : 'Novo Doador' ?></h2>

    <?php if(!empty($erro)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome *</label>
            <input type="text" id="nome" name="nome" class="form-control" required maxlength="255"
                value="<?= isset($doador) ? htmlspecialchars($doador['nome']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control"
                value="<?= isset($doador) ? htmlspecialchars($doador['email']) : '' ?>">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" name="telefone" class="form-control"
                value="<?= isset($doador) ? htmlspecialchars($doador['telefone']) : '' ?>">
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="index.php?route=doadores" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>