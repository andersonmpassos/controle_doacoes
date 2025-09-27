<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--SO-->
    <meta name="description" content="Asilo de Mendigos de Pelotas">
    <meta name="keywords" content="Asilo, Mendigos, Geriatria, Doações, Projeto Social, Idosos">
    <!--Titulo-->
    <title>Asilo de Mendigos de Pelotas</title>
    <!--Chamando o bootstrap para Responsividade-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Chamano o arquivo CSS-->
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Painel de Doações</h2>

                        <!-- Aviso de sessão expirada -->
                        <?php if (isset($_GET['timeout'])): ?>
                            <div class="alert alert-warning text-center py-2">
                                Sua sessão expirou por inatividade. Faça login novamente.
                            </div>
                        <?php endif; ?>

                        <!-- Erro de login -->
                        <?php if (!empty($erro)) : ?>
                            <div class="alert alert-danger text-center py-2">
                                <?= htmlspecialchars($erro) ?>
                            </div>
                        <?php endif; ?>


                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" id="senha" class="form-control" placeholder="Digite sua senha" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>