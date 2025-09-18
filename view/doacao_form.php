<?php include __DIR__ . "/partials/header.php"; ?>

<h2><?= isset($doacao) ? 'Editar' : 'Nova' ?> Doação</h2>

<form method="POST" action="">
    <label for="item">Item:</label><br>
    <input type="text" id="item" name="item" required value="<?= isset($doacao) ? htmlspecialchars($doacao['item']) : '' ?>"><br>

    <label for="id_doador">Doador:</label><br>
    <select id="id_doador" name="id_doador" required>
        <option value="">Selecione um doador</option>
        <?php foreach ($doadores as $doador) : ?>
            <option value="<?= $doador['id_doador'] ?>"
                <?= (isset($doacao) && $doacao['id_doador'] == $doador['id_doador']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($doador['nome']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="id_campanha">Campanha:</label><br>
    <select id="id_campanha" name="id_campanha" required>
        <option value="">Selecione uma campanha</option>
        <?php foreach ($campanhas as $campanha) : ?>
            <option value="<?= $campanha['id_campanha'] ?>"
                <?= (isset($doacao) && $doacao['id_campanha'] == $campanha['id_campanha']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($campanha['titulo']) ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <label for="data_doacao">Data da Doação:</label><br>
    <input type="date" id="data_doacao" name="data_doacao" required value="<?= isset($doacao) ? htmlspecialchars($doacao['data_doacao']) : '' ?>"><br>

    <label for="quantidade">Quantidade:</label><br>
    <input type="number" id="quantidade" name="quantidade" required value="<?= isset($doacao) ? htmlspecialchars($doacao['quantidade']) : '' ?>"><br>

    <label for="validade">Validade:</label><br>
    <input type="date" id="validade" name="validade" value="<?= isset($doacao) ? htmlspecialchars($doacao['validade']) : '' ?>"><br><br>

    <button type="submit">Salvar</button>
</form>

<a href="/controle_doacoes/controller/AuthController.php?action=logout">Sair</a>
<?php
    $paginaAnterior = $_SERVER['HTTP_REFERER'] ?? '/controle_doacoes/public/index.php';
?>
<a href="<?= htmlspecialchars($paginaAnterior) ?>">Voltar</a>
<a href="index.php?route=dashboard">Voltar ao Menu Principal</a>

<?php include __DIR__ . "/partials/footer.php"; ?>