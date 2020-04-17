-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: 10.1.2.122
-- Generation Time: 08-Set-2017 às 19:08
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u289875908_rede`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`u289875908_rede`@`10.1.2.43` FUNCTION `p1` () RETURNS INT(11) NO SQL
    DETERMINISTIC
return @p1$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `album`
--

CREATE TABLE `album` (
  `id` int(15) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `album`
--

INSERT INTO `album` (`id`, `descricao`, `us`, `nome`) VALUES
(17, 'desc2', '1', 'album 2'),
(18, 'teste', '1', 'album 3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `album_fotos`
--

CREATE TABLE `album_fotos` (
  `id` int(255) NOT NULL,
  `id_album` int(255) NOT NULL,
  `us` int(255) NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `album_fotos`
--

INSERT INTO `album_fotos` (`id`, `id_album`, `us`, `foto`, `descricao`) VALUES
(1, 17, 1, '58069d58714514cde55bc61b75447d79.png', 'testa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `com`
--

CREATE TABLE `com` (
  `id` int(15) NOT NULL,
  `tipo` int(255) NOT NULL,
  `id_post` int(255) DEFAULT NULL,
  `id_com` int(255) DEFAULT NULL,
  `id_us` varchar(255) CHARACTER SET latin1 NOT NULL,
  `msg` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `arquivo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `data` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `com`
--

INSERT INTO `com` (`id`, `tipo`, `id_post`, `id_com`, `id_us`, `msg`, `foto`, `arquivo`, `data`) VALUES
(4, 0, 0, NULL, '1', 'teste', '', '', 1480598961),
(5, 1, 0, NULL, '1', 'asdasd', '', '', 1480599076),
(6, 1, 15, NULL, '1', 'teste', '', '', 1480599279);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `deid` int(255) NOT NULL,
  `cotid` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`deid`, `cotid`) VALUES
