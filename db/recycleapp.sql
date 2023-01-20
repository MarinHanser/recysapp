-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 sep 2022 om 18:51
-- Serverversie: 10.4.18-MariaDB
-- PHP-versie: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recycleapp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bidding`
--

CREATE TABLE `bidding` (
  `id` smallint(6) NOT NULL,
  `post_id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `Recys` mediumint(9) NOT NULL,
  `hammer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` varchar(40) NOT NULL,
  `Product` varchar(30) NOT NULL,
  `Beschrijving` varchar(100) NOT NULL,
  `Recys` mediumint(9) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `dateposted` date NOT NULL,
  `dateclosed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `post`
--

INSERT INTO `post` (`id`, `user_id`, `Product`, `Beschrijving`, `Recys`, `foto`, `dateposted`, `dateclosed`) VALUES
(49, '10', 'Test', 'adjfokjasdkfljasld;fjals;', 3, 'product_1.png', '2022-09-07', '2022-09-08'),
(50, '10', 'Test', 'adjfokjasdkfljasld;fjals;', 3, 'product_1.png', '2022-09-07', '2022-09-08');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` smallint(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `password` varchar(80) NOT NULL,
  `balance` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `telephone`, `password`, `balance`, `role`) VALUES
(10, 'Thijs Kamphuis', 'test@test.nl', '0612447922', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', 111, 0),
(13, 'admin', 'admin', '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 1),
(23, 'test', 'test', '34213434', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 50, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
