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
    <link rel="stylesheet" href="../../css/FIFO.css">
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
            <a href="#FIFOimplementacao" id="link-conteudo">2. Implementação</a>
            <a href="#FIFOaplicacao" id="link-conteudo">3. Aplicações</a>
            <a href="#FIFOvariacoes" id="link-conteudo">4. Variações</a>
            <a href="#FIFOconclusao" id="link-conteudo">5. Conclusão</a>
        </section>

        <section class="information">
            <h1 id="intro">Filas Encadeadas</h1>
            <p>Uma fila é uma estrutura de dados abstrata (TAD - Tipo Abstrato de Dados) que segue o princípio FIFO
                (First In, First Out). Isso significa que o primeiro elemento a ser inserido é o primeiro a ser
                removido. A fila é uma estrutura amplamente utilizada para gerenciar processos onde a ordem de chegada
                precisa ser preservada, como em sistemas de atendimento ou em algoritmos que lidam com múltiplas
                tarefas.</p>

            <h2>Conceito de FIFO</h2>
            <p>Imagine uma fila em um supermercado. A pessoa que chega primeiro é a primeira a ser atendida. Da mesma
                forma, em uma fila computacional, o primeiro elemento inserido é o primeiro a ser removido. Esse
                comportamento é fundamental para diversas aplicações computacionais, como sistemas de espera e gestão de
                processos em sistemas operacionais.</p>

            <h2>Operações Principais</h2>
            <p>As operações fundamentais de uma fila permitem o controle da sequência de dados de forma eficiente. Aqui
                estão as operações básicas de uma fila:</p>

            <ul>
                <li><strong>Enqueue:</strong> Adicionar um elemento ao final da fila. Essa operação coloca o novo item
                    atrás de todos os outros elementos já presentes.</li>
                <li><strong>Dequeue:</strong> Remover o primeiro elemento da fila. Como a fila segue o princípio FIFO, o
                    primeiro elemento inserido é o primeiro a ser removido.</li>
                <li><strong>Front/Peek:</strong> Acessar o elemento no início da fila sem removê-lo. Isso é útil quando
                    se deseja visualizar o próximo item a ser processado sem alterá-lo.</li>
                <li><strong>IsEmpty:</strong> Verificar se a fila está vazia. Retorna um valor booleano indicando se há
                    ou não elementos na fila.</li>
                <li><strong>Size:</strong> Retornar o número de elementos na fila. Isso ajuda a determinar a quantidade
                    de itens armazenados.</li>
            </ul>

            <h1 id="FIFOimplementacao">Implementação</h1>
            <p>As filas podem ser implementadas de várias maneiras, dependendo dos requisitos de desempenho e da gestão
                de memória. As duas abordagens mais comuns são o uso de <strong>arrays</strong> e <strong>listas
                    encadeadas</strong>.</p>

            <h2>Usando Arrays</h2>
            <p><strong>Vantagens:</strong> Simples de implementar, com operações rápidas de acesso aos elementos no
                início e no final da fila.</p>
            <br>
            <p><strong>Desvantagens:</strong> O tamanho da fila é fixo, o que significa que a capacidade precisa ser
                determinada de antemão. Quando a fila atinge a capacidade máxima, pode ser necessário redimensionar, o
                que pode impactar o desempenho.</p>

            <h2>Usando Listas Encadeadas</h2>
            <p><strong>Vantagens:</strong> As listas encadeadas permitem uma fila de tamanho dinâmico, sem limites
                fixos. A fila pode crescer e diminuir conforme a necessidade, sem preocupações com capacidade
                pré-determinada.</p>
            <br>
            <p><strong>Desvantagens:</strong> O uso de memória pode ser um pouco maior devido ao armazenamento de
                ponteiros para o próximo elemento.</p>

            <section class="codigo">
                <textarea disabled>
        using System;

        public class Node<T>
        {
            public T Data { get; set; }
            public Node<T> Next { get; set; }

            public Node(T data)
            {
                Data = data;
                Next = null;
            }
        }

        public class Queue<T>
        {
            private Node<T> front;
            private Node<T> rear;
            private int count;

            public Queue()
            {
                front = null;
                rear = null;
                count = 0;
            }

            public void Enqueue(T item)
            {
                Node<T> newNode = new Node<T>(item);
                if (IsEmpty())
                {
                    front = newNode;
                    rear = newNode;
                }
                else
                {
                    rear.Next = newNode;
                    rear = newNode;
                }
                count++;
            }

            public T Dequeue()
            {
                if (!IsEmpty())
                {
                    T value = front.Data;
                    front = front.Next;
                    count--;
                    return value;
                }
                else
                {
                    throw new InvalidOperationException("Dequeue from empty queue");
                }
            }

            public T Front()
            {
                if (!IsEmpty())
                {
                    return front.Data;
                }
                else
                {
                    throw new InvalidOperationException("Queue is empty");
                }
            }

            public bool IsEmpty()
            {
                return count == 0;
            }

            public int Size()
            {
                return count;
            }
        }

        public class Program
        {
            public static void Main()
            {
                Queue<int> queue = new Queue<int>();
                queue.Enqueue(1);
                queue.Enqueue(2);
                Console.WriteLine(queue.Front());  // Output: 1
                Console.WriteLine(queue.Dequeue());  // Output: 1
                Console.WriteLine(queue.Size()); // Output: 1
            }
        }
    </textarea>
            </section>

            <h1 id="FIFOaplicacao">Aplicações de Filas</h1>
            <p>As filas têm várias aplicações no mundo real e em sistemas computacionais, sendo usadas para resolver
                problemas onde a ordem dos elementos precisa ser controlada. Aqui estão alguns exemplos importantes:</p>

            <h2>Gerenciamento de Processos</h2>
            <p>Em sistemas operacionais, filas são usadas para gerenciar processos que aguardam por tempo de CPU. Os
                processos são colocados em uma fila de espera e são atendidos na ordem de chegada.</p>

            <h2>Sistemas de Impressão</h2>
            <p>Filas são usadas para gerenciar documentos enviados para impressão. Cada documento enviado é enfileirado,
                e a impressora processa os documentos na ordem em que foram recebidos.</p>

            <h2>Simulação de Filas de Espera</h2>
            <p>Filas são amplamente utilizadas em simulações de sistemas de atendimento, como filas de espera em bancos,
                call centers ou aeroportos, onde a ordem de atendimento segue o princípio FIFO.</p>

            <h2>Buffers de Dados</h2>
            <p>Buffers de dados em sistemas de comunicação e transmissão utilizam filas para gerenciar dados à medida
                que são transmitidos ou recebidos, garantindo que os pacotes sejam processados na ordem correta.</p>

            <h1 id="FIFOvariacoes">Variações de Filas</h1>
            <p><strong>Filas Limitadas:</strong> Uma fila limitada tem uma capacidade máxima de elementos. Quando a fila
                atinge essa capacidade, novas operações de enqueue são bloqueadas até que algum elemento seja removido.
            </p>
            <br>
            <p><strong>Deque (Double-ended Queue):</strong> Uma fila de dois pontos, ou deque, permite que elementos
                sejam adicionados ou removidos tanto no início quanto no final da fila. Isso oferece flexibilidade
                adicional para algoritmos que requerem inserções ou remoções em ambas as extremidades.</p>

            <h1 id="FIFOconclusao">Conclusão</h1>
            <p>As filas são uma estrutura de dados essencial na ciência da computação, com aplicações em diversas áreas,
                como sistemas operacionais, redes de comunicação e algoritmos. Sua simplicidade e eficiência no controle
                da ordem dos dados fazem dela uma ferramenta indispensável para o gerenciamento de processos e fluxos de
                dados.</p>

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