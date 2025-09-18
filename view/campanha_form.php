<?php include __DIR__ . "/partials/header.php"; ?>

<h2><?= isset($campanha) ? 'Editar' : 'Nova' ?> Campanha</h2>

<form method="POST" action="">
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo" required value="<?= isset($campanha) ? htmlspecialchars($campanha['titulo']) : '' ?>"><br>

    <label for="descricao">Descrição:</label><br>
    <textarea id="descricao" name="descricao" required><?= isset($campanha) ? htmlspecialchars($campanha['descricao']) : '' ?></textarea><br><br>

    <button type="submit">Salvar</button>
</form>

<?php include __DIR__ . "/partials/footer.php"; ?>