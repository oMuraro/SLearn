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
    <title>Árvore Binária de Busca</title>
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
            <a href="#ABBvariacoes" id="link-conteudo">4. Variações</a>
            <a href="#ABBconclusao" id="link-conteudo">5. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Árvore Binária de Busca (ABB)</h1>
            <p>Uma Árvore Binária de Busca (ABB) é uma estrutura de dados que organiza elementos em um formato hierárquico para facilitar operações como busca, inserção e remoção.</p>
            <ul>
                <li>Os valores no lado esquerdo de um nó são sempre menores que o valor do nó pai.</li>
                <li>Os valores no lado direito de um nó são sempre maiores que o valor do nó pai.</li>
            </ul>

            <h2>Propriedades de uma ABB</h2>
            <p>As principais propriedades que tornam a ABB eficiente incluem:</p>
            <ul>
                <li>Complexidade média de busca, inserção e remoção: O(log n), assumindo que a árvore está balanceada.</li>
                <li>Garantia de ordenação natural dos elementos, possibilitando travessias em ordem (in-order).</li>
            </ul>

            <h2>Casos Especiais</h2>
            <p>Para obter bom desempenho, a árvore deve ser balanceada. Em casos de inserções em ordem crescente ou decrescente, a árvore pode degenerar para uma lista encadeada, aumentando a complexidade para O(n).</p>

            <h1 id="ABBimplementacao">Implementação em C#</h1>
            <p>A implementação básica de uma ABB envolve a criação de classes para os nós e para a própria árvore. Abaixo está um exemplo em C#:</p>
            <section class="codigo">
                <textarea disabled>
using System;

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

public class Program
{
    public static void Main()
    {
        BinarySearchTree<int> bst = new BinarySearchTree<int>();
        bst.Insert(50);
        bst.Insert(30);
        bst.Insert(70);
        Console.WriteLine(bst.Search(30)); // Output: True
        Console.WriteLine(bst.Search(90)); // Output: False
    }
}
    </textarea>
            </section>

            <h1 id="ABBaplicacao">Aplicações</h1>
            <p>As Árvores Binárias de Busca são amplamente utilizadas em áreas como:</p>
            <ul>
                <li><strong>Banco de Dados:</strong> Organização eficiente de índices e registros.</li>
                <li><strong>Engines de Busca:</strong> Estruturas balanceadas para facilitar a indexação.</li>
                <li><strong>Gerenciamento de Hierarquias:</strong> Representação de árvores genealógicas, sistemas de arquivos, etc.</li>
            </ul>

            <h1 id="ABBvariacoes">Variações e Melhorias</h1>
            <p>Para superar os desafios de balanceamento, existem variações como:</p>
            <ul>
                <li><strong>Árvore AVL:</strong> Garante balanceamento por rotações após inserções ou remoções.</li>
                <li><strong>Árvore Red-Black:</strong> Usada em aplicações que exigem inserção rápida, como dicionários.</li>
                <li><strong>Árvore B:</strong> Comum em bancos de dados, suporta múltiplos filhos por nó.</li>
            </ul>

            <h1 id="ABBconclusao">Conclusão</h1>
            <p>As Árvores Binárias de Busca são uma solução eficiente para armazenar e gerenciar dados hierárquicos. Seu uso em áreas como bancos de dados e inteligência artificial demonstra sua importância na computação moderna.</p>
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