-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2022 às 04:29
-- Versão do servidor: 8.0.28
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sebd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(300) DEFAULT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `cidade` varchar(120) DEFAULT NULL,
  `uf` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `usuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `senha` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `situacoe_id` int NOT NULL DEFAULT '0',
  `niveis_acesso_id` int NOT NULL,
  `token` varchar(300) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `ultima_alteracao` datetime DEFAULT NULL,
  `criado_por` varchar(200) NOT NULL,
  `alterado_por` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `situacao` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'ATIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `telefone`, `celular`, `cep`, `rua`, `numero`, `bairro`, `complemento`, `cidade`, `uf`, `cpf`, `rg`, `nascimento`, `usuario`, `senha`, `situacoe_id`, `niveis_acesso_id`, `token`, `data_cadastro`, `ultima_alteracao`, `criado_por`, `alterado_por`, `situacao`) VALUES
(1, 'Wagner De Brito Marins', 'wagnermarinsjc@gmail.com', '(65) 99327-2137', '(84) 98814-9977', '78128234', 'Rua S�o Judas Tadeu', '92', 'Rosa dos Ventos', 'Casa', 'Parnamirim', 'RN', '123.456.789-00', '6543210', '1979-12-26', 'wagnermarinsjc@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'a554c5aae4e58e44996c143b71df399d', '2021-09-28 02:29:17', '2022-06-09 20:29:33', 'Antonio Junior', 'Wagner de Brito Marins', 'Ativo'),
(2, 'Joyce Aline de Oliveira Marins', 'joycealine.si@gmail.com', '(65) 99331-1224', '(84) 98814-7788', '59054600', 'Avenida Interventor M�rio C�mara', '1624', 'Dix-Sept Rosado', '', 'Natal', 'RN', '321.456.789-00', '1234566', '1950-01-13', 'joycealine.si@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 2, '28a4197b03d425d45eb81d42332fcd25', '2021-09-28 02:39:54', '2021-09-28 02:46:10', 'Administrador do sistema', 'Administrador do sistema', 'Ativo'),
(6, 'Sofia De Oliveira Marins', 'sofiaom@gmail.com', '(65) 99331-1223', '', '', '', '', '', '', '', '', '', '', '2019-07-18', 'sofiaom@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 3, '18e57c6c50a1fe3550cfc418ef5f48ba', '2022-06-08 20:37:47', '2022-06-08 23:38:15', '', 'Wagner de Brito Marins', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
