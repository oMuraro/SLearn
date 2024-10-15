<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="../css/quiz.css">
</head>
<body>
<header>
        <!-- <img class="logo" src="img/logo.png" alt="Logotipo"> -->
        <a href="../home.php">
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

            <a href="./selectQuiz.html">
                <button id="playBtn"></button>
            </a>

            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton2">Itens<span id="arrow2" class="arrow2Down"></span></button>
                <div id="dropdownMenu2" class="dropdown-content">
                <a href="./shop/shop.php">Loja</a>
                <a href="./shop/inventory.php">Inventario</a>
                </div>
            </div>
        </div>

        <a href="../conta.php" class="profile-link"></a>
    </header>

    <main>
    <form action="../processamento/ProcRespostas.php" method="post">
        
        <section class="questionColumn">
            <section style="width: 70vw; margin-bottom: 5vh;">
                <h1 id="quizTitle">Tipo Abstrato de Dados</h1>

                <p id="quizDescription">Quiz para você testar seu conhecimento sobre a TADs.</p>
            </section>

            <?php
            $conn = new mysqli('localhost', 'root', '', 'slearn');

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $sqlCount = "SELECT COUNT(*) as total FROM perguntas";
            $resultCount = $conn->query($sqlCount);
            $rowCount = $resultCount->fetch_assoc();
            $qtd = $rowCount['total'];  

            $sql = "SELECT * FROM perguntas ORDER BY RAND() LIMIT 10";  
            $result = $conn->query($sql);
            
            $nPergunta = 1;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $pergunta = $row["Pergunta"];
                    echo "
                        <section class='questionContainer'>
                            <input type='hidden' value='".$row['id']."' name='pergunta".$nPergunta."'>
                            <section class='questionStatus'>
                                <span>#".$nPergunta."</span>
                                <span>1 pt</span>
                            </section>
                            <section class='questionContext'>
                                <section class='questionTitle'>
                                    <h1>".$row['Pergunta']."</h1>
                                </section>
                                
                                <section class='questionAnswers'>
                        ";
                    $Busca = "SELECT Certa, Errada1, Errada2, Errada3 FROM perguntas WHERE id = $id";  // Substitua 'perguntas' pelo nome da sua tabela e 'id' pelo critério desejado
                    $resultResp = $conn->query($Busca);
                    if ($resultResp->num_rows > 0) {
                        // Recupera a linha com as respostas
                        $row = $resultResp->fetch_assoc();
                        
                        // Coloca as respostas em um array associativo com o valor correto
                        $respostas = [
                            ['texto' => $row['Certa'], 'tipo' => 'Certa'],
                            ['texto' => $row['Errada1'], 'tipo' => 'Errada'],
                            ['texto' => $row['Errada2'], 'tipo' => 'Errada'],
                            ['texto' => $row['Errada3'], 'tipo' => 'Errada']
                        ];
                        
                        // Embaralha o array para randomizar a ordem das respostas
                        shuffle($respostas);
                        foreach ($respostas as $resposta) {
                            echo "
                            <section>
                                <input type='radio' id='resp1' name='".$id."' value='".$resposta['tipo']."' class='resposta'> 
                                <label for='resp1'>".$resposta['texto']."</label>
                            </section>";
                        }
                    }
                    /*
                    <section>
                    <input type='radio' id='resp1' name='".$row['id']."'> 
                    <label for='resp1'>". $row['Certa']."</label>
                    </section>
                    
                    <section>
                    <input type='radio' id='resp2' name='".$row['id']."'>
                    <label for='resp2'>". $row['Errada1']."</label>
                    </section>
                    
                    <section>
                    <input type='radio' id='resp3' name='".$row['id']."'>
                    <label for='resp3'>". $row['Errada2']."</label>
                    </section>
                    
                    <section>
                    <input type='radio' id='resp4' name='".$row['id']."'>
                    <label for='resp4'>". $row['Errada3']."</label>
                    </section>
                    */
                    echo "
                                </section>
                                
                            </section>
                        </section>
                    ";
                    // echo "ID: " . $id . " - Nome: " . $pergunta . "<br>";
                    $nPergunta = $nPergunta + 1;
                }
            } else {
                echo "Nenhum resultado encontrado.";
            }

            $conn->close();
            ?>


            <!-- <section class="questionContainer">
                <section class="questionStatus">
                    <span>#1</span>
                    <span>1 pt</span>
                </section>
                <section class="questionContext">
                    <section class="questionTitle">
                        <h1>Questão Exemplo</h1>
                    </section>
                    
                    <section class="questionAnswers">
                        <section>
                            <input type="radio" id="resp1" name="resposta1"> 
                            <label for="resp1"> Resposta 1 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp2" name="resposta1">
                            <label for="resp2"> Resposta 2 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp3" name="resposta1">
                            <label for="resp3"> Resposta 3 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp4" name="resposta1">
                            <label for="resp4"> Resposta 4 </label>
                        </section>
                        
                    </section>
                    
                </section>
            </section>
            
            <section class="questionContainer">
                <section class="questionStatus">
                    <span>#1</span>
                    <span>1 pt</span>
                </section>
                <section class="questionContext">
                    <section class="questionTitle">
                        <h1>Questão Exemplo</h1>
                    </section>
                    
                    <section class="questionAnswers">
                        <section>
                            <input type="radio" id="resp1" name="resposta2"> 
                            <label for="resp1"> Resposta 1 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp2" name="resposta2">
                            <label for="resp2"> Resposta 2 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp3" name="resposta2">
                            <label for="resp3"> Resposta 3 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp4" name="resposta2">
                            <label for="resp4"> Resposta 4 </label>
                        </section>
                        
                    </section>
                    
                </section>
            </section>
            
            <section class="questionContainer">
                <section class="questionStatus">
                    <span>#1</span>
                    <span>1 pt</span>
                </section>
                <section class="questionContext">
                    <section class="questionTitle">
                        <h1>Questão Exemplo</h1>
                    </section>
                    
                    <section class="questionAnswers">
                        <section>
                            <input type="radio" id="resp1" name="resposta3"> 
                            <label for="resp1"> Resposta 1 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp2" name="resposta3">
                            <label for="resp2"> Resposta 2 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp3" name="resposta3">
                            <label for="resp3"> Resposta 3 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp4" name="resposta3">
                            <label for="resp4"> Resposta 4 </label>
                        </section>

                    </section>
                    
                </section>
            </section>
            
            <section class="questionContainer">
                <section class="questionStatus">
                    <span>#1</span>
                    <span>1 pt</span>
                </section>
                <section class="questionContext">
                    <section class="questionTitle">
                        <h1>Questão Exemplo</h1>
                    </section>
                    
                    <section class="questionAnswers">
                        <section>
                            <input type="radio" id="resp1" name="resposta4"> 
                            <label for="resp1"> Resposta 1 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp2" name="resposta4">
                            <label for="resp2"> Resposta 2 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp3" name="resposta4">
                            <label for="resp3"> Resposta 3 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp4" name="resposta4">
                            <label for="resp4"> Resposta 4 </label>
                        </section>
                        
                    </section>
                    
                </section>
            </section>
            
            <section class="questionContainer">
                <section class="questionStatus">
                    <span>#1</span>
                    <span>1 pt</span>
                </section>
                <section class="questionContext">
                    <section class="questionTitle">
                        <h1>Questão Exemplo</h1>
                    </section>
                    
                    <section class="questionAnswers">
                        <section>
                            <input type="radio" id="resp1"> 
                            <label for="resp1"> Resposta 1 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp2">
                            <label for="resp2"> Resposta 2 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp3">
                            <label for="resp3"> Resposta 3 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp4">
                            <label for="resp4"> Resposta 4 </label>
                        </section>

                    </section>
                    
                </section>
            </section>
            
            <section class="questionContainer">
                <section class="questionStatus">
                    <span>#1</span>
                    <span>1 pt</span>
                </section>
                <section class="questionContext">
                    <section class="questionTitle">
                        <h1>Questão Exemplo</h1>
                    </section>
                    
                    <section class="questionAnswers">
                        <section>
                            <input type="radio" id="resp1"> 
                            <label for="resp1"> Resposta 1 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp2">
                            <label for="resp2"> Resposta 2 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp3">
                            <label for="resp3"> Resposta 3 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp4">
                            <label for="resp4"> Resposta 4 </label>
                        </section>
                        
                    </section>
                    
                </section>
            </section>
            
            <section class="questionContainer">
                <section class="questionStatus">
                    <span>#1</span>
                    <span>1 pt</span>
                </section>
                <section class="questionContext">
                    <section class="questionTitle">
                        <h1>Questão Exemplo</h1>
                    </section>
                    
                    <section class="questionAnswers">
                        <section>
                            <input type="radio" id="resp1"> 
                            <label for="resp1"> Resposta 1 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp2">
                            <label for="resp2"> Resposta 2 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp3">
                            <label for="resp3"> Resposta 3 </label>
                        </section>
                        
                        <section>
                            <input type="radio" id="resp4">
                            <label for="resp4"> Resposta 4 </label>
                        </section>
                        
                    </section>
                    
                </section>
            </section>
        </section>
        <section class="questionContainer">
            <section class="questionStatus">
                <span>#1</span>
                <span>1 pt</span>
            </section>
            <section class="questionContext">
                <section class="questionTitle">
                    <h1>Questão Exemplo</h1>
                </section>
    
                <section class="questionAnswers">
                    <button>Resposta 1</button>
                    <button>Resposta 2</button>
                    <button>Resposta 3</button>
                    <button>Resposta 4</button>
                </section>
    
            </section>
        </section> -->
        <input type="submit" value="ENVIAR">
        </form>
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