<?php
session_start();
if (!isset($_SESSION['resultados_quiz'])) {
    echo "Nenhum resultado encontrado.";
    exit();
}

$resultados = $_SESSION['resultados_quiz'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultados do Quiz</title>
</head>
<body>
    <h1>Resultados do Quiz</h1>
    <ul>
        <?php foreach ($resultados as $idPergunta => $resultado): ?>
            <li>Pergunta <?= htmlspecialchars($idPergunta) ?>: <?= htmlspecialchars($resultado) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="../home.php">Voltar para a página inicial</a>
</body>
</html>

<?php
// Limpa a sessão para evitar reutilização dos resultados
unset($_SESSION['resultados_quiz']);
