-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 17 Décembre 2019 à 12:23
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
  PRIMARY KEY (`idApprovBoiss`),
  KEY `idBoiss` (`idBoiss`),
  KEY `idFour` (`idFour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `approvboiss`
--

INSERT INTO `approvboiss` (`idApprovBoiss`, `qnteApprov`, `puApprov`, `ptApprov`, `dateApprov`, `idBoiss`, `idFour`) VALUES
(1, 1, 30000, 30000, '2019-12-13 20:42:56', 1, 1),
(2, 1, 30000, 30000, '2019-12-13 15:32:48', 1, 1),
(3, 1, 30000, 30000, '2019-12-13 15:38:32', 1, 1),
(4, 1, 30000, 30000, '2019-12-13 18:59:00', 1, 1);

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
  PRIMARY KEY (`idApprovDiv`),
  KEY `idDiv` (`idDiv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `approvdiv`
--

INSERT INTO `approvdiv` (`idApprovDiv`, `qnteApprovDiv`, `puApprovDiv`, `ptApprovDiv`, `dateApprovDiv`, `idDiv`) VALUES
(1, 50, 4000, 200000, '2019-12-15 23:04:19', 1),
(2, 10, 20, 200, '2019-12-15 23:34:50', 1);

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
  PRIMARY KEY (`idApprovNour`),
  KEY `idNour` (`idNour`),
  KEY `idFour` (`idFour`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `avarieboiss`
--

CREATE TABLE IF NOT EXISTS `avarieboiss` (
  `idBoissAv` int(11) NOT NULL AUTO_INCREMENT,
  `qteBoissAv` double NOT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `dateBoissAv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `postePvBoiss` varchar(255) DEFAULT NULL,
  `idBoiss` int(11) NOT NULL,
  PRIMARY KEY (`idBoissAv`),
  KEY `idBoiss` (`idBoiss`)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Structure de la table `blanchisserie`
--

CREATE TABLE IF NOT EXISTS `blanchisserie` (
  `idBl` int(11) NOT NULL AUTO_INCREMENT,
  `idVetement` int(11) NOT NULL,
  `nbreBl` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `dateBl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idBl`),
  KEY `idVetement` (`idVetement`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `blanchisserie`
--

INSERT INTO `blanchisserie` (`idBl`, `idVetement`, `nbreBl`, `id_client`, `dateBl`) VALUES
(1, 2, 2, 2, '2019-12-16 10:04:35'),
(2, 1, 2, 2, '2019-12-16 09:08:46'),
(3, 1, 4, 2, '2019-12-16 10:31:37'),
(4, 1, 4, 2, '2019-12-16 10:37:25');

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `date_booking` date DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `num_chambre` int(11) DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `nombre_jour` int(11) DEFAULT NULL,
  `total_apayer` double DEFAULT NULL,
  `accompte` double DEFAULT NULL,
  `reste_apayer` double DEFAULT NULL,
  `observation` varchar(100) DEFAULT NULL,
  `statut_booking` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `id_client` (`id_client`),
  KEY `num_chambre` (`num_chambre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `booking`
--

INSERT INTO `booking` (`id_booking`, `date_booking`, `id_client`, `num_chambre`, `date_in`, `date_out`, `nombre_jour`, `total_apayer`, `accompte`, `reste_apayer`, `observation`, `statut_booking`) VALUES
(1, '2019-12-11', 3, 15, '2019-12-12', '2019-12-16', 4, 320, 250, 70, 'non', NULL),
(6, '2019-12-11', 5, 17, '2019-12-12', '2019-12-15', 3, 240, 250, -10, 'ok', NULL),
(7, '2019-12-12', 4, 17, '2019-12-12', '2019-12-14', 2, 200, 20, 80, 'Ok', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `catboiss`
--

CREATE TABLE IF NOT EXISTS `catboiss` (
  `idCatBoiss` smallint(2) NOT NULL AUTO_INCREMENT,
  `designCatBoiss` varchar(50) NOT NULL,
  PRIMARY KEY (`idCatBoiss`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `catboiss`
--

INSERT INTO `catboiss` (`idCatBoiss`, `designCatBoiss`) VALUES
(1, 'Boisson'),
(2, 'Sucre');

-- --------------------------------------------------------

--
-- Structure de la table `catnour`
--

CREATE TABLE IF NOT EXISTS `catnour` (
  `idCatNour` smallint(2) NOT NULL AUTO_INCREMENT,
  `designCatNour` varchar(50) NOT NULL,
  PRIMARY KEY (`idCatNour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `catnour`
--

INSERT INTO `catnour` (`idCatNour`, `designCatNour`) VALUES
(1, 'legume');

-- --------------------------------------------------------

--
-- Structure de la table `check_in`
--

CREATE TABLE IF NOT EXISTS `check_in` (
  `id_checkin` int(11) NOT NULL AUTO_INCREMENT,
  `heure_date` datetime DEFAULT NULL,
  `code_client` int(11) DEFAULT NULL,
  `nomClient` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `etatCivilClient` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `adresseClient` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `villeClient` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `paysClient` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `numPhoneClient` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `type_piece` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `numPiece` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `solde_accompte` double DEFAULT NULL,
  `modePaiement` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `paiement` double DEFAULT NULL,
  `date_paiement` date DEFAULT NULL,
  `numChambre` int(11) DEFAULT NULL,
  `codePlan` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `date_in` datetime DEFAULT NULL,
  `date_out` datetime DEFAULT NULL,
  `nombre_homme` int(11) DEFAULT NULL,
  `nombre_femme` int(11) DEFAULT NULL,
  `nombre_enfant` int(11) DEFAULT NULL,
  `nombre_pers_suppl` int(11) DEFAULT NULL,
  `nombre_lit_suppl` int(11) DEFAULT NULL,
  `nombre_de_jour` int(11) DEFAULT NULL,
  `total_frais_chambre` double DEFAULT NULL,
  `frais_serviceDchambre` double DEFAULT NULL,
  `frais_litSuppl` double DEFAULT NULL,
  `frais_persSuppl` double DEFAULT NULL,
  `frais_blanchisserie` double DEFAULT NULL,
  `remise` double DEFAULT NULL,
  `sous_total` double DEFAULT NULL,
  `service_taxe` double DEFAULT NULL,
  `tva` double DEFAULT NULL,
  `grand_total` double DEFAULT NULL,
  `total_payE` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `autre_charge` double DEFAULT NULL,
  `note` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_checkin`),
  KEY `code_client` (`code_client`),
  KEY `numChambre` (`numChambre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `check_out`
--

CREATE TABLE IF NOT EXISTS `check_out` (
  `id_checkout` int(11) NOT NULL AUTO_INCREMENT,
  `heureDate` datetime DEFAULT NULL,
  `codeClient` int(11) DEFAULT NULL,
  `nom_Client` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `etat_CivilClient` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `adresse_Client` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `ville_Client` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `pays_Client` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `num_PhoneClient` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `typePiece` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `num_Piece` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `soldeAccompte` double DEFAULT NULL,
  `mode_Paiement` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Paiement` double DEFAULT NULL,
  `datePaiement` date DEFAULT NULL,
  `num_Chambre` int(11) DEFAULT NULL,
  `code_Plan` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `datein` datetime DEFAULT NULL,
  `dateout` datetime DEFAULT NULL,
  `nombreHomme` int(11) DEFAULT NULL,
  `nombreFemme` int(11) DEFAULT NULL,
  `nombreEnfant` int(11) DEFAULT NULL,
  `nombrePers_suppl` int(11) DEFAULT NULL,
  `nombreLit_suppl` int(11) DEFAULT NULL,
  `nombreDe_jour` int(11) DEFAULT NULL,
  `totalFrais_chambre` double DEFAULT NULL,
  `fraisServiceDchambre` double DEFAULT NULL,
  `fraisLitSuppl` double DEFAULT NULL,
  `fraisPersSuppl` double DEFAULT NULL,
  `fraisBlanchisserie` double DEFAULT NULL,
  `remise_` double DEFAULT NULL,
  `sousTotal` double DEFAULT NULL,
  `serviceTaxe` double DEFAULT NULL,
  `tva_` double DEFAULT NULL,
  `grandTotal` double DEFAULT NULL,
  `totalPayE` double DEFAULT NULL,
  `balance_` double DEFAULT NULL,
  `autreCharge` double DEFAULT NULL,
  `note_` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_checkout`),
  KEY `codeClient` (`codeClient`),
  KEY `num_Chambre` (`num_Chambre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(200) DEFAULT NULL,
  `sexe_client` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `etat_civil_client` varchar(20) DEFAULT NULL,
  `adresse_client` varchar(100) DEFAULT NULL,
  `Ville` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `type_card` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `num_card` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `note` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `society_name` varchar(100) DEFAULT NULL,
  `society_phone` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `hosted_by` varchar(20) DEFAULT NULL,
  `organisation_ou_nomPersonne` varchar(200) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `visite_object` varchar(200) DEFAULT NULL,
  `photo_client` varchar(200) DEFAULT NULL,
  `doc_recto_img` varchar(200) DEFAULT NULL,
  `doc_verso_img` varchar(200) DEFAULT NULL,
  `car_from_firm` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `car_model` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `car_number` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `car_color` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `sexe_client`, `etat_civil_client`, `adresse_client`, `Ville`, `pays`, `contact`, `email`, `type_card`, `num_card`, `note`, `society_name`, `society_phone`, `hosted_by`, `organisation_ou_nomPersonne`, `phone_no`, `visite_object`, `photo_client`, `doc_recto_img`, `doc_verso_img`, `car_from_firm`, `car_model`, `car_number`, `car_color`) VALUES
(1, 'Alpha CIMUSA Mac', 'M', 'Celibataire', 'Nyakabiga', 'Bujumbura', 'Burundi', '0895634393', 'alphacimusa2000@gmail.com', 'Carte Electeur', 'nn98654756321', NULL, 'Mac''s Business', '0976535808', 'self', NULL, NULL, 'Vacances', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Mac Cimusa', 'H', 'CÃ©libataire', 'Nyakabiga ', 'Bujumbura', 'Burundi', '0895634393', 'alphacimusa@gmail.com', 'Carte Electeur', 'NN9875632441', 'Tout est ok', 'Mac''s Business', '', 'self', '', NULL, 'Vacances', '73395397_707039429703821_4081162342241402880_n.jpg', 'Android-PNG-Transparent-HD.png', 'logo2.jpg', 'c,ckdsksld', 'Land Cruiser', '023315655555', 'pink'),
(3, 'Mac Cimusa', 'H', 'CÃ©libataire', 'Nyakabiga ', 'Bujumbura', 'Burundi', '0895634393', 'alphacimusa@gmail.com', 'Carte Electeur', 'NN9875632441', 'Tout est ok', 'Mac''s Business', '', 'self', '', NULL, 'Vacances', '73395397_707039429703821_4081162342241402880_n.jpg', 'Android-PNG-Transparent-HD.png', 'logo2.jpg', 'c,ckdsksld', 'Land Cruiser', '023315655555', 'pink'),
(4, 'Mac Cimusa', 'H', 'CÃ©libataire', 'Nyakabiga ', 'Bujumbura', 'Burundi', '0895634393', 'alphacimusa@gmail.com', 'Carte Electeur', 'NN9875632441', 'Tout est ok', 'Mac''s Business', '', 'self', '', NULL, 'Vacances', '73395397_707039429703821_4081162342241402880_n.jpg', 'Android-PNG-Transparent-HD.png', 'logo2.jpg', 'c,ckdsksld', 'Land Cruiser', '023315655555', 'pink'),
(5, 'Mac Cimusa', 'H', 'CÃ©libataire', 'Nyakabiga ', 'Bujumbura', 'Burundi', '21365489665', 'alphacimusa@gmail.com', 'Carte Electeur', 'nn3698554789', 'pppppppppppppppp', 'Mac''s Business', '25896634', 'self', '', '', 'Vacances', 'Living.png', 'logo2.jpg', 'logoLiving.png', 'c,ckdsksld', 'Land Cruiser', '023315655555', 'pink'),
(6, 'Mac Cimusa', 'H', 'CÃ©libataire', 'Nyakabiga ', 'Bujumbura', 'Burundi', '21365489665', 'alphacimusa@gmail.com', 'Carte Electeur', 'nn3698554789', 'pppppppppppppppp', 'Mac''s Business', '25896634', 'self', '', '', 'Vacances', 'Living.png', 'logo2.jpg', 'logoLiving.png', 'c,ckdsksld', 'Land Cruiser', '023315655555', 'pink');

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
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`idComDiv`),
  KEY `idDiv` (`idDiv`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comdivers`
--

INSERT INTO `comdivers` (`idComDiv`, `qteComDiv`, `dateComDiv`, `statutComDiv`, `idDiv`, `id_service`) VALUES
(1, 6, '2019-12-16 11:28:20', 'ValidÃ©', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCom`, `qteCom`, `dateCom`, `statutCom`, `idPv`, `idBoiss`) VALUES
(1, 4, '2019-12-14 21:17:05', 'ValidÃ©', 1, 1),
(2, 4, '2019-12-14 06:09:41', 'Encours', 1, 1),
(3, 2, '2019-12-14 21:19:28', 'ValidÃ©', 1, 3),
(4, 2, '2019-12-14 21:37:12', 'Encours', 1, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `commandenour`
--

INSERT INTO `commandenour` (`idComNour`, `qteComNour`, `dateComNour`, `statutComNour`, `idPv`, `idNour`) VALUES
(1, 2, '2019-12-15 13:49:30', 'ValidÃ©', 1, 1),
(2, 3, '2019-12-15 16:52:00', 'Encours', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `four`
--

INSERT INTO `four` (`idFour`, `nomFour`, `adresseFour`, `telFour`) VALUES
(1, 'Plamedi', 'Kanvinvira', '09793456745');

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE IF NOT EXISTS `plat` (
  `idPlat` int(11) NOT NULL AUTO_INCREMENT,
  `designPlat` varchar(50) NOT NULL,
  `puPlat` double NOT NULL,
  PRIMARY KEY (`idPlat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `plat`
--

INSERT INTO `plat` (`idPlat`, `designPlat`, `puPlat`) VALUES
(1, 'soupe  ministone', 15);

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
-- Structure de la table `pointvente`
--

CREATE TABLE IF NOT EXISTS `pointvente` (
  `idPv` int(11) NOT NULL AUTO_INCREMENT,
  `libPv` varchar(50) NOT NULL,
  PRIMARY KEY (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pointvente`
--

INSERT INTO `pointvente` (`idPv`, `libPv`) VALUES
(1, 'Bar ');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `prodboiss`
--

INSERT INTO `prodboiss` (`idBoiss`, `designBoiss`, `qnteBoiss`, `nbUniteBoiss`, `valUnitBoiss`, `puBoiss`, `idCatBoiss`) VALUES
(1, 'Amstel Bock', 0, 12, 0, 8000, 1),
(2, 'Primus ', 4, 12, 48, 90000, 1),
(3, 'coco lql', 10, 34, 340, 456, 2);

-- --------------------------------------------------------

--
-- Structure de la table `prodnour`
--

CREATE TABLE IF NOT EXISTS `prodnour` (
  `idNour` int(11) NOT NULL AUTO_INCREMENT,
  `designNour` varchar(50) NOT NULL,
  `qnteNour` int(11) NOT NULL,
  `nbUniteNour` int(11) NOT NULL,
  `valUnitNour` int(11) NOT NULL,
  `puNour` int(11) NOT NULL,
  `idCatNour` smallint(2) NOT NULL,
  PRIMARY KEY (`idNour`),
  KEY `idCatNour` (`idCatNour`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `prodnour`
--

INSERT INTO `prodnour` (`idNour`, `designNour`, `qnteNour`, `nbUniteNour`, `valUnitNour`, `puNour`, `idCatNour`) VALUES
(1, 'SOMBE', 4, 2, 8, 300, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(100) DEFAULT NULL,
  `room_vue` varchar(100) DEFAULT NULL,
  `room_code` int(11) DEFAULT NULL,
  `room_prix` double DEFAULT NULL,
  `room_categorie` varchar(100) DEFAULT NULL,
  `autre_info` varchar(100) DEFAULT NULL,
  `niveau` int(11) NOT NULL,
  `statut` varchar(50) DEFAULT NULL,
  `motif` varchar(50) NOT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `rooms`
--

INSERT INTO `rooms` (`id_room`, `room_type`, `room_vue`, `room_code`, `room_prix`, `room_categorie`, `autre_info`, `niveau`, `statut`, `motif`) VALUES
(3, 'Chambre à un lit', 'Entrée Hotel', 101, 80, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 1, 'Disponible', 'prete'),
(4, 'Chambre à deux lits', 'Lac Tanganyika', 206, 140, 'Chambre Twin ', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(5, 'Chambre à un lit', 'Lac Tanganyika', 202, 100, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(6, 'Chambre à un lit', 'Lac Tanganyika', 208, 100, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(7, 'Chambre à un lit', 'Lac Tanganyika', 210, 100, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(8, 'Chambre à un lit', 'Entree Hotel', 107, 80, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 1, 'Disponible', ''),
(9, 'Chambre à un lit', 'Entrée Hotel', 213, 80, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(10, 'Chambre à deux lits', 'Entree Hotel', 209, 120, 'Chambre Twin ', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(11, 'Chambre de luxe', 'Entrée Hotel', 203, 120, 'Chambre Twin', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(12, 'Chambre à deux lits', 'Entree Hotel', 103, 120, 'Chambre Twin ', 'Petit déjeuner et piscine compris', 1, 'Disactivated', ''),
(13, 'Chambre à deux lits', 'Lac Tanganyika', 104, 140, 'Chambre Twin', 'Petit déjeuner et piscine compris', 1, 'Disponible', ''),
(14, 'Chambre à deux lits', 'Entree Hotel', 105, 120, 'Chambre Twin ', 'Petit déjeuner et piscine compris', 1, 'Disponible', ''),
(15, 'Chambre à un lit', 'Entrée Hotel', 205, 80, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 2, 'Disactivated', ''),
(16, 'Chambre à un lit', 'Entree Hotel', 109, 80, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 1, 'Disactivated', ''),
(17, 'Chambre à un lit', 'Entrée Hotel', 201, 80, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 2, 'Busy', ''),
(18, 'Chambre à un lit', 'Entree Hotel', 207, 80, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 2, 'Disactivated', ''),
(19, 'Chambre à un lit', 'Lac Tanganyika', 102, 100, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 1, 'Disactivated', ''),
(20, 'Chambre à un lit', 'Lac Tanganyika', 110, 100, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 1, 'Busy', ''),
(21, 'Chambre à un lit', 'Lac Tanganyika', 108, 100, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 1, 'Disponible', ''),
(22, 'Chambre à un lit', 'Lac Tanganyika', 204, 100, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(23, 'Chambre à un lit', 'Lac Tanganyika', 106, 100, 'Chambre Standard de Luxe', 'Petit déjeuner et piscine compris', 1, 'Disponible', ''),
(24, 'Chambre à trois lits', 'Entree Hotel', 214, 180, 'Suite semi presidentielle', 'Petit déjeuner et piscine compris', 0, 'Disponible', ''),
(25, 'Mi-suite', 'Lac Tanganyika', 112, 200, 'Suite semi presidentielle', 'Petit déjeuner et piscine compris', 1, 'Disponible', ''),
(26, 'Mi-suite', 'Entree Hotel', 111, 180, 'Suite semi presidentielle', 'Petit déjeuner et piscine compris', 1, 'Disponible', ''),
(27, 'Mi-suite', 'Entrée Hotel', 215, 180, 'Suite semi presidentielle', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(28, 'Suite', 'Lac Tanganyika', 212, 300, 'Suite Presidentielle', 'Petit déjeuner et piscine compris', 2, 'Disponible', ''),
(29, 'Chambre de luxe', 'Lac Tanganyika', 105, 100, 'Chambre Standard de Luxe', 'La chambre comporte deux lits, un petit salon, une TV,...', 2, 'Disactivated', '');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id_service`, `service_name`) VALUES
(1, 'Restaurant'),
(2, 'Sauna-Gym-Piscine'),
(3, 'Reception'),
(4, 'Night Club'),
(5, 'Economat');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `service_location`
--

INSERT INTO `service_location` (`id_service_loc`, `libelle_service`, `prix_service`, `quantite_service`, `observation`) VALUES
(1, 'Salle de conférence', 300, '1', NULL),
(2, 'Salle de conférence + service', 400, '1', NULL),
(3, 'Salle de fête', 500, '1', NULL),
(4, 'Buffet', 15, '1', NULL),
(5, 'Pause-Café', 5, '1', NULL),
(6, 'Sauna', 5, '1', NULL),
(7, 'Massage 1', 5, '1', NULL),
(8, 'Massage 2', 10, '1', NULL),
(9, 'Massage 3', 15, '1', NULL),
(10, 'Piscine', 5, '1', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `sortieboiss`
--

INSERT INTO `sortieboiss` (`idSorBoiss`, `qnteSort`, `dateSort`, `idBoiss`, `idPv`, `idCom`) VALUES
(1, 4, '2019-12-14 21:17:05', 1, 1, 1),
(2, 2, '2019-12-14 21:19:28', 3, 1, 3),
(3, 4, '2019-12-16 11:26:31', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sortiediv`
--

CREATE TABLE IF NOT EXISTS `sortiediv` (
  `idSortDiv` int(11) NOT NULL AUTO_INCREMENT,
  `idDiv` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `qteSortDiv` int(11) NOT NULL,
  `ptSortDiv` double NOT NULL,
  `dateSortDiv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idSortDiv`),
  KEY `idDiv` (`idDiv`),
  KEY `id_service` (`id_service`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sortiediv`
--

INSERT INTO `sortiediv` (`idSortDiv`, `idDiv`, `id_service`, `qteSortDiv`, `ptSortDiv`, `dateSortDiv`) VALUES
(1, 1, 1, 6, 2800, '2019-12-16 11:28:20');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sortienour`
--

INSERT INTO `sortienour` (`idSorNour`, `qnteSortNour`, `dateSortNour`, `idNour`, `idPv`, `idComNour`) VALUES
(1, 2, '2019-12-15 13:49:29', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sortiepvboiss`
--

CREATE TABLE IF NOT EXISTS `sortiepvboiss` (
  `idSortie` int(11) NOT NULL AUTO_INCREMENT,
  `qteSort` int(11) NOT NULL,
  `devise` varchar(3) DEFAULT NULL,
  `pu` double NOT NULL,
  `pt` double NOT NULL,
  `tva` double NOT NULL,
  `dateSort` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_client` int(11) NOT NULL,
  `idBoiss` int(11) NOT NULL,
  `idPv` int(11) NOT NULL,
  PRIMARY KEY (`idSortie`),
  KEY `id_client` (`id_client`),
  KEY `idBoiss` (`idBoiss`),
  KEY `idPv` (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `sortiepvboiss`
--

INSERT INTO `sortiepvboiss` (`idSortie`, `qteSort`, `devise`, `pu`, `pt`, `tva`, `dateSort`, `id_client`, `idBoiss`, `idPv`) VALUES
(1, 2, 'CDF', 4000, 8000, 0, '2019-12-15 01:56:11', 1, 1, 1),
(2, 2, 'CDF', 4000, 8000, 0, '2019-12-15 01:58:30', 1, 1, 1),
(3, 2, 'CDF', 2000, 4000, 0, '2019-12-15 12:18:44', 1, 1, 1),
(4, 44, 'USD', 45, 1980, 0, '2019-12-15 16:53:42', 1, 1, 1),
(5, 30, 'CDF', 40, 1200, 0, '2019-12-16 19:28:45', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sortiepvnour`
--

CREATE TABLE IF NOT EXISTS `sortiepvnour` (
  `idSortNour` int(11) NOT NULL AUTO_INCREMENT,
  `idPlat` int(11) DEFAULT NULL,
  `nbrePlat` int(11) DEFAULT NULL,
  `ptPlat` double NOT NULL,
  `tva` double NOT NULL,
  `dateSortPlat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modePaie` varchar(30) NOT NULL,
  `id_client` int(11) NOT NULL,
  `idPv` int(11) NOT NULL,
  PRIMARY KEY (`idSortNour`),
  KEY `idPv` (`idPv`),
  KEY `id_client` (`id_client`),
  KEY `idSortNour` (`idSortNour`),
  KEY `idSortNour_2` (`idSortNour`),
  KEY `idPlat` (`idPlat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `sortiepvnour`
--

INSERT INTO `sortiepvnour` (`idSortNour`, `idPlat`, `nbrePlat`, `ptPlat`, `tva`, `dateSortPlat`, `modePaie`, `id_client`, `idPv`) VALUES
(1, NULL, NULL, 0, 0, '2019-12-15 18:27:15', 'CrÃ©dit', 3, 1),
(2, NULL, NULL, 0, 0, '2019-12-15 18:29:32', 'CrÃ©dit', 3, 1),
(3, 1, 4, 60, 9.6, '2019-12-15 18:56:13', 'CrÃ©dit', 1, 1),
(4, 1, NULL, 0, 0, '2019-12-15 18:31:57', 'CrÃ©dit', 4, 1),
(5, 1, 4, 60, 9.6, '2019-12-15 18:32:47', 'CrÃ©dit', 4, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `stockdivers`
--

INSERT INTO `stockdivers` (`idDiv`, `qnteDiv`, `designation`, `pu`) VALUES
(1, 14, 'Savon', 200);

-- --------------------------------------------------------

--
-- Structure de la table `stockpv`
--

CREATE TABLE IF NOT EXISTS `stockpv` (
  `idstock` int(11) NOT NULL AUTO_INCREMENT,
  `qtStock` int(11) NOT NULL,
  `idPv` int(11) NOT NULL,
  `idBoiss` int(11) NOT NULL,
  PRIMARY KEY (`idstock`),
  KEY `idBoiss` (`idBoiss`),
  KEY `idPV` (`idPv`),
  KEY `idPV_2` (`idPv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `stockpv`
--

INSERT INTO `stockpv` (`idstock`, `qtStock`, `idPv`, `idBoiss`) VALUES
(7, 18, 1, 1),
(8, 0, 1, 2),
(9, 0, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_function` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `user_sex` char(1) CHARACTER SET latin1 DEFAULT NULL,
  `user_add_date` datetime DEFAULT NULL,
  `user_phone` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `user_address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `mdp_user` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `user_function`, `user_name`, `user_sex`, `user_add_date`, `user_phone`, `user_email`, `user_address`, `mdp_user`) VALUES
(1, 'comptable', 'donatien', 'm', '2019-12-14 00:00:00', NULL, NULL, NULL, 'cpt1234'),
(2, 'econome', 'jus', 'm', '2019-12-14 00:00:00', NULL, NULL, NULL, 'ecm123'),
(3, 'controleur', 'jus', 'm', '2019-12-14 00:00:00', NULL, NULL, NULL, 'ctr1234'),
(4, 'receptionniste', 'victoire', 'm', '2019-12-14 00:00:00', NULL, NULL, NULL, 'rcpt123'),
(5, 'barman_resto', 'aristote', 'm', '2019-12-14 00:00:00', NULL, NULL, NULL, 'brm1234'),
(6, 'house_keeper', 'alexy', 'm', '2019-12-14 00:00:00', NULL, NULL, NULL, 'hskp123');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `vetement`
--

INSERT INTO `vetement` (`idVetement`, `designation`, `prix`, `typeBl`) VALUES
(1, 'jupe', 5000, 'A'),
(2, 'Chemise', 5000, 'A'),
(3, 'Chemise', 2500, 'B'),
(4, 'Chemise', 150, 'C'),
(5, 'jupe', 2500, 'B');

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
-- Contraintes pour la table `approvdiv`
--
ALTER TABLE `approvdiv`
  ADD CONSTRAINT `approvdiv_ibfk_1` FOREIGN KEY (`idDiv`) REFERENCES `stockdivers` (`idDiv`);

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
-- Contraintes pour la table `check_out`
--
ALTER TABLE `check_out`
  ADD CONSTRAINT `check_out_ibfk_1` FOREIGN KEY (`codeClient`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `check_out_ibfk_2` FOREIGN KEY (`num_Chambre`) REFERENCES `rooms` (`id_room`);

--
-- Contraintes pour la table `comdivers`
--
ALTER TABLE `comdivers`
  ADD CONSTRAINT `comdivers_ibfk_1` FOREIGN KEY (`idDiv`) REFERENCES `stockdivers` (`idDiv`),
  ADD CONSTRAINT `comdivers_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

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
-- Contraintes pour la table `sortieboiss`
--
ALTER TABLE `sortieboiss`
  ADD CONSTRAINT `sortieboiss_ibfk_1` FOREIGN KEY (`idBoiss`) REFERENCES `prodboiss` (`idBoiss`),
  ADD CONSTRAINT `sortieboiss_ibfk_2` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`),
  ADD CONSTRAINT `sortieboiss_ibfk_3` FOREIGN KEY (`idCom`) REFERENCES `commande` (`idCom`);

--
-- Contraintes pour la table `sortiediv`
--
ALTER TABLE `sortiediv`
  ADD CONSTRAINT `sortiediv_ibfk_1` FOREIGN KEY (`idDiv`) REFERENCES `stockdivers` (`idDiv`),
  ADD CONSTRAINT `sortiediv_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Contraintes pour la table `sortienour`
--
ALTER TABLE `sortienour`
  ADD CONSTRAINT `sortienour_ibfk_1` FOREIGN KEY (`idNour`) REFERENCES `prodnour` (`idNour`),
  ADD CONSTRAINT `sortienour_ibfk_2` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`),
  ADD CONSTRAINT `sortienour_ibfk_3` FOREIGN KEY (`idComNour`) REFERENCES `commandenour` (`idComNour`);

--
-- Contraintes pour la table `sortiepvboiss`
--
ALTER TABLE `sortiepvboiss`
  ADD CONSTRAINT `sortiepvboiss_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `sortiepvboiss_ibfk_2` FOREIGN KEY (`idBoiss`) REFERENCES `prodboiss` (`idBoiss`),
  ADD CONSTRAINT `sortiepvboiss_ibfk_3` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`);

--
-- Contraintes pour la table `sortiepvnour`
--
ALTER TABLE `sortiepvnour`
  ADD CONSTRAINT `sortiepvnour_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `sortiepvnour_ibfk_2` FOREIGN KEY (`idPv`) REFERENCES `pointvente` (`idPv`),
  ADD CONSTRAINT `sortiepvnour_ibfk_3` FOREIGN KEY (`idPlat`) REFERENCES `plat` (`idPlat`);

--
-- Contraintes pour la table `stockpv`
--
ALTER TABLE `stockpv`
  ADD CONSTRAINT `stockpv_ibfk_1` FOREIGN KEY (`idPV`) REFERENCES `pointvente` (`idPv`),
  ADD CONSTRAINT `stockpv_ibfk_2` FOREIGN KEY (`idBoiss`) REFERENCES `prodboiss` (`idBoiss`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
