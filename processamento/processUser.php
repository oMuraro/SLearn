<?php
    session_start();

    require_once __DIR__ . "/../Controler/usuario.php";
    $controller = new Controlador();

    if($_POST['type'] == "insert"){
        if(!empty($_POST['id']) && !empty($_POST['login']) && !empty($_POST['senhaAtual']) && !empty($_POST['senhaNova'])){
            $login = $_POST['login'];
            $senhaAtual = $_POST['senhaAtual'];
            
            
            if(password_verify($senhaAtual, $_SESSION['senhaHash'])){
                $senhaNova = $_POST['senhaNova'];
    
                $senhaNovaHash = password_hash($senhaNova, PASSWORD_BCRYPT);
                $_SESSION['user_login'] = $_POST['login'];
                $_SESSION['senhaHash'] = $senhaNovaHash; 
                $controller->editUser($login, $senhaNovaHash);
            }
        }
        header("Location: ../conta.php");
        die();
    }

    if($_POST['type'] == "delete"){
        if(!empty($_SESSION['user_id'])){
            $controller->deleteUser($_SESSION['user_id']);
            
            session_destroy();
            header("location: ../index.html");

            die();
        }
    }
?>