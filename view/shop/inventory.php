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
    <title>Equipamentos</title>
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
                    <a href="../TAD/TADGeral.html">Tipo Abstrato de Dados</a>
                    <a href="../LSE/LSEGeral.html">Lista Simplesmente Encadeada</a>
                    <a href="../LDE/LDEGeral.html">Lista Duplamente Encadeada</a>
                    <a href="../LIFO/LIFOGeral.html">Pilhas Encadeadas</a>
                    <a href="../FIFO/FIFOGeral.html">Filas Encadeadas</a>
                    <a href="../FIFOEncadeado/FIFOEncadeadoGeral.html">Filas de Prioridades Encadeadas</a>
                </div>
            </div>

            <a href="../selectQuiz.html">
                <button id="playBtn"></button>
            </a>

            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton2">Dropdown<span id="arrow2" class="arrow2Down"></span></button>
                <div id="dropdownMenu2" class="dropdown-content">
                    <a href="#">Item 1</a>
                    <a href="#">Item 2</a>
                    <a href="#">Item 3</a>
                </div>
            </div>
        </div>

        <a href="../../conta.php" class="profile-link"></a>


    </header>

    <main>
    <!-- <h1>Equipamentos</h1> -->
    <section class="equip-container">
        <section class="avatar">
            <?php
                $items = $controller->getEquippedItems();
                
                foreach($items as $item){
                    if($item['tipo'] == "Espada"){
                        echo  "<section class='itemSlot' id='itemCapacete'>
                        <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                        <h1> Capacete </h1>
                        </section>";
                    }
                    if($item['tipo'] == "Escudo"){
                        echo  "<section class='itemSlot' id='itemArmadura'>
                        <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                        <h1> Peitoral </h1>
                        </section>";
                    }
                    if($item['tipo'] == "Capacete"){
                        echo  "<section class='itemSlot' id='itemBota'>
                        <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                        <h1> Capacete </h1>
                        </section>";
                    }
                    if($item['tipo'] == "Capa"){
                        echo  "<section class='itemSlot' id='itemArma'>
                        <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                        <h1> Bota </h1>
                        </section>";
                    }
                    if($item['tipo'] == "Skin"){
                        echo  "<section class='skinSlot'>
                        <img src='data:image/jpg;charset=utf-8;base64," . base64_encode($item["foto"]) . "' alt='" . htmlspecialchars($item["nome"]) . "' />
                        <h1> Personagem </h1>
                        </section>";
                    }
                }
            ?>
        </section>

        <section class="grid-container">
        <?php
            $controller->getItemsToEquip();
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