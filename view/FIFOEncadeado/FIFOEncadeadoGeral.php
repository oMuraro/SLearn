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
    <link rel="stylesheet" href="../../css/FIFOEncadeado.css">
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
            <a href="#implementacao" id="link-conteudo">2. Implementação</a>
            <a href="#aplicacoes" id="link-conteudo">3. Aplicações</a>
            <a href="#variacoes" id="link-conteudo">4. Variações</a>
            <a href="#conclusao" id="link-conteudo">5. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Filas de Prioridades Encadeadas</h1>
            <p>Uma fila de prioridades é uma estrutura de dados abstrata (TAD - Tipo Abstrato de Dados) onde cada
                elemento possui uma prioridade associada. A ordem de remoção dos elementos é determinada pela sua
                prioridade: elementos com maior prioridade são removidos antes dos elementos com menor prioridade,
                independentemente da ordem de inserção. Quando implementada de forma encadeada, a fila de prioridades
                utiliza nós conectados, permitindo um tamanho dinâmico.</p>

            <h2>Conceito de Fila de Prioridade</h2>
            <p>Em uma fila de prioridades, os elementos não são simplesmente inseridos na ordem de chegada (como em uma
                fila FIFO tradicional), mas sim de acordo com a sua prioridade. Por exemplo, em um hospital, pacientes
                com condições mais graves (maior prioridade) são atendidos antes dos pacientes com condições menos
                graves, independentemente da ordem de chegada.</p>

            <h2>Operações Principais</h2>
            <p>As operações de uma fila de prioridades encadeada são similares às de uma fila tradicional, mas com a
                adição do conceito de prioridade:</p>

            <ul>
                <li><strong>Enqueue:</strong> Adicionar um elemento à fila de acordo com sua prioridade. O elemento será
                    inserido em uma posição correspondente à sua prioridade.</li>
                <li><strong>Dequeue:</strong> Remover o elemento com a maior prioridade da fila. Se dois elementos
                    tiverem a mesma prioridade, o primeiro a ser inserido será o primeiro a ser removido.</li>
                <li><strong>Front/Peek:</strong> Acessar o elemento com a maior prioridade sem removê-lo da fila.</li>
                <li><strong>IsEmpty:</strong> Verificar se a fila está vazia. Retorna um valor booleano indicando se há
                    ou não elementos na fila.</li>
                <li><strong>Size:</strong> Retornar o número de elementos na fila.</li>
            </ul>

            <h1 id="implementacao">Implementação</h1>
            <p>Filas de prioridades podem ser implementadas de várias formas. Uma implementação comum utiliza
                <strong>listas encadeadas</strong>, o que permite que a fila tenha um tamanho dinâmico e cresça conforme
                a necessidade.
            </p>

            <h2>Usando Listas Encadeadas</h2>
            <p><strong>Vantagens:</strong> Uma fila de prioridades encadeada não tem limite fixo de tamanho. A inserção
                de elementos é feita de acordo com suas prioridades, mantendo a fila organizada. O uso de memória é
                eficiente, pois os elementos são adicionados dinamicamente.</p>
            <br>
            <p><strong>Desvantagens:</strong> A inserção de elementos pode ser mais lenta do que em uma fila
                tradicional, já que é necessário encontrar a posição correta para cada elemento com base em sua
                prioridade.</p>

            <section class="codigo">
                <textarea disabled>
        using System;

        public class Node<T>
        {
            public T Data { get; set; }
            public int Priority { get; set; }
            public Node<T> Next { get; set; }

            public Node(T data, int priority)
            {
                Data = data;
                Priority = priority;
                Next = null;
            }
        }

        public class PriorityQueue<T>
        {
            private Node<T> front;

            public PriorityQueue()
            {
                front = null;
            }

            public void Enqueue(T item, int priority)
            {
                Node<T> newNode = new Node<T>(item, priority);

                if (front == null || front.Priority < priority)
                {
                    newNode.Next = front;
                    front = newNode;
                }
                else
                {
                    Node<T> temp = front;
                    while (temp.Next != null && temp.Next.Priority >= priority)
                    {
                        temp = temp.Next;
                    }
                    newNode.Next = temp.Next;
                    temp.Next = newNode;
                }
            }

            public T Dequeue()
            {
                if (IsEmpty())
                {
                    throw new InvalidOperationException("Dequeue from empty queue");
                }
                T value = front.Data;
                front = front.Next;
                return value;
            }

            public T Front()
            {
                if (IsEmpty())
                {
                    throw new InvalidOperationException("Queue is empty");
                }
                return front.Data;
            }

            public bool IsEmpty()
            {
                return front == null;
            }

            public int Size()
            {
                int count = 0;
                Node<T> temp = front;
                while (temp != null)
                {
                    count++;
                    temp = temp.Next;
                }
                return count;
            }
        }

        public class Program
        {
            public static void Main()
            {
                PriorityQueue<string> queue = new PriorityQueue<string>();
                queue.Enqueue("Paciente A", 2);
                queue.Enqueue("Paciente B", 5);
                queue.Enqueue("Paciente C", 3);
                Console.WriteLine(queue.Front());  // Output: Paciente B
                Console.WriteLine(queue.Dequeue());  // Output: Paciente B
                Console.WriteLine(queue.Size()); // Output: 2
            }
        }
    </textarea>
            </section>

            <h1 id="aplicacoes">Aplicações de Filas de Prioridades</h1>
            <p>Filas de prioridades são amplamente usadas em sistemas que precisam lidar com múltiplas tarefas, onde
                algumas tarefas têm maior prioridade que outras. Aqui estão algumas aplicações comuns:</p>

            <h2>Gerenciamento de Processos</h2>
            <p>Em sistemas operacionais, filas de prioridades são usadas para gerenciar a execução de processos.
                Processos com maior prioridade são alocados ao processador antes de processos com prioridade menor.</p>

            <h2>Algoritmos de Grafos</h2>
            <p>Em algoritmos de grafos, como o algoritmo de Dijkstra para encontrar o caminho mais curto, filas de
                prioridades são usadas para selecionar o próximo nó a ser processado com base em sua distância mínima.
            </p>

            <h2>Servidores de Rede</h2>
            <p>Em servidores de rede, filas de prioridades são usadas para garantir que requisições mais importantes
                sejam atendidas antes de outras. Isso é comum em sistemas que gerenciam recursos limitados.</p>

            <h1 id="variacoes">Variações de Filas de Prioridades</h1>
            <p><strong>Min-Heap e Max-Heap:</strong> Em vez de listas encadeadas, filas de prioridades também podem ser
                implementadas usando heaps. Um <strong>Min-Heap</strong> garante que o menor elemento seja sempre
                removido primeiro, enquanto um <strong>Max-Heap</strong> garante que o maior seja removido.</p>
            <br>
            <p><strong>Filas com Vários Níveis de Prioridade:</strong> Algumas filas de prioridade permitem múltiplos
                níveis de prioridade, onde elementos com a mesma prioridade podem ser processados de acordo com sua
                ordem de chegada (FIFO dentro de cada nível).</p>

            <h1 id="conclusao">Conclusão</h1>
            <p>Filas de prioridades são uma estrutura de dados fundamental em muitos sistemas computacionais e
                algoritmos. Elas permitem a manipulação eficiente de elementos com diferentes níveis de importância,
                garantindo que as tarefas mais críticas sejam processadas primeiro. Sua flexibilidade e versatilidade
                fazem delas uma ferramenta indispensável em áreas como gerenciamento de processos, algoritmos de
                otimização e sistemas de rede.</p>
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