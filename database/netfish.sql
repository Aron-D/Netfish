-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 dec 2021 om 18:06
-- Serverversie: 10.4.19-MariaDB
-- PHP-versie: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netfish`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `year` int(4) NOT NULL DEFAULT 0,
  `description` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `movie`
--

INSERT INTO `movie` (`id`, `title`, `url`, `year`, `description`) VALUES
(1, 'The Hunger Games: Mockingjay - Part 1', 'https://www.youtube.com/watch?v=3PkkHsuMrho', 2014, 'Na de vorige film is Katniss (Jennifer Lawrence) naar het grimmige en vergeten District 13 gebracht, waar men druk bezig is met de revolutie tegen het dictatoriale regime van het Capitool. Maar omdat nog niet alle districten van Panem zich tegen het Capitool keren, moet men ze door middel van propagandafilmpjes die uitgezonden worden op de landelijke televisie overtuigen. Tijdens de opnamen van een propagandafilm in District 8 wordt er daar een ziekenhuis gebombardeerd. Ondertussen is de revolutie in volle gang en laten de rebellen een dam in District 5 exploderen, zodat de stroom in het Capitool uitvalt. Uiteindelijk worden Peeta (Josh Hutcherson), Johanna (Jena Malone) en Annie (Stef Dawson), oude tributen van de Hongerspelen die gevangen en gemarteld werden in het Capitool, bevrijd en naar District 13 gebracht. Wanneer Katniss eenmaal Peeta gaat opzoeken, probeert hij haar te doden. Later blijkt dat Peeta door het Capitool gehersenspoeld is, zodat wanneer hij Katniss ziet, hij haar wil doden. ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(5, 'mborijnland', 'talibrunner@ctemplar.com', 'f23e00ddd75278a1b7292b94b1ce03d9', 1),
(6, 'klant', 'aron-dosti@hotmail.com', '0cc175b9c0f1b6a831c399e269772661', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `movie`
--
ALTER TABLE `movie`
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
-- AUTO_INCREMENT voor een tabel `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
