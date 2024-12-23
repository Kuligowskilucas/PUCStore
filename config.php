<?php 

define('BASE_DIR', __DIR__);
define('UPDATES_DIR', BASE_DIR . '/updates/');
define('BASE_URL', 'http://localhost/PUCStore');
define('UPDATES_URL', BASE_URL . '/updates/');

function verificaLoginAdmin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
        header("Location: http://localhost/PUCStore/index.php?page=painel/loginPainel");
        exit;
    } 
}

function verificaLoginUsuario() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_email'])) {
        return false;
    } else {
        return [
            'id' => $_SESSION['user_id'],
            'email' => $_SESSION['user_email']
        ];
    }
}