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
    <title>Loja</title>
    <link rel="stylesheet" href="../../css/shop.css">
    <link rel="stylesheet" href="../../css/dropdowns.css">
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
                    <a href="../AB/ABGeral.php">Árvore B</a>
                    <a href="../AVL/AVLGeral.php">Árvore AVL</a>
                    <a href="../ARB/ARBGeral.php">Árvore Rubro-Negra</a>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" id="playBtn"><span id="arrow3" class="arrow3Down"></span></button>
                <div id="dropdownMenu3" class="dropdown-content">
                    <form method='post' action="../quizQuestions.php"><input type='hidden' value='facil' name='dificuldade'><input type='submit' value="Modo Fácil"></form>
                    <form method='post' action="../quizQuestions.php"><input type='hidden' value='medio' name='dificuldade'><input type='submit' value="Modo Médio"></form>
                    <form method='post' action="../quizQuestions.php"><input type='hidden' value='dificil' name='dificuldade'><input type='submit' value="Modo Difícil"></form>
                    <form method='post' action="../quizQuestions.php"><input type='hidden' value='historia' name='dificuldade'><input type='submit' value="Modo História"></form>
                </div>
            </div>

            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton2">Itens<span id="arrow2" class="arrow2Down"></span></button>
                <div id="dropdownMenu2" class="dropdown-content">
                    <a href="#here">Loja</a>
                    <a href="./inventory.php">Inventario</a>
                </div>
            </div>
        </div>

        <section class="right-header">
            <h1>R$ <?php echo $controller->getPoints()?></h1>    
            <a href="../../conta.php" class="profile-link"></a>
        </section>

    </header>

    <main>
        <h1>Loja</h1>

    <?php
        if(!empty($_SESSION['needMoney'])){
            echo "<h1 style='font-family: BPdotsBold;'>" .$_SESSION['needMoney']. "</h1>";
            unset($_SESSION['needMoney']);
        }

        echo "<section class='grid-container'>";
        $controller->getItemsToShop();
        echo "</section>";

        // echo $_SESSION[  'countItemsOnShop'];

        if($_SESSION['countItemsOnShop'] == 0){
            echo "<h1 style='font-family: BPdotsBold;'>SUA LOJA ESTA VAZIA :)</h1>";
        }

    ?>
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