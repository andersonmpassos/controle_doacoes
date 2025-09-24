<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Permissao
{
    public static function currentRole(): string
    {
        return $_SESSION['nivel'] ?? 'visitante';
    }

    private static function permissionMap(): array
    {
        return [
            // Campanhas: todos podem visualizar, só admin e funcionário podem criar/editar/excluir
            'campanha:create' => ['administrador', 'funcionario'],
            'campanha:edit'   => ['administrador'],
            'campanha:delete' => ['administrador'],
            'campanha:view'   => ['administrador', 'funcionario', 'doador'],

            // Doadores: cadastrar e visualizar por admin e funcionario, editar/excluir só admin
            'doador:create'   => ['administrador', 'funcionario'],
            'doador:edit'     => ['administrador'],
            'doador:delete'   => ['administrador'],
            'doador:view'     => ['administrador', 'funcionario', 'doador'],

            // Doações: cadastrar por admin e funcionario, editar/excluir só admin, visualizar para todos
            'doacao:create'   => ['administrador', 'funcionario'],
            'doacao:edit'     => ['administrador'],
            'doacao:delete'   => ['administrador'],
            'doacao:view'     => ['administrador', 'funcionario', 'doador', 'visitante'],

            // Dashboard: exibir apenas para admin e funcionario
            'dashboard:view'  => ['administrador', 'funcionario'],

            //usuario: exibir apenas para admin
            'usuario:view'   => ['administrador'],
            'usuario:create' => ['administrador'],
            'usuario:edit'   => ['administrador'],
            'usuario:delete' => ['administrador'],
        ];
    }

    public static function can(string $permission): bool
    {
        $map = self::permissionMap();
        if (!isset($map[$permission])) {
            return false; // negar por segurança
        }
        $role = self::currentRole();
        return in_array($role, $map[$permission], true);
    }

    public static function require(string $permission, string $redirectLogin = 'index.php?route=login')
    {
        if (self::can($permission)) {
            return; // Permissão concedida
        }

        $role = self::currentRole();

        if ($role === 'visitante') {
            header('Location: ' . $redirectLogin . '&timeout=1');
            exit;
        }

        $_SESSION['error'] = "Acesso negado: você não tem permissão para essa ação.";

        // Redirecionar conforme papel para rotas compatíveis, evitando redirecionamentos em loop
        switch ($role) {
            case 'doador':
                header('Location: index.php?route=doacoes');
                break;
            case 'funcionario':
            case 'administrador':
                header('Location: index.php?route=dashboard');
                break;
            default:
                // Caso inesperado, faz logout para segurança
                header('Location: index.php?route=logout');
                break;
        }
        exit;
    }

    public static function allow(string $permission, callable $callback)
    {
        if (self::can($permission)) {
            $callback();
        }
    }
}