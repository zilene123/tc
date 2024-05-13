-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/05/2024 às 14:33
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
-- Banco de dados: `agendamentos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Telefone` varchar(20) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Servico` enum('Barbeiro','Cabeleireiro','Manicure','Spa') NOT NULL,
  `Dia` date NOT NULL,
  `Horario` time NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `id_funcionario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `Nome`, `Telefone`, `Email`, `Servico`, `Dia`, `Horario`, `Senha`, `id_funcionario`) VALUES
(109, 'Monica Sampaio', '84996121545', 'monisan@gmail.com', 'Spa', '2024-05-09', '14:00:00', 'moni', NULL),
(110, 'Ruan', '99877332645', 'ruancarlos@gmail.com', 'Spa', '2024-05-08', '17:00:00', 'aaa', NULL),
(111, 'Flavia', '84991956235', 'car@gmail.com', 'Cabeleireiro', '2024-05-14', '10:00:00', 'aaa', NULL),
(112, 'Zilene', '95965623', 'zilene@gmail.com', 'Manicure', '2024-05-22', '14:00:00', 'ggggg', NULL),
(113, 'Zilene', '95965623', 'julicesar@gmail.com', 'Spa', '2024-05-12', '10:00:00', 'hhhh', NULL),
(114, 'Valdeni de Oliveira', '84991956235', 'carlos@gmail.com', 'Spa', '2024-05-12', '14:00:00', 'aaa', NULL),
(115, 'Bruna', '8456952315', 'sthefany@gmail.com', 'Cabeleireiro', '2024-05-15', '12:00:00', '123', NULL),
(116, 'Bruna', '84751265413', 'carlos@gmail.com', 'Manicure', '2024-05-11', '13:00:00', '123456', NULL),
(117, 'Valdeni de Oliveira', '84751265413', 'carlos@gmail.com', 'Barbeiro', '2024-05-14', '10:00:00', '258', NULL),
(118, 'Zilene', '8456952315', 'ruancarlos@gmail.com', 'Spa', '2024-05-14', '17:00:00', 'aaa', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionario` (`id_funcionario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
