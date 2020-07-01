-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 29 juin 2020 à 13:56
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ciaracut`
--
CREATE DATABASE IF NOT EXISTS `ciaracut` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ciaracut`;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateurs` int(11) NOT NULL,
  `id_prestation` int(11) NOT NULL,
  `prixglobal` int(11) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=349 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateurs` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `datepanier` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prixtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=306 DEFAULT CHARSET=latin1;

--
-- Déclencheurs `panier`
--
DROP TRIGGER IF EXISTS `sauvegarde`;
DELIMITER $$
CREATE TRIGGER `sauvegarde` AFTER INSERT ON `panier` FOR EACH ROW INSERT INTO sauvegarde (id_utilisateurs, id_produit, datepanier, prixtotal) VALUES (NEW.id_utilisateurs, NEW.id_produit, NEW.datepanier, NEW.prixtotal)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
CREATE TABLE IF NOT EXISTS `prestation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id`, `nom`, `type`, `prix`, `id_utilisateurs`, `image`) VALUES
(1, '1 Coupe', 'Coupe homme', 18, 19, 'homme.jpg'),
(26, '2 Coupe', 'coupe courte femme', 40, 7, 'courtefemme.jpg'),
(8, '2.1 Coupe', 'mi long', 45, 7, 'milong.jpg'),
(42, 'Forfait', 'Extension cheveux', 199, 7, 'extension.jpg'),
(41, '2.2 Coupe', 'Long', 55, 7, 'long.jpg'),
(30, 'Forfait', 'MÃ¨ches', 75, 7, 'forfaitmeche.jpg'),
(28, '3 Coupe enfant', 'Enfant fille', 10, 7, 'fille.jpg'),
(27, '4 Coupe enfant', 'Enfant garcon', 12, 7, 'enfantg.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `image`, `description`) VALUES
(14, 'a', 'a', 'a'),
(12, 'S', 'S', 's');

--
-- Déclencheurs `produit`
--
DROP TRIGGER IF EXISTS `delete stock`;
DELIMITER $$
CREATE TRIGGER `delete stock` AFTER DELETE ON `produit` FOR EACH ROW DELETE FROM stock where id_produit = OLD.id
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `stock`;
DELIMITER $$
CREATE TRIGGER `stock` AFTER INSERT ON `produit` FOR EACH ROW INSERT INTO stock SET id_produit = NEW.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(92, 'mohamed', 'COUPE', '2020-06-26 13:00:00', '2020-06-26 14:00:00', 7),
(90, 'titi', 'diner', '2020-06-19 16:17:00', '2020-06-19 17:17:00', 18),
(91, 'titi', 'poisson', '2020-06-24 13:00:00', '2020-06-24 14:00:00', 18),
(88, 'mohamed', 'TRE BON THE', '2020-06-19 10:02:00', '2020-06-19 11:02:00', 18);

-- --------------------------------------------------------

--
-- Structure de la table `sauvegarde`
--

DROP TABLE IF EXISTS `sauvegarde`;
CREATE TABLE IF NOT EXISTS `sauvegarde` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateurs` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `datepanier` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prixtotal` int(11) NOT NULL,
  `mode` varchar(25) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=300 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sauvegarde`
--

INSERT INTO `sauvegarde` (`id`, `id_utilisateurs`, `id_produit`, `datepanier`, `prixtotal`, `mode`, `nom`, `prenom`) VALUES
(269, 7, 1, '2020-06-25 09:14:28', 30, 'espece', 'sam', 'sam'),
(268, 7, 8, '2020-06-25 09:08:43', 63, 'espece', 'sam', 'sam'),
(266, 7, 8, '2020-06-24 08:01:43', 85, 'espece', 'sam', 'sam'),
(265, 7, 8, '2020-06-23 13:39:51', 63, 'espece', 'sam', 'sam'),
(294, 7, 1, '2020-06-26 10:07:50', 18, 'espece', 'sam', 'sam'),
(293, 7, 26, '2020-06-26 10:03:46', 40, 'espece', 'sam', 'sam'),
(292, 20, 1, '2020-06-26 10:01:41', 18, NULL, 'sam', 'sam'),
(291, 20, 1, '2020-06-26 10:01:30', 18, NULL, 'sam', 'sam'),
(295, 7, 1, '2020-06-26 10:10:26', 18, 'espece', 'sam', 'sam'),
(296, 7, 1, '2020-06-26 10:11:16', 18, 'cheque', 'sam', 'sam'),
(297, 7, 27, '2020-06-26 10:21:25', 12, 'cheque', 'sam', 'sam'),
(298, 7, 41, '2020-06-29 08:25:49', 55, 'espece', 'titi', 'titi'),
(299, 7, 8, '2020-06-29 08:28:19', 45, 'cheque', 'thomas', 'thomas');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `quantiteproduit` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `id_produit`, `quantiteproduit`) VALUES
(6, 14, 3),
(4, 14, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `email`, `password`, `date`) VALUES
(7, 'vanessa', 'Fauvel', 'admin', 'az@tlr.com', '$2y$12$8gnFapx0ayNlwhTaNx/IhOk4fyuxZzr4ulhdJE9.39hV6BAM9FEE6', '2020-06-10'),
(18, 'titi', 'titi', 'titi', 'titi@gmail.com', '$2y$12$sjr3CoLKUKQUn/i2jp/KbeiO6az6.Ga/BTAAZQUuuJlLzoRkuYujW', '2020-06-27'),
(22, 'thoni', 'thoni', 'thoni', 'thoni@gmail.com', '$2y$12$Je9hEkV0pin6urSg.dSmbuNmDm2vOLCZW0gSmYsUsYKMboPvB6sDG', '2020-06-29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
