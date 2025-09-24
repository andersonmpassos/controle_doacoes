<?php
require_once __DIR__ . "/Database.php";

class Admin {
    public static function findByEmail($email) {
        $pdo = Database::getConnection();
        $sql = "SELECT * FROM administrador WHERE email = :email LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}