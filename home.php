<?php
session_start();
error_reporting(0);
require_once __DIR__ . "/Controler/ShopController.php";

$controller = new ShopController();

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"] == "") {
        header('location: index.html');
    }
} else {
    header('location: index.html');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <header>
        <!-- <img class="logo" src="img/logo.png" alt="Logotipo"> -->
        <h1>C#LEARN</h1>

        <div class="headerBtns">
            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton1">Conteudos<span id="arrow1" class="arrow1Down"></span></button>
                <div id="dropdownMenu1" class="dropdown-content">
                    <a href="view/TAD/TADGeral.php">Tipo Abstrato de Dados</a>
                    <a href="view/LSE/LSEGeral.php">Lista Simplesmente Encadeada</a>
                    <a href="view/LDE/LDEGeral.php">Lista Duplamente Encadeada</a>
                    <a href="view/LIFO/LIFOGeral.php">Pilhas Encadeadas</a>
                    <a href="view/FIFO/FIFOGeral.php">Filas Encadeadas</a>
                    <a href="view/FIFOEncadeado/FIFOEncadeadoGeral.php">Filas de Prioridades Encadeadas</a>
                </div>
            </div>

            <a href="./view/quizQuestions.php">
                <button id="playBtn"></button>
            </a>

            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton2">Itens<span id="arrow2" class="arrow2Down"></button>
                <div id="dropdownMenu2" class="dropdown-content">
                    <a href="./view/shop/shop.php">Loja</a>
                    <a href="./view/shop/inventory.php">Inventario</a>
                    <!-- <a href="#">Item 3</a> -->
                </div>
            </div>
        </div>

        <section class="right-header">
            <h1>R$ <?php echo $controller->getPoints()?></h1>    
            <a href="conta.php" class="profile-link"></a>
        </section>


    </header>

    <!-- <nav>
        <a href="view/TAD/TADGeral.html" class="link-header">TAD - Tipo Abstrato de Dados</a>
        <a href="view/LSE/LSEGeral.html" class="link-header">Lista Simplesmente Encadeada</a>
        <a href="view/LDE/LDEGeral.html" class="link-header">Lista Duplamente Encadeada</a>
    </nav> -->

    <main>
        <a href="view/TAD/TADGeral.php" class="sobre">
            <div id="tads" class="card">
                <img src="img/tad.png" alt="Imagem representativa de TADs">
                <h2>O que são Tipos Abstratos de Dados?</h2>
                <p>Tipos Abstratos de Dados (TADs) são modelos matemáticos para estruturas de dados que especificam o
                    comportamento dos dados sem detalhar a implementação. Eles são fundamentais na ciência da
                    computação.</p>
            </div>
        </a>

        <a href="view/LSE/LSEGeral.php" class="sobre">
            <div id="lista-simples" class="card">
                <img src="img/listaSimplesmenteEncadeada.png"
                    alt="Imagem representativa de Lista Simplesmente Encadeada">
                <h2>Lista Simplesmente Encadeada</h2>
                <p>Uma lista simplesmente encadeada é uma coleção de elementos onde cada elemento aponta para o próximo,
                    formando uma sequência. É útil para situações onde a inserção e remoção de elementos é frequente.
                </p>
            </div>
        </a>

        <a href="view/LDE/LDEGeral.php" class="sobre">
            <div id="lista-dupla" class="card">
                <img src="img/listaDuplamenteEncadeada.png" alt="Imagem representativa de Lista Duplamente Encadeada">
                <h2>Lista Duplamente Encadeada</h2>
                <p>Uma lista duplamente encadeada é semelhante à lista simplesmente encadeada, mas cada elemento possui
                    um apontador para o próximo e para o anterior, permitindo uma navegação bidirecional.</p>
            </div>
        </a>

        <div class="card-content">
            <h3>Por que aprender sobre TADs?</h3>
            <p>Aprender sobre Tipos Abstratos de Dados é essencial porque eles fornecem a base para a compreensão de
                como as estruturas de dados funcionam. Eles ajudam a resolver problemas de forma eficiente e são
                fundamentais para o desenvolvimento de algoritmos eficazes.</p>
            <h3>Por que aprender sobre Lista Simplesmente Encadeada?</h3>
            <p>A Lista Simplesmente Encadeada é uma estrutura de dados básica que é frequentemente usada em várias
                aplicações, como gerenciamento de memória e implementação de outras estruturas de dados mais complexas.
                Entender como ela funciona é crucial para programadores e engenheiros de software.</p>
            <h3>Por que aprender sobre Lista Duplamente Encadeada?</h3>
            <p>A Lista Duplamente Encadeada oferece uma flexibilidade adicional em comparação com a Lista Simplesmente
                Encadeada, permitindo uma navegação bidirecional. Isso é útil em muitas situações onde é necessário um
                acesso mais eficiente e flexível aos elementos da lista.</p>
        </div>
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

    <script src="scripts/dropdownBtn.js"></script>
</body>

</html>