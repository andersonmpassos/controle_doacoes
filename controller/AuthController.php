<?php
require_once __DIR__ . "/../model/Database.php";

session_start();

class AuthController {

    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE usuario=:usuario LIMIT 1");
            $stmt->execute(['usuario' => $usuario]);
            $admin = $stmt->fetch();

            if ($admin && password_verify($senha, $admin['senha'])) {
                $_SESSION['admin'] = $admin['id'];
                header("Location: index.php?route=dashboard");
                exit;
            } else {
                $erro = "Usuário ou senha inválidos!";
            }
        }

        include __DIR__ . "/../view/login.php";
    }

    public static function logout() {
        session_destroy();
        header("Location: index.php?route=login");
        exit;
    }
}