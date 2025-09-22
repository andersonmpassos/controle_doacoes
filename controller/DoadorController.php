<?php
require_once __DIR__ . "/../model/Doador.php";
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /controle_doacoes/public/index.php');
    exit;
}

class DoadorController {
    public static function index() {
        $doadores = Doador::all();
        include __DIR__ . "/../view/doadores.php";
    }

    public static function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Doador::create($_POST);
            header("Location: index.php?route=doadores");
            exit;
        }
        include __DIR__ . "/../view/doador_form.php";
    }

    public static function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?route=doadores");
            exit;
        }

        $doador = Doador::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Doador::update($id, $_POST);
            header("Location: index.php?route=doadores");
            exit;
        }

        include __DIR__ . "/../view/doador_form.php";
    }

    public static function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            Doador::delete($id);
        }
        header("Location: index.php?route=doadores");
        exit;
    }
}