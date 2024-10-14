<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta</title>
    <link rel="stylesheet" href="css/conta.css">
</head>
<body>
    <header>
        <h1>
            C#Learn
        </h1>
        <div class="conta">
            <a href="home.php">
                <button>
                    Home
                </button>
            </a>
        </div>
    </header>
    <main>
        <nav>
            <figure>
                <img src="img/logado.png" >
            </figure>
            <article>
                <p>Nome:</p>
                <input type='text' value='<?php session_start(); echo $_SESSION["usuario"]; ?>' readonly>
            </article>
            <div>
                <a href="php/sair.php">
                    <button class="sair">
                        Sair da Conta
                    </button>
                </a>

                <button class="delete" id="openModalBtn">
                    Deletar Conta
                </button>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <p>Tem certeza que deseja Excluir sua conta?</p>
                        <p>Esta é uma ação IRREVERSÍVEL!</p>
                        <a href="php/deletar.php">
                            <button class="delete">
                                Deletar Conta
                            </button>
                        </a>
                        <br><br>
                        <span class="close">&times;</span>
                    </div>
                </div>
            
                <script src="scripts/conta.js"></script>

            </div>
        </nav>
        <section>

        </section>
    </main>
    <footer>
        <p>Todos os direitos reservados ©</p>
    </footer>
</body>
</html>