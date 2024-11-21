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
    <link rel="stylesheet" href="../../css/ABB.css">
    <title>Árvore Binária de Busca (ABB)</title>
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
            <a href="#ABBimplementacao" id="link-conteudo">2. Implementação</a>
            <a href="#ABBaplicacao" id="link-conteudo">3. Aplicações</a>
            <a href="#ABBdesafios" id="link-conteudo">4. Desafios</a>
            <a href="#ABBcuriosidades" id="link-conteudo">5. Curiosidades</a>
            <a href="#ABBvariacoes" id="link-conteudo">6. Variações</a>
            <a href="#ABBconclusao" id="link-conteudo">7. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Árvore Binária de Busca (ABB)</h1>
            <p>Uma <strong>Árvore Binária de Busca (ABB)</strong> é uma estrutura de dados hierárquica, usada principalmente para organizar e gerenciar dados de forma eficiente. Seu design permite operações como busca, inserção e remoção com alta eficiência, quando balanceada.</p>
            
            <h2>Como funciona?</h2>
            <p>Uma ABB é composta por nós, onde cada nó tem:</p>
            <ul>
                <li>Um <strong>valor</strong> armazenado.</li>
                <li>Referências para <strong>filhos esquerdo e direito</strong>.</li>
                <li>Uma <strong>propriedade fundamental</strong>: Todos os valores no subárvore à esquerda são menores que o nó atual, e todos à direita são maiores.</li>
            </ul>

            <h3>Diagrama de uma ABB</h3>
            <p>Considere a seguinte árvore:</p>
            <ul>
                <li><strong>Raiz:</strong> 50</li>
                <li><strong>Filhos:</strong> 30 (à esquerda), 70 (à direita).</li>
            </ul>
            <pre>
                50
               /  \
             30    70
            </pre>

            <p>Nesse exemplo, qualquer valor menor que 30 seria adicionado à subárvore esquerda do nó 30, e assim por diante.</p>

            <h2>Propriedades Importantes</h2>
            <ul>
                <li>Travessia em ordem (in-order) resulta em uma lista ordenada.</li>
                <li>O custo de busca é proporcional à altura da árvore.</li>
            </ul>

            <h1 id="ABBimplementacao">Implementação</h1>
            <p>A implementação de uma Árvore Binária de Busca pode ser feita de maneira simples. Veja um exemplo básico em C#:</p>
            <section class="codigo">
                <textarea disabled>
public class Node<T> where T : IComparable<T>
{
    public T Data { get; set; }
    public Node<T> Left { get; set; }
    public Node<T> Right { get; set; }

    public Node(T data)
    {
        Data = data;
        Left = null;
        Right = null;
    }
}

public class BinarySearchTree<T> where T : IComparable<T>
{
    private Node<T> root;

    public BinarySearchTree()
    {
        root = null;
    }

    public void Insert(T value)
    {
        root = InsertRec(root, value);
    }

    private Node<T> InsertRec(Node<T> node, T value)
    {
        if (node == null)
            return new Node<T>(value);

        if (value.CompareTo(node.Data) < 0)
            node.Left = InsertRec(node.Left, value);
        else if (value.CompareTo(node.Data) > 0)
            node.Right = InsertRec(node.Right, value);

        return node;
    }

    public bool Search(T value)
    {
        return SearchRec(root, value) != null;
    }

    private Node<T> SearchRec(Node<T> node, T value)
    {
        if (node == null || node.Data.Equals(value))
            return node;

        if (value.CompareTo(node.Data) < 0)
            return SearchRec(node.Left, value);
        else
            return SearchRec(node.Right, value);
    }
}
                </textarea>
            </section>

            <h1 id="ABBaplicacao">Aplicações</h1>
            <p>Árvores Binárias de Busca são amplamente usadas para:</p>
            <ul>
                <li><strong>Índices em bancos de dados:</strong> Organizando grandes conjuntos de dados para buscas eficientes.</li>
                <li><strong>Inteligência Artificial:</strong> Representando estados em árvores de decisão.</li>
                <li><strong>Sistemas de Arquivos:</strong> Estruturando diretórios de arquivos em hierarquia.</li>
                <li><strong>Algoritmos de Compressão:</strong> Como no algoritmo de Huffman para compressão de dados.</li>
            </ul>

            <h1 id="ABBdesafios">Desafios</h1>
            <p>Operações podem se tornar lentas em árvores desequilibradas. Exemplo:</p>
            <pre>
                Inserir elementos 1, 2, 3... resulta em:
                1
                 \
                  2
                   \
                    3
            </pre>
            <p>Essa estrutura degenera para uma lista encadeada, resultando em desempenho O(n) nas operações.</p>

            <h1 id="ABBcuriosidades">Curiosidades</h1>
            <p>O conceito de árvores remonta ao início da ciência da computação, quando pioneiros buscavam estruturar dados hierárquicos de forma mais eficiente. O uso das árvores binárias de busca evoluiu ao longo do tempo, com a introdução de árvores balanceadas para melhorar a eficiência das operações.</p>

            <h1 id="ABBvariacoes">Variações</h1>
            <p>Para resolver problemas de balanceamento e otimizar a busca, existem as seguintes variações da Árvore Binária de Busca:</p>
            <ul>
                <li><strong>Árvores AVL</strong>: Árvores balanceadas com a diferença de altura entre os filhos esquerdo e direito de qualquer nó não podendo ser superior a 1.</li>
                <li><strong>Árvores Red-Black</strong>: Árvores balanceadas que utilizam cores (vermelho e preto) para garantir que a árvore permaneça balanceada após inserções e remoções.</li>
                <li><strong>Árvores B e B+</strong>: Árvores balanceadas usadas para gerenciar grandes volumes de dados em sistemas de arquivos e bancos de dados.</li>
            </ul>

            <h1 id="ABBconclusao">Conclusão</h1>
            <p>As Árvores Binárias de Busca são fundamentais para a organização eficiente de dados. Elas oferecem uma base sólida para diversas áreas da ciência da computação, desde bancos de dados até algoritmos de inteligência artificial, e suas variações são utilizadas para garantir maior eficiência nas operações.</p>
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