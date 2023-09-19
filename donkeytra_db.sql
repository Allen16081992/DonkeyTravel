-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 sep 2023 om 13:12
-- Serverversie: 10.4.24-MariaDB
-- PHP-versie: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donkeytra.db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boekingen`
--

CREATE TABLE `boekingen` (
  `ID` int(11) NOT NULL,
  `StartDatum` date NOT NULL,
  `PINCode` int(11) NOT NULL,
  `FKtochtenID` int(11) NOT NULL,
  `FKklantenID` int(11) NOT NULL,
  `FKstatussenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `herbergen`
--

CREATE TABLE `herbergen` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Coordinaten` varchar(20) NOT NULL,
  `Gewijzigd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL,
  `Gewijzigd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`ID`, `Naam`, `Email`, `Telefoon`, `Wachtwoord`, `Gewijzigd`) VALUES
(1, 'test', 'test@live.nl', '010477849', 'test', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `overnachtingen`
--

CREATE TABLE `overnachtingen` (
  `ID` int(11) NOT NULL,
  `FKboekingenID` int(11) NOT NULL,
  `FKherbergenID` int(11) NOT NULL,
  `FKstatussenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pauzeplaatsen`
--

CREATE TABLE `pauzeplaatsen` (
  `ID` int(11) NOT NULL,
  `FKboekingenID` int(11) NOT NULL,
  `FKrestaurantsID` int(11) NOT NULL,
  `FKstatussenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `restaurants`
--

CREATE TABLE `restaurants` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Coordinaten` varchar(20) NOT NULL,
  `Gewijzigd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `statussen`
--

CREATE TABLE `statussen` (
  `ID` int(11) NOT NULL,
  `StatusCode` tinyint(4) NOT NULL,
  `Status` varchar(40) NOT NULL,
  `Verwijderbaar` tinyint(4) NOT NULL,
  `PINtoekennen` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tochten`
--

CREATE TABLE `tochten` (
  `ID` int(11) NOT NULL,
  `Omschrijving` varchar(40) NOT NULL,
  `Route` varchar(50) NOT NULL,
  `AantalDagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `trackers`
--

CREATE TABLE `trackers` (
  `ID` int(11) NOT NULL,
  `PINCode` int(11) NOT NULL,
  `Lat` double NOT NULL,
  `Lon` double NOT NULL,
  `Time` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `boekingen`
--
ALTER TABLE `boekingen`
  ADD PRIMARY KEY (`ID`,`FKtochtenID`,`FKklantenID`,`FKstatussenID`);

--
-- Indexen voor tabel `herbergen`
--
ALTER TABLE `herbergen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `overnachtingen`
--
ALTER TABLE `overnachtingen`
  ADD PRIMARY KEY (`ID`,`FKboekingenID`,`FKherbergenID`,`FKstatussenID`);

--
-- Indexen voor tabel `pauzeplaatsen`
--
ALTER TABLE `pauzeplaatsen`
  ADD PRIMARY KEY (`ID`,`FKboekingenID`,`FKrestaurantsID`,`FKstatussenID`);

--
-- Indexen voor tabel `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `statussen`
--
ALTER TABLE `statussen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `tochten`
--
ALTER TABLE `tochten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `trackers`
--
ALTER TABLE `trackers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `boekingen`
--
ALTER TABLE `boekingen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `herbergen`
--
ALTER TABLE `herbergen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `overnachtingen`
--
ALTER TABLE `overnachtingen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `pauzeplaatsen`
--
ALTER TABLE `pauzeplaatsen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `statussen`
--
ALTER TABLE `statussen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `tochten`
--
ALTER TABLE `tochten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `trackers`
--
ALTER TABLE `trackers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
