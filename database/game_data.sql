-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 25 nov 2026 om 08:17
-- Serverversie: 9.7.1
-- PHP-versie: 8.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamespark`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `game data`
--

CREATE TABLE `game data` (
  `id` int NOT NULL,
  `naam` varchar(100) NOT NULL,
  `platform` varchar(20) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `release date` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `beoordeling` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Tabel met gegevens van games';

--
-- Gegevens worden geëxporteerd voor tabel `game data`
--

INSERT INTO `game data` (`id`, `naam`, `platform`, `genre`, `release date`, `status`, `beoordeling`) VALUES
(1, 'Hollow Knight', 'PC', 'Indie', '2017-02-24', 'In bezit', NULL),
(2, 'Undertale', 'Xbox ', 'Indie', '2015-09-15', 'Uitgespeeld', '☆☆☆☆☆'),
(3, 'Team Fortress 2', 'PC', 'First-person shooter', '2007-10-10', 'Speelt nu', '☆☆☆☆☆'),
(4, 'Super Smash Bros Ultimate', 'Nintendo ', 'Vechten', '2018-12-07', 'Wishlist', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `game data`
--
ALTER TABLE `game data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `game data`
--
ALTER TABLE `game data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
