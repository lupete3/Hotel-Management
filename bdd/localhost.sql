-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 24 Janvier 2020 à 09:04
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bbh`
--
CREATE DATABASE `bbh` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bbh`;

-- --------------------------------------------------------

--
-- Structure de la table `admin_bbh`
--

CREATE TABLE IF NOT EXISTS `admin_bbh` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(150) DEFAULT NULL,
  `user_funct` varchar(50) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `mdp_admin` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `admin_bbh`
--

INSERT INTO `admin_bbh` (`id_admin`, `nom_admin`, `user_funct`, `date_creation`, `mdp_admin`) VALUES
(1, 'omar', 'admin', '2019-12-14', '1234'),
(2, 'moussa', 'admin', '2019-12-14', 'ad123');

-- --------------------------------------------------------

--
-- Structure de la table `approvboiss`
--

CREATE TABLE IF NOT EXISTS `approvboiss` (
  `idApprovBoiss` int(11) NOT NULL AUTO_INCREMENT,
  `qnteApprov` int(11) NOT NULL,
  `puApprov` double NOT NULL,
  `ptApprov` double NOT NULL,
  `dateApprov` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idBoiss` int(11) NOT NULL,
  `idFour` int(11) NOT NULL,
  `modeAchat` varchar(20) NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  PRIMARY KEY (`idApprovBoiss`),
  KEY `idBoiss` (`idBoiss`),
  KEY `idFour` (`idFour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `approvboiss`
--

INSERT INTO `approvboiss` (`idApprovBoiss`, `qnteApprov`, `puApprov`, `ptApprov`, `dateApprov`, `idBoiss`, `idFour`, `modeAchat`, `accompte`, `reste`) VALUES
(1, 2, 8, 16, '2020-01-12 14:36:50', 28, 2, 'Cash', 16, 0),
(2, 1, 9.4, 9.4, '2020-01-12 14:33:28', 23, 5, 'CrÃ©dit', 9.4, 0),
(3, 6, 12.5, 75, '2020-01-12 14:37:49', 29, 2, 'CrÃ©dit', 12.5, 62.5),
(4, 2, 9.4, 18.8, '2020-01-17 13:03:50', 23, 5, 'CrÃ©dit', 18.8, 0),
(5, 4, 3.52, 14.08, '2020-01-19 18:24:38', 33, 4, 'CrÃ©dit', 14.11, -0.029999999999999),
(6, 1, 9, 9, '2020-01-23 14:57:22', 98, 1, 'Cash', 9, 0),
(7, 4, 3.52, 14.08, '2020-01-23 14:56:20', 33, 1, 'CrÃ©dit', 14.08, 0),
(8, 1, 12, 12, '2020-01-23 14:46:14', 24, 5, 'Cash', 12, 0),
(9, 1, 9, 9, '2020-01-23 14:48:54', 2, 2, 'Cash', 9, 0);

-- --------------------------------------------------------

--
-- Structure de la table `approvcuisine`
--

CREATE TABLE IF NOT EXISTS `approvcuisine` (
  `idApprovCuis` smallint(3) NOT NULL AUTO_INCREMENT,
  `dateSortie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qteSortie` double NOT NULL,
  `idDivCuis` smallint(3) NOT NULL,
  `ptApprovDiv` double NOT NULL,
  `accompte` double NOT NULL,
  `modepaie` varchar(50) DEFAULT NULL,
  `reste` double NOT NULL,
  `idFour` int(11) NOT NULL,
  `puApprovDiv` double NOT NULL,
  PRIMARY KEY (`idApprovCuis`),
  KEY `idDivCuis` (`idDivCuis`),
  KEY `idFour` (`idFour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `approvdiv`
--

CREATE TABLE IF NOT EXISTS `approvdiv` (
  `idApprovDiv` int(11) NOT NULL AUTO_INCREMENT,
  `qnteApprovDiv` int(11) NOT NULL,
  `puApprovDiv` double NOT NULL,
  `ptApprovDiv` double NOT NULL,
  `dateApprovDiv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idDiv` int(11) NOT NULL,
  `modepaie` varchar(10) NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  `idFour` int(11) NOT NULL,
  PRIMARY KEY (`idApprovDiv`),
  KEY `idDiv` (`idDiv`),
  KEY `idFour` (`idFour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `approvdiv`
--

INSERT INTO `approvdiv` (`idApprovDiv`, `qnteApprovDiv`, `puApprovDiv`, `ptApprovDiv`, `dateApprovDiv`, `idDiv`, `modepaie`, `accompte`, `reste`, `idFour`) VALUES
(1, 10, 2, 20, '2020-01-13 08:53:07', 4, 'Cash', 20, 0, 1),
(2, 10, 1.6, 16, '2020-01-22 09:58:26', 4, 'CrÃ©dit', 16, 0, 1),
(3, 1, 8, 8, '2020-01-22 09:58:51', 21, 'Cash', 8, 0, 1),
(4, 1, 20, 20, '2020-01-22 09:59:23', 18, 'Cash', 20, 0, 1),
(5, 1, 6, 6, '2020-01-22 10:00:00', 29, 'Cash', 6, 0, 1),
(6, 2, 5, 10, '2020-01-22 10:00:28', 30, 'Cash', 10, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `approvnour`
--

CREATE TABLE IF NOT EXISTS `approvnour` (
  `idApprovNour` int(11) NOT NULL AUTO_INCREMENT,
  `qnteApprov` int(11) NOT NULL,
  `puApprov` double NOT NULL,
  `ptApprov` double NOT NULL,
  `dateApprov` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idNour` int(11) NOT NULL,
  `idFour` int(11) NOT NULL,
  `modeAchat` varchar(20) NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  PRIMARY KEY (`idApprovNour`),
  KEY `idNour` (`idNour`),
  KEY `idFour` (`idFour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `approvnour`
--

INSERT INTO `approvnour` (`idApprovNour`, `qnteApprov`, `puApprov`, `ptApprov`, `dateApprov`, `idNour`, `idFour`, `modeAchat`, `accompte`, `reste`) VALUES
(1, 4, 17.3, 69.2, '2020-01-13 06:59:51', 103, 6, 'CrÃ©dit', 69.2, 0),
(2, 1, 11.4, 11.4, '2020-01-13 07:01:19', 97, 6, 'CrÃ©dit', 11.4, 0),
(3, 1, 10, 10, '2020-01-13 07:02:43', 104, 6, 'Cash', 10, 0),
(4, 3, 2.4, 8.16, '2020-01-13 07:04:43', 54, 3, 'CrÃ©dit', 7.2, 0.96),
(5, 10, 0.08, 0.8, '2020-01-13 07:06:19', 92, 3, 'CrÃ©dit', 0.8, 0),
(6, 3, 3.3, 8.91, '2020-01-13 07:08:59', 32, 3, 'CrÃ©dit', 9.1, -0.19),
(7, 2, 0.5, 0.9, '2020-01-13 07:11:50', 39, 3, 'CrÃ©dit', 1, -0.1),
(9, 2, 4.1, 8.2, '2020-01-13 07:15:03', 49, 3, 'CrÃ©dit', 8.2, 0),
(11, 8, 0.4, 3.2, '2020-01-13 07:35:00', 52, 3, 'CrÃ©dit', 3.7, -0.5),
(12, 1, 3.8, 3.8, '2020-01-13 07:41:28', 20, 7, 'CrÃ©dit', 3.8, 0),
(13, 10, 1, 10, '2020-01-17 13:05:14', 47, 4, 'Cash', 10, 0),
(14, 1, 5.2, 5.2, '2020-01-17 13:07:23', 10, 1, 'CrÃ©dit', 5.2, 0),
(15, 2, 3, 6, '2020-01-17 13:08:21', 70, 7, 'Cash', 6, 0),
(16, 5, 0.8, 4, '2020-01-17 13:10:07', 66, 7, 'CrÃ©dit', 4.4, -0.4),
(17, 1, 3.8, 3.8, '2020-01-17 13:15:27', 20, 7, 'CrÃ©dit', 3.8, 0),
(18, 1, 3.8, 3.8, '2020-01-17 13:15:31', 20, 7, 'CrÃ©dit', 3.8, 0),
(19, 2, 4.1, 8.2, '2020-01-17 13:45:49', 49, 3, 'CrÃ©dit', 8.2, 0),
(20, 8, 0.4, 3.2, '2020-01-17 13:54:32', 52, 3, 'CrÃ©dit', 3.2, 0),
(21, 1, 4.1, 4.1, '2020-01-17 13:58:35', 49, 3, 'CrÃ©dit', 4.1, 0),
(22, 10, 10.7, 107, '2020-01-18 10:18:20', 2, 6, 'CrÃ©dit', 107, 0),
(23, 4, 8.11, 32.44, '2020-01-18 10:20:44', 106, 6, 'CrÃ©dit', 32.47, -0.030000000000001),
(24, 5, 7, 35, '2020-01-18 10:22:38', 107, 6, 'Cash', 35, 0),
(25, 1, 5, 5, '2020-01-18 10:24:45', 101, 7, 'Cash', 5, 0),
(26, 2, 7.5, 11.25, '2020-01-22 09:45:56', 8, 1, 'CrÃ©dit', 7.5, 3.75),
(27, 4, 5.89, 23.56, '2020-01-22 09:46:46', 96, 1, 'CrÃ©dit', 23.56, 0),
(28, 20, 27, 540, '2020-01-22 09:47:20', 55, 7, 'CrÃ©dit', 27, 513),
(29, 3, 5.5, 16.5, '2020-01-22 09:48:19', 59, 1, 'CrÃ©dit', 16.5, 0),
(30, 4, 2.87, 11.48, '2020-01-22 09:49:50', 54, 3, 'CrÃ©dit', 11.5, -0.02),
(31, 10, 0.17, 1.7, '2020-01-22 09:50:34', 92, 3, 'CrÃ©dit', 1.7, 2.2204460492503e-16),
(32, 2, 3.82, 7.64, '2020-01-22 09:52:19', 20, 7, 'CrÃ©dit', 7.64, 0),
(33, 7, 0.41, 2.87, '2020-01-22 09:55:00', 52, 3, 'CrÃ©dit', 2.87, -4.4408920985006e-16),
(34, 10, 1.6, 16, '2020-01-22 09:55:42', 112, 3, 'CrÃ©dit', 16, 0),
(35, 8, 0.58, 4.64, '2020-01-22 09:56:16', 114, 3, 'CrÃ©dit', 4.64, 0),
(36, 2, 6, 12, '2020-01-22 09:56:54', 101, 7, 'Cash', 12, 0),
(37, 10, 1.05, 10.5, '2020-01-22 10:06:48', 47, 4, 'Cash', 10.5, 0),
(38, 42, 0.17, 7.14, '2020-01-22 10:07:43', 117, 3, 'CrÃ©dit', 7.14, 8.8817841970013e-16);

-- --------------------------------------------------------

--
-- Structure de la table `avarieboiss`
--

CREATE TABLE IF NOT EXISTS `avarieboiss` (
  `idBoissAv` int(11) NOT NULL AUTO_INCREMENT,
  `qteBoissAv` double NOT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `dateBoissAv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postePvBoiss` varchar(255) DEFAULT NULL,
  `idBoiss` int(11) NOT NULL,
  PRIMARY KEY (`idBoissAv`),
  KEY `idBoiss` (`idBoiss`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `avarieboiss`
--

INSERT INTO `avarieboiss` (`idBoissAv`, `qteBoissAv`, `motif`, `dateBoissAv`, `postePvBoiss`, `idBoiss`) VALUES
(1, 1, 'Moisie', '2020-01-14 21:05:25', 'Restaurant Bar', 23),
(2, 1, 'casse', '2020-01-17 17:58:21', 'Restaurant Bar', 24),
(3, 1, 'moisie', '2020-01-18 19:48:48', 'Restaurant Bar', 24);

-- --------------------------------------------------------

--
-- Structure de la table `avariedivers`
--

CREATE TABLE IF NOT EXISTS `avariedivers` (
  `idDivAvar` int(11) NOT NULL AUTO_INCREMENT,
  `qteDivAvar` int(11) NOT NULL,
  `motifDivAvar` varchar(50) NOT NULL,
  `posteDivAvar` varchar(50) NOT NULL,
  `dateDivAvar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idDiv` int(11) NOT NULL,
  PRIMARY KEY (`idDivAvar`),
  KEY `idDiv` (`idDiv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `avarienour`
--

CREATE TABLE IF NOT EXISTS `avarienour` (
  `idNourAv` int(11) NOT NULL AUTO_INCREMENT,
  `qteNourAv` double NOT NULL,
  `motifPvNour` varchar(255) DEFAULT NULL,
  `dateNourAv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `postePvNour` varchar(255) DEFAULT NULL,
  `idNour` int(11) NOT NULL,
  PRIMARY KEY (`idNourAv`),
  KEY `idNour` (`idNour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `avarienour`
--

INSERT INTO `avarienour` (`idNourAv`, `qteNourAv`, `motifPvNour`, `dateNourAv`, `postePvNour`, `idNour`) VALUES
(1, 7, 'avariÃ©', '2020-01-20 06:09:42', 'econome', 36),
(2, 4, 'avariÃ©', '2020-01-20 06:09:10', 'econome', 39);

-- --------------------------------------------------------

--
-- Structure de la table `avarieplat`
--

CREATE TABLE IF NOT EXISTS `avarieplat` (
  `idPlatAv` int(11) NOT NULL AUTO_INCREMENT,
  `qtePlatAv` double NOT NULL,
  `motifPvPlat` varchar(255) DEFAULT NULL,
  `datePlatAv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `postePvPlat` varchar(255) DEFAULT NULL,
  `idPlat` int(11) NOT NULL,
  PRIMARY KEY (`idPlatAv`),
  KEY `idPlat` (`idPlat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

CREATE TABLE IF NOT EXISTS `banque` (
  `idBanque` int(11) NOT NULL AUTO_INCREMENT,
  `montantBanque` double NOT NULL,
  `seuil` double NOT NULL,
  PRIMARY KEY (`idBanque`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `banque`
--

INSERT INTO `banque` (`idBanque`, `montantBanque`, `seuil`) VALUES
(1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `barman`
--

CREATE TABLE IF NOT EXISTS `barman` (
  `id_brm` int(11) NOT NULL AUTO_INCREMENT,
  `brm_name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `brm_sex` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `brm_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `brm_phone` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `brm_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `brm_address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `mdp_brm` varchar(10) DEFAULT NULL,
  `idPv` int(11) NOT NULL,
  PRIMARY KEY (`id_brm`),
  KEY `idPv` (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `barman`
--

INSERT INTO `barman` (`id_brm`, `brm_name`, `brm_sex`, `brm_add_date`, `brm_phone`, `brm_email`, `brm_address`, `mdp_brm`, `idPv`) VALUES
(1, 'aristote', 'M', '2020-01-17 11:50:06', '+243859345678', 'aristote@gmail.com', 'Uvira', 'brm1234', 1),
(2, 'Cibalonza', 'F', '2020-01-18 13:40:38', '+243855760003', 'cibalonza@gmail.com', 'Kavimvira, Uvira', 'ive1998', 1),
(3, 'Kashta', 'M', '2020-01-19 22:07:18', '+2439777777', 'kashta@gmail.com', '215', '123456', 2);

-- --------------------------------------------------------

--
-- Structure de la table `blanchisserie`
--

CREATE TABLE IF NOT EXISTS `blanchisserie` (
  `idBl` int(11) NOT NULL AUTO_INCREMENT,
  `idVetement` int(11) NOT NULL,
  `nbreBl` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `dateBl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modePaie` varchar(20) NOT NULL,
  `etatBl` varchar(20) NOT NULL,
  `ptBl` double NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  PRIMARY KEY (`idBl`),
  KEY `idVetement` (`idVetement`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `date_booking` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(11) DEFAULT NULL,
  `num_chambre` int(11) DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `nombre_jour` int(11) DEFAULT NULL,
  `total_apayer` double DEFAULT NULL,
  `accompte` double DEFAULT NULL,
  `reste_apayer` double DEFAULT NULL,
  `statut_booking` varchar(100) DEFAULT NULL,
  `nbre_enf` varchar(11) NOT NULL,
  `nbre_adult` varchar(11) NOT NULL,
  `reduction` double NOT NULL,
  `modePaie` varchar(10) NOT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `id_client` (`id_client`),
  KEY `num_chambre` (`num_chambre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `booking`
--

INSERT INTO `booking` (`id_booking`, `date_booking`, `id_client`, `num_chambre`, `date_in`, `date_out`, `nombre_jour`, `total_apayer`, `accompte`, `reste_apayer`, `statut_booking`, `nbre_enf`, `nbre_adult`, `reduction`, `modePaie`) VALUES
(16, '2020-01-20 10:09:45', 33, 6, '2020-01-20', '2020-01-25', 5, 350, 0, 350, 'CheckIn', '0', '1', 10, 'CrÃ©dit'),
(23, '2020-01-22 09:46:54', 28, 21, '2020-01-22', '2020-01-24', 2, 100, 0, 100, 'CheckIn', '0', '1', 50, 'CrÃ©dit'),
(26, '2020-01-23 14:55:56', 43, 17, '2020-01-23', '2020-01-27', 4, 240, 0, 240, 'CheckIn', '0', '1', 40, 'CrÃ©dit'),
(27, '2020-01-23 14:57:04', 44, 18, '2020-01-23', '2020-01-27', 4, 240, 0, 240, 'CheckIn', '0', '1', 40, 'CrÃ©dit');

-- --------------------------------------------------------

--
-- Structure de la table `booking_historique`
--

CREATE TABLE IF NOT EXISTS `booking_historique` (
  `id_booking` int(11) NOT NULL,
  `date_booking` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_client` int(11) DEFAULT NULL,
  `num_chambre` int(11) DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `nombre_jour` int(11) DEFAULT NULL,
  `total_apayer` double DEFAULT NULL,
  `accompte` double DEFAULT NULL,
  `reste_apayer` double DEFAULT NULL,
  `statut_booking` varchar(100) DEFAULT NULL,
  `nbre_enf` varchar(11) NOT NULL,
  `nbre_adult` varchar(11) NOT NULL,
  `reduction` double NOT NULL,
  `modePaie` varchar(10) NOT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `id_client` (`id_client`),
  KEY `num_chambre` (`num_chambre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `booking_historique`
--

INSERT INTO `booking_historique` (`id_booking`, `date_booking`, `id_client`, `num_chambre`, `date_in`, `date_out`, `nombre_jour`, `total_apayer`, `accompte`, `reste_apayer`, `statut_booking`, `nbre_enf`, `nbre_adult`, `reduction`, `modePaie`) VALUES
(0, '2020-01-13 16:08:50', 21, 19, '2020-01-13', '2020-01-15', 2, 120, 0, 120, 'CheckIn', '0', '1', 40, 'CrÃ©dit'),
(1, '2020-01-02 15:02:49', 1, 21, '2020-01-02', '2020-01-03', 1, 60, 0, 60, 'CheckOut', '0', '1', 40, 'CrÃ©dit'),
(2, '2020-01-04 14:55:39', 2, 19, '2020-01-04', '2020-01-06', 2, 140, 0, 140, 'CheckOut', '0', '2', 30, 'CrÃ©dit'),
(3, '2020-01-05 08:39:39', 9, 18, '2020-01-05', '2020-01-06', 1, 60, 0, 60, 'CheckOut', '0', '1', 40, 'CrÃ©dit'),
(4, '2020-01-05 12:01:07', 10, 4, '2020-01-05', '2020-01-07', 2, 110, 0, 110, 'CheckOut', '0', '1', 45, 'CrÃ©dit'),
(5, '2020-01-09 11:20:21', 12, 3, '2020-01-09', '2020-01-10', 1, 60, 0, 60, 'CheckOut', '0', '1', 40, 'CrÃ©dit'),
(6, '2020-01-09 12:38:44', 14, 6, '2020-01-09', '2020-01-10', 1, 65, 65, 0, 'CheckOut', '0', '1', 15, 'Cash'),
(7, '2020-01-09 14:32:09', 15, 4, '2020-01-09', '2020-01-10', 1, 70, 0, 70, 'CheckOut', '0', '1', 30, 'CrÃ©dit'),
(8, '2020-01-09 16:28:28', 16, 18, '2020-01-09', '2020-01-10', 1, 80, 0, 80, 'CheckOut', '0', '1', 20, 'CrÃ©dit'),
(9, '2020-01-09 16:37:30', 17, 14, '2020-01-09', '2020-01-10', 1, 65, 0, 65, 'CheckOut', '0', '1', 15, 'CrÃ©dit'),
(10, '2020-01-10 15:59:18', 18, 19, '2020-01-10', '2020-01-14', 3, 195, 0, 195, 'CheckOut', '0', '1', 35, 'CrÃ©dit'),
(11, '2020-01-12 14:59:05', 19, 6, '2020-01-12', '2020-01-13', 1, 70, 0, 70, 'CheckOut', '0', '2', 10, 'CrÃ©dit'),
(13, '2020-01-16 14:43:42', 28, 21, '2020-01-16', '2020-01-22', 6, 300, 0, 300, 'CheckOut', '0', '1', 50, 'CrÃ©dit'),
(14, '2020-01-16 14:44:52', 29, 19, '2020-01-16', '2020-01-22', 6, 300, 0, 300, 'CheckOut', '0', '1', 50, 'CrÃ©dit'),
(16, '2020-01-20 10:09:45', 33, 6, '2020-01-20', '2020-01-25', 5, 350, 0, 350, 'Encours', '0', '1', 10, 'CrÃ©dit'),
(17, '2020-01-20 14:34:53', 34, 13, '2020-01-20', '2020-01-22', 2, 160, 0, 160, 'CheckOut', '0', '1', 20, 'CrÃ©dit'),
(18, '2020-01-20 14:35:58', 35, 3, '2020-01-20', '2020-01-24', 4, 320, 0, 320, 'CheckOut', '0', '1', 20, 'CrÃ©dit'),
(19, '2020-01-20 14:36:58', 36, 4, '2020-01-20', '2020-01-24', 4, 320, 0, 320, 'CheckOut', '0', '1', 20, 'CrÃ©dit'),
(20, '2020-01-21 10:27:05', 38, 18, '2020-01-21', '2020-01-23', 2, 120, 0, 120, 'CheckOut', '0', '1', 40, 'CrÃ©dit'),
(21, '2020-01-21 10:37:40', 37, 5, '2020-01-21', '2020-01-23', 2, 120, 0, 120, 'CheckOut', '0', '1', 40, 'CrÃ©dit'),
(22, '2020-01-21 10:51:28', 39, 17, '2020-01-21', '2020-01-23', 2, 120, 0, 120, 'CheckOut', '0', '1', 40, 'CrÃ©dit'),
(23, '2020-01-22 09:46:54', 28, 21, '2020-01-22', '2020-01-24', 2, 100, 0, 100, 'Encours', '0', '1', 50, 'CrÃ©dit'),
(24, '2020-01-22 09:52:49', 40, 20, '2020-01-22', '2020-01-23', 1, 60, 0, 60, 'CheckOut', '0', '1', 40, 'CrÃ©dit'),
(25, '2020-01-22 16:46:47', 34, 15, '2020-01-22', '2020-01-23', 1, 80, 0, 80, 'CheckOut', '0', '1', 0, 'CrÃ©dit'),
(26, '2020-01-23 14:55:56', 43, 17, '2020-01-23', '2020-01-27', 4, 240, 0, 240, 'Encours', '0', '1', 40, 'CrÃ©dit'),
(27, '2020-01-23 14:57:04', 44, 18, '2020-01-23', '2020-01-27', 4, 240, 0, 240, 'Encours', '0', '1', 40, 'CrÃ©dit');

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE IF NOT EXISTS `caisse` (
  `idCaisse` int(11) NOT NULL AUTO_INCREMENT,
  `montantCaisse` double NOT NULL,
  `seuil` double NOT NULL,
  PRIMARY KEY (`idCaisse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `caisse`
--

INSERT INTO `caisse` (`idCaisse`, `montantCaisse`, `seuil`) VALUES
(1, 877.6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `catboiss`
--

CREATE TABLE IF NOT EXISTS `catboiss` (
  `idCatBoiss` smallint(2) NOT NULL AUTO_INCREMENT,
  `designCatBoiss` varchar(50) NOT NULL,
  PRIMARY KEY (`idCatBoiss`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `catboiss`
--

INSERT INTO `catboiss` (`idCatBoiss`, `designCatBoiss`) VALUES
(1, 'BIERRES'),
(2, 'SUCRES'),
(3, 'BOISSONS ENERGISSANTES'),
(4, 'EAUX'),
(5, 'JUS FRAIS'),
(6, 'JUS PRESSE'),
(7, 'VINS ROSES'),
(8, 'VINS BLANCS'),
(9, 'VINS ROUGES'),
(10, 'VINS MOUSSEUX'),
(11, 'CHAMPAGNE AVEC ALCOOL'),
(12, 'LIQUEURS'),
(13, 'APPERITIFS'),
(14, 'BOISSONS CHAUDES');

-- --------------------------------------------------------

--
-- Structure de la table `catchambre`
--

CREATE TABLE IF NOT EXISTS `catchambre` (
  `idCatCh` smallint(2) NOT NULL AUTO_INCREMENT,
  `designCatCh` varchar(50) NOT NULL,
  PRIMARY KEY (`idCatCh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `catchambre`
--

INSERT INTO `catchambre` (`idCatCh`, `designCatCh`) VALUES
(1, 'Chambre Standard de Luxe'),
(2, 'Chambre Twin'),
(3, 'Suite semi presidentielle'),
(4, 'Suite Presidentielle');

-- --------------------------------------------------------

--
-- Structure de la table `categorieequip`
--

CREATE TABLE IF NOT EXISTS `categorieequip` (
  `idCatEq` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) NOT NULL,
  PRIMARY KEY (`idCatEq`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `categorieequip`
--

INSERT INTO `categorieequip` (`idCatEq`, `designation`) VALUES
(1, 'MatÃ©riel Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `catnour`
--

CREATE TABLE IF NOT EXISTS `catnour` (
  `idCatNour` smallint(2) NOT NULL AUTO_INCREMENT,
  `designCatNour` varchar(50) NOT NULL,
  PRIMARY KEY (`idCatNour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `catnour`
--

INSERT INTO `catnour` (`idCatNour`, `designCatNour`) VALUES
(1, 'VIANDE'),
(2, 'POISSONS'),
(3, 'LEGUMES'),
(4, 'EPICES'),
(5, 'FRUITS'),
(6, 'ACCOMPAGNEMENT'),
(7, 'HUILES'),
(8, 'VOLAILLES');

-- --------------------------------------------------------

--
-- Structure de la table `catplat`
--

CREATE TABLE IF NOT EXISTS `catplat` (
  `idCatPlat` int(11) NOT NULL AUTO_INCREMENT,
  `designCatPlat` varchar(50) NOT NULL,
  PRIMARY KEY (`idCatPlat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `catplat`
--

INSERT INTO `catplat` (`idCatPlat`, `designCatPlat`) VALUES
(1, 'PETIT DEJEUNER'),
(2, 'ŒUFS'),
(3, 'OMELETTES'),
(4, 'ENTREES FROIDES'),
(5, 'ENTREES CHAUDES'),
(6, 'VIANDES'),
(7, 'VOLAILLES'),
(8, 'POISSONS'),
(9, 'ACCOMPAGNEMENTS'),
(10, 'LEGUMES CUITES'),
(11, 'SAUCES'),
(12, 'PATES'),
(13, 'DESSERTS'),
(14, 'RECETTES MAISON'),
(15, 'SALADES'),
(16, 'SANDWICHERIES'),
(17, 'AMUSE-BOUCHE'),
(18, 'PIZZARIA'),
(19, 'BUFFET');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(200) DEFAULT NULL,
  `sexe_client` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `etatCivil` varchar(20) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `telClient` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `provenance` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `destination` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `piece` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `numPiece` varchar(100) DEFAULT NULL,
  `lieuDel` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dateDel` date DEFAULT NULL,
  `residence` varchar(200) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idOrg` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  KEY `idOrg` (`idOrg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `sexe_client`, `etatCivil`, `profession`, `pays`, `telClient`, `email`, `provenance`, `destination`, `piece`, `numPiece`, `lieuDel`, `dateDel`, `residence`, `photo`, `idOrg`) VALUES
(1, 'NSABIMANA MANASSE', 'M', 'MariÃ©', 'PETROLIER', 'Rwanda', '09999999999', 'nsabimana@gmail.com', 'BURUNDI', 'UVIRA', 'Passport', 'PC229527', 'KIGALI', '2015-06-01', 'KIGALI', 'NSABIMANA MANASSE.jpg', 1),
(2, 'KIZITO KABAMBA DIEUDONNE', 'M', 'MariÃ©', 'Liberale', 'Congo_democratique', '', '', 'Bukavu', 'Uvira', 'Permis de conduire', '00035359', 'Kinshasa', '2020-12-15', 'KINSHASA', 'KIZITO KABAMBA DIEUDONNE.jpg', 1),
(3, 'CLIENT DE PASSAGE', 'M', 'CÃ©libataire', 'Ambulant', 'Congo_democratique', '', '', 'Ambulant', 'Ambulant', 'Carte d''Ã©lecteur', '000000', 'Ambulan', '2020-01-04', 'Ambulant', '001.jpg', 1),
(4, 'THOMAS BBH', 'M', 'CÃ©libataire', 'Agent Laundry', 'Congo_democratique', '0', 'thomas@gmail.com', 'Bbh', 'Bbh', 'Carte d''Ã©lecteur', '1223', 'Bbh', '2018-01-04', 'Congo_democratique', 'thomas.bmp', 6),
(5, 'Directeur G.', 'M', 'CÃ©libataire', 'DG', 'Congo_democratique', '0', 'moussa@gmail.com', 'BBH', 'BBH', 'Autre', '12345', 'BBH', '2018-01-05', 'BBH', 'DG.bmp', 6),
(6, 'LAMBERT CHAUF', 'M', 'MariÃ©', 'Chauffeur', 'Congo_democratique', '', '', 'BBH', 'BBH', 'Autre', '12345', 'BBH', '2019-01-05', 'BBH', 'Lambert.bmp', 6),
(7, 'KEVIN CUISINIER', 'M', 'MariÃ©', 'CUISINIER', 'Congo_democratique', '+243845888346', 'omarikevin@yahoo.fr', 'BBH', 'BBH', 'Autre', '12345', 'BBH', '2018-01-05', 'BBH', 'KEVIN.bmp', 6),
(8, 'OFFRE CHAMBRE', 'F', 'CÃ©libataire', 'OFFRE', 'France', '0855760003', 'G@gmail.com', 'BBH', 'BBH', 'Carte d''Ã©lecteur', '02525', 'BUKAVU', '2020-01-03', 'OFFRE', 'Carte.bmp', 6),
(9, 'ADJOR KOKOU', 'M', 'MariÃ©', 'EXPAT ONU', 'Etats_Unis', '', '', 'BARAKA', 'UVIRA', 'Passport', '272406', 'ETATS UNIS', '2018-02-01', 'USA', 'ADJOR KOKOU.jpg', 3),
(10, 'FALL SAMBA', NULL, 'MariÃ©', 'EXPAT ONU', 'Etats_Unis', '1', '', 'BARAKA', 'UVIRA', 'Passport', '272693', 'ETAS UNIS', '2018-02-20', 'SENEGAL', 'FALL SAMBA.jpg', 3),
(11, 'ALPHA LUMANDE', 'M', 'CÃ©libataire', 'IT', 'Congo_democratique', '+243971112080', 'alpha@gmail.com', 'UVIRA', 'BBH', 'Carte d''Ã©lecteur', '22429747113', 'UVIRA', '2017-07-12', 'UVIRA', 'FOFO_0002.jpg', 1),
(12, 'LIRON REBECCA', 'F', 'CÃ©libataire', 'HUMANITAIRE', 'Etats_Unis', '', '', 'BURUNDI', 'UVIRA', 'Passport', '494020216', 'FRANCE', '2012-05-22', 'ETATS UNIS', 'LIRON REBECCA.jpg', 3),
(13, 'LIRON REBECCA', 'F', 'CÃ©libataire', 'HUMANITAIRE', 'Etats_Unis', '', '', 'BURUNDI', 'UVIRA', 'Passport', '494020216', 'FRANCE', '2012-05-22', 'ETATS UNIS', 'LIRON REBECCA.jpg', 3),
(14, 'MOREIRA TALINI', 'F', 'MariÃ©', 'HUMANITAIRE', 'Etats_Unis', '', '', 'BUKAVU', 'UVIRA', 'Passport', '72635', 'ETATS UNIS', '2019-10-18', 'ETATS UNIS', 'MOREIRA TALINI.jpg', 5),
(15, 'MIKENYE MANEGABE', 'M', 'MariÃ©', 'HUMANITAIRE', 'Congo_democratique', '', '', 'BUKAVU', 'UVIRA', 'Passport', '0437567', 'RDC', '2019-09-20', 'BUKAVU', 'MIKENYE MANEGABE WILLY.jpg', 5),
(16, 'SORO KARNA', 'M', 'MariÃ©', 'HUMANITAIRE', 'Etats_Unis', '', '', 'BUKAVU', 'UVIRA', 'Passport', '246713', 'ETATS UNIS', '2015-10-25', 'ETATS UNIS', 'SORO KARNA.jpg', 5),
(17, 'MADILA TSHIBOLA', 'F', 'CÃ©libataire', 'HUMANITAIRE', 'Congo_democratique', '', '', 'BUKAVU', 'UVIRA', 'Passport', '0059539', 'KINSHASA', '2016-07-17', 'RDC', 'MADILA TSHIBOLA.jpg', 5),
(18, 'MAHESHE MAHI MUGALA', 'M', 'MariÃ©', 'AGENT BRALIMA', 'Congo_democratique', '0', '', 'BUKAVU', 'UVIRA', 'Passport', 'OP0403607', 'KINSHASA', '2018-01-10', 'BUKAVU', 'MAHESHE MAHI MUGALA.jpg', 2),
(19, 'KAKUMBWA FIDO', 'M', 'MariÃ©', 'LIBERALE', 'Congo_democratique', '', '', 'BUKAVU', 'UVIRA', 'Passport', 'OP0225112', 'KINSHASA', '2017-08-23', 'KINSHASA', 'KAKUMBWA MWENELWATA FIDO.jpg', 1),
(20, 'OMAR NASIBU', 'M', 'MariÃ©', 'INFORMATICIEN', 'Congo_democratique', '+243977777994', 'omarnasibu@gmail.com', 'LUBUMBASHI', 'UVIRA', 'Carte d''Ã©lecteur', '225468754', 'BUKAVU', '2017-01-04', 'LUBUMBASHI', 'Omar nas.bmp', 1),
(21, 'IBRAHIMA', 'M', 'MariÃ©', 'HUMANITAIRE', 'Etats_Unis', '', '', 'BUKAVU', 'BARAKA', 'Passport', '273596', 'ETATS UNIS', '2018-04-03', 'ETATS UNIS', 'IBRAHIMA ABDOU.jpg', 3),
(22, 'HCR', 'M', 'DivorcÃ©', 'REFUGE', 'Congo_democratique', '', '', 'UVIRA', 'UVIRA', '', '222', 'UVIRA', '0000-00-00', 'UVIRA', 'hcr.bmp', 3),
(23, 'VICKY LUNDULA', 'M', 'CÃ©libataire', 'CHAUMEUR', 'Republique_Dominicaine', '', '', 'BUKAVU', 'UVIRA', 'Carte d''Ã©lecteur', '22558732171', 'BUKAVU', '2018-12-21', 'BUKAVU', 'VICKY CHANDJO.jpg', 6),
(24, 'SHABANI SOLI', 'M', 'MariÃ©', 'CHAUMEUR', 'Republique_Dominicaine', '', '', 'BUKAVU', 'UVIRA', 'Carte d''Ã©lecteur', '22409736704', 'KIGOMA', '2017-03-15', 'UVIRA', 'SHABANI SOLI.jpg', 6),
(25, 'CHIBALONZA KAFOMERA', 'F', 'CÃ©libataire', 'CHAUMEUR', 'Qatar', '', '', 'UVIRA', 'UVIRA', 'Carte d''Ã©lecteur', '22406533781', 'KATALA', '2017-03-04', 'UVIRA', 'CHIBALONZA KAFOMERA.jpg', 6),
(26, 'BAHATI FABIANA', 'F', 'MariÃ©', 'CHAMEUR', 'Danemark', '', '', 'BUKAVU', 'UVIRA', 'Carte d''Ã©lecteur', '22406526119', 'KATALA', '2017-01-29', 'UVIRA', 'BAHATI FABIANA.jpg', 6),
(27, 'ALPHA MAJALIWA', 'M', 'CÃ©libataire', 'CHAUMEUR', 'Republique_Dominicaine', '', '', 'BUKAVU', 'UVIRA', 'Carte d''Ã©lecteur', '22575971815', 'KADUTU', '2017-03-03', 'BUKAVU', 'ALPHA MAJALIWA.jpg', 6),
(28, 'TERDIEU FRANCK', 'M', 'CÃ©libataire', 'HUMANITAIRE', 'France', '', '', 'FRANCE', 'UVIRA', 'Passport', '19A31330', 'PARIS', '2019-02-04', 'PARIS', 'TERDIEU FRANCK.jpg', 7),
(29, 'DUPRAY EMMANUEL', 'M', 'MariÃ©', 'HUMANITAIRE', 'France', '', '', 'PARIS', 'UVIRA', 'Passport', '18HA304430', 'PARIS', '2018-11-22', 'PARIS', 'DUPRAY EMMANUEL.jpg', 7),
(30, 'FAUSTIN KITOKO', 'M', 'MariÃ©', 'HUMANITAIRE', 'Congo_democratique', '', '', 'BUJUMBURA', 'UVIRA', 'Permis de conduire', 'AA0009513KIN', 'KINSHASA', '2017-01-20', 'UVIRA', 'KITOKO FAUSTIN.jpg', 3),
(31, 'FAUSTIN KITOKO', 'M', 'MariÃ©', 'HUMANITAIRE', 'Congo_democratique', '', '', 'BUJUMBURA', 'UVIRA', 'Permis de conduire', 'AA0009513KIN', 'KINSHASA', '2017-01-20', 'UVIRA', 'KITOKO FAUSTIN.jpg', 3),
(32, 'GENTIL MASHAGIRO', 'M', 'MariÃ©', 'HOTELLIER', 'Congo_democratique', '', '', 'GOMA', 'UVIRA', 'Carte d''Ã©lecteur', '24177437596', 'UVIRA', '2017-02-08', 'GOMA', 'CE Gentil.jpg', 1),
(33, 'RWIZA JASON', 'M', 'MariÃ©', 'INGENIEUR', 'Tanzanie', '0', '', 'TANZANIA', 'UVIRA', 'Passport', 'TAE135073', 'TANZANIE', '2019-07-04', 'TANZANIE', 'RWIZA JASON 20191215_11214909.jpg', 8),
(34, 'HUNT LESTER MITCHELL', 'M', 'MariÃ©', 'HUMANITAIRE', 'Etats_Unis', '', '', 'BUJUMBURA', 'UVIRA', 'Passport', '565786476', 'USA', '2018-04-25', 'USA', 'HUNT LESTER MITCHELL.jpg', 9),
(35, 'DURIEU DU PRADEL ARNAUD', 'M', 'MariÃ©', 'HUMANITAIRE', 'France', '', '', 'GOMA', 'UVIRA', 'Passport', 'C111514', 'FRANCE', '2019-10-03', 'FRANCE', 'DURIEU DU PRADEL ARNAUD.jpg', 5),
(36, 'GIEZENDANNER HARDY ROMAN', 'M', 'CÃ©libataire', 'HUMANITAIRE', 'Suisse', '', '', 'GOMA', 'UVIRA', 'Passport', 'X8773365', 'SUISSE', '2019-01-07', 'SUISSE', 'HARDY ROMAN.jpg', 5),
(37, 'HAGENIMANA PATRICE', 'M', 'CÃ©libataire', 'HUMANITAIRE', 'Rwanda', '', '', 'BUKAVU', 'UVIRA', 'Passport', '557984', 'RWANDA', '2020-01-14', 'BUKAVU', 'HAGENIMANA PATRICE.jpg', 11),
(38, 'MUSABYEMUNGU PASCASIE', 'F', 'MariÃ©', 'HUMANITAIRE', 'Rwanda', '', '', 'BUKAVU', 'UVIRA', 'Passport', '480532', 'RWANDA', '2019-02-14', 'UVIRA', 'MUSABYEMUNGU PASCASIE.jpg', 11),
(39, 'TALLA JEAN', 'M', 'MariÃ©', 'HUMANITAIRE', 'Cameroun', '', '', 'BUKAVU', 'UVIRA', 'Passport', '1042354', 'YAOUNDE', '2019-10-03', 'BUKAVU', 'TALLA JEAN.jpg', 11),
(40, 'JEROMINO ANA PATRICIA', 'F', 'CÃ©libataire', 'HUMANITAIRE', 'Portugal', '', '', 'BARAKA', 'UVIRA', 'Passport', 'SUNB78055', 'UN', '2019-08-05', 'PORTUGAL', 'JERONIMO ESTRADA ANA PATRICIA.jpg', 3),
(41, 'JEAN CLAUDE ILUNGA', 'M', 'MariÃ©', 'HOTELIER', 'Congo_democratique', '', '', 'UVIRA', 'UVIRA', 'Carte d''Ã©lecteur', '22428969156', 'UVIRA', '2017-02-23', 'UVIRA', 'JEAN CLAUDE ILUNGA_0001.jpg', 6),
(42, 'NGOY LEYA', 'M', 'MariÃ©', 'BUKAVU', 'Republique_Tcheque', '', '', 'BUKAVU', 'UVIRA', 'Passport', '0240005', 'KISHASA', '2017-09-26', 'BUKAVU', 'NGOY LEYA.jpg', 12),
(43, 'NGOY LEYA', 'M', 'MariÃ©', 'HUMANITAIRE', 'Congo_democratique', '', '', 'BUKAVU', 'UVIRA', 'Passport', '0240005', 'KISHASA', '2017-09-28', 'BUKAVU', 'NGOY LEYA.jpg', 12),
(44, 'TSHIBUNGU NTUMBA', 'F', 'MariÃ©', 'HUMANITAIRE', 'Congo_democratique', '', '', 'BUKAVU', 'UVIRA', 'Carte d''Ã©lecteur', '20015841850', 'KINTAMBO', '2017-07-26', 'BUKAVU', 'TSHIBUNGU NTUMBA.jpg', 12),
(45, 'PROSSANI USAID', 'M', 'MariÃ©', 'HUMANITAIRE', 'Congo_democratique', '', '', 'BUKAVU', 'UVIRA', 'Passport', '0558496', 'BUKAVU', '2019-11-12', 'BUKAVU', 'TSHIBUNGU NTUMBA.jpg', 12);

-- --------------------------------------------------------

--
-- Structure de la table `comcuisine`
--

CREATE TABLE IF NOT EXISTS `comcuisine` (
  `idComCuis` int(11) NOT NULL AUTO_INCREMENT,
  `qteComDiv` double NOT NULL,
  `dateComDiv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statutComDiv` varchar(20) NOT NULL,
  `idDivCuis` smallint(5) NOT NULL,
  PRIMARY KEY (`idComCuis`),
  KEY `idDivCuis` (`idDivCuis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `comcuisine`
--

INSERT INTO `comcuisine` (`idComCuis`, `qteComDiv`, `dateComDiv`, `statutComDiv`, `idDivCuis`) VALUES
(3, 1, '2020-01-14 12:08:26', 'ValidÃ©', 12),
(4, 3, '2020-01-14 12:08:32', 'ValidÃ©', 13),
(5, 0, '2020-01-14 12:09:57', 'ValidÃ©', 51),
(6, 2, '2020-01-17 13:00:40', 'ValidÃ©', 13),
(8, 1, '2020-01-18 14:52:52', 'ValidÃ©', 12),
(9, 1, '2020-01-18 14:53:42', 'ValidÃ©', 13),
(10, 1, '2020-01-18 13:50:24', 'Encours', 11),
(11, 1, '2020-01-18 13:50:24', 'Encours', 2),
(12, 1, '2020-01-18 13:50:24', 'Encours', 3),
(13, 1, '2020-01-18 14:34:33', 'Encours', 11),
(15, 3, '2020-01-18 14:34:33', 'Encours', 13),
(16, 2, '2020-01-18 14:52:42', 'ValidÃ©', 12),
(25, 1, '2020-01-18 14:34:33', 'Encours', 16),
(26, 5, '2020-01-18 14:54:31', 'ValidÃ©', 15),
(27, 5, '2020-01-18 14:34:33', 'Encours', 15),
(28, 3, '2020-01-20 20:13:33', 'Encours', 13),
(29, 1, '2020-01-20 20:13:33', 'Encours', 11),
(30, 2, '2020-01-20 20:13:33', 'Encours', 12),
(31, 5, '2020-01-20 20:13:33', 'Encours', 15),
(33, 1, '2020-01-22 21:17:53', 'Encours', 9),
(34, 1, '2020-01-22 21:17:53', 'Encours', 10),
(35, 2, '2020-01-22 21:17:53', 'Encours', 4),
(36, 4, '2020-01-22 21:17:53', 'Encours', 32),
(37, 2, '2020-01-22 21:17:53', 'Encours', 9),
(38, 1, '2020-01-24 07:36:58', 'commande', 11),
(39, 1, '2020-01-24 07:37:08', 'commande', 12),
(40, 3, '2020-01-24 07:37:26', 'commande', 15),
(41, 1, '2020-01-24 07:37:51', 'commande', 2),
(42, 1, '2020-01-24 07:38:38', 'commande', 2);

-- --------------------------------------------------------

--
-- Structure de la table `comdivers`
--

CREATE TABLE IF NOT EXISTS `comdivers` (
  `idComDiv` int(11) NOT NULL AUTO_INCREMENT,
  `qteComDiv` int(11) NOT NULL,
  `dateComDiv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statutComDiv` varchar(20) NOT NULL,
  `idDiv` int(11) NOT NULL,
  `poste` varchar(60) NOT NULL,
  PRIMARY KEY (`idComDiv`),
  KEY `idDiv` (`idDiv`),
  KEY `id_service` (`poste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `comdivers`
--

INSERT INTO `comdivers` (`idComDiv`, `qteComDiv`, `dateComDiv`, `statutComDiv`, `idDiv`, `poste`) VALUES
(12, 2, '2020-01-13 06:53:31', 'ValidÃ©', 4, 'Restaurant Bar'),
(13, 6, '2020-01-17 10:59:58', 'ValidÃ©', 14, 'House keeping'),
(14, 1, '2020-01-17 11:00:05', 'ValidÃ©', 4, 'House keeping'),
(15, 1, '2020-01-17 11:00:12', 'ValidÃ©', 17, 'House keeping'),
(18, 1, '2020-01-17 11:00:17', 'ValidÃ©', 17, 'House keeping'),
(19, 2, '2020-01-17 11:00:23', 'ValidÃ©', 14, 'House keeping'),
(20, 1, '2020-01-18 08:15:54', 'ValidÃ©', 10, 'House keeping'),
(21, 3, '2020-01-18 08:16:00', 'ValidÃ©', 17, 'House keeping'),
(22, 1, '2020-01-18 08:16:12', 'ValidÃ©', 14, 'House keeping'),
(23, 1, '2020-01-18 08:16:18', 'ValidÃ©', 21, 'House keeping'),
(24, 1, '2020-01-18 10:27:40', 'ValidÃ©', 13, 'House keeping'),
(25, 2, '2020-01-22 09:27:21', 'ValidÃ©', 4, 'Restaurant Bar'),
(26, 1, '2020-01-22 09:27:30', 'ValidÃ©', 4, 'house_keeping'),
(27, 2, '2020-01-22 09:27:42', 'ValidÃ©', 17, 'house_keeping'),
(28, 1, '2020-01-20 14:42:26', 'Encours', 13, 'house_keeping'),
(29, 1, '2020-01-22 09:28:10', 'ValidÃ©', 16, 'house_keeping'),
(30, 5, '2020-01-22 09:28:16', 'ValidÃ©', 14, 'house_keeping'),
(31, 5, '2020-01-22 15:00:01', 'Encours', 14, 'house_keeping'),
(32, 4, '2020-01-22 15:00:01', 'Encours', 17, 'house_keeping'),
(33, 1, '2020-01-22 15:00:01', 'Encours', 30, 'house_keeping'),
(34, 2, '2020-01-22 15:00:01', 'Encours', 21, 'house_keeping'),
(36, 2, '2020-01-23 12:18:48', 'Encours', 4, 'Restaurant Bar'),
(37, 1, '2020-01-23 13:03:02', 'Encours', 23, 'receptionniste'),
(38, 9, '2020-01-23 15:08:38', 'Encours', 14, 'house_keeping'),
(39, 3, '2020-01-23 15:08:38', 'Encours', 17, 'house_keeping'),
(40, 2, '2020-01-23 15:08:38', 'Encours', 4, 'house_keeping'),
(41, 1, '2020-01-23 15:08:38', 'Encours', 9, 'house_keeping');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCom` int(11) NOT NULL AUTO_INCREMENT,
  `qteCom` double NOT NULL,
  `dateCom` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statutCom` varchar(20) DEFAULT NULL,
  `idPv` int(11) NOT NULL,
  `idBoiss` int(11) NOT NULL,
  PRIMARY KEY (`idCom`),
  KEY `idBoiss` (`idBoiss`),
  KEY `idPv` (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCom`, `qteCom`, `dateCom`, `statutCom`, `idPv`, `idBoiss`) VALUES
(1, 1, '2020-01-04 21:56:39', 'ValidÃ©', 1, 9),
(2, 1, '2020-01-04 21:57:29', 'ValidÃ©', 1, 23),
(3, 1, '2020-01-04 21:57:34', 'ValidÃ©', 1, 98),
(4, 1, '2020-01-04 21:57:39', 'ValidÃ©', 1, 97),
(5, 1, '2020-01-04 21:57:42', 'ValidÃ©', 1, 33),
(6, 1, '2020-01-05 16:53:38', 'ValidÃ©', 1, 23),
(7, 1, '2020-01-05 16:53:46', 'ValidÃ©', 1, 33),
(9, 1, '2020-01-12 14:33:59', 'ValidÃ©', 1, 23),
(10, 1, '2020-01-12 14:10:29', 'ValidÃ©', 1, 33),
(11, 1, '2020-01-12 14:38:25', 'ValidÃ©', 1, 29),
(12, 1, '2020-01-12 14:28:02', 'ValidÃ©', 1, 28),
(15, 1, '2020-01-13 08:04:29', 'ValidÃ©', 1, 10),
(16, 1, '2020-01-13 08:04:47', 'ValidÃ©', 1, 100),
(17, 1, '2020-01-13 08:05:17', 'ValidÃ©', 1, 24),
(18, 1, '2020-01-13 08:05:01', 'ValidÃ©', 1, 28),
(19, 1, '2020-01-13 08:05:10', 'ValidÃ©', 1, 8),
(20, 1, '2020-01-13 08:45:44', 'ValidÃ©', 1, 8),
(24, 2, '2020-01-13 09:05:13', 'ValidÃ©', 1, 33),
(31, 4, '2020-01-14 21:28:06', 'ValidÃ©', 1, 33),
(33, 1, '2020-01-17 13:57:00', 'ValidÃ©', 1, 23),
(34, 1, '2020-01-17 12:59:36', 'ValidÃ©', 1, 33),
(35, 1, '2020-01-17 12:59:28', 'ValidÃ©', 1, 34),
(38, 1, '2020-01-17 12:59:16', 'ValidÃ©', 1, 58),
(40, 2, '2020-01-18 10:14:32', 'ValidÃ©', 1, 33),
(41, 1, '2020-01-23 14:54:15', 'ValidÃ©', 1, 24),
(42, 1, '2020-01-23 14:54:23', 'ValidÃ©', 1, 2),
(45, 2, '2020-01-20 19:59:24', 'ValidÃ©', 1, 33),
(46, 1, '2020-01-21 17:20:27', 'ValidÃ©', 1, 2),
(47, 2, '2020-01-21 17:19:55', 'ValidÃ©', 1, 33),
(48, 1, '2020-01-21 17:20:19', 'ValidÃ©', 1, 23),
(52, 1, '2020-01-22 10:01:28', 'ValidÃ©', 1, 33),
(53, 2, '2020-01-23 15:11:09', 'ValidÃ©', 1, 33),
(55, 1, '2020-01-23 14:54:41', 'ValidÃ©', 1, 33),
(68, 1, '2020-01-23 14:58:13', 'ValidÃ©', 1, 98),
(69, 1, '2020-01-24 06:25:08', 'Encours', 1, 33);

-- --------------------------------------------------------

--
-- Structure de la table `commandenour`
--

CREATE TABLE IF NOT EXISTS `commandenour` (
  `idComNour` int(11) NOT NULL AUTO_INCREMENT,
  `qteComNour` double NOT NULL,
  `dateComNour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statutComNour` varchar(20) DEFAULT NULL,
  `idPv` int(11) NOT NULL,
  `idNour` int(11) NOT NULL,
  PRIMARY KEY (`idComNour`),
  KEY `idNour` (`idNour`),
  KEY `idPv` (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=146 ;

--
-- Contenu de la table `commandenour`
--

INSERT INTO `commandenour` (`idComNour`, `qteComNour`, `dateComNour`, `statutComNour`, `idPv`, `idNour`) VALUES
(4, 5, '2020-01-11 19:46:15', 'ValidÃ©', 1, 89),
(5, 1, '2020-01-11 20:06:38', 'ValidÃ©', 1, 40),
(6, 3, '2020-01-11 20:07:02', 'ValidÃ©', 1, 47),
(7, 1, '2020-01-11 19:56:19', 'ValidÃ©', 1, 2),
(8, 1, '2020-01-11 20:07:09', 'ValidÃ©', 1, 32),
(9, 1, '2020-01-11 19:55:31', 'ValidÃ©', 1, 95),
(10, 1, '2020-01-11 19:55:06', 'ValidÃ©', 1, 18),
(11, 2, '2020-01-11 19:54:22', 'ValidÃ©', 1, 68),
(12, 1, '2020-01-11 19:54:12', 'ValidÃ©', 1, 67),
(13, 1, '2020-01-14 11:50:39', 'ValidÃ©', 1, 71),
(14, 0.25, '2020-01-14 11:50:43', 'ValidÃ©', 1, 66),
(15, 1, '2020-01-14 11:50:46', 'ValidÃ©', 1, 69),
(16, 2, '2020-01-14 11:50:50', 'ValidÃ©', 1, 103),
(17, 1, '2020-01-14 11:50:54', 'ValidÃ©', 1, 104),
(18, 3, '2020-01-14 11:50:57', 'ValidÃ©', 1, 95),
(20, 1, '2020-01-14 11:51:06', 'ValidÃ©', 1, 68),
(21, 1, '2020-01-14 11:51:13', 'ValidÃ©', 1, 67),
(22, 0.5, '2020-01-14 11:51:17', 'ValidÃ©', 1, 66),
(25, 1, '2020-01-14 11:51:27', 'ValidÃ©', 1, 32),
(28, 1, '2020-01-14 11:51:36', 'ValidÃ©', 1, 59),
(29, 2, '2020-01-14 12:08:06', 'ValidÃ©', 1, 52),
(30, 0.25, '2020-01-17 13:01:06', 'ValidÃ©', 1, 2),
(31, 1, '2020-01-18 10:18:46', 'ValidÃ©', 1, 2),
(32, 5, '2020-01-18 10:11:52', 'ValidÃ©', 1, 47),
(33, 2, '2020-01-17 13:01:41', 'ValidÃ©', 1, 30),
(34, 0.4, '2020-01-17 13:01:48', 'ValidÃ©', 1, 10),
(35, 2, '2020-01-17 13:01:56', 'ValidÃ©', 1, 68),
(36, 1, '2020-01-17 13:02:03', 'ValidÃ©', 1, 67),
(37, 1, '2020-01-17 13:02:09', 'ValidÃ©', 1, 41),
(39, 1, '2020-01-18 10:12:57', 'ValidÃ©', 1, 18),
(40, 1, '2020-01-18 10:23:03', 'ValidÃ©', 1, 107),
(41, 1, '2020-01-18 10:13:24', 'ValidÃ©', 1, 63),
(42, 1, '2020-01-18 10:13:31', 'ValidÃ©', 1, 70),
(43, 1, '2020-01-18 10:13:38', 'ValidÃ©', 1, 32),
(44, 1, '2020-01-18 10:13:45', 'ValidÃ©', 1, 30),
(45, 1, '2020-01-18 10:23:10', 'ValidÃ©', 1, 2),
(46, 1, '2020-01-18 10:13:54', 'ValidÃ©', 1, 98),
(47, 1, '2020-01-18 10:25:06', 'ValidÃ©', 1, 101),
(51, 1, '2020-01-20 06:05:10', 'ValidÃ©', 1, 39),
(52, 1, '2020-01-20 06:05:32', 'ValidÃ©', 1, 66),
(54, 1, '2020-01-22 09:32:59', 'ValidÃ©', 1, 21),
(58, 1, '2020-01-22 09:33:18', 'ValidÃ©', 1, 107),
(59, 1, '2020-01-22 08:52:47', 'ValidÃ©', 1, 2),
(60, 1, '2020-01-22 08:53:06', 'ValidÃ©', 1, 55),
(62, 1, '2020-01-22 08:53:23', 'ValidÃ©', 1, 65),
(65, 2, '2020-01-22 09:34:04', 'ValidÃ©', 1, 52),
(66, 3, '2020-01-22 09:35:22', 'ValidÃ©', 1, 96),
(67, 1, '2020-01-22 09:40:21', 'ValidÃ©', 1, 2),
(68, 4, '2020-01-22 09:34:35', 'ValidÃ©', 1, 92),
(70, 2, '2020-01-22 09:35:59', 'ValidÃ©', 1, 68),
(71, 0.5, '2020-01-22 09:34:27', 'ValidÃ©', 1, 27),
(72, 1, '2020-01-20 20:10:11', 'Encours', 1, 30),
(73, 0.5, '2020-01-22 10:02:57', 'ValidÃ©', 1, 54),
(74, 3, '2020-01-22 09:36:06', 'ValidÃ©', 1, 35),
(77, 1, '2020-01-22 10:03:21', 'ValidÃ©', 1, 59),
(79, 1, '2020-01-22 09:36:42', 'ValidÃ©', 1, 61),
(80, 1, '2020-01-22 09:37:32', 'ValidÃ©', 1, 66),
(81, 5, '2020-01-22 09:37:20', 'ValidÃ©', 1, 76),
(83, 2, '2020-01-22 09:38:02', 'ValidÃ©', 1, 89),
(84, 1, '2020-01-22 09:38:08', 'ValidÃ©', 1, 68),
(85, 1, '2020-01-22 09:38:17', 'ValidÃ©', 1, 67),
(86, 1, '2020-01-22 09:39:08', 'ValidÃ©', 1, 46),
(89, 0.5, '2020-01-22 09:40:32', 'ValidÃ©', 1, 10),
(90, 1, '2020-01-22 09:39:18', 'ValidÃ©', 1, 2),
(94, 1, '2020-01-22 09:31:42', 'ValidÃ©', 1, 97),
(95, 1, '2020-01-22 09:31:54', 'ValidÃ©', 1, 69),
(97, 3, '2020-01-22 09:40:51', 'ValidÃ©', 1, 35),
(99, 1, '2020-01-22 09:41:16', 'ValidÃ©', 1, 85),
(102, 1, '2020-01-22 09:29:41', 'ValidÃ©', 1, 61),
(103, 3, '2020-01-22 09:29:53', 'ValidÃ©', 1, 47),
(104, 3, '2020-01-22 09:30:07', 'ValidÃ©', 1, 89),
(105, 6, '2020-01-22 09:30:18', 'ValidÃ©', 1, 92),
(108, 5, '2020-01-22 09:31:01', 'ValidÃ©', 1, 55),
(109, 1, '2020-01-22 19:29:39', 'Encours', 1, 96),
(110, 1, '2020-01-22 19:29:39', 'Encours', 1, 2),
(111, 1, '2020-01-22 19:29:39', 'Encours', 1, 8),
(112, 1, '2020-01-22 19:29:39', 'Encours', 1, 41),
(113, 1, '2020-01-22 19:29:39', 'Encours', 1, 21),
(114, 0.5, '2020-01-22 19:29:39', 'Encours', 1, 67),
(115, 1, '2020-01-22 19:29:39', 'Encours', 1, 40),
(116, 1, '2020-01-22 19:29:39', 'Encours', 1, 71),
(117, 0.5, '2020-01-22 19:29:39', 'Encours', 1, 54),
(118, 1, '2020-01-22 19:29:39', 'Encours', 1, 95),
(119, 2, '2020-01-23 11:34:08', 'Encours', 1, 105),
(120, 1, '2020-01-23 11:34:08', 'Encours', 1, 97),
(121, 4, '2020-01-23 11:34:08', 'Encours', 1, 47),
(122, 4, '2020-01-23 11:34:08', 'Encours', 1, 95),
(123, 1, '2020-01-23 11:34:08', 'Encours', 1, 32),
(124, 1, '2020-01-23 11:34:08', 'Encours', 1, 54),
(125, 1, '2020-01-23 11:34:08', 'Encours', 1, 38),
(126, 2, '2020-01-23 11:34:08', 'Encours', 1, 52),
(127, 1, '2020-01-23 11:34:08', 'Encours', 1, 67),
(128, 200, '2020-01-23 11:34:08', 'Encours', 1, 58),
(129, 200, '2020-01-23 11:34:08', 'Encours', 1, 8),
(130, 3, '2020-01-23 11:34:08', 'Encours', 1, 2),
(131, 3, '2020-01-23 15:31:42', 'Encours', 1, 10),
(132, 1, '2020-01-23 15:31:42', 'Encours', 1, 71),
(133, 300, '2020-01-23 15:31:42', 'Encours', 1, 58),
(134, 2, '2020-01-23 15:31:42', 'Encours', 1, 78),
(135, 1, '2020-01-23 15:31:42', 'Encours', 1, 21),
(136, 2, '2020-01-24 07:30:22', 'commande', 1, 96),
(137, 300, '2020-01-24 07:31:20', 'commande', 1, 58),
(138, 500, '2020-01-24 07:32:14', 'commande', 1, 54),
(139, 1, '2020-01-24 07:32:43', 'commande', 1, 46),
(140, 500, '2020-01-24 07:33:13', 'commande', 1, 32),
(141, 5, '2020-01-24 07:33:49', 'commande', 1, 55),
(142, 1, '2020-01-24 07:34:08', 'commande', 1, 71),
(143, 500, '2020-01-24 07:34:35', 'commande', 1, 27),
(144, 1, '2020-01-24 07:35:10', 'commande', 1, 30),
(145, 1, '2020-01-24 07:36:37', 'commande', 1, 30);

-- --------------------------------------------------------

--
-- Structure de la table `configcuisine`
--

CREATE TABLE IF NOT EXISTS `configcuisine` (
  `idConfCuisine` int(11) NOT NULL AUTO_INCREMENT,
  `idPlat` int(11) NOT NULL,
  `idStockCuis` int(11) NOT NULL,
  `qteSortie` double NOT NULL,
  `unite` varchar(20) NOT NULL,
  PRIMARY KEY (`idConfCuisine`),
  KEY `idPlat` (`idPlat`),
  KEY `idStockCuis` (`idStockCuis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=687 ;

--
-- Contenu de la table `configcuisine`
--

INSERT INTO `configcuisine` (`idConfCuisine`, `idPlat`, `idStockCuis`, `qteSortie`, `unite`) VALUES
(1, 6, 32, 327, 'pieces'),
(2, 7, 32, 2, 'pieces'),
(3, 7, 37, 1.5, 'cl'),
(4, 8, 32, 2, 'pieces'),
(5, 8, 37, 1.5, 'cl'),
(6, 10, 32, 2, 'pieces'),
(7, 10, 37, 1.5, 'cl'),
(8, 11, 32, 2, 'pieces'),
(9, 11, 69, 20, 'gramme'),
(10, 11, 37, 1.5, 'cl'),
(12, 12, 32, 2, 'pieces'),
(13, 12, 73, 30, 'gramme'),
(14, 12, 23, 10, 'gramme'),
(15, 12, 37, 1.5, 'gramme'),
(16, 12, 65, 25, 'gramme'),
(17, 12, 47, 20, 'gramme'),
(18, 13, 32, 2, 'pieces'),
(19, 13, 7, 25, 'gramme'),
(20, 13, 47, 20, 'gramme'),
(21, 13, 65, 25, 'gramme'),
(22, 13, 43, 1, 'gramme'),
(23, 13, 69, 20, 'gramme'),
(24, 14, 32, 2, 'pieces'),
(25, 14, 37, 1.5, 'cl'),
(26, 14, 7, 30, 'gramme'),
(27, 15, 32, 2, 'pieces'),
(28, 15, 37, 1.5, 'cl'),
(29, 15, 47, 30, 'gramme'),
(30, 16, 32, 2, 'pieces'),
(31, 16, 37, 1.5, 'cl'),
(32, 17, 32, 2, 'pieces'),
(33, 17, 37, 1.5, 'pieces'),
(34, 17, 78, 0.5, 'pieces'),
(35, 18, 32, 2, 'pieces'),
(36, 18, 7, 20, 'gramme'),
(37, 18, 78, 0.5, 'gramme'),
(38, 18, 23, 10, 'gramme'),
(39, 18, 37, 1.5, 'cl'),
(40, 18, 69, 20, 'gramme'),
(41, 18, 73, 20, 'gramme'),
(42, 18, 47, 20, 'gramme'),
(43, 19, 32, 2, 'pieces'),
(44, 19, 43, 1, 'gramme'),
(45, 19, 7, 30, 'gramme'),
(47, 19, 73, 20, 'gramme'),
(48, 19, 23, 5, 'gramme'),
(49, 22, 69, 80, 'gramme'),
(50, 22, 36, 1, 'cl'),
(51, 22, 81, 100, 'gramme'),
(52, 23, 31, 1, 'botte'),
(53, 23, 65, 50, 'gramme'),
(54, 23, 36, 1, 'cl'),
(55, 120, 33, 250, 'gramme'),
(56, 121, 73, 300, 'gramme'),
(57, 123, 41, 125, 'gramme'),
(58, 123, 38, 125, 'gramme'),
(60, 1, 56, 1, 'pieces'),
(61, 1, 50, 40, 'gramme'),
(62, 2, 40, 40, 'gramme'),
(63, 2, 50, 40, 'gramme'),
(64, 3, 50, 40, 'gramme'),
(66, 4, 50, 40, 'gramme'),
(67, 4, 40, 40, 'gramme'),
(69, 138, 50, 40, 'gramme'),
(70, 138, 40, 40, 'kgs'),
(71, 138, 84, 40, 'gramme'),
(72, 88, 47, 40, 'gramme'),
(73, 88, 7, 100, 'gramme'),
(74, 89, 47, 50, 'gramme'),
(75, 25, 65, 150, 'gramme'),
(76, 25, 36, 1.5, 'cl'),
(77, 89, 7, 100, 'gramme'),
(78, 25, 29, 50, 'gramme'),
(79, 90, 7, 100, 'gramme'),
(80, 90, 47, 50, 'gramme'),
(81, 90, 65, 20, 'gramme'),
(82, 90, 32, 1, 'pieces'),
(83, 91, 6, 125, 'gramme'),
(84, 25, 35, 4, 'pieces'),
(85, 24, 32, 3, 'pieces'),
(86, 91, 39, 200, 'gramme'),
(87, 24, 51, 40, 'gramme'),
(88, 24, 69, 25, 'gramme'),
(89, 121, 51, 40, 'gramme'),
(90, 122, 51, 40, 'gramme'),
(91, 91, 85, 1, 'pieces'),
(92, 56, 51, 40, 'gramme'),
(93, 55, 51, 40, 'gramme'),
(94, 58, 51, 40, 'gramme'),
(96, 94, 47, 100, 'gramme'),
(98, 140, 51, 40, 'gramme'),
(99, 55, 46, 40, 'gramme'),
(100, 94, 42, 4, 'pieces'),
(101, 56, 46, 40, 'gramme'),
(102, 94, 65, 20, 'gramme'),
(103, 58, 46, 40, 'gramme'),
(104, 140, 46, 40, 'gramme'),
(105, 121, 46, 40, 'gramme'),
(107, 122, 46, 40, 'gramme'),
(108, 95, 47, 200, 'gramme'),
(109, 95, 42, 4, 'pieces'),
(110, 55, 73, 500, 'gramme'),
(111, 95, 9, 200, 'gramme'),
(112, 56, 73, 500, 'gramme'),
(113, 57, 73, 500, 'gramme'),
(114, 96, 39, 100, 'gramme'),
(115, 96, 7, 150, 'gramme'),
(116, 140, 82, 500, 'gramme'),
(117, 96, 47, 100, 'gramme'),
(118, 96, 43, 100, 'gramme'),
(119, 96, 65, 20, 'gramme'),
(120, 122, 82, 500, 'gramme'),
(121, 118, 38, 125, 'gramme'),
(122, 40, 1, 1, 'pieces'),
(123, 118, 41, 125, 'gramme'),
(124, 40, 23, 20, 'gramme'),
(125, 40, 63, 50, 'gramme'),
(126, 115, 82, 500, 'gramme'),
(127, 40, 69, 50, 'gramme'),
(128, 40, 64, 50, 'gramme'),
(129, 40, 24, 1, 'pieces'),
(130, 114, 1, 1, 'portion'),
(131, 40, 65, 50, 'gramme'),
(134, 40, 45, 1, 'pieces'),
(136, 114, 24, 1, 'pieces'),
(137, 114, 32, 1, 'pieces'),
(138, 40, 37, 3, 'cl'),
(139, 41, 1, 1, 'pieces'),
(140, 41, 32, 1, 'pieces'),
(141, 41, 24, 1, 'pieces'),
(142, 42, 1, 1, 'pieces'),
(143, 42, 63, 50, 'gramme'),
(144, 42, 69, 50, 'gramme'),
(145, 42, 42, 4, 'pieces'),
(146, 42, 36, 3, 'cl'),
(147, 42, 65, 50, 'gramme'),
(148, 42, 24, 1, 'pieces'),
(149, 42, 64, 50, 'gramme'),
(150, 44, 1, 1, 'pieces'),
(151, 44, 69, 100, 'gramme'),
(152, 44, 45, 1, 'pieces'),
(153, 44, 55, 1, 'pieces'),
(154, 44, 24, 1, 'pieces'),
(155, 44, 37, 3, 'cl'),
(156, 45, 1, 1, 'pieces'),
(157, 45, 45, 2, 'pieces'),
(158, 45, 24, 1, 'pieces'),
(159, 45, 37, 3, 'cl'),
(160, 46, 1, 1, 'pieces'),
(161, 46, 85, 1, 'pieces'),
(162, 46, 45, 2, 'pieces'),
(163, 46, 24, 1, 'pieces'),
(164, 46, 37, 3, 'cl'),
(165, 46, 69, 50, 'gramme'),
(166, 29, 70, 250, 'gramme'),
(167, 29, 73, 120, 'gramme'),
(168, 97, 39, 200, 'gramme'),
(169, 29, 71, 1, 'pieces'),
(170, 97, 47, 100, 'gramme'),
(171, 29, 24, 1, 'pieces'),
(172, 29, 88, 40, 'gramme'),
(173, 30, 70, 250, 'gramme'),
(174, 98, 39, 200, 'gramme'),
(175, 30, 71, 1, 'pieces'),
(176, 30, 88, 40, 'gramme'),
(177, 30, 47, 20, 'gramme'),
(178, 98, 7, 25, 'gramme'),
(179, 31, 39, 50, 'gramme'),
(180, 31, 50, 20, 'gramme'),
(181, 22, 40, 20, 'gramme'),
(182, 31, 32, 1, 'pieces'),
(183, 31, 45, 1, 'pieces'),
(184, 31, 47, 30, 'gramme'),
(185, 31, 24, 1, 'pieces'),
(186, 31, 37, 1.5, 'cl'),
(187, 98, 65, 25, 'gramme'),
(188, 33, 70, 250, 'gramme'),
(189, 33, 63, 50, 'gramme'),
(190, 99, 39, 200, 'gramme'),
(191, 33, 71, 1, 'pieces'),
(192, 99, 70, 150, 'gramme'),
(193, 33, 73, 120, 'gramme'),
(194, 99, 65, 50, 'gramme'),
(195, 99, 42, 4, 'pieces'),
(196, 100, 39, 200, 'gramme'),
(197, 33, 23, 50, 'gramme'),
(198, 33, 88, 40, 'gramme'),
(199, 33, 24, 1, 'pieces'),
(200, 100, 47, 100, 'gramme'),
(201, 35, 10, 250, 'gramme'),
(202, 100, 65, 25, 'gramme'),
(203, 35, 69, 50, 'gramme'),
(204, 35, 68, 100, 'gramme'),
(205, 101, 16, 280, 'gramme'),
(206, 35, 24, 1, 'pieces'),
(207, 101, 69, 50, 'gramme'),
(208, 101, 65, 50, 'gramme'),
(209, 101, 70, 100, 'gramme'),
(210, 102, 16, 250, 'gramme'),
(211, 102, 73, 300, 'gramme'),
(212, 35, 37, 3, 'cl'),
(213, 103, 13, 1, 'pieces'),
(214, 35, 43, 1, 'pieces'),
(215, 104, 13, 1, 'pieces'),
(216, 104, 29, 1, 'pieces'),
(217, 36, 10, 250, 'gramme'),
(218, 36, 69, 50, 'gramme'),
(219, 36, 24, 1, 'pieces'),
(220, 104, 24, 1, 'pieces'),
(221, 36, 37, 3, 'cl'),
(222, 37, 10, 250, 'gramme'),
(223, 37, 69, 100, 'gramme'),
(224, 37, 24, 1, 'pieces'),
(225, 104, 55, 2, 'pieces'),
(226, 37, 37, 3, 'cl'),
(227, 38, 10, 250, 'gramme'),
(228, 99, 43, 1, 'pieces'),
(229, 38, 32, 1, 'pieces'),
(230, 38, 24, 1, 'pieces'),
(233, 58, 82, 500, 'gramme'),
(234, 38, 47, 50, 'gramme'),
(235, 60, 23, 250, 'gramme'),
(236, 38, 7, 50, 'gramme'),
(237, 38, 37, 3, 'botte'),
(238, 60, 63, 100, 'gramme'),
(239, 38, 25, 0.5, 'pieces'),
(240, 38, 45, 1, 'pieces'),
(241, 60, 69, 50, 'gramme'),
(242, 60, 24, 1, 'pieces'),
(243, 47, 17, 280, 'gramme'),
(244, 47, 69, 50, 'gramme'),
(245, 47, 24, 1, 'pieces'),
(246, 47, 29, 1, 'pieces'),
(247, 47, 37, 3, 'cl'),
(248, 50, 17, 280, 'gramme'),
(249, 50, 45, 1, 'pieces'),
(250, 50, 69, 50, 'gramme'),
(251, 72, 74, 125, 'gramme'),
(252, 50, 65, 50, 'gramme'),
(253, 72, 42, 4, 'pieces'),
(254, 50, 37, 3, 'cl'),
(255, 72, 65, 50, 'gramme'),
(256, 49, 16, 280, 'gramme'),
(257, 49, 71, 1, 'pieces'),
(258, 49, 85, 1, 'pieces'),
(259, 49, 47, 50, 'gramme'),
(260, 70, 89, 0.5, 'pieces'),
(261, 49, 45, 1, 'pieces'),
(262, 49, 37, 3, 'cl'),
(263, 71, 7, 50, 'gramme'),
(264, 49, 24, 1, 'pieces'),
(265, 71, 47, 50, 'gramme'),
(266, 71, 45, 1, 'pieces'),
(267, 52, 17, 280, 'gramme'),
(268, 52, 29, 1, 'pieces'),
(269, 74, 82, 2, 'pieces'),
(270, 52, 55, 1, 'pieces'),
(271, 52, 24, 1, 'pieces'),
(272, 52, 37, 3, 'cl'),
(273, 78, 32, 1, 'pieces'),
(274, 53, 33, 250, 'gramme'),
(275, 53, 37, 3, 'cl'),
(276, 78, 50, 40, 'gramme'),
(277, 53, 69, 50, 'gramme'),
(278, 120, 69, 50, 'gramme'),
(279, 120, 37, 3, 'cl'),
(280, 78, 90, 1, 'pieces'),
(281, 54, 33, 250, 'gramme'),
(282, 54, 69, 50, 'gramme'),
(283, 78, 39, 40, 'gramme'),
(284, 54, 63, 50, 'gramme'),
(285, 78, 40, 40, 'gramme'),
(286, 54, 64, 50, 'gramme'),
(287, 54, 23, 20, 'gramme'),
(288, 54, 85, 1, 'pieces'),
(289, 54, 37, 3, 'cl'),
(290, 105, 18, 1, 'pieces'),
(292, 108, 83, 250, 'gramme'),
(293, 108, 55, 1, 'pieces'),
(294, 108, 24, 1, 'pieces'),
(295, 109, 11, 250, 'gramme'),
(296, 110, 12, 250, 'gramme'),
(297, 110, 24, 1, 'pieces'),
(298, 110, 29, 1, 'pieces'),
(299, 111, 10, 250, 'gramme'),
(300, 111, 24, 1, 'pieces'),
(301, 111, 55, 1, 'pieces'),
(302, 145, 1, 1, 'pieces'),
(303, 145, 24, 1, 'pieces'),
(304, 145, 29, 1, 'pieces'),
(305, 113, 1, 1, 'pieces'),
(306, 113, 24, 1, 'pieces'),
(307, 113, 55, 1, 'pieces'),
(308, 113, 29, 1, 'pieces'),
(309, 79, 32, 1, 'pieces'),
(310, 79, 50, 40, 'gramme'),
(311, 79, 90, 1, 'pieces'),
(312, 79, 39, 40, 'gramme'),
(313, 79, 40, 40, 'gramme'),
(314, 80, 32, 1, 'pieces'),
(315, 80, 50, 80, 'gramme'),
(316, 80, 90, 1, 'pieces'),
(317, 80, 39, 40, 'gramme'),
(318, 80, 40, 40, 'gramme'),
(320, 63, 71, 1, 'pieces'),
(321, 82, 69, 50, 'gramme'),
(322, 82, 63, 50, 'gramme'),
(323, 82, 31, 1, 'pieces'),
(324, 82, 32, 1, 'pieces'),
(325, 83, 32, 1, 'pieces'),
(326, 83, 31, 1, 'pieces'),
(327, 67, 43, 1, 'gramme'),
(328, 67, 45, 2, 'gramme'),
(329, 83, 7, 250, 'gramme'),
(330, 83, 47, 50, 'gramme'),
(331, 67, 27, 1, 'pieces'),
(332, 84, 69, 50, 'gramme'),
(333, 68, 74, 100, 'gramme'),
(334, 68, 47, 50, 'gramme'),
(335, 84, 65, 1, 'pieces'),
(336, 70, 74, 100, 'gramme'),
(337, 85, 32, 1, 'pieces'),
(338, 70, 7, 100, 'gramme'),
(339, 85, 7, 250, 'gramme'),
(340, 70, 47, 50, 'gramme'),
(341, 85, 47, 50, 'gramme'),
(342, 70, 45, 50, 'gramme'),
(343, 85, 65, 1, 'pieces'),
(344, 70, 27, 1, 'pieces'),
(345, 85, 51, 80, 'gramme'),
(346, 86, 65, 1, 'pieces'),
(347, 86, 69, 50, 'gramme'),
(348, 87, 65, 1, 'pieces'),
(349, 87, 69, 50, 'gramme'),
(350, 87, 47, 50, 'gramme'),
(351, 157, 95, 1, 'pieces'),
(352, 157, 71, 1, 'pieces'),
(353, 135, 13, 1, 'pieces'),
(354, 157, 45, 1, 'pieces'),
(355, 157, 24, 1, 'pieces'),
(356, 103, 101, 1, 'pieces'),
(357, 130, 92, 1, 'pieces'),
(358, 137, 100, 1, 'pieces'),
(359, 130, 71, 1, 'pieces'),
(360, 130, 45, 1, 'pieces'),
(361, 142, 13, 1, 'pieces'),
(362, 104, 101, 1, 'pieces'),
(363, 130, 24, 1, 'pieces'),
(364, 157, 37, 3, 'cl'),
(365, 136, 100, 1, 'pieces'),
(366, 144, 13, 1, 'pieces'),
(367, 130, 37, 3, 'cl'),
(368, 159, 14, 1, 'pieces'),
(369, 107, 101, 1, 'pieces'),
(370, 133, 91, 2, 'pieces'),
(371, 143, 100, 1, 'pieces'),
(372, 133, 71, 1, 'pieces'),
(373, 133, 45, 1, 'pieces'),
(374, 133, 24, 1, 'pieces'),
(375, 133, 37, 3, 'cl'),
(377, 135, 45, 1, 'pieces'),
(378, 105, 93, 1, 'pieces'),
(379, 159, 71, 1, 'pieces'),
(380, 105, 71, 1, 'pieces'),
(381, 135, 24, 1, 'pieces'),
(382, 159, 45, 1, 'pieces'),
(383, 105, 45, 1, 'pieces'),
(384, 135, 37, 3, 'cl'),
(385, 159, 24, 1, 'pieces'),
(386, 105, 24, 1, 'pieces'),
(387, 105, 37, 3, 'cl'),
(388, 131, 18, 1, 'pieces'),
(389, 131, 71, 1, 'pieces'),
(390, 131, 45, 1, 'pieces'),
(391, 131, 24, 1, 'pieces'),
(392, 131, 37, 3, 'cl'),
(393, 103, 71, 1, 'pieces'),
(394, 103, 45, 1, 'pieces'),
(395, 154, 75, 1, 'pieces'),
(396, 103, 24, 1, 'pieces'),
(397, 132, 71, 1, 'pieces'),
(398, 103, 37, 3, 'cl'),
(399, 132, 45, 1, 'pieces'),
(400, 159, 37, 3, 'cl'),
(401, 137, 71, 1, 'pieces'),
(402, 132, 24, 1, 'pieces'),
(403, 158, 96, 1, 'pieces'),
(404, 137, 45, 1, 'pieces'),
(405, 132, 37, 3, 'cl'),
(406, 158, 71, 1, 'pieces'),
(407, 137, 24, 1, 'pieces'),
(408, 158, 45, 1, 'pieces'),
(409, 158, 24, 1, 'pieces'),
(410, 158, 37, 3, 'cl'),
(411, 137, 37, 3, 'cl'),
(412, 146, 65, 50, 'gramme'),
(413, 162, 99, 1, 'pieces'),
(414, 162, 71, 1, 'pieces'),
(415, 142, 29, 1, 'pieces'),
(416, 162, 45, 1, 'pieces'),
(417, 142, 24, 1, 'pieces'),
(418, 146, 92, 1, 'pieces'),
(419, 162, 24, 1, 'pieces'),
(420, 162, 37, 3, 'cl'),
(421, 142, 37, 3, 'cl'),
(422, 146, 69, 50, 'gramme'),
(423, 161, 99, 0.5, 'pieces'),
(424, 135, 29, 1, 'pieces'),
(425, 161, 71, 1, 'pieces'),
(426, 146, 71, 1, 'pieces'),
(427, 104, 37, 1, 'pieces'),
(428, 146, 64, 50, 'gramme'),
(429, 161, 45, 1, 'pieces'),
(430, 161, 24, 1, 'pieces'),
(431, 136, 29, 1, 'pieces'),
(432, 136, 24, 1, 'pieces'),
(433, 161, 37, 3, 'cl'),
(434, 136, 37, 3, 'cl'),
(435, 163, 97, 1, 'pieces'),
(436, 146, 25, 0.5, 'pieces'),
(437, 163, 71, 1, 'pieces'),
(438, 163, 45, 1, 'pieces'),
(440, 146, 91, 3, 'cl'),
(441, 163, 24, 1, 'pieces'),
(442, 144, 67, 50, 'gramme'),
(443, 163, 37, 3, 'cl'),
(445, 134, 91, 2, 'pieces'),
(446, 144, 25, 0.5, 'gramme'),
(447, 134, 65, 50, 'gramme'),
(448, 160, 97, 0.5, 'pieces'),
(449, 160, 71, 1, 'pieces'),
(450, 160, 45, 1, 'pieces'),
(451, 134, 69, 50, 'gramme'),
(452, 160, 24, 1, 'pieces'),
(453, 134, 71, 1, 'pieces'),
(454, 160, 37, 3, 'cl'),
(455, 164, 98, 1, 'pieces'),
(456, 164, 71, 1, 'pieces'),
(457, 164, 45, 1, 'pieces'),
(458, 164, 24, 1, 'pieces'),
(459, 144, 37, 3, 'cl'),
(460, 164, 37, 3, 'cl'),
(461, 107, 25, 0.5, 'pieces'),
(462, 173, 71, 1, 'pieces'),
(463, 107, 37, 3, 'cl'),
(465, 107, 69, 50, 'gramme'),
(466, 134, 64, 50, 'gramme'),
(467, 107, 65, 50, 'gramme'),
(468, 173, 98, 0.5, 'pieces'),
(469, 143, 65, 50, 'gramme'),
(470, 134, 25, 0.5, 'pieces'),
(471, 143, 69, 50, 'gramme'),
(472, 173, 45, 1, 'pieces'),
(473, 173, 24, 1, 'pieces'),
(474, 134, 37, 3, 'cl'),
(476, 173, 37, 3, 'cl'),
(477, 143, 25, 0.5, 'pieces'),
(478, 152, 93, 1, 'pieces'),
(479, 165, 95, 1, 'pieces'),
(480, 143, 37, 3, 'cl'),
(481, 152, 65, 50, 'gramme'),
(482, 165, 65, 50, 'gramme'),
(483, 152, 69, 50, 'gramme'),
(484, 107, 64, 1, 'pieces'),
(485, 165, 69, 50, 'gramme'),
(486, 165, 71, 1, 'pieces'),
(487, 152, 71, 1, 'pieces'),
(488, 165, 25, 0.5, 'pieces'),
(489, 165, 37, 3, 'cl'),
(490, 144, 64, 1, 'pieces'),
(491, 152, 64, 50, 'gramme'),
(492, 143, 64, 1, 'pieces'),
(493, 152, 25, 0.5, 'pieces'),
(494, 167, 14, 1, 'pieces'),
(495, 152, 37, 3, 'cl'),
(496, 167, 65, 50, 'gramme'),
(497, 167, 69, 50, 'gramme'),
(498, 153, 18, 1, 'pieces'),
(499, 167, 71, 1, 'pieces'),
(500, 167, 25, 0.5, 'pieces'),
(501, 153, 65, 50, 'gramme'),
(502, 167, 37, 3, 'cl'),
(503, 169, 96, 1, 'pieces'),
(504, 131, 69, 50, 'gramme'),
(505, 169, 65, 50, 'gramme'),
(506, 169, 69, 50, 'gramme'),
(507, 153, 71, 1, 'pieces'),
(508, 169, 71, 1, 'pieces'),
(509, 131, 64, 50, 'gramme'),
(511, 165, 64, 50, 'gramme'),
(512, 167, 64, 50, 'gramme'),
(513, 107, 71, 1, 'pieces'),
(514, 153, 25, 0.5, 'pieces'),
(515, 144, 71, 1, 'pieces'),
(516, 169, 64, 50, 'gramme'),
(517, 169, 25, 0.5, 'pieces'),
(518, 143, 71, 1, 'pieces'),
(519, 169, 37, 3, 'cl'),
(520, 153, 37, 3, 'cl'),
(521, 170, 99, 1, 'pieces'),
(522, 162, 65, 50, 'gramme'),
(523, 154, 65, 50, 'gramme'),
(524, 170, 69, 50, 'gramme'),
(525, 154, 69, 50, 'gramme'),
(526, 170, 71, 1, 'pieces'),
(527, 170, 64, 50, 'gramme'),
(528, 154, 64, 50, 'gramme'),
(529, 170, 25, 0.5, 'pieces'),
(530, 170, 37, 3, 'cl'),
(531, 154, 71, 1, 'pieces'),
(532, 170, 65, 50, 'gramme'),
(533, 154, 25, 0.5, 'pieces'),
(534, 171, 97, 1, 'pieces'),
(535, 171, 65, 50, 'gramme'),
(536, 171, 71, 1, 'pieces'),
(537, 171, 69, 50, 'gramme'),
(538, 154, 37, 3, 'cl'),
(539, 171, 64, 50, 'gramme'),
(540, 171, 25, 0.5, 'pieces'),
(541, 171, 37, 3, 'cl'),
(542, 147, 92, 1, 'pieces'),
(543, 166, 97, 0.5, 'pieces'),
(544, 166, 65, 50, 'gramme'),
(545, 147, 65, 50, 'gramme'),
(546, 166, 69, 50, 'gramme'),
(547, 166, 71, 1, 'pieces'),
(548, 147, 69, 50, 'gramme'),
(549, 166, 64, 50, 'gramme'),
(550, 151, 75, 1, 'pieces'),
(551, 147, 71, 1, 'pieces'),
(552, 166, 25, 0.5, 'pieces'),
(553, 151, 65, 50, 'gramme'),
(554, 166, 37, 3, 'cl'),
(555, 147, 64, 50, 'gramme'),
(556, 151, 69, 50, 'gramme'),
(557, 172, 98, 1, 'pieces'),
(558, 172, 65, 50, 'gramme'),
(559, 147, 25, 0.5, 'pieces'),
(560, 172, 69, 50, 'gramme'),
(561, 172, 71, 1, 'pieces'),
(562, 172, 64, 50, 'gramme'),
(563, 147, 37, 3, 'cl'),
(564, 172, 25, 0.5, 'pieces'),
(565, 151, 71, 1, 'pieces'),
(566, 172, 37, 3, 'cl'),
(567, 168, 98, 0.5, 'pieces'),
(568, 151, 64, 50, 'gramme'),
(569, 149, 91, 2, 'pieces'),
(570, 151, 25, 0.5, 'gramme'),
(571, 168, 65, 50, 'gramme'),
(572, 168, 69, 50, 'gramme'),
(573, 151, 37, 3, 'cl'),
(574, 168, 71, 1, 'pieces'),
(575, 168, 64, 50, 'gramme'),
(576, 149, 65, 50, 'gramme'),
(577, 150, 18, 1, 'pieces'),
(578, 168, 25, 0.5, 'pieces'),
(579, 149, 69, 50, 'gramme'),
(580, 168, 37, 3, 'cl'),
(581, 149, 71, 1, 'pieces'),
(582, 150, 65, 50, 'gramme'),
(583, 149, 64, 50, 'gramme'),
(584, 128, 95, 1, 'pieces'),
(585, 150, 69, 50, 'gramme'),
(586, 128, 29, 1, 'pieces'),
(587, 128, 24, 1, 'pieces'),
(588, 150, 71, 1, 'pieces'),
(589, 149, 25, 0.5, 'pieces'),
(590, 128, 37, 3, 'cl'),
(591, 150, 64, 50, 'gramme'),
(592, 127, 14, 1, 'pieces'),
(593, 149, 37, 3, 'cl'),
(594, 127, 29, 1, 'pieces'),
(595, 150, 25, 0.5, 'gramme'),
(596, 127, 24, 1, 'pieces'),
(597, 148, 93, 1, 'pieces'),
(598, 150, 37, 3, 'cl'),
(599, 127, 37, 3, 'cl'),
(600, 126, 96, 1, 'pieces'),
(601, 148, 25, 0.5, 'pieces'),
(602, 126, 29, 1, 'pieces'),
(603, 126, 24, 1, 'pieces'),
(604, 148, 65, 50, 'gramme'),
(605, 126, 37, 3, 'cl'),
(606, 125, 99, 1, 'pieces'),
(607, 148, 69, 50, 'gramme'),
(608, 125, 29, 1, 'pieces'),
(609, 125, 24, 1, 'pieces'),
(610, 148, 71, 1, 'pieces'),
(611, 125, 37, 3, 'cl'),
(612, 148, 64, 50, 'gramme'),
(613, 124, 97, 1, 'pieces'),
(614, 124, 29, 1, 'pieces'),
(615, 124, 24, 1, 'pieces'),
(616, 148, 37, 3, 'cl'),
(617, 124, 37, 3, 'cl'),
(618, 129, 99, 0.5, 'pieces'),
(619, 129, 29, 1, 'pieces'),
(620, 129, 24, 1, 'pieces'),
(621, 129, 37, 3, 'cl'),
(622, 155, 97, 0.5, 'pieces'),
(623, 155, 29, 1, 'pieces'),
(624, 155, 24, 1, 'pieces'),
(625, 155, 37, 3, 'cl'),
(626, 106, 98, 1, 'pieces'),
(627, 106, 29, 1, 'pieces'),
(628, 106, 24, 1, 'pieces'),
(629, 106, 37, 3, 'cl'),
(630, 156, 98, 0.5, 'pieces'),
(631, 156, 29, 1, 'pieces'),
(632, 156, 24, 1, 'pieces'),
(633, 156, 37, 3, 'cl'),
(634, 94, 9, 200, 'gramme'),
(635, 19, 9, 50, 'gramme'),
(636, 182, 74, 125, 'gramme'),
(637, 180, 63, 50, 'gramme'),
(638, 180, 24, 1, 'pieces'),
(639, 180, 69, 50, 'gramme'),
(640, 179, 69, 50, 'gramme'),
(641, 179, 63, 50, 'gramme'),
(642, 179, 25, 50, 'gramme'),
(643, 178, 63, 50, 'gramme'),
(644, 178, 24, 1, 'pieces'),
(645, 178, 69, 50, 'gramme'),
(646, 177, 63, 50, 'gramme'),
(647, 177, 69, 50, 'gramme'),
(648, 177, 37, 3, 'cl'),
(649, 177, 24, 1, 'pieces'),
(650, 186, 9, 200, 'gramme'),
(651, 187, 39, 1, 'pieces'),
(652, 187, 37, 3, 'cl'),
(653, 188, 16, 1, 'pieces'),
(654, 188, 37, 3, 'cl'),
(655, 191, 1, 0.5, 'portion'),
(656, 191, 43, 100, 'gramme'),
(657, 191, 42, 100, 'gramme'),
(658, 191, 47, 150, 'gramme'),
(659, 192, 10, 250, 'gramme'),
(660, 192, 69, 100, 'gramme'),
(661, 192, 64, 50, 'gramme'),
(662, 192, 65, 50, 'gramme'),
(663, 192, 25, 40, 'gramme'),
(664, 192, 24, 1, 'pieces'),
(665, 193, 74, 200, 'gramme'),
(666, 193, 65, 50, 'gramme'),
(667, 193, 63, 50, 'gramme'),
(668, 193, 64, 20, 'gramme'),
(669, 193, 69, 40, 'gramme'),
(670, 193, 25, 40, 'gramme'),
(671, 193, 70, 50, 'gramme'),
(672, 193, 36, 40, 'cl'),
(673, 193, 47, 30, 'gramme'),
(674, 195, 94, 1, 'pieces'),
(675, 195, 65, 50, 'gramme'),
(676, 195, 64, 50, 'gramme'),
(677, 195, 69, 50, 'gramme'),
(678, 196, 33, 250, 'gramme'),
(679, 196, 23, 50, 'gramme'),
(680, 196, 63, 50, 'gramme'),
(681, 196, 64, 50, 'gramme'),
(682, 197, 94, 1, 'pieces'),
(683, 197, 24, 1, 'pieces'),
(684, 197, 55, 1, 'pieces'),
(685, 197, 29, 1, 'pieces'),
(686, 197, 37, 3, 'cl');

-- --------------------------------------------------------

--
-- Structure de la table `creance`
--

CREATE TABLE IF NOT EXISTS `creance` (
  `idCreance` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `montantCreance` double NOT NULL,
  `numFac` varchar(50) NOT NULL,
  PRIMARY KEY (`idCreance`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `depensepdv`
--

CREATE TABLE IF NOT EXISTS `depensepdv` (
  `idDep` int(11) NOT NULL AUTO_INCREMENT,
  `montantDp` double NOT NULL,
  `motifDp` varchar(255) NOT NULL,
  `dateDp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `agentDp` varchar(50) NOT NULL,
  PRIMARY KEY (`idDep`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `depensepdv`
--

INSERT INTO `depensepdv` (`idDep`, `montantDp`, `motifDp`, `dateDp`, `agentDp`) VALUES
(1, 0, 'o', '2020-01-02 16:13:36', ''),
(2, 2.12, 'Beignets pour le personnel', '2020-01-13 06:29:18', ''),
(3, 1.176, 'ACHAT UNITES RECEPTION', '2020-01-13 07:24:27', ''),
(4, 6.7, 'RATION PERSONNEL', '2020-01-13 07:26:50', ''),
(5, 6.7, 'RATION PERSONNEL', '2020-01-14 06:27:15', ''),
(6, 2.11, 'BEIGNET PERSONNEL', '2020-01-14 06:28:04', ''),
(7, 10, 'PAYEMENT DETTE HUILLE D''OLIVE', '2020-01-16 04:40:13', ''),
(8, 5.8, 'JEAN CLAUDE', '2020-01-16 04:40:59', ''),
(9, 6.7, 'RATION PERSONNEL', '2020-01-16 04:41:34', ''),
(10, 2.1, 'BEGNEIT PERSONNEL', '2020-01-16 04:42:15', ''),
(11, 1.18, 'transport (J.C)', '2020-01-17 20:18:58', 'aristote'),
(12, 1.7, 'JEAN CLAUDE', '2020-01-18 05:08:47', ''),
(13, 0.8, 'ACHAT PAIN', '2020-01-18 05:09:17', ''),
(14, 2.2, 'BEIGNET PERSONNEL', '2020-01-18 05:09:44', ''),
(15, 0.88, 'acha du pain', '2020-01-18 20:25:39', 'Cibalonza'),
(16, 0.8, 'ACHAT PAIN', '2020-01-20 04:54:26', ''),
(17, 0.8, 'ACHAT OEUF', '2020-01-20 04:54:56', ''),
(18, 2.2, 'BEIGNET PERSONNEL', '2020-01-20 04:55:28', ''),
(19, 6.7, 'RATIO PERSONNEL', '2020-01-22 04:39:51', ''),
(20, 1.7, 'UNITES RECEPTION', '2020-01-22 04:40:17', ''),
(21, 2.2, 'BEIGNET PERSONNEL', '2020-01-22 04:40:56', ''),
(22, 0.88, 'Achat pain', '2020-01-22 21:25:32', 'Restaurant Bar'),
(23, 0.29, 'Achat Sachets', '2020-01-23 20:26:09', 'Restaurant Bar'),
(24, 0.5, 'achat sachet pour emballage', '2020-01-24 04:57:42', ''),
(25, 0.8, 'achat pain', '2020-01-24 04:58:59', ''),
(26, 0.2, 'achat sachet vert', '2020-01-24 04:59:33', '');

-- --------------------------------------------------------

--
-- Structure de la table `dette`
--

CREATE TABLE IF NOT EXISTS `dette` (
  `idDette` int(11) NOT NULL AUTO_INCREMENT,
  `idFour` int(11) NOT NULL,
  `montantDette` double NOT NULL,
  `numDoc` varchar(50) NOT NULL,
  PRIMARY KEY (`idDette`),
  KEY `idFour` (`idFour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dettefour`
--

CREATE TABLE IF NOT EXISTS `dettefour` (
  `idDetteF` int(11) NOT NULL AUTO_INCREMENT,
  `idFour` int(11) NOT NULL,
  `designProd` varchar(100) NOT NULL,
  `dateDette` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qteDette` int(11) NOT NULL,
  `puDette` double NOT NULL,
  `ptDette` double NOT NULL,
  `modePaieDette` varchar(20) NOT NULL,
  `idOperation` int(11) NOT NULL,
  `diffIndex` varchar(10) NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  PRIMARY KEY (`idDetteF`),
  KEY `idFour` (`idFour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `dettefour`
--

INSERT INTO `dettefour` (`idDetteF`, `idFour`, `designProd`, `dateDette`, `qteDette`, `puDette`, `ptDette`, `modePaieDette`, `idOperation`, `diffIndex`, `accompte`, `reste`) VALUES
(1, 2, 'KING FISH', '2020-01-12 14:37:49', 6, 12.5, 75, 'CrÃ©dit', 3, 'BS', 12.5, 62.5),
(2, 3, 'CITRONS', '2020-01-13 07:04:43', 3, 2.4, 8.16, 'CrÃ©dit', 4, 'SN', 7.2, 0.96),
(3, 3, 'ORANGE', '2020-01-13 07:17:22', 2, 4.1, 6.56, 'CrÃ©dit', 10, 'SN', 4.1, 2.46),
(4, 1, 'JAMBON DE BOEUF', '2020-01-22 09:45:56', 2, 7.5, 11.25, 'CrÃ©dit', 26, 'SN', 7.5, 3.75),
(5, 7, 'HUILE DE COUSINE COOKIE', '2020-01-22 09:47:20', 20, 27, 540, 'CrÃ©dit', 28, 'SN', 27, 513),
(6, 3, 'BANANE GROS MICHEL', '2020-01-22 09:50:34', 10, 0.17, 1.7, 'CrÃ©dit', 31, 'SN', 1.7, 2.2204460492503e-16),
(8, 3, 'TOMATES FRAICHE', '2020-01-22 10:07:43', 42, 0.17, 7.14, 'CrÃ©dit', 38, 'SN', 7.14, 8.8817841970013e-16);

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE IF NOT EXISTS `devise` (
  `idDevise` int(11) NOT NULL AUTO_INCREMENT,
  `devise` varchar(30) NOT NULL,
  `taux` double NOT NULL,
  PRIMARY KEY (`idDevise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `devise`
--

INSERT INTO `devise` (`idDevise`, `devise`, `taux`) VALUES
(1, 'CDF', 1700),
(2, 'FBU', 2300);

-- --------------------------------------------------------

--
-- Structure de la table `diverscuisine`
--

CREATE TABLE IF NOT EXISTS `diverscuisine` (
  `idDivCuis` smallint(3) NOT NULL AUTO_INCREMENT,
  `designDivCuis` varchar(100) NOT NULL,
  `qteDivCuis` double NOT NULL,
  `prixDivCuis` double NOT NULL,
  `unite` varchar(20) NOT NULL,
  PRIMARY KEY (`idDivCuis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `diverscuisine`
--

INSERT INTO `diverscuisine` (`idDivCuis`, `designDivCuis`, `qteDivCuis`, `prixDivCuis`, `unite`) VALUES
(1, 'EPINARD', 0, 0, ''),
(2, 'SOMBE', 0, 0, ''),
(3, 'LENGA LENGA', 0, 0, ''),
(4, 'CHOUX', 0, 0, ''),
(6, 'CHOUX FLEUR', 0, 0, ''),
(7, 'BOEUR SALE', 1, 0, ''),
(8, 'BOEUR NON SALE', 1, 0, ''),
(9, 'CELERIS', 0, 0, ''),
(10, 'PIMENT', 0, 0, ''),
(11, 'PASTEQUES', 0, 0, ''),
(12, 'ANANAS', 0, 0, ''),
(13, 'MANGUES', 0, 0, ''),
(15, 'ORANGE', 2, 0, ''),
(16, 'PAPAYE', 0, 0, ''),
(17, 'MARACUJA', 0, 0, ''),
(19, 'MANDARINE', 0, 0, ''),
(20, 'SEL RAYCO', 2, 0, ''),
(21, 'POUDRE COCONUT MILK', 3, 0, ''),
(22, 'CONFITURE DE FRAISE', 3, 0, ''),
(23, 'KING OF PASTA', 4, 0, ''),
(25, 'LEVURE', 0, 0, ''),
(26, 'PAKMAYA', 1, 0, ''),
(27, 'SEL DE CUISINE', 5, 0, ''),
(29, 'THON', 1, 0, ''),
(30, 'SWEET CORN', 2, 0, ''),
(32, 'PATRICA', 0, 0, ''),
(33, 'MASALA BEEF', 0, 0, ''),
(34, 'LAIT DE COCO', 0, 0, ''),
(35, 'CHAPELIR', 0, 0, ''),
(36, 'MAIZENA', 0, 0, ''),
(37, 'MOUSCADA', 0, 0, ''),
(38, 'BASILIC', 0, 0, ''),
(39, 'SEZANE', 0, 0, ''),
(40, 'ORIGAN', 0, 0, ''),
(41, 'PICLE BROCHETTE', 0, 0, ''),
(44, 'FEUILLE DE L''ORIENT', 0, 0, ''),
(45, 'THY', 0, 0, ''),
(46, 'AIL', 0, 0, ''),
(47, 'VINAIGRETTE', 0, 0, ''),
(50, 'POIVRE BLANC', 0, 0, ''),
(51, 'MIEL', 5, 0, ''),
(52, 'THE VERT', 2, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `entreebanque`
--

CREATE TABLE IF NOT EXISTS `entreebanque` (
  `idEntreeBanque` int(11) NOT NULL AUTO_INCREMENT,
  `montantEntreeBanque` double NOT NULL,
  `motifEntreeBanque` varchar(255) NOT NULL,
  `dateEntreeBanque` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doc` varchar(255) NOT NULL,
  PRIMARY KEY (`idEntreeBanque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `entreecaisse`
--

CREATE TABLE IF NOT EXISTS `entreecaisse` (
  `idEntreeCaiss` int(11) NOT NULL AUTO_INCREMENT,
  `montantEntree` double NOT NULL,
  `motifEntree` varchar(255) NOT NULL,
  `dateEntree` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEntreeCaiss`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `entreecaisse`
--

INSERT INTO `entreecaisse` (`idEntreeCaiss`, `montantEntree`, `motifEntree`, `dateEntree`) VALUES
(1, 287.94, 'Report du 19/01/2020', '2020-01-20 19:12:17'),
(2, 136.5, 'Vers recept 19/01/2020', '2020-01-20 19:13:59'),
(3, 200, 'ReÃ§u de la banque', '2020-01-20 19:14:38'),
(4, 36, 'vÃ©rs rÃ©cep du 20/01/2020', '2020-01-21 08:34:57'),
(5, 3000, 'RÃ©Ã§u de la Banque', '2020-01-21 16:07:12'),
(6, 653, 'Ver rÃ©cpt du 21/01/2020', '2020-01-22 08:28:40'),
(7, 211.5, 'VÃ©rs rÃ©cep du 22/01/2020', '2020-01-23 09:22:17'),
(8, 689.5, 'vers recept du 23/01/2020', '2020-01-24 06:49:25');

-- --------------------------------------------------------

--
-- Structure de la table `etatbesoin`
--

CREATE TABLE IF NOT EXISTS `etatbesoin` (
  `idEtat` int(11) NOT NULL AUTO_INCREMENT,
  `article` varchar(150) NOT NULL,
  `qte` double NOT NULL,
  `pu` double NOT NULL,
  `pt` double NOT NULL,
  `stock` double NOT NULL,
  `dateDemande` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `etat` varchar(50) NOT NULL,
  PRIMARY KEY (`idEtat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Contenu de la table `etatbesoin`
--

INSERT INTO `etatbesoin` (`idEtat`, `article`, `qte`, `pu`, `pt`, `stock`, `dateDemande`, `etat`) VALUES
(9, 'SAUSSISSON', 3, 5.29, 15.87, 1.6, '2020-01-23 14:41:59', 'validÃ©'),
(10, 'POULLET', 5, 10.7, 53.5, 0.75, '2020-01-23 14:42:06', 'validÃ©'),
(11, 'POULLET', 5, 5, 25, 0.75, '2020-01-23 14:42:10', 'validÃ©'),
(12, 'TILAPIA 1000g', 3, 8.11, 24.33, 0, '2020-01-23 14:42:19', 'validÃ©'),
(13, 'KUHE 1000g', 3, 8.7, 26.1, 2, '2020-01-18 12:25:12', 'encours'),
(14, 'PASTEQUES', 2, 4.11, 8.22, 7, '2020-01-18 12:25:12', 'encours'),
(15, 'PASTEQUES', 2, 4.11, 8.22, 7, '2020-01-18 12:25:12', 'encours'),
(16, 'AVOCAT', 6, 0.41, 2.46, 14, '2020-01-18 12:25:12', 'encours'),
(17, 'ANANAS', 8, 0.9, 7.2, 4, '2020-01-18 12:25:12', 'encours'),
(18, 'MANGUE', 4, 0.58, 2.32, 0, '2020-01-18 12:25:12', 'encours'),
(19, 'LENGALENGA', 4, 0.58, 2.32, 0, '2020-01-18 12:25:12', 'encours'),
(20, 'SOMBE', 5, 0.58, 2.9, 0, '2020-01-18 12:25:12', 'encours'),
(21, 'EAU KINJU 0.6L', 10, 3.52, 35.2, 0, '2020-01-18 12:25:12', 'encours'),
(22, 'TRANSPORT', 1, 10, 10, 1, '2020-01-18 12:25:12', 'encours'),
(23, 'FILET DE BOEUF', 5, 5.89, 29.45, 3, '2020-01-20 06:32:18', 'encours'),
(24, 'JAMBON DE BOEUF', 3, 5, 15, 0, '2020-01-20 06:32:18', 'encours'),
(25, 'HUILE DE COUSINE COOKIE', 1, 25, 25, 10, '2020-01-20 06:32:18', 'encours'),
(26, 'CAFE DU BURUNDI', 3, 5.5, 16.5, 0, '2020-01-20 06:32:18', 'encours'),
(27, 'CITRONS', 50, 0.23, 11.5, 3.4, '2020-01-20 06:32:18', 'encours'),
(28, 'BANANE GROS MICHEL', 10, 0.17, 1.7, 10, '2020-01-20 06:32:18', 'encours'),
(29, 'OEUFS', 2, 3.82, 7.64, 3, '2020-01-20 06:32:18', 'encours'),
(30, 'SAVON ARIF', 1, 20, 20, 11, '2020-01-20 06:32:18', 'encours'),
(31, 'AVOCAT', 7, 0.41, 2.87, 14, '2020-01-20 06:32:18', 'encours'),
(32, 'ORANGE', 10, 0.35, 3.5, 10, '2020-01-20 06:32:18', 'encours'),
(33, 'MANGUE', 8, 0.58, 4.64, 0, '2020-01-20 06:32:18', 'encours'),
(34, 'PAPIER SERVIETTES', 10, 1.6, 16, 7, '2020-01-20 06:32:18', 'encours'),
(35, 'BLUE BAND', 2, 6, 12, 0, '2020-01-20 06:32:18', 'encours'),
(36, 'BANAME PLANTAIN', 15, 1.17, 17.55, 1.7, '2020-01-20 06:32:18', 'encours'),
(37, 'SAVONS MULTI USAGE', 1, 8, 8, 0, '2020-01-20 06:32:18', 'encours'),
(38, 'POUDRE A LESSIVE', 1, 20, 20, 0, '2020-01-20 06:32:18', 'encours'),
(40, 'TRANSPORT BUJA', 1, 15, 15, 1, '2020-01-20 06:32:18', 'encours'),
(43, 'TRANSPORT MULONGWE', 1, 4, 4, 1, '2020-01-20 06:32:18', 'encours'),
(44, 'TORCHONS', 10, 1.07, 10.7, 0, '2020-01-20 06:32:18', 'encours'),
(45, 'PAPIER SERVITTES VITRE', 1, 6, 6, 0, '2020-01-20 06:32:18', 'encours'),
(46, 'BROSS A TOILE D''AREIGNET', 4, 5, 20, 0, '2020-01-20 06:32:18', 'encours'),
(47, 'AMSTEL BEER', 1, 10.29, 10.29, 1, '2020-01-23 14:42:54', 'validÃ©'),
(48, 'SUCRES GF', 1, 10.76, 10.76, 0, '2020-01-23 14:42:41', 'validÃ©'),
(49, 'VIANDE HACHEE', 3, 9, 27, 0, '2020-01-22 10:13:43', 'wait'),
(50, 'CAFE DU BURUNDI', 2, 5.5, 11, 2, '2020-01-22 10:14:41', 'wait'),
(51, 'MOUTARD', 4, 5.29, 21.16, 0, '2020-01-22 10:18:09', 'wait'),
(52, 'LECTUS', 6, 3.52, 21.12, 0, '2020-01-22 10:30:00', 'wait'),
(53, 'SELERIS', 2, 2.35, 4.7, 0, '2020-01-22 10:30:43', 'wait'),
(54, 'PERSILES', 2, 2.35, 4.7, 0, '2020-01-22 10:31:31', 'wait'),
(55, 'PUMENTS', 1, 3.57, 3.57, 0, '2020-01-22 10:32:50', 'wait'),
(56, 'COURGETTE', 6, 1.5, 9, 0, '2020-01-22 10:34:41', 'wait'),
(57, 'AUBERGINE', 6, 0.5, 3, 0.8, '2020-01-22 10:36:25', 'wait'),
(58, 'POIRREAUX', 1, 3, 3, 0, '2020-01-22 10:37:38', 'wait'),
(59, 'POIVRONS', 4, 3.03, 12.12, 0.5, '2020-01-22 10:38:36', 'wait'),
(60, 'HARICOT VERT', 2, 4, 8, 0, '2020-01-22 10:39:12', 'wait'),
(61, 'HARICOT BLANC', 4, 4, 16, 0, '2020-01-22 10:39:39', 'wait'),
(62, 'MASALA BEEF', 1, 3, 3, 1, '2020-01-22 10:40:30', 'wait'),
(63, 'MASALA FISH', 2, 3, 6, 0, '2020-01-22 10:40:53', 'wait'),
(64, 'MASALA CHIKEN', 2, 3, 6, 0, '2020-01-22 10:41:19', 'wait'),
(65, 'PAPRICA', 1, 5, 5, 0, '2020-01-22 10:41:44', 'wait'),
(66, 'PETIT POIDS', 4, 4, 16, 1, '2020-01-22 10:42:21', 'wait'),
(68, 'SOMBE', 4, 1.47, 5.88, 0, '2020-01-22 10:44:29', 'wait'),
(69, 'LENGALENGA', 4, 1.47, 5.88, 0, '2020-01-22 10:44:50', 'wait'),
(70, 'EAU DE JAVEL', 1, 7.85, 7.85, 0, '2020-01-22 10:45:51', 'wait'),
(71, 'CREAM A RECURER', 2, 4.28, 8.56, 0, '2020-01-22 10:46:45', 'wait'),
(72, 'PAPIER HYGIENIENIQUE', 2, 7.35, 14.7, 15, '2020-01-22 10:47:54', 'wait'),
(73, 'KETCHUP', 2, 3.57, 7.14, 0, '2020-01-22 10:48:34', 'wait'),
(74, 'MAYONAISE', 3, 4, 12, 2, '2020-01-22 10:49:12', 'wait'),
(75, 'FROMAGE', 2, 5.9, 11.8, 0, '2020-01-22 10:49:58', 'wait'),
(76, 'CUBE MAGI', 3, 3.21, 9.63, 0, '2020-01-22 10:50:50', 'wait'),
(77, 'PASTEQUES', 2, 4.11, 8.22, 7, '2020-01-22 11:01:37', 'wait'),
(78, 'SAVON LIAUIDE DE VAISSELLE', 1, 8, 8, 5, '2020-01-22 11:03:24', 'wait'),
(79, 'DONGO DONGO', 2, 2, 4, 0, '2020-01-22 11:07:45', 'wait'),
(80, 'EPINARDS', 3, 2.5, 7.5, 0, '2020-01-22 11:08:06', 'wait'),
(81, 'PAPIER FILM', 1, 14.42, 14.42, 0, '2020-01-22 11:09:47', 'wait'),
(82, 'PAPIER ALUMINIUM', 1, 14.42, 14.42, 1, '2020-01-22 11:10:08', 'wait'),
(84, 'FILLET DE CAPITAINE', 3, 8.21, 24.63, 8, '2020-01-22 11:14:11', 'wait'),
(85, 'FARINE DE FROMENT', 1, 19.5, 19.5, 4, '2020-01-22 11:14:43', 'wait'),
(86, 'TRANSPORT BUJA', 1, 17.5, 17.5, 1, '2020-01-22 11:15:52', 'wait'),
(87, 'TRANSPORT MULONGWE', 1, 4, 4, 1, '2020-01-22 11:16:15', 'wait'),
(88, 'TAKE AWAY', 30, 1.7, 51, 15, '2020-01-22 11:20:39', 'wait'),
(89, 'CHOUX', 2, 1.07, 2.14, 0, '2020-01-22 11:25:27', 'wait');

-- --------------------------------------------------------

--
-- Structure de la table `facturation`
--

CREATE TABLE IF NOT EXISTS `facturation` (
  `idFact` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `designActivite` varchar(100) NOT NULL,
  `dateFact` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `qteFact` int(11) NOT NULL,
  `puFact` double NOT NULL,
  `ptFact` double NOT NULL,
  `modePaieFact` varchar(20) NOT NULL,
  `idOperation` int(11) NOT NULL,
  `diffIndex` varchar(10) NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  `type` varchar(30) NOT NULL,
  `montantPaye` double NOT NULL,
  `etatFact` varchar(10) NOT NULL,
  PRIMARY KEY (`idFact`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=236 ;

--
-- Contenu de la table `facturation`
--

INSERT INTO `facturation` (`idFact`, `id_client`, `designActivite`, `dateFact`, `qteFact`, `puFact`, `ptFact`, `modePaieFact`, `idOperation`, `diffIndex`, `accompte`, `reste`, `type`, `montantPaye`, `etatFact`) VALUES
(1, 1, 'Logement (2020-01-02 2020-01-03)', '2020-01-02 15:02:49', 1, 100, 60, 'CrÃ©dit', 1, 'BO', 0, 60, '', 0, ''),
(2, 2, 'Logement (2020-01-04 2020-01-06)', '2020-01-04 14:55:39', 2, 100, 140, 'CrÃ©dit', 2, 'BO', 0, 140, '', 0, ''),
(3, 3, 'Restauration (04-01-2020)', '2020-01-04 22:18:18', 2, 3.5, 3.5, 'CrÃ©dit', 1, 'RE', 3.5, 0, 'EspÃ¨ces', 0, 'close'),
(4, 3, 'Restauration (04-01-2020)', '2020-01-04 22:32:57', 7, 5, 11, 'Cash', 7, 'RE', 11, 0, 'EspÃ¨ces', 0, 'close'),
(5, 3, 'Restauration (04-01-2020)', '2020-01-04 22:38:03', 3, 6, 6, 'Cash', 5, 'RE', 6, 0, 'EspÃ¨ces', 0, 'close'),
(6, 3, 'Restauration (04-01-2020)', '2020-01-04 22:45:31', 3, 9, 9, 'Cash', 10, 'RE', 9, 0, 'EspÃ¨ces', 0, 'close'),
(7, 3, 'Restauration (04-01-2020)', '2020-01-04 22:47:05', 4, 7.5, 10.5, 'CrÃ©dit', 3, 'RE', 10.5, 0, 'EspÃ¨ces', 0, 'close'),
(8, 2, 'Restauration (04-01-2020)', '2020-01-04 22:04:11', 1, 3, 3, 'CrÃ©dit', 6, 'RE', 0, 3, 'CrÃ©dit', 0, ''),
(9, 4, 'Restauration (04-01-2020)', '2020-01-04 23:08:25', 1, 1.5, 1.5, 'CrÃ©dit', 16, 'RE', 0, 1.5, 'CrÃ©dit', 0, 'wait'),
(10, 5, 'Restauration (04-01-2020)', '2020-01-04 23:21:08', 3, 6, 10.5, 'CrÃ©dit', 17, 'RE', 0, 10.5, 'CrÃ©dit', 0, 'wait'),
(11, 6, 'Restauration (04-01-2020)', '2020-01-04 23:22:20', 1, 2, 2, 'CrÃ©dit', 19, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(12, 7, 'Restauration (04-01-2020)', '2020-01-04 23:23:35', 1, 3, 3, 'CrÃ©dit', 20, 'RE', 0, 3, 'CrÃ©dit', 0, 'wait'),
(13, 8, 'Restauration (05-01-2020)', '2020-01-05 06:21:14', 9, 1.5, 13.5, 'CrÃ©dit', 21, 'RE', 0, 13.5, 'CrÃ©dit', 0, 'wait'),
(14, 9, 'Logement (2020-01-05 2020-01-06)', '2020-01-05 08:39:39', 1, 100, 60, 'CrÃ©dit', 3, 'BO', 0, 60, '', 0, ''),
(15, 10, 'Logement (2020-01-05 2020-01-07)', '2020-01-05 12:01:07', 2, 100, 110, 'CrÃ©dit', 4, 'BO', 0, 110, '', 0, ''),
(16, 3, 'Restauration (05-01-2020)', '2020-01-05 18:38:05', 5, 1.5, 7.5, 'CrÃ©dit', 24, 'RE', 7.5, 0, 'EspÃ¨ces', 0, 'close'),
(17, 3, 'Restauration (05-01-2020)', '2020-01-05 18:38:59', 2, 3.5, 3.5, 'CrÃ©dit', 22, 'RE', 3.5, 0, 'EspÃ¨ces', 0, 'close'),
(18, 3, 'Restauration (05-01-2020)', '2020-01-05 19:17:03', 2, 2, 4, 'CrÃ©dit', 25, 'RE', 0, 4, '', 0, ''),
(19, 3, 'Restauration (05-01-2020)', '2020-01-05 19:27:57', 2, 2, 4, 'Cash', 26, 'RE', 4, 0, 'EspÃ¨ces', 0, 'close'),
(20, 3, 'Restauration (05-01-2020)', '2020-01-05 19:46:42', 8, 4.5, 13.5, 'CrÃ©dit', 27, 'RE', 13.5, 0, 'EspÃ¨ces', 0, ''),
(24, 10, 'Restauration (05-01-2020)', '2020-01-05 20:13:47', 1, 1.5, 1.5, 'CrÃ©dit', 31, 'RE', 1.5, 0, 'CrÃ©dit', 0, ''),
(27, 3, 'Restauration (05-01-2020)', '2020-01-05 20:28:45', 1, 8, 8, 'Cash', 33, 'RE', 8, 0, 'EspÃ¨ces', 0, 'close'),
(28, 12, 'Logement (2020-01-09 2020-01-10)', '2020-01-09 11:20:21', 1, 100, 60, 'CrÃ©dit', 5, 'BO', 0, 60, 'CrÃ©dit', 0, ''),
(29, 14, 'Logement (2020-01-09 2020-01-10)', '2020-01-09 12:38:44', 1, 80, 65, 'Cash', 6, 'BO', 65, 0, 'EspÃ¨ces', 65, 'close'),
(30, 15, 'Logement (2020-01-09 2020-01-10)', '2020-01-09 14:32:09', 1, 100, 70, 'CrÃ©dit', 7, 'BO', 0, 70, 'CrÃ©dit', 0, ''),
(31, 16, 'Logement (2020-01-09 2020-01-10)', '2020-01-09 16:28:28', 1, 100, 80, 'CrÃ©dit', 8, 'BO', 0, 80, 'CrÃ©dit', 0, ''),
(32, 17, 'Logement (2020-01-09 2020-01-10)', '2020-01-09 16:37:30', 1, 80, 65, 'CrÃ©dit', 9, 'BO', 0, 65, 'CrÃ©dit', 0, ''),
(33, 18, 'Logement (2020-01-10 2020-01-14)', '2020-01-10 15:59:18', 3, 100, 195, 'CrÃ©dit', 10, 'BO', 0, 195, 'CrÃ©dit', 0, ''),
(34, 4, 'Restauration (11-01-2020)', '2020-01-11 20:16:07', 1, 2, 2, 'CrÃ©dit', 37, 'RE', 0, 2, 'CrÃ©dit', 0, ''),
(35, 6, 'Restauration (11-01-2020)', '2020-01-11 20:17:37', 1, 2, 2, 'CrÃ©dit', 39, 'RE', 0, 2, 'CrÃ©dit', 0, ''),
(36, 3, 'Restauration (11-01-2020)', '2020-01-11 20:54:09', 2, 6.5, 6.5, 'Cash', 54, 'RE', 6.5, 0, 'EspÃ¨ces', 6.5, 'close'),
(37, 18, 'Restauration (11-01-2020)', '2020-01-11 20:57:33', 5, 7, 13, 'CrÃ©dit', 55, 'RE', 0, 13, 'CrÃ©dit', 0, ''),
(38, 3, 'Restauration (11-01-2020)', '2020-01-11 20:59:55', 4, 5.5, 7.5, 'Cash', 52, 'RE', 7.5, 0, 'EspÃ¨ces', 7.5, 'close'),
(39, 3, 'Restauration (11-01-2020)', '2020-01-11 21:00:58', 2, 10, 20, 'Cash', 51, 'RE', 20, 0, 'EspÃ¨ces', 20, 'close'),
(40, 3, 'Restauration (11-01-2020)', '2020-01-11 21:02:07', 3, 46, 46, 'Cash', 48, 'RE', 46, 0, 'EspÃ¨ces', 46, 'close'),
(41, 3, 'Restauration (11-01-2020)', '2020-01-11 21:02:57', 7, 7.5, 13.5, 'Cash', 40, 'RE', 13.5, 0, 'EspÃ¨ces', 13.5, 'close'),
(42, 3, 'Restauration (11-01-2020)', '2020-01-11 21:04:02', 6, 21.5, 24.5, 'Cash', 44, 'RE', 24.5, 0, 'EspÃ¨ces', 24.5, 'close'),
(43, 18, 'Autres services (11-01-2020)', '2020-01-11 21:21:30', 1, 10, 10, 'CrÃ©dit', 1, 'SA', 0, 10, 'CrÃ©dit', 0, ''),
(44, 3, 'Autres services (11-01-2020)', '2020-01-11 21:22:57', 1, 8, 8, 'Cash', 2, 'SA', 8, 0, 'EspÃ¨ces', 8, 'close'),
(45, 3, 'Autres services (11-01-2020)', '2020-01-11 21:24:16', 1, 10, 10, 'Cash', 3, 'SA', 10, 0, 'EspÃ¨ces', 10, 'close'),
(46, 3, 'Restauration (11-01-2020)', '2020-01-11 22:27:53', 2, 1.5, 3, 'Cash', 60, 'RE', 3, 0, 'EspÃ¨ces', 3, 'close'),
(47, 5, 'Restauration (11-01-2020)', '2020-01-11 22:30:43', 1, 3, 3, 'CrÃ©dit', 61, 'RE', 0, 3, 'CrÃ©dit', 0, ''),
(48, 8, 'Restauration (11-01-2020)', '2020-01-11 22:33:04', 7, 1.5, 10.5, 'CrÃ©dit', 62, 'RE', 0, 10.5, 'CrÃ©dit', 0, 'wait'),
(49, 3, 'Restauration (12-01-2020)', '2020-01-12 13:31:01', 7, 10.5, 16.5, 'Cash', 65, 'RE', 16.5, 0, 'EspÃ¨ces', 16.5, 'close'),
(50, 3, 'Restauration (12-01-2020)', '2020-01-12 14:24:48', 2, 1.5, 3, 'Cash', 69, 'RE', 3, 0, 'EspÃ¨ces', 3, 'close'),
(51, 3, 'Autres services (12-01-2020)', '2020-01-12 14:36:56', 1, 10, 10, 'Cash', 4, 'SA', 10, 0, 'EspÃ¨ces', 10, 'close'),
(52, 19, 'Logement (2020-01-12 2020-01-13)', '2020-01-12 14:59:05', 1, 80, 70, 'CrÃ©dit', 11, 'BO', 0, 70, 'CrÃ©dit', 0, ''),
(53, 3, 'Restauration (12-01-2020)', '2020-01-12 16:31:16', 2, 3.5, 3.5, 'Cash', 76, 'RE', 3.5, 0, 'EspÃ¨ces', 3.5, 'close'),
(54, 3, 'Restauration (12-01-2020)', '2020-01-12 16:32:46', 1, 4, 4, 'Cash', 72, 'RE', 4, 0, 'EspÃ¨ces', 4, 'close'),
(55, 3, 'Autres services (12-01-2020)', '2020-01-12 16:33:27', 1, 10, 10, 'Cash', 5, 'SA', 10, 0, 'EspÃ¨ces', 10, 'close'),
(56, 3, 'Restauration (12-01-2020)', '2020-01-12 16:34:27', 3, 12, 14, 'Cash', 70, 'RE', 14, 0, 'EspÃ¨ces', 14, 'close'),
(57, 3, 'Restauration (12-01-2020)', '2020-01-12 16:46:06', 2, 7, 7, 'Cash', 78, 'RE', 7, 0, 'EspÃ¨ces', 7, 'close'),
(58, 18, 'Restauration (12-01-2020)', '2020-01-12 19:10:57', 4, 14, 17, 'Cash', 80, 'RE', 17, 0, 'Mobile money', 17, 'close'),
(59, 19, 'Restauration (12-01-2020)', '2020-01-12 19:13:00', 3, 17, 17, 'CrÃ©dit', 90, 'RE', 0, 17, 'CrÃ©dit', 0, ''),
(60, 5, 'Restauration (12-01-2020)', '2020-01-12 19:57:19', 4, 18, 18, 'CrÃ©dit', 97, 'RE', 0, 18, 'CrÃ©dit', 0, 'wait'),
(61, 3, 'Restauration (12-01-2020)', '2020-01-12 20:09:42', 8, 19, 21, 'Cash', 73, 'RE', 21, 0, 'EspÃ¨ces', 21, 'close'),
(62, 3, 'Restauration (12-01-2020)', '2020-01-12 20:12:56', 7, 28, 34, 'Cash', 82, 'RE', 34, 0, 'EspÃ¨ces', 34, 'close'),
(63, 8, 'Restauration (12-01-2020)', '2020-01-12 20:30:28', 3, 1.5, 3, 'CrÃ©dit', 103, 'RE', 0, 3, 'EspÃ¨ces', 0, 'wait'),
(64, 8, 'Restauration (12-01-2020)', '2020-01-12 20:31:48', 1, 7, 7, 'CrÃ©dit', 102, 'RE', 0, 7, 'CrÃ©dit', 0, 'wait'),
(65, 20, 'Restauration (12-01-2020)', '2020-01-12 20:52:37', 4, 8, 10, 'CrÃ©dit', 105, 'RE', 0, 10, 'CrÃ©dit', 0, 'wait'),
(66, 4, 'Restauration (12-01-2020)', '2020-01-12 22:11:03', 1, 2, 2, 'CrÃ©dit', 108, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(67, 3, 'Restauration (13-01-2020)', '2020-01-13 06:17:04', 4, 6.5, 8.5, 'Cash', 109, 'RE', 8.5, 0, 'EspÃ¨ces', 8.5, 'close'),
(68, 3, 'Restauration (13-01-2020)', '2020-01-13 09:53:58', 1, 2.5, 2.5, 'Cash', 112, 'RE', 2.5, 0, 'EspÃ¨ces', 2.5, 'close'),
(69, 8, 'Restauration (13-01-2020)', '2020-01-13 10:06:21', 1, 2, 2, 'CrÃ©dit', 113, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(70, 3, 'Restauration (13-01-2020)', '2020-01-13 12:24:32', 27, 51.5, 142.5, 'Cash', 114, 'RE', 142.5, 0, 'EspÃ¨ces', 142.5, 'close'),
(71, 8, 'Restauration (13-01-2020)', '2020-01-13 12:28:58', 4, 6.5, 13, 'CrÃ©dit', 120, 'RE', 0, 13, 'CrÃ©dit', 0, 'wait'),
(72, 8, 'Restauration (13-01-2020)', '2020-01-13 12:31:46', 6, 6.5, 19.5, 'CrÃ©dit', 119, 'RE', 0, 19.5, 'CrÃ©dit', 0, 'wait'),
(73, 21, 'Logement (2020-01-13 2020-01-15)', '2020-01-13 17:08:50', 2, 100, 120, 'CrÃ©dit', 12, 'BO', 0, 120, 'EspÃ¨ces', 0, 'wait'),
(74, 20, 'Restauration (13-01-2020)', '2020-01-13 18:59:42', 5, 5, 14, 'CrÃ©dit', 131, 'RE', 0, 14, 'CrÃ©dit', 0, 'wait'),
(75, 8, 'Restauration (13-01-2020)', '2020-01-13 19:20:41', 10, 1.5, 15, 'CrÃ©dit', 133, 'RE', 0, 15, 'CrÃ©dit', 0, 'wait'),
(76, 4, 'Restauration (14-01-2020)', '2020-01-14 09:10:02', 1, 2, 2, 'CrÃ©dit', 134, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(77, 3, 'Restauration (14-01-2020)', '2020-01-14 14:12:32', 3, 7.5, 7.5, 'Cash', 135, 'RE', 7.5, 0, 'EspÃ¨ces', 7.5, 'close'),
(78, 21, 'Restauration (14-01-2020)', '2020-01-14 18:22:27', 3, 19.5, 19.5, 'CrÃ©dit', 138, 'RE', 0, 19.5, 'EspÃ¨ces', 0, 'wait'),
(79, 3, 'Restauration (14-01-2020)', '2020-01-14 20:55:55', 8, 8.5, 17.5, 'Cash', 143, 'RE', 17.5, 0, 'EspÃ¨ces', 17.5, 'close'),
(80, 22, 'Restauration (14-01-2020)', '2020-01-14 21:49:45', 75, 23, 322.5, 'CrÃ©dit', 151, 'RE', 0, 322.5, 'CrÃ©dit', 0, 'wait'),
(81, 8, 'Restauration (15-01-2020)', '2020-01-15 08:47:54', 1, 4.5, 4.5, 'CrÃ©dit', 157, 'RE', 0, 4.5, 'CrÃ©dit', 0, 'wait'),
(82, 8, 'Restauration (15-01-2020)', '2020-01-15 08:50:22', 1, 2, 2, 'CrÃ©dit', 158, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(83, 3, 'Restauration (15-01-2020)', '2020-01-15 09:34:31', 3, 4, 6, 'Cash', 159, 'RE', 6, 0, 'EspÃ¨ces', 6, 'close'),
(84, 3, 'Restauration (15-01-2020)', '2020-01-15 11:41:20', 5, 5, 8.5, 'Cash', 166, 'RE', 8.5, 0, 'EspÃ¨ces', 8.5, 'close'),
(85, 26, 'Restauration (15-01-2020)', '2020-01-15 11:55:27', 2, 5, 5, 'CrÃ©dit', 165, 'RE', 0, 5, 'CrÃ©dit', 0, 'wait'),
(86, 3, 'Restauration (15-01-2020)', '2020-01-15 12:28:40', 14, 15.5, 49, 'Cash', 161, 'RE', 49, 0, 'EspÃ¨ces', 49, 'close'),
(87, 5, 'Restauration (15-01-2020)', '2020-01-15 18:46:38', 2, 2, 2, 'CrÃ©dit', 174, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(88, 27, 'Restauration (15-01-2020)', '2020-01-15 19:35:59', 6, 5, 14, 'CrÃ©dit', 176, 'RE', 0, 14, 'CrÃ©dit', 0, 'wait'),
(89, 3, 'Restauration (15-01-2020)', '2020-01-15 19:48:00', 2, 9, 9, 'Cash', 178, 'RE', 9, 0, 'EspÃ¨ces', 9, 'close'),
(90, 28, 'Logement (2020-01-16 2020-01-22)', '2020-01-16 14:43:42', 6, 100, 300, 'CrÃ©dit', 13, 'BO', 0, 300, '', 0, 'wait'),
(91, 29, 'Logement (2020-01-16 2020-01-22)', '2020-01-16 14:44:52', 6, 100, 300, 'CrÃ©dit', 14, 'BO', 0, 300, 'CrÃ©dit', 0, 'wait'),
(92, 3, 'Restauration (16-01-2020)', '2020-01-16 16:53:38', 2, 3.5, 3.5, 'Cash', 182, 'RE', 3.5, 0, 'EspÃ¨ces', 3.5, 'close'),
(93, 28, 'Restauration (16-01-2020)', '2020-01-16 18:16:38', 11, 16.5, 31, 'CrÃ©dit', 180, 'RE', 0, 31, '', 0, 'wait'),
(94, 3, 'Restauration (16-01-2020)', '2020-01-16 19:30:44', 8, 30.5, 33, 'Cash', 188, 'RE', 33, 0, 'EspÃ¨ces', 33, 'close'),
(95, 5, 'Restauration (16-01-2020)', '2020-01-16 20:05:16', 2, 1.5, 3, 'CrÃ©dit', 195, 'RE', 0, 3, 'CrÃ©dit', 0, 'wait'),
(96, 20, 'Restauration (16-01-2020)', '2020-01-16 20:06:09', 1, 2, 2, 'CrÃ©dit', 197, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(97, 4, 'Restauration (16-01-2020)', '2020-01-16 20:36:14', 1, 2, 2, 'CrÃ©dit', 198, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(98, 3, 'Restauration (17-01-2020)', '2020-01-17 13:02:36', 2, 1.5, 3, 'Cash', 203, 'RE', 3, 0, 'EspÃ¨ces', 3, 'close'),
(99, 8, 'Restauration (17-01-2020)', '2020-01-17 13:05:28', 10, 8, 16, 'CrÃ©dit', 199, 'RE', 0, 16, 'CrÃ©dit', 0, 'wait'),
(100, 3, 'Restauration (17-01-2020)', '2020-01-17 15:13:13', 4, 5, 7, 'Cash', 205, 'RE', 7, 0, 'EspÃ¨ces', 7, 'close'),
(101, 3, 'Restauration (17-01-2020)', '2020-01-17 18:09:27', 2, 2, 4, 'Cash', 216, 'RE', 4, 0, 'EspÃ¨ces', 4, 'close'),
(102, 4, 'Restauration (17-01-2020)', '2020-01-17 19:40:13', 1, 2, 2, 'CrÃ©dit', 225, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(103, 3, 'Restauration (17-01-2020)', '2020-01-17 19:53:54', 8, 17.5, 30, 'Cash', 226, 'RE', 30, 0, 'EspÃ¨ces', 30, 'close'),
(104, 3, 'Restauration (17-01-2020)', '2020-01-17 19:59:41', 11, 24.5, 42.5, 'Cash', 214, 'RE', 42.5, 0, 'EspÃ¨ces', 42.5, 'close'),
(105, 5, 'Restauration (17-01-2020)', '2020-01-17 20:04:38', 5, 16.5, 18, 'CrÃ©dit', 208, 'RE', 0, 18, 'CrÃ©dit', 0, 'wait'),
(106, 6, 'Restauration (18-01-2020)', '2020-01-18 07:44:58', 1, 2, 2, 'CrÃ©dit', 238, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(107, 30, 'Restauration (18-01-2020)', '2020-01-18 12:09:20', 9, 7, 22, 'CrÃ©dit', 247, 'RE', 0, 22, 'CrÃ©dit', 0, 'wait'),
(108, 8, 'Restauration (18-01-2020)', '2020-01-18 12:21:25', 8, 6.5, 13, 'CrÃ©dit', 243, 'RE', 0, 13, 'CrÃ©dit', 0, 'wait'),
(109, 8, 'Restauration (18-01-2020)', '2020-01-18 12:22:45', 8, 6.5, 13, 'CrÃ©dit', 239, 'RE', 0, 13, 'CrÃ©dit', 0, 'wait'),
(110, 3, 'Restauration (18-01-2020)', '2020-01-18 13:50:55', 4, 14.5, 14.5, 'Cash', 250, 'RE', 14.5, 0, 'EspÃ¨ces', 14.5, 'close'),
(111, 28, 'Restauration (18-01-2020)', '2020-01-18 15:26:44', 6, 10.5, 10.5, 'Cash', 254, 'RE', 10.5, 0, 'EspÃ¨ces', 10.5, 'close'),
(112, 3, 'Autres services (18-01-2020)', '2020-01-18 16:41:14', 1, 10, 10, 'Cash', 6, 'SA', 10, 0, 'EspÃ¨ces', 10, 'close'),
(113, 3, 'Restauration (18-01-2020)', '2020-01-18 17:37:37', 1, 2, 2, 'Cash', 276, 'RE', 2, 0, 'EspÃ¨ces', 2, 'close'),
(114, 3, 'Restauration (18-01-2020)', '2020-01-18 17:51:05', 15, 21, 38, 'Cash', 265, 'RE', 38, 0, 'EspÃ¨ces', 38, 'close'),
(115, 3, 'Restauration (18-01-2020)', '2020-01-18 18:22:42', 2, 7, 7, 'Cash', 279, 'RE', 7, 0, 'EspÃ¨ces', 7, 'close'),
(116, 28, 'Restauration (18-01-2020)', '2020-01-18 19:06:46', 4, 23.5, 25, 'Cash', 282, 'RE', 25, 0, 'EspÃ¨ces', 25, 'close'),
(117, 26, 'Restauration (18-01-2020)', '2020-01-18 19:17:00', 10, 43, 43, 'CrÃ©dit', 260, 'RE', 0, 43, 'CrÃ©dit', 0, 'wait'),
(118, 3, 'Restauration (18-01-2020)', '2020-01-18 19:18:36', 4, 5, 10, 'Cash', 288, 'RE', 10, 0, 'EspÃ¨ces', 10, 'close'),
(119, 28, 'Restauration (18-01-2020)', '2020-01-18 19:28:42', 4, 4, 8, 'CrÃ©dit', 291, 'RE', 0, 8, '', 0, 'wait'),
(120, 20, 'Restauration (18-01-2020)', '2020-01-18 20:13:32', 2, 2, 4, 'CrÃ©dit', 293, 'RE', 0, 4, 'CrÃ©dit', 0, 'wait'),
(121, 8, 'Restauration (18-01-2020)', '2020-01-18 20:16:54', 14, 3, 21, 'CrÃ©dit', 294, 'RE', 0, 21, 'CrÃ©dit', 0, 'wait'),
(122, 8, 'Restauration (19-01-2020)', '2020-01-19 10:36:16', 8, 6, 24, 'CrÃ©dit', 299, 'RE', 0, 24, 'CrÃ©dit', 0, 'wait'),
(123, 8, 'Restauration (19-01-2020)', '2020-01-19 10:39:29', 4, 2, 8, 'CrÃ©dit', 301, 'RE', 0, 8, 'CrÃ©dit', 0, 'wait'),
(124, 3, 'Restauration (19-01-2020)', '2020-01-19 10:43:25', 2, 6.5, 6.5, 'Cash', 297, 'RE', 6.5, 0, 'EspÃ¨ces', 6.5, 'close'),
(125, 3, 'Autres services (19-01-2020)', '2020-01-19 13:01:19', 1, 10, 10, 'Cash', 7, 'SA', 10, 0, 'EspÃ¨ces', 10, 'close'),
(126, 3, 'Restauration (19-01-2020)', '2020-01-19 13:15:09', 5, 22.5, 25, 'Cash', 302, 'RE', 25, 0, 'EspÃ¨ces', 25, 'close'),
(127, 3, 'Restauration (19-01-2020)', '2020-01-19 13:54:15', 3, 11.5, 11.5, 'Cash', 303, 'RE', 11.5, 0, 'EspÃ¨ces', 11.5, 'close'),
(128, 3, 'Restauration (19-01-2020)', '2020-01-19 14:30:48', 1, 2, 2, 'Cash', 317, 'RE', 2, 0, 'EspÃ¨ces', 2, 'close'),
(129, 23, 'Restauration (19-01-2020)', '2020-01-19 14:33:20', 1, 3, 3, 'CrÃ©dit', 318, 'RE', 0, 3, 'CrÃ©dit', 0, 'wait'),
(130, 3, 'Restauration (19-01-2020)', '2020-01-19 16:09:20', 11, 13, 23.5, 'Cash', 312, 'RE', 23.5, 0, 'EspÃ¨ces', 23.5, 'close'),
(131, 3, 'Restauration (19-01-2020)', '2020-01-19 16:54:41', 3, 4.5, 7, 'Cash', 308, 'RE', 7, 0, 'EspÃ¨ces', 7, 'close'),
(132, 3, 'Restauration (19-01-2020)', '2020-01-19 17:35:51', 10, 25, 27, 'Cash', 322, 'RE', 27, 0, 'EspÃ¨ces', 27, 'close'),
(133, 3, 'Restauration (19-01-2020)', '2020-01-19 18:00:43', 4, 7.5, 9, 'Cash', 328, 'RE', 9, 0, 'EspÃ¨ces', 9, 'close'),
(134, 24, 'Restauration (19-01-2020)', '2020-01-19 18:16:31', 1, 4, 4, 'CrÃ©dit', 337, 'RE', 0, 4, 'CrÃ©dit', 0, 'wait'),
(135, 20, 'Restauration (19-01-2020)', '2020-01-19 18:25:34', 1, 3, 3, 'CrÃ©dit', 339, 'RE', 0, 3, 'CrÃ©dit', 0, 'wait'),
(136, 24, 'Restauration (19-01-2020)', '2020-01-19 18:27:05', 1, 3, 3, 'CrÃ©dit', 340, 'RE', 0, 3, 'CrÃ©dit', 0, 'wait'),
(137, 3, 'Restauration (19-01-2020)', '2020-01-19 18:38:19', 5, 8.5, 15, 'Cash', 331, 'RE', 15, 0, 'EspÃ¨ces', 15, 'close'),
(138, 5, 'Restauration (19-01-2020)', '2020-01-19 19:54:38', 4, 22.5, 22.5, 'CrÃ©dit', 342, 'RE', 0, 22.5, 'CrÃ©dit', 0, 'wait'),
(139, 5, 'Restauration (19-01-2020)', '2020-01-19 19:55:28', 3, 9, 9, 'CrÃ©dit', 341, 'RE', 0, 9, 'CrÃ©dit', 0, 'wait'),
(140, 5, 'Restauration (19-01-2020)', '2020-01-19 19:56:04', 4, 2, 8, 'CrÃ©dit', 345, 'RE', 0, 8, 'CrÃ©dit', 0, 'wait'),
(142, 5, 'Restauration (19-01-2020)', '2020-01-19 19:59:42', 1, 0, 0, 'Cash', 346, 'RE', 0, 0, 'CrÃ©dit', 0, 'close'),
(143, 3, 'Restaurant Bar (20-01-2020)', '2020-01-20 07:14:35', 2, 6.5, 6.5, 'Cash', 348, 'RE', 6.5, 0, 'EspÃ¨ces', 6.5, 'close'),
(144, 8, 'Restaurant Bar (20-01-2020)', '2020-01-20 07:37:14', 6, 6.5, 19.5, 'CrÃ©dit', 350, 'RE', 0, 19.5, 'CrÃ©dit', 0, 'wait'),
(145, 33, 'Logement (2020-01-20 2020-01-25)', '2020-01-20 10:09:45', 5, 80, 350, 'CrÃ©dit', 16, 'BO', 0, 350, 'CrÃ©dit', 0, 'wait'),
(146, 6, 'Restaurant Bar (20-01-2020)', '2020-01-20 11:17:49', 1, 2, 2, 'CrÃ©dit', 352, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(147, 34, 'Logement (2020-01-20 2020-01-22)', '2020-01-20 14:34:53', 2, 100, 160, 'CrÃ©dit', 17, 'BO', 0, 160, '', 0, 'wait'),
(148, 35, 'Logement (2020-01-20 2020-01-24)', '2020-01-20 14:35:58', 4, 100, 320, 'CrÃ©dit', 18, 'BO', 0, 320, 'EspÃ¨ces', 0, 'wait'),
(149, 36, 'Logement (2020-01-20 2020-01-24)', '2020-01-20 14:36:58', 4, 100, 320, 'CrÃ©dit', 19, 'BO', 0, 320, 'EspÃ¨ces', 0, 'wait'),
(150, 34, 'Restaurant Bar (20-01-2020)', '2020-01-20 18:04:37', 4, 16, 16, 'CrÃ©dit', 361, 'RE', 0, 16, '', 0, 'wait'),
(151, 35, 'Restaurant Bar (20-01-2020)', '2020-01-20 18:15:07', 3, 10, 10, 'CrÃ©dit', 373, 'RE', 0, 10, 'EspÃ¨ces', 0, 'wait'),
(152, 36, 'Restaurant Bar (20-01-2020)', '2020-01-20 18:16:40', 4, 13.5, 13.5, 'CrÃ©dit', 368, 'RE', 0, 13.5, 'EspÃ¨ces', 0, 'wait'),
(153, 28, 'Restaurant Bar (20-01-2020)', '2020-01-20 18:26:50', 11, 30, 32, 'CrÃ©dit', 353, 'RE', 0, 32, '', 0, 'wait'),
(154, 33, 'Restaurant Bar (20-01-2020)', '2020-01-20 18:31:46', 1, 5, 5, 'CrÃ©dit', 357, 'RE', 0, 5, 'CrÃ©dit', 0, 'wait'),
(155, 5, 'Restaurant Bar (20-01-2020)', '2020-01-20 19:39:59', 5, 10.5, 12, 'CrÃ©dit', 380, 'RE', 0, 12, 'CrÃ©dit', 0, 'wait'),
(156, 20, 'Restaurant Bar (20-01-2020)', '2020-01-20 19:41:10', 2, 3, 6, 'CrÃ©dit', 379, 'RE', 0, 6, 'CrÃ©dit', 0, 'wait'),
(157, 8, 'Restaurant Bar (20-01-2020)', '2020-01-20 19:43:35', 1, 2, 2, 'CrÃ©dit', 378, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(158, 3, 'Restaurant Bar (20-01-2020)', '2020-01-20 20:42:57', 13, 4, 29.5, 'Cash', 384, 'RE', 29.5, 0, 'EspÃ¨ces', 29.5, 'close'),
(159, 8, 'Restaurant Bar (21-01-2020)', '2020-01-21 05:53:09', 13, 3, 19.5, 'CrÃ©dit', 386, 'RE', 0, 19.5, 'CrÃ©dit', 0, 'wait'),
(160, 8, 'Restaurant Bar (21-01-2020)', '2020-01-21 07:17:34', 2, 6.5, 6.5, 'CrÃ©dit', 391, 'RE', 0, 6.5, 'CrÃ©dit', 0, 'wait'),
(161, 8, 'Restaurant Bar (21-01-2020)', '2020-01-21 07:36:24', 2, 6.5, 6.5, 'CrÃ©dit', 393, 'RE', 0, 6.5, 'CrÃ©dit', 0, 'wait'),
(162, 8, 'Restaurant Bar (21-01-2020)', '2020-01-21 07:46:38', 4, 8.5, 13, 'CrÃ©dit', 388, 'RE', 0, 13, 'CrÃ©dit', 0, 'wait'),
(163, 3, 'Restaurant Bar (21-01-2020)', '2020-01-21 08:04:34', 2, 6.5, 6.5, 'Cash', 395, 'RE', 6.5, 0, 'EspÃ¨ces', 6.5, 'close'),
(164, 34, 'Restaurant Bar (21-01-2020)', '2020-01-21 08:26:31', 1, 1.5, 1.5, 'CrÃ©dit', 397, 'RE', 0, 1.5, '', 0, 'wait'),
(165, 35, 'Restaurant Bar (21-01-2020)', '2020-01-21 09:52:54', 2, 3.5, 3.5, 'CrÃ©dit', 398, 'RE', 0, 3.5, 'EspÃ¨ces', 0, 'wait'),
(166, 38, 'Logement (2020-01-21 2020-01-23)', '2020-01-21 10:27:05', 2, 100, 120, 'Cash', 20, 'BO', 0, 120, 'EspÃ¨ces', 0, 'close'),
(167, 37, 'Logement (2020-01-21 2020-01-23)', '2020-01-21 10:37:40', 2, 100, 120, 'Cash', 21, 'BO', 0, 120, 'EspÃ¨ces', 0, 'close'),
(168, 39, 'Logement (2020-01-21 2020-01-23)', '2020-01-21 10:51:28', 2, 100, 120, 'Cash', 22, 'BO', 0, 120, 'EspÃ¨ces', 0, 'close'),
(169, 6, 'Restaurant Bar (21-01-2020)', '2020-01-21 11:28:21', 2, 5, 5, 'CrÃ©dit', 411, 'RE', 0, 5, 'CrÃ©dit', 0, 'wait'),
(170, 39, 'Restaurant Bar (21-01-2020)', '2020-01-21 11:40:38', 4, 16.5, 16.5, 'Cash', 400, 'RE', 0, 16.5, 'EspÃ¨ces', 0, 'close'),
(171, 38, 'Restaurant Bar (21-01-2020)', '2020-01-21 11:41:38', 2, 4, 4, 'Cash', 406, 'RE', 0, 4, 'EspÃ¨ces', 0, 'close'),
(172, 37, 'Restaurant Bar (21-01-2020)', '2020-01-21 11:42:22', 2, 4, 4, 'Cash', 408, 'RE', 0, 4, 'EspÃ¨ces', 0, 'close'),
(173, 4, 'Restaurant Bar (21-01-2020)', '2020-01-21 12:02:06', 1, 2, 2, 'CrÃ©dit', 414, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(174, 8, 'Restaurant Bar (21-01-2020)', '2020-01-21 12:20:45', 9, 1.5, 13.5, 'CrÃ©dit', 416, 'RE', 0, 13.5, 'CrÃ©dit', 0, 'wait'),
(175, 8, 'Restaurant Bar (21-01-2020)', '2020-01-21 12:23:57', 1, 1.5, 1.5, 'CrÃ©dit', 417, 'RE', 0, 1.5, 'CrÃ©dit', 0, 'wait'),
(176, 23, 'Restaurant Bar (21-01-2020)', '2020-01-21 13:32:57', 1, 1.5, 1.5, 'CrÃ©dit', 421, 'RE', 0, 1.5, 'CrÃ©dit', 0, 'wait'),
(177, 34, 'Restaurant Bar (21-01-2020)', '2020-01-21 14:35:23', 5, 22, 22, 'CrÃ©dit', 418, 'RE', 0, 22, '', 0, 'wait'),
(178, 33, 'Restaurant Bar (21-01-2020)', '2020-01-21 15:15:27', 2, 30, 30, 'CrÃ©dit', 424, 'RE', 0, 30, 'CrÃ©dit', 0, 'wait'),
(179, 36, 'Restaurant Bar (21-01-2020)', '2020-01-21 16:20:00', 3, 9.5, 9.5, 'CrÃ©dit', 426, 'RE', 0, 9.5, 'EspÃ¨ces', 0, 'wait'),
(180, 3, 'Restaurant Bar (21-01-2020)', '2020-01-21 17:29:22', 3, 8.5, 8.5, 'Cash', 435, 'RE', 8.5, 0, 'EspÃ¨ces', 8.5, 'close'),
(181, 3, 'Restaurant Bar (21-01-2020)', '2020-01-21 17:40:04', 6, 26, 28, 'Cash', 429, 'RE', 28, 0, 'EspÃ¨ces', 28, 'close'),
(182, 37, 'Restaurant Bar (21-01-2020)', '2020-01-21 17:52:38', 1, 3, 3, 'Cash', 440, 'RE', 0, 3, 'EspÃ¨ces', 0, 'close'),
(183, 38, 'Restaurant Bar (21-01-2020)', '2020-01-21 17:53:51', 2, 15, 15, 'Cash', 433, 'RE', 0, 15, 'EspÃ¨ces', 0, 'close'),
(184, 8, 'Restaurant Bar (21-01-2020)', '2020-01-21 18:13:17', 11, 1.5, 16.5, 'CrÃ©dit', 443, 'RE', 0, 16.5, 'CrÃ©dit', 0, 'wait'),
(185, 35, 'Restaurant Bar (21-01-2020)', '2020-01-21 18:29:33', 2, 6, 6, 'CrÃ©dit', 445, 'RE', 0, 6, 'EspÃ¨ces', 0, 'wait'),
(186, 39, 'Restaurant Bar (21-01-2020)', '2020-01-21 18:56:35', 3, 5.5, 5.5, 'Cash', 441, 'RE', 0, 5.5, 'EspÃ¨ces', 0, 'close'),
(187, 5, 'Restaurant Bar (21-01-2020)', '2020-01-21 19:28:59', 2, 9, 9, 'CrÃ©dit', 448, 'RE', 0, 9, 'CrÃ©dit', 0, 'wait'),
(188, 3, 'Restaurant Bar (21-01-2020)', '2020-01-21 20:20:34', 5, 6, 10, 'Cash', 450, 'RE', 10, 0, 'EspÃ¨ces', 10, 'close'),
(189, 28, 'Logement (2020-01-22 2020-01-24)', '2020-01-22 09:46:54', 2, 100, 100, 'CrÃ©dit', 23, 'BO', 0, 100, 'CrÃ©dit', 0, 'wait'),
(190, 40, 'Logement (2020-01-22 2020-01-23)', '2020-01-22 09:52:49', 1, 100, 60, 'CrÃ©dit', 24, 'BO', 0, 60, 'EspÃ¨ces', 0, 'wait'),
(191, 34, 'Logement (2020-01-22 2020-01-23)', '2020-01-22 16:46:47', 1, 80, 80, 'CrÃ©dit', 25, 'BO', 0, 80, '', 0, 'wait'),
(192, 28, 'Restaurant Bar (22-01-2020)', '2020-01-22 18:21:09', 2, 7, 7, 'Cash', 460, 'RE', 7, 0, 'EspÃ¨ces', 7, 'close'),
(193, 3, 'Restaurant Bar (22-01-2020)', '2020-01-22 19:23:53', 4, 5, 5, 'Cash', 478, 'RE', 5, 0, 'EspÃ¨ces', 5, 'close'),
(194, 37, 'Restaurant Bar (22-01-2020)', '2020-01-22 19:47:34', 3, 23, 23, 'Cash', 488, 'RE', 0, 23, 'EspÃ¨ces', 0, 'close'),
(195, 35, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:04:52', 4, 15, 15, 'CrÃ©dit', 471, 'RE', 0, 15, 'EspÃ¨ces', 0, 'wait'),
(196, 40, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:24:18', 3, 15.5, 15.5, 'CrÃ©dit', 459, 'RE', 0, 15.5, 'EspÃ¨ces', 0, 'wait'),
(197, 33, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:26:05', 6, 18, 21, 'CrÃ©dit', 464, 'RE', 0, 21, 'CrÃ©dit', 0, 'wait'),
(198, 39, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:27:52', 3, 11, 11, 'Cash', 474, 'RE', 0, 11, 'EspÃ¨ces', 0, 'close'),
(199, 36, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:29:31', 5, 15.5, 15.5, 'CrÃ©dit', 470, 'RE', 0, 15.5, 'EspÃ¨ces', 0, 'wait'),
(200, 8, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:30:46', 18, 1.5, 27, 'CrÃ©dit', 490, 'RE', 0, 27, 'CrÃ©dit', 0, 'wait'),
(201, 5, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:31:46', 5, 11.5, 13, 'CrÃ©dit', 461, 'RE', 0, 13, 'CrÃ©dit', 0, 'wait'),
(202, 34, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:56:28', 3, 8.5, 8.5, 'CrÃ©dit', 498, 'RE', 0, 8.5, '', 0, 'wait'),
(203, 8, 'Restaurant Bar (22-01-2020)', '2020-01-22 20:58:14', 18, 12.5, 58.5, 'CrÃ©dit', 454, 'RE', 0, 58.5, 'CrÃ©dit', 0, 'wait'),
(204, 25, 'Restaurant Bar (23-01-2020)', '2020-01-23 07:04:45', 1, 3, 3, 'CrÃ©dit', 502, 'RE', 0, 3, 'CrÃ©dit', 0, 'wait'),
(205, 8, 'Restaurant Bar (23-01-2020)', '2020-01-23 07:37:38', 9, 4.5, 40.5, 'CrÃ©dit', 503, 'RE', 0, 40.5, 'CrÃ©dit', 0, 'wait'),
(206, 8, 'Restaurant Bar (23-01-2020)', '2020-01-23 07:41:03', 9, 2, 18, 'CrÃ©dit', 504, 'RE', 0, 18, 'CrÃ©dit', 0, 'wait'),
(207, 41, 'Restaurant Bar (23-01-2020)', '2020-01-23 08:01:34', 4, 4.5, 9, 'CrÃ©dit', 507, 'RE', 0, 9, 'CrÃ©dit', 0, 'wait'),
(208, 6, 'Restaurant Bar (23-01-2020)', '2020-01-23 08:04:04', 1, 2, 2, 'CrÃ©dit', 509, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(209, 8, 'Restaurant Bar (23-01-2020)', '2020-01-23 11:26:26', 2, 6.5, 6.5, 'CrÃ©dit', 513, 'RE', 0, 6.5, 'CrÃ©dit', 0, 'wait'),
(210, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 13:49:44', 1, 2, 2, 'Cash', 520, 'RE', 2, 0, 'EspÃ¨ces', 2, 'close'),
(211, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 14:16:22', 3, 9, 9, 'Cash', 516, 'RE', 9, 0, 'EspÃ¨ces', 9, 'close'),
(212, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 14:53:26', 2, 10, 20, 'Cash', 512, 'RE', 20, 0, 'EspÃ¨ces', 20, 'close'),
(213, 43, 'Logement (2020-01-23 2020-01-27)', '2020-01-23 14:55:56', 4, 100, 240, 'CrÃ©dit', 26, 'BO', 0, 240, 'CrÃ©dit', 0, 'wait'),
(214, 44, 'Logement (2020-01-23 2020-01-27)', '2020-01-23 14:57:04', 4, 100, 240, 'CrÃ©dit', 27, 'BO', 0, 240, 'CrÃ©dit', 0, 'wait'),
(215, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 15:02:43', 1, 2, 2, 'Cash', 523, 'RE', 2, 0, 'EspÃ¨ces', 2, 'close'),
(216, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 15:07:21', 2, 2, 4, 'Cash', 522, 'RE', 4, 0, 'EspÃ¨ces', 4, 'close'),
(217, 3, 'Autres services (23-01-2020)', '2020-01-23 16:01:12', 1, 15, 15, 'CrÃ©dit', 8, 'SA', 0, 15, 'EspÃ¨ces', 0, 'wait'),
(218, 3, 'Autres services (23-01-2020)', '2020-01-23 16:03:34', 1, 5, 5, 'CrÃ©dit', 9, 'SA', 0, 5, 'EspÃ¨ces', 0, 'wait'),
(219, 5, 'Restaurant Bar (23-01-2020)', '2020-01-23 16:38:56', 5, 8.5, 10, 'CrÃ©dit', 531, 'RE', 0, 10, 'CrÃ©dit', 0, 'wait'),
(220, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 16:59:10', 2, 2, 4, 'Cash', 530, 'RE', 4, 0, 'EspÃ¨ces', 4, 'close'),
(221, 45, 'Restaurant Bar (23-01-2020)', '2020-01-23 17:05:41', 26, 5, 65, 'CrÃ©dit', 535, 'RE', 0, 65, 'CrÃ©dit', 0, 'wait'),
(222, 3, 'Autres services (23-01-2020)', '2020-01-23 17:07:38', 1, 10, 10, 'Cash', 10, 'SA', 10, 0, 'EspÃ¨ces', 10, 'close'),
(223, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 17:26:43', 8, 14, 21.5, 'Cash', 528, 'RE', 21.5, 0, 'EspÃ¨ces', 21.5, 'close'),
(224, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 18:08:56', 3, 9, 9, 'Cash', 525, 'RE', 9, 0, 'EspÃ¨ces', 9, 'close'),
(225, 3, 'Restaurant Bar (23-01-2020)', '2020-01-23 18:10:07', 1, 2, 2, 'Cash', 521, 'RE', 2, 0, 'EspÃ¨ces', 2, 'close'),
(226, 36, 'Restaurant Bar (23-01-2020)', '2020-01-23 19:05:51', 2, 9, 9, 'CrÃ©dit', 542, 'RE', 0, 9, 'EspÃ¨ces', 0, 'wait'),
(227, 35, 'Restaurant Bar (23-01-2020)', '2020-01-23 19:08:18', 1, 3, 3, 'CrÃ©dit', 550, 'RE', 0, 3, 'EspÃ¨ces', 0, 'wait'),
(228, 33, 'Restaurant Bar (23-01-2020)', '2020-01-23 19:36:01', 7, 25, 28, 'CrÃ©dit', 546, 'RE', 0, 28, 'CrÃ©dit', 0, 'wait'),
(229, 24, 'Restaurant Bar (23-01-2020)', '2020-01-23 19:57:22', 1, 2, 2, 'CrÃ©dit', 553, 'RE', 0, 2, 'CrÃ©dit', 0, 'wait'),
(230, 5, 'Restaurant Bar (23-01-2020)', '2020-01-23 20:12:09', 6, 12.5, 14.5, 'CrÃ©dit', 554, 'RE', 0, 14.5, 'CrÃ©dit', 0, 'wait'),
(231, 8, 'Restaurant Bar (23-01-2020)', '2020-01-23 20:19:31', 15, 1.5, 22.5, 'CrÃ©dit', 561, 'RE', 0, 22.5, 'CrÃ©dit', 0, 'wait'),
(232, 5, 'Restaurant Bar (23-01-2020)', '2020-01-23 20:20:27', 2, 1.5, 3, 'CrÃ©dit', 562, 'RE', 0, 3, 'CrÃ©dit', 0, 'wait'),
(233, 8, 'Restaurant Bar (24-01-2020)', '2020-01-24 06:02:37', 6, 4.5, 27, 'CrÃ©dit', 563, 'RE', 0, 27, 'CrÃ©dit', 0, 'wait'),
(234, 8, 'Restaurant Bar (24-01-2020)', '2020-01-24 06:10:01', 12, 7.5, 21, 'CrÃ©dit', 565, 'RE', 0, 21, 'CrÃ©dit', 0, 'wait'),
(235, 3, 'Autres services (24-01-2020)', '2020-01-24 07:26:55', 1, 5, 5, 'Cash', 11, 'SA', 5, 0, 'EspÃ¨ces', 5, 'close');

-- --------------------------------------------------------

--
-- Structure de la table `facturationorg`
--

CREATE TABLE IF NOT EXISTS `facturationorg` (
  `idFactOrg` smallint(3) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) NOT NULL,
  `quantite` smallint(5) NOT NULL,
  `detail` varchar(30) NOT NULL,
  `dateFactOrg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pu` double NOT NULL,
  `PT` double NOT NULL,
  `etat` varchar(30) DEFAULT NULL,
  `idOrg` int(11) NOT NULL,
  PRIMARY KEY (`idFactOrg`),
  KEY `idOrg` (`idOrg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `facturationorg`
--

INSERT INTO `facturationorg` (`idFactOrg`, `designation`, `quantite`, `detail`, `dateFactOrg`, `pu`, `PT`, `etat`, `idOrg`) VALUES
(5, 'Salle de confÃ©rence', 1, 'jour(s)', '2020-01-24 07:20:14', 100, 100, 'wait', 12),
(6, 'Pause-cafÃ©', 13, 'prs', '2020-01-24 07:20:41', 5, 65, 'wait', 12);

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `idFacture` int(11) NOT NULL AUTO_INCREMENT,
  `dateFacture` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idFac` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `montantapayer` double NOT NULL,
  `montantpaye` double NOT NULL,
  `reste` double NOT NULL,
  `type` varchar(50) NOT NULL,
  `etat` varchar(15) NOT NULL,
  PRIMARY KEY (`idFacture`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `dateFacture`, `idFac`, `id_client`, `montantapayer`, `montantpaye`, `reste`, `type`, `etat`) VALUES
(1, '2020-01-03 11:33:19', 1, 1, 60, 60, 0, '', 'Cash'),
(2, '2020-01-06 04:39:19', 2, 2, 140, 140, 0, '', 'Cash'),
(3, '2020-01-09 12:40:48', 6, 14, 0, 0, 0, '', 'Cash'),
(4, '2020-01-10 05:44:28', 9, 17, 65, 0, 65, '', 'CrÃ©dit'),
(5, '2020-01-10 05:45:13', 8, 16, 80, 0, 80, '', 'CrÃ©dit'),
(6, '2020-01-10 05:45:58', 7, 15, 70, 0, 70, '', 'CrÃ©dit'),
(7, '2020-01-10 05:47:04', 6, 14, 0, 0, 0, '', 'Cash'),
(8, '2020-01-10 06:54:04', 5, 12, 60, 0, 60, '', 'CrÃ©dit'),
(9, '2020-01-12 11:06:02', 10, 18, 365, 0, 365, '', 'CrÃ©dit'),
(10, '2020-01-13 14:08:14', 11, 19, 87, 0, 87, '', 'CrÃ©dit'),
(11, '2020-01-13 14:11:38', 11, 19, 87, 87, 0, 'EspÃ¨ces', 'Cash'),
(12, '2020-01-15 07:36:58', 12, 21, 120, 0, 120, '', 'CrÃ©dit'),
(13, '2020-01-15 07:58:41', 12, 21, 120, 0, 120, '', 'CrÃ©dit'),
(14, '2020-01-15 08:47:12', 12, 21, 120, 0, 120, '', 'CrÃ©dit'),
(15, '2020-01-15 09:48:33', 12, 21, 139.5, 139.5, 0, 'EspÃ¨ces', 'CrÃ©dit'),
(16, '2020-01-21 19:04:12', 13, 28, 371, 0, 371, '', 'CrÃ©dit'),
(17, '2020-01-21 19:04:24', 13, 28, 300, 0, 300, '', 'CrÃ©dit'),
(18, '2020-01-21 19:07:44', 13, 28, 300, 300, 0, 'EspÃ¨ces', 'Cash'),
(19, '2020-01-21 19:08:51', 14, 29, 300, 0, 300, '', 'CrÃ©dit'),
(20, '2020-01-21 19:09:17', 14, 29, 300, 300, 0, 'EspÃ¨ces', 'Cash'),
(21, '2020-01-22 07:35:23', 17, 34, 199.5, 0, 199.5, '', 'CrÃ©dit'),
(22, '2020-01-22 07:38:30', 17, 34, 199.5, 199.5, 0, 'EspÃ¨ces', 'CrÃ©dit'),
(23, '2020-01-23 07:11:25', 25, 34, 88.5, 0, 88.5, '', 'CrÃ©dit'),
(26, '2020-01-23 07:32:50', 20, 38, 139, 139, 0, 'EspÃ¨ces', 'Cash'),
(27, '2020-01-23 07:33:26', 22, 39, 153, 153, 0, 'EspÃ¨ces', 'Cash'),
(28, '2020-01-23 07:34:37', 21, 37, 150, 150, 0, 'EspÃ¨ces', 'Cash'),
(29, '2020-01-23 13:04:53', 20, 38, 144, 144, 0, 'EspÃ¨ces', 'Cash'),
(30, '2020-01-23 08:10:02', 24, 40, 75.5, 20, 55.5, 'EspÃ¨ces', 'CrÃ©dit'),
(31, '2020-01-24 05:20:35', 18, 35, 357.5, 357.5, 0, 'EspÃ¨ces', 'CrÃ©dit'),
(32, '2020-01-24 05:23:58', 19, 36, 367.5, 367.5, 0, 'EspÃ¨ces', 'CrÃ©dit');

-- --------------------------------------------------------

--
-- Structure de la table `four`
--

CREATE TABLE IF NOT EXISTS `four` (
  `idFour` int(11) NOT NULL AUTO_INCREMENT,
  `nomFour` varchar(30) NOT NULL,
  `adresseFour` varchar(30) NOT NULL,
  `telFour` varchar(30) NOT NULL,
  PRIMARY KEY (`idFour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `four`
--

INSERT INTO `four` (`idFour`, `nomFour`, `adresseFour`, `telFour`) VALUES
(1, 'Ets NANZIMBA', 'Bujumbura', '+2575267859'),
(2, 'YOMBA', 'MULONGWE', '+243976273603'),
(3, 'AMISSA', 'MULONGWE', '+243992066898'),
(4, 'ALBA', 'KALUNDU', '+24389894841'),
(5, 'BRALIMA', 'KAKUNGWE', '+243999905425'),
(6, 'MAPENDO', 'MULONGWE', '+243816818124'),
(7, 'RAFIKI', 'KAVIMVIRA', '+2438597664');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `idLoc` int(11) NOT NULL AUTO_INCREMENT,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  `idOrg` int(11) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `typeLoc` varchar(30) NOT NULL,
  `dateLoc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nbreJour` int(11) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `nbrePersonne` int(11) NOT NULL,
  `reduction` double NOT NULL,
  `ptLoc` double NOT NULL,
  `modepaie` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`idLoc`),
  KEY `idOrg` (`idOrg`),
  KEY `idSalle` (`idSalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`idLoc`, `accompte`, `reste`, `idOrg`, `idSalle`, `typeLoc`, `dateLoc`, `nbreJour`, `dateDebut`, `dateFin`, `nbrePersonne`, `reduction`, `ptLoc`, `modepaie`, `type`) VALUES
(1, 0, 100, 3, 1, 'Atelier', '2020-01-14 18:28:41', 1, '2020-01-14', '2020-01-14', 15, 200, 100, 'Credit', 'CrÃ©dit');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE IF NOT EXISTS `materiel` (
  `idMat` int(11) NOT NULL AUTO_INCREMENT,
  `idCatEq` int(11) NOT NULL,
  `designMat` varchar(255) NOT NULL,
  `quantite` double NOT NULL,
  `prixAchat` double NOT NULL,
  `marque` varchar(255) NOT NULL,
  `dateAcqui` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idMat`),
  KEY `idCatEq` (`idCatEq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `idOrg` int(11) NOT NULL AUTO_INCREMENT,
  `nomOrg` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `emailOrg` varchar(50) NOT NULL,
  PRIMARY KEY (`idOrg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `organisation`
--

INSERT INTO `organisation` (`idOrg`, `nomOrg`, `adresse`, `tel`, `emailOrg`) VALUES
(1, 'PrivÃ©e', 'Ambulatoire', '+243895847738', 'prive@prive.com'),
(2, 'BRALIMA', 'UVIRA/SUD KIVU', '+243999306265', 'olivier@gmail.com'),
(3, 'HCR', 'UVIRA/SUD KIVU', '+243810084855', 'basinsua@unhcr.org'),
(4, 'PAM', 'UVIRA/SUD KIVU', '+243819700791', 'pam@gmail.com'),
(5, 'MONUSCO', 'KAMVIVIRA', '0990048512', 'monusco@gmail.com'),
(6, 'BBH', 'Uvira â€“ Sud-Kivu/ RDC', '+243978044578', 'baharibeach2017hotel@gmail.com'),
(7, 'ADEJIKA', 'UVIRA', '0', 'adejika@gmail.com'),
(8, 'CORRIDOR CENTRAL', 'TANZANIE', '+255682425612', 'corridor@gmail.com'),
(9, 'UNICEF', 'UVIRA', '0', 'unicef@gmail.com'),
(10, 'CDJP', 'UVIRA', '0', 'cdjp@gmail.com'),
(11, 'CRS', 'BUKAVU', '0', 'crs@gmail.com'),
(12, 'PROSANI USAID', 'BUKAVU', '1', 'VICKYLUNDULA@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `idPanier` int(11) NOT NULL AUTO_INCREMENT,
  `datePanier` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `designation` varchar(50) NOT NULL,
  `qtePanier` double NOT NULL,
  `puPanier` double NOT NULL,
  `ptPanier` double NOT NULL,
  `etatPanier` varchar(25) DEFAULT NULL,
  `idTable` int(11) NOT NULL,
  `id_serveur` int(11) NOT NULL,
  `product` char(1) NOT NULL,
  `modePaie` varchar(10) NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  `idPv` int(11) NOT NULL,
  PRIMARY KEY (`idPanier`),
  KEY `idTable` (`idTable`),
  KEY `id_serveur` (`id_serveur`),
  KEY `idPv` (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=579 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`idPanier`, `datePanier`, `designation`, `qtePanier`, `puPanier`, `ptPanier`, `etatPanier`, `idTable`, `id_serveur`, `product`, `modePaie`, `accompte`, `reste`, `idPv`) VALUES
(2, '2020-01-04 22:18:18', 'ENERGY MALT', 1, 2, 2, 'close', 6, 2, 'B', '', 0, 0, 1),
(3, '2020-01-04 22:47:05', 'MITZING GF', 2, 3, 6, 'close', 11, 2, 'B', '', 0, 0, 1),
(4, '2020-01-04 22:47:05', 'AMSTEL BEER', 1, 3, 3, 'close', 11, 2, 'B', '', 0, 0, 1),
(5, '2020-01-04 22:38:03', 'SUCRES PF', 1, 1.5, 1.5, 'close', 7, 2, 'B', '', 0, 0, 1),
(6, '2020-01-04 23:04:11', 'SUPER BOCK', 1, 3, 3, 'close', 12, 2, 'B', '', 0, 0, 1),
(7, '2020-01-04 22:32:57', 'SUCRES PF', 5, 1.5, 7.5, 'close', 5, 2, 'B', '', 0, 0, 1),
(8, '2020-01-04 22:32:57', 'TANGAWIZI', 1, 2, 2, 'close', 5, 2, 'B', '', 0, 0, 1),
(9, '2020-01-04 22:32:57', 'EAU GAZEUSE 0.5L', 1, 1.5, 1.5, 'close', 5, 2, 'B', '', 0, 0, 1),
(10, '2020-01-05 07:04:00', 'MITZING GF', 2, 3, 6, 'close', 9, 2, 'B', '', 0, 0, 1),
(11, '2020-01-04 22:38:03', 'AMSTEL BEER', 1, 3, 3, 'close', 7, 2, 'B', '', 0, 0, 1),
(12, '2020-01-04 22:38:03', 'SUCRES PF', 1, 1.5, 1.5, 'close', 7, 2, 'B', '', 0, 0, 1),
(13, '2020-01-04 22:45:31', 'MITZING GF', 2, 3, 6, 'close', 9, 2, 'B', '', 0, 0, 1),
(14, '2020-01-04 22:45:31', 'AMSTEL BEER', 1, 3, 3, 'close', 9, 2, 'B', '', 0, 0, 1),
(15, '2020-01-04 22:47:05', 'SUCRES PF', 1, 1.5, 1.5, 'close', 11, 2, 'B', '', 0, 0, 1),
(16, '2020-01-04 23:08:25', 'SUCRES PF', 1, 1.5, 1.5, 'close', 1, 2, 'B', '', 0, 0, 1),
(17, '2020-01-04 23:21:08', 'CHIVAS M', 2, 4.5, 9, 'close', 1, 2, 'B', '', 0, 0, 1),
(18, '2020-01-04 23:21:08', 'SUCRES PF', 1, 1.5, 1.5, 'close', 1, 2, 'B', '', 0, 0, 1),
(19, '2020-01-04 23:22:20', 'TURBO KING PF', 1, 2, 2, 'close', 1, 2, 'B', '', 0, 0, 1),
(20, '2020-01-04 23:23:35', 'PRIMUS BURUNDI GF', 1, 3, 3, 'close', 1, 2, 'B', '', 0, 0, 1),
(21, '2020-01-05 06:21:14', 'EAU KINJU 0.6L', 9, 1.5, 13.5, 'close', 1, 2, 'B', '', 0, 0, 1),
(22, '2020-01-05 18:38:59', 'ENERGY MALT', 1, 2, 2, 'close', 14, 3, 'B', '', 0, 0, 1),
(23, '2020-01-05 18:38:59', 'SUCRES PF', 1, 1.5, 1.5, 'close', 14, 3, 'B', '', 0, 0, 1),
(24, '2020-01-05 18:38:05', 'SUCRES PF', 5, 1.5, 7.5, 'close', 16, 3, 'B', '', 0, 0, 1),
(25, '2020-01-05 19:17:03', 'JUS AFIA', 2, 2, 4, 'close', 19, 3, 'B', '', 0, 0, 1),
(26, '2020-01-05 19:27:57', 'JUS AFIA', 2, 2, 4, 'close', 19, 3, 'B', '', 0, 0, 1),
(27, '2020-01-05 19:46:42', 'AMSTEL BEER', 1, 3, 3, 'close', 13, 3, 'B', '', 0, 0, 1),
(28, '2020-01-05 19:46:42', 'SUCRES PF', 7, 1.5, 10.5, 'close', 13, 3, 'B', '', 0, 0, 1),
(32, '2020-01-05 20:13:47', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 6, 3, 'B', '', 0, 0, 1),
(37, '2020-01-11 20:16:07', 'SUCRES GF', 1, 2, 2, 'close', 1, 3, 'B', '', 0, 0, 1),
(39, '2020-01-11 20:17:37', 'JUS AFIA', 1, 2, 2, 'close', 2, 3, 'B', '', 0, 0, 1),
(40, '2020-01-11 21:02:57', 'SUCRES GF', 3, 2, 6, 'close', 17, 3, 'B', '', 0, 0, 1),
(41, '2020-01-11 21:02:57', 'SUCRES PF', 1, 1.5, 1.5, 'close', 17, 3, 'B', '', 0, 0, 1),
(42, '2020-01-11 21:02:57', 'TANGAWIZI', 2, 2, 4, 'close', 17, 3, 'B', '', 0, 0, 1),
(43, '2020-01-11 21:02:57', 'CAFE NOIR ', 1, 2, 2, 'close', 17, 3, 'P', '', 0, 0, 1),
(44, '2020-01-11 21:04:02', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 18, 3, 'P', '', 0, 0, 1),
(45, '2020-01-11 21:04:02', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 18, 3, 'P', '', 0, 0, 1),
(46, '2020-01-11 21:04:02', 'SUCRES PF', 3, 1.5, 4.5, 'close', 18, 3, 'B', '', 0, 0, 1),
(47, '2020-01-11 21:04:02', 'SUCRES GF', 1, 2, 2, 'close', 18, 3, 'B', '', 0, 0, 1),
(48, '2020-01-11 21:02:07', 'FILET DE CAPITAINNE GRAND-MERE', 1, 11, 11, 'close', 16, 3, 'P', '', 0, 0, 1),
(49, '2020-01-11 21:02:07', 'TILAPIA A LA CREME DE POIREAUX 15', 1, 15, 15, 'close', 16, 3, 'P', '', 0, 0, 1),
(50, '2020-01-11 21:02:07', 'AMARULA PF', 1, 20, 20, 'close', 16, 3, 'B', '', 0, 0, 1),
(51, '2020-01-11 21:00:59', 'MARGUERITTE', 2, 10, 20, 'close', 15, 3, 'P', '', 0, 0, 1),
(52, '2020-01-11 20:59:55', 'SUCRES GF', 2, 2, 4, 'close', 14, 3, 'B', '', 0, 0, 1),
(53, '2020-01-11 20:59:55', 'SUCRES PF', 1, 1.5, 1.5, 'close', 14, 3, 'B', '', 0, 0, 1),
(54, '2020-01-11 20:54:09', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'close', 7, 3, 'P', '', 0, 0, 1),
(55, '2020-01-11 20:57:33', 'ENERGY MALT', 1, 2, 2, 'close', 12, 3, 'B', '', 0, 0, 1),
(56, '2020-01-11 20:57:33', 'SUPER BOCK', 3, 3, 9, 'close', 12, 3, 'B', '', 0, 0, 1),
(57, '2020-01-11 20:57:33', 'SUCRES GF', 1, 2, 2, 'close', 12, 3, 'B', '', 0, 0, 1),
(58, '2020-01-11 20:54:09', 'CAFE AU LAIT', 1, 2, 2, 'close', 7, 3, 'P', '', 0, 0, 1),
(59, '2020-01-11 20:59:55', 'SUCRES GF', 1, 2, 2, 'close', 14, 3, 'B', '', 0, 0, 1),
(60, '2020-01-11 22:27:54', 'SUCRES PF', 2, 1.5, 3, 'close', 3, 3, 'B', '', 0, 0, 1),
(61, '2020-01-11 22:30:43', 'ROYAL BURUNDI', 1, 3, 3, 'close', 4, 3, 'B', '', 0, 0, 1),
(62, '2020-01-11 22:33:04', 'EAU KINJU 0.6L', 7, 1.5, 10.5, 'close', 5, 3, 'B', '', 0, 0, 1),
(65, '2020-01-12 13:31:01', 'AMSTEL BEER', 1, 3, 3, 'close', 19, 2, 'B', '', 0, 0, 1),
(66, '2020-01-12 13:31:01', 'PRIMUS BURUNDI GF', 1, 3, 3, 'close', 19, 2, 'B', '', 0, 0, 1),
(67, '2020-01-12 13:31:01', 'ROYAL BURUNDI', 2, 3, 6, 'close', 19, 2, 'B', '', 0, 0, 1),
(68, '2020-01-12 13:31:01', 'SUCRES PF', 3, 1.5, 4.5, 'close', 19, 2, 'B', '', 0, 0, 1),
(69, '2020-01-12 14:24:48', 'SUCRES PF', 2, 1.5, 3, 'close', 4, 2, 'B', '', 0, 0, 1),
(70, '2020-01-12 16:34:27', 'MAFIOZA', 1, 10, 10, 'close', 18, 2, 'P', '', 0, 0, 1),
(71, '2020-01-12 16:34:27', 'AMSTEL BOCK', 2, 2, 4, 'close', 18, 2, 'B', '', 0, 0, 1),
(72, '2020-01-12 16:32:46', 'SAVANA', 1, 4, 4, 'close', 20, 2, 'B', '', 0, 0, 1),
(73, '2020-01-12 20:09:42', '1/4POULET MOZAMBICAINE', 1, 9, 9, 'close', 11, 2, 'P', '', 0, 0, 1),
(74, '2020-01-12 20:09:42', 'ACCO BANANE P', 1, 0, 0, 'close', 11, 2, 'P', '', 0, 0, 1),
(75, '2020-01-12 20:09:42', 'FRITE BANANES PLANTAIN', 1, 2, 2, 'close', 11, 2, 'P', '', 0, 0, 1),
(76, '2020-01-12 16:31:16', 'SUCRES GF', 1, 2, 2, 'close', 22, 2, 'B', '', 0, 0, 1),
(77, '2020-01-12 16:31:16', 'SUCRES PF', 1, 1.5, 1.5, 'close', 22, 2, 'B', '', 0, 0, 1),
(78, '2020-01-12 16:46:06', 'STEAK GRILLE', 1, 7, 7, 'close', 1, 2, 'P', '', 0, 0, 1),
(79, '2020-01-12 16:46:06', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 1, 2, 'P', '', 0, 0, 1),
(80, '2020-01-12 19:10:58', '1/4POULET MOZAMBICAINE', 1, 9, 9, 'close', 2, 2, 'P', '', 0, 0, 1),
(82, '2020-01-12 20:12:56', 'VEGETARIENNE', 1, 10, 10, 'close', 21, 2, 'P', '', 0, 0, 1),
(83, '2020-01-12 20:12:56', 'AMSTEL BEER', 2, 3, 6, 'close', 21, 2, 'B', '', 0, 0, 1),
(84, '2020-01-12 20:12:56', 'SUCRES GF', 1, 2, 2, 'close', 21, 2, 'B', '', 0, 0, 1),
(85, '2020-01-12 20:12:56', 'AMSTEL BEER', 2, 3, 6, 'close', 21, 2, 'B', '', 0, 0, 1),
(86, '2020-01-12 20:12:56', 'VEGETARIENNE', 1, 10, 10, 'close', 21, 2, 'P', '', 0, 0, 1),
(88, '2020-01-12 20:09:42', 'SUCRES GF', 2, 2, 4, 'close', 11, 2, 'B', '', 0, 0, 1),
(89, '2020-01-12 20:09:42', 'SALADES MIXTES', 1, 2.5, 2.5, 'close', 11, 2, 'P', '', 0, 0, 1),
(90, '2020-01-12 19:13:00', 'TILAPIA A LA SAUCE SALSA CRUDA 15', 1, 15, 15, 'close', 3, 2, 'P', '', 0, 0, 1),
(91, '2020-01-12 19:13:00', 'ACCO FUFU', 1, 0, 0, 'close', 3, 2, 'P', '', 0, 0, 1),
(93, '2020-01-12 19:10:58', 'SUCRES GF', 1, 2, 2, 'close', 2, 2, 'B', '', 0, 0, 1),
(94, '2020-01-12 19:10:58', 'SUPER BOCK', 2, 3, 6, 'close', 2, 2, 'B', '', 0, 0, 1),
(95, '2020-01-12 19:13:00', 'FOUFOU', 1, 2, 2, 'close', 3, 2, 'P', '', 0, 0, 1),
(96, '2020-01-12 20:09:42', 'SUCRES PF', 1, 1.5, 1.5, 'close', 11, 2, 'B', '', 0, 0, 1),
(97, '2020-01-12 19:57:19', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 24, 2, 'B', '', 0, 0, 1),
(98, '2020-01-12 19:57:19', '1/4POULET MOZAMBICAINE', 1, 9, 9, 'close', 24, 2, 'P', '', 0, 0, 1),
(99, '2020-01-12 19:57:19', 'SANDWICH BAHARI HOTEL', 1, 7.5, 7.5, 'close', 24, 2, 'P', '', 0, 0, 1),
(100, '2020-01-12 19:57:19', 'ACCO BANANE P', 1, 0, 0, 'close', 24, 2, 'P', '', 0, 0, 1),
(101, '2020-01-12 20:09:42', 'SUCRES GF', 1, 2, 2, 'close', 11, 2, 'B', '', 0, 0, 1),
(102, '2020-01-12 20:31:48', 'STEAK GRILLE', 1, 7, 7, 'close', 6, 2, 'P', '', 0, 0, 1),
(103, '2020-01-12 20:30:28', 'ACCO FUFU', 1, 0, 0, 'close', 1, 2, 'P', '', 0, 0, 1),
(104, '2020-01-12 20:30:28', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 1, 2, 'B', '', 0, 0, 1),
(105, '2020-01-12 20:52:37', 'AMSTEL BOCK', 2, 2, 4, 'close', 19, 2, 'B', '', 0, 0, 1),
(106, '2020-01-12 20:52:37', 'SAVANA', 1, 4, 4, 'close', 19, 2, 'B', '', 0, 0, 1),
(107, '2020-01-12 20:52:37', 'SUCRES GF', 1, 2, 2, 'close', 19, 2, 'B', '', 0, 0, 1),
(108, '2020-01-12 22:11:03', 'COCA ZERO GF', 1, 2, 2, 'close', 5, 2, 'B', '', 0, 0, 1),
(109, '2020-01-13 10:53:54', 'ROYAL BURUNDI', 1, 3, 3, 'close', 1, 2, 'B', 'Cash', 0, 0, 1),
(110, '2020-01-13 10:54:01', 'SUCRES GF', 2, 2, 4, 'close', 1, 2, 'B', 'Cash', 0, 0, 1),
(111, '2020-01-13 10:54:06', 'SUCRES PF', 1, 1.5, 1.5, 'close', 1, 2, 'B', 'Cash', 0, 0, 1),
(112, '2020-01-13 21:05:55', 'OMELETTE NATURE', 1, 2.5, 2.5, 'close', 2, 3, 'P', 'Cash', 0, 0, 1),
(113, '2020-01-13 10:06:21', 'THE NOIR', 1, 2, 2, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(114, '2020-01-13 12:24:32', 'KUHE A LA CREME DE POIREAUX 40', 3, 40, 120, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(116, '2020-01-13 12:24:32', 'ACCO BANANE P', 2, 0, 0, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(117, '2020-01-13 12:24:32', 'ACCO RIZ', 1, 0, 0, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(118, '2020-01-13 12:24:32', 'SAUCE PROVENCALE ', 1, 2, 2, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(119, '2020-01-13 12:31:46', 'PETIT DEJEUNER CONTINENTAL', 3, 4.5, 13.5, 'close', 10, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(120, '2020-01-13 12:28:58', 'PETIT DEJEUNER CONTINENTAL', 2, 4.5, 9, 'close', 4, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(121, '2020-01-13 12:24:32', 'ACCO FUFU', 4, 0, 0, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(122, '2020-01-13 12:24:32', 'ACCO SOMBE', 4, 0, 0, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(123, '2020-01-13 12:24:32', 'ACCO SAUCE PROVINCIALE', 1, 0, 0, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(124, '2020-01-13 12:24:32', 'SUCRES GF', 5, 2, 10, 'close', 7, 3, 'B', 'Cash', 0, 0, 1),
(125, '2020-01-13 12:24:32', 'SUCRES PF', 2, 1.5, 3, 'close', 7, 3, 'B', 'Cash', 0, 0, 1),
(126, '2020-01-13 12:24:32', 'EAU GAZEUSE 0.5L', 2, 1.5, 3, 'close', 7, 3, 'B', 'Cash', 0, 0, 1),
(127, '2020-01-13 12:24:32', 'ROYAL BURUNDI', 1, 3, 3, 'close', 7, 3, 'B', 'Cash', 0, 0, 1),
(128, '2020-01-13 12:24:32', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 7, 3, 'B', 'Cash', 0, 0, 1),
(129, '2020-01-13 12:28:58', 'THE NOIR', 2, 2, 4, 'close', 4, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(130, '2020-01-13 12:31:46', 'THE NOIR', 3, 2, 6, 'close', 10, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(131, '2020-01-13 18:59:42', 'KING FISH', 4, 3, 12, 'close', 14, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(132, '2020-01-13 18:59:42', 'SUCRES GF', 1, 2, 2, 'close', 14, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(133, '2020-01-13 19:20:41', 'EAU KINJU 0.6L', 10, 1.5, 15, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(134, '2020-01-14 09:10:02', 'COCA ZERO GF', 1, 2, 2, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(135, '2020-01-14 14:12:32', 'MACEDOINE FRUITS ', 1, 2.5, 2.5, 'close', 6, 2, 'P', 'Cash', 0, 0, 1),
(136, '2020-01-14 14:12:32', 'CROQUE-MONSIEUR', 1, 3.5, 3.5, 'close', 6, 2, 'P', 'Cash', 0, 0, 1),
(137, '2020-01-14 14:12:32', 'SUCRES PF', 1, 1.5, 1.5, 'close', 6, 2, 'B', 'Cash', 0, 0, 1),
(138, '2020-01-14 22:04:37', 'KUHE A LA SAUCE BOUILLONS 18', 1, 18, 18, 'close', 2, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(140, '2020-01-14 22:07:02', 'SUCRES PF', 1, 1.5, 1.5, 'close', 2, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(141, '2020-01-14 18:22:27', 'ACCO FUFU', 1, 0, 0, 'close', 2, 2, 'P', 'Cash', 0, 0, 1),
(143, '2020-01-14 20:55:55', 'SUCRES PF', 2, 1.5, 3, 'close', 18, 2, 'B', 'Cash', 0, 0, 1),
(146, '2020-01-14 20:55:55', 'J&B M', 1, 2.5, 2.5, 'close', 18, 2, 'B', 'Cash', 0, 0, 1),
(147, '2020-01-14 20:55:55', 'J&B M', 4, 2.5, 10, 'close', 18, 2, 'B', 'Cash', 0, 0, 1),
(148, '2020-01-14 20:55:55', 'POMME DE TERRE FRITES ', 1, 2, 2, 'close', 18, 2, 'P', 'Cash', 0, 0, 1),
(151, '2020-01-14 21:49:45', 'EAU KINJU 0.6L', 15, 1.5, 22.5, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(152, '2020-01-14 21:49:45', 'BUFFET', 15, 13.5, 202.5, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(153, '2020-01-14 21:49:45', 'PAUSE CAFE', 15, 3.5, 52.5, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(154, '2020-01-14 21:49:45', 'SUCRES PF', 9, 1.5, 13.5, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(155, '2020-01-14 21:49:45', 'EAU KINJU 0.6L', 6, 1.5, 9, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(156, '2020-01-14 21:49:45', 'EAU KINJU 0.6L', 15, 1.5, 22.5, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(157, '2020-01-15 08:47:54', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(158, '2020-01-15 08:50:22', 'THE NOIR', 1, 2, 2, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(159, '2020-01-15 09:34:31', 'ENERGY MALT', 1, 2, 2, 'close', 12, 3, 'B', 'Cash', 0, 0, 1),
(160, '2020-01-15 09:34:31', 'JUS AFIA', 2, 2, 4, 'close', 12, 3, 'B', 'Cash', 0, 0, 1),
(161, '2020-01-15 12:28:40', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 4, 9, 36, 'close', 18, 3, 'P', 'Cash', 0, 0, 1),
(162, '2020-01-15 12:28:40', 'ACCO POMMES DE T.', 2, 0, 0, 'close', 18, 3, 'P', 'Cash', 0, 0, 1),
(163, '2020-01-15 12:28:40', 'ACCO FUFU', 1, 0, 0, 'close', 18, 3, 'P', 'Cash', 0, 0, 1),
(164, '2020-01-15 12:28:40', 'ACCO BANANE P', 1, 0, 0, 'close', 18, 3, 'P', 'Cash', 0, 0, 1),
(165, '2020-01-15 11:55:27', 'SUCRES GF', 1, 2, 2, 'close', 3, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(166, '2020-01-15 11:41:20', 'EAU GAZEUSE 0.5L', 1, 1.5, 1.5, 'close', 11, 3, 'B', 'Cash', 0, 0, 1),
(167, '2020-01-15 11:55:27', 'SAUCISSE', 1, 3, 3, 'close', 3, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(168, '2020-01-15 11:41:20', 'JUS AFIA', 2, 2, 4, 'close', 11, 3, 'B', 'Cash', 0, 0, 1),
(169, '2020-01-15 11:41:20', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 11, 3, 'B', 'Cash', 0, 0, 1),
(170, '2020-01-15 12:28:40', 'EAU GAZEUSE 0.5L', 2, 1.5, 3, 'close', 18, 3, 'B', 'Cash', 0, 0, 1),
(171, '2020-01-15 12:28:40', 'HEINEKEN', 2, 3, 6, 'close', 18, 3, 'B', 'Cash', 0, 0, 1),
(172, '2020-01-15 12:28:40', 'JUS AFIA', 2, 2, 4, 'close', 18, 3, 'B', 'Cash', 0, 0, 1),
(174, '2020-01-15 18:46:38', 'ACCO BANANE P', 1, 0, 0, 'close', 5, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(175, '2020-01-15 18:46:38', 'JUS AFIA', 1, 2, 2, 'close', 5, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(176, '2020-01-15 19:35:59', 'SAUCISSE', 2, 3, 6, 'close', 7, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(177, '2020-01-15 19:35:59', 'FOUFOU', 4, 2, 8, 'close', 7, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(178, '2020-01-15 19:48:00', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 6, 3, 'P', 'Cash', 0, 0, 1),
(179, '2020-01-15 19:48:00', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 6, 3, 'P', 'Cash', 0, 0, 1),
(180, '2020-01-16 18:16:38', 'POULET AU CURRY', 2, 9, 18, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(181, '2020-01-16 18:16:38', 'ACCO RIZ', 2, 0, 0, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(182, '2020-01-16 16:53:38', 'EAU GAZEUSE 0.5L', 1, 1.5, 1.5, 'close', 2, 2, 'B', 'Cash', 0, 0, 1),
(183, '2020-01-16 16:53:38', 'JUS AFIA', 1, 2, 2, 'close', 2, 2, 'B', 'Cash', 0, 0, 1),
(184, '2020-01-16 18:16:38', 'PRIMUS PF', 2, 2, 4, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(185, '2020-01-16 18:16:38', 'SUCRES GF', 1, 2, 2, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(186, '2020-01-16 18:16:38', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(187, '2020-01-16 18:16:38', 'THE CITRONNEL', 2, 2, 4, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(188, '2020-01-16 19:30:44', 'TILAPIA A LA SAUCE SALSA CRUDA 15', 1, 15, 15, 'close', 17, 2, 'P', 'Cash', 0, 0, 1),
(189, '2020-01-16 19:30:44', 'MAFIOZA', 1, 10, 10, 'close', 17, 2, 'P', 'Cash', 0, 0, 1),
(190, '2020-01-16 19:30:44', 'SUCRES PF', 1, 1.5, 1.5, 'close', 17, 2, 'B', 'Cash', 0, 0, 1),
(191, '2020-01-16 19:30:44', 'SUCRES PF', 1, 1.5, 1.5, 'close', 17, 2, 'B', 'Cash', 0, 0, 1),
(192, '2020-01-16 19:30:44', 'RED BULL', 2, 2.5, 5, 'close', 17, 2, 'B', 'Cash', 0, 0, 1),
(193, '2020-01-16 19:30:44', 'ACCO SAUCE PROVINCIALE', 1, 0, 0, 'close', 17, 2, 'P', 'Cash', 0, 0, 1),
(194, '2020-01-16 19:30:44', 'ACCO RIZ', 1, 0, 0, 'close', 17, 2, 'P', 'Cash', 0, 0, 1),
(195, '2020-01-16 20:05:16', 'SUCRES PF', 2, 1.5, 3, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(197, '2020-01-16 20:06:09', 'JUS AFIA', 1, 2, 2, 'close', 16, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(198, '2020-01-16 20:36:14', 'COCA ZERO GF', 1, 2, 2, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(199, '2020-01-17 13:05:28', 'CAFE AU LAIT', 2, 2, 4, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(200, '2020-01-17 13:05:28', 'CREPE SUCREE(deux piÃ¨ce)', 2, 2, 4, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(201, '2020-01-17 13:05:28', 'OMELETTES AUX OIGNONS', 2, 2.5, 5, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(202, '2020-01-17 13:05:28', 'ACCO PAIN', 2, 0, 0, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(203, '2020-01-17 13:02:36', 'SUCRES PF', 2, 1.5, 3, 'close', 1, 3, 'B', 'Cash', 0, 0, 1),
(204, '2020-01-17 13:05:28', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 8, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(205, '2020-01-17 15:13:13', 'SUCRES GF', 2, 2, 4, 'close', 18, 3, 'B', 'Cash', 0, 0, 1),
(206, '2020-01-17 15:13:13', 'SUCRES PF', 1, 1.5, 1.5, 'close', 18, 3, 'B', 'Cash', 0, 0, 1),
(207, '2020-01-17 15:13:13', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 18, 3, 'B', 'Cash', 0, 0, 1),
(208, '2020-01-17 20:04:38', 'TILAPIA A LA CREME DE POIREAUX 15', 1, 15, 15, 'close', 5, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(209, '2020-01-17 20:04:38', 'ACCO FUFU', 1, 0, 0, 'close', 5, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(214, '2020-01-17 19:59:41', 'FILET DE CAPITAINE GRILLE', 1, 9, 9, 'close', 19, 3, 'P', 'Cash', 0, 0, 1),
(215, '2020-01-17 19:59:41', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 19, 3, 'P', 'Cash', 0, 0, 1),
(216, '2020-01-17 18:09:27', 'SUCRES GF', 2, 2, 4, 'close', 7, 3, 'B', 'Cash', 0, 0, 1),
(217, '2020-01-17 19:59:41', 'KUHE A LA SAUCE SALSA CRUDA 25/12.5', 1, 12.5, 12.5, 'close', 19, 3, 'P', 'Cash', 0, 0, 1),
(218, '2020-01-17 19:59:41', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 19, 3, 'P', 'Cash', 0, 0, 1),
(225, '2020-01-17 19:40:13', 'COCA ZERO GF', 1, 2, 2, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(226, '2020-01-17 19:53:54', 'POULET AU CURRY', 2, 9, 18, 'close', 1, 3, 'P', 'Cash', 0, 0, 1),
(228, '2020-01-17 19:53:54', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 1, 3, 'B', 'Cash', 0, 0, 1),
(229, '2020-01-17 19:53:54', 'RED BULL', 1, 2.5, 2.5, 'close', 1, 3, 'B', 'Cash', 0, 0, 1),
(230, '2020-01-17 19:53:54', 'Jus Maison Mixte', 1, 2.5, 2.5, 'close', 1, 3, 'P', 'Cash', 0, 0, 1),
(231, '2020-01-17 19:53:54', 'THE NOIR', 2, 2, 4, 'close', 1, 3, 'P', 'Cash', 0, 0, 1),
(232, '2020-01-17 19:59:41', 'MITZING GF', 7, 3, 21, 'close', 19, 3, 'B', 'Cash', 0, 0, 1),
(233, '2020-01-17 20:04:38', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 5, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(234, '2020-01-17 20:04:38', 'ACCO SOMBE', 1, 0, 0, 'close', 5, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(238, '2020-01-18 07:44:58', 'JUS AFIA', 1, 2, 2, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(239, '2020-01-18 12:22:45', 'OMELETTES AUX OIGNONS', 2, 2.5, 5, 'close', 21, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(240, '2020-01-18 12:22:45', 'CAFE AU LAIT', 2, 2, 4, 'close', 21, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(241, '2020-01-18 12:22:45', 'ASSIETTES DE FRUIT NATURE', 2, 2, 4, 'close', 21, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(242, '2020-01-18 12:22:45', 'ACCO PAIN', 2, 0, 0, 'close', 21, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(243, '2020-01-18 12:21:26', 'THE GINGEMBRE', 2, 2, 4, 'close', 7, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(244, '2020-01-18 12:21:26', 'OMELETTES AUX OIGNONS', 2, 2.5, 5, 'close', 7, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(245, '2020-01-18 12:21:26', 'ASSIETTES DE FRUIT NATURE', 2, 2, 4, 'close', 7, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(246, '2020-01-18 12:21:26', 'ACCO PAIN', 2, 0, 0, 'close', 7, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(247, '2020-01-18 12:09:20', 'AMSTEL BEER', 4, 3, 12, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(248, '2020-01-18 12:09:20', 'SUCRES GF', 1, 2, 2, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(249, '2020-01-18 12:09:20', 'SUCRES GF', 4, 2, 8, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(250, '2020-01-18 13:50:55', 'KUHE A LA CREME DE POIREAUX 25/12.5', 1, 12.5, 12.5, 'close', 2, 2, 'P', 'Cash', 0, 0, 1),
(251, '2020-01-18 13:50:55', 'ACCO FUFU', 1, 0, 0, 'close', 2, 2, 'P', 'Cash', 0, 0, 1),
(252, '2020-01-18 13:50:55', 'ACCO LENGA-LENGA', 1, 0, 0, 'close', 2, 2, 'P', 'Cash', 0, 0, 1),
(253, '2020-01-18 13:50:55', 'LEGENDE', 1, 2, 2, 'close', 2, 2, 'B', 'Cash', 0, 0, 1),
(254, '2020-01-18 15:26:44', 'CREPE NATURE', 1, 2, 2, 'close', 18, 2, 'P', 'Cash', 0, 0, 1),
(255, '2020-01-18 15:26:44', 'ASSIETTES DE FRUIT NATURE', 1, 2, 2, 'close', 18, 2, 'P', 'Cash', 0, 0, 1),
(256, '2020-01-18 15:26:44', 'Jus Maison', 1, 2.5, 2.5, 'close', 18, 2, 'P', 'Cash', 0, 0, 1),
(257, '2020-01-18 15:26:44', 'Jus Maison', 1, 2.5, 2.5, 'close', 18, 2, 'P', 'Cash', 0, 0, 1),
(258, '2020-01-18 15:26:44', 'ACCO PAIN', 1, 0, 0, 'close', 18, 2, 'P', 'Cash', 0, 0, 1),
(259, '2020-01-18 15:26:44', 'SUCRES PF', 1, 1.5, 1.5, 'close', 18, 2, 'B', 'Cash', 0, 0, 1),
(260, '2020-01-18 19:17:00', 'MAFIOZA', 1, 10, 10, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(261, '2020-01-18 19:17:00', 'KUHE A LA SAUCE SALSA CRUDA 18', 1, 18, 18, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(262, '2020-01-18 19:17:00', 'ACCO FUFU', 1, 0, 0, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(263, '2020-01-18 19:17:00', 'POMME DE TERRE FRITES ', 1, 2, 2, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(264, '2020-01-18 19:17:00', 'ASSIETTES DE FRUIT NATURE', 1, 2, 2, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(265, '2020-01-18 17:51:05', 'ACCO FUFU', 1, 0, 0, 'close', 4, 2, 'P', 'Cash', 0, 0, 1),
(266, '2020-01-18 17:51:05', 'EMINCE DE VEAU AUX OIGNONS', 1, 7, 7, 'close', 4, 2, 'P', 'Cash', 0, 0, 1),
(267, '2020-01-18 17:51:05', 'ACCO SOMBE', 1, 0, 0, 'close', 4, 2, 'P', 'Cash', 0, 0, 1),
(268, '2020-01-18 19:17:00', 'ACCO SOMBE', 1, 0, 0, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(269, '2020-01-18 17:51:05', 'ROYAL BURUNDI', 6, 3, 18, 'close', 4, 2, 'B', 'Cash', 0, 0, 1),
(272, '2020-01-18 17:51:05', 'PRIMUS GF', 1, 3, 3, 'close', 4, 2, 'B', 'Cash', 0, 0, 1),
(273, '2020-01-18 17:51:05', 'SUCRES PF', 1, 1.5, 1.5, 'close', 4, 2, 'B', 'Cash', 0, 0, 1),
(274, '2020-01-18 17:51:05', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 4, 2, 'B', 'Cash', 0, 0, 1),
(276, '2020-01-18 17:37:37', 'MITZING PF', 1, 2, 2, 'close', 20, 2, 'B', 'Cash', 0, 0, 1),
(277, '2020-01-18 17:51:05', 'SUCRES GF', 2, 2, 4, 'close', 4, 2, 'B', 'Cash', 0, 0, 1),
(278, '2020-01-18 17:51:05', 'AMSTEL BEER', 1, 3, 3, 'close', 4, 2, 'B', 'Cash', 0, 0, 1),
(279, '2020-01-18 18:22:42', 'EMINCE DE VEAU AUX OIGNONS', 1, 7, 7, 'close', 1, 2, 'P', 'Cash', 0, 0, 1),
(281, '2020-01-18 18:22:42', 'ACCO FUFU', 1, 0, 0, 'close', 1, 2, 'P', 'Cash', 0, 0, 1),
(282, '2020-01-18 19:06:46', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 8, 2, 'B', 'Cash', 0, 0, 1),
(283, '2020-01-18 19:06:46', 'DIAMBINO', 1, 12, 12, 'close', 8, 2, 'P', 'Cash', 0, 0, 1),
(284, '2020-01-18 19:06:46', 'FANTAISIE', 1, 10, 10, 'close', 8, 2, 'P', 'Cash', 0, 0, 1),
(285, '2020-01-18 19:17:00', 'AMSTEL BEER', 1, 3, 3, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(286, '2020-01-18 19:17:00', 'ROYAL BURUNDI', 1, 3, 3, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(287, '2020-01-18 19:17:00', 'SUCRES GF', 1, 2, 2, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(288, '2020-01-18 19:18:36', 'AMSTEL BEER', 2, 3, 6, 'close', 5, 2, 'B', 'Cash', 0, 0, 1),
(289, '2020-01-18 19:18:36', 'SUCRES GF', 2, 2, 4, 'close', 5, 2, 'B', 'Cash', 0, 0, 1),
(290, '2020-01-18 19:17:00', 'ROYAL BURUNDI', 1, 3, 3, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(291, '2020-01-18 19:28:42', 'CAFE NOIR ', 2, 2, 4, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(292, '2020-01-18 19:28:42', 'THE CITRONNEL', 2, 2, 4, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(293, '2020-01-18 20:13:32', 'SUCRES GF', 2, 2, 4, 'close', 2, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(294, '2020-01-18 20:16:54', 'EAU KINJU 0.6L', 12, 1.5, 18, 'close', 24, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(295, '2020-01-18 20:16:54', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 24, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(297, '2020-01-19 10:43:26', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'close', 1, 3, 'P', 'Cash', 0, 0, 1),
(298, '2020-01-19 10:43:26', 'CAFE AU LAIT', 1, 2, 2, 'close', 1, 3, 'P', 'Cash', 0, 0, 1),
(299, '2020-01-19 10:36:16', 'PETIT DEJEUNER CONTINENTAL', 4, 4.5, 18, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(300, '2020-01-19 10:36:16', 'EAU KINJU 0.6L', 4, 1.5, 6, 'close', 2, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(301, '2020-01-19 10:39:29', 'THE NOIR', 4, 2, 8, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(302, '2020-01-19 13:15:09', 'Jus Maison Mixte', 2, 2.5, 5, 'close', 17, 3, 'P', 'Cash', 0, 0, 1),
(303, '2020-01-19 13:54:15', '1/4POULET MOZAMBICAINE', 1, 9, 9, 'close', 21, 3, 'P', 'Cash', 0, 0, 1),
(304, '2020-01-19 13:54:15', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 21, 3, 'P', 'Cash', 0, 0, 1),
(305, '2020-01-19 13:54:15', 'Jus Maison Mixte', 1, 2.5, 2.5, 'close', 21, 3, 'P', 'Cash', 0, 0, 1),
(306, '2020-01-19 13:15:09', 'TILAPIA A LA CREME DE POIREAUX 15', 1, 15, 15, 'close', 17, 3, 'P', 'Cash', 0, 0, 1),
(307, '2020-01-19 13:15:09', 'ACCO BANANE P', 1, 0, 0, 'close', 17, 3, 'P', 'Cash', 0, 0, 1),
(308, '2020-01-19 16:54:41', 'THE CITRONNEL', 1, 2, 2, 'close', 18, 3, 'P', 'Cash', 0, 0, 1),
(309, '2020-01-19 16:54:41', 'Jus Maison Mixte', 2, 2.5, 5, 'close', 18, 3, 'P', 'Cash', 0, 0, 1),
(311, '2020-01-19 13:15:09', 'SPAGHETTI BOLOGNAISE', 1, 5, 5, 'close', 17, 3, 'P', 'Cash', 0, 0, 1),
(312, '2020-01-19 16:09:20', 'SAUCISSE', 2, 3, 6, 'close', 6, 3, 'P', 'Cash', 0, 0, 1),
(313, '2020-01-19 16:09:20', 'POMME DE TERRE FRITES ', 2, 2, 4, 'close', 6, 3, 'P', 'Cash', 0, 0, 1),
(314, '2020-01-19 16:09:20', 'SALADES MIXTES', 1, 2.5, 2.5, 'close', 6, 3, 'P', 'Cash', 0, 0, 1),
(315, '2020-01-19 16:09:20', 'POMME DE TERRE FRITES ', 1, 2, 2, 'close', 6, 3, 'P', 'Cash', 0, 0, 1),
(317, '2020-01-19 14:30:48', 'TURBO KING PF', 1, 2, 2, 'close', 1, 3, 'B', 'Cash', 0, 0, 1),
(318, '2020-01-19 14:33:20', 'TURBO KING GF', 1, 3, 3, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(319, '2020-01-19 16:09:20', 'SUCRES GF', 3, 2, 6, 'close', 6, 3, 'B', 'Cash', 0, 0, 1),
(320, '2020-01-19 16:09:20', 'SUCRES PF', 2, 1.5, 3, 'close', 6, 3, 'B', 'Cash', 0, 0, 1),
(322, '2020-01-19 17:35:51', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 16, 3, 'P', 'Cash', 0, 0, 1),
(323, '2020-01-19 17:35:51', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 16, 3, 'P', 'Cash', 0, 0, 1),
(324, '2020-01-19 17:35:51', 'STEAK GRILLE', 1, 7, 7, 'close', 16, 3, 'P', 'Cash', 0, 0, 1),
(325, '2020-01-19 17:35:51', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 16, 3, 'P', 'Cash', 0, 0, 1),
(326, '2020-01-19 17:35:51', 'SAUCISSE', 1, 3, 3, 'close', 16, 3, 'P', 'Cash', 0, 0, 1),
(327, '2020-01-19 17:35:51', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 16, 3, 'P', 'Cash', 0, 0, 1),
(328, '2020-01-19 18:00:43', 'AMSTEL BEER', 1, 3, 3, 'close', 13, 3, 'B', 'Cash', 0, 0, 1),
(329, '2020-01-19 18:00:43', 'PRIMUS BURUNDI GF', 1, 3, 3, 'close', 13, 3, 'B', 'Cash', 0, 0, 1),
(330, '2020-01-19 18:00:43', 'SUCRES PF', 2, 1.5, 3, 'close', 13, 3, 'B', 'Cash', 0, 0, 1),
(331, '2020-01-19 18:38:19', 'SPAGHETTI BOLOGNAISE', 2, 5, 10, 'close', 8, 3, 'P', 'Cash', 0, 0, 1),
(332, '2020-01-19 17:35:51', 'TANGAWIZI', 2, 2, 4, 'close', 16, 3, 'B', 'Cash', 0, 0, 1),
(333, '2020-01-19 17:35:51', 'SUCRES GF', 1, 2, 2, 'close', 16, 3, 'B', 'Cash', 0, 0, 1),
(334, '2020-01-19 17:35:51', 'POMME DE TERRE FRITES ', 1, 2, 2, 'close', 16, 3, 'P', 'Cash', 0, 0, 1),
(336, '2020-01-19 18:38:19', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 8, 3, 'B', 'Cash', 0, 0, 1),
(337, '2020-01-19 18:16:31', 'SAVANA', 1, 4, 4, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(338, '2020-01-19 18:38:19', 'THE CITRONNEL', 1, 2, 2, 'close', 8, 2, 'P', 'Cash', 0, 0, 1),
(339, '2020-01-19 18:25:34', 'KING FISH', 1, 3, 3, 'close', 3, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(340, '2020-01-19 18:27:05', 'KING FISH', 1, 3, 3, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(341, '2020-01-19 19:55:28', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(342, '2020-01-19 19:54:38', 'KUHE A LA SAUCE BOUILLONS 20', 1, 20, 20, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(343, '2020-01-19 19:55:28', 'ACCO FUFU', 2, 0, 0, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(344, '2020-01-19 19:54:38', 'ACCO FUFU', 2, 0, 0, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(345, '2020-01-19 19:56:04', 'FOUFOU', 4, 2, 8, 'close', 4, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(346, '2020-01-19 19:59:42', 'ACCO FUFU', 1, 0, 0, 'close', 5, 3, 'P', 'Cash', 0, 0, 1),
(347, '2020-01-19 19:54:38', 'Jus Maison Mixte', 1, 2.5, 2.5, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(348, '2020-01-20 07:12:00', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'close', 1, 2, 'P', 'Cash', 0, 0, 1),
(349, '2020-01-20 07:13:14', 'CAFE AU LAIT', 1, 2, 2, 'close', 1, 3, 'P', 'Cash', 0, 0, 1),
(350, '2020-01-20 07:35:07', 'PETIT DEJEUNER CONTINENTAL', 3, 4.5, 13.5, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(351, '2020-01-20 07:35:40', 'THE NOIR', 3, 2, 6, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(352, '2020-01-20 11:17:03', 'TURBO KING PF', 1, 2, 2, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(353, '2020-01-20 13:00:40', 'THE CITRONNEL', 1, 2, 2, 'close', 19, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(354, '2020-01-20 13:01:24', 'SUCRES PF', 1, 1.5, 1.5, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(355, '2020-01-20 13:02:10', 'COCA ZERO GF', 1, 2, 2, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(356, '2020-01-20 13:03:06', 'RED BULL', 1, 2.5, 2.5, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(357, '2020-01-20 13:07:43', 'SPAGHETTI VEGETAL', 1, 5, 5, 'close', 9, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(358, '2020-01-20 16:40:01', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 19, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(359, '2020-01-20 16:41:09', 'SPAGHETTI BOLOGNAISE', 1, 5, 5, 'close', 19, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(360, '2020-01-20 16:42:01', 'MITZING PF', 2, 2, 4, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(361, '2020-01-20 16:51:35', 'POULET MOZAMBICAIN', 1, 9, 9, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(362, '2020-01-20 16:56:04', 'ACCO FUFU', 1, 0, 0, 'close', 19, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(363, '2020-01-20 16:56:34', 'RIZ MAMA AFRIKA', 1, 2, 2, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(364, '2020-01-20 16:59:53', 'TANGAWIZI', 1, 2, 2, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(367, '2020-01-20 18:02:13', 'HEINEKEN', 1, 3, 3, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(368, '2020-01-20 18:02:50', 'SAVANA', 1, 4, 4, 'close', 7, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(370, '2020-01-20 18:06:47', 'BROCHETTE DE BOEUF MARINE', 1, 8, 8, 'close', 7, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(371, '2020-01-20 18:07:57', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 7, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(372, '2020-01-20 18:09:20', 'EAU GAZEUSE 0.5L', 1, 1.5, 1.5, 'close', 7, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(373, '2020-01-20 18:10:41', 'MITZING PF', 1, 2, 2, 'close', 8, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(374, '2020-01-20 18:11:06', 'BROCHETTE DE BOEUF MARINE', 1, 8, 8, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(375, '2020-01-20 18:11:30', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(376, '2020-01-20 18:17:57', 'SAVANA', 1, 4, 4, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(377, '2020-01-20 18:18:25', 'MITZING PF', 1, 2, 2, 'close', 19, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(378, '2020-01-20 19:16:50', 'SUCRES GF', 1, 2, 2, 'close', 1, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(379, '2020-01-20 19:30:00', 'ROYAL BURUNDI', 2, 3, 6, 'close', 2, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(380, '2020-01-20 19:30:52', 'SUCRES PF', 2, 1.5, 3, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(381, '2020-01-20 19:36:57', 'POULET MOZAMBICAIN', 1, 9, 9, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(382, '2020-01-20 19:38:36', 'ACCO FUFU', 1, 0, 0, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(383, '2020-01-20 19:39:11', 'ACCO SOMBE', 1, 0, 0, 'close', 3, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(384, '2020-01-20 20:40:42', 'J&B M', 10, 2.5, 25, 'close', 5, 2, 'B', 'Cash', 0, 0, 1),
(385, '2020-01-20 20:41:30', 'SUCRES PF', 3, 1.5, 4.5, 'close', 5, 2, 'B', 'Cash', 0, 0, 1),
(386, '2020-01-21 05:49:00', 'EAU KINJU 0.6L', 8, 1.5, 12, 'close', 24, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(387, '2020-01-21 05:50:27', 'EAU KINJU 0.6L', 5, 1.5, 7.5, 'close', 24, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(388, '2020-01-21 06:09:19', 'PETIT DEJEUNER CONTINENTAL', 2, 4.5, 9, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(389, '2020-01-21 06:09:48', 'THE AU LAIT', 1, 2, 2, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(390, '2020-01-21 06:22:31', 'CAFE NOIR ', 1, 2, 2, 'close', 8, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(391, '2020-01-21 07:14:30', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(392, '2020-01-21 07:15:19', 'THE NOIR', 1, 2, 2, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(393, '2020-01-21 07:34:22', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(394, '2020-01-21 07:34:47', 'CAFE AU LAIT', 1, 2, 2, 'close', 2, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(395, '2020-01-21 08:02:56', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'close', 3, 3, 'P', 'Cash', 0, 0, 1),
(396, '2020-01-21 08:03:25', 'CAFE AU LAIT', 1, 2, 2, 'close', 3, 3, 'P', 'Cash', 0, 0, 1),
(397, '2020-01-21 08:13:56', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 2, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(398, '2020-01-21 09:07:39', 'COCA ZERO GF', 1, 2, 2, 'close', 19, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(399, '2020-01-21 09:08:15', 'SUCRES PF', 1, 1.5, 1.5, 'close', 19, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(400, '2020-01-21 10:39:23', 'TILAPIA A LA CREME DE POIREAUX 15', 1, 15, 15, 'close', 8, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(401, '2020-01-21 10:42:26', 'ACCO RIZ', 1, 0, 0, 'close', 8, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(406, '2020-01-21 11:17:16', 'LENGA-LENGA', 1, 2, 2, 'close', 9, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(407, '2020-01-21 11:17:50', 'RIZ MAMA AFRIKA', 1, 2, 2, 'close', 9, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(408, '2020-01-21 11:19:43', 'POMME DE TERRE FRITES ', 1, 2, 2, 'close', 10, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(409, '2020-01-21 11:20:30', 'LENGA-LENGA', 1, 2, 2, 'close', 10, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(410, '2020-01-21 11:21:56', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 8, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(411, '2020-01-21 11:26:16', 'AMSTEL BEER', 1, 3, 3, 'close', 3, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(412, '2020-01-21 11:26:47', 'TANGAWIZI', 1, 2, 2, 'close', 3, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(413, '2020-01-21 11:37:47', 'ACCO SAUCE PROVINCIALE', 1, 0, 0, 'close', 8, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(414, '2020-01-21 12:00:33', 'COCA ZERO GF', 1, 2, 2, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(416, '2020-01-21 12:19:37', 'EAU KINJU 0.6L', 9, 1.5, 13.5, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(417, '2020-01-21 12:23:19', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(418, '2020-01-21 13:11:48', 'KUHE A LA SAUCE SALSA CRUDA 15', 1, 15, 15, 'close', 4, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(419, '2020-01-21 13:12:49', 'ACCO RIZ', 1, 0, 0, 'close', 4, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(420, '2020-01-21 13:13:16', 'CHAMPINIONS A LA CREME ', 1, 3, 3, 'close', 4, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(421, '2020-01-21 13:30:57', 'SUCRES PF', 1, 1.5, 1.5, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(422, '2020-01-21 13:56:51', 'CAFE AU LAIT', 1, 2, 2, 'close', 4, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(423, '2020-01-21 14:32:53', 'TANGAWIZI', 1, 2, 2, 'close', 4, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(424, '2020-01-21 15:10:31', 'TILAPIA A LA SAUCE PROVENCALE', 1, 30, 30, 'close', 9, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(425, '2020-01-21 15:11:31', 'ACCO RIZ', 1, 0, 0, 'close', 9, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(426, '2020-01-21 15:25:37', 'BROCHETTE DE BOEUF MARINE', 1, 8, 8, 'close', 6, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(427, '2020-01-21 15:26:10', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 6, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(428, '2020-01-21 15:38:10', 'EAU GAZEUSE 0.5L', 1, 1.5, 1.5, 'close', 6, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(429, '2020-01-21 16:02:28', 'POULET AU CURRY', 1, 9, 9, 'close', 9, 3, 'P', 'Cash', 0, 0, 1),
(430, '2020-01-21 16:03:03', 'ACCO RIZ', 1, 0, 0, 'close', 9, 3, 'P', 'Cash', 0, 0, 1),
(431, '2020-01-21 16:04:22', 'TILAPIA A LA SAUCE SALSA CRUDA 15', 1, 15, 15, 'close', 9, 3, 'P', 'Cash', 0, 0, 1),
(432, '2020-01-21 16:04:49', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 9, 3, 'P', 'Cash', 0, 0, 1),
(433, '2020-01-21 16:15:08', 'TILAPIA A LA SAUCE SALSA CRUDA 15', 1, 15, 15, 'close', 12, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(434, '2020-01-21 16:15:52', 'ACCO Banane Verte', 1, 0, 0, 'close', 12, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(435, '2020-01-21 16:56:28', 'STEAK GRILLE', 1, 7, 7, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(436, '2020-01-21 16:57:13', 'ACCO BANANE P', 1, 0, 0, 'close', 7, 3, 'P', 'Cash', 0, 0, 1),
(438, '2020-01-21 17:00:31', 'MITZING PF', 2, 2, 4, 'close', 9, 3, 'B', 'Cash', 0, 0, 1),
(439, '2020-01-21 17:25:59', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 7, 3, 'B', 'Cash', 0, 0, 1),
(440, '2020-01-21 17:51:22', 'AMSTEL BEER', 1, 3, 3, 'close', 11, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(441, '2020-01-21 17:54:26', 'BANANES VERTES', 1, 2, 2, 'close', 13, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(442, '2020-01-21 17:54:55', 'LENGA-LENGA', 1, 2, 2, 'close', 13, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(443, '2020-01-21 18:12:46', 'EAU KINJU 0.6L', 11, 1.5, 16.5, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(445, '2020-01-21 18:21:57', 'POTAGE AUX LEGUMES', 1, 3, 3, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(446, '2020-01-21 18:22:33', 'HEINEKEN', 1, 3, 3, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(447, '2020-01-21 18:50:59', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 13, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(448, '2020-01-21 19:27:13', '1/4POULET YASSA A LA SENEGALAISE', 1, 9, 9, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(449, '2020-01-21 19:27:50', 'ACCO FUFU', 1, 0, 0, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(450, '2020-01-21 19:30:42', 'POMME DE TERRE FRITES ', 1, 2, 2, 'close', 21, 3, 'P', 'Cash', 0, 0, 1),
(451, '2020-01-21 19:56:02', 'J&B M', 2, 2.5, 5, 'close', 21, 3, 'B', 'Cash', 0, 0, 1),
(452, '2020-01-21 20:00:18', 'SUCRES PF', 2, 1.5, 3, 'close', 21, 3, 'B', 'Cash', 0, 0, 1),
(454, '2020-01-22 08:25:57', 'PETIT DEJEUNER CONTINENTAL', 9, 4.5, 40.5, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(455, '2020-01-22 08:27:06', 'CAFE NOIR ', 3, 2, 6, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(456, '2020-01-22 08:27:34', 'CAFE AU LAIT', 2, 2, 4, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(457, '2020-01-22 08:28:26', 'THE GINGEMBRE', 3, 2, 6, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(458, '2020-01-22 08:29:03', 'THE CITRONNEL', 1, 2, 2, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(459, '2020-01-22 09:28:47', 'SALADES D''AVOCAT A LA FACON DU CHEF', 1, 3.5, 3.5, 'close', 2, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(460, '2020-01-22 14:50:10', 'ASSIETTES DE FRUIT NATURE', 1, 2, 2, 'close', 3, 2, 'P', 'Cash', 0, 0, 1),
(461, '2020-01-22 14:59:36', 'TILAPIA A LA SAUCE BOUILLONS 10', 1, 10, 10, 'close', 18, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(462, '2020-01-22 15:00:05', 'ACCO FUFU', 1, 0, 0, 'close', 18, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(463, '2020-01-22 15:01:02', 'ACCO LENGA-LENGA', 1, 0, 0, 'close', 18, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(464, '2020-01-22 15:33:32', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 11, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(465, '2020-01-22 15:34:49', 'FRITE BANANES PLANTAIN', 1, 2, 2, 'close', 11, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(467, '2020-01-22 16:12:18', 'SPAGHETTI BOLOGNAISE', 1, 5, 5, 'close', 3, 2, 'P', 'Cash', 0, 0, 1),
(468, '2020-01-22 16:51:56', 'PIZZA MARGUERITTE', 1, 10, 10, 'close', 2, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(470, '2020-01-22 18:00:02', 'BROCHETTE DE BOEUF MARINE', 1, 8, 8, 'close', 6, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(471, '2020-01-22 18:01:57', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 4, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(472, '2020-01-22 18:02:36', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 4, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(473, '2020-01-22 18:02:58', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 6, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(474, '2020-01-22 18:05:47', '1/4POULET MOZAMBICAINE', 1, 9, 9, 'close', 7, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(475, '2020-01-22 18:10:10', 'ACCO PETIT POIDS', 1, 0, 0, 'close', 7, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(476, '2020-01-22 18:28:15', 'PRIMUS PF', 1, 2, 2, 'close', 2, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(478, '2020-01-22 18:31:13', 'ACCO PAIN', 2, 0, 0, 'close', 8, 2, 'P', 'Cash', 0, 0, 1),
(479, '2020-01-22 18:39:58', 'SUCRES GF', 1, 2, 2, 'close', 11, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(480, '2020-01-22 18:40:20', 'ROYAL BURUNDI', 2, 3, 6, 'close', 11, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(481, '2020-01-22 18:41:14', 'FRITE BANANES PLANTAIN', 1, 2, 2, 'close', 11, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(482, '2020-01-22 18:58:05', 'LENGA-LENGA', 1, 2, 2, 'close', 7, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(484, '2020-01-22 19:14:50', 'HEINEKEN', 1, 3, 3, 'close', 4, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(485, '2020-01-22 19:16:02', 'HEINEKEN', 1, 3, 3, 'close', 6, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(486, '2020-01-22 19:16:49', 'HEINEKEN', 1, 3, 3, 'close', 4, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(487, '2020-01-22 19:19:29', 'SUCRES GF', 1, 2, 2, 'close', 8, 2, 'B', 'Cash', 0, 0, 1),
(488, '2020-01-22 19:20:03', 'POTAGE AUX LEGUMES', 1, 3, 3, 'close', 16, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(489, '2020-01-22 19:21:44', 'POTAGE AUX LEGUMES', 1, 3, 3, 'close', 8, 2, 'P', 'Cash', 0, 0, 1),
(490, '2020-01-22 19:25:11', 'EAU KINJU 0.6L', 18, 1.5, 27, 'close', 24, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(491, '2020-01-22 19:28:21', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 18, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(492, '2020-01-22 19:30:34', 'TILAPIA A LA CREME DE POIREAUX 20', 1, 20, 20, 'close', 16, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(493, '2020-01-22 19:32:44', 'ACCO RIZ', 1, 0, 0, 'close', 16, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(494, '2020-01-22 19:50:11', 'HEINEKEN', 1, 3, 3, 'close', 6, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(495, '2020-01-22 19:50:57', 'EAU GAZEUSE 0.5L', 1, 1.5, 1.5, 'close', 6, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(498, '2020-01-22 20:33:33', 'CROQUE-MONSIEUR', 1, 3.5, 3.5, 'close', 2, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(499, '2020-01-22 20:34:02', 'POTAGE AUX LEGUMES', 1, 3, 3, 'close', 2, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(500, '2020-01-22 20:34:27', 'TANGAWIZI', 1, 2, 2, 'close', 2, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(502, '2020-01-23 07:03:11', 'ROYAL BURUNDI', 1, 3, 3, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(503, '2020-01-23 07:35:47', 'PETIT DEJEUNER CONTINENTAL', 9, 4.5, 40.5, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(504, '2020-01-23 07:38:23', 'THE AU LAIT', 9, 2, 18, 'close', 1, 2, 'P', 'CrÃ©dit', 0, 0, 1),
(507, '2020-01-23 07:58:56', 'AMSTEL BEER', 2, 3, 6, 'close', 2, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(508, '2020-01-23 07:59:24', 'SUCRES PF', 2, 1.5, 3, 'close', 2, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(509, '2020-01-23 08:03:09', 'TURBO KING PF', 1, 2, 2, 'close', 3, 2, 'B', 'CrÃ©dit', 0, 0, 1),
(512, '2020-01-23 10:48:29', 'PIZZA MAFIOZA', 2, 10, 20, 'close', 1, 3, 'P', 'Cash', 0, 0, 1),
(513, '2020-01-23 11:23:39', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'close', 3, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(514, '2020-01-23 11:24:25', 'THE AU LAIT', 1, 2, 2, 'close', 3, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(516, '2020-01-23 13:17:11', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 4, 3, 'P', 'Cash', 0, 0, 1),
(517, '2020-01-23 13:17:35', 'ACCO RIZ', 1, 0, 0, 'close', 4, 3, 'P', 'Cash', 0, 0, 1),
(518, '2020-01-23 13:19:25', 'ACCO SAUCE PROVINCIALE', 1, 0, 0, 'close', 4, 3, 'P', 'Cash', 0, 0, 1),
(520, '2020-01-23 13:36:12', 'SUCRES GF', 1, 2, 2, 'close', 5, 3, 'B', 'Cash', 0, 0, 1),
(521, '2020-01-23 13:58:39', 'ASSIETTES DE FRUIT NATURE', 1, 2, 2, 'close', 3, 3, 'P', 'Cash', 0, 0, 1),
(522, '2020-01-23 14:59:41', 'SUCRES GF', 2, 2, 4, 'close', 13, 3, 'B', 'Cash', 0, 0, 1),
(523, '2020-01-23 15:00:46', 'JUS AFIA', 1, 2, 2, 'close', 4, 3, 'B', 'Cash', 0, 0, 1),
(525, '2020-01-23 16:18:06', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 10, 3, 'P', 'Cash', 0, 0, 1),
(526, '2020-01-23 16:18:34', 'ACCO RIZ', 1, 0, 0, 'close', 10, 3, 'P', 'Cash', 0, 0, 1),
(527, '2020-01-23 16:19:13', 'ACCO SAUCE PROVINCIALE', 1, 0, 0, 'close', 10, 3, 'P', 'Cash', 0, 0, 1),
(528, '2020-01-23 16:20:10', 'THE GINGEMBRE', 3, 2, 6, 'close', 11, 3, 'P', 'Cash', 0, 0, 1),
(529, '2020-01-23 16:20:56', 'CROQUE-MONSIEUR', 2, 3.5, 7, 'close', 11, 3, 'P', 'Cash', 0, 0, 1),
(530, '2020-01-23 16:30:58', 'POMME DE TERRE FRITES ', 2, 2, 4, 'close', 13, 3, 'P', 'Cash', 0, 0, 1),
(531, '2020-01-23 16:34:31', 'EMINCE DE BOEUF A LA SAUCE', 1, 7, 7, 'close', 8, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(532, '2020-01-23 16:34:57', 'ACCO FUFU', 1, 0, 0, 'close', 8, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(533, '2020-01-23 16:35:40', 'ACCO LENGA-LENGA', 1, 0, 0, 'close', 8, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(534, '2020-01-23 16:38:11', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 8, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(535, '2020-01-23 16:41:31', 'PAUSE CAFE', 13, 3.5, 45.5, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(536, '2020-01-23 16:42:40', 'EAU KINJU 0.6L', 13, 1.5, 19.5, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(537, '2020-01-23 16:50:49', 'STEAK GRILLE', 1, 7, 7, 'close', 11, 3, 'P', 'Cash', 0, 0, 1),
(538, '2020-01-23 16:51:27', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 11, 3, 'P', 'Cash', 0, 0, 1),
(541, '2020-01-23 17:20:05', 'EAU GAZEUSE 0.5L', 1, 1.5, 1.5, 'close', 11, 3, 'B', 'Cash', 0, 0, 1),
(542, '2020-01-23 17:43:46', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 7, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(543, '2020-01-23 17:44:16', 'ACCO POMMES DE T.', 1, 0, 0, 'close', 7, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(546, '2020-01-23 18:12:16', 'KUHE A LA SAUCE SALSA CRUDA 20', 1, 20, 20, 'close', 6, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(547, '2020-01-23 18:12:39', 'ACCO FUFU', 1, 0, 0, 'close', 6, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(548, '2020-01-23 18:13:22', 'ACCO BANANE P', 1, 0, 0, 'close', 6, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(549, '2020-01-23 18:13:58', 'ACCO SOMBE', 1, 0, 0, 'close', 6, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(550, '2020-01-23 18:46:06', 'POTAGE AUX LEGUMES', 1, 3, 3, 'close', 8, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(551, '2020-01-23 19:12:14', 'ROYAL BURUNDI', 2, 3, 6, 'close', 6, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(552, '2020-01-23 19:12:42', 'SUCRES GF', 1, 2, 2, 'close', 6, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(553, '2020-01-23 19:56:11', 'SUCRES GF', 1, 2, 2, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(554, '2020-01-23 20:07:15', '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 1, 9, 9, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(555, '2020-01-23 20:07:39', 'ACCO FUFU', 1, 0, 0, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(556, '2020-01-23 20:08:05', 'ACCO SOMBE', 1, 0, 0, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(557, '2020-01-23 20:09:51', 'COCA ZERO GF', 2, 2, 4, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(558, '2020-01-23 20:10:47', 'EAU KINJU 0.6L', 1, 1.5, 1.5, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(561, '2020-01-23 20:17:54', 'EAU KINJU 0.6L', 15, 1.5, 22.5, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(562, '2020-01-23 20:19:51', 'EAU KINJU 0.6L', 2, 1.5, 3, 'close', 2, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(563, '2020-01-24 06:01:58', 'PETIT DEJEUNER CONTINENTAL', 6, 4.5, 27, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(565, '2020-01-24 06:04:21', 'THE AU LAIT', 2, 2, 4, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(566, '2020-01-24 06:05:51', 'CAFE AU LAIT', 2, 2, 4, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(567, '2020-01-24 06:06:24', 'THE CITRONNEL', 2, 2, 4, 'close', 1, 3, 'P', 'CrÃ©dit', 0, 0, 1),
(568, '2020-01-24 06:09:19', 'EAU KINJU 0.6L', 6, 1.5, 9, 'close', 1, 3, 'B', 'CrÃ©dit', 0, 0, 1),
(569, '2020-01-24 07:47:14', 'PETIT DEJEUNER CONTINENTAL', 1, 4.5, 4.5, 'wait', 8, 2, 'P', '', 0, 0, 1),
(570, '2020-01-24 07:47:42', 'CAFE NOIR ', 1, 2, 2, 'wait', 8, 2, 'P', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE IF NOT EXISTS `plat` (
  `idPlat` int(11) NOT NULL AUTO_INCREMENT,
  `designPlat` varchar(50) NOT NULL,
  `puPlat` double NOT NULL,
  `idCatPlat` int(11) NOT NULL,
  PRIMARY KEY (`idPlat`),
  KEY `idCatPlat` (`idCatPlat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=198 ;

--
-- Contenu de la table `plat`
--

INSERT INTO `plat` (`idPlat`, `designPlat`, `puPlat`, `idCatPlat`) VALUES
(1, 'THE NOIR', 2, 1),
(2, 'THE AU LAIT', 2, 1),
(3, 'CAFE NOIR ', 2, 1),
(4, 'CAFE AU LAIT', 2, 1),
(5, 'THE RUSSE', 2, 1),
(6, 'OEUF DURS', 2.5, 2),
(7, 'OEUFS SUR LE PLAT', 2.5, 2),
(8, 'OEUFS BROUILLE', 2.5, 2),
(9, 'Å’UFS', 0, 2),
(10, 'OMELETTE NATURE', 2.5, 3),
(11, 'OMELETTES AUX OIGNONS', 2.5, 3),
(12, 'OMELETTES ESPQGNOL', 5, 3),
(13, 'OMELETTES SPECIALE', 4, 3),
(14, 'OMELETTES AUX JAMBO', 4, 3),
(15, 'OMELETTES AU FROMAGE', 4, 3),
(16, 'OMELETTE A LA PROVENCIAL', 5, 3),
(17, 'PETIT DEJEUNER SIMPLE', 2, 1),
(18, 'PETIT DEJEUNER CONTINENTAL', 4.5, 1),
(19, 'PETIT DEJEUNER AMERICAIN', 7, 1),
(20, 'ENTREES CHAUDES', 0, 5),
(21, 'SALADE ROMAINE A LA TOMATE ', 2, 4),
(22, 'SALADE CALIFORNIA', 4, 4),
(23, 'SALADE D''AVOCAT', 2, 4),
(24, 'OEUFS MIMOSA', 2.5, 4),
(25, 'SALADE DE TOMATTES AU BASILIC', 2.5, 4),
(26, 'PETIT PAIN A L''AIL', 1, 5),
(27, 'PAIN CHAUD A L''ITALIENNE', 2, 5),
(28, 'COQUILLE DE POISSON', 5, 5),
(29, 'SOUPE DE COURGETTE', 3, 5),
(30, 'SOUPE DE L''OIGNONS GRATINEE', 3, 5),
(31, 'FICELLES PICARDE', 3, 5),
(32, 'AUBERGINE AU CAURDON-BLEU', 3, 5),
(33, 'POTAGE AUX LEGUMES', 3, 5),
(34, 'FILET DE VEAU VAUDOISE', 8, 6),
(35, 'FILET DE VEAU AUX HARICOT ET CHAMPINIONS', 8, 6),
(36, 'FILET DE VEAU A SON JUS DE CUISSON ', 7, 6),
(37, 'EMINCE DE VEAU AUX OIGNONS', 7, 6),
(38, 'ESCALOPE AU CORDON-BLEU', 9, 6),
(39, 'FILET VEAU ESPAGNOLE', 8, 6),
(40, '1/4 POULET GRAND-MERE', 9, 7),
(41, '1/4POULET ATLANTA', 9, 7),
(42, 'POULET BASQUAISE', 9, 7),
(43, 'POULET ROTE AU FIN D''HERBES', 9, 7),
(44, '1/4POULET YASSA A LA SENEGALAISE', 9, 7),
(45, 'POULET DE BRAISE A LA CREME', 9, 7),
(46, 'POULET AU CURRY', 9, 7),
(47, 'SANGALA MEUNIER ', 9, 8),
(48, 'SANGALA A L''ITALIENNE', 9, 8),
(49, 'CAPITAINE GRAN-MERE', 11, 8),
(50, 'SANGALA A L''INDIENNE', 10, 8),
(51, 'FILET DE CAPITAINNE GRAND-MERE', 11, 8),
(52, 'FILET DE SANGALA', 9, 8),
(53, 'RIZ BLANCS', 2, 9),
(54, 'RIZ MAMA AFRIKA', 2, 9),
(55, 'POMME DE TERRE FRITES ', 2, 9),
(56, 'POMME DE TERRE SAUTEE A L''AIL', 2, 9),
(57, 'POMME DE TERRE VAPEUR', 2, 9),
(58, 'BANANES VERTES', 2, 9),
(59, 'ACCOMPAGNEMENTS', 0, 9),
(60, 'PETIT POIDS', 2, 10),
(61, 'LENGA-LENGA', 2, 10),
(62, 'EPINARD', 2, 10),
(63, 'SAKA-SAKA(sombe)', 2, 10),
(64, 'RATATOUILLE', 2, 10),
(65, 'LEGUMES SAUTEES(haricot vert.carottes.oignon)', 2, 10),
(66, 'SAUCE PROVENCALE ', 2, 11),
(67, 'CHAMPINIONS A LA CREME ', 3, 11),
(68, 'SPAGHETTI BOLOGNAISE', 5, 12),
(69, 'SPAGHETTI A LA CARBONARA', 5, 12),
(70, 'SPAGHETTI AUX JAMBONS GRATINE', 5, 12),
(71, 'MACARONI AUX JAMBONS GRATINE', 5, 12),
(72, 'SPAGHETTI AUX BASILIC ET AUX OLIVES', 5, 12),
(73, 'TRANCHES D''ANANAS', 1, 13),
(74, 'BANANES NATURE', 1, 13),
(75, 'ASSIETTES DE FRUIT NATURE', 2, 13),
(76, 'MACEDOINE FRUITS ', 2.5, 13),
(77, 'CREME NATURE', 4.5, 13),
(78, 'CREPE NATURE', 2, 13),
(79, 'CREPE A LA CONFITURE', 2.5, 13),
(80, 'CREPE SUCREE(deux piÃ¨ce)', 2, 13),
(81, 'MACEDOINE DE LEGUMES', 2.5, 15),
(82, 'SALADES MIXTES', 2.5, 15),
(83, 'SALADES D''AVOCAT A LA FACON DU CHEF', 3.5, 15),
(84, 'SANDWICH DAGOBERT', 4.5, 16),
(85, 'SANDWICH BAHARI HOTEL', 7.5, 16),
(86, 'HAMBURGER', 7.5, 16),
(87, 'CHEES HAMBURGER', 8, 16),
(88, 'SANDWICH GARNIE AU FROMAGE ET AU JAMBON ', 2.5, 16),
(89, 'CROQUE-MONSIEUR', 3.5, 16),
(90, 'CROQUE-MADAME', 4, 16),
(91, 'TRIO DE SAMBOUSA', 3.5, 17),
(92, 'SAMBOUSA A L''INDIENNE', 3.5, 17),
(93, 'PETIT  PAIN A L''AIL', 2, 17),
(94, 'ASSIETTE COMPOSEE', 5, 17),
(95, 'ASSIETTE MIXTE', 5, 17),
(96, 'PIZZA MAFIOZA', 10, 18),
(97, 'PIZZA DIAMBINO', 12, 18),
(98, 'PIZZA FANTAISIE', 10, 18),
(99, 'PIZZA VEGETARIENNE', 10, 18),
(100, 'PIZZA MARGUERITTE', 10, 18),
(101, 'BROCHETTE DE CAPITAINNE AUX LEGUMES ', 9, 8),
(102, 'BROCHETTE DE CAPITAINE GARNIE', 9, 8),
(103, 'MUKEKE GRILLE A LA CREME DE POIREAUX 10', 10, 8),
(104, 'MUKEKE GRILLE A LA SAUCE SALSA CRUDA 10', 10, 8),
(105, 'TILAPIA A LA CREME DE POIREAUX 12.5', 12.5, 8),
(106, 'KUHE A LA SAUCE SALSA CRUDA 40', 40, 8),
(107, 'MUKEKE GRILLEES AUX EPICES ET AUX AROMATES 10', 10, 8),
(108, 'BROCHETTE DE BOEUF MARINE', 8, 6),
(109, 'BROCHETTES DE CHEVRE GARNIES', 7, 6),
(110, 'BROCHETTES DE MOUTON GARNIES', 7, 6),
(111, 'STEAK GRILLE', 7, 6),
(112, '1/4POULET MOZAMBICAINE', 9, 7),
(113, '1/4POULET GRILLE A LA SAUCE SALSA CRUDA', 9, 7),
(114, 'ESCALOPE DE POULET AU THYM', 9, 7),
(115, 'FRITE BANANES PLANTAIN', 2, 9),
(116, 'COTELETTES D''AGNAEU GRILLEES', 9, 6),
(117, 'COTES D''AGNAEU A LA RATATOUILLE', 9, 6),
(118, 'FOUFOU', 2, 9),
(119, 'ESCALOPPE AU CORDON BLEU', 9, 5),
(120, 'ACCO RIZ', 0, 9),
(121, 'ACCO POMMES DE T.', 0, 9),
(122, 'ACCO BANANE P', 0, 9),
(123, 'ACCO FUFU', 0, 9),
(124, 'KUHE A LA SAUCE SALSA CRUDA 35', 35, 8),
(125, 'KUHE A LA SAUCE SALSA CRUDA 25', 25, 8),
(126, 'KUHE A LA SAUCE SALSA CRUDA 20', 20, 8),
(127, 'KUHE A LA SAUCE SALSA CRUDA 18', 18, 8),
(128, 'KUHE A LA SAUCE SALSA CRUDA 15', 15, 8),
(129, 'KUHE A LA SAUCE SALSA CRUDA 25/12.5', 12.5, 8),
(130, 'TILAPIA A LA CREME DE POIREAUX 10', 10, 8),
(131, 'TILAPIA A LA CREME DE POIREAUX 15', 15, 8),
(132, 'TILAPIA A LA CREME DE POIREAUX 20', 20, 8),
(133, 'TILAPIA A LA CREME DE POIREAUX 12', 12, 8),
(134, 'TILAPIA A LA SAUCE BOUILLONS 12', 12, 8),
(135, 'MUKEKE GRILLE A LA CREME DE POIREAUX 12.5', 12.5, 8),
(136, 'MUKEKE GRILLE A LA SAUCE SALSA CRUDA 7', 7, 8),
(137, 'MUKEKE GRILLE A LA CREME DE POIREAUX 7', 7, 8),
(138, 'THE GINGEMBRE', 2, 1),
(139, 'THE CITRONNEL', 2, 1),
(140, 'BANANE PLANTAIN FRT', 2, 9),
(141, 'BANANE VAPEUR', 2, 9),
(142, 'MUKEKE GRILLE A LA SAUCE SALSA CRUDA 12.5', 12.5, 8),
(143, 'MUKEKE GRILLEES AUX EPICES ET AUX AROMATES 7', 7, 8),
(144, 'MUKEKE GRILLEES AUX EPICES ET AUX AROMATES 12.5', 12.5, 8),
(145, 'POULET MOZAMBICAIN', 9, 7),
(146, 'TILAPIA A LA SAUCE BOUILLONS 10', 10, 8),
(147, 'TILAPIA A LA SAUCE SALSA CRUDA 10', 10, 8),
(148, 'TILAPIA A LA SAUCE SALSA CRUDA 12.5', 12.5, 8),
(149, 'TILAPIA A LA SAUCE SALSA CRUDA 12', 12, 8),
(150, 'TILAPIA A LA SAUCE SALSA CRUDA 15', 15, 8),
(151, 'TILAPIA A LA SAUCE SALSA CRUDA 20', 20, 8),
(152, 'TILAPIA A LA SAUCE BOUILLONS 12.5', 12.5, 8),
(153, 'TILAPIA A LA SAUCE BOUILLONS 15', 15, 8),
(154, 'TILAPIA A LA SAUCE BOUILLONS 20', 20, 8),
(155, 'KUHE A LA SAUCE SALSA CRUDA 35/17.5', 17.5, 8),
(156, 'KUHE A LA SAUCE SALSA CRUDA 40/20', 20, 8),
(157, 'KUHE A LA CREME DE POIREAUX 15', 15, 8),
(158, 'KUHE A LA CREME DE POIREAUX 20', 20, 8),
(159, 'KUHE A LA CREME DE POIREAUX 18', 18, 8),
(160, 'KUHE A LA CREME DE POIREAUX 35/17.5', 17.5, 8),
(161, 'KUHE A LA CREME DE POIREAUX 25/12.5', 12.5, 8),
(162, 'KUHE A LA CREME DE POIREAUX 25', 25, 8),
(163, 'KUHE A LA CREME DE POIREAUX 35', 35, 8),
(164, 'KUHE A LA CREME DE POIREAUX 40', 40, 8),
(165, 'KUHE A LA SAUCE BOUILLONS 15', 10, 8),
(166, 'KUHE A LA SAUCE BOUILLONS 35/17.5', 17.5, 8),
(167, 'KUHE A LA SAUCE BOUILLONS 18', 18, 8),
(168, 'KUHE A LA SAUCE BOUILLONS 40/20', 20, 8),
(169, 'KUHE A LA SAUCE BOUILLONS 20', 20, 8),
(170, 'KUHE A LA SAUCE BOUILLONS 25', 25, 8),
(171, 'KUHE A LA SAUCE BOUILLONS 35', 35, 8),
(172, 'KUHE A LA SAUCE BOUILLONS 40', 40, 8),
(173, 'KUHE A LA CREME DE POIREAUX 40/20', 20, 8),
(174, 'ACCO Banane Verte', 0, 9),
(175, 'ACCO LENGA-LENGA', 0, 9),
(176, 'ACCO SOMBE', 0, 9),
(177, 'ACCO PETIT POIDS', 0, 9),
(178, 'ACCO LEGUME SAUTE', 0, 9),
(179, 'ACCO HARICOT BLANC', 0, 9),
(180, 'ACCO HARICOT VERT', 0, 9),
(181, 'ACCO SAUCE PROVINCIALE', 0, 9),
(182, 'ACCO SPAGHETTI', 0, 9),
(183, 'ACCO PAIN', 0, 9),
(184, 'BUFFET', 13.5, 14),
(185, 'PAUSE CAFE', 3.5, 14),
(186, 'SAUCISSE', 3, 6),
(187, 'FILET DE CAPITAINE GRILLE', 9, 8),
(188, 'FILET DE CAPITAINE A LA SAUCE GRILLE', 9, 8),
(189, 'Jus Maison', 2.5, 4),
(190, 'Jus Maison Mixte', 2.5, 4),
(191, 'PIZZA AU POULET', 12, 18),
(192, 'EMINCE DE BOEUF A LA SAUCE', 7, 6),
(193, 'SPAGHETTI VEGETAL', 5, 12),
(194, 'SPAGHETTI VEGETAL', 0, 9),
(195, 'TILAPIA A LA SAUCE PROVENCALE', 30, 8),
(196, 'ACCO RIZ MAMA AFRIKA', 0, 9),
(197, 'TILAPIA GRILLE', 30, 8);

-- --------------------------------------------------------

--
-- Structure de la table `pointvente`
--

CREATE TABLE IF NOT EXISTS `pointvente` (
  `idPv` int(11) NOT NULL AUTO_INCREMENT,
  `libPv` varchar(50) NOT NULL,
  PRIMARY KEY (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `pointvente`
--

INSERT INTO `pointvente` (`idPv`, `libPv`) VALUES
(1, 'Restaurant Bar'),
(2, 'Night Club');

-- --------------------------------------------------------

--
-- Structure de la table `prodboiss`
--

CREATE TABLE IF NOT EXISTS `prodboiss` (
  `idBoiss` int(11) NOT NULL AUTO_INCREMENT,
  `designBoiss` varchar(50) NOT NULL,
  `qnteBoiss` double NOT NULL,
  `nbUniteBoiss` double NOT NULL,
  `valUnitBoiss` int(11) NOT NULL,
  `puBoiss` double NOT NULL,
  `idCatBoiss` smallint(2) NOT NULL,
  PRIMARY KEY (`idBoiss`),
  KEY `idCatBoiss` (`idCatBoiss`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Contenu de la table `prodboiss`
--

INSERT INTO `prodboiss` (`idBoiss`, `designBoiss`, `qnteBoiss`, `nbUniteBoiss`, `valUnitBoiss`, `puBoiss`, `idCatBoiss`) VALUES
(1, 'AMSTEL BOCK', 0, 12, 0, 2, 1),
(2, 'AMSTEL BEER', 0, 12, 0, 3, 1),
(3, 'CASTEL BEER', 0, 12, 0, 3, 1),
(4, 'DOPEL', 0, 12, 0, 3, 1),
(5, 'GUINESS', 0, 6, 0, 4, 1),
(6, 'LEGENDE', 1, 20, 20, 2, 1),
(7, 'BAVARIA', 0, 6, 0, 3, 1),
(8, 'ROYAL BURUNDI', 0, 20, 0, 3, 1),
(9, 'HEINEKEN', 0, 24, 0, 3, 1),
(10, 'MITZING GF', 0, 12, 0, 3, 1),
(11, 'PRIMUS BURUNDI PF', 0, 12, 0, 2, 1),
(12, 'PRIMUS BURUNDI GF', 1, 20, 20, 3, 1),
(13, 'SIMBA', 0, 12, 0, 3, 1),
(14, 'SKOL', 0, 12, 0, 3, 1),
(15, 'SUPER BOCK', 0, 12, 0, 3, 1),
(16, 'TEMBO', 0, 12, 0, 3, 1),
(17, 'TURBO KING GF', 1, 12, 12, 3, 1),
(18, 'TURBO KING PF', 1, 20, 20, 2, 1),
(22, 'COCA ZERO PF', 1, 24, 24, 1.5, 2),
(23, 'SUCRES PF', 0, 24, 0, 1.5, 2),
(24, 'SUCRES GF', 0, 20, 0, 2, 2),
(28, 'RED BULL', 0, 4, 0, 2.5, 3),
(29, 'KING FISH', 5, 6, 30, 3, 3),
(30, 'TANGAWIZI', 4, 20, 80, 2, 3),
(31, 'ENERGY MALT', 2, 20, 40, 2, 3),
(32, 'LAIT YAOURT', 0, 6, 0, 1.5, 3),
(33, 'EAU KINJU 0.6L', 0, 12, 0, 1.5, 4),
(34, 'EAU GAZEUSE 0.5L', 0, 12, 0, 1.5, 4),
(35, 'JUS DE FRUIT ', 0, 0, 0, 2.5, 5),
(36, 'NEDERBURG ROSE', 0, 4, 0, 30, 7),
(37, 'ROSE D''ANJOU', 0, 4, 0, 30, 7),
(38, 'MUSCADOR', 2, 1, 2, 25, 7),
(39, 'CHANDOR', 1, 1, 1, 25, 7),
(40, 'NEDERBURG CHARDON', 0, 4, 0, 30, 8),
(41, 'BARON D''AROGNAC', 1, 1, 1, 35, 8),
(42, 'MARTINI BLANC', 1, 1, 1, 30, 8),
(43, 'DROSDY GF', 2, 2, 4, 20, 9),
(44, 'DROSDY PF', 3, 2, 6, 10, 9),
(45, 'CELAR COSK GF', 2, 1, 2, 20, 9),
(46, 'CELAR COSK PF', 3, 1, 3, 10, 9),
(47, 'VIN DE MESSE', 0, 1, 0, 30, 9),
(48, 'NEDERBURG CABERNET ', 0, 1, 0, 35, 9),
(49, 'VIN CARNIS', 0, 1, 0, 35, 9),
(50, 'FOUR COUSINS', 0, 1, 0, 40, 9),
(51, 'MARTINI ROUGE', 0, 1, 0, 30, 9),
(52, 'CHAMPAGNE AVEC ALCOOL', 0, 1, 0, 30, 10),
(53, 'JC LE ROUX BRUN GRD', 0, 1, 0, 30, 10),
(54, 'JC LE ROUX ROSE', 0, 1, 0, 30, 10),
(55, 'LAURENT PERRIER BRUT', 0, 1, 0, 120, 11),
(56, 'MOET ET CHANDON BRUT', 0, 1, 0, 120, 11),
(57, 'AMARULA GF', 1, 1, 1, 40, 12),
(58, 'AMARULA PF', 0, 1, 0, 20, 12),
(59, 'RED LABEL', 0, 1, 0, 50, 12),
(60, 'BLACK LABEL', 0, 1, 0, 70, 12),
(61, 'DOUBLE BLACK ', 0, 1, 0, 90, 12),
(62, 'JACK DANIEL', 0, 1, 0, 4.5, 12),
(63, 'CHIVAS', 1, 1, 1, 4.5, 12),
(64, 'KWV', 0, 1, 0, 4.5, 12),
(65, 'GIN GORDON', 0, 1, 0, 2.5, 12),
(66, 'KING ROBERT', 0, 1, 0, 2.5, 12),
(67, 'HUNTERS CHOICE', 0, 1, 0, 2, 12),
(68, 'J&B', 0, 1, 0, 2.5, 12),
(69, 'VODKA', 0, 1, 0, 3, 12),
(70, 'RICHARD', 0, 1, 0, 3, 12),
(71, 'COGNAC', 0, 1, 0, 3, 13),
(72, 'KAVALDOR', 0, 1, 0, 3, 13),
(73, 'CAPPUCCINNO', 0, 1, 0, 3, 14),
(74, 'CAFFE EXPRESSO', 0, 1, 0, 3, 14),
(75, 'CHOCOLAT CHAUD', 0, 1, 0, 3, 14),
(76, 'BLACK LABEL M', 1, 25, 25, 4, 12),
(77, 'DOUBLE BLACK M', 0, 25, 0, 4.5, 12),
(78, 'JACK DANIEL M', 0, 25, 0, 4.5, 12),
(79, 'CHIVAS M', 1, 25, 25, 4.5, 12),
(80, 'KWV M', 0, 25, 0, 4.5, 12),
(81, 'GIN GORDON M', 0, 25, 0, 2.5, 12),
(82, 'KING ROBERT M', 0, 25, 0, 2.5, 12),
(83, 'HUNTERS CHOICE M ', 0, 25, 0, 2, 12),
(84, 'J&B M', 0, 25, 0, 2.5, 12),
(85, 'VODKA M', 0, 25, 0, 3, 12),
(86, 'RICHARD M', 0, 25, 0, 3, 12),
(87, 'COGNAC M', 0, 25, 0, 3, 13),
(88, 'KAVALDOR M', 0, 25, 0, 3, 13),
(89, 'PRIMUS GF', 0, 12, 0, 3, 1),
(90, 'PRIMUS PF', 1, 20, 20, 2, 1),
(91, 'MOUTON CADET BLANC', 0, 1, 0, 35, 12),
(92, 'MARTINI BLANC M', 0, 25, 0, 2.5, 8),
(93, 'RED LABEL M', 0, 25, 0, 2.5, 12),
(94, 'ABSOLUTE CITRON', 0, 1, 0, 40, 12),
(95, 'ABSOLUTE VODKA M', 0, 25, 0, 3, 12),
(96, 'MITZING PF', 0, 24, 0, 2, 1),
(97, 'COCA ZERO GF', 0, 12, 0, 2, 2),
(98, 'JUS AFIA', 0, 12, 0, 2, 6),
(99, 'ABSOLUTE CITRON M', 0, 25, 0, 3, 12),
(100, 'SAVANA', 0, 6, 0, 4, 1),
(101, 'ALTER WINE', 2, 1, 2, 30, 9);

-- --------------------------------------------------------

--
-- Structure de la table `prodnour`
--

CREATE TABLE IF NOT EXISTS `prodnour` (
  `idNour` int(11) NOT NULL AUTO_INCREMENT,
  `designNour` varchar(50) NOT NULL,
  `qnteNour` double NOT NULL,
  `puNour` double NOT NULL,
  `nbUniteNour` int(11) NOT NULL,
  `valUnitNour` double NOT NULL,
  `unite` varchar(20) NOT NULL,
  `idCatNour` smallint(2) NOT NULL,
  PRIMARY KEY (`idNour`),
  KEY `idCatNour` (`idCatNour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=130 ;

--
-- Contenu de la table `prodnour`
--

INSERT INTO `prodnour` (`idNour`, `designNour`, `qnteNour`, `puNour`, `nbUniteNour`, `valUnitNour`, `unite`, `idCatNour`) VALUES
(2, 'POULLET', 5.75, 10.7, 4, 27, 'portion', 8),
(3, 'FILLET DE VEAU ', 0, 0, 1000, 0, 'gramme', 1),
(4, 'COTELLETE DE VEAU', 0, 0, 1000, 0, 'gramme', 1),
(5, 'COTELLETE DE PORC', 0, 0, 1000, 0, 'gramme', 1),
(6, 'COTELLETE D''AGNEAU', 0, 0, 1000, 0, 'gramme', 1),
(7, 'VIANDE HACHEE', 0, 0, 1000, 0, 'gramme', 1),
(8, 'JAMBON DE BOEUF', 1.5, 7.5, 1000, 1500, 'gramme', 1),
(9, 'LARD FUME', 0, 0, 1000, 0, 'gramme', 1),
(10, 'SAUSSISSON', 0.1, 5.2, 1000, 600, 'gramme', 1),
(11, 'VIANDE DE BOEUF', 0, 0, 1000, 0, 'gramme', 1),
(12, 'VIANDE DE CHEVRE', 0, 0, 1000, 0, 'gramme', 1),
(13, 'MOUTON', 0, 0, 1000, 0, 'gramme', 1),
(14, 'MUKEKE 12.5', 0, 0, 1, 0, 'pieces', 2),
(15, 'KUHE 800g', 1, 0, 1, 1, 'pieces', 2),
(16, 'KIBONDES', 0, 0, 1, 0, 'pieces', 2),
(17, 'TILAPIA 1800g', 1, 0, 1, 1, 'pieces', 2),
(18, 'FILLET DE CAPITAINE', 8, 0, 1000, 9000, 'gramme', 2),
(19, 'FILLET DE SANGALA', 0, 0, 1000, 0, 'gramme', 2),
(20, 'OEUFS', 5, 3.82, 30, 150, 'pieces', 6),
(21, 'FROMAGE', 0, 0, 1000, 1000, 'gramme', 6),
(26, 'CARROTES', 0.3, 0, 1000, 300, 'gramme', 3),
(27, 'POIVRONS', 0.5, 0, 1000, 1000, 'gramme', 3),
(28, 'POIRREAUX', 0, 0, 1, 0, 'pieces', 3),
(29, 'HARICOT VERT', 0, 0, 1000, 0, 'gramme', 3),
(30, 'TOMATE FRAICHE', 0, 0, 1000, 1000, 'gramme', 3),
(32, 'OIGNON BLANC', 0.7, 3.3, 1000, 1700, 'gramme', 4),
(33, 'OIGNONS ROUGE', 0, 0, 1000, 0, 'gramme', 4),
(35, 'CONCOMBRE', 6, 0, 1000, 9000, 'gramme', 3),
(36, 'BANANE', 0, 0, 1, 0, 'pieces', 3),
(37, 'BANANE VERT', 0, 0, 1000, 0, 'gramme', 3),
(38, 'COURGETTE', 0, 0, 1000, 0, 'gramme', 3),
(39, 'AUBERGINE', 0.8, 0.5, 1000, 1800, 'gramme', 3),
(40, 'CUBE MAGI', 0, 0, 50, 50, 'pieces', 4),
(41, 'TILAPIA 1300g', 3, 0, 1, 4, 'pieces', 2),
(42, 'HUILE D''OLIVE', 1, 0, 100, 100, 'cl', 6),
(43, 'OLIVE VERT', 2, 0, 34, 68, 'pieces', 6),
(44, 'CHAMPIGNONS', 0, 0, 4, 0, 'pieces', 4),
(45, 'OLIVE NOIR', 3, 0, 34, 102, 'pieces', 6),
(46, 'PETIT POIDS', 1, 0, 1000, 2000, 'gramme', 3),
(47, 'POMME DE TERRE', 12, 1.05, 1000, 12000, 'gramme', 6),
(49, 'PASTEQUES', 7, 4.1, 1, 7, 'pieces', 5),
(52, 'AVOCAT', 19, 0.41, 1, 19, 'pieces', 5),
(54, 'CITRONS', 6.9, 2.87, 1, 7.4, 'pieces', 5),
(55, 'HUILE DE COUSINE COOKIE', 24, 27, 100, 2400, 'cl', 7),
(58, 'LAIT DE LA CUISINE', 0, 0, 1000, 0, 'gramme', 6),
(59, 'CAFE DU BURUNDI', 2, 5.5, 1, 3, 'pieces', 6),
(61, 'SPAGHETTI', 0, 0, 500, 500, 'gramme', 6),
(63, 'KETCHUP', 0, 0, 1000, 1000, 'gramme', 6),
(65, 'MAGGI POULET', 9, 0, 1, 10, 'pieces', 4),
(66, 'SUCRES ORDINAIRES', 4.25, 0.8, 1000, 5250, 'gramme', 6),
(67, 'FARINE DE MANIOC', 2, 0, 1000, 3000, 'gramme', 6),
(68, 'FARINE DE MAIS', 8, 0, 1000, 9000, 'gramme', 6),
(69, 'RIZ', 18, 0, 1000, 19000, 'gramme', 6),
(70, 'MAYONAISE', 2, 3, 500, 1500, 'gramme', 6),
(71, 'FARINE DE FROMENT', 4, 0, 1000, 5000, 'gramme', 6),
(74, 'MACARONI', 3, 0, 1, 3, 'pieces', 3),
(76, 'SUCRE VANILE', 5, 0, 5, 50, 'pieces', 6),
(78, 'HARICOT BLANC', 0, 0, 1000, 0, 'gramme', 3),
(81, 'TEA BAGS', 3, 0, 50, 150, 'pieces', 6),
(85, 'MOUTARD', 0, 0, 19, 19, 'pieces', 6),
(87, 'SWEET CORN', 2, 0, 1, 2, 'bouteilles', 6),
(88, 'CREAM FRESH', 0, 0, 4, 0, 'pieces', 6),
(89, 'TOMATE CONCENTRE', 62, 0, 1, 64, 'pieces', 4),
(92, 'BANANE GROS MICHEL', 10, 0.17, 1, 10, 'pieces', 5),
(95, 'BANAME PLANTAIN', 1.7, 0, 1000, 4700, 'gramme', 6),
(96, 'FILET DE BOEUF', 4, 5.89, 1000, 4000, 'gramme', 1),
(97, 'KUHE 1600g', 1, 11.4, 1, 2, 'pieces', 2),
(98, 'KUHE 1000g', 1, 0, 1, 2, 'pieces', 2),
(99, 'GINGEMBRE', 0, 0, 1000, 0, 'gramme', 6),
(100, 'CURRY', 0, 0, 10, 0, 'pieces', 6),
(101, 'BLUE BAND', 2, 6, 1000, 2000, 'gramme', 6),
(102, 'MAÃS DOUX', 0, 0, 4, 0, 'pieces', 4),
(103, 'KUHE 1800g', 2, 17.3, 1, 4, 'pieces', 2),
(104, 'KUHE 500g', 0, 10, 1, 1, 'pieces', 2),
(105, 'TILAPIA 1600g', 0, 0, 1, 0, 'pieces', 2),
(106, 'TILAPIA 1000g', 4, 8.11, 1, 4, 'pieces', 2),
(107, 'TILAPIA 800g', 3, 7, 1, 4, 'pieces', 2),
(108, 'TILAPIA 500g', 0, 0, 1, 0, 'pieces', 2),
(109, 'MUKEKE 10', 0, 0, 1, 0, 'pieces', 2),
(110, 'MUKEKE 7', 0, 0, 1, 0, 'pieces', 2),
(111, 'KUHE 1300g', 0, 0, 1, 0, 'pieces', 2),
(112, 'ORANGE', 20, 1.6, 1, 20, 'pieces', 5),
(113, 'ANANAS', 4, 0, 1, 4, 'pieces', 5),
(114, 'MANGUE', 8, 0.58, 1, 8, 'pieces', 5),
(115, 'SOMBE', 0, 0, 1, 0, 'pieces', 3),
(116, 'LENGALENGA', 0, 0, 1, 0, 'pieces', 3),
(117, 'TOMATES FRAICHE', 62, 0.17, 1, 62, 'pieces', 4),
(118, 'LECTUS', 0, 0, 0, 0, 'pieces', 4),
(119, 'SELERIS', 0, 0, 0, 0, 'pieces', 4),
(120, 'PERSILES', 0, 0, 0, 0, 'pieces', 4),
(121, 'PUMENTS', 0, 0, 0, 0, 'pieces', 4),
(122, 'PAPRICA', 0, 0, 0, 0, 'pieces', 4),
(123, 'MASALA BEEF', 1, 0, 1, 1, 'pieces', 4),
(124, 'MASALA FISH', 0, 0, 0, 0, 'pieces', 4),
(125, 'MASALA CHIKEN', 0, 0, 0, 0, 'pieces', 4),
(126, 'COLIANDRE', 0, 0, 0, 0, 'pieces', 4),
(127, 'EPINARDS', 0, 0, 0, 0, 'pieces', 3),
(128, 'DONGO DONGO', 0, 0, 0, 0, 'pieces', 3),
(129, 'CHOUX', 0, 0, 0, 0, 'pieces', 3);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(100) DEFAULT NULL,
  `room_code` int(11) DEFAULT NULL,
  `room_prix` double DEFAULT NULL,
  `autre_info` varchar(100) DEFAULT NULL,
  `niveau` int(11) NOT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `motif` varchar(50) NOT NULL,
  `idCatCh` smallint(2) NOT NULL,
  `idVue` smallint(2) NOT NULL,
  PRIMARY KEY (`id_room`),
  KEY `idCatCh` (`idCatCh`),
  KEY `idVue` (`idVue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`id_room`, `room_type`, `room_code`, `room_prix`, `autre_info`, `niveau`, `statut`, `motif`, `idCatCh`, `idVue`) VALUES
(1, 'Chambre à un lit', 101, 80, 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete', 1, 1),
(2, 'Chambre à deux lits', 206, 140, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 2, 2),
(3, 'Chambre à un lit', 202, 100, 'Petit déjeuner et piscine compris', 2, 'Hors usage', 'Nettoyage', 1, 2),
(4, 'Chambre à un lit', 208, 100, 'Petit déjeuner et piscine compris', 2, 'Hors usage', 'Nettoyage', 1, 2),
(5, 'Chambre à un lit', 210, 100, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 1, 2),
(6, 'Chambre à un lit', 107, 80, 'Petit déjeuner et piscine compris', 1, 'Busy', 'OccupÃ©e', 1, 1),
(7, 'Chambre à un lit', 213, 80, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 1, 1),
(8, 'Chambre à deux lits', 209, 120, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 2, 1),
(9, 'Chambre de luxe', 203, 120, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 2, 1),
(10, 'Chambre à deux lits', 103, 120, 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete', 2, 1),
(11, 'Chambre à deux lits', 104, 140, 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete', 2, 2),
(12, 'Chambre à deux lits', 105, 120, 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete', 2, 1),
(13, 'Chambre à un lit', 205, 80, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 1, 1),
(14, 'Chambre à un lit', 109, 80, 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete', 1, 1),
(15, 'Chambre à un lit', 201, 80, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 1, 1),
(16, 'Chambre à un lit', 207, 80, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 1, 1),
(17, 'Chambre à un lit', 102, 100, 'Petit déjeuner et piscine compris', 1, 'Busy', 'OccupÃ©e', 1, 2),
(18, 'Chambre à un lit', 110, 100, 'Petit déjeuner et piscine compris', 1, 'Busy', 'OccupÃ©e', 1, 2),
(19, 'Chambre à un lit', 108, 100, 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete', 1, 2),
(20, 'Chambre à un lit', 204, 100, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 1, 2),
(21, 'Chambre à un lit', 106, 100, 'Petit déjeuner et piscine compris', 1, 'Busy', 'OccupÃ©e', 1, 2),
(22, 'Chambre à trois lits', 214, 180, 'Petit déjeuner et piscine compris', 0, 'Disponible', 'prete', 3, 1),
(23, 'Mi-suite', 112, 200, 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete', 3, 2),
(24, 'Mi-suite', 111, 180, 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete', 3, 1),
(25, 'Mi-suite', 215, 180, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 3, 1),
(26, 'Suite', 212, 300, 'Petit déjeuner et piscine compris', 2, 'Disponible', 'prete', 4, 2),
(27, 'Chambre de luxe', 105, 100, 'La chambre comporte deux lits, un petit salon, une TV,...', 2, 'Disponible', 'prete', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `idSalle` int(11) NOT NULL AUTO_INCREMENT,
  `nomSalle` varchar(255) DEFAULT NULL,
  `prixSalle` double NOT NULL,
  PRIMARY KEY (`idSalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`idSalle`, `nomSalle`, `prixSalle`) VALUES
(1, 'Salle de confÃ©rence', 300);

-- --------------------------------------------------------

--
-- Structure de la table `sauna`
--

CREATE TABLE IF NOT EXISTS `sauna` (
  `idSauna` int(11) NOT NULL AUTO_INCREMENT,
  `designSauna` varchar(20) NOT NULL,
  `qteSauna` int(11) NOT NULL,
  `puSauna` double NOT NULL,
  `ptSauna` double NOT NULL,
  `dateSauna` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modePaie` varchar(20) NOT NULL,
  `id_client` int(11) NOT NULL,
  `accompte` double NOT NULL,
  `reste` double NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`idSauna`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `sauna`
--

INSERT INTO `sauna` (`idSauna`, `designSauna`, `qteSauna`, `puSauna`, `ptSauna`, `dateSauna`, `modePaie`, `id_client`, `accompte`, `reste`, `type`) VALUES
(1, 'Sauna', 1, 10, 10, '2020-01-11 21:21:30', 'CrÃ©dit', 18, 0, 10, 'CrÃ©dit'),
(2, 'Piscine', 1, 8, 8, '2020-01-11 21:22:57', 'Cash', 3, 8, 0, 'EspÃ¨ces'),
(3, 'Massage', 1, 10, 10, '2020-01-11 21:24:16', 'Cash', 3, 10, 0, 'EspÃ¨ces'),
(4, 'Massage', 1, 10, 10, '2020-01-12 14:36:56', 'Cash', 3, 10, 0, 'EspÃ¨ces'),
(5, 'Massage', 1, 10, 10, '2020-01-12 16:33:27', 'Cash', 3, 10, 0, 'EspÃ¨ces'),
(6, 'Massage', 1, 10, 10, '2020-01-18 16:41:13', 'Cash', 3, 10, 0, 'EspÃ¨ces'),
(7, 'Massage', 1, 10, 10, '2020-01-19 13:01:19', 'Cash', 3, 10, 0, 'EspÃ¨ces'),
(8, 'Piscine', 1, 15, 15, '2020-01-23 16:01:11', 'CrÃ©dit', 3, 0, 15, 'EspÃ¨ces'),
(9, 'Piscine', 1, 5, 5, '2020-01-23 16:03:34', 'CrÃ©dit', 3, 0, 5, 'EspÃ¨ces'),
(10, 'Massage', 1, 10, 10, '2020-01-23 17:07:38', 'Cash', 3, 10, 0, 'EspÃ¨ces'),
(11, 'Piscine', 1, 5, 5, '2020-01-24 07:26:55', 'Cash', 3, 5, 0, 'EspÃ¨ces');

-- --------------------------------------------------------

--
-- Structure de la table `serveur`
--

CREATE TABLE IF NOT EXISTS `serveur` (
  `id_serveur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_serveur` varchar(200) DEFAULT NULL,
  `sexe_serveur` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `etatCivil` varchar(20) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `telServeur` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `piece` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `numPiece` varchar(100) DEFAULT NULL,
  `lieuDel` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dateDel` date DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_serveur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `serveur`
--

INSERT INTO `serveur` (`id_serveur`, `nom_serveur`, `sexe_serveur`, `etatCivil`, `pays`, `telServeur`, `email`, `adresse`, `piece`, `numPiece`, `lieuDel`, `dateDel`, `photo`) VALUES
(2, 'Alexy', 'M', 'MariÃ©', 'Burundi', '+25769033951', 'alexy@gmail.com', 'Burundi', 'Autre', '0210/55.413', 'Bujumbura', '2012-02-24', 'ALEXIS RESTO.jpg'),
(3, 'CLAUDE LUHUTA', 'M', 'CÃ©libataire', 'Congo_democratique', '000000000', 'claude@gmail.com', 'Uvira', 'Carte d''Ã©lecteur', '620121', 'Uvira', '2017-02-26', 'CLAUDE LUHUTA.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id_service`, `service_name`) VALUES
(1, 'Restaurant'),
(2, 'Sauna-Gym-Piscine'),
(3, 'Reception'),
(4, 'Night Club'),
(5, 'Economat'),
(6, 'House keeping');

-- --------------------------------------------------------

--
-- Structure de la table `service_location`
--

CREATE TABLE IF NOT EXISTS `service_location` (
  `id_service_loc` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_service` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `prix_service` double DEFAULT NULL,
  `quantite_service` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `observation` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id_service_loc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sortiebanque`
--

CREATE TABLE IF NOT EXISTS `sortiebanque` (
  `idSortieBanque` int(11) NOT NULL AUTO_INCREMENT,
  `agent` varchar(50) NOT NULL,
  `montantSortieBanque` double NOT NULL,
  `motifSortieBanque` varchar(255) NOT NULL,
  `dateSortieBanque` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doc` varchar(255) NOT NULL,
  PRIMARY KEY (`idSortieBanque`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sortieboiss`
--

CREATE TABLE IF NOT EXISTS `sortieboiss` (
  `idSorBoiss` int(11) NOT NULL AUTO_INCREMENT,
  `qnteSort` int(11) NOT NULL,
  `dateSort` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idBoiss` int(11) NOT NULL,
  `idPv` int(11) NOT NULL,
  `idCom` int(11) NOT NULL,
  PRIMARY KEY (`idSorBoiss`),
  KEY `idBoiss` (`idBoiss`),
  KEY `idPv` (`idPv`),
  KEY `idCom` (`idCom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `sortieboiss`
--

INSERT INTO `sortieboiss` (`idSorBoiss`, `qnteSort`, `dateSort`, `idBoiss`, `idPv`, `idCom`) VALUES
(1, 1, '2020-01-04 21:56:39', 9, 1, 1),
(2, 1, '2020-01-04 21:57:29', 23, 1, 2),
(3, 1, '2020-01-04 21:57:34', 98, 1, 3),
(4, 1, '2020-01-04 21:57:39', 97, 1, 4),
(5, 1, '2020-01-04 21:57:42', 33, 1, 5),
(6, 1, '2020-01-05 16:53:37', 23, 1, 6),
(7, 1, '2020-01-05 16:53:46', 33, 1, 7),
(8, 1, '2020-01-12 14:10:29', 33, 1, 10),
(9, 1, '2020-01-12 14:28:02', 28, 1, 12),
(10, 1, '2020-01-12 14:33:59', 23, 1, 9),
(11, 1, '2020-01-12 14:38:25', 29, 1, 11),
(12, 1, '2020-01-13 08:04:29', 10, 1, 15),
(13, 1, '2020-01-13 08:04:47', 100, 1, 16),
(14, 1, '2020-01-13 08:05:01', 28, 1, 18),
(15, 1, '2020-01-13 08:05:10', 8, 1, 19),
(16, 1, '2020-01-13 08:05:17', 24, 1, 17),
(17, 1, '2020-01-13 08:45:44', 8, 1, 20),
(18, 2, '2020-01-13 09:05:12', 33, 1, 24),
(19, 4, '2020-01-14 21:28:06', 33, 1, 31),
(20, 1, '2020-01-17 12:59:16', 58, 1, 38),
(21, 1, '2020-01-17 12:59:28', 34, 1, 35),
(22, 1, '2020-01-17 12:59:36', 33, 1, 34),
(23, 1, '2020-01-17 13:57:00', 23, 1, 33),
(24, 2, '2020-01-18 10:14:32', 33, 1, 40),
(25, 2, '2020-01-20 19:59:24', 33, 1, 45),
(26, 2, '2020-01-21 17:19:55', 33, 1, 47),
(27, 1, '2020-01-21 17:20:19', 23, 1, 48),
(28, 1, '2020-01-21 17:20:27', 2, 1, 46),
(29, 1, '2020-01-22 10:01:28', 33, 1, 52),
(30, 1, '2020-01-23 14:54:15', 24, 1, 41),
(31, 1, '2020-01-23 14:54:23', 2, 1, 42),
(32, 1, '2020-01-23 14:54:41', 33, 1, 55),
(33, 1, '2020-01-23 14:58:13', 98, 1, 68),
(34, 2, '2020-01-23 15:11:09', 33, 1, 53);

-- --------------------------------------------------------

--
-- Structure de la table `sortiecaisse`
--

CREATE TABLE IF NOT EXISTS `sortiecaisse` (
  `idSortieCaiss` int(11) NOT NULL AUTO_INCREMENT,
  `montantSortie` double NOT NULL,
  `motifSortie` varchar(255) NOT NULL,
  `dateSortie` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `agent` varchar(50) NOT NULL,
  PRIMARY KEY (`idSortieCaiss`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Contenu de la table `sortiecaisse`
--

INSERT INTO `sortiecaisse` (`idSortieCaiss`, `montantSortie`, `motifSortie`, `dateSortie`, `agent`) VALUES
(1, 7, 'Ration personnel', '2020-01-20 19:16:12', 'HERADI'),
(2, 3, 'Beignet personnel', '2020-01-20 19:17:02', 'ARISTOTE'),
(3, 1.17, 'UnitÃ©s rÃ©ception', '2020-01-20 19:18:07', 'VICKY'),
(4, 0.88, 'Achat pain', '2020-01-20 19:18:42', 'CLAUDE'),
(5, 0.88, 'Achat oeufs', '2020-01-20 19:19:09', 'CLAUDE'),
(6, 30, 'Location aspirateur', '2020-01-20 19:20:13', 'ISSA'),
(7, 30, 'Main d''oeuvre aspirateur', '2020-01-20 19:20:53', 'ISSA'),
(8, 10, 'Acompte OMARY', '2020-01-20 19:23:30', 'OMARY'),
(9, 200, 'Achat nourritures', '2020-01-20 19:30:20', 'JC'),
(10, 88, 'Achat boissons', '2020-01-20 19:30:43', 'JC'),
(11, 7, 'Ration personnels', '2020-01-21 08:35:58', 'AMURI'),
(12, 3, 'Beignet personnels', '2020-01-21 08:36:31', 'CLAUDE'),
(13, 1.17, 'UnitÃ©s rÃ©ception', '2020-01-21 08:37:21', 'VICKY'),
(14, 0.88, 'Achat pain', '2020-01-21 08:37:52', 'ARISTOTE'),
(15, 3, 'Transport compte', '2020-01-21 08:38:12', 'DONATIEN'),
(16, 3, 'UnitÃ©s compte', '2020-01-21 08:38:38', 'DONATIEN'),
(17, 2811, 'Paiement informaticien', '2020-01-21 16:08:17', 'OMARY'),
(18, 80, 'Paiement dette INPP', '2020-01-21 16:08:43', 'KABONGO'),
(19, 5, 'Paiement maÃ§on', '2020-01-21 16:09:16', 'ISSA'),
(20, 5.88, 'RÃ©lation publique', '2020-01-21 16:09:40', 'ISSA'),
(21, 16, 'achat poissons', '2020-01-21 18:27:01', 'jc'),
(22, 7, 'Ration personnel', '2020-01-22 08:29:51', 'AMURI'),
(23, 3, 'Beignet personnel', '2020-01-22 08:31:26', 'CLAUDE'),
(24, 1.17, 'UnitÃ©s rÃ©ception', '2020-01-22 08:31:56', 'GENTIL'),
(25, 35, 'Achat nourritures', '2020-01-22 08:32:22', 'JC'),
(26, 16.47, 'Achat kuhe et ngagala', '2020-01-22 08:32:53', 'JC'),
(27, 25, 'Achat clore piscine', '2020-01-22 08:33:19', 'ISSA'),
(28, 1, 'Achat sachet', '2020-01-22 08:34:26', 'CLAUDE'),
(29, 1, 'Achat pain', '2020-01-22 08:35:33', 'claude'),
(30, 17.64, 'Paiement dette poissons', '2020-01-22 08:36:28', 'jules'),
(31, 164.35, 'Paiement dette nourritures', '2020-01-22 10:26:15', 'JC'),
(32, 10, 'UnitÃ©s D.G', '2020-01-22 10:48:12', 'MULUMBA'),
(33, 3, 'UnitÃ©s compte', '2020-01-22 10:48:33', 'Donatien'),
(34, 10, 'Coop-Horecab', '2020-01-22 12:54:36', 'GENTIL'),
(35, 439.14, 'Achat Nourritues', '2020-01-22 12:55:43', 'J.C'),
(36, 7, 'Ration personnels', '2020-01-23 09:22:50', 'AMURI'),
(37, 3, 'Achat beignet', '2020-01-23 09:23:17', 'CLAUDE'),
(38, 1.17, 'UnitÃ©s rÃ©ception', '2020-01-23 09:23:48', 'VICKY'),
(39, 1.76, 'Achat pains', '2020-01-23 09:24:11', 'CLAUDE'),
(40, 60, 'Paiement INPP', '2020-01-23 09:24:38', 'KABONGO'),
(41, 30, 'Avance S/Salaire dÃ©c VICKY', '2020-01-23 09:25:18', 'VICKY'),
(42, 30, 'Avance S/Salaire dÃ©c FELLY', '2020-01-23 09:25:53', 'FELLY'),
(43, 50, 'Avance S/Salaire ADOMON', '2020-01-23 09:26:21', 'ADAMON'),
(44, 50, 'Avance S/Salaire jan ALEXI', '2020-01-23 09:27:03', 'ALEXI RESTAURANT'),
(45, 5, 'Main d''oeuvre menusier', '2020-01-23 11:31:50', 'OLIVIER'),
(46, 30, 'Paiement dette KIBUKILA', '2020-01-23 17:04:23', 'KIBUKILA'),
(47, 5, 'Transport Bujumbura', '2020-01-23 17:04:48', 'Donatien'),
(48, 6.47, 'Achat papier diplicateur', '2020-01-23 17:05:41', 'LAMBERT'),
(49, 7, 'Ration personnels', '2020-01-24 06:50:02', 'CLAUDE'),
(50, 3, 'Achat beignet', '2020-01-24 06:50:21', 'CLAUDE'),
(51, 1.17, 'UnitÃ©s rÃ©ception', '2020-01-24 06:50:48', 'Vicky'),
(52, 3, 'UnitÃ©s compte', '2020-01-24 06:51:11', 'Donatien'),
(53, 0.88, 'Achat sachet', '2020-01-24 06:51:38', 'CLAUDE'),
(54, 1.76, 'Achat pain', '2020-01-24 06:52:09', 'CLAUDE');

-- --------------------------------------------------------

--
-- Structure de la table `sortiecuisine`
--

CREATE TABLE IF NOT EXISTS `sortiecuisine` (
  `idSortieCuis` smallint(3) NOT NULL AUTO_INCREMENT,
  `dateApprov` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qteSortie` double NOT NULL,
  `idDivCuis` smallint(3) NOT NULL,
  `ptSortDiv` double NOT NULL,
  PRIMARY KEY (`idSortieCuis`),
  KEY `idDivCuis` (`idDivCuis`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `sortiecuisine`
--

INSERT INTO `sortiecuisine` (`idSortieCuis`, `dateApprov`, `qteSortie`, `idDivCuis`, `ptSortDiv`) VALUES
(2, '2020-01-14 12:08:26', 1, 12, 0),
(3, '2020-01-14 12:08:32', 3, 13, 0),
(4, '2020-01-14 12:09:57', 0, 51, 0),
(5, '2020-01-17 13:00:40', 2, 13, 0),
(6, '2020-01-18 14:52:42', 2, 12, 0),
(7, '2020-01-18 14:52:51', 1, 12, 0),
(8, '2020-01-18 14:53:42', 1, 13, 0),
(9, '2020-01-18 14:54:31', 5, 15, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sortiediv`
--

CREATE TABLE IF NOT EXISTS `sortiediv` (
  `idSortDiv` int(11) NOT NULL AUTO_INCREMENT,
  `idDiv` int(11) NOT NULL,
  `poste` varchar(60) NOT NULL,
  `qteSortDiv` int(11) NOT NULL,
  `ptSortDiv` double NOT NULL,
  `dateSortDiv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idSortDiv`),
  KEY `idDiv` (`idDiv`),
  KEY `id_service` (`poste`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `sortiediv`
--

INSERT INTO `sortiediv` (`idSortDiv`, `idDiv`, `poste`, `qteSortDiv`, `ptSortDiv`, `dateSortDiv`) VALUES
(1, 4, 'Restaurant Bar', 2, 8.24, '2020-01-13 06:53:31'),
(2, 14, 'House keeping', 6, 2.94, '2020-01-17 10:59:58'),
(3, 4, 'House keeping', 1, 7.21, '2020-01-17 11:00:05'),
(4, 17, 'House keeping', 1, 10.5, '2020-01-17 11:00:12'),
(5, 17, 'House keeping', 1, 10, '2020-01-17 11:00:17'),
(6, 14, 'House keeping', 2, 2.52, '2020-01-17 11:00:23'),
(7, 10, 'House keeping', 1, 0, '2020-01-18 08:15:54'),
(8, 17, 'House keeping', 3, 8.5, '2020-01-18 08:16:00'),
(9, 14, 'House keeping', 1, 2.31, '2020-01-18 08:16:12'),
(10, 21, 'House keeping', 1, 0, '2020-01-18 08:16:18'),
(11, 13, 'House keeping', 1, 0, '2020-01-18 10:27:40'),
(12, 4, 'Restaurant Bar', 2, 5.15, '2020-01-22 09:27:21'),
(13, 4, 'house_keeping', 1, 4.12, '2020-01-22 09:27:30'),
(14, 17, 'house_keeping', 2, 7.5, '2020-01-22 09:27:42'),
(15, 16, 'house_keeping', 1, 0, '2020-01-22 09:28:10'),
(16, 14, 'house_keeping', 5, 1.26, '2020-01-22 09:28:16');

-- --------------------------------------------------------

--
-- Structure de la table `sortienour`
--

CREATE TABLE IF NOT EXISTS `sortienour` (
  `idSorNour` int(11) NOT NULL AUTO_INCREMENT,
  `qnteSortNour` int(11) NOT NULL,
  `dateSortNour` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idNour` int(11) NOT NULL,
  `idPv` int(11) NOT NULL,
  `idComNour` int(11) NOT NULL,
  PRIMARY KEY (`idSorNour`),
  KEY `idNour` (`idNour`),
  KEY `idPv` (`idPv`),
  KEY `idComNour` (`idComNour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Contenu de la table `sortienour`
--

INSERT INTO `sortienour` (`idSorNour`, `qnteSortNour`, `dateSortNour`, `idNour`, `idPv`, `idComNour`) VALUES
(1, 5, '2020-01-11 19:46:15', 89, 1, 4),
(2, 1, '2020-01-11 19:54:12', 67, 1, 12),
(3, 2, '2020-01-11 19:54:22', 68, 1, 11),
(4, 1, '2020-01-11 19:55:06', 18, 1, 10),
(5, 1, '2020-01-11 19:55:31', 95, 1, 9),
(6, 1, '2020-01-11 19:56:19', 2, 1, 7),
(7, 1, '2020-01-11 20:06:38', 40, 1, 5),
(8, 3, '2020-01-11 20:07:02', 47, 1, 6),
(9, 1, '2020-01-11 20:07:09', 32, 1, 8),
(10, 1, '2020-01-14 11:50:39', 71, 1, 13),
(11, 0, '2020-01-14 11:50:43', 66, 1, 14),
(12, 1, '2020-01-14 11:50:46', 69, 1, 15),
(13, 2, '2020-01-14 11:50:50', 103, 1, 16),
(14, 1, '2020-01-14 11:50:54', 104, 1, 17),
(15, 3, '2020-01-14 11:50:57', 95, 1, 18),
(16, 1, '2020-01-14 11:51:06', 68, 1, 20),
(17, 1, '2020-01-14 11:51:13', 67, 1, 21),
(18, 1, '2020-01-14 11:51:17', 66, 1, 22),
(19, 1, '2020-01-14 11:51:27', 32, 1, 25),
(20, 1, '2020-01-14 11:51:36', 59, 1, 28),
(21, 2, '2020-01-14 12:08:06', 52, 1, 29),
(22, 0, '2020-01-17 13:01:06', 2, 1, 30),
(23, 2, '2020-01-17 13:01:41', 30, 1, 33),
(24, 0, '2020-01-17 13:01:48', 10, 1, 34),
(25, 2, '2020-01-17 13:01:56', 68, 1, 35),
(26, 1, '2020-01-17 13:02:02', 67, 1, 36),
(27, 1, '2020-01-17 13:02:09', 41, 1, 37),
(28, 5, '2020-01-18 10:11:52', 47, 1, 32),
(29, 1, '2020-01-18 10:12:57', 18, 1, 39),
(30, 1, '2020-01-18 10:13:24', 63, 1, 41),
(31, 1, '2020-01-18 10:13:31', 70, 1, 42),
(32, 1, '2020-01-18 10:13:38', 32, 1, 43),
(33, 1, '2020-01-18 10:13:45', 30, 1, 44),
(34, 1, '2020-01-18 10:13:54', 98, 1, 46),
(35, 1, '2020-01-18 10:18:46', 2, 1, 31),
(36, 1, '2020-01-18 10:23:03', 107, 1, 40),
(37, 1, '2020-01-18 10:23:10', 2, 1, 45),
(38, 1, '2020-01-18 10:25:06', 101, 1, 47),
(39, 1, '2020-01-20 06:05:10', 39, 1, 51),
(40, 1, '2020-01-20 06:05:32', 66, 1, 52),
(41, 1, '2020-01-22 08:52:47', 2, 1, 59),
(42, 1, '2020-01-22 08:53:06', 55, 1, 60),
(43, 1, '2020-01-22 08:53:23', 65, 1, 62),
(44, 1, '2020-01-22 09:29:41', 61, 1, 102),
(45, 3, '2020-01-22 09:29:53', 47, 1, 103),
(46, 3, '2020-01-22 09:30:07', 89, 1, 104),
(47, 6, '2020-01-22 09:30:18', 92, 1, 105),
(48, 5, '2020-01-22 09:31:01', 55, 1, 108),
(49, 1, '2020-01-22 09:31:42', 97, 1, 94),
(50, 1, '2020-01-22 09:31:54', 69, 1, 95),
(51, 1, '2020-01-22 09:32:59', 21, 1, 54),
(52, 1, '2020-01-22 09:33:18', 107, 1, 58),
(53, 2, '2020-01-22 09:34:04', 52, 1, 65),
(54, 1, '2020-01-22 09:34:27', 27, 1, 71),
(55, 4, '2020-01-22 09:34:35', 92, 1, 68),
(56, 3, '2020-01-22 09:35:22', 96, 1, 66),
(57, 2, '2020-01-22 09:35:59', 68, 1, 70),
(58, 3, '2020-01-22 09:36:06', 35, 1, 74),
(59, 1, '2020-01-22 09:36:42', 61, 1, 79),
(60, 5, '2020-01-22 09:37:20', 76, 1, 81),
(61, 1, '2020-01-22 09:37:32', 66, 1, 80),
(62, 2, '2020-01-22 09:38:02', 89, 1, 83),
(63, 1, '2020-01-22 09:38:08', 68, 1, 84),
(64, 1, '2020-01-22 09:38:17', 67, 1, 85),
(65, 1, '2020-01-22 09:39:08', 46, 1, 86),
(66, 1, '2020-01-22 09:39:18', 2, 1, 90),
(67, 1, '2020-01-22 09:40:21', 2, 1, 67),
(68, 1, '2020-01-22 09:40:32', 10, 1, 89),
(69, 3, '2020-01-22 09:40:51', 35, 1, 97),
(70, 1, '2020-01-22 09:41:16', 85, 1, 99),
(71, 1, '2020-01-22 10:02:57', 54, 1, 73),
(72, 1, '2020-01-22 10:03:21', 59, 1, 77);

-- --------------------------------------------------------

--
-- Structure de la table `stockcuisine`
--

CREATE TABLE IF NOT EXISTS `stockcuisine` (
  `idStockCuis` int(11) NOT NULL AUTO_INCREMENT,
  `idNour` int(11) NOT NULL,
  `qtStockCuis` double NOT NULL,
  PRIMARY KEY (`idStockCuis`),
  KEY `idNour` (`idNour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Contenu de la table `stockcuisine`
--

INSERT INTO `stockcuisine` (`idStockCuis`, `idNour`, `qtStockCuis`) VALUES
(1, 2, 6),
(2, 3, 0),
(3, 4, 0),
(4, 5, 0),
(5, 6, 0),
(6, 7, 0),
(7, 8, 100),
(9, 10, 500),
(10, 11, 0),
(11, 12, 0),
(12, 13, 0),
(13, 14, 0),
(14, 15, 0),
(15, 16, 0),
(16, 18, 2000),
(17, 19, 0),
(18, 41, 2),
(22, 78, 0),
(23, 46, 630),
(24, 40, 2),
(25, 89, 0),
(27, 65, 1),
(29, 54, 0),
(31, 52, 2),
(32, 20, 10),
(33, 69, 250),
(35, 43, 0),
(36, 42, 60),
(37, 55, 556.5),
(38, 67, 500),
(39, 71, 0),
(40, 58, 0),
(41, 68, 3250),
(42, 45, 0),
(43, 44, 0),
(45, 88, 1),
(46, 63, 80),
(47, 21, 160),
(48, 59, 2),
(50, 66, 280),
(51, 70, 80),
(55, 85, 11),
(56, 81, 0),
(63, 26, 0),
(64, 27, 400),
(65, 30, 2570),
(67, 33, 0),
(68, 29, 0),
(69, 32, 430),
(70, 38, 0),
(71, 28, 0),
(72, 39, 1000),
(73, 47, 860),
(74, 61, 900),
(75, 17, 0),
(78, 92, 2.5),
(81, 35, 6000),
(82, 95, 0),
(83, 96, 2750),
(84, 99, 0),
(85, 100, 2),
(88, 101, 800),
(89, 74, 0),
(90, 76, 25),
(91, 108, 0),
(92, 107, 1),
(93, 106, 0),
(94, 105, 0),
(95, 104, 0),
(96, 98, 0),
(97, 97, 2),
(98, 103, 4),
(99, 111, 0),
(100, 110, 0),
(101, 109, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stockdivers`
--

CREATE TABLE IF NOT EXISTS `stockdivers` (
  `idDiv` int(11) NOT NULL AUTO_INCREMENT,
  `qnteDiv` int(11) NOT NULL,
  `designation` varchar(60) NOT NULL,
  `pu` double NOT NULL,
  PRIMARY KEY (`idDiv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `stockdivers`
--

INSERT INTO `stockdivers` (`idDiv`, `qnteDiv`, `designation`, `pu`) VALUES
(1, 15, 'TAKE AWAY', 1.03),
(2, 1, 'PAPIER ALUMINIUM', 12.35),
(3, 0, 'PAPIER FILM', 12.35),
(4, 14, 'PAPIER SERVIETTES', 1.03),
(5, 7, 'PAPIER DE DECOR', 1.47),
(6, 8, 'CURE-DENT', 0.29),
(7, 10, 'PAILLES', 3),
(8, 2, 'ESSUIE ASSIETTE', 1.47),
(9, 4, 'AIR FRESH', 2.94),
(10, 0, 'CREAM A RECURER', 8.53),
(11, 4, 'INSECTICIDES', 3.53),
(12, 16, 'CHAMPOON PETIT FORMA', 0.71),
(13, 0, 'SAVONS LIQUIDE A MAINS', 1.76),
(14, 6, 'SAVON ARIF', 0.21),
(15, 5, 'EPONGE A RECURER', 2.94),
(16, 0, 'LAVE VITRE', 10.29),
(17, 15, 'PAPIER HYGIENIENIQUE', 0.5),
(18, 1, 'POUDRE A LESSIVE', 15),
(19, 0, 'EAU DE JAVEL', 7.5),
(20, 5, 'SAVON LIAUIDE DE VAISSELLE', 2.35),
(21, 1, 'SAVONS MULTI USAGE', 2.35),
(22, 0, 'OMO', 14.71),
(23, 1, 'PAPIER DUPLICATEUR', 6.47),
(24, 0, 'ENCRE CORRECTRICE', 1.06),
(25, 0, 'BROSSE DE TOILETTE', 2.06),
(26, 1, 'TRANSPORT BUJA', 10),
(27, 1, 'TRANSPORT MULONGWE', 10),
(28, 0, 'TORCHONS', 1.07),
(29, 1, 'PAPIER SERVITTES VITRE', 6),
(30, 2, 'BROSS A TOILE D''AREIGNET', 5);

-- --------------------------------------------------------

--
-- Structure de la table `stockpv`
--

CREATE TABLE IF NOT EXISTS `stockpv` (
  `idstock` int(11) NOT NULL AUTO_INCREMENT,
  `qtStock` int(11) NOT NULL,
  `prixdevente` double NOT NULL,
  `idPv` int(11) NOT NULL,
  `idBoiss` int(11) NOT NULL,
  PRIMARY KEY (`idstock`),
  KEY `idBoiss` (`idBoiss`),
  KEY `idPV` (`idPv`),
  KEY `idPV_2` (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Contenu de la table `stockpv`
--

INSERT INTO `stockpv` (`idstock`, `qtStock`, `prixdevente`, `idPv`, `idBoiss`) VALUES
(1, 14, 0, 1, 1),
(2, 14, 0, 1, 2),
(3, 0, 0, 1, 3),
(4, 0, 0, 1, 4),
(5, 0, 0, 1, 5),
(6, 6, 0, 1, 6),
(7, 6, 0, 1, 7),
(8, 9, 0, 1, 8),
(9, 19, 0, 1, 9),
(10, 9, 0, 1, 10),
(11, 0, 0, 1, 11),
(12, 22, 0, 1, 12),
(13, 0, 0, 1, 13),
(14, 0, 0, 1, 14),
(15, 10, 0, 1, 15),
(16, 0, 0, 1, 16),
(17, 3, 0, 1, 17),
(18, 9, 0, 1, 18),
(22, 0, 0, 1, 22),
(23, 35, 0, 1, 23),
(24, 16, 0, 1, 24),
(28, 4, 0, 1, 28),
(29, 0, 0, 1, 29),
(30, 15, 0, 1, 30),
(31, 24, 0, 1, 31),
(32, 0, 0, 1, 32),
(33, 0, 0, 1, 33),
(34, 10, 0, 1, 34),
(35, 0, 0, 1, 35),
(36, 0, 0, 1, 36),
(37, 0, 0, 1, 37),
(38, 0, 0, 1, 38),
(39, 1, 0, 1, 39),
(40, 0, 0, 1, 40),
(41, 1, 0, 1, 41),
(42, 0, 0, 1, 42),
(43, 1, 0, 1, 43),
(44, 1, 0, 1, 44),
(45, 2, 0, 1, 45),
(46, 2, 0, 1, 46),
(47, 0, 0, 1, 47),
(48, 0, 0, 1, 48),
(49, 0, 0, 1, 49),
(50, 0, 0, 1, 50),
(51, 0, 0, 1, 51),
(52, 0, 0, 1, 52),
(53, 0, 0, 1, 53),
(54, 0, 0, 1, 54),
(55, 0, 0, 1, 55),
(56, 1, 0, 1, 56),
(57, 1, 0, 1, 57),
(58, 1, 0, 1, 58),
(59, 0, 0, 1, 59),
(60, 0, 0, 1, 60),
(61, 0, 0, 1, 61),
(62, 0, 0, 1, 62),
(63, 0, 0, 1, 63),
(64, 0, 0, 1, 64),
(65, 0, 0, 1, 65),
(66, 0, 0, 1, 66),
(67, 0, 0, 1, 67),
(68, 0, 0, 1, 68),
(69, 0, 0, 1, 69),
(70, 0, 0, 1, 70),
(71, 24, 0, 1, 76),
(72, 19, 0, 1, 77),
(73, 18, 0, 1, 78),
(74, 13, 0, 1, 79),
(75, 15, 0, 1, 80),
(76, 19, 0, 1, 81),
(77, 0, 0, 1, 82),
(78, 0, 0, 1, 83),
(79, 2, 0, 1, 84),
(80, 0, 0, 1, 85),
(81, 0, 0, 1, 86),
(82, 0, 0, 1, 71),
(83, 0, 0, 1, 72),
(84, 0, 0, 1, 87),
(85, 0, 0, 1, 88),
(86, 0, 0, 1, 73),
(87, 0, 0, 1, 74),
(88, 0, 0, 1, 75),
(89, 7, 0, 1, 89),
(90, 17, 0, 1, 90),
(91, 1, 0, 1, 91),
(92, 17, 0, 1, 92),
(93, 1, 0, 1, 94),
(94, 0, 0, 1, 93),
(95, 7, 0, 1, 95),
(96, 0, 0, 1, 99),
(97, 10, 0, 1, 98),
(98, 4, 0, 1, 97),
(99, 13, 0, 1, 96),
(100, 5, 0, 1, 100),
(101, 1, 0, 1, 101),
(102, 0, 0, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tablepv`
--

CREATE TABLE IF NOT EXISTS `tablepv` (
  `idTable` int(11) NOT NULL AUTO_INCREMENT,
  `designTable` varchar(10) DEFAULT NULL,
  `zone` varchar(50) NOT NULL,
  PRIMARY KEY (`idTable`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `tablepv`
--

INSERT INTO `tablepv` (`idTable`, `designTable`, `zone`) VALUES
(1, 'T01', 'droite du resto'),
(2, ' T02', 'Gauche'),
(3, 'T03', 'Gauche'),
(4, 'T04', 'droite du resto'),
(5, 'T05', 'droite du resto'),
(6, 'T06', 'droite du resto'),
(7, 'T07', 'droite du resto'),
(8, 'T08', 'droite du resto'),
(9, 'T09', 'droite du resto'),
(10, 'T10', 'Terrasse'),
(11, 'T11', 'Terrasse'),
(12, 'T12', 'Terrasse'),
(13, 'T13', 'Terrasse'),
(14, 'T14', 'Terrasse'),
(15, 'T15', 'Terrasse'),
(16, 'T16', 'Terrasse'),
(17, 'T17', 'Terrasse'),
(18, 'T18', 'Terrasse'),
(19, 'T19', 'Terrasse'),
(20, 'T20', 'Terrasse'),
(21, 'T21', 'Paillote'),
(22, 'T22', 'Paillote'),
(23, 'T24', 'Paillote'),
(24, 'T23', 'Paillote');

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

CREATE TABLE IF NOT EXISTS `transfert` (
  `idTrans` int(11) NOT NULL AUTO_INCREMENT,
  `qte` int(11) NOT NULL,
  `idstock` int(11) NOT NULL,
  `dateTrans` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idPv` int(11) NOT NULL,
  `emetteur` varchar(50) NOT NULL,
  PRIMARY KEY (`idTrans`),
  KEY `emetteur_2` (`emetteur`),
  KEY `idPv` (`idPv`),
  KEY `idstock` (`idstock`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_function` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `user_sex` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `user_add_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_phone` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `mdp_user` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `user_function`, `user_name`, `user_sex`, `user_add_date`, `user_phone`, `user_email`, `user_address`, `mdp_user`) VALUES
(1, 'comptable', 'donatien', NULL, '2019-12-13 23:00:00', '0974042469', 'comptable@gmail.com', 'Kavinvira', 'cpt1234'),
(2, 'Admin', 'Moussa', 'm', '2019-12-13 23:00:00', NULL, NULL, NULL, 'admin'),
(3, 'econome', 'Jean-Claude', 'M', '2019-12-13 23:00:00', '+243976373602', 'jus@gmail.com', 'Kalundu-Uvira', 'eco1234'),
(4, 'receptionniste', 'victoire', 'm', '2019-12-13 23:00:00', NULL, NULL, NULL, 'rcpt123'),
(9, 'receptionniste', 'Gentil', 'M', '2020-01-02 15:57:49', '+243998959254', 'mashagiro@yahoo.fr', 'Uvira', 'gm4678'),
(11, 'cuisinier', 'Adamon', 'M', '2020-01-12 20:12:32', '+25761430658', 'adamon@gmail.com', 'Bujumbura', 'NICAYENZI'),
(12, 'cuisinier', 'Kevin', 'M', '2020-01-12 20:19:29', '+243845888346', 'omarikevin@yahoo.fr', 'Mulongwe-Fako', '1972'),
(13, 'house_keeping', 'Felicien', 'M', '2020-01-13 11:44:51', '+243970005011', 'felicien@gmail.com', 'Kavimvira - Uvira', '1990');

-- --------------------------------------------------------

--
-- Structure de la table `vetement`
--

CREATE TABLE IF NOT EXISTS `vetement` (
  `idVetement` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) NOT NULL,
  `prix` double NOT NULL,
  `typeBl` varchar(200) NOT NULL,
  PRIMARY KEY (`idVetement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Contenu de la table `vetement`
--

INSERT INTO `vetement` (`idVetement`, `designation`, `prix`, `typeBl`) VALUES
(1, 'COSTUME (SUIT)', 5, 'Lessive / West clearing'),
(2, 'ENSEMBLE JEANS', 5, 'Lessive / West clearing'),
(3, 'SALOPETTE', 5, 'Lessive / West clearing'),
(4, 'JACQUETTE', 3, 'Lessive / West clearing'),
(5, 'GILET', 1.5, 'Lessive / West clearing'),
(6, 'ECHARPE', 1, 'Lessive / West clearing'),
(7, 'PAGNE', 2, 'Lessive / West clearing'),
(8, 'PANTALON', 2, 'Lessive / West clearing'),
(9, 'CHEMISE', 2, 'Lessive / West clearing'),
(10, 'T-SHIRT', 1.5, 'Lessive / West clearing'),
(11, 'SINGLET', 1, 'Lessive / West clearing'),
(12, 'CHAUSSETTES', 0.5, 'Lessive / West clearing'),
(13, 'ROBE', 2.5, 'Lessive / West clearing'),
(14, 'BLOUSE', 2, 'Lessive / West clearing'),
(15, 'JUPE', 2, 'Lessive / West clearing'),
(16, 'PYJAMA', 3, 'Lessive / West clearing'),
(17, 'CULOTTE', 1, 'Lessive / West clearing'),
(18, 'TRAINING', 3, 'Lessive / West clearing'),
(19, 'CALECON', 2, 'Lessive / West clearing'),
(20, 'MOUCHOIR', 0.5, 'Lessive / West clearing'),
(21, 'ESSUIE MAIN', 3, 'Lessive / West clearing'),
(22, 'ESSUIE BAIN', 4, 'Lessive / West clearing'),
(23, 'DRAPS', 5, 'Lessive / West clearing'),
(24, 'SOUTIEN', 2, 'Lessive / West clearing'),
(25, 'CHAPEAU', 0.5, 'Lessive / West clearing'),
(26, 'CHAUSSURE', 1, 'Lessive / West clearing'),
(27, 'KETCH', 2, 'Lessive / West clearing'),
(28, 'BOUBOU', 6, 'Lessive / West clearing'),
(29, 'SACOCHE', 4, 'Lessive / West clearing'),
(30, 'COSTUME', 2, 'Repassage / Pressing'),
(31, 'ENSEMBLE JEANS', 2, 'Repassage / Pressing'),
(32, 'SALOPETTE', 2, 'Repassage / Pressing'),
(33, 'JACQUETTE', 1.5, 'Repassage / Pressing'),
(34, 'GILET', 1, 'Repassage / Pressing'),
(35, 'ECHARPE', 0.5, 'Repassage / Pressing'),
(36, 'PAGNE', 1, 'Repassage / Pressing'),
(37, 'PANTALON', 1, 'Repassage / Pressing'),
(38, 'CHEMISE', 1, 'Repassage / Pressing'),
(39, 'T SHIRT', 1, 'Repassage / Pressing'),
(40, 'SINGLET', 0.5, 'Repassage / Pressing'),
(41, 'CHAUSSETTES', 0.5, 'Repassage / Pressing'),
(42, 'ROBE', 1.5, 'Repassage / Pressing'),
(43, 'BLOUSE', 1, 'Repassage / Pressing'),
(44, 'JUPE', 1, 'Repassage / Pressing'),
(45, 'PYJAMA', 2, 'Repassage / Pressing'),
(46, 'CULOTTE', 0.5, 'Repassage / Pressing'),
(47, 'TRAINING', 1.5, 'Repassage / Pressing'),
(48, 'CALECON', 1, 'Repassage / Pressing'),
(49, 'MOUCHOIRE', 0.5, 'Repassage / Pressing'),
(50, 'ESSUIE MAIN', 1.5, 'Repassage / Pressing'),
(51, 'ESSUIE BAIN', 2, 'Repassage / Pressing'),
(52, 'DRAPS', 3, 'Repassage / Pressing'),
(53, 'SOUTIEN GORGE', 1, 'Repassage / Pressing'),
(54, 'CHAPEAU', 0.5, 'Repassage / Pressing'),
(55, 'CHAUSSURE', 0, 'Repassage / Pressing'),
(56, 'KETCH', 0, 'Repassage / Pressing'),
(57, 'BOUBOU', 3, 'Repassage / Pressing'),
(58, 'SACOCHE', 0, 'Repassage / Pressing');

-- --------------------------------------------------------

--
-- Structure de la table `vuechambre`
--

CREATE TABLE IF NOT EXISTS `vuechambre` (
  `idVue` smallint(2) NOT NULL AUTO_INCREMENT,
  `designVue` varchar(50) NOT NULL,
  PRIMARY KEY (`idVue`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `vuechambre`
--

INSERT INTO `vuechambre` (`idVue`, `designVue`) VALUES
(1, 'Entrée Hotel'),
(2, 'Lac Tanganyika');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `approvboiss`
--
ALTER TABLE `approvboiss`
  ADD CONSTRAINT `approvboiss_ibfk_1` FOREIGN KEY (`idBoiss`) REFERENCES `prodboiss` (`idBoiss`),
  ADD CONSTRAINT `approvboiss_ibfk_2` FOREIGN KEY (`idFour`) REFERENCES `four` (`idFour`);

--
-- Contraintes pour la table `approvcuisine`
--
ALTER TABLE `approvcuisine`
  ADD CONSTRAINT `approvcuisine_ibfk_1` FOREIGN KEY (`idDivCuis`) REFERENCES `diverscuisine` (`idDivCuis`),
  ADD CONSTRAINT `approvcuisine_ibfk_2` FOREIGN KEY (`idFour`) REFERENCES `four` (`idFour`);

--
-- Contraintes pour la table `approvdiv`
--
ALTER TABLE `approvdiv`
  ADD CONSTRAINT `approvdiv_ibfk_1` FOREIGN KEY (`idDiv`) REFERENCES `stockdivers` (`idDiv`),
  ADD CONSTRAINT `approvdiv_ibfk_2` FOREIGN KEY (`idFour`) REFERENCES `four` (`idFour`);

--
-- Contraintes pour la table `approvnour`
--
ALTER TABLE `approvnour`
  ADD CONSTRAINT `approvnour_ibfk_1` FOREIGN KEY (`idNour`) REFERENCES `prodnour` (`idNour`),
  ADD CONSTRAINT `approvnour_ibfk_2` FOREIGN KEY (`idFour`) REFERENCES `four` (`idFour`);

--
-- Contraintes pour la table `avarieboiss`
--
ALTER TABLE `avarieboiss`
  ADD CONSTRAINT `avarieboiss_ibfk_1` FOREIGN KEY (`idBoiss`) REFERENCES `prodboiss` (`idBoiss`);

--
-- Contraintes pour la table `avariedivers`
--
ALTER TABLE `avariedivers`
  ADD CONSTRAINT `avariedivers_ibfk_1` FOREIGN KEY (`idDiv`) REFERENCES `stockdivers` (`idDiv`);

--
-- Contraintes pour la table `avarienour`
--
ALTER TABLE `avarienour`
  ADD CONSTRAINT `avarienour_ibfk_1` FOREIGN KEY (`idNour`) REFERENCES `prodnour` (`idNour`);

--
-- Contraintes pour la table `avarieplat`
--
ALTER TABLE `avarieplat`
  ADD CONSTRAINT `avarieplat_ibfk_1` FOREIGN KEY (`idPlat`) REFERENCES `plat` (`idPlat`);

--
-- Contraintes pour la table `barman`
--
ALTER TABLE `barman`
  ADD CONSTRAINT `barman_ibfk_1` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`);

--
-- Contraintes pour la table `blanchisserie`
--
ALTER TABLE `blanchisserie`
  ADD CONSTRAINT `blanchisserie_ibfk_1` FOREIGN KEY (`idVetement`) REFERENCES `vetement` (`idVetement`),
  ADD CONSTRAINT `blanchisserie_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`num_chambre`) REFERENCES `rooms` (`id_room`);

--
-- Contraintes pour la table `booking_historique`
--
ALTER TABLE `booking_historique`
  ADD CONSTRAINT `booking_historique_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `booking_historique_ibfk_2` FOREIGN KEY (`num_chambre`) REFERENCES `rooms` (`id_room`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`idOrg`) REFERENCES `organisation` (`idOrg`);

--
-- Contraintes pour la table `comcuisine`
--
ALTER TABLE `comcuisine`
  ADD CONSTRAINT `comcuisine_ibfk_1` FOREIGN KEY (`idDivCuis`) REFERENCES `diverscuisine` (`idDivCuis`);

--
-- Contraintes pour la table `comdivers`
--
ALTER TABLE `comdivers`
  ADD CONSTRAINT `comdivers_ibfk_1` FOREIGN KEY (`idDiv`) REFERENCES `stockdivers` (`idDiv`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idBoiss`) REFERENCES `prodboiss` (`idBoiss`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`);

--
-- Contraintes pour la table `commandenour`
--
ALTER TABLE `commandenour`
  ADD CONSTRAINT `commandenour_ibfk_1` FOREIGN KEY (`idNour`) REFERENCES `prodnour` (`idNour`),
  ADD CONSTRAINT `commandenour_ibfk_2` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`);

--
-- Contraintes pour la table `configcuisine`
--
ALTER TABLE `configcuisine`
  ADD CONSTRAINT `configcuisine_ibfk_1` FOREIGN KEY (`idPlat`) REFERENCES `plat` (`idPlat`),
  ADD CONSTRAINT `configcuisine_ibfk_2` FOREIGN KEY (`idStockCuis`) REFERENCES `stockcuisine` (`idStockCuis`);

--
-- Contraintes pour la table `creance`
--
ALTER TABLE `creance`
  ADD CONSTRAINT `creance_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `dette`
--
ALTER TABLE `dette`
  ADD CONSTRAINT `dette_ibfk_1` FOREIGN KEY (`idFour`) REFERENCES `four` (`idFour`);

--
-- Contraintes pour la table `dettefour`
--
ALTER TABLE `dettefour`
  ADD CONSTRAINT `dettefour_ibfk_1` FOREIGN KEY (`idFour`) REFERENCES `four` (`idFour`);

--
-- Contraintes pour la table `facturation`
--
ALTER TABLE `facturation`
  ADD CONSTRAINT `facturation_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `facturationorg`
--
ALTER TABLE `facturationorg`
  ADD CONSTRAINT `facturationorg_ibfk_1` FOREIGN KEY (`idOrg`) REFERENCES `organisation` (`idOrg`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`idOrg`) REFERENCES `organisation` (`idOrg`),
  ADD CONSTRAINT `location_ibfk_2` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`idSalle`);

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `materiel_ibfk_1` FOREIGN KEY (`idCatEq`) REFERENCES `categorieequip` (`idCatEq`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idTable`) REFERENCES `tablepv` (`idTable`),
  ADD CONSTRAINT `panier_ibfk_3` FOREIGN KEY (`id_serveur`) REFERENCES `serveur` (`id_serveur`),
  ADD CONSTRAINT `panier_ibfk_4` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`);

--
-- Contraintes pour la table `plat`
--
ALTER TABLE `plat`
  ADD CONSTRAINT `plat_ibfk_1` FOREIGN KEY (`idCatPlat`) REFERENCES `catplat` (`idCatPlat`);

--
-- Contraintes pour la table `prodboiss`
--
ALTER TABLE `prodboiss`
  ADD CONSTRAINT `prodboiss_ibfk_1` FOREIGN KEY (`idCatBoiss`) REFERENCES `catboiss` (`idCatBoiss`);

--
-- Contraintes pour la table `prodnour`
--
ALTER TABLE `prodnour`
  ADD CONSTRAINT `prodnour_ibfk_1` FOREIGN KEY (`idCatNour`) REFERENCES `catnour` (`idCatNour`);

--
-- Contraintes pour la table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`idCatCh`) REFERENCES `catchambre` (`idCatCh`),
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`idVue`) REFERENCES `vuechambre` (`idVue`);

--
-- Contraintes pour la table `sortieboiss`
--
ALTER TABLE `sortieboiss`
  ADD CONSTRAINT `sortieboiss_ibfk_1` FOREIGN KEY (`idBoiss`) REFERENCES `prodboiss` (`idBoiss`),
  ADD CONSTRAINT `sortieboiss_ibfk_2` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`),
  ADD CONSTRAINT `sortieboiss_ibfk_3` FOREIGN KEY (`idCom`) REFERENCES `commande` (`idCom`);

--
-- Contraintes pour la table `sortiecuisine`
--
ALTER TABLE `sortiecuisine`
  ADD CONSTRAINT `sortiecuisine_ibfk_1` FOREIGN KEY (`idDivCuis`) REFERENCES `diverscuisine` (`idDivCuis`);

--
-- Contraintes pour la table `sortiediv`
--
ALTER TABLE `sortiediv`
  ADD CONSTRAINT `sortiediv_ibfk_1` FOREIGN KEY (`idDiv`) REFERENCES `stockdivers` (`idDiv`);

--
-- Contraintes pour la table `sortienour`
--
ALTER TABLE `sortienour`
  ADD CONSTRAINT `sortienour_ibfk_1` FOREIGN KEY (`idNour`) REFERENCES `prodnour` (`idNour`),
  ADD CONSTRAINT `sortienour_ibfk_2` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`),
  ADD CONSTRAINT `sortienour_ibfk_3` FOREIGN KEY (`idComNour`) REFERENCES `commandenour` (`idComNour`);

--
-- Contraintes pour la table `stockcuisine`
--
ALTER TABLE `stockcuisine`
  ADD CONSTRAINT `stockcuisine_ibfk_1` FOREIGN KEY (`idNour`) REFERENCES `prodnour` (`idNour`);

--
-- Contraintes pour la table `stockpv`
--
ALTER TABLE `stockpv`
  ADD CONSTRAINT `stockpv_ibfk_1` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`),
  ADD CONSTRAINT `stockpv_ibfk_2` FOREIGN KEY (`idBoiss`) REFERENCES `prodboiss` (`idBoiss`);

--
-- Contraintes pour la table `transfert`
--
ALTER TABLE `transfert`
  ADD CONSTRAINT `transfert_ibfk_1` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`),
  ADD CONSTRAINT `transfert_ibfk_3` FOREIGN KEY (`idstock`) REFERENCES `prodboiss` (`idBoiss`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
