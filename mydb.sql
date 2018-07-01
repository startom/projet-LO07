-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 01 juil. 2018 à 21:10
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

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
-- Structure de la table `disponibilite`
--

DROP TABLE IF EXISTS `disponibilite`;
CREATE TABLE IF NOT EXISTS `disponibilite` (
  `idNounou` int(11) NOT NULL,
  `idDispo` int(11) NOT NULL AUTO_INCREMENT,
  `d_deb` varchar(10) NOT NULL,
  `d_fin` varchar(10) NOT NULL,
  PRIMARY KEY (`idDispo`),
  KEY `idNounou` (`idNounou`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `disponibilite`
--

INSERT INTO `disponibilite` (`idNounou`, `idDispo`, `d_deb`, `d_fin`) VALUES
(17, 14, '2018-W27', '2018-W27'),
(18, 15, '2018-W27', '2018-W27'),
(18, 16, '2018-W27', '2018-W31'),
(20, 17, '2018-W27', '2018-W30'),
(19, 18, '2018-W27', '2018-W27'),
(19, 19, '2018-W27', '2018-W27'),
(19, 20, '2018-W52', '2018-W52'),
(19, 21, '2018-W48', '2018-W48'),
(19, 22, '2018-W02', '2018-W02'),
(21, 23, '2018-W23', '2018-W23'),
(21, 24, '2018-W24', '2018-W24');

-- --------------------------------------------------------

--
-- Structure de la table `enfants`
--

DROP TABLE IF EXISTS `enfants`;
CREATE TABLE IF NOT EXISTS `enfants` (
  `idEnfant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `age` int(11) NOT NULL,
  `infos` varchar(255) NOT NULL,
  `idParent` int(11) NOT NULL,
  PRIMARY KEY (`idEnfant`),
  KEY `idParent` (`idParent`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enfants`
--

INSERT INTO `enfants` (`idEnfant`, `nom`, `prenom`, `age`, `infos`, `idParent`) VALUES
(1, 'parentest', 'bob', 24, 'oui', 4),
(3, 'parentest', 'oleg', 32, 'slav', 4),
(4, 'Xd', 'xd junior', 36, 'cc', 5);

-- --------------------------------------------------------

--
-- Structure de la table `enfant_resa`
--

DROP TABLE IF EXISTS `enfant_resa`;
CREATE TABLE IF NOT EXISTS `enfant_resa` (
  `idEnfant` int(11) NOT NULL,
  `idResa` int(11) NOT NULL,
  PRIMARY KEY (`idEnfant`,`idResa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enfant_resa`
--

INSERT INTO `enfant_resa` (`idEnfant`, `idResa`) VALUES
(1, 89),
(1, 90),
(1, 91),
(1, 92),
(1, 93),
(1, 94),
(3, 89),
(3, 90),
(3, 91),
(3, 92),
(3, 93),
(3, 94);

-- --------------------------------------------------------

--
-- Structure de la table `jour_d`
--

DROP TABLE IF EXISTS `jour_d`;
CREATE TABLE IF NOT EXISTS `jour_d` (
  `idDispo` int(11) NOT NULL,
  `idJour` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(45) NOT NULL,
  `h_deb` int(11) NOT NULL,
  `h_fin` int(11) NOT NULL,
  PRIMARY KEY (`idJour`),
  KEY `idDispo` (`idDispo`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jour_d`
--

INSERT INTO `jour_d` (`idDispo`, `idJour`, `jour`, `h_deb`, `h_fin`) VALUES
(14, 64, '3', 1, 6),
(14, 65, '3', 8, 13),
(14, 66, '3', 15, 20),
(15, 67, '2', 9, 24),
(15, 68, '3', 0, 5),
(15, 69, '3', 11, 12),
(15, 70, '3', 15, 18),
(15, 71, '3', 22, 24),
(16, 72, '1', 0, 24),
(16, 73, '2', 10, 13),
(16, 74, '4', 4, 11),
(16, 75, '5', 0, 24),
(16, 76, '6', 8, 9),
(16, 77, '7', 10, 11),
(17, 78, '1', 0, 15),
(17, 79, '2', 13, 24),
(17, 80, '3', 3, 14),
(17, 81, '4', 3, 5),
(17, 82, '4', 10, 16),
(17, 83, '4', 18, 22),
(17, 84, '5', 5, 24),
(17, 85, '6', 0, 7),
(17, 86, '6', 9, 14),
(17, 87, '6', 17, 24),
(17, 88, '7', 0, 3),
(17, 89, '7', 4, 6),
(17, 90, '7', 10, 11),
(17, 91, '7', 14, 22),
(18, 92, '3', 0, 24),
(19, 93, '4', 0, 24),
(20, 94, '2', 0, 24),
(21, 95, '6', 0, 24),
(22, 96, '1', 0, 24),
(23, 97, '1', 9, 22),
(24, 98, '1', 0, 24),
(24, 99, '2', 0, 24),
(24, 100, '3', 0, 24),
(24, 101, '4', 0, 24),
(24, 102, '5', 0, 24),
(24, 103, '6', 0, 24),
(24, 104, '7', 0, 24);

-- --------------------------------------------------------

--
-- Structure de la table `jour_r`
--

DROP TABLE IF EXISTS `jour_r`;
CREATE TABLE IF NOT EXISTS `jour_r` (
  `idResa` int(11) NOT NULL,
  `idJour` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(45) NOT NULL,
  `h_deb` int(11) NOT NULL,
  `h_fin` int(11) NOT NULL,
  PRIMARY KEY (`idJour`),
  KEY `idReserv` (`idResa`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jour_r`
--

INSERT INTO `jour_r` (`idResa`, `idJour`, `jour`, `h_deb`, `h_fin`) VALUES
(91, 38, '3', 18, 20),
(90, 39, '3', 10, 14),
(89, 40, '3', 3, 5),
(92, 41, '1', 2, 12),
(93, 42, '3', 8, 10),
(94, 43, '1', 17, 22);

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
  `note` float DEFAULT '0',
  `age` int(3) NOT NULL,
  `nb_notes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idNounou`),
  KEY `idU_idx` (`idU`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nounou`
--

INSERT INTO `nounou` (`idNounou`, `revenu`, `telephone`, `idU`, `ville`, `experience`, `nom`, `prenom`, `statut`, `note`, `age`, `nb_notes`) VALUES
(14, NULL, '6587rh', 47, 'russie', 'dyjsrts', 'xdfryer', 'dghdxfgsf', 1, 0, 0, 0),
(15, NULL, 'rsehr', 48, 'oui', '', 'eryhrdst', 'sergsqerf', 1, 0, 0, 0),
(17, NULL, '06424242', 50, 'oui', 'gex', 'testbojeu', 'stpmarche', 1, 0, 25, 0),
(18, NULL, '78953498', 51, 'oui', 'amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes amdrecnes ', 'John', 'Cena', 1, 0, 256, 0),
(19, NULL, '800800800', 55, 'oui', 'rtgs', 'Sebastien', 'Patrick', 1, 4.42858, 800, 14),
(20, NULL, '685412306+', 57, 'oui', 'toutes', 'Bern', 'Stephane', 1, 0, 540, 0),
(21, NULL, '65846', 59, 'Troyes', 'rthsjkgnzlkerjztnzsrg', 'P', 'Stephanie', 1, 0, 24, 0),
(22, NULL, '96543', 60, 'Troyes', 'ehserf dyhndfnbsrtnt', 'M', 'Paula', 1, 0, 29, 0),
(23, NULL, '7985465', 61, 'Troyes', 'eryjgil dfgsdfjfyj', 'N', 'Olga', 1, 0, 26, 0),
(24, NULL, '452754273', 62, 'Troyes', 'dhyjsd r hfgjukf drfgxdg,', 'H', 'Bob', 0, 0, 24, 0),
(25, NULL, '978543549', 63, 'Troyes', 'eyrth zserhdhgy,d r hdstr,k', 'J', 'Helena', 0, 0, 23, 0),
(26, NULL, '64862185', 64, 'Citadelle', 'N7', 'Shepard', 'John', 0, 0, 34, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`idParent`, `telephone`, `nom`, `idU`, `mdp`) VALUES
(1, 68746535, 'bonjour', 52, ''),
(2, 9785213, 'cc', 53, '123456'),
(3, 6541321, 'marchestp', 54, '123456'),
(4, 856432, 'parentest', 56, 'parent'),
(5, 7960547, 'Xd', 58, 'xd');

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
(17, 'arabe'),
(17, 'espagnol'),
(17, 'francais'),
(17, 'ruski'),
(18, 'anglais'),
(18, 'ouais'),
(19, 'allemand'),
(19, 'francais'),
(19, 'zerh'),
(20, 'allemand'),
(20, 'anglais'),
(20, 'arabe'),
(20, 'chinois'),
(20, 'espagnol'),
(20, 'francais'),
(20, 'toutes'),
(21, ''),
(21, 'anglais'),
(21, 'francais'),
(22, ''),
(22, 'espagnol'),
(22, 'francais'),
(23, 'francais'),
(23, 'Russe'),
(24, ''),
(24, 'allemand'),
(24, 'anglais'),
(24, 'francais'),
(25, ''),
(25, 'anglais'),
(25, 'chinois'),
(25, 'francais'),
(26, 'anglais'),
(26, 'Quarien');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idParent` int(11) NOT NULL,
  `idNounou` int(11) NOT NULL,
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `d_deb` varchar(10) NOT NULL,
  `d_fin` varchar(10) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idReservation`),
  KEY `idParent` (`idParent`),
  KEY `idNounou` (`idNounou`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idParent`, `idNounou`, `idReservation`, `d_deb`, `d_fin`, `statut`) VALUES
(4, 18, 89, '2018-W27', '2018-W27', 0),
(4, 20, 90, '2018-W27', '2018-W27', 0),
(4, 19, 91, '2018-W27', '2018-W27', 0),
(4, 19, 92, '2018-W02', '2018-W02', 0),
(4, 20, 93, '2018-W27', '2018-W27', 0),
(4, 21, 94, '2018-W24', '2018-W24', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mdp`, `ID`, `email`, `type`) VALUES
('admin', 1, 'admin@a.a', 2),
('drhrs', 46, 'testlangue@etshqa.qsdr', 1),
('redrgz', 47, 'testlangue2@drtsert.vr', 1),
('rgkrlht,o', 48, 'testlangue3@rthsz.szrt', 1),
('oui', 50, 'dsq@fz.cz', 1),
('ehqrehr', 51, 'john@cena.wwe', 1),
('354+3', 52, 'eneffet@oui.fr', 1),
('123456', 53, 'stp@oui.fr', 1),
('123456', 54, 'stp@stp.fr', 0),
('patrick', 55, 'patrick@sebastien.fr', 1),
('parent', 56, 'parent@p.fr', 0),
('stephane', 57, 'stephane@bern.fr', 1),
('xd', 58, 'xd@xd.xd', 0),
('steph', 59, 'steph@p.fr', 1),
('paula', 60, 'paula@m.fr', 1),
('olga', 61, 'olga@n.fr', 1),
('bob', 62, 'bob@h.fr', 1),
('helena', 63, 'helena@j.fr', 1),
('normandy', 64, 'john@shepard.fr', 1);

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
-- Contraintes pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD CONSTRAINT `disponibilite_ibfk_1` FOREIGN KEY (`idNounou`) REFERENCES `nounou` (`idNounou`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enfants`
--
ALTER TABLE `enfants`
  ADD CONSTRAINT `enfants_ibfk_1` FOREIGN KEY (`idParent`) REFERENCES `parent` (`idParent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `jour_d`
--
ALTER TABLE `jour_d`
  ADD CONSTRAINT `jour_d_ibfk_1` FOREIGN KEY (`idDispo`) REFERENCES `disponibilite` (`idDispo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `jour_r`
--
ALTER TABLE `jour_r`
  ADD CONSTRAINT `jour_r_ibfk_1` FOREIGN KEY (`idResa`) REFERENCES `reservation` (`idReservation`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
