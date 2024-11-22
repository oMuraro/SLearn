<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <script src="scripts/cadastro.js"></script>
</head>

<body>
    <header>
        <h1>C#LEARN</h1>
        <span>Sua Plataforma de Aprendizado</span>
    </header>

    <main>
        <form action="processamento/proc.php" method="post">
            <h1>
                Cadastrar
            </h1>

            <input type="text" name="nome" placeholder="Digite o seu Nome" autofocus class="entrada" id="login">

            <input type="password" name="senha" placeholder="Digite o sua Senha" class="entrada" id="senha">

            <input type="password" name="senha2" placeholder="Confirme sua Senha" class="entrada" id="senha2">

            <section class="btns">
                <input type="submit" value="Cadastrar" class="entra">
            </section>
            <a href="index.php" class="Login">Já possui login? Entre aqui!</a>
        </form>
            <?php
                if(!empty($_SESSION['msgCad'])){
                    echo "<h1 style='font-size:1.3rem;'>" . $_SESSION['msgCad'] . "</h1>";
                    unset($_SESSION['msgCad']);
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
</body>

</html>