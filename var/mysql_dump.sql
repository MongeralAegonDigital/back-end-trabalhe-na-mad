-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 16/01/2017 às 12:54
-- Versão do servidor: 5.7.16-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mongeral`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `identity_number` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `identity_agency` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `identity_issued_at` date NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `address_route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_number` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `address_complement` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_neighborhood` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `address_city` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `address_state` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `address_zipcode` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `professional_info_category` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `professional_info_company` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `professional_info_profession` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `professional_info_salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C82E743E3E11F0` (`cpf`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
