<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
</head>
<body>
    <a href="./equip.php">Equipamentos</a>
    <h1>Loja</h1>
    <ul>
        <?php
            require_once __DIR__ . "/../../Controler/ShopController.php";

            $controller = new ShopController();

            echo $controller->getItemsToShop();
        ?>
    </ul>
</body>
</html>