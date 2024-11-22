<?php
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="scripts/index.js"></script>
</head>

<body>
    <header>
        <h1>C#LEARN</h1>
        <span>Sua Plataforma de Aprendizado</span>
    </header>

    <main>
        <form action="processamento/login.php" method="post">
            <h1>
                Login
            </h1>
            <!-- <Label>Nome de Usuário:</Label> -->
            <input type="text" name="login" placeholder="Digite seu Login" class="entrada" autofocus id="login">
            <!-- <Label>Senha:</Label> -->
            <input type="password" name="senha" placeholder="Digite sua Senha" class="entrada" id="senha">
            <section class="btns">
                <input type="submit" value="Entrar" class="entra">
            </section>
            <a href="cadastro.php" class="Cadastro">Sem cadastro? Cadastre-se!</a>
        </form>
            <?php
                if(!empty($_SESSION['msgLogin'])){
                    echo "<h1 style='font-size: 1.3rem;'>" . $_SESSION['msgLogin'] . "</h1>";
                    unset($_SESSION['msgLogin']);
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