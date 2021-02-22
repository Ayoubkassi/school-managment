-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 jan. 2019 à 07:54
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
-- Base de données :  `carnet`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `profession` varchar(40) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_contact`),
  KEY `user` (`user`),
  KEY `id_ville` (`id_ville`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `user`, `nom`, `prenom`, `profession`, `id_ville`, `tel`, `mail`, `adresse`, `photo`) VALUES
(1, 'oumaira', 'NIDER', 'AYMANE', 'FOURNISSEUR', 2, '06785432', 'nider@gmail.com', 'Rue 274 N 50, Mimoza', '1.jpg'),
(2, 'oumaira', 'BELLA', 'LINA', 'ARCHITECTE', 3, '06453421', 'bella@gmail.com', 'Rue 234 N 34, la ville haute', '2.jpeg'),
(3, 'oumaira', 'ZIAT', 'OUSSAMA', 'INGENIEUR', 6, '06432134', 'ziat@gmail.com', 'Rue 23 N 87, Afca', '3.jpg'),
(5, 'krami', 'MADINI', 'ZHOUR', 'Professeur', 8, '0652418963', 'madini@gmail.com', 'Rue 632 N 17, les orangers', '4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `login` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`login`, `pass`, `nom`, `prenom`) VALUES
('krami', '1234', 'KRAMI', 'NISSRINE'),
('oumaira', 'azerty', 'OUMAIRA', 'ILHAM');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `lib_ville` varchar(40) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `lib_ville`) VALUES
(1, 'KENITRA'),
(2, 'CASA-BLANCA'),
(3, 'RABAT'),
(4, 'OUJDA'),
(5, 'SALE'),
(6, 'MEKNES'),
(7, 'TAZA'),
(8, 'TANGER');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
