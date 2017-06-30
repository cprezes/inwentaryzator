-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 18 Maj 2017, 10:45
-- Wersja serwera: 10.1.14-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `komputery`
--
CREATE DATABASE IF NOT EXISTS `komputery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `komputery`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inne`
--

DROP TABLE IF EXISTS `inne`;
CREATE TABLE IF NOT EXISTS `inne` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `login` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `monitor` text,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Wyzwalacze `inne`
--
DROP TRIGGER IF EXISTS `wywal_starsze_jak_rok_inne`;
DELIMITER $$
CREATE TRIGGER `wywal_starsze_jak_rok_inne` AFTER INSERT ON `inne`
 FOR EACH ROW DELETE FROM `inne` WHERE `data` <  now()-50000000000  ORDER BY `data` ASC LIMIT 10
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `instalacje`
--

DROP TABLE IF EXISTS `instalacje`;
CREATE TABLE IF NOT EXISTS `instalacje` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(127) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `AppName` text CHARACTER SET utf8 COLLATE utf8_bin,
  `DisplayVersion` text CHARACTER SET utf8 COLLATE utf8_bin,
  `Publisher` text CHARACTER SET utf8 COLLATE utf8_bin,
  `InstallDate` text CHARACTER SET hp8 COLLATE hp8_bin,
  `WindowsInstaller` text CHARACTER SET hp8 COLLATE hp8_bin,
  `NoRemove` text CHARACTER SET hp8 COLLATE hp8_bin,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kiedy` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komputery`
--

DROP TABLE IF EXISTS `komputery`;
CREATE TABLE IF NOT EXISTS `komputery` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(80) COLLATE utf8_bin NOT NULL COMMENT 'Numer inwentarzowy',
  `login` varchar(128) COLLATE utf8_bin NOT NULL COMMENT 'Ostoatnio logowany',
  `domena` varchar(60) COLLATE utf8_bin NOT NULL,
  `ip` varchar(72) COLLATE utf8_bin NOT NULL,
  `mac` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT 'Mac adres karty',
  `dysk` text COLLATE utf8_bin,
  `pamiec` text COLLATE utf8_bin,
  `system` text COLLATE utf8_bin,
  `model` text COLLATE utf8_bin,
  `inne` text COLLATE utf8_bin,
  `koment` text COLLATE utf8_bin,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Wyzwalacze `komputery`
--
DROP TRIGGER IF EXISTS `wywal_starsze_jak_rok`;
DELIMITER $$
CREATE TRIGGER `wywal_starsze_jak_rok` AFTER INSERT ON `komputery`
 FOR EACH ROW DELETE FROM `komputery` WHERE `data` < now()-50000000000 ORDER BY `data` ASC LIMIT 10
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licencje`
--

DROP TABLE IF EXISTS `licencje`;
CREATE TABLE IF NOT EXISTS `licencje` (
  `Id` int(11) NOT NULL,
  `Nr_OT` text,
  `Rodzaj_Prg` text NOT NULL,
  `Zdajacy_login` text,
  `Odbierajacy_login` text,
  `Nazwa_komputera` text,
  `Konto_kosztow` text,
  `Licencja` text,
  `Licencja_cd` text,
  `Klucz` text,
  `Klucz_cd` text,
  `Notatki` text,
  `Uwagi` text,
  `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Ukryj` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `licencje_log`
--

DROP TABLE IF EXISTS `licencje_log`;
CREATE TABLE IF NOT EXISTS `licencje_log` (
  `id` int(99) NOT NULL,
  `Rodzaj_Prg` text CHARACTER SET latin1,
  `cloumn` text CHARACTER SET latin1,
  `from_id` text CHARACTER SET latin1,
  `old_value` text CHARACTER SET latin1,
  `nev_value` text CHARACTER SET latin1,
  `TimeStamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(128) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci,
  `opis` text COLLATE utf8_polish_ci,
  `EmailAddress` text COLLATE utf8_polish_ci,
  `MobilePhone` text COLLATE utf8_polish_ci,
  `OfficePhone` text COLLATE utf8_polish_ci,
  `Enabled` text COLLATE utf8_polish_ci,
  `Department` text COLLATE utf8_polish_ci,
  `Description` text COLLATE utf8_polish_ci,
  `Title` text COLLATE utf8_polish_ci,
  `StreetAddress` text COLLATE utf8_polish_ci,
  `PostalCode` text COLLATE utf8_polish_ci,
  `State` text COLLATE utf8_polish_ci,
  `LastLogonDate` text COLLATE utf8_polish_ci,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zapytania`
--

DROP TABLE IF EXISTS `zapytania`;
CREATE TABLE IF NOT EXISTS `zapytania` (
  `id` int(11) NOT NULL,
  `user` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `opis` text COLLATE utf8_bin,
  `query` text COLLATE utf8_bin,
  `widoczny` int(11) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `inne`
--
ALTER TABLE `inne`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instalacje`
--
ALTER TABLE `instalacje`
  ADD PRIMARY KEY (`id`,`nazwa`);

--
-- Indexes for table `komputery`
--
ALTER TABLE `komputery`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `licencje`
--
ALTER TABLE `licencje`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `licencje_log`
--
ALTER TABLE `licencje_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zapytania`
--
ALTER TABLE `zapytania`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `inne`
--
ALTER TABLE `inne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `instalacje`
--
ALTER TABLE `instalacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `komputery`
--
ALTER TABLE `komputery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `licencje`
--
ALTER TABLE `licencje`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `licencje_log`
--
ALTER TABLE `licencje_log`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `zapytania`
--
ALTER TABLE `zapytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
