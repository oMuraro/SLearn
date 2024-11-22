<?php
session_start();
require_once('../Controler/usuario.php'); // Corrigir o caminho do controlador

$controlador = new Controlador();

if (!empty($_POST['nome']) && !empty($_POST['senha']) && !empty($_POST['senha2'])) {
    if ($_POST['senha'] === $_POST['senha2']) {
        $usuario = $_POST['nome'];
        $senhaUsu = $_POST['senha'];

        $controlador->cadastrarUsuario($usuario, $senhaUsu);

        header('Location: ../index.php');
        exit();
    } else {
        $_SESSION['msgCad'] = "As senhas não coincidem!";
        header("Location: ../cadastro.php");
        die();
    }
} else {
    $_SESSION['msgCad'] = "Preencha todos os campos!";
    header("Location: ../cadastro.php");
        die();
}


