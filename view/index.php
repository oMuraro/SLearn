<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <h1>
            S+ Learn
        </h1>
        <div class="conta">
            <?php
            session_start();
            if(isset($_SESSION["usuario"])){
                if($_SESSION["usuario"] == ""){
                    echo 
                        "<a href='login.html'>
                            <button>
                                Cadastro/Login
                            </button>
                        </a>";
                }elseif($_SESSION["usuario"] != ""){
                    echo 
                        "<a href='conta.php'>
                            <button>
                                Conta
                            </button>
                        </a>";
                }
            }
            ?>
        </div>
    </header>
    <main>
        
    </main>
    <footer>
        <p>Todos os direitos reservados ©</p>
    </footer>
</body>
</html>