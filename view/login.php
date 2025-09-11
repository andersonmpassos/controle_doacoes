<!DOCTYPE html>
<html>
<head>
    <title>Login ADM</title>
</head>
<body>
    <h2>Login do Administrador</h2>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="POST">
        <input type="email" name="email" required placeholder="Email"><br>
        <input type="password" name="senha" required placeholder="Senha"><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>