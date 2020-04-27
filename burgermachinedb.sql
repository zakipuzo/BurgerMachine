-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 avr. 2020 à 03:28
-- Version du serveur :  5.7.24
-- Version de PHP :  5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `burgermachinedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `burger`
--

DROP TABLE IF EXISTS `burger`;
CREATE TABLE IF NOT EXISTS `burger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NomUnique` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `burger`
--

INSERT INTO `burger` (`id`, `nom`, `description`, `img`) VALUES
(18, 'dzzd', 'dqsqsdqs', 'img/dzzdz.jpg'),
(20, 'zaeaz', '', 'img/zaeaz.png'),
(21, 'jjajajaj', '', 'img/jjajajaj.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelleunique` (`libelle`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id`, `libelle`, `type`, `stock`) VALUES
(1, 'Pain', 'simple', 14),
(2, 'salade', 'simple', 9),
(3, 'tomate', 'simple', 6),
(4, 'cheddar', 'simple', 8),
(6, 'steak', 'sauce', 9),
(7, 'lassoooos', 'sauce', 13);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

DROP TABLE IF EXISTS `recette`;
CREATE TABLE IF NOT EXISTS `recette` (
  `ref_burger` int(11) NOT NULL,
  `ref_ingredient` int(11) NOT NULL,
  `qteingredient` int(11) NOT NULL,
  PRIMARY KEY (`ref_burger`,`ref_ingredient`),
  KEY `ref_ingredient` (`ref_ingredient`),
  KEY `ref_burger` (`ref_burger`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`ref_burger`, `ref_ingredient`, `qteingredient`) VALUES
(18, 1, 3),
(18, 2, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
