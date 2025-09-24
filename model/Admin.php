<?php
require_once __DIR__ . "/Database.php";

class Admin {

    // lista todos usuários
    public static function all() {
        $pdo = Database::getConnection();
        return $pdo->query("SELECT * FROM administrador")->fetchAll();
    }

    // busca usuário pelo id
    public static function find($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM administrador WHERE id_admin = :id");
        $stmt->execute(['id' => (int)$id]);
        return $stmt->fetch();
    }

    // cria novo usuário
    public static function create($data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO administrador (nome, email, senha, nivel) VALUES (:nome, :email, :senha, :nivel)");
        $hashSenha = password_hash($data['senha'], PASSWORD_DEFAULT);
        $stmt->execute([
            'nome'  => htmlspecialchars($data['nome']),
            'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
            'senha' => $hashSenha,
            'nivel' => $data['nivel']
        ]);
    }

    // atualiza usuário
    public static function update($id, $data) {
        $pdo = Database::getConnection();
        if (!empty($data['senha'])) {
            $hashSenha = password_hash($data['senha'], PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE administrador SET nome = :nome, email = :email, senha = :senha, nivel = :nivel WHERE id_admin = :id");
            $stmt->execute([
                'nome'  => htmlspecialchars($data['nome']),
                'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
                'senha' => $hashSenha,
                'nivel' => $data['nivel'],
                'id'    => (int)$id
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE administrador SET nome = :nome, email = :email, nivel = :nivel WHERE id_admin = :id");
            $stmt->execute([
                'nome'  => htmlspecialchars($data['nome']),
                'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
                'nivel' => $data['nivel'],
                'id'    => (int)$id
            ]);
        }
    }

    // deleta usuário
    public static function delete($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM administrador WHERE id_admin = :id");
        $stmt->execute(['id' => (int)$id]);
    }
    public static function findByEmail(string $email) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM administrador WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
}