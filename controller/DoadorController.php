<?php
require_once __DIR__."/../model/Doador.php";
session_start();
if (!isset($_SESSION['admin'])) header('Location: index.php');

class DoadorController {
    public static function index() {
        $doadores = Doador::all();
        include __DIR__."/../view/doadores.php";
    }
    public static function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Doador::create($_POST);
            header('Location: index.php?route=doadores');
            exit;
        }
        include __DIR__."/../view/doador_form.php";
    }
}