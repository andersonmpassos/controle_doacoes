<?php include __DIR__ . "/partials/header.php"; ?>
<h2>Painel do Administrador</h2>
<ul>
    <li><a href="index.php?route=doadores">Gerenciar Doadores</a></li>
    <li><a href="index.php?route=doacoes">Gerenciar Doações</a></li>
    <li><a href="index.php?route=campanhas">Gerenciar Campanhas</a></li>
    <li><a href="controller/AuthController.php?action=logout">Sair</a></li>
</ul>
<?php include __DIR__ . "/partials/footer.php"; ?>