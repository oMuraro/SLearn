<?php
// /controllers/QuizController.php

class QuizController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function showPerguntaAleatoria() {
        $Pergunta = $this->model->getPerguntaAleatoria();
    }
}
