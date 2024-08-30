<?php
session_start();
require_once('../Controler/usuario.php'); // Corrigir o caminho do controlador

$controlador = new Controlador();

if (!empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['senha2'])) {
    if ($_POST['senha'] === $_POST['senha2']) {
        $usuario = $_POST['nome'];
        $senhaUsu = $_POST['senha'];

        $controlador->cadastrarUsuario($usuario, $senhaUsu);

        header('Location: ../index.html');
        exit();
    } else {
        echo "As senhas não coincidem.";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}


