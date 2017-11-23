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

CREATE TABLE IF NOT EXISTS `sopot` (
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

INSERT INTO `sopot` (`lp`, `potrzeby_rodziny`, `dane_darczyncy_1`, `dane_darczyncy_2`,`dane_darczyncy_3`,`dane_darczyncy_4`,`dane_darczyncy_5`) VALUES
(1	,'herbata','_','_','_','_','_'),
(2	,'kasza','_','_','_','_','_'),
(3	,'cukier','_','_','_','_','_'),
(4	,'konserwy mi&#x0119;sne','_','_','_','_','_'),
(5	,'kawa','_','_','_','_','_'),
(6	,'makaron','_','_','_','_','_'),
(7	,'olej','_','_','_','_','_'),
(8	,'konserwy rybne','_','_','_','_','_'),
(9	,'ry&#x017C;','_','_','_','_','_'),
(10	,'m&#x0105;ka','_','_','_','_','_'),
(11	,'d&#x017C;em','_','_','_','_','_'),
(12	,'warzywa w puszkach','_','_','_','_','_'),
(13	,'kaszki mleczno ry&#x017C;owe smakowe dla 2,5 latka','_','_','_','_','_'),
(14	,'p&#x0142;atki kukurydziane s&#x0142;odkie','_','_','_','_','_'),
(15	,'owsianka','_','_','_','_','_'),
(16	,'kremy do smarowania pieczywa','_','_','_','_','_'),
(17	,'sucha karma dla psa (wilczur)','_','_','_','_','_'),
(18	,'proszek do prania','_','_','_','_','_'),
(19	,'p&#x0142;yn do mycia naczy&#x0144;','_','_','_','_','_'),
(20	,'myd&#x0142;o/&#x017C;el myj&#x0105;cy','_','_','_','_','_'),
(21	,'pasta do z&#x0119;b&#x00F3;w','_','_','_','_','_'),
(22	,'p&#x0142;yny czyszcz&#x0105;ce','_','_','_','_','_'),
(23	,'szampon','_','_','_','_','_'),
(24	,'szczoteczka do z&#x0119;b&#x00F3;w','_','_','_','_','_'),
(25	,'bielizna dla Aleksa (2,5 roku)','_','_','_','_','_'),
(26	,'p&#x0142;yn do p&#x0142;ukania tkanin (delikatny)','_','_','_','_','_'),
(27	,'&#x015B;rodki do czyszczenia grzyba i ple&#x015B;ni','_','_','_','_','_'),
(28	,'skarpety, bokserki dla P. Bartka (33 lata), rozmiar 46, XL, wysportowany :)','_','_','_','_','_'),
(29	,'spodnie rurki dla Wiki (10 lat), rozmiar 140, szczup&#x0142;a','_','_','_','_','_'),
(30	,'spodnie leginsy dla Wiki (10 lat), rozmiar 140, szczup&#x0142;a','_','_','_','_','_'),
(31	,'mi&#x0119;kki biustonosz dla Wiki (10 lat), rozmiar 140, szczup&#x0142;a','_','_','_','_','_'),
(32	,'bielizna dla Wiki (figi)  (10 lat), rozmiar 140, szczup&#x0142;a','_','_','_','_','_'),
(33	,'spodnie leginsy dla Julki (8 lat), rozmiar 140, przy ko&#x015B;ci','_','_','_','_','_'),
(34	,'str&#x00F3;j sportowy dla Julki (8 lat), rozmiar 140, przy ko&#x015B;ci','_','_','_','_','_'),
(35	,'mi&#x0119;kki biustonosz dla Julki (8 lat), rozmiar 140, przy ko&#x015B;ci','_','_','_','_','_'),
(36	,'bielizna dla Julki (figi) (8 lat), rozmiar 140, przy ko&#x015B;ci','_','_','_','_','_'),
(37	,'bielizna dla Fabiana (majtki, skarpety) (7 lat) rozmiar 134, przy ko&#x015B;ci','_','_','_','_','_'),
(38	,'str&#x00F3;j do tenisa dla Fabiana (7 lat), przy ko&#x015B;ci','_','_','_','_','_'),
(39	,'spodnie dresowe dla Alexa (2,5 roku), rozmiar 100, szczup&#x0142;y','_','_','_','_','_'),
(40	,'rajstopki dla Aleksa (2,5 roku), rozmiar 100, szczup&#x0142;y','_','_','_','_','_'),
(41	,'skarpetki dla Aleksa (2,5 roku), rozmiar 100, szczup&#x0142;y','_','_','_','_','_'),
(42	,'trapery zimowe, ciemne dla P. Bartka (33 lata), rozmiar 46-47','_','_','_','_','_'),
(43	,'kozaki zimowe na zamek z fr&#x0119;dzlami dla Wiki (10 lat), rozmiar 37','_','_','_','_','_'),
(44	,'botki zimowe (wysokie na sznor&#x00F3;wki, czarne lub szare) dla Julki (8 lat), rozmiar 35','_','_','_','_','_'),
(45	,'trapery zimowe, ciemne dla Fabiana (7 lat), rozmiar 34','_','_','_','_','_'),
(46	,'buty sportowe do tenisa dla Fabiana (7 lat) rozmiar 34','_','_','_','_','_'),
(47	,'trapery zimowe z rzepami dla Akexa (2,5 roku), rozmiar 27','_','_','_','_','_'),
(48	,'zeszyty','_','_','_','_','_'),
(49	,'farby','_','_','_','_','_'),
(50	,'papier kolorowy','_','_','_','_','_'),
(51	,'plecak na k&#x00F3;&#x0142;kach z r&#x0105;czk&#x0105; dla Julki (8 lat)','_','_','_','_','_'),
(52	,'bloki','_','_','_','_','_'),
(53	,'klej','_','_','_','_','_'),
(54	,'przybory do pisania','_','_','_','_','_'),
(55	,'kredki','_','_','_','_','_'),
(56	,'pi&#x00F3;rnik dla Julki (8 lat)','_','_','_','_','_'),
(57	,'mazaki','_','_','_','_','_'),
(58	,'p&#x0119;dzle','_','_','_','_','_'),
(59	,'ta&#x015B;ma klej&#x0105;ca','_','_','_','_','_'),
(60	,'zszywacz','_','_','_','_','_'),
(61	,'ko&#x0142;dra','_','_','_','_','_'),
(62	,'koc','_','_','_','_','_'),
(63	,'r&#x0119;czniki','_','_','_','_','_'),
(64	,'po&#x015B;ciel dla dzieci 140x200','_','_','_','_','_'),
(65	,'poduszka','_','_','_','_','_'),
(66	,'spinacze do suszenia prania (klamerki)','_','_','_','_','_'),
(67	,'firany nietransparentne (nieprzepuszczaj&#x0105;ce &#x015B;wiat&#x0142;a) 150x300 - 2 sztuki ','_','_','_','_','_'),
(68	,'&#x0142;y&#x017C;eczki deserowe','_','_','_','_','_'),
(69	,'szafa na ubrania, du&#x017C;a, 3 drzwiowa, wysoka','_','_','_','_','_'),
(70	,'odkurzacz','_','_','_','_','_'),
(71	,'mikrofal&#x00F3;wka','_','_','_','_','_'),
(72	,'garnki','_','_','_','_','_'),
(73	,'g&#x0142;ad&#x017A; szpachlowa, np. cekol ok 20 kg','_','_','_','_','_'),
(74	,'tapety + klej','_','_','_','_','_'),
(75	,'zestaw pachn&#x0105;cych kosmetyk&#x00F3;w i akcesori&#x00F3;w (spinki, opaski) dla Wiki (10 lat)','_','_','_','_','_'),
(76	,'bransoletka dla Wiki (10 lat)','_','_','_','_','_'),
(77	,'pompony i str&#x00F3;j cheerleaderki dla Julki (8 lat)','_','_','_','_','_'),
(78	,'lok&#x00F3;wka do w&#x0142;os&#x00F3;w dla Julki (8 lat)','_','_','_','_','_'),
(79	,'spinki do w&#x0142;os&#x00F3;w, gumki dla Julki (8 lat)','_','_','_','_','_'),
(80	,'dezodorant (zapach dla pi&#x0142;karzy) dla Fabiana (7 lat)','_','_','_','_','_'),
(81	,'samochodzik ma&#x0142;y HotWheels dla Fabiana (7 lat)','_','_','_','_','_'),
(82	,'zabawkowy motor do je&#x017C;dzenia (plastikowy) dla Alexa (2,5 roku)','_','_','_','_','_'),
(83	,'wketarko-wiertarka dla P. Bartka (33 lata)','_','_','_','_','_'),
(84	,'telefon dla P. Bartka (33 lata)','_','_','_','_','_');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
