<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipamentos</title>
</head>
<body>
    <h1>Equipamentos</h1>
        <ul>
            <?php
                require_once __DIR__ . "/../../Controler/ShopController.php";

                $controller = new ShopController();

                $controller->getItemsToEquip();
            ?>
        </ul>
</body>
</html>