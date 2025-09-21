<?php
require_once "Conexao.php";

class Doador {
    public static function all() {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM doador ORDER BY id_doador DESC";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM doador WHERE id_doador = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($dados) {
        $conn = Conexao::getConexao();
        $sql = "INSERT INTO doador (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $dados['nome'], $dados['email'], $dados['telefone'], $dados['endereco']);
        return $stmt->execute();
    }

    public static function update($id, $dados) {
        $conn = Conexao::getConexao();
        $sql = "UPDATE doador SET nome = ?, email = ?, telefone = ?, endereco = ? WHERE id_doador = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $dados['nome'], $dados['email'], $dados['telefone'], $dados['endereco'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        $conn = Conexao::getConexao();
        $sql = "DELETE FROM doador WHERE id_doador = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}