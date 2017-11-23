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

CREATE TABLE IF NOT EXISTS `poznan` (
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

INSERT INTO `poznan` (`lp`, `potrzeby_rodziny`, `dane_darczyncy_1`, `dane_darczyncy_2`,`dane_darczyncy_3`,`dane_darczyncy_4`,`dane_darczyncy_5`) VALUES
(1	,'herbata','_','_','_','_','_'),
(2	,'kasza','_','_','_','_','_'),
(3	,'cukier','_','_','_','_','_'),
(4	,'kawa','_','_','_','_','_'),
(5	,'makaron','_','_','_','_','_'),
(6	,'olej','_','_','_','_','_'),
(7	,'konserwy mi&#x0119;sne','_','_','_','_','_'),
(8	,'konserwy rybne','_','_','_','_','_'),
(9	,'ry&#x017C;','_','_','_','_','_'),
(10	,'m&#x0105;ka','_','_','_','_','_'),
(11	,'warzywa w puszkach','_','_','_','_','_'),
(12	,'proszek do prania','_','_','_','_','_'),
(13	,'p&#x0142;yn do mycia naczy&#x0144;','_','_','_','_','_'),
(14	,'myd&#x0142;o/&#x017C;el myj&#x0105;cy','_','_','_','_','_'),
(15	,'pasta do z&#x0119;b&#x00F3;w','_','_','_','_','_'),
(16	,'p&#x0142;yny czyszcz&#x0105;ce','_','_','_','_','_'),
(17	,'szampon','_','_','_','_','_'),
(18	,'szczoteczka do z&#x0119;b&#x00F3;w','_','_','_','_','_'),
(19	,'krem do twarzy Nivea dla Joanny (13 lat)','_','_','_','_','_'),
(20	,'bluzki z d&#x0142;ugim r&#x0119;kawem (przej&#x015B;ciowe) dla Joanny (13 lat), szczup&#x0142;a, rozmiar M, 165 cm wzrostu','_','_','_','_','_'),
(21	,'spodnie jeansy lub dresowe (przej&#x015B;ciowe) dla Nikoli (6 lat), rozmiar 128','_','_','_','_','_'),
(22	,'spodnie legginsy dla Nikoli (6 lat), rozmiar 128','_','_','_','_','_'),
(23	,'spodnie legginsy dla Natali (16 lat), rozmiar S, 175 cm wzrostu','_','_','_','_','_'),
(24	,'kozaki zimowe dla Nikoli (6 lat), rozmiar 35','_','_','_','_','_'),
(25	,'czajnik na kuchenk&#x0119; gazow&#x0105;','_','_','_','_','_'),
(26	,'chodzik dla P. Teresy (75 lat)','_','_','_','_','_'),
(27	,'gad&#x017C;ety z motywami bajki Psi Patrol (np. parasolka, plecak, r&#x0119;cznik) dla Nikoli (6 lat)','_','_','_','_','_'),
(28	,'gad&#x017C;ety z jednoro&#x017C;cami lub flamingami dla Joanny (13 lat)','_','_','_','_','_'),
(29	,'materia&#x0142;y artystyczne dla Natali (np. do malowania)','_','_','_','_','_'),
(30	,'pi&#x017C;ama lub koszula nocna dla P. Kasi (45 lat), rozmiar 3XL, 50/52','_','_','_','_','_'),
(31	,'ciep&#x0142;e bambosze dla P. Teresy (75 lat)','_','_','_','_','_');
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
