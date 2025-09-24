<?php
include __DIR__ . "/partials/header.php";

require_once __DIR__ . '/../helpers/Permissao.php';
$tipo = Permissao::currentRole();

$id = $usuario['id_admin'] ?? null;
$nome = $usuario['nome'] ?? '';
$email = $usuario['email'] ?? '';
$nivel = $usuario['nivel'] ?? '';

$action = $id ? 'edit&id=' . $id : 'create';
?>

<div class="container my-5">
    <h2 class="mb-4"><?= $id ? "Editar Usuário" : "Novo Usuário" ?></h2>

    <form method="POST" action="index.php?route=usuarios&action=<?= $action ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" required value="<?= htmlspecialchars($nome) ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" required value="<?= htmlspecialchars($email) ?>">
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha <?= $id ? '(Deixe vazio para manter)' : '' ?></label>
            <input type="password" class="form-control" name="senha" id="senha" <?= $id ? '' : 'required' ?>>
        </div>

        <div class="mb-3">
            <label for="nivel" class="form-label">Nível</label>
            <select class="form-select" name="nivel" id="nivel" required>
                <option value="">Selecione o nível</option>
                <option value="administrador" <?= $nivel === "administrador" ? "selected" : "" ?>>Administrador</option>
                <option value="funcionario" <?= $nivel === "funcionario" ? "selected" : "" ?>>Funcionário</option>
                <option value="doador" <?= $nivel === "doador" ? "selected" : "" ?>>Doador</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><?= $id ? "Salvar Alterações" : "Cadastrar" ?></button>
        <a href="index.php?route=usuarios" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>