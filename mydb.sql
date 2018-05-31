-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 31 mai 2018 à 18:03
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `idU` int(11) NOT NULL,
  KEY `idU` (`idU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `idParent` int(11) NOT NULL,
  `idNounou` int(11) NOT NULL,
  `Avis` varchar(255) NOT NULL,
  `Note` int(11) NOT NULL,
  PRIMARY KEY (`idParent`,`idNounou`),
  KEY `idNounou` (`idNounou`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilité`
--

DROP TABLE IF EXISTS `disponibilité`;
CREATE TABLE IF NOT EXISTS `disponibilité` (
  `idNounou` int(11) NOT NULL,
  `idDispo` int(11) NOT NULL AUTO_INCREMENT,
  `d_deb` date NOT NULL,
  `d_fin` date NOT NULL,
  PRIMARY KEY (`idDispo`),
  KEY `idNounou` (`idNounou`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

DROP TABLE IF EXISTS `enfants`;
CREATE TABLE IF NOT EXISTS `enfants` (
  `idEnfant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(45) NOT NULL,
  `Prenom` varchar(45) NOT NULL,
  `Age` int(11) NOT NULL,
  `Infos complementaires` varchar(255) NOT NULL,
  `idParent` int(11) NOT NULL,
  PRIMARY KEY (`idEnfant`),
  KEY `idParent` (`idParent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `jour_d`
--

DROP TABLE IF EXISTS `jour_d`;
CREATE TABLE IF NOT EXISTS `jour_d` (
  `idDispo` int(11) NOT NULL,
  `idJour` int(11) NOT NULL AUTO_INCREMENT,
  `jours` varchar(45) NOT NULL,
  `h_deb` int(11) NOT NULL,
  `h_fin` int(11) NOT NULL,
  PRIMARY KEY (`idJour`),
  KEY `idDispo` (`idDispo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `jour_r`
--

DROP TABLE IF EXISTS `jour_r`;
CREATE TABLE IF NOT EXISTS `jour_r` (
  `idReserv` int(11) NOT NULL,
  `idJour` int(11) NOT NULL AUTO_INCREMENT,
  `h_deb` int(11) NOT NULL,
  `h_fin` int(11) NOT NULL,
  `jours` varchar(45) NOT NULL,
  PRIMARY KEY (`idJour`),
  KEY `idReserv` (`idReserv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `nounou`
--

DROP TABLE IF EXISTS `nounou`;
CREATE TABLE IF NOT EXISTS `nounou` (
  `idNounou` int(11) NOT NULL AUTO_INCREMENT,
  `revenu` int(11) DEFAULT NULL,
  `telephone` varchar(45) NOT NULL,
  `idU` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idNounou`),
  KEY `idU_idx` (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nounou`
--

INSERT INTO `nounou` (`idNounou`, `revenu`, `telephone`, `idU`, `ville`, `experience`, `nom`, `prenom`, `statut`) VALUES
(2, NULL, 'qsreqer', 10, 'sjqw', 'sfthswrth', 'urkters', 'tqezrtgdrtght qzev tdebryugsdbr ydnt(jsr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `idParent` int(11) NOT NULL AUTO_INCREMENT,
  `telephone` int(45) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `idU` int(11) NOT NULL,
  PRIMARY KEY (`idParent`),
  KEY `idU` (`idU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pratiquelangue`
--

DROP TABLE IF EXISTS `pratiquelangue`;
CREATE TABLE IF NOT EXISTS `pratiquelangue` (
  `idN` int(11) NOT NULL,
  `langue` varchar(45) NOT NULL,
  PRIMARY KEY (`idN`,`langue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idParent` int(11) NOT NULL,
  `idNounou` int(11) NOT NULL,
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `d_deb` date NOT NULL,
  `d_fin` date NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idParent` (`idParent`),
  KEY `idNounou` (`idNounou`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `MDP` varchar(45) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`MDP`, `ID`, `email`, `type`) VALUES
('eqrzgqwerh', 7, 'ergzeart@ccccccc.fr', 1),
('qstegew', 8, 'jdxrgqzfZETG@QEHTKLNQZFQTH.TYJSE', 1),
('QGQERFGSTJQ', 9, 'GSRHZERGFRGH@GTKQ.ERRG', 1),
('qfrgqwz', 10, 'setyqjbgkiqer@qzerq.fr', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`idParent`) REFERENCES `parent` (`idParent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`idNounou`) REFERENCES `nounou` (`idNounou`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `disponibilité`
--
ALTER TABLE `disponibilité`
  ADD CONSTRAINT `disponibilité_ibfk_1` FOREIGN KEY (`idNounou`) REFERENCES `nounou` (`idNounou`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD CONSTRAINT `enfants_ibfk_1` FOREIGN KEY (`idParent`) REFERENCES `parent` (`idParent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `jour_d`
--
ALTER TABLE `jour_d`
  ADD CONSTRAINT `jour_d_ibfk_1` FOREIGN KEY (`idDispo`) REFERENCES `disponibilité` (`idDispo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `jour_r`
--
ALTER TABLE `jour_r`
  ADD CONSTRAINT `jour_r_ibfk_1` FOREIGN KEY (`idReserv`) REFERENCES `reservation` (`idReservation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `nounou`
--
ALTER TABLE `nounou`
  ADD CONSTRAINT `idU` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`idU`) REFERENCES `utilisateur` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `pratiquelangue`
--
ALTER TABLE `pratiquelangue`
  ADD CONSTRAINT `pratiquelangue_ibfk_1` FOREIGN KEY (`idN`) REFERENCES `nounou` (`idNounou`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idParent`) REFERENCES `parent` (`idParent`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idNounou`) REFERENCES `nounou` (`idNounou`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
