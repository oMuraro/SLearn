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
    <link rel="stylesheet" href="../../css/ARB.css">
    <link rel="stylesheet" href="../../css/dropdowns.css">
    <title>Árvore Rubro-Negra</title>
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

            <div class="dropdown">
                <button class="dropdown-button" id="playBtn"><span id="arrow3" class="arrow3Down"></span></button>
                <div id="dropdownMenu3" class="dropdown-content">
                    <form method='post' action="view/quizQuestions.php"><input type='hidden' value='facil' name='dificuldade'><input type='submit' value="Modo Fácil"></form>
                    <form method='post' action="view/quizQuestions.php"><input type='hidden' value='medio' name='dificuldade'><input type='submit' value="Modo Médio"></form>
                    <form method='post' action="view/quizQuestions.php"><input type='hidden' value='dificil' name='dificuldade'><input type='submit' value="Modo Difícil"></form>
                    <form method='post' action="view/quizQuestions.php"><input type='hidden' value='historia' name='dificuldade'><input type='submit' value="Modo História"></form>
                </div>
            </div>

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
            <a href="#RubroNegraimplementacao" id="link-conteudo">2. Implementação</a>
            <a href="#RubroNegraaplicacao" id="link-conteudo">3. Aplicações</a>
            <a href="#RubroNegradesafios" id="link-conteudo">4. Desafios</a>
            <a href="#RubroNegracuriosidades" id="link-conteudo">5. Curiosidades</a>
            <a href="#RubroNegravaVariacoes" id="link-conteudo">6. Variações</a>
            <a href="#RubroNegraconclusao" id="link-conteudo">7. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Árvore Rubro-Negra</h1>
            <p>A <strong>Árvore Rubro-Negra</strong> (ou Red-Black Tree) é uma árvore binária de busca balanceada que usa cores (vermelho e preto) para garantir que a árvore permaneça balanceada durante as operações de inserção e remoção. Ela é uma variação da árvore binária de busca, com regras adicionais que controlam a forma como as árvores podem ser balanceadas.</p>

            <h2>Como funciona?</h2>
            <p>A árvore rubro-negra possui cinco propriedades principais que garantem que ela permaneça balanceada:</p>
            <ul>
                <li><strong>Propriedade 1:</strong> Cada nó é ou vermelho ou preto.</li>
                <li><strong>Propriedade 2:</strong> A raiz é sempre preta.</li>
                <li><strong>Propriedade 3:</strong> As folhas (nós nulos) são pretas.</li>
                <li><strong>Propriedade 4:</strong> Se um nó é vermelho, seus filhos são pretos (não pode haver dois nós vermelhos consecutivos).</li>
                <li><strong>Propriedade 5:</strong> Para cada nó, o número de nós pretos entre ele e seus descendentes é o mesmo para todos os caminhos.</li>
            </ul>

            <h3>Balanceamento com Cores</h3>
            <p>O balanceamento na árvore rubro-negra é feito através das cores dos nós e da utilização de rotações para garantir que as propriedades sejam mantidas após operações de inserção e remoção. O objetivo é que a árvore tenha um número balanceado de nós vermelhos e pretos, de forma que a altura da árvore seja proporcional ao logaritmo do número de nós.</p>

            <h2>Diagrama de uma Árvore Rubro-Negra</h2>
            <pre>
                Exemplo de uma árvore Rubro-Negra balanceada:
                
                   30B
                  /    \
              20R       40R
             /  \        /  \
           10B  25B   35B  50B
            </pre>
            <p>No exemplo acima, os nós vermelhos e pretos estão organizados de forma a manter as propriedades da árvore rubro-negra.</p>

            <h1 id="RubroNegraimplementacao">Implementação</h1>
            <p>Agora, vamos ver um exemplo básico de implementação de uma árvore rubro-negra em C#:</p>
            <section class="codigo">
                <textarea disabled>
public class RedBlackNode<T> where T : IComparable<T>
{
    public T Key { get; set; }
    public RedBlackNode<T> Left { get; set; }
    public RedBlackNode<T> Right { get; set; }
    public RedBlackNode<T> Parent { get; set; }
    public bool IsRed { get; set; }

    public RedBlackNode(T key)
    {
        Key = key;
        Left = Right = Parent = null;
        IsRed = true; // Nós são vermelhos por padrão.
    }
}

public class RedBlackTree<T> where T : IComparable<T>
{
    private RedBlackNode<T> root;

    public RedBlackTree()
    {
        root = null;
    }

    // Rotações para manter o balanceamento da árvore
    private void RotateLeft(RedBlackNode<T> node)
    {
        RedBlackNode<T> rightChild = node.Right;
        node.Right = rightChild.Left;
        if (rightChild.Left != null)
        {
            rightChild.Left.Parent = node;
        }
        rightChild.Parent = node.Parent;
        if (node.Parent == null)
        {
            root = rightChild;
        }
        else if (node == node.Parent.Left)
        {
            node.Parent.Left = rightChild;
        }
        else
        {
            node.Parent.Right = rightChild;
        }
        rightChild.Left = node;
        node.Parent = rightChild;
    }

