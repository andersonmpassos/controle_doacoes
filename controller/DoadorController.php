<?php
require_once __DIR__ . "/../model/Doacao.php";
require_once __DIR__ . "/../model/Doador.php";
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /controle_doacoes/public/index.php');
    exit;
}

class DoacaoController {
    public static function index() {
        $doacoes = Doacao::all();
        include __DIR__ . "/../view/doacoes.php";
    }

    public static function create() {
        $doadores = Doador::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Doacao::create($_POST);
            header("Location: index.php?route=doacoes");
            exit;
        }

        include __DIR__ . "/../view/doacao_form.php";
    }

    public static function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?route=doacoes");
            exit;
        }

        $doacao = Doacao::find($id);
        $doadores = Doador::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Doacao::update($id, $_POST);
            header("Location: index.php?route=doacoes");
            exit;
        }

        include __DIR__ . "/../view/doacao_form.php";
    }

    public static function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            Doacao::delete($id);
        }
        header("Location: index.php?route=doacoes");
        exit;
    }
}

// Roteamento básico para método via action
$action = $_GET['action'] ?? 'index';
switch ($action) {
    case 'create':
        DoacaoController::create();
        break;
    case 'edit':
        DoacaoController::edit();
        break;
    case 'delete':
        DoacaoController::delete();
        break;
    case 'index':
    default:
        DoacaoController::index();
        break;
}