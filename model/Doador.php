<?php
require_once __DIR__ . "/Database.php";

class Doador {

    public static function all() {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM doador ORDER BY id_doador ASC");
        return $stmt->fetchAll();
    }

    public static function find($id) {
        $id = (int)$id;
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM doador WHERE id_doador=:id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public static function create($data) {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("
            INSERT INTO doador (nome, email, telefone)
            VALUES (:nome, :email, :telefone)
        ");
        $stmt->execute([
            'nome'     => htmlspecialchars($data['nome']),
            'email'    => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
            'telefone' => htmlspecialchars($data['telefone'])
        ]);
    }

    public static function update($id, $data) {
        $id = (int)$id;
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
            'id'       => $id
        ]);
    }

    public static function delete($id) {
    $id = (int)$id;
    $pdo = Database::getConnection();

        try {
            // Verifica se o doador possui doações
            $check = $pdo->prepare("SELECT COUNT(*) as total FROM doacao WHERE id_doador=:id");
            $check->execute(['id' => $id]);
            $total = $check->fetchColumn();

            if ($total > 0) {
                throw new Exception("Não é possível excluir este doador, ele possui $total doação(ões) cadastrada(s).");
            }

            // Se não houver doações, exclui o doador
            $del = $pdo->prepare("DELETE FROM doador WHERE id_doador=:id");
            $del->execute(['id' => $id]);

            return true;

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}