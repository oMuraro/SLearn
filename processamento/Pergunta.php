<?php
session_start();
require_once('../Controler/pergunta.php'); // Corrigir o caminho do controlador

$controlador = new Controlador();

if (!empty($_POST['Pergunta']) && !empty($_POST['Certa']) && !empty($_POST['Errada1']) && !empty($_POST['Errada2']) && !empty($_POST['Errada3'])) {
    $Pergunta = $_POST['Pergunta'];
    $Certa = $_POST['Certa'];
    $Errada1 = $_POST['Errada1'];
    $Errada2 = $_POST['Errada2'];
    $Errada3 = $_POST['Errada3'];

    $controlador->cadastrarPergunta($Pergunta, $Certa, $Errada1, $Errada2, $Errada3);

    header('Location: ../view/Pontuacao.html');
    exit();

} else {
    echo "Por favor, preencha todos os campos.";
}