    private void RotateRight(RedBlackNode<T> node)
    {
        RedBlackNode<T> leftChild = node.Left;
        node.Left = leftChild.Right;
        if (leftChild.Right != null)
        {
            leftChild.Right.Parent = node;
        }
        leftChild.Parent = node.Parent;
        if (node.Parent == null)
        {
            root = leftChild;
        }
        else if (node == node.Parent.Right)
        {
            node.Parent.Right = leftChild;
        }
        else
        {
            node.Parent.Left = leftChild;
        }
        leftChild.Right = node;
        node.Parent = leftChild;
    }

    // Método de inserção
    public void Insert(T key)
    {
        RedBlackNode<T> newNode = new RedBlackNode<T>(key);
        if (root == null)
        {
            root = newNode;
            newNode.IsRed = false; // A raiz é sempre preta
            return;
        }

        RedBlackNode<T> current = root;
        while (current != null)
        {
            if (key.CompareTo(current.Key) < 0)
            {
                if (current.Left == null)
                {
                    current.Left = newNode;
                    newNode.Parent = current;
                    break;
                }
                current = current.Left;
            }
            else
            {
                if (current.Right == null)
                {
                    current.Right = newNode;
                    newNode.Parent = current;
                    break;
                }
                current = current.Right;
            }
        }

        FixInsert(newNode);
    }

    // Método para corrigir o balanceamento após a inserção
    private void FixInsert(RedBlackNode<T> node)
    {
        while (node != root && node.Parent.IsRed)
        {
            if (node.Parent == node.Parent.Parent.Left)
            {
                RedBlackNode<T> uncle = node.Parent.Parent.Right;
                if (uncle != null && uncle.IsRed)
                {
                    node.Parent.IsRed = false;
                    uncle.IsRed = false;
                    node.Parent.Parent.IsRed = true;
                    node = node.Parent.Parent;
                }
                else
                {
                    if (node == node.Parent.Right)
                    {
                        node = node.Parent;
                        RotateLeft(node);
                    }
                    node.Parent.IsRed = false;
                    node.Parent.Parent.IsRed = true;
                    RotateRight(node.Parent.Parent);
                }
            }
            else
            {
                RedBlackNode<T> uncle = node.Parent.Parent.Left;
                if (uncle != null && uncle.IsRed)
                {
                    node.Parent.IsRed = false;
                    uncle.IsRed = false;
                    node.Parent.Parent.IsRed = true;
                    node = node.Parent.Parent;
                }
                else
                {
                    if (node == node.Parent.Left)
                    {
                        node = node.Parent;
                        RotateRight(node);
                    }
                    node.Parent.IsRed = false;
                    node.Parent.Parent.IsRed = true;
                    RotateLeft(node.Parent.Parent);
                }
            }
        }

        root.IsRed = false;
    }
}
                </textarea>
            </section>

            <h1 id="RubroNegraaplicacao">Aplicações</h1>
            <p>A árvore rubro-negra é amplamente usada em implementações de estruturas de dados que exigem alto desempenho, como:</p>
            <ul>
                <li><strong>Gerenciamento de banco de dados:</strong> Usada para índices em bancos de dados, garantindo acesso eficiente.</li>
                <li><strong>Sistemas de arquivos:</strong> Aplicada em sistemas que requerem balanceamento dinâmico para armazenar grandes volumes de dados.</li>
                <li><strong>Bibliotecas de containers:</strong> Usada em bibliotecas de containers em várias linguagens de programação como C++ e Java.</li>
            </ul>

            <h1 id="RubroNegradesafios">Desafios</h1>
            <p>O principal desafio da implementação da árvore rubro-negra é garantir que as propriedades sejam mantidas após inserções e remoções, o que envolve rotações e ajustes delicados no balanceamento da árvore.</p>

            <h1 id="RubroNegracuriosidades">Curiosidades</h1>
            <p>A árvore rubro-negra foi introduzida por <strong>Rudolf Bayer</strong> em 1972. Ela foi uma das primeiras árvores balanceadas a ser utilizada em implementações de sistemas em grande escala.</p>

            <h1 id="RubroNegravaVariacoes">Variações</h1>
            <p>Uma variação interessante da árvore rubro-negra é a <strong>Árvore AVL</strong>, que também é uma árvore balanceada, mas usa diferentes técnicas de balanceamento, baseadas na altura dos subárvores.</p>

            <h1 id="RubroNegraconclusao">Conclusão</h1>
            <p>A árvore rubro-negra é uma excelente escolha para implementações de estruturas de dados balanceadas e de alto desempenho, graças ao seu equilíbrio dinâmico que mantém a altura da árvore razoavelmente baixa, independentemente das operações realizadas.</p>
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