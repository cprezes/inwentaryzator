-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Sie 2016, 08:59
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `komputery`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inne`
--

CREATE TABLE `inne` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `login` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `monitor` text,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `inne`
--

INSERT INTO `inne` (`id`, `nazwa`, `login`, `monitor`, `data`) VALUES
(2, 'komp12', 'login', '12315 jakis monitor', '2016-08-30 14:36:58'),
(3, 'kop11', 'login', '12315 jakis monitor', '2016-08-30 14:37:03'),
(4, 'komp210', 'jkowalski', 'montor 1\r\n', '2016-08-30 14:37:07'),
(5, 'm402928', 'cprzyborowski', '1# | VESA ID: ACI22F2 | 1 Serial: A1LMQS062315 | Nazwa: VH226 | ManuDate:  | EDID: \r\n2# | VESA ID: ACI27A4 | 2 Serial: E4LMQS103732 | Nazwa: VN279 | ManuDate: Week 1/2007 | EDID: \r\n', '2016-08-31 06:38:52'),
(6, 'm402928', 'cprzyborowski', '1# | VESA ID: ACI22F2 | 1 Serial: A1LMQS062315 | Nazwa: VH226 | ManuDate:  | EDID: <br???T?HQ?P?L??M??X[?MTT?L????^??N?????HX[?Q]N??YZ?K?\r?QQ???', '2016-08-31 06:41:45'),
(7, 'm402928', 'cprzyborowski', '1# | VESA ID: ACI22F2 | 1 Serial: A1LMQS062315 | Nazwa: VH226 | ManuDate:  | EDID: ,  2# | VESA ID: ACI27A4 | 2 Serial: E4LMQS103732 | Nazwa: VN279 | ManuDate: Week 1/2007 | EDID: ,  ', '2016-08-31 06:43:40'),
(9, 'm402928', 'cprzyborowski', '1# | VESA ID: ACI22F2 | 1 Serial: A1LMQS062315 | Nazwa: VH226 | ManuDate:  | EDID: ;  2# | VESA ID: ACI27A4 | 2 Serial: E4LMQS103732 | Nazwa: VN279 | ManuDate: Week 1/2007 | EDID: ;  ', '2016-08-31 06:49:17'),
(10, 'm402928', 'cprzyborowski', '1# | VESA ID: ACI22F2 | 1 Serial: A1LMQS062315 | Nazwa: VH226 | ManuDate:  | EDID: ,  2# | VESA ID: ACI27A4 | 2 Serial: E4LMQS103732 | Nazwa: VN279 | ManuDate: Week 1/2007 | EDID: ,  ', '2016-08-31 06:50:36'),
(11, 'm402928', 'cprzyborowski', '1# | VESA ID: ACI22F2 | 1 Serial: A1LMQS062315 | Nazwa: VH226 | ManuDate:  | EDID: ,  2# | VESA ID: ACI27A4 | 2 Serial: E4LMQS103732 | Nazwa: VN279 | ManuDate: Week 1/2007 | EDID: ,  ', '2016-08-31 06:51:31'),
(12, 'm402928', 'cprzyborowski', '1# | VESA ID: ACI22F2 | 1 Serial: A1LMQS062315 | Nazwa: VH226 | ManuDate:  | EDID: ,  2# | VESA ID: ACI27A4 | 2 Serial: E4LMQS103732 | Nazwa: VN279 | ManuDate: Week 1/2007 | EDID: ,  ', '2016-08-31 06:56:00'),
(13, 'm402928', 'cprzyborowski', '1# | VESA ID: ACI22F2 | 1 Serial: A1LMQS062315 | Nazwa: VH226 | ManuDate:  | EDID: ,  2# | VESA ID: ACI27A4 | 2 Serial: E4LMQS103732 | Nazwa: VN279 | ManuDate: Week 1/2007 | EDID: ,  ', '2016-08-31 06:56:05');

--
-- Wyzwalacze `inne`
--
DELIMITER $$
CREATE TRIGGER `wywal_starsze_jak_rok_inne` AFTER INSERT ON `inne` FOR EACH ROW DELETE FROM `inne` WHERE `data` <  now()-10000000000  ORDER BY `data` ASC LIMIT 10
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `inne`
--
ALTER TABLE `inne`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `inne`
--
ALTER TABLE `inne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
