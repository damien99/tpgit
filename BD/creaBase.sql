-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 25 avr. 2019 à 15:49
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
-- Base de données :  `familles`
--

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `IdEnfant` int(11) NOT NULL,
  `NomEnf` varchar(25) DEFAULT NULL,
  `PrenomEnf` varchar(25) NOT NULL,
  `dateNaiss` date DEFAULT NULL,
  `idFamille` int(11) NOT NULL,
  PRIMARY KEY (`IdEnfant`,`idFamille`),
  KEY `FK_Enfant_idFamille` (`idFamille`),
  KEY `IdEnfant` (`IdEnfant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enfant`
--

INSERT INTO `enfant` (`IdEnfant`, `NomEnf`, `PrenomEnf`, `dateNaiss`, `idFamille`) VALUES
(1, 'Fournier', 'Louis', '2019-04-04', 2),
(1, 'Durand', 'Anthony', '2009-02-03', 3),
(2, 'Durand', 'Hélène', '2010-03-03', 3);

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

DROP TABLE IF EXISTS `famille`;
CREATE TABLE IF NOT EXISTS `famille` (
  `idFamille` int(11) NOT NULL AUTO_INCREMENT,
  `NomResp` varchar(25) NOT NULL,
  `prenomResp` varchar(25) NOT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `tel` char(14) DEFAULT NULL,
  PRIMARY KEY (`idFamille`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`idFamille`, `NomResp`, `prenomResp`, `rue`, `cp`, `ville`, `tel`) VALUES
(2, 'Fournier', 'Alain', '2 rue du parc', '45000', 'Orléans', '02.38.51.94.78'),
(3, 'Durand', 'Pierre', '3 allée des champs', '45000', 'Orléans', '02.38.22.22.22');

-- --------------------------------------------------------

--
-- Structure de la table `visite`
--

DROP TABLE IF EXISTS `visite`;
CREATE TABLE IF NOT EXISTS `visite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datev` datetime NOT NULL,
  `venu` tinyint(1) NOT NULL,
  `poids` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `IdEnfant` int(11) NOT NULL,
  `idFamille` int(11) NOT NULL,
  PRIMARY KEY (`id`,`IdEnfant`,`idFamille`),
  KEY `FK_visite_IdEnfant` (`IdEnfant`),
  KEY `FK_visite_enfant` (`idFamille`,`IdEnfant`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `visite`
--

INSERT INTO `visite` (`id`, `datev`, `venu`, `poids`, `taille`, `IdEnfant`, `idFamille`) VALUES
(1, '2019-05-07 09:10:00', 0, NULL, NULL, 1, 2),
(1, '2019-04-27 09:05:00', 0, NULL, NULL, 1, 3),
(1, '2019-05-02 17:30:00', 0, NULL, NULL, 2, 3),
(2, '2019-04-01 15:15:00', 1, 142, 55, 1, 3),
(3, '2019-02-03 16:00:00', 1, 125, 45, 1, 2),
(4, '2019-01-01 00:00:00', 0, 42, 125, 1, 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `visite`
--
ALTER TABLE `visite`
  ADD CONSTRAINT `FK_visite_enfant` FOREIGN KEY (`idFamille`,`IdEnfant`) REFERENCES `enfant` (`idFamille`, `IdEnfant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--un utilisateur créé avec des droits 
grant all privileges on familles.* to 'familles_util'@'localhost' identified by 'secret';