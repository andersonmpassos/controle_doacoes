<?php
require_once __DIR__ . "/../model/Campanha.php";
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /controle_doacoes/public/index.php');
    exit;
}

class CampanhaController {
    public static function index() {
        $campanhas = Campanha::all();
        include __DIR__ . "/../view/campanhas.php";
    }

    public static function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Campanha::create($_POST);
            header("Location: index.php?route=campanhas");
            exit;
        }
        include __DIR__ . "/../view/campanha_form.php";
    }

    public static function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?route=campanhas");
            exit;
        }

        $campanhas = Campanha::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Campanha::update($id, $_POST);
            header("Location: index.php?route=campanhas");
            exit;
        }

        include __DIR__ . "/../view/campanha_form.php";
    }

    public static function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            Campanha::delete($id);
        }
        header("Location: index.php?route=campanhas");
        exit;
    }
}