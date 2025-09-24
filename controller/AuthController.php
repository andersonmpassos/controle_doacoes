<?php
require_once __DIR__ . "/../model/Database.php";
require_once __DIR__ . "/../model/Admin.php";

class AuthController {

    public static function login() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Se já está logado, redireciona direto conforme o papel
        if (isset($_SESSION['nivel'])) {
            switch ($_SESSION['nivel']) {
                case 'administrador':
                case 'funcionario':
                case 'doador':
                    header("Location: index.php?route=dashboard");
                    exit;
                case 'doador':
                    header("Location: index.php?route=dashboard");
                    exit;
                default:
                    // Em caso de nível desconhecido, destrói sessão e volta pro login
                    session_unset();
                    session_destroy();
                    header("Location: index.php?route=login");
                    exit;
            }
        }

        $erro = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
            $senha = $_POST['senha'] ?? '';

            if (!$email) {
                $erro = "E-mail inválido.";
            } else {
                $admin = Admin::findByEmail($email);

                if ($admin && password_verify($senha, $admin['senha'])) {
                    // Grava os dados essenciais na sessão
                    $_SESSION['admin'] = $admin['id_admin'];
                    $_SESSION['admin_nome'] = $admin['nome'];
                    $_SESSION['nivel'] = $admin['nivel']; // ESSENCIAL
                    $_SESSION['ultimo_acesso'] = time();

                    // Redireciona conforme o nível do usuário
                    switch ($_SESSION['nivel']) {
                        case 'administrador':
                        case 'funcionario':
                            header("Location: index.php?route=dashboard");
                            exit;
                        case 'doador':
                            header("Location: index.php?route=dashboard");
                            exit;
                        default:
                            session_unset();
                            session_destroy();
                            header("Location: index.php?route=login");
                            exit;
                    }
                } else {
                    $erro = "Email ou senha inválidos!";
                }
            }
        }

        // Exibe o formulário de login, passando o erro se houver
        include __DIR__ . "/../view/login.php";
    }

    public static function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header("Location: index.php?route=login");
        exit;
    }
}