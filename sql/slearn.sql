-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/10/2024 às 03:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `slearn`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(255) NOT NULL,
  `tipoPergunta` varchar(15) NOT NULL,
  `Pergunta` varchar(255) NOT NULL,
  `Certa` varchar(255) NOT NULL,
  `Errada1` varchar(255) NOT NULL,
  `Errada2` varchar(255) NOT NULL,
  `Errada3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `tipoPergunta`, `Pergunta`, `Certa`, `Errada1`, `Errada2`, `Errada3`) VALUES
(1, '', 'Em uma lista simplesmente encadeada em C#, qual é a característica principal de cada nó?', 'Cada nó tem uma referência para o próximo nó e um valor associado.', 'Cada nó tem uma referência para o próximo nó e para o nó anterior.', 'Cada nó tem uma referência para o nó anterior e um valor associado.', 'Cada nó contém uma referência para o próximo nó, o nó anterior e um valor associado.'),
(2, '', 'Em uma lista simplesmente encadeada em C#, qual é a característica principal de cada nó?', 'Cada nó tem uma referência para o próximo nó e um valor associado.', 'Cada nó tem uma referência para o próximo nó e para o nó anterior.', 'Cada nó tem uma referência para o nó anterior e um valor associado.', 'Cada nó contém uma referência para o próximo nó, o nó anterior e um valor associado.'),
(3, '', 'Em uma lista simplesmente encadeada em C#, qual é a característica principal de cada nó?', 'Cada nó tem uma referência para o próximo nó e um valor associado.', 'Cada nó tem uma referência para o próximo nó e para o nó anterior.', 'Cada nó tem uma referência para o nó anterior e um valor associado.', 'Cada nó contém uma referência para o próximo nó, o nó anterior e um valor associado.'),
(4, '', 'Sobre Tipos Abstratos de Dados (TADs), qual das seguintes afirmações é correta?', 'Um TAD define apenas as operações permitidas, sem se preocupar com a implementação interna.', 'Um TAD define tanto a estrutura de dados quanto os detalhes de implementação.', 'Um TAD só pode ser implementado usando listas.', 'Um TAD não pode ser implementado com pilhas ou filas.'),
(5, '', 'Qual é a principal característica de uma Lista Simplesmente Encadeada?', 'Cada nó tem um ponteiro apenas para o próximo nó na lista.', 'Cada nó tem um ponteiro para o próximo e o anterior.', 'Cada nó armazena dois ponteiros, um para o nó anterior e outro para o nó seguinte.', 'Cada nó é completamente independente, sem ponteiros.'),
(6, '', 'Qual a principal vantagem de uma Lista Simplesmente Encadeada sobre um vetor?', 'Facilidade em inserir e remover elementos no início ou no meio da lista.', 'Acesso direto a qualquer elemento da lista.', 'Ocupa menos memória do que um vetor.', 'Permite acesso aleatório de elementos em tempo constante.'),
(7, '', 'Qual é uma característica da Lista Duplamente Encadeada?', 'Cada nó armazena um ponteiro para o próximo e o anterior na lista.', 'Cada nó armazena um ponteiro apenas para o próximo nó.', 'A lista sempre tem um número par de nós.', 'A lista não permite remoção de elementos.'),
(8, '', 'Qual a principal vantagem de uma Lista Duplamente Encadeada em relação à Simplesmente Encadeada?', 'Acesso bidirecional, permitindo percorrer a lista em ambas as direções.', 'Menor consumo de memória.', 'Maior velocidade de inserção e remoção de elementos.', 'A capacidade de acessar elementos diretamente por índice.'),
(9, '', 'O que caracteriza uma Pilha Encadeada?', 'Os elementos são removidos no estilo Last In, First Out (LIFO).', 'Os elementos são acessados de forma aleatória.', 'Os elementos são removidos na ordem em que foram inseridos (FIFO).', 'Não há limite para o número de elementos na pilha.'),
(10, '', 'Em uma Pilha Encadeada, qual operação adiciona um novo elemento ao topo da pilha?', 'Push', 'Remove', 'Pop', 'Enqueue'),
(11, '', 'Qual das seguintes afirmativas é verdadeira sobre Filas Encadeadas?', 'O primeiro elemento a ser adicionado é o primeiro a ser removido (FIFO).', 'A fila segue o princípio Last In, First Out (LIFO).', 'O elemento removido é sempre o mais recente adicionado.', 'A fila não permite inserção de novos elementos depois que está cheia.'),
(12, '', 'Qual a diferença principal entre uma Fila Encadeada e uma Fila de Prioridades Encadeada?', 'Em uma Fila de Prioridades Encadeada, a remoção segue a ordem de prioridade dos elementos.', 'Em uma Fila de Prioridades Encadeada, a ordem de remoção é baseada na ordem de chegada.', 'Em uma Fila Encadeada, os elementos são sempre removidos em ordem aleatória.', 'Filas de Prioridades Encadeadas não permitem remoção de elementos.'),
(13, '', 'Qual operação é responsável por remover o elemento de maior prioridade em uma Fila de Prioridades Encadeada?', 'RemoveTop', 'Dequeue', 'Push', 'Pop');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`) VALUES
(4, 'teste', '$2y$10$nMIpcu8OFK6N88cwq6kVj.KunEqk55B8oAG45eSYv5FrinN3p8P8u'),
(5, '', '$2y$10$6vAeKi4wSNqfsKkKOeKPxuAo8NhmZOGkF7FvS9FXtzjtzahr9EMO2'),
(6, 'Em uma lista simplesmente encadeada em C#, qual é a característica principal de cada nó?', '$2y$10$uJ6e4waBz8yQGDt6F9oxyeHE53vtRPsuBww.icrKGcXbd6SkvVvU6');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
