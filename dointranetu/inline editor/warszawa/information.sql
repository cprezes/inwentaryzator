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

CREATE TABLE IF NOT EXISTS `warszawa` (
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

INSERT INTO `warszawa` (`lp`, `potrzeby_rodziny`, `dane_darczyncy_1`, `dane_darczyncy_2`,`dane_darczyncy_3`,`dane_darczyncy_4`,`dane_darczyncy_5`) VALUES
(1	,'herbata','_','_','_','_','_'),
(2	,'kasza','_','_','_','_','_'),
(3	,'cukier','_','_','_','_','_'),
(4	,'makaron','_','_','_','_','_'),
(5	,'olej','_','_','_','_','_'),
(6	,'ry&#x017C;','_','_','_','_','_'),
(7	,'m&#x0105;ka','_','_','_','_','_'),
(8	,'d&#x017C;em','_','_','_','_','_'),
(9	,'mleko','_','_','_','_','_'),
(10	,'p&#x0142;atki &#x015B;niadaniowe','_','_','_','_','_'),
(11	,'ketchup','_','_','_','_','_'),
(12	,'krem czekoladowy do kanapek','_','_','_','_','_'),
(13	,'mi&#x00F3;d','_','_','_','_','_'),
(14	,'s&#x0142;odycze','_','_','_','_','_'),
(15	,'proszek do prani','_','_','_','_','_'),
(16	,'p&#x0142;yn do mycia naczy&#x0144;','_','_','_','_','_'),
(17	,'myd&#x0142;o/&#x017C;el myj&#x0105;cy','_','_','_','_','_'),
(18	,'pasta do z&#x0119;b&#x00F3;w','_','_','_','_','_'),
(19	,'szczotka do z&#x0119;b&#x00F3;w','_','_','_','_','_'),
(20	,'chusteczki nawil&#x017C;ane','_','_','_','_','_'),
(21	,'pasty do zeb&#x00F3;w dzieci&#x0119;ce','_','_','_','_','_'),
(22	,'&#x017C;ele pod prysznic dla dzieci','_','_','_','_','_'),
(23	,'odplamiacz','_','_','_','_','_'),
(24	,'p&#x0142;yn do p&#x0142;ukania tkanin','_','_','_','_','_'),
(25	,'skarpetki dla Martynki (3 lata) rozmiar 98','_','_','_','_','_'),
(26	,'rajstopki dla Martynki (3 lata) rozmiar 98','_','_','_','_','_'),
(27	,'bluzeczki dla Martynki (3 lata) rozmiar 98','_','_','_','_','_'),
(28	,'sweterki dla Martynki (3 lata) rozmiar 98','_','_','_','_','_'),
(29	,'skarpetki dla Wiktora (3 lata) rozmiar 92','_','_','_','_','_'),
(30	,'rajstopki dla Wiktora (3 lata) rozmiar 92','_','_','_','_','_'),
(31	,'bluzeczki dla Wiktora (3 lata) rozmiar 92','_','_','_','_','_'),
(32	,'sweterki dla Wiktora (3 lata) rozmiar 92','_','_','_','_','_'),
(33	,'skarpetki dla Marcina (5 lat) rozmiar 110','_','_','_','_','_'),
(35	,'bluzeczki dla Marcina (5 lat) rozmiar 110','_','_','_','_','_'),
(36	,'sweterki dla Marcina (5 lat) rozmiar 110','_','_','_','_','_'),
(37	,'kozaki zimowe dla Martynki (3 lata), rozmiar 25','_','_','_','_','_'),
(38	,'kozaki zimowe dla Wiktora (3 lata), rozmiar 25','_','_','_','_','_'),
(39	,'kozaki zimowe dla Marcina (5 lat), rozmiar 27','_','_','_','_','_'),
(40	,'farby do szko&#x0142;y','_','_','_','_','_'),
(41	,'papier kolorowy','_','_','_','_','_'),
(42	,'przybory do pisania','_','_','_','_','_'),
(43	,'kredki','_','_','_','_','_'),
(44	,'plastelina','_','_','_','_','_'),
(45	,'ryzy papieru','_','_','_','_','_'),
(46	,'flamastry','_','_','_','_','_'),
(47	,'kolorowanki','_','_','_','_','_'),
(48	,'sprytna plastelina','_','_','_','_','_'),
(49	,'przybory do rysowania','_','_','_','_','_'),
(50	,'prze&#x015B;cierad&#x0142;o - bez gumki na du&#x017C;e &#x0142;&#x00F3;zko dla P. Iwony (24 lata)','_','_','_','_','_'),
(51	,'prze&#x015B;cierad&#x0142;o - z gumk&#x0105; na &#x0142;&#x00F3;zko ch&#x0142;opc&#x00F3;w','_','_','_','_','_'),
(52	,'&#x0142;&#x00F3;&#x017C;ko dla Martynki (3 lata) tapczan, rozk&#x0142;adany fotel','_','_','_','_','_'),
(53	,'toster (opiekacz)','_','_','_','_','_'),
(54	,'zdalnie sterowany samochodzik dla Marcina (5 lat)','_','_','_','_','_'),
(55	,'samochodzik - du&#x017C;a ci&#x0119;&#x017C;ar&#x00F3;wka dla Wiktora (3 lata)','_','_','_','_','_'),
(56	,'domek dla lalek dla Martynki (3 lata)','_','_','_','_','_'),
(57	,'perfumy Naomi Cambel czarne lub inny s&#x0142;odki zapach dla P. Iwony (24 lata)','_','_','_','_','_');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
