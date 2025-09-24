<?php
require_once __DIR__ . "/../helpers/Permissao.php";

class AdminController {
    public static function dashboard() {
        Permissao::require('dashboard:view');
        include __DIR__ . "/../view/dashboard.php";
    }
}
?>