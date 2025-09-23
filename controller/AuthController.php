<?php
require_once __DIR__ . "/../model/Database.php";

class AuthController {

    public static function login() {
        // Inicia a sessão apenas se ainda não estiver ativa
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Redireciona para dashboard se já estiver logado
        if (isset($_SESSION['admin'])) {
            header("Location: index.php?route=dashboard");
            exit;
        }

        $erro = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("SELECT * FROM administrador WHERE email=:email LIMIT 1");
            $stmt->execute(['email' => $email]);
            $admin = $stmt->fetch();

            if ($admin && password_verify($senha, $admin['senha'])) {
                $_SESSION['admin'] = $admin['id_admin'];
                $_SESSION['admin_nome'] = $admin['nome'];
                $_SESSION['last_activity'] = time(); // Marca o tempo da última atividade
                header("Location: index.php?route=dashboard");
                exit;
            } else {
                $erro = "Email ou senha inválidos!";
            }
        }

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