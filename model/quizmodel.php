<?php
// /models/QuizModel.php

require_once 'Banco.php';  // Inclua o arquivo Banco.php

class QuizModel {
    private $banco;

    public function __construct($host, $login, $senha, $bancoDados) {
        $this->banco = new Banco($host, $login, $senha, $bancoDados);
    }


    public function getPerguntaAleatoria() {
        return $this->banco->getPerguntaAleatoria();
    }
}
