<?php
require_once __DIR__ . "/Database.php";

class Doacao {

    private static $table = 'doacao'; // <-- Corrigido para singular

    public static function all() {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("
            SELECT d.*, do.nome AS nome_doador, c.titulo AS titulo_campanha
            FROM " . self::$table . " d
            JOIN doador do ON d.id_doador = do.id_doador
            JOIN campanha c ON d.id_campanha = c.id_campanha
            ORDER BY d.id_doacao ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM " . self::$table . " WHERE id_doacao = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            INSERT INTO " . self::$table . " 
            (nomeItem, id_doador, id_campanha, data_doacao, quantidade, validade)
            VALUES (:nomeItem, :id_doador, :id_campanha, :data_doacao, :quantidade, :validade)
        ");
        $stmt->execute([
            'nomeItem'    => htmlspecialchars($data['nomeItem']),
            'id_doador'   => (int)$data['id_doador'],
            'id_campanha' => (int)$data['id_campanha'],
            'data_doacao' => $data['data_doacao'],
            'quantidade'  => (int)$data['quantidade'],
            'validade'    => $data['validade'] ?: null
        ]);
    }

    public static function update($id, $data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            UPDATE " . self::$table . " 
            SET nomeItem=:nomeItem, id_doador=:id_doador, id_campanha=:id_campanha,
                data_doacao=:data_doacao, quantidade=:quantidade, validade=:validade
            WHERE id_doacao=:id
        ");
        $stmt->execute([
            'nomeItem'    => htmlspecialchars($data['nomeItem']),
            'id_doador'   => (int)$data['id_doador'],
            'id_campanha' => (int)$data['id_campanha'],
            'data_doacao' => $data['data_doacao'],
            'quantidade'  => (int)$data['quantidade'],
            'validade'    => $data['validade'] ?: null,
            'id'          => (int)$id
        ]);
    }

    public static function delete($id) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM " . self::$table . " WHERE id_doacao = :id");
        $stmt->execute(['id' => (int)$id]);
    }
}