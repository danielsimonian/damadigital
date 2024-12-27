-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Dez-2024 às 15:45
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
-- Banco de dados: `db_helpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_chamados`
--

CREATE TABLE `tb_chamados` (
  `id_chamado` int(11) NOT NULL,
  `titulo` varchar(90) NOT NULL,
  `categoria` varchar(90) NOT NULL,
  `descricao` varchar(90) NOT NULL,
  `status` varchar(90) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_chamados`
--

INSERT INTO `tb_chamados` (`id_chamado`, `titulo`, `categoria`, `descricao`, `status`, `id_user`) VALUES
(1, 'Socorro', 'Impressora', 'aeaeaea', 'Em Andamento', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nome`, `email`, `senha`, `perfil`) VALUES
(1, 'Daniel Simonian', 'danielsimonian@gmail.com', '202cb962ac59075b964b07152d234b70', 'adm'),
(2, 'Guigui', 'guigui@gmail.com', '202cb962ac59075b964b07152d234b70', 'administrador'),
(3, 'Fefe', 'fefe@gmail.com', '202cb962ac59075b964b07152d234b70', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_chamados`
--
ALTER TABLE `tb_chamados`
  ADD PRIMARY KEY (`id_chamado`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_chamados`
--
ALTER TABLE `tb_chamados`
  MODIFY `id_chamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_chamados`
--
ALTER TABLE `tb_chamados`
  ADD CONSTRAINT `tb_chamados_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
