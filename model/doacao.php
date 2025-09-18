<?php
require_once "Conexao.php";

class Doacao {
    public static function all() {
        $conn = Conexao::getConexao();
        $sql = "SELECT d.id_doacao, d.item, d.data_doacao, d.quantidade, d.validade, 
                       doador.nome AS nome_doador, campanha.titulo AS titulo_campanha
                FROM doacao d 
                LEFT JOIN doador ON d.id_doador = doador.id_doador
                LEFT JOIN campanha ON d.id_campanha = campanha.id_campanha
                ORDER BY d.id_doacao DESC";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM doacao WHERE id_doacao = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($dados) {
        $conn = Conexao::getConexao();
        $sql = "INSERT INTO doacao (item, id_doador, id_campanha, data_doacao, quantidade, validade) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siisis", $dados['item'], $dados['id_doador'], $dados['id_campanha'], $dados['data_doacao'], $dados['quantidade'], $dados['validade']);
        return $stmt->execute();
    }

    public static function update($id, $dados) {
        $conn = Conexao::getConexao();
        $sql = "UPDATE doacao SET item = ?, id_doador = ?, id_campanha = ?, data_doacao = ?, quantidade = ?, validade = ? WHERE id_doacao = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siisisi", $dados['item'], $dados['id_doador'], $dados['id_campanha'], $dados['data_doacao'], $dados['quantidade'], $dados['validade'], $id);
        return $stmt->execute();
    }

    public static function delete($id) {
        $conn = Conexao::getConexao();
        $sql = "DELETE FROM doacao WHERE id_doacao = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}