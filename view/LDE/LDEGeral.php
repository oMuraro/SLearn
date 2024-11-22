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
    <link rel="stylesheet" href="../../css/LDE.css">
    <title>Lista Duplamente Encadeada</title>
</head>
<body>
    <header>
        <!-- <img class="logo" src="img/logo.png" alt="Logotipo"> -->
        <a href="../../home.php"><h1>C#LEARN</h1></a>

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
        <a href="#funcLDE" id="link-conteudo">2. Funcionamento</a>
        <a href="#finalLDE" id="link-conteudo">3. Conclusão</a>
    </section>

    <section class="information">
        <h1 id="intro">Introdução à Lista Duplamente Encadeada</h1>
        <p>Nesta Introdução, vamos ver os conceitos básicos da lista duplamente encadeada. Veremos como essa
            estrutura de dados é fundamental na computação e como ela é diferente de outras estruturas, como a Lista
            Simplesmente Encadeada e Arrays.</p>

        <h2>Definição</h2>
        <p>A Lista Duplamente Encadeada é uma estrutura de dados onde cada elemento é um nó que contém não apenas um
            valor, mas também referências tanto para o elemento anterior quanto para o próximo na sequência.</p>

        <h2>Funcionamento</h2>
        <p>Em uma Lista Duplamente Encadeada, cada nó contém três campos: o valor propriamente dito e dois
            ponteiros, um para o próximo nó e outro para o nó anterior. Esses ponteiros permitem percorrer a lista
            tanto no sentido do próximo elemento quanto no sentido do elemento anterior.</p>

        <h2>Vantagens</h2>
        <ul>
            <li><strong>Inserção e remoção eficientes</strong>: Em comparação com outras estruturas de dados como
                arrays, as listas duplamente encadeadas permitem inserções e remoções eficientes em qualquer ponto
                da lista.</li>
            <li><strong>Percurso reverso</strong>: A presença de ponteiros para o nó anterior permite percorrer
                a lista tanto no sentido convencional quanto no sentido inverso, o que pode ser útil em diversas
                situações.</li>
            <li><strong>Implementação de pilhas e filas eficientes</strong>: As listas duplamente encadeadas
                oferecem uma base sólida para a implementação de estruturas de dados como pilhas e filas.</li>
        </ul>

        <h2>Exemplo de Implementação</h2>
        <p>Aqui está um exemplo simples de uma lista duplamente encadeada em C++:</p>

        <section class="codigo">
            <textarea disabled>
                #include <iostream>

                using namespace std;

                // Definição da estrutura do nó
                struct Node {
                    int data;
                    Node* prev;
                    Node* next;
                    Node(int val) : data(val), prev(nullptr), next(nullptr) {}
                };

                // Definição da classe ListaDuplamenteEncadeada
                class ListaDuplamenteEncadeada {
                    private:
                        Node* head;
                    public:
                        ListaDuplamenteEncadeada() : head(nullptr) {}
                
                        // Método para inserir no início da lista
                        void inserirInicio(int val) {
                            Node* novo = new Node(val);
                            if (!head) {
                                head = novo;
                            } else {
                                novo->next = head;
                                head->prev = novo;
                                head = novo;
                            }
                        }

                    // Método para imprimir a lista
                    void imprimir() {
                        Node* temp = head;
                        while (temp) {
                            cout &lt;&lt; temp->data &lt;&lt; " ";
                            temp = temp->next;
                        }
                        cout &lt;&lt; endl;
                    }
                };

                int main() {
                    ListaDuplamenteEncadeada lista;
                    lista.inserirInicio(3);
                    lista.inserirInicio(2);
                    lista.inserirInicio(1);
                    lista.imprimir(); // Saída: 1 2 3
                    return 0;
                }
            </textarea>
        </section>

        <p>A lista duplamente encadeada é uma estrutura de dados versátil e eficiente que oferece vantagens
            significativas em comparação com outras estruturas. No entanto, a escolha da estrutura de dados
            adequada depende das necessidades específicas de cada aplicação.</p>



        <h1 id="funcLDE">Funcionamento da Lista Duplamente Encadeada</h1>
        <p>Funcionamento interno da Lista Duplamente Encadeada. Veremos como os nós são estruturados e como os
            ponteiros são utilizados para permitir operações eficientes de inserção, remoção e navegação na lista.
        </p>

        <h2>Estrutura dos Nós</h2>
        <p>Cada nó em uma Lista Duplamente Dncadeada contém três campos: o valor do elemento, um ponteiro para o
            próximo nó e um ponteiro para o nó anterior.</p>

        <h2>Inserção e Remoção</h2>
        <p>As operações de inserção e remoção em uma lista duplamente encadeada são eficientes, especialmente quando
            comparadas com arrays. Isso ocorre porque não é necessário realocar todos os elementos adjacentes, como
            em arrays, para inserir ou remover um elemento em qualquer posição.</p>

        <h2>Navegação na Lista</h2>
        <p>Graças aos ponteiros para o nó anterior e próximo, é possível percorrer a lista tanto no sentido
            convencional quanto no sentido inverso, tornando-a uma estrutura de dados versátil e adaptável a
            diversas situações.</p>

        <h2>Implementação</h2>
        <p>Veja abaixo um exemplo simples de implementação de uma lista duplamente encadeada em C++:</p>

        <section class="codigo">
            <textarea disabled>
                #include <iostream>

                using namespace std;

                // Definição da estrutura do nó
                struct Node {
                    int data;
                    Node* prev;
                    Node* next;
                    Node(int val) : data(val), prev(nullptr), next(nullptr) {}
                };

                // Definição da classe ListaDuplamenteEncadeada
                class ListaDuplamenteEncadeada {
                    private:
                        Node* head;
                    public:
                        ListaDuplamenteEncadeada() : head(nullptr) {}

                    // Método para inserir no início da lista
                    void inserirInicio(int val) {
                        Node* novo = new Node(val);
                        if (!head) {
                            head = novo;
                        } else {
                            novo->next = head;
                            head->prev = novo;
                            head = novo;
                        }
                    }

                    // Método para imprimir a lista
                    void imprimir() {
                        Node* temp = head;
                        while (temp) {
                            cout &lt;&lt; temp->data &lt;&lt; " ";
                            temp = temp->next;
                        }
                        cout &lt;&lt; endl;
                    }
                };

                int main() {
                    ListaDuplamenteEncadeada lista;
                    lista.inserirInicio(3);
                    lista.inserirInicio(2);
                    lista.inserirInicio(1);
                    lista.imprimir(); // Saída: 1 2 3
                    return 0;
                }
            </textarea>
        </section>


        <p style="padding-top: 10px;">Entender o funcionamento da lista duplamente encadeada é fundamental para o desenvolvimento de aplicações eficientes e robustas. Na próxima aula, vamos concluir nossa exploração sobre essa estrutura de dados.</p>
        
        
        
        <h1 id="finalLDE">Conclusão sobre a Lista Duplamente Encadeada</h1>
            <p>Chegamos ao fim sobre a Lista Duplamente Encadeada. Nesta aula, vamos revisar os conceitos aprendidos e discutir algumas aplicações práticas dessa estrutura de dados.</p>

            <h2>Aplicações Práticas</h2>
            <p>A lista duplamente encadeada é amplamente utilizada em diversas áreas da computação, incluindo bancos de dados, editores de texto e compiladores. Sua capacidade de inserção, remoção e navegação eficientes a tornam uma escolha popular para muitos cenários.</p>

            <h2>Considerações Finais</h2>
            <p>Entender a Lista Duplamente Encadeada é um passo importante no aprendizado de estruturas de dados, tendo as competências necessárias para aplicar em prática os conceitos básicos introduzidos aqui.</p>
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