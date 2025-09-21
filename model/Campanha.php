<?php 
require_once "Conexao.php";

class Campanha {
    public static function all() {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM campanha ORDER BY id_campanha DESC";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM campanha WHERE id_campanha = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($dados) {
        $conn = Conexao::getConexao();
        $sql = "INSERT INTO campanha (titulo, descricao) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $dados['titulo'], $dados['descricao']);
        return $stmt->execute();
    }

    public static function update($id, $dados) {
        $conn = Conexao::getConexao();
        $sql = "UPDATE campanha SET titulo = ?, descricao = ? WHERE id_campanha = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $dados['titulo'], $dados['descricao'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        $conn = Conexao::getConexao();
        $sql = "DELETE FROM campanha WHERE id_campanha = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}