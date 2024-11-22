<?php
error_reporting(0);
require_once __DIR__ . "/../../Controler/ShopController.php";

$controller = new ShopController();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/AVL.css">
    <title>Árvore AVL</title>
</head>

<body>
    <header>
        <a href="../../home.php">
            <h1>C#LEARN</h1>
        </a>

        <div class="headerBtns">
            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton1">Conteúdos<span id="arrow1" class="arrow1Down"></span></button>
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

            <a href="../quizQuestions.php">
                <button id="playBtn"></button>
            </a>

            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton2">Itens<span id="arrow2" class="arrow2Down"></span></button>
                <div id="dropdownMenu2" class="dropdown-content">
                    <a href="../shop/shop.php">Loja</a>
                    <a href="../shop/inventory.php">Inventário</a>
                </div>
            </div>
        </div>
        <section class="right-header">
            <h1>R$ <?php echo $controller->getPoints()?></h1>
            <a href="../../conta.php" class="profile-link"></a>
        </section>
    </header>

    <main>
        <section class="menu-lateral">
            <h1>Conteúdo</h1>
            <a href="#intro" id="link-conteudo">1. Introdução</a>
            <a href="#AVLimplementacao" id="link-conteudo">2. Implementação</a>
            <a href="#AVLaplicacao" id="link-conteudo">3. Aplicações</a>
            <a href="#AVLdesafios" id="link-conteudo">4. Desafios</a>
            <a href="#AVLcuriosidades" id="link-conteudo">5. Curiosidades</a>
            <a href="#AVLvariacoes" id="link-conteudo">6. Variações</a>
            <a href="#AVLconclusao" id="link-conteudo">7. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Árvore AVL</h1>
            <p>A <strong>Árvore AVL</strong> é uma árvore binária de busca balanceada que foi projetada para manter a altura de cada subárvore balanceada. O balanceamento é garantido por meio de rotações, que são feitas sempre que uma operação de inserção ou remoção causa um desbalanceamento na árvore.</p>
            
            <h2>Como funciona?</h2>
            <p>Uma árvore AVL é uma variação da árvore binária de busca, onde a diferença de altura entre as subárvores esquerda e direita de qualquer nó não pode ser maior que 1. Se essa condição for violada após uma operação, a árvore é balanceada por meio de rotações.</p>
            <ul>
                <li>A altura de uma árvore AVL é a altura máxima da subárvore, e o fator de balanceamento (FB) é a diferença entre as alturas da subárvore esquerda e direita.</li>
                <li>O fator de balanceamento de um nó é calculado como a diferença entre a altura da subárvore esquerda e a altura da subárvore direita.</li>
            </ul>

            <h3>Fatores de Balanceamento</h3>
            <ul>
                <li>FB = 0: A árvore está balanceada.</li>
                <li>FB = 1 ou FB = -1: A árvore está levemente desbalanceada, mas ainda é aceitável.</li>
                <li>FB > 1 ou FB < -1: A árvore está desbalanceada e precisa ser corrigida por rotações.</li>
            </ul>

            <h2>Diagrama de uma Árvore AVL</h2>
            <pre>
                Exemplo de uma árvore AVL balanceada:
                
                  30
                 /  \
               20    40
              /  \    \
            10   25    50
            </pre>
            <p>No exemplo acima, cada nó tem um fator de balanceamento entre -1 e 1, o que significa que a árvore está balanceada.</p>

            <h1 id="AVLimplementacao">Implementação</h1>
            <p>Agora, vamos ver um exemplo básico de implementação de uma árvore AVL em C#:</p>
            <section class="codigo">
                <textarea disabled>
public class AVLNode<T> where T : IComparable<T>
{
    public T Key { get; set; }
    public AVLNode<T> Left { get; set; }
    public AVLNode<T> Right { get; set; }
    public int Height { get; set; }

    public AVLNode(T key)
    {
        Key = key;
        Left = Right = null;
        Height = 1;
    }
}

public class AVLTree<T> where T : IComparable<T>
{
    public AVLNode<T> Root { get; set; }

    public AVLTree()
    {
        Root = null;
    }

    public int Height(AVLNode<T> node)
    {
        if (node == null)
            return 0;
        return node.Height;
    }

