<?php
require_once "Conexao.php";

class Admin {
    public static function findByEmail($email) {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM administrador WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>