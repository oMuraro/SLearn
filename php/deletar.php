<?php
session_start();
if(isset($_SESSION["usuario"]) && isset($_SESSION["senha"])) {
    $conect = new mysqli("localhost", "root", "", "slearn");

    if($conect->connect_error){
        echo "ERRO:". $conect->connect_error;
    }
    $login = $_SESSION["usuario"];
    $senha = $_SESSION["senha"];

    $stmt = $conect->prepare("DELETE FROM `usuarios` WHERE `login` = ? AND `senha` = ?");
    $stmt->bind_param("ss", $login, $senha);


    if($stmt->execute() === TRUE){
        $_SESSION["usuario"] = "";
        $_SESSION["senha"] = "";
        header("location:../");
        exit();
    }else {
        echo "Erro ao deletar o usuário: " . $conect->error;
    }

    $stmt->close();
    $conect->close();
}else {
    header("Location: ../");
    exit();
}