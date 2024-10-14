<?php
require_once '../model/Banco.php'; // Inclua o arquivo do modelo

class Controlador {
    private $bancoDeDados;

    public function __construct() {
        $this->bancoDeDados = new Banco("localhost", "root", "", "Slearn");
    }

    public function verificarRespostas($respostas) {
        $resultadoFinal = [];

        // Itera por todas as perguntas enviadas no formulário
        foreach ($respostas as $nome => $respostaUsuario) {
            if (strpos($nome, 'pergunta') === 0) {
                $idPergunta = intval($respostaUsuario);
                $respostaSelecionada = $_POST[$idPergunta];

                // Busca a resposta certa no banco de dados
                $respostaCerta = $this->bancoDeDados->buscarRespostaCerta($idPergunta);

                // Verifica se a resposta do usuário está correta
                if ($respostaSelecionada === "Certa") {
                    $resultadoFinal[$idPergunta] = "Certa";
                } else {
                    $resultadoFinal[$idPergunta] = "Errada";
                }
            }
        }

        return $resultadoFinal;
    }
}
