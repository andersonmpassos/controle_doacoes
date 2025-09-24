<?php
require_once __DIR__ . "/../helpers/Permissao.php";
require_once __DIR__ . "/../model/Doador.php";

class DoadorController {

    public static function index() {
        Permissao::require('doador:view');
        $doadores = Doador::all();
        include __DIR__ . "/../view/doadores.php";
    }

    public static function create() {
        Permissao::require('doador:create');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Doador::create($_POST);
            $_SESSION['success'] = "Doador cadastrado com sucesso!";
            header("Location: index.php?route=doadores");
            exit;
        }
        include __DIR__ . "/../view/doador_form.php";
    }

    public static function edit() {
        Permissao::require('doador:edit');
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
        Permissao::require('doador:delete');
        $id = $_GET['id'] ?? null;
        if ($id) {
            $result = Doador::delete($id);
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
?>