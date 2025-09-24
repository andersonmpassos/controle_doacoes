<?php
require_once __DIR__ . "/../helpers/Permissao.php";
require_once __DIR__ . "/../model/Doacao.php";
require_once __DIR__ . "/../model/Doador.php";
require_once __DIR__ . "/../model/Campanha.php";

class DoacaoController {

    public static function index() {
        Permissao::require('doacao:view');
        $doacoes = Doacao::all();
        include __DIR__ . "/../view/doacoes.php";
    }

    public static function create() {
        Permissao::require('doacao:create');
        $doadores = Doador::all();
        $campanhas = Campanha::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Doacao::create($_POST);
            $_SESSION['success'] = "Doação cadastrada com sucesso!";
            header("Location: index.php?route=doacoes");
            exit;
        }

        include __DIR__ . "/../view/doacao_form.php";
    }

    public static function edit() {
        Permissao::require('doacao:edit');
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?route=doacoes");
            exit;
        }

        $doacao = Doacao::find($id);
        $doadores = Doador::all();
        $campanhas = Campanha::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Doacao::update($id, $_POST);
            $_SESSION['success'] = "Doação atualizada com sucesso!";
            header("Location: index.php?route=doacoes");
            exit;
        }

        include __DIR__ . "/../view/doacao_form.php";
    }

    public static function delete() {
        Permissao::require('doacao:delete');
        $id = $_GET['id'] ?? null;
        if ($id) {
            Doacao::delete($id);
            $_SESSION['success'] = "Doação excluída com sucesso!";
        }
        header("Location: index.php?route=doacoes");
        exit;
    }
}
?>