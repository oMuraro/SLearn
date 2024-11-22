<?php
session_start();

error_reporting(0);
require_once __DIR__ . "/../Controler/ShopController.php";

$controller = new ShopController();
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
                    <a href="TAD/TADGeral.php">Tipo Abstrato de Dados</a>
                    <a href="LSE/LSEGeral.php">Lista Simplesmente Encadeada</a>
                    <a href="LDE/LDEGeral.php">Lista Duplamente Encadeada</a>
                    <a href="LIFO/LIFOGeral.php">Pilhas Encadeadas</a>
                    <a href="FIFO/FIFOGeral.php">Filas Encadeadas</a>
                    <a href="FIFOEncadeado/FIFOEncadeadoGeral.php">Filas de Prioridades Encadeadas</a>
                    <a href="ABB/ABBGeral.php">Árvore Binária de Busca</a>
                    <a href="AT/ATGeral.php">Árvore Trie</a>
                    <a href="AB/ABGeral.php">Árvore B</a>
                    <a href="AVL/AVLGeral.php">Árvore AVL</a>
                    <a href="ARB/ARBGeral.php">Árvore Rubro-Negra</a>
                </div>
            </div>

            <a href="./quizQuestions.php">
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

        <section class="right-header">
            <h1>R$ <?php echo $controller->getPoints()?></h1>    
            <a href="../conta.php" class="profile-link"></a>
        </section>
    </header>

    <main>
        <h1>Resultados do Quiz</h1>

        <section class="columnAnswers">
            <?php
            $correctWrong = 2;
            $acertos = 0;
            $resultados = $_SESSION['resultados_quiz'];
            $cont = 1;
            foreach ($resultados as $idPergunta => $resultado): 
                if($resultado == "Certa"){
                    if($_SESSION['skin'] == "Rockeiro"){
                    $acertos = $acertos + 20;
                    } else if($_SESSION['skin'] == "Paladino"){
                    $acertos = $acertos + 15;
                    } else if($_SESSION['skin'] == "Samurai"){
                        if($cont % 2 == 0){
                            $acertos = $acertos + 25;
                        } else {
                            $acertos = $acertos + 10;
                        }
                    } else {
                        $acertos = $acertos + 10;
                    }
                }
                if($_SESSION['skin'] == "Cavaleiro"){
                    if($resultado == "Errada" && $correctWrong == 2){
                        $acertos = $acertos + 10;
                        $correctWrong--;
                    }
                }
            ?>
                <section class="answerContainer">
                    <?php
                        if($_SESSION['skin'] == "Cavaleiro"){
                            if($correctWrong == 1){ ?>
                                <h1>Pergunta <?php echo $cont ?>:</h1> <h2><?= htmlspecialchars($resultado) ?></h2><h2>Auto-Acerto</h2>
                                <?php $correctWrong--; ?>
                            <?php } else { ?>
                                <h1>Pergunta <?php echo $cont ?>:</h1> <h2><?= htmlspecialchars($resultado) ?>
                            <?php }
                        } else { ?>
                            <h1>Pergunta <?php echo $cont ?>:</h1> <h2><?= htmlspecialchars($resultado) ?>
                        <?php }
                    ?>
                </section>
            <?php $cont++; endforeach;
            $conn = new mysqli('localhost', 'root', '', 'slearn');
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            if($_SESSION['skin'] == "Alquimista"){
                $valorPorcent =  ($acertos * 50) / 100;
                $acertos = $acertos + $valorPorcent;
            }

            $query = "UPDATE usuarios SET pontos = pontos + ? WHERE id = ?";

            $result = $conn->prepare($query);
            $result->bind_param('ii', $acertos, $_SESSION['user_id']);
            $result->execute();
            echo "<input type='hidden' value='".$acertos."' name='pontos'>";
            ?>
        </section>
        <section class="midMenu">
            
            <h1>Você obteve <?php echo $acertos?> pontos!!!</h1>
            <a href="../home.php">
                <button class="returnBtn">Voltar</button>
            </a>
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

    <script src="../scripts/dropdownBtn.js"></script>
</body>
</html>


<!-- // Limpa a sessão para evitar reutilização dos resultados
// unset($_SESSION['resultados_quiz']); -->
