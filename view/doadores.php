<?php include __DIR__ . "/partials/header.php"; ?>
<h2>Lista de Doadores</h2>
<a href="index.php?route=doadores&action=create">Novo Doador</a>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($doadores as $doador) : ?>
    <tr>
        <td><?= htmlspecialchars($doador['id_doador']) ?></td>
        <td><?= htmlspecialchars($doador['nome']) ?></td>
        <td><?= htmlspecialchars($doador['email']) ?></td>
        <td><?= htmlspecialchars($doador['telefone']) ?></td>
        <td><?= htmlspecialchars($doador['endereco']) ?></td>
        <td>
            <a href="index.php?route=doadores&action=edit&id=<?= $doador['id_doador'] ?>">Editar</a> | 
            <a href="index.php?route=doadores&action=delete&id=<?= $doador['id_doador'] ?>" onclick="return confirm('Deseja realmente excluir?');">Excluir</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div>
    <a href="/controle_doacoes/controller/AuthController.php?action=logout">Sair</a>
    <?php
        $paginaAnterior = $_SERVER['HTTP_REFERER'] ?? '/controle_doacoes/public/index.php';
    ?>
    <a href="<?= htmlspecialchars($paginaAnterior) ?>">Voltar</a>
</div>
<?php include __DIR__ . "/partials/footer.php"; ?>