<?php
require_once __DIR__ . "/Database.php";

class Campanha {

    public static function all() {
        $pdo = Database::getConnection();
        return $pdo->query("SELECT * FROM campanha ORDER BY id_campanha ASC")->fetchAll();
    }

    public static function find($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM campanha WHERE id_campanha=:id");
        $stmt->execute(['id' => (int)$id]);
        return $stmt->fetch();
    }

    public static function create($data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            INSERT INTO campanha (titulo, descricao)
            VALUES (:titulo, :descricao)
        ");
        $stmt->execute([
            'titulo'    => htmlspecialchars($data['titulo']),
            'descricao' => htmlspecialchars($data['descricao'])
        ]);
    }

    public static function update($id, $data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            UPDATE campanha
            SET titulo=:titulo, descricao=:descricao
            WHERE id_campanha=:id
        ");
        $stmt->execute([
            'titulo'    => htmlspecialchars($data['titulo']),
            'descricao' => htmlspecialchars($data['descricao']),
            'id'        => (int)$id
        ]);
    }

    public static function delete($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM campanha WHERE id_campanha=:id");
        $stmt->execute(['id' => (int)$id]);
    }
}