<?php
require_once '../model/Banco.php'; // Inclua o arquivo do modelo

class Controlador {
    private $bancoDeDados;

    public function __construct() {
        $this->bancoDeDados = new Banco("localhost", "root", "", "Slearn");
    }

    public function BuscaPerguntas() {
        
        $sql = 'SELECT COUNT(*) as total FROM perguntas';
        $stmt = $pdo->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalPerguntas = $row['total'];

        $this->bancoDeDados->busca($totalPerguntas);
    }

    public function loginUsuario($usuario, $senhaUsu) {
        $usuario = mysqli_real_escape_string($this->bancoDeDados->conectBD(), $usuario);
        $senhaUsu = mysqli_real_escape_string($this->bancoDeDados->conectBD(), $senhaUsu);
    
        $result = $this->bancoDeDados->buscarUsuario($usuario);
    
        if ($result) {
            $senhaHash = $result['senha'];
    
            if (password_verify($senhaUsu, $senhaHash)) {
                $_SESSION['usuario'] = $usuario;
                header('Location: ../home.php');
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    }

    public function cadastrarPergunta($Pergunta, $Certa, $Errada1, $Errada2, $Errada3) {
        // Sanitize input to avoid SQL injection
        $Pergunta = mysqli_real_escape_string($this->bancoDeDados->conectBD(), $Pergunta);
        $Certa = mysqli_real_escape_string($this->bancoDeDados->conectBD(), $Certa);
        $Errada1 = mysqli_real_escape_string($this->bancoDeDados->conectBD(), $Errada1);
        $Errada2 = mysqli_real_escape_string($this->bancoDeDados->conectBD(), $Errada2);
        $Errada3 = mysqli_real_escape_string($this->bancoDeDados->conectBD(), $Errada3);

        $this->bancoDeDados->cadastrarPergunta($Pergunta, $Certa, $Errada1, $Errada2, $Errada3);
    }
}