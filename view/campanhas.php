<?php include __DIR__ . "/partials/header.php"; ?>

<h2>Lista de Campanhas</h2>
<a href="index.php?route=campanhas&action=create">Nova Campanha</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($campanhas as $campanha) : ?>
    <tr>
        <td><?= htmlspecialchars($campanha['id_campanha']) ?></td>
        <td><?= htmlspecialchars($campanha['titulo']) ?></td>
        <td><?= htmlspecialchars($campanha['descricao']) ?></td>
        <td>
            <a href="index.php?route=campanhas&action=edit&id=<?= $campanha['id_campanha'] ?>">Editar</a> | 
            <a href="index.php?route=campanhas&action=delete&id=<?= $campanha['id_campanha'] ?>" onclick="return confirm('Deseja realmente excluir?');">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div>
    <a href="/controle_doacoes/controller/AuthController.php?action=logout">Sair</a>
    <a href="index.php?route=dashboard">Voltar ao Menu Principal</a>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>