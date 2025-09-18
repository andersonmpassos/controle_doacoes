<?php
require_once "Conexao.php";

class Campanha {
    public static function all() {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM campanha ORDER BY id_campanha DESC";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}