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
    <link rel="stylesheet" href="../../css/AB.css">
    <title>Árvore B</title>
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
            <a href="#Bimplementacao" id="link-conteudo">2. Implementação</a>
            <a href="#Baplicacao" id="link-conteudo">3. Aplicações</a>
            <a href="#Bdesafios" id="link-conteudo">4. Desafios</a>
            <a href="#Bcuriosidades" id="link-conteudo">5. Curiosidades</a>
            <a href="#Bvariacoes" id="link-conteudo">6. Variações</a>
            <a href="#Bconclusao" id="link-conteudo">7. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Árvore B</h1>
            <p>Uma <strong>Árvore B</strong> é uma árvore de busca balanceada, usada para armazenar dados em sistemas de gerenciamento de bancos de dados e sistemas de arquivos. Sua principal vantagem é garantir que as operações de busca, inserção e remoção ocorram em tempo logarítmico, mesmo em grandes volumes de dados.</p>
            
            <h2>Como funciona?</h2>
            <p>Uma Árvore B é composta por nós internos e folhas, onde cada nó pode ter mais de dois filhos e armazenar múltiplas chaves. A árvore mantém-se balanceada, o que significa que todas as folhas estão no mesmo nível.</p>
            <ul>
                <li>Cada nó possui uma chave ou várias chaves, com as chaves organizadas em ordem crescente.</li>
                <li>As chaves são usadas para determinar para qual subárvore o valor deverá ser inserido.</li>
                <li>Os nós internos não armazenam dados diretamente, mas são usados para navegar pela árvore.</li>
            </ul>

            <h3>Diagrama de uma Árvore B</h3>
            <p>Considere uma Árvore B de ordem 3:</p>
            <ul>
                <li><strong>Raiz:</strong> 10, 20</li>
                <li><strong>Filhos:</strong> [5], [15], [25]</li>
            </ul>
            <pre>
               [10, 20]
              /    |    \
            [5]   [15]  [25]
            </pre>

            <p>Neste exemplo, as chaves em cada nó são ordenadas, e cada nó pode ter até 3 filhos.</p>

            <h2>Propriedades Importantes</h2>
            <ul>
                <li>Uma Árvore B é balanceada, o que garante um tempo de busca eficiente.</li>
                <li>Os nós internos armazenam múltiplas chaves e têm um número variável de filhos.</li>
                <li>A árvore permanece balanceada mesmo após inserções e remoções, evitando a degeneração em uma lista encadeada.</li>
            </ul>

            <h1 id="Bimplementacao">Implementação</h1>
            <p>A implementação de uma Árvore B é mais complexa que uma árvore binária de busca devido à manipulação de múltiplas chaves e filhos por nó. Veja um exemplo básico de implementação em C#:</p>
            <section class="codigo">
                <textarea disabled>
public class BTreeNode<T> where T : IComparable<T>
{
    public List<T> Keys { get; set; }
    public List<BTreeNode<T>> Children { get; set; }

    public BTreeNode(int t)
    {
        Keys = new List<T>();
        Children = new List<BTreeNode<T>>();
    }
}

public class BTree<T> where T : IComparable<T>
{
    private BTreeNode<T> Root;
    private int T;

    public BTree(int t)
    {
        Root = new BTreeNode<T>(t);
        T = t;
    }

    public void Insert(T key)
    {
        if (Root.Keys.Count == (2 * T) - 1)
        {
            var newRoot = new BTreeNode<T>(T);
            newRoot.Children.Add(Root);
            SplitChild(newRoot, 0);
            Root = newRoot;
        }
        InsertNonFull(Root, key);
    }

    private void InsertNonFull(BTreeNode<T> node, T key)
    {
        int i = node.Keys.Count - 1;
        if (node.Children.Count == 0) // Se for folha
        {
            node.Keys.Add(default(T));
            while (i >= 0 && key.CompareTo(node.Keys[i]) < 0)
            {
                node.Keys[i + 1] = node.Keys[i];
                i--;
            }
            node.Keys[i + 1] = key;
        }
        else
        {
            while (i >= 0 && key.CompareTo(node.Keys[i]) < 0)
                i--;
            i++;
            if (node.Children[i].Keys.Count == (2 * T) - 1)
            {
                SplitChild(node, i);
                if (key.CompareTo(node.Keys[i]) > 0)
                    i++;
            }
            InsertNonFull(node.Children[i], key);
        }
    }

    private void SplitChild(BTreeNode<T> parent, int index)
    {
        var node = parent.Children[index];
        var newNode = new BTreeNode<T>(T);
        int midIndex = T - 1;
        parent.Keys.Insert(index, node.Keys[midIndex]);
        parent.Children.Insert(index + 1, newNode);

        newNode.Keys.AddRange(node.Keys.GetRange(midIndex + 1, node.Keys.Count - midIndex - 1));
        node.Keys.RemoveRange(midIndex, node.Keys.Count - midIndex);

        if (node.Children.Count > 0)
        {
            newNode.Children.AddRange(node.Children.GetRange(T, node.Children.Count - T));
            node.Children.RemoveRange(T, node.Children.Count - T);
        }
    }
}
                </textarea>
            </section>

            <h1 id="Baplicacao">Aplicações</h1>
            <p>Árvores B são amplamente utilizadas em:</p>
            <ul>
                <li><strong>Bancos de Dados:</strong> Para implementação de índices que aceleram a busca e a organização de dados.</li>
                <li><strong>Sistemas de Arquivos:</strong> Para gerenciamento de arquivos e diretórios.</li>
                <li><strong>Armazenamento de Dados em Disco:</strong> Para acesso eficiente em grandes volumes de dados.</li>
            </ul>

            <h1 id="Bdesafios">Desafios</h1>
            <p>A complexidade de manter a árvore balanceada pode tornar a implementação e manutenção de uma Árvore B mais desafiadora. Além disso, operações de divisão de nós podem ser caras em termos de desempenho em cenários com muitas inserções e remoções.</p>

            <h1 id="Bcuriosidades">Curiosidades</h1>
            <p>Árvores B foram desenvolvidas por Rudolf Bayer em 1972 e, desde então, se tornaram fundamentais em áreas como banco de dados e sistemas de arquivos, devido à sua eficiência na busca e na manutenção do balanceamento.</p>

            <h1 id="Bvariacoes">Variações</h1>
            <p>Existem várias variações da Árvore B, incluindo:</p>
            <ul>
                <li><strong>Árvore B+:</strong> Uma modificação onde todas as folhas estão em uma lista encadeada, facilitando a busca sequencial.</li>
                <li><strong>Árvore B*:</strong> Uma versão otimizada da Árvore B, que pode manter a árvore mais balanceada e reduzir o número de divisões de nós.</li>
            </ul>

            <h1 id="Bconclusao">Conclusão</h1>
            <p>As Árvores B são essenciais para sistemas que necessitam de buscas rápidas e eficientes, especialmente em bancos de dados e sistemas de arquivos, devido à sua capacidade de manter os dados balanceados e acessíveis rapidamente.</p>
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