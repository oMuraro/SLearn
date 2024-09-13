-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Set-2024 às 22:10
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(255) NOT NULL,
  `Pergunta` varchar(255) NOT NULL,
  `Certa` varchar(255) NOT NULL,
  `Errada1` varchar(255) NOT NULL,
  `Errada2` varchar(255) NOT NULL,
  `Errada3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `Pergunta`, `Certa`, `Errada1`, `Errada2`, `Errada3`) VALUES
(1, 'Em uma lista simplesmente encadeada em C#, qual é a característica principal de cada nó?', 'Cada nó tem uma referência para o próximo nó e um valor associado.', 'Cada nó tem uma referência para o próximo nó e para o nó anterior.', 'Cada nó tem uma referência para o nó anterior e um valor associado.', 'Cada nó contém uma referência para o próximo nó, o nó anterior e um valor associado.'),
(2, 'Em uma lista simplesmente encadeada em C#, qual é a característica principal de cada nó?', 'Cada nó tem uma referência para o próximo nó e um valor associado.', 'Cada nó tem uma referência para o próximo nó e para o nó anterior.', 'Cada nó tem uma referência para o nó anterior e um valor associado.', 'Cada nó contém uma referência para o próximo nó, o nó anterior e um valor associado.'),
(3, 'Em uma lista simplesmente encadeada em C#, qual é a característica principal de cada nó?', 'Cada nó tem uma referência para o próximo nó e um valor associado.', 'Cada nó tem uma referência para o próximo nó e para o nó anterior.', 'Cada nó tem uma referência para o nó anterior e um valor associado.', 'Cada nó contém uma referência para o próximo nó, o nó anterior e um valor associado.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`) VALUES
(4, 'teste', '$2y$10$nMIpcu8OFK6N88cwq6kVj.KunEqk55B8oAG45eSYv5FrinN3p8P8u'),
(5, '', '$2y$10$6vAeKi4wSNqfsKkKOeKPxuAo8NhmZOGkF7FvS9FXtzjtzahr9EMO2'),
(6, 'Em uma lista simplesmente encadeada em C#, qual é a característica principal de cada nó?', '$2y$10$uJ6e4waBz8yQGDt6F9oxyeHE53vtRPsuBww.icrKGcXbd6SkvVvU6');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
