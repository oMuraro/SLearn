<?php
session_start();
require_once('../Controler/usuario.php'); // Corrigir o caminho do controlador

$controlador = new Controlador();

if (!empty($_POST['login']) && !empty($_POST['senha'])) {
    $usuario = $_POST['login'];
    $senhaUsu = $_POST['senha'];

    $controlador->loginUsuario($usuario, $senhaUsu);
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
