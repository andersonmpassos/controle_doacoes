<?php
require_once "Conexao.php";

class Doador {
    public static function all() {
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM doador";
        return $conn->query($sql);
    }
    public static function create($dados) {
        $conn = Conexao::getConexao();
        $sql = "INSERT INTO doador (nome,email,telefone,endereco) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $dados['nome'], $dados['email'], $dados['telefone'],$dados['endereco']);
        $stmt->execute();
    }
}