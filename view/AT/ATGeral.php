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
    <link rel="stylesheet" href="../../css/dropdowns.css">
    <title>Árvore Trie (AT)</title>
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
            <a href="#ATimplementacao" id="link-conteudo">2. Implementação</a>
            <a href="#ATaplicacao" id="link-conteudo">3. Aplicações</a>
            <a href="#ATvariacoes" id="link-conteudo">4. Variações</a>
            <a href="#ATconclusao" id="link-conteudo">5. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Árvore Trie (AT)</h1>
            <p>Uma <strong>Árvore Trie (AT)</strong>  É uma estrutura de dados do tipo árvore ordenada, que pode ser usada para armazenar um array associativo em que as chaves são normalmente cadeias de caracteres.</p>
            
            <h2>Como funciona?</h2>
            <p>Uma AT é composta por nós, onde cada nó tem:</p>
            <ul>
                <li>Um <strong>valor</strong> armazenado.</li>
                <li>Referências para <strong>filhos esquerdo e direito</strong>.</li>
                <li>Uma <strong>propriedade fundamental</strong>: Todos os valores no subárvore à esquerda são menores que o nó atual, e todos à direita são maiores.</li>
            </ul>

            <h3>Diagrama de uma At</h3>
            <p>Considere a seguinte árvore:</p>
            <ul>
                <li><strong>Raiz:</strong> a</li>
                <li><strong>Filhos:</strong> 30 (à esquerda), 70 (à direita).</li>
            </ul>
            <pre>
                a
               /  \
             e |  r
                v \
                |  o
                r
            </pre>

            <p>Nesse exemplo, qualquer valor menor que 30 seria adicionado à subárvore esquerda do nó 30, e assim por diante.</p>

            <h2>Propriedades Importantes</h2>
            <ul>
                <li>Travessia em ordem (in-order) resulta em uma lista ordenada.</li>
                <li>O custo de busca é proporcional à altura da árvore.</li>
            </ul>

            <h1 id="ATimplementacao">Implementação</h1>
            <p>A implementação de uma Árvore Trie pode ser feita de maneira simples. Veja um exemplo básico em C#:</p>
            <section class="codigo">
                <textarea disabled>
                public class TrieNode
{
    public Dictionary<char, TrieNode> Children { get; set; }
    public bool IsEndOfWord { get; set; }

    public TrieNode()
    {
        Children = new Dictionary<char, TrieNode>();
        IsEndOfWord = false;
    }
}

public class Trie
{
    private readonly TrieNode root;

    public Trie()
    {
        root = new TrieNode();
    }

    // Inserir uma palavra na Trie
    public void Insert(string word)
    {
        var currentNode = root;

        foreach (var ch in word)
        {
            if (!currentNode.Children.ContainsKey(ch))
            {
                currentNode.Children[ch] = new TrieNode();
            }
            currentNode = currentNode.Children[ch];
        }

        currentNode.IsEndOfWord = true;
    }

    // Verificar se uma palavra existe na Trie
    public bool Search(string word)
    {
        var currentNode = root;

        foreach (var ch in word)
        {
            if (!currentNode.Children.ContainsKey(ch))
            {
                return false;
            }
            currentNode = currentNode.Children[ch];
        }

        return currentNode.IsEndOfWord;
    }

    // Verificar se há alguma palavra que começa com o prefixo dado
    public bool StartsWith(string prefix)
    {
        var currentNode = root;

        foreach (var ch in prefix)
        {
            if (!currentNode.Children.ContainsKey(ch))
            {
                return false;
            }
            currentNode = currentNode.Children[ch];
        }

        return true;
    }
}

                </textarea>
            </section>

            <h1 id="ATaplicacao">Aplicações</h1>
            <p>Árvores Trie são amplamente usadas para:</p>
            <ul>
                <li><strong>Índices em bancos de dados:</strong> Organizando grandes conjuntos de dados para buscas eficientes.</li>
                <li><strong>Inteligência Artificial:</strong> Representando estados em árvores de decisão.</li>
                <li><strong>Sistemas de Arquivos:</strong> Estruturando diretórios de arquivos em hierarquia.</li>
                <li><strong>Algoritmos de Compressão:</strong> Como no algoritmo de Huffman para compressão de dados.</li>
            </ul>

            <h1 id="ATdesafios">Desafios</h1>
            <p>Operações podem se tornar lentas em árvores desequilibradas. Exemplo:</p>
            <pre>
                Inserir elementos c, a, i,o... resulta em:
                c    o
                 \    \
                  a   o
                   \ /
                   / i
                  a
            </pre>
            <p>Essa estrutura degenera para uma lista encadeada, resultando em desempenho O(n) nas operações.</p>

            <h1 id="ATcuriosidades">Curiosidades</h1>
            <p>O conceito de árvores remonta ao início da ciência da computação, quando pioneiros buscavam estruturar dados hierárquicos de forma mais eficiente. O uso das árvores binárias de busca evoluiu ao longo do tempo, com a introdução de árvores balanceadas para melhorar a eficiência das operações.</p>

            <h1 id="ATvariacoes">Variações</h1>
            <p>Para resolver problemas de balanceamento e otimizar a busca, existem as seguintes variações da Árvore Trie:</p>
            <ul>
                <li><strong>Vantagens</strong>: Árvores balanceadas com a diferença de altura entre os filhos esquerdo e direito de qualquer nó não podendo ser superior a 1.</li>
                <li><strong>Desvantagens</strong>: Árvores balanceadas que utilizam cores (vermelho e preto) para garantir que a árvore permaneça balanceada após inserções e remoções.</li>
            </ul>

            <h1 id="ATconclusao">Conclusão</h1>
            <p>As Árvores Trie  é uma estrutura de dados fundamental em cenários que exigem armazenamento e busca eficiente de strings ou sequências..</p>
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