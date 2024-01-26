-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2022 às 23:10
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `salaodebeleza`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `nome` varchar(30) DEFAULT NULL,
  `cpf` int(11) NOT NULL,
  `tamanho_cabelo` enum('curto','medio','grande') DEFAULT NULL,
  `codservico` smallint(6) DEFAULT NULL,
  `codfuncionario` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `nome` varchar(30) DEFAULT NULL,
  `codfuncionario` smallint(6) NOT NULL,
  `turno` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicodebeleza`
--

CREATE TABLE `servicodebeleza` (
  `tipo` enum('cabelo','unha','pele') DEFAULT NULL,
  `servico` varchar(30) DEFAULT NULL,
  `codservico` smallint(6) NOT NULL,
  `preco` float(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicodebeleza`
--

INSERT INTO `servicodebeleza` (`tipo`, `servico`, `codservico`, `preco`) VALUES
('cabelo', 'penteado', 10, 30.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Login` int(11) NOT NULL,
  `Senha` int(11) NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Perfil` int(11) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Login`, `Senha`, `Nome`, `Perfil`, `dataNasc`) VALUES
(2, 4321, 'leticia', 2, '2004-05-14'),
(3, 2341, 'yasmin', 3, '2004-04-28'),
(4, 3421, 'maria', 4, '2005-09-18'),
(5, 4312, 'sabrina', 5, '2005-02-02');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD KEY `codservico` (`codservico`),
  ADD KEY `codfuncionario` (`codfuncionario`),
  ADD KEY `cpf` (`cpf`) USING BTREE;

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`codfuncionario`);

--
-- Índices para tabela `servicodebeleza`
--
ALTER TABLE `servicodebeleza`
  ADD PRIMARY KEY (`codservico`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`codservico`) REFERENCES `servicodebeleza` (`codservico`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`codfuncionario`) REFERENCES `funcionario` (`codfuncionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
