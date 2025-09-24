<?php
include __DIR__ . "/partials/header.php";

require_once __DIR__ . '/../helpers/Permissao.php';

// Obtém o papel atual do usuário via helper Permissao
$tipo = Permissao::currentRole();
?>

<div class="container mt-5">

    <!-- Mensagens de sucesso ou erro -->
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Doadores</h2>

        <?php if($tipo === 'administrador' || $tipo === 'funcionario'): ?>
            <a href="index.php?route=doadores&action=create" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Novo Doador
            </a>
        <?php endif; ?>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <?php if($tipo !== 'doador'): ?>
                                <th class="text-center">Ações</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($doadores)): ?>
                            <?php foreach ($doadores as $doador): ?>
                                <tr>
                                    <td><?= htmlspecialchars($doador['nome']) ?></td>
                                    <td><?= htmlspecialchars($doador['email']) ?></td>
                                    <td><?= htmlspecialchars($doador['telefone']) ?></td>
                                    <?php if($tipo === 'administrador'): ?>
                                        <td class="text-center">
                                            <a href="index.php?route=doadores&action=edit&id=<?= $doador['id_doador'] ?>" 
                                               class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i> Editar
                                            </a>
                                            <?php if($tipo === 'administrador'): ?>
                                                <a href="index.php?route=doadores&action=delete&id=<?= $doador['id_doador'] ?>" 
                                                   class="btn btn-sm btn-danger"
                                                   onclick="return confirm('Deseja realmente excluir este doador?');">
                                                    <i class="bi bi-trash"></i> Excluir
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?= $tipo === 'doador' ? '3' : '4' ?>" class="text-center">Nenhum doador cadastrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "/partials/footer.php"; ?>