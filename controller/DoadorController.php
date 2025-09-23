<?php
require_once __DIR__ . "/../model/Doador.php";

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
            $_SESSION['success'] = "Doador cadastrado com sucesso!";
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
            $_SESSION['success'] = "Doador atualizado com sucesso!";
            header("Location: index.php?route=doadores");
            exit;
        }

        include __DIR__ . "/../view/doador_form.php";
    }

    public static function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $result = Doador::delete($id); // Método já trata se houver doações
            if ($result !== true) {
                $_SESSION['error'] = $result;
            } else {
                $_SESSION['success'] = "Doador excluído com sucesso!";
            }
        }
        header("Location: index.php?route=doadores");
        exit;
    }
}