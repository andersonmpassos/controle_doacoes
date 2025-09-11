<?php include __DIR__ . "/partials/header.php"; ?>
<h2>Lista de Doadores</h2>
<a href="index.php?route=novo_doador">Novo Doador</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
    </tr>
    <?php foreach ($doadores as $doador) : ?>
    <tr>
        <td><?= htmlspecialchars($doador['id_doador']) ?></td>
        <td><?= htmlspecialchars($doador['nome']) ?></td>
        <td><?= htmlspecialchars($doador['email']) ?></td>
        <td><?= htmlspecialchars($doador['telefone']) ?></td>
        <td><?= htmlspecialchars($doador['endereco']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include __DIR__ . "/partials/footer.php"; ?>