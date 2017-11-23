-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2014 at 04:27 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `krakow` (
    `lp` int(11) NOT NULL AUTO_INCREMENT,
    `potrzeby_rodziny` varchar(128) NOT NULL,
    `dane_darczyncy_1` varchar(64) NOT NULL,
    `dane_darczyncy_2` varchar(64) NOT NULL,
    `dane_darczyncy_3` varchar(64) NOT NULL,
    `dane_darczyncy_4` varchar(64) NOT NULL,
    `dane_darczyncy_5` varchar(64) NOT NULL,
  PRIMARY KEY (`lp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `information`
--

INSERT INTO `krakow` (`lp`, `potrzeby_rodziny`, `dane_darczyncy_1`, `dane_darczyncy_2`,`dane_darczyncy_3`,`dane_darczyncy_4`,`dane_darczyncy_5`) VALUES
(1	,'herbata','_','_','_','_','_'),
(2	,'kasza','_','_','_','_','_'),
(3	,'cukier','_','_','_','_','_'),
(4	,'konserwy mi&#x0119;sne','_','_','_','_','_'),
(5	,'konserwy rybne','_','_','_','_','_'),
(6	,'makaron','_','_','_','_','_'),
(7	,'olej','_','_','_','_','_'),
(8	,'konserwy mi&#x0119;sne','_','_','_','_','_'),
(9	,'kawa','_','_','_','_','_'),
(10	,'ry&#x017C;','_','_','_','_','_'),
(11	,'m&#x0105;ka','_','_','_','_','_'),
(12	,'kostki roso&#x0142;owe','_','_','_','_','_'),
(13	,'proszek do prania','_','_','_','_','_'),
(14	,'p&#x0142;yn do mycia naczy&#x0144;','_','_','_','_','_'),
(15	,'myd&#x0142;o/&#x017C;el myj&#x0105;cy','_','_','_','_','_'),
(16	,'pasta do z&#x0119;b&#x00F3;w','_','_','_','_','_'),
(17	,'szczoteczka do z&#x0119;b&#x00F3;w','_','_','_','_','_'),
(18	,'pampersy rozmiar 5','_','_','_','_','_'),
(19	,'spodnie zimowe dla And&#x017C;eliki (3 lata), szczup&#x0142;a, rozmiar 106','_','_','_','_','_'),
(20	,'ciep&#x0142;y sweter dla And&#x017C;eliki (3 lata), szczup&#x0142;a, rozmiar 106','_','_','_','_','_'),
(21	,'kurtka zimowa dla And&#x017C;eliki (3 lata), szczup&#x0142;a, rozmiar 106','_','_','_','_','_'),
(22	,'kurtka zimowa dla P. kasi (33 lata), kr&#x0119;pa, rozmiar 50/XXL','_','_','_','_','_'),
(23	,'buty zimowe (kozaki) dla P. Kasi (33 lata), rozmiar 41, na p&#x0142;askiej podeszwie','_','_','_','_','_'),
(24	,'spodnie zimowe dla P. Jana (38 lat), szczup&#x0142;y, rozmiar 42, wzrost 165cm','_','_','_','_','_'),
(25	,'blok rysunkowy','_','_','_','_','_'),
(26	,'kredki','_','_','_','_','_'),
(27	,'plastelina','_','_','_','_','_'),
(28	,'kolorowanki','_','_','_','_','_'),
(29	,'koc','_','_','_','_','_'),
(30	,'po&#x015B;ciel','_','_','_','_','_'),
(31	,'szafa 170 cm (wysoko&#x015B;&#x0107;) / 90 cm (szeroko&#x015B;&#x0107;)','_','_','_','_','_'),
(32	,'odkurzacz','_','_','_','_','_'),
(33	,'w&#x00F3;zek z lalk&#x0105;','_','_','_','_','_'),
(34	,'perfumy dla P. Kasi','_','_','_','_','_');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
