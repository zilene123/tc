-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/06/2024 às 15:14
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
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Servico` enum('Barbeiro','Cabeleireiro','Manicure','Spa') NOT NULL,
  `Dia` date NOT NULL,
  `Horario` time NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Valor` decimal(10,2) DEFAULT NULL,
  `Descricao` text DEFAULT NULL,
  `Status_Atendimento` enum('Cliente Ausente','Atendido') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `Nome`, `Telefone`, `Email`, `Servico`, `Dia`, `Horario`, `Senha`, `Valor`, `Descricao`, `Status_Atendimento`) VALUES
(1, 'Amanda Brazão', '84991956235', 'amanda@gmail.com', 'Spa', '2024-05-17', '15:00:00', 'descançar', 40.00, 'nada a acrecentar', 'Atendido'),
(3, 'Carmela', '84996121545', 'car@gmail.com', 'Manicure', '2024-05-23', '15:00:00', 'aaa', 100.00, 'Nada a acrecentar', 'Atendido'),
(4, 'Catia Lima', '84991956235', 'ruancarlos@gmail.com', 'Cabeleireiro', '2024-05-27', '10:00:00', 'aaaaaaa', 0.00, 'Nada a acrecentar', 'Cliente Ausente'),
(5, 'Carmela', '95965623', 'sthefany@gmail.com', 'Manicure', '2024-05-28', '15:00:00', 'aaa', 50.00, 'Nada a acrecentar', 'Atendido'),
(6, 'Zida Valentim', '8456952315', 'monisan@gmail.com', 'Manicure', '2024-05-23', '11:40:00', 'aaa', 300.00, 'Adicionou manicure e escova', 'Atendido'),
(7, 'Carmela', '8456952315', 'ruancarlos@gmail.com', 'Manicure', '2024-05-31', '12:00:00', 'AAA', 120.00, 'Fez tabém uma escova', 'Atendido'),
(8, 'Ricardo de Oliveira', '84991956235', 'ricardo@gmail.com', 'Manicure', '2024-06-05', '15:00:00', 'rica', 0.00, 'Nada a acrecentar', 'Cliente Ausente'),
(10, 'Zilene Silva', '84751265413', 'zilene@gmail.com', 'Spa', '2024-07-12', '12:00:00', 'Zilene13#', NULL, NULL, NULL),
(14, 'Bruna', '95965623', 'carlos@gmail.com', 'Manicure', '2024-06-25', '12:00:00', 'linda', NULL, NULL, NULL),
(15, 'Paulo Cabral', '8456952315', 'ruancarlos@gmail.com', 'Barbeiro', '2024-06-08', '10:00:00', 'aaa', 30.00, 'Nada a acrecentar', 'Atendido'),
(17, 'Bruna', '8456952315', 'carlos@gmail.com', 'Cabeleireiro', '2024-06-27', '12:00:00', 'aaa', NULL, NULL, NULL),
(18, 'Reinaldo de Oliveira', '84751265413', 'oliveira@gmail.com', 'Barbeiro', '2024-06-15', '08:00:00', 'reinaldo23', NULL, NULL, NULL),
(19, 'Gisele', '6265662326', 'gisele@gmail.com', 'Manicure', '2024-06-19', '14:00:00', '123', NULL, NULL, NULL),
(20, 'Silva', '646623262', 'silva@gmail.com', 'Cabeleireiro', '2024-06-13', '14:30:00', '456789', NULL, NULL, NULL),
(21, 'Fravia', '446513262', 'fra@gmail.com', 'Cabeleireiro', '2024-06-14', '10:45:00', '123', NULL, NULL, NULL),
(22, 'Flavia Marciel', '84994955658', 'fravia@gmail.com', 'Cabeleireiro', '2024-06-18', '13:30:00', 'Fravia13#', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
