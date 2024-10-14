<?php
    session_start();
    require_once __DIR__ . "/../Controler/ShopController.php";
    $controller = new ShopController();

    if(isset($_POST['id'])){
        $userId = $_SESSION['user_id'];
        $itemId = $_POST['id'];

        if($_POST['type'] == "buy"){
            $controller->buyItem($userId, $itemId);
            header('Location: ../view/shop/shop.php');
        }

        if($_POST['type'] == "equip"){
            $controller->equipItem($userId, $itemId);
            header('Location: ../view/shop/inventory.php');

        } else if($_POST['type'] == "unequip"){
            $controller->unequipItem($userId, $itemId);
            header('Location: ../view/shop/inventory.php');
        }

        die();
    }


?>