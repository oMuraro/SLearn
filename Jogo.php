<?php
// index.php

require_once 'model/quizmodel.php';
require_once 'Controler/quizcontroller.php';
require_once 'view/quizView.php';

// Configurações do banco de dados
$host = 'localhost';     // Endereço do servidor MySQL
$login = 'root';   // Nome do usuário
$senha = '';     // Senha do usuário
$bancoDados = 'Slearn'; // Nome do banco de dados

// Inicializa o Model
$model = new QuizModel($host, $login, $senha, $bancoDados);

// Inicializa o Controller
$controller = new QuizController($model);

// Obtém a pergunta aleatória
$pergunta = $controller->showPerguntaAleatoria();

// Renderiza a View
renderQuizView($pergunta);