    public int GetBalance(AVLNode<T> node)
    {
        if (node == null)
            return 0;
        return Height(node.Left) - Height(node.Right);
    }

    public AVLNode<T> RightRotate(AVLNode<T> y)
    {
        AVLNode<T> x = y.Left;
        AVLNode<T> T2 = x.Right;
        x.Right = y;
        y.Left = T2;
        y.Height = Math.Max(Height(y.Left), Height(y.Right)) + 1;
        x.Height = Math.Max(Height(x.Left), Height(x.Right)) + 1;
        return x;
    }

    public AVLNode<T> LeftRotate(AVLNode<T> x)
    {
        AVLNode<T> y = x.Right;
        AVLNode<T> T2 = y.Left;
        y.Left = x;
        x.Right = T2;
        x.Height = Math.Max(Height(x.Left), Height(x.Right)) + 1;
        y.Height = Math.Max(Height(y.Left), Height(y.Right)) + 1;
        return y;
    }

    public AVLNode<T> Insert(AVLNode<T> node, T key)
    {
        if (node == null)
            return new AVLNode<T>(key);

        if (key.CompareTo(node.Key) < 0)
            node.Left = Insert(node.Left, key);
        else if (key.CompareTo(node.Key) > 0)
            node.Right = Insert(node.Right, key);
        else
            return node;

        node.Height = Math.Max(Height(node.Left), Height(node.Right)) + 1;

        int balance = GetBalance(node);

        if (balance > 1 && key.CompareTo(node.Left.Key) < 0)
            return RightRotate(node);

        if (balance < -1 && key.CompareTo(node.Right.Key) > 0)
            return LeftRotate(node);

        if (balance > 1 && key.CompareTo(node.Left.Key) > 0)
        {
            node.Left = LeftRotate(node.Left);
            return RightRotate(node);
        }

        if (balance < -1 && key.CompareTo(node.Right.Key) < 0)
        {
            node.Right = RightRotate(node.Right);
            return LeftRotate(node);
        }

        return node;
    }

    public void Insert(T key)
    {
        Root = Insert(Root, key);
    }
}
                </textarea>
            </section>

            <h1 id="AVLaplicacao">Aplicações</h1>
            <p>A árvore AVL é utilizada principalmente em:</p>
            <ul>
                <li><strong>Banco de Dados:</strong> Para manter índices balanceados que otimizam a busca.</li>
                <li><strong>Estruturas de Arquivos:</strong> Como índices de arquivos e dados em memória.</li>
                <li><strong>Algoritmos de Compressão:</strong> Onde a busca balanceada é crucial.</li>
            </ul>

            <h1 id="AVLdesafios">Desafios</h1>
            <p>A principal dificuldade na implementação da árvore AVL está nas rotações, que podem ser complexas para quem está começando a entender a estrutura. Além disso, o custo de manutenção do balanceamento pode ser um problema em aplicações com grandes volumes de inserções e remoções.</p>

            <h1 id="AVLcuriosidades">Curiosidades</h1>
            <p>A Árvore AVL foi desenvolvida por <strong>Adelson-Velsky</strong> e <strong>Landis</strong> em 1962 e foi uma das primeiras árvores balanceadas, representando um grande avanço na área de algoritmos de busca.</p>

            <h1 id="AVLvariacoes">Variações</h1>
            <p>Existem várias variações da árvore AVL, incluindo:</p>
            <ul>
                <li><strong>Árvore Red-Black:</strong> Outra árvore binária balanceada, que usa regras diferentes para balanceamento, com foco em simplicidade em termos de implementações.</li>
                <li><strong>Árvore Splay:</strong> Uma árvore de busca autoajustável onde os nós mais acessados são movidos para a raiz para otimizar futuras operações.</li>
            </ul>

            <h1 id="AVLconclusao">Conclusão</h1>
            <p>A árvore AVL é uma das estruturas mais eficientes para implementações que requerem operações rápidas de inserção, remoção e busca, garantindo sempre um balanceamento ótimo. Sua principal vantagem está no desempenho equilibrado mesmo em cenários com muitas operações de alteração na árvore.</p>
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
                    <li>Nome: Kauã Gabriel</li>
                    <li>Email: gabriel@slearn.com</li>
                    <li>Telefone: (18)92843-1792</li>
                </ul>
            </section>
        </section>
    </footer>
</body>

</html>