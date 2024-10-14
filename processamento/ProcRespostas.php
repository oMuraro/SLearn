<?php
session_start();
require_once('../Controler/Respostas.php'); // Corrigir o caminho do controlador

$controlador = new Controlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultados = $controlador->verificarRespostas($_POST);

    // Armazena o resultado na sessão para exibir depois
    $_SESSION['resultados_quiz'] = $resultados;

    // Redireciona para uma página de resultados (pode ser uma nova página que você criar)
    header('Location: ../view/quizView.php');
    exit();
} else {
    echo "Método de requisição inválido.";
}