(6, 1),
(1, 1),
(1, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gostar`
--

CREATE TABLE `gostar` (
  `id` int(255) NOT NULL,
  `id_post` int(255) DEFAULT NULL,
  `id_com` int(255) DEFAULT NULL,
  `id_us` int(255) NOT NULL,
  `gostei` tinyint(1) NOT NULL,
  `data` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `gostar`
--

INSERT INTO `gostar` (`id`, `id_post`, `id_com`, `id_us`, `gostei`, `data`) VALUES
(1, 3, NULL, 1, 1, 1477511685),
(2, 2, NULL, 1, 1, 1477511685),
(3, 3, NULL, 6, 0, 1477511685),
(4, 2, NULL, 6, 1, 1477511685),
(5, 9, NULL, 6, 0, 1477517545),
(6, 11, NULL, 6, 1, 1477517468),
(7, 5, NULL, 6, 1, 1477517485),
(8, 1, NULL, 1, 1, 1478216014);

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg`
--

CREATE TABLE `msg` (
  `id` int(255) NOT NULL,
  `deid` int(255) NOT NULL,
  `paraid` int(255) NOT NULL,
  `titulo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `msg` varchar(255) CHARACTER SET latin1 NOT NULL,
  `data` int(255) DEFAULT NULL,
  `nw` tinyint(1) NOT NULL,
  `nwus` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `msg`
--

INSERT INTO `msg` (`id`, `deid`, `paraid`, `titulo`, `msg`, `data`, `nw`, `nwus`) VALUES
(3, 5, 1, 'teste', 'teste', 0, 1, 1),
(4, 1, 5, 'teste', 'teste', 2016, 1, 1),
(5, 1, 6, 'gay', 'gay', 2016, 1, 1),
(6, 1, 5, 'szasdasd', 'asdasdasd', 2016, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(15) NOT NULL,
  `id_us` varchar(255) CHARACTER SET latin1 NOT NULL,
  `id_even` int(255) DEFAULT NULL,
  `msg` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `arquivo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `data` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `id_us`, `id_even`, `msg`, `foto`, `arquivo`, `data`) VALUES
(2, '6', NULL, 'Sou Bahiano com orgulho!', '', '', 2147483647),
(3, '1', NULL, 'teste', '', '', 0),
(4, '6', NULL, 'teste', '', '', 2016),
(5, '6', NULL, 'teste', '', '', 2016),
(10, '6', NULL, 'asdasd', '', '', 1477513662),
(9, '6', NULL, 'teste1', '', '', 1477513348),
(11, '1', NULL, 'aaaa', '', '', 1477513669),
(12, '7', NULL, 'asdasdasdasdasd', '', '', 1477594524),
(15, '1', NULL, 'testea', '', '', 1480543440);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rmsg`
--

CREATE TABLE `rmsg` (
  `id` int(255) NOT NULL,
  `deid` int(255) NOT NULL,
  `idpert` int(255) NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `rmsg`
--

INSERT INTO `rmsg` (`id`, `deid`, `idpert`, `msg`, `data`) VALUES
(1, 1, 3, 'asdasd', 2016),
(2, 1, 3, 'asdasd', 2016),
(3, 1, 3, 'hra', 1477604475);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `sobrenome` varchar(255) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `data_nasc` int(255) DEFAULT NULL,
  `telefone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` longtext COLLATE utf8_unicode_ci,
  `cidade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regiao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `epp` int(10) NOT NULL,
  `hash_recup` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `hash_ativa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `email`, `nome`, `sobrenome`, `senha`, `foto`, `data_nasc`, `telefone`, `descricao`, `cidade`, `estado`, `regiao`, `pais`, `sexo`, `epp`, `hash_recup`, `hash_ativa`, `hash_email`, `adm`) VALUES
(0, 'show', 'Show', 'Me', 'admin', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(1, 'perses@p', 'Perses', 'Vilhena', '698dc19d489c4e4db73e28a713eab07b', '75265512ac4736e4d58b574024d4bad9.jpg', 0, '', 'asdasd', '', '', '', 'teste', NULL, 98, NULL, NULL, '', 1),
(5, 'teste', 'teste', 'teste', 'e959088c6049f1104c84c9bde5560a13', '0e7609d9f1e6ad8c397cf17a4da07f26.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(6, 'coco', 'Coco', 'Bahiano', 'e959088c6049f1104c84c9bde5560a13', '33780c412be738c5bc4bbfe72e402d1b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(7, 'perses2', 'Perses', 'De Vilhena', '3806a526e2c7af2ec712718c3de4d4a5', 'ae35c8a304116d294647e385bf19c111.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(8, 'paulo@perses.xyz', 'Paulo', 'S', 'e10adc3949ba59abbe56e057f20f883e', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(9, 'Ander@perses.xyz', 'Ander', 'Barbosa', 'e10adc3949ba59abbe56e057f20f883e', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(10, 'samiraelias@perses.xyz', 'samira', 'ELIAS', 'e10adc3949ba59abbe56e057f20f883e', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(11, 'rafael@perses.xyz', 'Rafael', 'Guida', '0fbb0968adea4dd42a10a60b97d9c0d4', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(12, 'Marcelo@perses.xyz', 'Marcelo', 'Melo', 'e10adc3949ba59abbe56e057f20f883e', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(13, 'GusMelo@perses.xyz', 'Gustavo', 'Melo', 'e10adc3949ba59abbe56e057f20f883e', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(14, 'persesvilhena@gmail.com', 'perses', 'vilhena', '698dc19d489c4e4db73e28a713eab07b', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL),
(15, 'persesvilhena01@gmail.com', 'Perses', 'Vilhena', 'e959088c6049f1104c84c9bde5560a13', 'new/new.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_fotos`
--
ALTER TABLE `album_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `com`
--
ALTER TABLE `com`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gostar`
--
ALTER TABLE `gostar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmsg`
--
ALTER TABLE `rmsg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `album_fotos`
--
ALTER TABLE `album_fotos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `com`
--
ALTER TABLE `com`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gostar`
--
ALTER TABLE `gostar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `rmsg`
--
ALTER TABLE `rmsg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
