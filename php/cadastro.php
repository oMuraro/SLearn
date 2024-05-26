<?php 
$conecta = new mysqli("localhost", "root", "", "slearn");

if(isset($_POST["nome"]) && isset($_POST["senha"])&& isset($_POST["senha2"])){
    $nome = $_POST["nome"];
    $senha = $_POST["senha"];
    $confirmar = $_POST["senha2"];
    if($senha == $confirmar){
        $cadastro = "INSERT INTO `usuarios`(`login`, `senha`) VALUES ('$nome','$senha')";
        if($conecta->query($cadastro) === TRUE){
            header("location:../login.html");
        }
    }else{
        header("location:../");
    }
}else{
    header("location:../");
}