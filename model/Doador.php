<?php
require_once __DIR__ . "/Database.php";

class Doador {

    public static function all() {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM doador ORDER BY id_doador ASC");
        return $stmt->fetchAll();
    }

    public static function find($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM doador WHERE id_doador=:id");
        $stmt->execute(['id' => (int)$id]);
        return $stmt->fetch();
    }

    public static function create($data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            INSERT INTO doador (nome, email, telefone)
            VALUES (:nome, :email, :telefone)
        ");
        $stmt->execute([
            'nome'    => htmlspecialchars($data['nome']),
            'email'   => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
            'telefone'=> htmlspecialchars($data['telefone'])
        ]);
    }

    public static function update($id, $data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            UPDATE doador 
            SET nome=:nome, email=:email, telefone=:telefone
            WHERE id_doador=:id
        ");
        $stmt->execute([
            'nome'     => htmlspecialchars($data['nome']),
            'email'    => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
            'telefone' => htmlspecialchars($data['telefone']),
            'id'       => (int)$id
        ]);
    }

    public static function delete($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM doador WHERE id_doador=:id");
        $stmt->execute(['id' => (int)$id]);
    }
}