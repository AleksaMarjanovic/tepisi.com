-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2018 at 11:24 AM
-- Server version: 5.5.60-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tepisi.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `jed_mere`
--

CREATE TABLE IF NOT EXISTS `jed_mere` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(24) NOT NULL,
  `oznaka` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jed_mere`
--

INSERT INTO `jed_mere` (`id`, `naziv`, `oznaka`) VALUES
(1, 'metar', 'm'),
(2, 'metar kvadratni', 'm&#178;'),
(3, 'komad', 'kom'),
(4, 'kilogram', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE IF NOT EXISTS `korpa` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `tepih_id` int(6) NOT NULL,
  `aktivna` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tepih_id` (`tepih_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tepih`
--

CREATE TABLE IF NOT EXISTS `tepih` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(24) NOT NULL,
  `sifra` int(8) NOT NULL,
  `default_duzina` double(8,2) DEFAULT NULL,
  `sirina` int(3) DEFAULT NULL,
  `precnik` double(8,2) DEFAULT NULL,
  `stanje_magacin` int(11) NOT NULL,
  `jed_mere_id` int(3) NOT NULL,
  `tezina` int(6) NOT NULL,
  `tez_koeficijent` int(3) NOT NULL,
  `boja` varchar(24) DEFAULT NULL,
  `materijal` varchar(24) DEFAULT NULL,
  `duz_dlake` int(3) DEFAULT NULL,
  `opis` text,
  `slika` text,
  `cena` double(8,2) NOT NULL,
  `status_id` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sifra` (`sifra`),
  KEY `jed_mere_id` (`jed_mere_id`),
  KEY `status_id` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tepih`
--

INSERT INTO `tepih` (`id`, `naziv`, `sifra`, `default_duzina`, `sirina`, `precnik`, `stanje_magacin`, `jed_mere_id`, `tezina`, `tez_koeficijent`, `boja`, `materijal`, `duz_dlake`, `opis`, `slika`, `cena`, `status_id`) VALUES
(1, 'beli', 123456, 20.00, 5, NULL, 1000, 2, 1000, 0, 'bela', 'vuna', 6, 'beli tepis', 'images/metraza/plavi-marvel.jpg', 500.50, 1),
(2, 'crveni', 456789, 20.00, 5, NULL, 1000, 2, 1000, 0, 'crvena', 'vuna', 6, 'crveni tepih od vune', 'images/metraza/crveni-marvel.jpg', 500.00, 1),
(3, 'exclusive-test', 987456, NULL, NULL, 2.00, 3, 3, 10, 1, 'saren', 'vuna', 10, 'sareni tepih unesen za svrhe testiranja ', 'images/komadi/shaggy-exclusive.jpg', 5000.00, 4),
(4, 'classic-test', 888888, NULL, NULL, 2.00, 3, 3, 10, 1, 'saren', 'vuna', 10, 'sareni tepih unesen za svrhe testiranja ', 'images/komadi/shaggy-exclusive.jpg', 5000.00, 4),
(5, 'test - manji od 4', 789789, 1.00, 1, NULL, 1000, 3, 5, 1, 'plava', 'pamuk', 10, 'images/komadi/classic.jpg', 'images/komadi/classic.jpg', 500.00, 4),
(6, 'classic-test', 888800, 5.00, 5, NULL, 3, 3, 10, 1, 'saren', 'vuna', 10, 'sareni tepih unesen za svrhe testiranja ', 'images/komadi/shaggy-exclusive.jpg', 5000.00, 4),
(7, 'test2 - manji od 4', 189789, 2.00, 1, NULL, 1000, 3, 5, 1, 'plava', 'pamuk', 10, 'images/komadi/classic.jpg', 'images/komadi/classic.jpg', 500.00, 4),
(8, 'test3 - manji od 4', 289789, 2.00, 2, NULL, 1000, 3, 5, 1, 'plava', 'pamuk', 10, 'images/komadi/classic.jpg', 'images/komadi/classic.jpg', 500.00, 4),
(9, 'veci od 4', 888899, 2.00, 5, NULL, 3, 3, 10, 1, 'saren', 'vuna', 10, 'sareni tepih unesen za svrhe testiranja ', 'images/komadi/shaggy-exclusive.jpg', 5000.00, 4),
(10, 'pravougaonik- srednji', 987457, 2.00, 1, NULL, 3, 3, 10, 1, 'saren', 'vuna', 10, 'sareni tepih unesen za svrhe testiranja ', 'images/komadi/shaggy-exclusive.jpg', 5000.00, 4),
(12, 'precnik - srednji', 121212, NULL, NULL, 1.00, 1, 3, 1, 1, '1', '1', 1, '1', 'images/komadi/classic.jpg', 500.00, 4),
(13, 'metraza - 5m', 111111, 20.00, 5, NULL, 1000, 2, 1000, 0, 'crvena', 'vuna', 6, 'crveni tepih od vune', 'images/metraza/crveni-marvel.jpg', 500.00, 1),
(15, 'crveni - 3m', 456778, 20.00, 3, NULL, 1000, 2, 1000, 0, 'crvena', 'vuna', 6, 'crveni tepih od vune', 'images/metraza/crveni-marvel.jpg', 500.00, 1),
(16, 'crveni - 2m', 659865, 20.00, 2, NULL, 1000, 2, 1000, 0, 'crvena', 'vuna', 6, 'crveni tepih od vune', 'images/metraza/crveni-marvel.jpg', 500.00, 1),
(17, 'crveni - 1m', 679865, 20.00, 1, NULL, 1000, 2, 1000, 0, 'crvena', 'vuna', 6, 'crveni tepih od vune', 'images/metraza/crveni-marvel.jpg', 500.00, 1),
(18, 'crveni - rinfus', 668865, 20.00, 1, NULL, 1, 2, 1000, 0, 'crvena', 'vuna', 6, 'crveni tepih od vune', 'images/metraza/crveni-marvel.jpg', 500.00, 2),
(19, 'otpad', 366987, NULL, NULL, NULL, 1, 4, 1000, 1, NULL, NULL, NULL, 'otpad', 'images/otpad.jpg', 50.00, 3),
(20, 'komad pravugaonik veliki', 223388, 5.00, 5, NULL, 3, 3, 60, 6, NULL, NULL, NULL, NULL, 'images/komadi/classic.jpg', 6000.00, 4),
(22, 'otpad1', 366981, NULL, NULL, NULL, 1, 4, 1000, 1, NULL, NULL, NULL, 'otpad', 'images/otpad.jpg', 50.00, 3),
(23, 'otpad2', 366980, NULL, NULL, NULL, 10, 4, 1000, 1, NULL, NULL, NULL, 'otpad', 'images/otpad.jpg', 50.00, 3),
(24, 'plavi - rinfus', 668866, 11.45, 1, NULL, 1, 2, 1000, 0, 'crvena', 'vuna', 6, 'crveni tepih od vune', 'images/metraza/crveni-marvel.jpg', 500.00, 2),
(25, 'test prv < 1.5', 852630, 0.50, 0, NULL, 3, 3, 6, 1, 'beli', 'vuna', 6, 'beli', 'images/komadi/classic.jpg', 4000.00, 4),
(26, 'test pr < 1.5', 364710, NULL, NULL, 0.50, 3, 3, 10, 1, 'saren', 'vuna', 10, 'sareni tepih unesen za svrhe testiranja ', 'images/komadi/shaggy-exclusive.jpg', 5000.00, 4),
(27, 'beli', 123400, 20.00, 5, NULL, 1000, 2, 1000, 0, 'bela', 'vuna', 6, 'beli tepis', 'images/metraza/plavi-marvel.jpg', 500.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tepih_status`
--

CREATE TABLE IF NOT EXISTS `tepih_status` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(16) NOT NULL,
  `granicna_vrednost` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tepih_status`
--

INSERT INTO `tepih_status` (`id`, `naziv`, `granicna_vrednost`) VALUES
(1, 'rolna', 1000),
(2, 'rinfus', 1.5),
(3, 'otpad', 1),
(4, 'komadi', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(48) NOT NULL,
  `ime_prezime` varchar(64) NOT NULL,
  `adresa` text NOT NULL,
  `grad` varchar(24) NOT NULL,
  `pos_br` varchar(24) NOT NULL,
  `prv_lice` int(2) NOT NULL,
  `pib` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `ime_prezime`, `adresa`, `grad`, `pos_br`, `prv_lice`, `pib`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost.com', 'admin admin', 'localhost', 'localhost', 'localhost', 1, 123456789),
(2, 'aleksa', '202cb962ac59075b964b07152d234b70', 'aleksamarjanovic15@gmail.com', 'aleksa marjanovic', 'slanacki put 109b', 'beograd', '11200', 0, 0),
(4, 'andjela', 'd65d8cc2bf6f65dbeca600c9148761ce', 'andjela@gmail.com', 'Andjela Marjanovic', 'slanacki put 109b', 'Beograd', '11200', 0, 0),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 'Test Test', 'test adresa 101', 'Test grad', '12345', 1, 2147483647);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korpa_ibfk_1` FOREIGN KEY (`tepih_id`) REFERENCES `tepih` (`id`),
  ADD CONSTRAINT `korpa_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tepih`
--
ALTER TABLE `tepih`
  ADD CONSTRAINT `tepih_ibfk_1` FOREIGN KEY (`jed_mere_id`) REFERENCES `jed_mere` (`id`),
  ADD CONSTRAINT `tepih_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `tepih_status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
