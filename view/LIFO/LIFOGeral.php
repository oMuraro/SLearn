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
    <link rel="stylesheet" href="../../css/LIFO.css">
    <title>Lista Duplamente Encadeada</title>
</head>

<body>
    <header>
        <!-- <img class="logo" src="img/logo.png" alt="Logotipo"> -->
        <a href="../../home.php">
            <h1>C#LEARN</h1>
        </a>

        <div class="headerBtns">
            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton1">Conteudos<span id="arrow1" class="arrow1Down"></span></button>
                <div id="dropdownMenu1" class="dropdown-content">
                    <a href="../TAD/TADGeral.php">Tipo Abstrato de Dados</a>
                    <a href="../LSE/LSEGeral.php">Lista Simplesmente Encadeada</a>
                    <a href="../LDE/LDEGeral.php">Lista Duplamente Encadeada</a>
                    <a href="../LIFO/LIFOGeral.php">Pilhas Encadeadas</a>
                    <a href="../FIFO/FIFOGeral.php">Filas Encadeadas</a>
                    <a href="../FIFOEncadeado/FIFOEncadeadoGeral.php">Filas de Prioridades Encadeadas</a>
                    <a href="../ABB/ABBGeral.php">Árvore Binária de Busca</a>
                    <a href="../AT/ATGeral.php">Árvore Trie</a>
                </div>
            </div>

            <a href="../quizQuestions.php">
                <button id="playBtn"></button>
            </a>

            <div class="dropdown">
                <button class="dropdown-button" id="dropdownButton2">Itens<span id="arrow2" class="arrow2Down"></span></button>
                <div id="dropdownMenu2" class="dropdown-content">
                    <a href="../shop/shop.php">Loja</a>
                    <a href="../shop/inventory.php">Inventario</a>
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
            <a href="#LIFOimplementacao" id="link-conteudo">2. Implementação</a>
            <a href="#LIFOaplicacao" id="link-conteudo">3. Aplicações</a>
            <a href="#LIFOconclusao" id="link-conteudo">4. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Pilhas Encadeadas</h1>
            <p>Uma pilha é uma estrutura de dados abstrata (TAD - Tipo Abstrato de Dados) que segue o princípio LIFO
                (Last In, First Out). Isso significa que o último elemento a ser inserido é o primeiro a ser removido.
                Essa estrutura é amplamente utilizada em computação para resolver problemas em que a ordem dos dados
                precisa ser controlada de forma que o último item processado seja o primeiro a ser retirado.</p>

            <h2>Conceito de LIFO</h2>
            <p>Imagine uma pilha de pratos em um restaurante. Para colocar um prato novo, você o coloca no topo da
                pilha. Quando precisar de um prato, você pega o que está no topo, ou seja, o último que foi colocado. Da
                mesma forma, em uma pilha computacional, o último elemento inserido é o primeiro a ser removido. Esse
                comportamento é essencial em diversas aplicações computacionais, como gerenciamento de memória e
                execução de algoritmos.</p>

            <h2>Operações Principais</h2>
            <p>As operações fundamentais de uma pilha são simples, mas extremamente poderosas. Elas permitem o controle
                eficiente da sequência de dados. Aqui estão as operações básicas de uma pilha: </p>

            <ul>
                <li><strong>Push: </strong> Adicionar um elemento ao topo da pilha. Esta operação coloca o novo item
                    acima de todos os outros elementos.</li>
                <li><strong>Pop: </strong>Remover o elemento do topo da pilha. Como a pilha segue o princípio LIFO, o
                    último elemento inserido é o primeiro a ser removido.</li>
                <li><strong>Top/Peek: </strong>: As listas duplamente encadeadas
                    oferecem uma base sólida para a implementação de estruturas de dados como pilhas e filas.</li>
                <li><strong>IsEmpty: </strong> Verificar se a pilha está vazia. Retorna um valor booleano indicando se
                    há ou não elementos na pilha.</li>
                <li><strong>Size: </strong> Retornar o número de elementos na pilha. Isso ajuda a determinar a
                    quantidade de itens armazenados.</li>
            </ul>

            <h1 id="LIFOimplementacao">Implementação</h1>
            <p>As pilhas podem ser implementadas de várias maneiras, dependendo dos requisitos de desempenho e do uso de
                memória. As duas abordagens mais comuns são o uso de arrays e listas encadeadas.</p>

            <h2>Usando Arrays</h2>
            <p><strong>Vantagens:</strong> Simples de implementar e o acesso ao topo da pilha é muito rápido, geralmente
                em tempo constante O(1).</p>
            <br>
            <p><strong>Desvantagens:</strong> O tamanho da pilha é fixo, ou seja, a capacidade da pilha deve ser
                definida antecipadamente. Se a pilha atingir a capacidade máxima, um redimensionamento será necessário,
                o que pode ser uma operação custosa em termos de desempenho.</p>

            <h2>Usando Listas Encadeadas</h2>
            <p><strong>Vantagens:</strong> As listas encadeadas permitem uma pilha de tamanho dinâmico, ou seja, sem
                limites fixos. A pilha pode crescer e encolher conforme a necessidade, sem se preocupar com a
                capacidade.</p>
            <br>
            <p><strong>Desvantagens:</strong> O uso de memória é um pouco maior devido à necessidade de armazenar
                ponteiros para o próximo elemento em cada nó da lista.</p>

            <section class="codigo">
                <textarea disabled>
                    using System;
                    using System.Collections.Generic;
                    
                    public class Stack<T>
                    {
                        private List<T> items = new List<T>();
                    
                        public void Push(T item)
                        {
                            items.Add(item);
                        }
                    
                        public T Pop()
                        {
                            if (!IsEmpty())
                            {
                                T item = items[items.Count - 1];
                                items.RemoveAt(items.Count - 1);
                                return item;
                            }
                            else
                            {
                                throw new InvalidOperationException("Pop from empty stack");
                            }
                        }
                    
                        public T Top()
                        {
                            if (!IsEmpty())
                            {
                                return items[items.Count - 1];
                            }
                            else
                            {
                                throw new InvalidOperationException("Top from empty stack");
                            }
                        }
                    
                        public bool IsEmpty()
                        {
                            return items.Count == 0;
                        }
                    
                        public int Size()
                        {
                            return items.Count;
                        }
                    }
                    
                    public class Program
                    {
                        public static void Main()
                        {
                            Stack<int> stack = new Stack<int>();
                            stack.Push(1);
                            stack.Push(2);
                            Console.WriteLine(stack.Top());  // Output: 2
                            Console.WriteLine(stack.Pop());  // Output: 2
                            Console.WriteLine(stack.Size()); // Output: 1
                        }
                    }
                    
            </textarea>
            </section>

            <h1 id="LIFOaplicacao">Aplicações de Pilhas</h1>
            <p>As pilhas têm diversas aplicações no mundo real e em sistemas computacionais, sendo usadas para resolver
                problemas onde é necessário manipular dados de maneira controlada. Aqui estão alguns exemplos
                importantes:
            </p>

            <h2>Avaliação de Expressões</h2>
            <p>Pilhas são usadas para avaliar expressões aritméticas e lógicas, como em calculadoras que utilizam
                notações pós-fixa (notação polonesa reversa) ou infixa.</p>

            <h2>Backtracking</h2>
            <p>Pilhas são usadas em algoritmos de backtracking, como resolução de labirintos e problemas de caminho
                mínimo, onde os passos anteriores precisam ser revertidos para tentar novas opções.</p>

            <h2>Gerenciamento de Funções</h2>
            <p>A pilha de chamadas (call stack) é usada em linguagens de programação para armazenar o contexto de
                funções que estão sendo chamadas, permitindo o controle de recursividade e manutenção de dados locais.
            </p>

            <h2>Desfazer/Ações Reversíveis</h2>
            <p>Editores de texto e programas de design gráfico utilizam pilhas para implementar a funcionalidade de
                "desfazer" (undo), onde as ações mais recentes são revertidas primeiro.
            </p>

            <h2>Variações de Pilhas</h2>
            <p><strong>Pilhas Limitadas: </strong> Uma pilha limitada tem uma capacidade máxima de elementos. Quando a
                pilha atinge essa capacidade, novas
                operações de push são bloqueadas até que algum elemento seja removido.</p>
            <br>
            <p><strong>Pilhas de Dois Pontos: </strong> Algumas implementações de pilhas permitem o uso de dois
                ponteiros, um no início e outro no final, permitindo operações de push e pop em ambas as extremidades.
                Essas pilhas são conhecidas como deque (double-ended queue).</p>

            <h1 id="LIFOconclusao">Conclusão</h1>
            <p>As pilhas são uma das estruturas de dados fundamentais em ciência da computação, com aplicações em
                algoritmos, sistemas operacionais, e no design de software. Seu comportamento simples e eficiente
                torna-as uma ferramenta indispensável para a manipulação de dados e resolução de problemas complexos.
            </p>
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

    <script src="../../scripts/dropdownBtn.js"></script>
</body>

</html>