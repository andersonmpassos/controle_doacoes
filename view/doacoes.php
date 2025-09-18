<?php include __DIR__ . "/partials/header.php"; ?>

<h2>Lista de Doações</h2>
<a href="index.php?route=doacoes&action=create">Nova Doação</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Data</th>
        <th>Doador</th>
        <th>Campanha</th>
        <th>Quantidade</th>
        <th>Validade</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($doacoes as $doacao) : ?>
    <tr>
        <td><?= htmlspecialchars($doacao['id_doacao']) ?></td>
        <td><?= htmlspecialchars($doacao['data_doacao']) ?></td>
        <td><?= htmlspecialchars($doacao['nome_doador']) ?></td>
        <td><?= htmlspecialchars($doacao['titulo_campanha']) ?></td>
        <td><?= htmlspecialchars($doacao['quantidade']) ?></td>
        <td><?= htmlspecialchars($doacao['validade']) ?></td>
        <td>
            <a href="index.php?route=doacoes&action=edit&id=<?= $doacao['id_doacao'] ?>">Editar</a> | 
            <a href="index.php?route=doacoes&action=delete&id=<?= $doacao['id_doacao'] ?>" onclick="return confirm('Deseja realmente excluir?');">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="/controle_doacoes/controller/AuthController.php?action=logout">Sair</a>
<?php
    $paginaAnterior = $_SERVER['HTTP_REFERER'] ?? '/controle_doacoes/public/index.php';
?>
<a href="<?= htmlspecialchars($paginaAnterior) ?>">Voltar</a>
<a href="index.php?route=dashboard">Voltar ao Menu Principal</a>

<?php include __DIR__ . "/partials/footer.php"; ?>