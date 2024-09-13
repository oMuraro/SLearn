<?php
class Banco {
    private $host;
    private $login;
    private $senha;
    private $bancoDados;

    public function __construct($host, $login, $senha, $bancoDados) {
        $this->host = $host;
        $this->login = $login;
        $this->senha = $senha;
        $this->bancoDados = $bancoDados;
    }

    public function conectBD() {
        $conect = mysqli_connect($this->host, $this->login, $this->senha, $this->bancoDados);
        if (!$conect) {
            die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
        }
        return $conect;
    }

    public function cadastro($usuario, $senhaUsu) {
        $conect = $this->conectBD();
        $cadastro = "INSERT INTO `usuarios` (`login`, `senha`) VALUES ('$usuario', '$senhaUsu')";
        if (!mysqli_query($conect, $cadastro)) {
            die("Erro ao cadastrar usuário: " . mysqli_error($conect));
        }
    }
    public function cadastrarPergunta($Pergunta, $Certa, $Errada1, $Errada2, $Errada3) {
        $conect = $this->conectBD();
        $perguntanova = "INSERT INTO `perguntas` (`Pergunta`, `Certa`, `Errada1`, `Errada2`, `Errada3`) VALUES ('$Pergunta', '$Certa', '$Errada1', '$Errada2', '$Errada3')";
        if (!mysqli_query($conect, $perguntanova)) {
            die("Erro ao cadastrar usuário: " . mysqli_error($conect));
        }
    }

    public function buscarUsuario($usuario) {
        $conect = $this->conectBD();
        $usuario = mysqli_real_escape_string($conect, $usuario);
        $consulta = "SELECT `senha` FROM `usuarios` WHERE `login` = '$usuario'";
        $resultado = mysqli_query($conect, $consulta);
        
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return null;
        }
    }
    
    public function getPerguntaAleatoria() {
        $conect = $this->conectBD();
        $perguntaRNG = 'SELECT * FROM Perguntas ORDER BY RAND()LIMIT 1;';
        $resultado = mysqli_query($conect, $perguntaRNG);
        if ($resultado) {
            return mysqli_fetch_assoc($resultado);
        } else {
            return "cu";
        }
    }
}
?>
