-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mag 12, 2015 alle 11:05
-- Versione del server: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guichetdb`
--

DROP DATABASE IF EXISTS `guichetdb`;

CREATE DATABASE IF NOT EXISTS `guichetdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `guichetdb`;

-- --------------------------------------------------------

--
-- Struttura della tabella `access`
--

DROP TABLE IF EXISTS `access`;
CREATE TABLE IF NOT EXISTS `access` (
  `id_access` int(11) NOT NULL AUTO_INCREMENT,
  `timeStampAccesso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addresse_ip` varchar(15) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id_access`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Svuota la tabella prima dell'inserimento `access`
--

TRUNCATE TABLE `access`;
--
-- Dump dei dati per la tabella `access`
--

INSERT INTO `access` (`id_access`, `timeStampAccesso`, `id_client`, `username`, `password`, `addresse_ip`, `etat`) VALUES
(1, '2015-05-09 21:34:57', 0, '7740502648', 'bibo', '127.0.0.1', 0),
(2, '2015-05-09 21:35:03', 0, '7740502648', 'bobo', '127.0.0.1', 0),
(3, '2015-05-09 21:35:52', 1, '1728383435', 'bobo', '127.0.0.1', 1),
(4, '2015-05-09 23:00:55', 0, '7740502648', 'bobo', '127.0.0.1', 0),
(5, '2015-05-09 23:01:05', 1, '1728383435', 'bobo', '127.0.0.1', 1),
(6, '2015-05-10 13:35:43', 4, '0591849468', 'bobo', '127.0.0.1', 1),
(7, '2015-05-10 16:12:52', 5, '6499852544', 'dido', '127.0.0.1', 1),
(8, '2015-05-10 16:17:02', 6, '7397340435', 'dido', '127.0.0.1', 1),
(9, '2015-05-10 23:23:02', 4, '0591849468', 'bobo', '127.0.0.1', 1),
(10, '2015-05-11 08:49:18', 0, '1728383435', 'bobo', '127.0.0.1', 0),
(11, '2015-05-11 08:49:46', 6, '7397340435', 'dido', '127.0.0.1', 1),
(12, '2015-05-11 10:57:36', 0, '7740502648', 'dido', '127.0.0.1', 0),
(13, '2015-05-11 10:58:00', 6, '7397340435', 'dido', '127.0.0.1', 1),
(14, '2015-05-11 14:07:33', 0, '1728383435', 'bobobobo', '127.0.0.1', 0),
(15, '2015-05-11 14:08:32', 0, '1728383435', 'bobobobo', '127.0.0.1', 0),
(16, '2015-05-11 14:10:03', 1, '1728383435', 'bobobobo', '127.0.0.1', 1),
(17, '2015-05-12 09:01:36', 0, 'Administrateur', 'somepass', '127.0.0.1', 0),
(18, '2015-05-12 09:05:11', 1, '1728383435', 'bobobobo', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `bureau`
--

DROP TABLE IF EXISTS `bureau`;
CREATE TABLE IF NOT EXISTS `bureau` (
  `Nom` text NOT NULL,
  `Rue` text NOT NULL,
  `Cite` text NOT NULL,
  `Province` text NOT NULL,
  `Lattitude` varchar(20) NOT NULL,
  `Longitude` varchar(20) NOT NULL,
  `Altitude` float NOT NULL,
  `Foto` text NOT NULL,
  `Reference` longtext NOT NULL,
  `Note` longtext NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Svuota la tabella prima dell'inserimento `bureau`
--

TRUNCATE TABLE `bureau`;
--
-- Dump dei dati per la tabella `bureau`
--

INSERT INTO `bureau` (`Nom`, `Rue`, `Cite`, `Province`, `Lattitude`, `Longitude`, `Altitude`, `Foto`, `Reference`, `Note`, `ID`) VALUES
('Bardo', 'Bureau de Poste Bardo Av Habib Thameur', 'Bardo', 'TUNIS', '36.8092364 N', '10.1344043 E', 246, '', 'Tel: 71 505 099, Fax: 71 223 328', 'Email: apc.bardo@poste.tn', 1),
('Tunis Hafsia', '32, Rue Sidi Bouhdid 1059 El Hafsia', 'Tunis Hafsia', 'TUNIS', '36.801334 N', '10.16719 E', 1270, '', 'Tel: 71 572 072, Fax: 71 569 947', 'Email: apc.elhafsia@poste.tn', 2),
('Enaser', 'Av Hedi Nouira', 'Enaser', 'ARIANA', '36.8599231', '10.1556006', 0, '', 'Tel: 70 854 033, Fax: 70 854 034', '', 39),
('Tunis Carthage', 'Complexe Postal,BD7 nov. 2035 Tunis Carthage', 'Tunis Carthage', 'ARIANA', '36.8495971', '10.2103195', 0, '', 'Tel:71 940 578, Fax: 71 940 578', 'apc.tuniscarthage@poste.tn', 40);

-- --------------------------------------------------------

--
-- Struttura della tabella `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `allDay` tinyint(1) DEFAULT NULL,
  `id_bureau` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=20 ;

--
-- Svuota la tabella prima dell'inserimento `evenement`
--

TRUNCATE TABLE `evenement`;
--
-- Dump dei dati per la tabella `evenement`
--

INSERT INTO `evenement` (`id`, `id_client`, `start`, `end`, `url`, `allDay`, `id_bureau`, `id_service`) VALUES
(1, 1, '2015-05-06 08:10:00', '2015-05-06 08:20:00', 'null', NULL, 1, 1),
(4, 1, '2015-05-08 08:00:00', '2015-05-08 08:10:00', 'null', NULL, 1, 5),
(7, 4, '2015-05-06 08:30:00', '2015-05-06 08:40:00', 'null', NULL, 1, 3),
(9, 4, '2015-05-07 08:50:00', '2015-05-07 09:00:00', 'null', NULL, 1, 1),
(11, 4, '2015-05-06 09:20:00', '2015-05-06 09:30:00', 'null', NULL, 1, 5),
(12, 6, '2015-05-07 08:30:00', '2015-05-07 08:40:00', 'null', NULL, 1, 3),
(13, 6, '2015-05-05 08:50:00', '2015-05-05 09:00:00', 'null', NULL, 1, 4),
(14, 4, '2015-05-11 08:10:00', '2015-05-11 08:20:00', 'null', NULL, 3, 4),
(15, 6, '2015-05-13 08:30:00', '2015-05-13 08:40:00', 'null', NULL, 1, 5),
(16, 6, '2015-05-15 08:20:00', '2015-05-15 08:30:00', 'null', NULL, 2, 4),
(17, 6, '2015-05-14 09:30:00', '2015-05-14 09:40:00', 'null', NULL, 2, 2),
(18, 6, '2015-05-13 08:30:00', '2015-05-13 08:40:00', 'null', NULL, 3, 0),
(19, 6, '2015-05-16 09:20:00', '2015-05-16 09:30:00', 'null', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(255) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Svuota la tabella prima dell'inserimento `service`
--

TRUNCATE TABLE `service`;
--
-- Dump dei dati per la tabella `service`
--

INSERT INTO `service` (`id_service`, `nom_service`, `couleur`) VALUES
(1, 'service', 'red'),
(2, 'services financiers', 'green'),
(3, 'courrier postal', 'blue'),
(4, 'services telegraphiques', 'violet'),
(5, 'Services internes', 'brown');

-- --------------------------------------------------------

--
-- Struttura della tabella `type_user`
--

DROP TABLE IF EXISTS `type_user`;
CREATE TABLE IF NOT EXISTS `type_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- Svuota la tabella prima dell'inserimento `type_user`
--

TRUNCATE TABLE `type_user`;
--
-- Dump dei dati per la tabella `type_user`
--

INSERT INTO `type_user` (`id`, `description`) VALUES
(1, 'ADMINISTRATOR'),
(2, 'User'),
(3, 'POWER USER');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `naissance` date DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(45) NOT NULL,
  `id_type_user` int(10) unsigned DEFAULT '2',
  `date_ins` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_del` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `num_compte` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=7 ;

--
-- Svuota la tabella prima dell'inserimento `user`
--

TRUNCATE TABLE `user`;
--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `naissance`, `password`, `email`, `id_type_user`, `date_ins`, `date_del`, `num_compte`) VALUES
(1, 'utlisateur1', 'utilisateur', '1728383435', '1982-05-03', 'bobobobo', 'adc@hot.com', 1, '2015-05-09 16:35:16', '0000-00-00 00:00:00', ''),
(4, 'utlisateur2', 'utilisateur', '0591849468', '1981-05-04', 'bobo', 'adc@hot.com', 1, '2015-05-09 16:45:06', '0000-00-00 00:00:00', ''),
(6, 'utlisateur3', 'utilisateurr', '7397340435', '1986-06-05', 'dido', 'adc@hot.com', 2, '2015-05-10 16:16:26', '0000-00-00 00:00:00', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
