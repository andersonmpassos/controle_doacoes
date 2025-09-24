<?php
require_once __DIR__ . "/../helpers/Permissao.php";
require_once __DIR__ . "/../model/Admin.php";

class UsuarioController {

    public static function index() {
        Permissao::require('usuario:view');
        $usuarios = Admin::all(); // lista todos os usuários (admins)
        include __DIR__ . "/../view/usuarios.php";
    }

    public static function create() {
        Permissao::require('usuario:create');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Admin::create($_POST);
            $_SESSION['success'] = "Usuário criado com sucesso!";
            header("Location: index.php?route=usuarios");
            exit;
        }
        include __DIR__ . "/../view/usuario_form.php";
    }

    public static function edit() {
        Permissao::require('usuario:edit');
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php?route=usuarios");
            exit;
        }
        $usuario = Admin::find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Admin::update($id, $_POST);
            $_SESSION['success'] = "Usuário atualizado com sucesso!";
            header("Location: index.php?route=usuarios");
            exit;
        }
        include __DIR__ . "/../view/usuario_form.php";
    }

    public static function delete() {
        Permissao::require('usuario:delete');
        $id = $_GET['id'] ?? null;
        if ($id) {
            Admin::delete($id);
            $_SESSION['success'] = "Usuário excluído com sucesso!";
        }
        header("Location: index.php?route=usuarios");
        exit;
    }
}