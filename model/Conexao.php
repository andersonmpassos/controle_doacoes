<?php
class Conexao {
    public static function getConexao() {
        return new mysqli('localhost', 'root', '', 'doacoes');
    }
}
?>