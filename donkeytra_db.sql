-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 okt 2023 om 09:01
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donkeytra_db`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `herbergen`
--

CREATE TABLE `herbergen` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Coordinaten` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `ID` int(11) NOT NULL,
  `Naam` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`ID`, `Naam`, `Email`, `Telefoon`, `Wachtwoord`) VALUES
(1, 'test', 'test@live.nl', '010477849', 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `overnachtingen`
--

CREATE TABLE `overnachtingen` (
  `ID` int(11) NOT NULL,
  `FKboekingenID` int(11) NOT NULL,
  `FKherbergenID` int(11) NOT NULL,
  `FKstatussenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pauzeplaatsen`
--

CREATE TABLE `pauzeplaatsen` (
  `ID` int(11) NOT NULL,
  `FKboekingenID` int(11) NOT NULL,
  `FKrestaurantsID` int(11) NOT NULL,
  `FKstatussenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Coordinaten` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `restaurants`
--

INSERT INTO `restaurants` (`ID`, `Naam`, `Adres`, `Email`, `Telefoon`, `Coordinaten`) VALUES
(3, 'hallo', '010345789098', 'cemeterystreet 2', 'hallo@yahoo.com', 'yah');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tochten`
--

CREATE TABLE `tochten` (
  `ID` int(11) NOT NULL,
  `Omschrijving` varchar(40) NOT NULL,
  `Route` varchar(50) NOT NULL,
  `AantalDagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `boekingen`
--
ALTER TABLE `boekingen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKtochtenID` (`FKtochtenID`,`FKklantenID`,`FKstatussenID`);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKboekingenID` (`FKboekingenID`,`FKherbergenID`,`FKstatussenID`);

--
-- Indexen voor tabel `pauzeplaatsen`
--
ALTER TABLE `pauzeplaatsen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FKboekingenID` (`FKboekingenID`,`FKrestaurantsID`,`FKstatussenID`);

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
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
