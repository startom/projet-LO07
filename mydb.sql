-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 18 juin 2018 à 10:08
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
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAdmin`),
  KEY `idU` (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idU`, `idAdmin`) VALUES
(1, 1),
(1, 2);

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
-- Doublure de structure pour la vue `nb_candidatures`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `nb_candidatures`;
CREATE TABLE IF NOT EXISTS `nb_candidatures` (
`nombre` bigint(21)
);

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
  `note` int(11) DEFAULT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`idNounou`),
  KEY `idU_idx` (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nounou`
--

INSERT INTO `nounou` (`idNounou`, `revenu`, `telephone`, `idU`, `ville`, `experience`, `nom`, `prenom`, `statut`, `note`, `age`) VALUES
(13, NULL, '465465', 46, 'rhrtg', 'srtjhs', 'syqser', 'srtgwdr', 0, NULL, 0),
(14, NULL, '6587rh', 47, 'russie', 'dyjsrts', 'xdfryer', 'dghdxfgsf', 1, NULL, 0),
(15, NULL, 'rsehr', 48, 'oui', '', 'eryhrdst', 'sergsqerf', 1, NULL, 0),
(16, NULL, '89+698', 49, 'oui', '', 'rtyud', 'tyhkftyj', 0, NULL, 0),
(17, NULL, '06424242', 50, 'goulag', 'gex', 'testbojeu', 'stpmarche', 0, NULL, 25),
(18, NULL, '78953498', 51, 'America', 'amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes ', 'John', 'Cena', 0, NULL, 256);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `nounous_inscrites`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `nounous_inscrites`;
CREATE TABLE IF NOT EXISTS `nounous_inscrites` (
`nombre` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `idParent` int(11) NOT NULL AUTO_INCREMENT,
  `telephone` int(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `idU` int(11) NOT NULL,
  `mdp` varchar(45) NOT NULL,
  PRIMARY KEY (`idParent`),
  KEY `idU` (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`idParent`, `telephone`, `nom`, `idU`, `mdp`) VALUES
(1, 68746535, 'bonjour', 52, ''),
(2, 9785213, 'cc', 53, '123456'),
(3, 6541321, 'marchestp', 54, '123456');

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

--
-- Déchargement des données de la table `pratiquelangue`
--

INSERT INTO `pratiquelangue` (`idN`, `langue`) VALUES
(14, 'allemand'),
(14, 'chinois'),
(14, 'francais'),
(15, 'allemand'),
(15, 'arabe'),
(15, 'espagnol'),
(15, 'francais'),
(16, 'chinois'),
(16, 'francais'),
(16, 'russe'),
(17, 'arabe'),
(17, 'espagnol'),
(17, 'francais'),
(17, 'ruski'),
(18, 'anglais'),
(18, 'ouais');

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
  `mdp` varchar(45) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mdp`, `ID`, `email`, `type`) VALUES
('admin', 1, 'admin@a.a', 2),
('drhrs', 46, 'testlangue@etshqa.qsdr', 1),
('redrgz', 47, 'testlangue2@drtsert.vr', 1),
('rgkrlht,o', 48, 'testlangue3@rthsz.szrt', 1),
('98+98+65', 49, 'testlangue54635432@rtjsthe.er', 1),
('oui', 50, 'dsq@fz.cz', 1),
('ehqrehr', 51, 'john@cena.wwe', 1),
('354+3', 52, 'eneffet@oui.fr', 1),
('123456', 53, 'stp@oui.fr', 1),
('123456', 54, 'stp@stp.fr', 0);

-- --------------------------------------------------------

--
-- Structure de la vue `nb_candidatures`
--
DROP TABLE IF EXISTS `nb_candidatures`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nb_candidatures`  AS  select `a`.`nombre` AS `nombre` from (select count(distinct `n`.`idNounou`) AS `nombre` from `nounou` `n` where (`n`.`statut` = 0)) `a` ;

-- --------------------------------------------------------

--
-- Structure de la vue `nounous_inscrites`
--
DROP TABLE IF EXISTS `nounous_inscrites`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nounous_inscrites`  AS  select `a`.`nombre` AS `nombre` from (select count(distinct `n`.`idNounou`) AS `nombre` from `nounou` `n` where (`n`.`statut` = 1)) `a` ;

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
