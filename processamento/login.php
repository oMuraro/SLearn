<?php
session_start();
require_once('../Controler/usuario.php'); // Corrigir o caminho do controlador

$controlador = new Controlador();

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'slearn';
$conn = new mysqli($host, $user, $pass, $db);

if (!empty($_POST['login']) && !empty($_POST['senha'])) {
    $usuario = $_POST['login'];
    $senhaUsu = $_POST['senha'];

    $result = $conn->query("SELECT * FROM usuarios WHERE login='$usuario'");
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];

    $controlador->loginUsuario($usuario, $senhaUsu);
} else {
    echo "Por favor, preencha todos os campos.";
}
?>