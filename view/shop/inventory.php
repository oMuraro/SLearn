<?php
    session_start();
    error_reporting(0);

    require_once __DIR__ . "/../../Controler/ShopController.php";
    $controller = new ShopController();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventário</title>
    <link rel="stylesheet" href="../../css/inventory.css">
</head>
<body>
<header>
        <!-- <img class="logo" src="img/logo.png" alt="Logotipo"> -->
        <a href="../../home.php">
            <h1>C#LEARN</h1>
        </a>

        <div class="headerBtns">
            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton1">Conteudos<span id="arrow1" class="arrow1Down"></span></button>
                <div id="dropdownMenu1" class="dropdown-content">
                    <a href="../TAD/TADGeral.php">Tipo Abstrato de Dados</a>
                    <a href="../LSE/LSEGeral.php">Lista Simplesmente Encadeada</a>
                    <a href="../LDE/LDEGeral.php">Lista Duplamente Encadeada</a>
                    <a href="../LIFO/LIFOGeral.php">Pilhas Encadeadas</a>
                    <a href="../FIFO/FIFOGeral.php">Filas Encadeadas</a>
                    <a href="../FIFOEncadeado/FIFOEncadeadoGeral.php">Filas de Prioridades Encadeadas</a>
                    <a href="../ABB/ABBGeral.php">Árvore Binária de Busca</a>
                    <a href="../AT/ATGeral.php">Árvore Trie</a>
                </div>
            </div>

            <a href="../quizQuestions.php">
                <button id="playBtn"></button>
            </a>

            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton2">Itens<span id="arrow2" class="arrow2Down"></span></button>
                <div id="dropdownMenu2" class="dropdown-content">
                    <a href="./shop.php">Loja</a>
                    <a href="#here">Inventario</a>
                </div>
            </div>
        </div>

        <section class="right-header">
            <h1>R$ <?php echo $controller->getPoints()?></h1>    
            <a href="../../conta.php" class="profile-link"></a>
        </section>


    </header>

    <main>
    <h1>Inventario</h1>
    <section class="equip-container">
        <section class="avatar">
            <h1>AVATAR</h1>

            <?php
                $items = $controller->getEquippedItems();
                
                // Inicializa as variáveis de controle para verificar se cada tipo de item foi encontrado
                $temArma = false;
                $temCapacete = false;
                $temPeitoral = false;
                $temBotas = false;
                $temSkin = false;
                
                // Primeiro, verifica quais itens estão equipados
                foreach ($items as $item) {
                    if ($item['tipo'] == "Arma") {
                        $temArma = true;
                    } elseif ($item['tipo'] == "Capacete") {
                        $temCapacete = true;
                    } elseif ($item['tipo'] == "Peitoral") {
                        $temPeitoral = true;
                    } elseif ($item['tipo'] == "Botas") {
                        $temBotas = true;
    } elseif ($item['tipo'] == "Skin") {
        $temSkin = true;
    }
}

// Agora renderiza os slots
if ($temSkin) {
    foreach ($items as $item) {
        if ($item['tipo'] == "Skin") {
            echo "<section class='skinSlot'>
                    <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                    <h1>".$item['nome']."</h1>
                </section>";
        }
    }
} else {
    echo "<section><section class='emptySlotSkin'></section><h1>Skin</h1></section>";
}

echo "<section class='itemsRow'>";
// Slot para Espada
if ($temArma) {
    foreach ($items as $item) {
        if ($item['tipo'] == "Arma") {
            echo "<section class='itemSlot'>
            <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
            <h1>Arma</h1>
                </section>";
        }
    }
} else {
    echo "<section><section class='emptySlot'></section><h1>Arma</h1></section>";
}

// Slot para Escudo
if ($temCapacete) {
    foreach ($items as $item) {
        if ($item['tipo'] == "Capacete") {
            echo "<section class='itemSlot'>
                    <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                    <h1>Capacete</h1>
                </section>";
        }
    }
} else {
    echo "<section><section class='emptySlot'></section><h1>Capacete</h1></section>";
}

// Slot para Capacete
if ($temPeitoral) {
    foreach ($items as $item) {
        if ($item['tipo'] == "Peitoral") {
            echo "<section class='itemSlot'>
                    <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                    <h1>Peitoral</h1>
                </section>";
        }
    }
} else {
    echo "<section><section class='emptySlot'></section><h1>Peitoral</h1></section>";
}

// Slot para Capa
if ($temBotas) {
    foreach ($items as $item) {
        if ($item['tipo'] == "Botas") {
            echo "<section class='itemSlot'>
                    <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                    <h1>Botas</h1>
                </section>";
        }
    }
} else {
    echo "<section><section class='emptySlot'></section><h1>Botas</h1></section>";
}

echo "</section>";
// Slot para Skin
            ?>
            </section>

        <section class="grid-container">
        <?php
            $controller->getItemsToEquip();

            if($_SESSION['countItemsOnInventory'] == 0){
                echo "<h1>SEU INVENTARIO ESTÁ VAZIO :(</H1>";
            }
        ?>
        </section>
    </section>
    </main>



        <footer>
        <section class="contatos">
            <section class="contato-left">
                <h2>Contato:</h2>
                <ul>
                    <li>Nome: Pedro Muraro</li>
                    <li>Email: pedro@slearn.com</li>
                    <li>Telefone: (18)83959-1928</li>
                </ul>
                <br>
                <ul>
                    <li>Nome: João Vitor</li>
                    <li>Email: vitor@slearn.com</li>
                    <li>Telefone: (18)72858-1678</li>
                </ul>
            </section>

            <section class="contato-right">
                <ul>
                    <li>Nome: Caio Okubara</li>
                    <li>Email: caio@slearn.com</li>
                    <li>Telefone: (18)92850-1591</li>
                </ul>
                <br>
                <ul>
                    <li>Nome: João Vieira</li>
                    <li>Email: joao@slearn.com</li>
                    <li>Telefone: (18)82718-8294</li>
                </ul>
            </section>
        </section>

        <section class="footer-parte">
            <h2>Links Úteis:</h2>
            <ul class="links-uteis">
                <li><a class="about" href="#sobre">Sobre</a></li>
                <li><a class="about" href="#suporte">Suporte</a></li>
            </ul>
        </section>

        <p>Todos os direitos reservados ©</p>
    </footer>

    <script src="../../scripts/dropdownBtn.js"></script>
</body>
</html>