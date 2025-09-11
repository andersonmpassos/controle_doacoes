<?php include __DIR__ . "/partials/header.php"; ?>
<h2>Novo Doador</h2>
<form method="POST" action="index.php?route=novo_doador">
    <label for="nome">Nome:</label><br>
    <input type="text" name="nome" id="nome" required><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br>

    <label for="telefone">Telefone:</label><br>
    <input type="text" name="telefone" id="telefone"><br>

    <label for="endereco">Endereço:</label><br>
    <input type="text" name="endereco" id="endereco"><br>

    <button type="submit">Salvar</button>
</form>
<?php include __DIR__ . "/partials/footer.php"; ?>