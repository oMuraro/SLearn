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
    <title>Listas Simplesmente Encadeadas</title>
    <link rel="stylesheet" href="../../css/LSE.css">
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
            <a href="#funcLSE" id="link-conteudo">2. Funcionamento</a>
            <a href="#finalLSE" id="link-conteudo">3. Conclusão</a>
        </section>
        <section class="information">
            <h1 id="intro">Listas Simplesmente Encadeadas (LSEs)</h1>
            <p>As Listas Simplesmente Encadeadas são estruturas de dados fundamentais na ciência da computação, empregadas para armazenar uma coleção de elementos de forma sequencial. Elas consistem em nós, onde cada nó armazena um elemento de dados e uma referência para o próximo nó na sequência.</p>
            <ul>
                <li><strong>Inserir Elemento</strong>: Adiciona um novo elemento à lista.</li>
                <li><strong>Remover Elemento</strong>: Remove um elemento específico da lista.</li>
                <li><strong>Buscar Elemento</strong>: Procura por um elemento na lista.</li>
                <li><strong>Acessar Elemento</strong>: Recupera um elemento em uma determinada posição na lista.</li>
                <li><strong>Verificar Vazio</strong>: Verifica se a lista está vazia.</li>
            </ul>

            <h2>Principais Características das Listas Simplesmente Encadeadas:</h2>
            <ul>
                <li><strong>Estrutura Encadeada Unidirecional</strong>: Cada elemento na lista possui um único ponteiro que aponta para o próximo elemento na sequência, formando uma cadeia unidirecional.</li>
                <li><strong>Flexibilidade na Inserção e Remoção</strong>: As Listas Simplesmente Encadeadas permitem a inserção e remoção eficientes de elementos em qualquer posição, sem a necessidade de realocação de memória.</li>
                <li><strong>Uso Eficiente de Memória Dinâmica</strong>: Alocam apenas a quantidade de memória necessária para cada elemento, o que as torna mais eficientes em termos de uso de memória do que estruturas de dados estáticas como arrays.</li>
                <li><strong>Encapsulamento e Modularidade</strong>: Os detalhes de implementação da lista são encapsulados, permitindo que os programadores se concentrem na interface pública da lista, facilitando a manutenção e reutilização do código.</li>
                <li><strong>Simplicidade na Manipulação:</strong> A manipulação de elementos em uma Lista Simplesmente Encadeada é geralmente mais simples do que em outras estruturas de dados, devido à sua natureza linear e à facilidade de alteração da ordem dos elementos.</li>
            </ul>

            <h2>Nó (Node):</h2>
            <p>Em estruturas de dados como listas encadeadas, árvores e grafos, um "nó" é uma unidade básica de armazenamento. Ele contém um valor (ou dados) e uma ou mais referências a outros nós. Em uma lista encadeada, por exemplo, um nó geralmente contém um valor e um ponteiro para o próximo nó na lista.</p>

            <section class="video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Uk8v7gB2rHk?si=S7TRUx8hTp_GHcoK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </section>
            <h1 id="funcLSE">Métodos de Uso (LSEs)</h1>
            <ul>
                <li><strong>Inserção no início</strong>: Adiciona um novo elemento no início da lista.</li>
                <li><strong>Inserção no final</strong>: Adiciona um novo elemento no final da lista.</li>
                <li><strong>Inserção no meio</strong>: Adiciona um novo elemento em uma posição específica da lista.</li>
                <li><strong>Remoção do início</strong>: Remove o primeiro elemento da lista.</li>
                <li><strong>Remoção do final</strong>: Remove o último elemento da lista.</li>
                <li><strong>Remoção no meio</strong>: Remove um elemento em uma posição específica da lista.</li>
                <li><strong>Busca</strong>: Busca um elemento específico na lista.</li>
                <li><strong>Travessia</strong>: Percorre todos os elementos da lista.</li>
            </ul>

            <h2>Exemplos de Uso:</h2>

            <h3>Inserção no início:</h3>
            <section class="codigo">
                <textarea disabled>
            // Cria um novo nó
            Nodo novo = new Nodo(valor);
            // Faz o novo nó apontar para o antigo primeiro nó
            novo.proximo = primeiro;
            // Define o novo nó como o primeiro da lista
            primeiro = novo;
                </textarea>
            </section>

            <h3>Inserção no final:</h3>
            <section class="codigo">
                <textarea disabled>
            // Cria um novo nó
            Nodo novo = new Nodo(valor);
            // Se a lista estiver vazia, define o novo nó como primeiro
            if (vazia())
                primeiro = novo;
            else {
                // Percorre a lista até o último nó
                Nodo atual = primeiro;
                while (atual.proximo != null)
                    atual = atual.proximo;
                // Faz o último nó apontar para o novo nó
                atual.proximo = novo;
            }
         </textarea>
            </section>

            <h3>Inserção no meio:</h3>
            <section class="codigo">
                <textarea disabled>
            // Cria um novo nó
            Nodo novo = new Nodo(valor);
            // Percorre a lista até encontrar a posição específica (posição - 1)
            Nodo atual = primeiro;
            for (int i = 1; i < posicao && atual != null; i++) {
                atual = atual.proximo;
            }
            // Se a posição for válida, insere o novo nó
            if (atual != null) {
                novo.proximo = atual.proximo;
                atual.proximo = novo;
            }
         </textarea>
            </section>

            <h3>Remoção do início:</h3>
            <section class="codigo">
                <textarea disabled>
            // Remove o primeiro nó da lista
            if (primeiro != null) {
                primeiro = primeiro.proximo;
            }
        </textarea>
            </section>

            <h3>Remoção do final:</h3>
            <section class="codigo">
                <textarea disabled>
            // Se houver apenas um nó na lista, remove-o
            if (primeiro != null && primeiro.proximo == null) {
                primeiro = null;
            } else if (primeiro != null) {
                // Percorre a lista até o penúltimo nó
                Nodo atual = primeiro;
                while (atual.proximo.proximo != null)
                    atual = atual.proximo;
                // Remove o último nó
                atual.proximo = null;
            }
        </textarea>
            </section>

            <h3>Remoção no meio:</h3>
            <section class="codigo">
                <textarea disabled>
            // Percorre a lista até encontrar a posição específica (posicao - 1)
            Nodo atual = primeiro;
            for (int i = 1; i < posicao && atual != null; i++) {
                atual = atual.proximo;
            }
            // Se a posição for válida, remove o nó
            if (atual != null && atual.proximo != null) {
                atual.proximo = atual.proximo.proximo;
            }
        </textarea>
            </section>

            <h3>Busca:</h3>
            <section class="codigo">
                <textarea disabled>
            // Percorre a lista até encontrar o elemento desejado
            Nodo atual = primeiro;
            while (atual != null && atual.valor != valorBuscado)
                atual = atual.proximo;
            // Se encontrou, retorna o nó atual; senão, retorna null
            return atual;
        </textarea>
            </section>

            <h3>Travessia:</h3>
            <section class="codigo">
                <textarea disabled>
            // Percorre a lista e imprime cada valor
            Nodo atual = primeiro;
            while (atual != null) {
                System.out.println(atual.valor);
                atual = atual.proximo;
            }
        </textarea>
            </section>
        
        <h1 id="finalLSE">Conclusão sobre a Lista Duplamente Encadeada</h1>
            <p>Compreender as Listas Simplesmente Encadeadas é fundamental no estudo de estruturas de dados, fornecendo a base necessária para manipular elementos de maneira eficiente e flexível em diversas aplicações. A implementação correta dessas listas permite um gerenciamento eficaz de dados dinâmicos.</p>
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