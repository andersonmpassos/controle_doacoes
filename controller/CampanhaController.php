<?php
require_once __DIR__ . "/../helpers/Permissao.php";
require_once __DIR__ . "/../model/Campanha.php";

class CampanhaController {
    public static function index() {
        Permissao::require('campanha:view');
        $campanhas = Campanha::all();
        include __DIR__ . "/../view/campanhas.php";
    }

    public static function create() {
        Permissao::require('campanha:create');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Campanha::create($_POST);
            $_SESSION['success'] = "Campanha cadastrada com sucesso!";
            header("Location: index.php?route=campanhas");
            exit;
        }
        include __DIR__ . "/../view/campanha_form.php";
    }

    public static function edit() {
        Permissao::require('campanha:edit');
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?route=campanhas");
            exit;
        }

        $campanha = Campanha::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Campanha::update($id, $_POST);
            $_SESSION['success'] = "Campanha atualizada com sucesso!";
            header("Location: index.php?route=campanhas");
            exit;
        }

        include __DIR__ . "/../view/campanha_form.php";
    }

    public static function delete() {
        Permissao::require('campanha:delete');
        $id = $_GET['id'] ?? null;
        if ($id) {
            Campanha::delete($id);
            $_SESSION['success'] = "Campanha excluída com sucesso!";
        }
        header("Location: index.php?route=campanhas");
        exit;
    }
}
?>