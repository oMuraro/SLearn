<?php
session_start();
// if (!isset($_SESSION['resultados_quiz'])) {
//     echo "Nenhum resultado encontrado.";
//     exit();
// }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Resultados do Quiz</title>
        <link rel="stylesheet" href="../css/quizView.css">
    </head>
    <body>
    <header>
        <!-- <img class="logo" src="img/logo.png" alt="Logotipo"> -->
        <a href="../home.php">
            <h1>C#LEARN</h1>
        </a>

        <div class="headerBtns">
            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton1">Conteudos<span id="arrow1"
                        class="arrow1Down"></span></button>
                <div id="dropdownMenu1" class="dropdown-content">
                    <a href="./TAD/TADGeral.html">Tipo Abstrato de Dados</a>
                    <a href="./LSE/LSEGeral.html">Lista Simplesmente Encadeada</a>
                    <a href="./LDE/LDEGeral.html">Lista Duplamente Encadeada</a>
                    <a href="./LIFO/LIFOGeral.html">Pilhas Encadeadas</a>
                    <a href="./FIFO/FIFOGeral.html">Filas Encadeadas</a>
                    <a href="./FIFOEncadeado/FIFOEncadeadoGeral.html">Filas de Prioridades Encadeadas</a>
                </div>
            </div>

            <a href="./selectQuiz.html">
                <button id="playBtn"></button>
            </a>

            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton2">Itens<span id="arrow2"
                        class="arrow2Down"></button>
                <div id="dropdownMenu2" class="dropdown-content">
                    <a href="./shop/shop.php">Loja</a>
                    <a href="./shop/inventory.php">Inventario</a>
                </div>
            </div>
        </div>

        <a href="#" class="profile-link"></a>
    </header>

    <main>
        <h1>Resultados do Quiz</h1>

        <section class="columnAnswers">
            <?php
            $resultados = $_SESSION['resultados_quiz'];
            $cont = 1;
            foreach ($resultados as $idPergunta => $resultado): ?>
                <section class="answerContainer">
                    <h1>Pergunta <?php echo $cont ?>:</h1> <h2><?= htmlspecialchars($resultado) ?></h2>
                </section>
            <?php $cont++; endforeach; ?>
        </section>
                
        <a href="../home.php">
            
            <button class="returnBtn">Voltar</button>
        </a>

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

    <script src="../scripts/dropdownBtn.js"></script>
</body>
</html>


<!-- // Limpa a sessão para evitar reutilização dos resultados
// unset($_SESSION['resultados_quiz']); -->
