-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2013 at 08:27 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `concert_paris`
--
---CREATE DATABASE IF NOT EXISTS `concert_paris` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
---USE `concert_paris`;

CREATE DATABASE IF NOT EXISTS `a5321402_cparis` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `a5321402_cparis`;

-- --------------------------------------------------------

--
-- Table structure for table `animer`
--

CREATE TABLE IF NOT EXISTS `animer` (
  `STYLE_ID` int(6) NOT NULL,
  `EVENEMENT_ID` int(6) NOT NULL,
  PRIMARY KEY (`STYLE_ID`,`EVENEMENT_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assister`
--

CREATE TABLE IF NOT EXISTS `assister` (
  `PERSONNE_ID` int(6) NOT NULL,
  `EVENEMENT_ID` int(6) NOT NULL,
  PRIMARY KEY (`PERSONNE_ID`,`EVENEMENT_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assister`
--

INSERT INTO `assister` (`PERSONNE_ID`, `EVENEMENT_ID`) VALUES
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faire`
--

CREATE TABLE IF NOT EXISTS `faire` (
  `PERSONNE_ID` int(6) NOT NULL,
  `STYLE_ID` int(6) NOT NULL,
  PRIMARY KEY (`PERSONNE_ID`,`STYLE_ID`),
  KEY `STYLE_ID` (`STYLE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `PERSONNE_ID` int(6) NOT NULL,
  `FAVORIS_ID` int(6) NOT NULL,
  PRIMARY KEY (`PERSONNE_ID`,`FAVORIS_ID`),
  KEY `FAVORIS_ID` (`FAVORIS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organiser`
--

CREATE TABLE IF NOT EXISTS `organiser` (
  `EVENEMENT_ID` int(6) NOT NULL,
  `PERSONNE_ID` int(6) NOT NULL,
  PRIMARY KEY (`EVENEMENT_ID`,`PERSONNE_ID`),
  KEY `PERSONNE_ID` (`PERSONNE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `PERSONNE_ID` int(6) NOT NULL,
  `EVENEMENT_ID` int(6) NOT NULL,
  PRIMARY KEY (`PERSONNE_ID`,`EVENEMENT_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participer`
--

INSERT INTO `participer` (`PERSONNE_ID`, `EVENEMENT_ID`) VALUES
(0, 1),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_artiste`
--

CREATE TABLE IF NOT EXISTS `t_artiste` (
  `PERSONNE_ID` int(6) NOT NULL,
  `PAYS_ID` int(6) NOT NULL,
  `ARTISTE_Age` int(4) DEFAULT NULL,
  `ARTISTE_Description` text,
  `PERSONNE_Pseudo` varchar(255) DEFAULT NULL,
  `PERSONNE_Nom` varchar(255) DEFAULT NULL,
  `PERSONNE_Mdp` varchar(255) DEFAULT NULL,
  `PERSONNE_TypeUser` varchar(255) DEFAULT NULL,
  `PERSONNE_Photo` varchar(255) NOT NULL,
  `PERSONNE_Mail` varchar(255) DEFAULT NULL,
  `PERSONNE_Tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_ID`),
  KEY `PAYS_ID` (`PAYS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_artiste`
--

INSERT INTO `t_artiste` (`PERSONNE_ID`, `PAYS_ID`, `ARTISTE_Age`, `ARTISTE_Description`, `PERSONNE_Pseudo`, `PERSONNE_Nom`, `PERSONNE_Mdp`, `PERSONNE_TypeUser`, `PERSONNE_Photo`, `PERSONNE_Mail`, `PERSONNE_Tel`) VALUES
(0, 1, 23, '', 'STROMAE', 'STROMAE', 'stromae', 'artiste', '', 'stromae@none.com', '0600000000'),
(1, 3, 32, '', 'THEOPHILUS_LONDON', 'Theophilus London', 'theophiluslondon', 'artiste', '', 'theophiluslondon@none.com', '0600000000'),
(2, 2, 25, '', 'BEAT_ASSAILANT', 'Beat Assailant', 'beatassailant', 'artiste', '', 'beatassailant@none.com', '0600000000'),
(6, 1, 20, 'Naâman incarne aujourd’hui l’énergie sincère et naturelle de la jeunesse de ce monde, la positivité est son fer de lance, la vie aussi... Et ce visage d’ange n’a pas fini de nous donner le sourire ! Sur scène c’est comme un fourmillement qui vous prendra de la tête aux pieds, le son explosif et l’énergie positive dont le jeune homme déborde ne laissent personne indifférent !', 'NAAMAN', 'Naaman', 'naaman', 'artiste', '', 'naaman@none.com', '0600000000');

-- --------------------------------------------------------

--
-- Table structure for table `t_evenement`
--

CREATE TABLE IF NOT EXISTS `t_evenement` (
  `EVENEMENT_ID` int(6) NOT NULL AUTO_INCREMENT,
  `LIEU_ID` int(6) NOT NULL,
  `EVENEMENT_Libelle` varchar(255) NOT NULL,
  `EVENEMENT_Description` text,
  `EVENEMENT_Prix` varchar(255) DEFAULT NULL,
  `EVENEMENT_Horraire` varchar(255) DEFAULT NULL,
  `EVENEMENT_Date` date DEFAULT NULL,
  PRIMARY KEY (`EVENEMENT_ID`),
  KEY `LIEU_ID` (`LIEU_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_evenement`
--

INSERT INTO `t_evenement` (`EVENEMENT_ID`, `LIEU_ID`, `EVENEMENT_Libelle`, `EVENEMENT_Description`, `EVENEMENT_Prix`, `EVENEMENT_Horraire`, `EVENEMENT_Date`) VALUES
(1, 1, 'NEVER SAY DIE X SPLASH (SKISM - EPTIC - DODGE & FUSKI - 501)', 'Grands habitués des Splash depuis ses tous débuts, la famille NEVER SAY DIE attendait depuis longtemps de faire sa propre soirée à Paris.\r\nCe sera chose faite ce vendredi 13 décembre avec la NEVER SAY DIE NIGHT x SPLASH !!\r\n\r\nUne soirée pleine de surprise qui viendra clôturer une année 2013 incroyable pour les SPLASH qui ont donné autant de Bass qu''ils ont reçu d''amour de votre part...\r\n\r\nCe soir, c''est le Big Boss du label et meilleur DJ de la scène dubstep, SKISM qui emmène sa joyeuse troupe pour un week-end dans la capitale : L''agité duo de DODGE & FUSKI, l''étoile montante belge EPTIC, le puriste venu du nord 501, l''homme de l''ombre MOBSCENE et en maître de cérémonie, ILLAMAN.\r\n\r\n\r\nINFOS PRATIQUES\r\n\r\n13.12.2013 @ LA MACHINE DU MOULIN ROUGE\r\n23h00 - 06h00\r\n24?\r\n\r\nLa Machine du Moulin Rouge\r\n90 Bvd de Clichy 75018 Paris\r\nMétro : Blanche Ligne 2\r\nBus : Blanche 68, 74, 30, 54, N01, N02\r\n\r\nwww.facebook.com/chwetprod\r\nwww.twitter.com/splashgig\r\nwww.lamachinedumoulinrouge.com\r\nsplashgig@gmail.com\r\n\r\n\r\nPreventes :\r\n\r\nINTERDIT AUX MINEURS / CARTE D''IDENTITÉ OBLIGATOIRE\r\n\r\nBillet téléchargeable sur mobile\r\n\r\nOrganisateur : CHWET', '22,50', '22h a 06h', '2013-12-13'),
(2, 3, 'NAÂMAN + PHASES CACHEES', 'Depuis 2010 *Naâman* illumine la scène reggae française avec un flow groovy\r\nune voix claire et vivifiante. Le jeune chanteur s''attache à faire revivre\r\ndes légendes du reggae empruntant au hip-hop et au raggamuffin leurs\r\nrythmiques incessantes et leurs messages engagés. Après avoir été élu\r\nRévélation de l''Année 2013 aux Victoires du Reggae (Reggae.fr), il revient\r\nle 4 Juin 2013 avec son nouvel album *Deep Rockers, Back A Yard *! Avis à\r\ntous ceux qui n''auraient pas déjà entendu son flow explosif, Naâman va vous\r\nravir le coeur et les oreilles !', '15', '18h', '2013-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `t_favoris`
--

CREATE TABLE IF NOT EXISTS `t_favoris` (
  `FAVORIS_ID` int(6) NOT NULL AUTO_INCREMENT,
  `FAVORIS_TypeMusique` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`FAVORIS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_gallerie`
--

CREATE TABLE IF NOT EXISTS `t_gallerie` (
  `GALLERIE_ID` int(6) NOT NULL AUTO_INCREMENT,
  `EVENEMENT_ID` int(6) NOT NULL,
  `GALLERIE_Libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`GALLERIE_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_lien`
--

CREATE TABLE IF NOT EXISTS `t_lien` (
  `LIEN_ID` int(6) NOT NULL AUTO_INCREMENT,
  `EVENEMENT_ID` int(6) NOT NULL,
  `PERSONNE_ID_Organisation` int(6) NOT NULL,
  `PERSONNE_ID_Artiste` int(6) NOT NULL,
  `LIEN_Libelle` varchar(255) NOT NULL,
  `LIEN_Url` varchar(255) NOT NULL,
  PRIMARY KEY (`LIEN_ID`),
  KEY `PERSONNE_ID_1` (`PERSONNE_ID_Artiste`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`),
  KEY `PERSONNE_ID` (`PERSONNE_ID_Organisation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_lieu`
--

CREATE TABLE IF NOT EXISTS `t_lieu` (
  `LIEU_ID` int(6) NOT NULL AUTO_INCREMENT,
  `LIEU_Libelle` varchar(255) NOT NULL,
  `LIEU_Adresse` varchar(255) NOT NULL,
  `LIEU_Ville` varchar(255) DEFAULT NULL,
  `LIEU_Codepostal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LIEU_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_lieu`
--

INSERT INTO `t_lieu` (`LIEU_ID`, `LIEU_Libelle`, `LIEU_Adresse`, `LIEU_Ville`, `LIEU_Codepostal`) VALUES
(1, 'La Machine du Moulin Rouge', '90 Boulevard de Clichy', 'Paris', '75018'),
(2, 'Rex Club', '5 Boulevard Poissonnière', 'Paris', '75002'),
(3, 'Cabaret Sauvage', '211 Avenue Jean Jaurès', 'Paris', '75019'),
(4, 'Glazart', '7-15 Avenue de la Porte de la Villette', 'Paris', '75019');

-- --------------------------------------------------------

--
-- Table structure for table `t_organisation`
--

CREATE TABLE IF NOT EXISTS `t_organisation` (
  `PERSONNE_ID` int(6) NOT NULL,
  `ORGANISATION_Nomcontact` varchar(255) DEFAULT NULL,
  `PERSONNE_Pseudo` varchar(255) DEFAULT NULL,
  `PERSONNE_Nom` varchar(255) DEFAULT NULL,
  `PERSONNE_Mdp` varchar(255) DEFAULT NULL,
  `PERSONNE_TypeUser` varchar(255) DEFAULT NULL,
  `PERSONNE_Photo` varchar(255) NOT NULL,
  `PERSONNE_Mail` varchar(255) DEFAULT NULL,
  `PERSONNE_Tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_pays`
--

CREATE TABLE IF NOT EXISTS `t_pays` (
  `PAYS_ID` int(6) NOT NULL AUTO_INCREMENT,
  `PAYS_Libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`PAYS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_pays`
--

INSERT INTO `t_pays` (`PAYS_ID`, `PAYS_Libelle`) VALUES
(1, 'France'),
(2, 'Angleterre'),
(3, 'Etats Unis');

-- --------------------------------------------------------

--
-- Table structure for table `t_personne`
--

CREATE TABLE IF NOT EXISTS `t_personne` (
  `PERSONNE_ID` int(6) NOT NULL AUTO_INCREMENT,
  `PERSONNE_Pseudo` varchar(255) DEFAULT NULL,
  `PERSONNE_Nom` varchar(255) DEFAULT NULL,
  `PERSONNE_Mdp` varchar(255) DEFAULT NULL,
  `PERSONNE_TypeUser` varchar(255) DEFAULT NULL,
  `PERSONNE_Photo` varchar(255) NOT NULL,
  `PERSONNE_Mail` varchar(255) DEFAULT NULL,
  `PERSONNE_Tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_personne`
--

INSERT INTO `t_personne` (`PERSONNE_ID`, `PERSONNE_Pseudo`, `PERSONNE_Nom`, `PERSONNE_Mdp`, `PERSONNE_TypeUser`, `PERSONNE_Photo`, `PERSONNE_Mail`, `PERSONNE_Tel`) VALUES
(0, 'STROMAE', 'STROMAE', 'stromae', 'artiste', '', 'stromae@none.com', '0600000000'),
(1, 'THEOPHILUS_LONDON', 'Theophilus London', 'theophiluslondon', 'artiste', '', 'theophiluslondon@none.com', '0600000000'),
(2, 'BEAT_ASSAILANT', 'Beat Assailant', 'beatassailant', 'artiste', '', 'beatassailant@none.com', '0600000000'),
(3, 'EL_GARS', 'Laloum', 'laloum', 'utilisateur', '', 'laloumgael@none.com', '0600000000'),
(4, 'REMI_K', 'Koci', 'koci', 'utilisateur', '', 'remikoci@none.com', '0600000000'),
(5, 'JORD_C', 'Cochard', 'cochard', 'utilisateur', '', 'jodancochard@none.com', '0600000000'),
(6, 'NAAMAN', 'Naaman', 'naaman', 'artiste', '', 'naaman@none.com', '0600000000');

-- --------------------------------------------------------

--
-- Table structure for table `t_photo`
--

CREATE TABLE IF NOT EXISTS `t_photo` (
  `PHOTO_ID` int(6) NOT NULL AUTO_INCREMENT,
  `EVENEMENT_ID` int(6) NOT NULL,
  `GALLERIE_ID` int(6) NOT NULL,
  `PHOTO_Libelle` varchar(255) NOT NULL,
  `PHOTO_Url` varchar(255) NOT NULL,
  PRIMARY KEY (`PHOTO_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`),
  KEY `GALLERIE_ID` (`GALLERIE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_style`
--

CREATE TABLE IF NOT EXISTS `t_style` (
  `STYLE_ID` int(6) NOT NULL AUTO_INCREMENT,
  `STYLE_Libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`STYLE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_utilisateur`
--

CREATE TABLE IF NOT EXISTS `t_utilisateur` (
  `PERSONNE_ID` int(6) NOT NULL,
  `UTILISATEUR_Datedenaissance` date DEFAULT NULL,
  `UTILISATEUR_Adresse` varchar(255) DEFAULT NULL,
  `UTILISATEUR_Cp` varchar(255) DEFAULT NULL,
  `UTILISATEUR_Ville` varchar(255) DEFAULT NULL,
  `UTILISATEUR_Civilite` varchar(255) DEFAULT NULL,
  `UTILISATEUR_Prenom` varchar(255) DEFAULT NULL,
  `PERSONNE_Pseudo` varchar(255) DEFAULT NULL,
  `PERSONNE_Nom` varchar(255) DEFAULT NULL,
  `PERSONNE_Mdp` varchar(255) DEFAULT NULL,
  `PERSONNE_TypeUser` varchar(255) DEFAULT NULL,
  `PERSONNE_Photo` varchar(255) NOT NULL,
  `PERSONNE_Mail` varchar(255) DEFAULT NULL,
  `PERSONNE_Tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`PERSONNE_ID`, `UTILISATEUR_Datedenaissance`, `UTILISATEUR_Adresse`, `UTILISATEUR_Cp`, `UTILISATEUR_Ville`, `UTILISATEUR_Civilite`, `UTILISATEUR_Prenom`, `PERSONNE_Pseudo`, `PERSONNE_Nom`, `PERSONNE_Mdp`, `PERSONNE_TypeUser`, `PERSONNE_Photo`, `PERSONNE_Mail`, `PERSONNE_Tel`) VALUES
(3, '0000-00-00', '30 avenue de verdun', '95590', 'Presles', 'Mr', 'Gael', 'EL_GARS', 'Laloum', 'laloum', 'utilisateur', '', 'laloumgael@none.com', '0600000000'),
(4, '0000-00-00', '23 avenue de la pecherie', '95632', 'Meriel', 'Mr', 'Remi', 'REMI_K', 'Koci', 'koci', 'utilisateur', '', 'remikoci@none.com', '0600000000'),
(5, '0000-00-00', '132 Rue oberkampf', '75011', 'Paris', 'Mr', 'Jordan', 'JORD_C', 'Cochard', 'cochard', 'utilisateur', '', 'jodancochard@none.com', '0600000000');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animer`
--
ALTER TABLE `animer`
  ADD CONSTRAINT `animer_ibfk_1` FOREIGN KEY (`STYLE_ID`) REFERENCES `t_style` (`STYLE_ID`),
  ADD CONSTRAINT `animer_ibfk_2` FOREIGN KEY (`EVENEMENT_ID`) REFERENCES `t_evenement` (`EVENEMENT_ID`);

--
-- Constraints for table `assister`
--
ALTER TABLE `assister`
  ADD CONSTRAINT `assister_ibfk_1` FOREIGN KEY (`PERSONNE_ID`) REFERENCES `t_utilisateur` (`PERSONNE_ID`),
  ADD CONSTRAINT `assister_ibfk_2` FOREIGN KEY (`EVENEMENT_ID`) REFERENCES `t_evenement` (`EVENEMENT_ID`);

--
-- Constraints for table `faire`
--
ALTER TABLE `faire`
  ADD CONSTRAINT `faire_ibfk_1` FOREIGN KEY (`PERSONNE_ID`) REFERENCES `t_artiste` (`PERSONNE_ID`),
  ADD CONSTRAINT `faire_ibfk_2` FOREIGN KEY (`STYLE_ID`) REFERENCES `t_style` (`STYLE_ID`);

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_ibfk_1` FOREIGN KEY (`PERSONNE_ID`) REFERENCES `t_utilisateur` (`PERSONNE_ID`),
  ADD CONSTRAINT `like_ibfk_2` FOREIGN KEY (`FAVORIS_ID`) REFERENCES `t_favoris` (`FAVORIS_ID`);

--
-- Constraints for table `organiser`
--
ALTER TABLE `organiser`
  ADD CONSTRAINT `organiser_ibfk_1` FOREIGN KEY (`EVENEMENT_ID`) REFERENCES `t_evenement` (`EVENEMENT_ID`),
  ADD CONSTRAINT `organiser_ibfk_2` FOREIGN KEY (`PERSONNE_ID`) REFERENCES `t_organisation` (`PERSONNE_ID`);

--
-- Constraints for table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`PERSONNE_ID`) REFERENCES `t_artiste` (`PERSONNE_ID`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`EVENEMENT_ID`) REFERENCES `t_evenement` (`EVENEMENT_ID`);

--
-- Constraints for table `t_artiste`
--
ALTER TABLE `t_artiste`
  ADD CONSTRAINT `t_artiste_ibfk_1` FOREIGN KEY (`PAYS_ID`) REFERENCES `t_pays` (`PAYS_ID`),
  ADD CONSTRAINT `t_artiste_ibfk_2` FOREIGN KEY (`PERSONNE_ID`) REFERENCES `t_personne` (`PERSONNE_ID`);

--
-- Constraints for table `t_evenement`
--
ALTER TABLE `t_evenement`
  ADD CONSTRAINT `t_evenement_ibfk_1` FOREIGN KEY (`LIEU_ID`) REFERENCES `t_lieu` (`LIEU_ID`);

--
-- Constraints for table `t_gallerie`
--
ALTER TABLE `t_gallerie`
  ADD CONSTRAINT `t_gallerie_ibfk_1` FOREIGN KEY (`EVENEMENT_ID`) REFERENCES `t_evenement` (`EVENEMENT_ID`);

--
-- Constraints for table `t_lien`
--
ALTER TABLE `t_lien`
  ADD CONSTRAINT `t_lien_ibfk_1` FOREIGN KEY (`PERSONNE_ID_Artiste`) REFERENCES `t_artiste` (`PERSONNE_ID`),
  ADD CONSTRAINT `t_lien_ibfk_2` FOREIGN KEY (`EVENEMENT_ID`) REFERENCES `t_evenement` (`EVENEMENT_ID`),
  ADD CONSTRAINT `t_lien_ibfk_3` FOREIGN KEY (`PERSONNE_ID_Organisation`) REFERENCES `t_organisation` (`PERSONNE_ID`);

--
-- Constraints for table `t_organisation`
--
ALTER TABLE `t_organisation`
  ADD CONSTRAINT `t_organisation_ibfk_1` FOREIGN KEY (`PERSONNE_ID`) REFERENCES `t_personne` (`PERSONNE_ID`);

--
-- Constraints for table `t_photo`
--
ALTER TABLE `t_photo`
  ADD CONSTRAINT `t_photo_ibfk_1` FOREIGN KEY (`EVENEMENT_ID`) REFERENCES `t_evenement` (`EVENEMENT_ID`),
  ADD CONSTRAINT `t_photo_ibfk_2` FOREIGN KEY (`GALLERIE_ID`) REFERENCES `t_gallerie` (`GALLERIE_ID`);

--
-- Constraints for table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD CONSTRAINT `t_utilisateur_ibfk_1` FOREIGN KEY (`PERSONNE_ID`) REFERENCES `t_personne` (`PERSONNE_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
