-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 01 mars 2022 kl 13:32
-- Serverversion: 10.4.20-MariaDB
-- PHP-version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `can`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tblarticle`
--

CREATE TABLE `tblarticle` (
  `id` int(11) NOT NULL,
  `head` varchar(100) NOT NULL,
  `ingress` text NOT NULL,
  `text` text NOT NULL,
  `author` int(11) NOT NULL,
  `added` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 9
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `tblarticle`
--

INSERT INTO `tblarticle` (`id`, `head`, `ingress`, `text`, `author`, `added`, `status`) VALUES
(1, 'Test', 'lorem ipsum dolores', 'lkjg lksjhg slkjhgd lksjgzökcjg klkjg lk jhgklglskjgxc fklvhjcgsdklghjv lkhjgdvf lkjhgds lkhjgf lskgf lkhjg lkhjgf ', 15, 0, 9);

-- --------------------------------------------------------

--
-- Tabellstruktur `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `user` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT 100,
  `realname` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `lastlogin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `tbluser`
--

INSERT INTO `tbluser` (`id`, `user`, `pass`, `level`, `realname`, `lastlogin`) VALUES
(11, 'greger', '701f29e9b642c5a28482344225382633', 67, 'Greger Nilsson', 0),
(12, 'admin', 'abfd94b664e5d264b108586574c7869d', 100, '', 1646130701),
(13, 'charlie', 'a88ae6061b1f3ba6727ee5a31536ab5f', 100, '', NULL),
(14, 'olle', 'ab004a510bfbc7c7797a1f02e8cd257c', 69, '', NULL),
(15, 'evas', '6d91ba93454f030fa6ea9785d9f44168', 100, 'Eva Svensson', NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tblarticle`
--
ALTER TABLE `tblarticle`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tblarticle`
--
ALTER TABLE `tblarticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
