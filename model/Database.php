<?php
class Database {
    private static $host = 'localhost';
    private static $db   = 'doacoes';
    private static $user = 'root';
    private static $pass = '';
    private static $charset = 'utf8mb4';

    private static $pdo = null;

    public static function getConnection() {
        if (self::$pdo === null) {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=" . self::$charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Mostra erros
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna arrays associativos
                PDO::ATTR_EMULATE_PREPARES   => false,                  // Desativa prepared statements emulado
            ];
            try {
                self::$pdo = new PDO($dsn, self::$user, self::$pass, $options);
            } catch (PDOException $e) {
                die('Erro ao conectar ao banco: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}