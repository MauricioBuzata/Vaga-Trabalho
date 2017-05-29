-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Maio-2017 às 19:43
-- Versão do servidor: 5.1.73-community
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vagatrabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrativo`
--

CREATE TABLE IF NOT EXISTS `administrativo` (
  `IdAdm` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Senha` varchar(10) NOT NULL,
  PRIMARY KEY (`IdAdm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `administrativo`
--

INSERT INTO `administrativo` (`IdAdm`, `Nome`, `Senha`) VALUES
(1, 'adm', 'adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservadas`
--

CREATE TABLE IF NOT EXISTS `reservadas` (
  `IdSala` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `DataHorario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `IdSala` int(11) NOT NULL AUTO_INCREMENT,
  `NomeSala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IdSala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`IdSala`, `NomeSala`) VALUES
(2, 'Sala 2'),
(3, 'Sala 1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NomeUsuario` varchar(100) NOT NULL,
  `Senha` varchar(8) NOT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `NomeUsuario`, `Senha`) VALUES
(1, 'Usuario Comum', '123'),
(2, 'Mauricio Buzata', 'lilo1995');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
