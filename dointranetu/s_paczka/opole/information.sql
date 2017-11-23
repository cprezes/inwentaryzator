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

CREATE TABLE IF NOT EXISTS `opole` (
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

INSERT INTO `opole` (`lp`, `potrzeby_rodziny`, `dane_darczyncy_1`, `dane_darczyncy_2`,`dane_darczyncy_3`,`dane_darczyncy_4`,`dane_darczyncy_5`) VALUES
(1,'herbata','_','_','_','_','_'),
(2,'kasza','_','_','_','_','_'),
(3,'cukier','_','_','_','_','_'),
(4,'konserwy mi&#x0119;sne','_','_','_','_','_'),
(5,'kawa','_','_','_','_','_'),
(6,'makaron','_','_','_','_','_'),
(7,'olej','_','_','_','_','_'),
(8,'konserwy rybne','_','_','_','_','_'),
(9,'ry&#x017C;','_','_','_','_','_'),
(10,'m&#x0105;ka','_','_','_','_','_'),
(11,'d&#x017C;em','_','_','_','_','_'),
(12,'warzywa w puszkach','_','_','_','_','_'),
(13,'proszek do prania','_','_','_','_','_'),
(14,'p&#x0142;yn do mycia naczy&#x0144;','_','_','_','_','_'),
(15,'myd&#x0142;o/&#x017C;el myj&#x0105;cy','_','_','_','_','_'),
(16,'p&#x0142;yny czyszcz&#x0105;ce','_','_','_','_','_'),
(17,'szampon','_','_','_','_','_'),
(18,'spodnie dresowe dla P. Danuty (49 lat), rozmir L/XL','_','_','_','_','_'),
(19,'bluzki/podkoszulki dla P. Danuty (49 lat), rozmiar L/XL','_','_','_','_','_'),
(20,'bluzy przej&#x015B;ciowe/zimowe dla P. Danuty (49 lat), rozmiar L/XL','_','_','_','_','_'),
(21,'spodnie dresowe dla P. Artura (48 lat), rozmiar L','_','_','_','_','_'),
(22,'koszuli dla P. Artura (48 lat), rozmiar L','_','_','_','_','_'),
(23,'bluzy przej&#x015B;ciowe/zimowe dla P. Artura (48 lat), rozmiar L','_','_','_','_','_'),
(24,'bielizna osobista dla P. Artura (48 lat), rozmiar L','_','_','_','_','_'),
(25,'&#x015B;liniaki do jedzenia dla P. Artura (48 lat)','_','_','_','_','_'),
(26,'spodnie dresowe przej&#x015B;ciowe dla Ma&#x0107;ka (9 lat), rozmiar 128 cm - KILKA PAR','_','_','_','_','_'),
(27,'podkoszulki dla Ma&#x0107;ka (9 lat) rozmiar 128 cm','_','_','_','_','_'),
(28,'bluzki z d&#x0142;ugim r&#x0119;kawem, zimowe dla Ma&#x0107;ka (9 lat) rozmiar 128 cm','_','_','_','_','_'),
(29,'ciep&#x0142;e bluzy, swetry dla Ma&#x0107;ka (9 lat) rozmiar 128 cm','_','_','_','_','_'),
(30,'bielizna osobista dla Ma&#x0107;ka (9 lat) rozmiar 128 cm - KILKA PAR','_','_','_','_','_'),
(31,'buty m&#x0119;skie zimowe (wysokie) dla P. Artura (48 lat) rozmiar 40/41','_','_','_','_','_'),
(32,'zimowe buty ch&#x0142;opi&#x0119;ce dla Ma&#x0107;ka (9 lat) rozmiar 30','_','_','_','_','_'),
(33,'plastelina','_','_','_','_','_'),
(34,'komplet r&#x0119;cznik&#x00F3;w k&#x0105;pielowych','_','_','_','_','_'),
(35,'po&#x015B;ciel rozmiar 180x200','_','_','_','_','_'),
(36,'pralka','_','_','_','_','_'),
(37,'laptop dla Ma&#x0107;ka (9 lat)','_','_','_','_','_'),
(38,'ksi&#x0105;zki dla P. Danuty (49 lat), romanse, krymina&#x0142;y, przygodowe','_','_','_','_','_'),
(39,'perfumy da p. Danuty (49 lat)','_','_','_','_','_'),
(40,'zabawka furby dla Ma&#x0107;ka (9 lat)','_','_','_','_','_');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
