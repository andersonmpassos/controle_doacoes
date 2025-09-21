<?php include __DIR__ . "/partials/header.php"; ?>

<h2><?= isset($doador) ? 'Editar' : 'Novo' ?> Doador</h2>

<form method="POST" action="">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required value="<?= isset($doador) ? htmlspecialchars($doador['nome']) : '' ?>"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required value="<?= isset($doador) ? htmlspecialchars($doador['email']) : '' ?>"><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" id="telefone" name="telefone" value="<?= isset($doador) ? htmlspecialchars($doador['telefone']) : '' ?>"><br>

    <label for="endereco">Endereço:</label><br>
    <input type="text" id="endereco" name="endereco" value="<?= isset($doador) ? htmlspecialchars($doador['endereco']) : '' ?>"><br><br>

    <button type="submit">Salvar</button>
</form>
<?php
    $paginaAnterior = $_SERVER['HTTP_REFERER'] ?? '/controle_doacoes/public/index.php';
?>
<a href="<?= htmlspecialchars($paginaAnterior) ?>">Voltar</a>
<a href="index.php?route=dashboard">Voltar ao Menu Principal</a>

<?php include __DIR__ . "/partials/footer.php"; ?>