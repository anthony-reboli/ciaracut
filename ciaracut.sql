-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 26 août 2020 à 10:13
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ciaracut`
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
) ENGINE=MyISAM AUTO_INCREMENT=368 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `nom`, `date`) VALUES
(58, 'hello', 'vanessa', '2020-08-24'),
(57, 'bonjour', 'vanessa', '2020-08-24');

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
) ENGINE=MyISAM AUTO_INCREMENT=322 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id`, `nom`, `type`, `prix`, `id_utilisateurs`, `image`) VALUES
(62, 'presta 5', 'toto', 30, 7, 'enfantg.jpg'),
(61, 'presta 4', 'rapide', 12, 7, 'long.jpg'),
(60, 'sasasa', 'sasasa', 30, 7, 'fille.jpg'),
(59, 'presta 2', 'friser', 12, 7, 'homme.jpg'),
(99, 'facebooks', 'facebooks', 30, 7, 'courtefemme.jpg');

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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `image`, `description`) VALUES
(33, 'coupe', 'enfant.jpg', 'dqsdqs'),
(32, 'facebook', 'fille.jpg', 'facebook'),
(34, 'extension', 'enfantg.jpg', 'Blonnde'),
(35, 'couleur\r\n', 'homme.jpg', 'Blonnde'),
(36, 'poudre', 'homme.jpg', 'Blonnde'),
(46, 'Soins', 'long.jpg', '250ml'),
(45, 'shampoing', 'enfantg.jpg', '250ml'),
(44, 'extension', 'extension.jpg', 'longueur 25 CM'),
(43, 'extension', 'enfantg.jpg', 'extension'),
(48, 'adrien', 'f8a3b06478af68722b7308809d34618f.jpg', 'adrien est fort');

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
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(98, 'lolo', 'lolo coif', '2020-08-24 09:00:00', '2020-08-24 10:00:00', 37),
(99, 'lolo', 'lolo coif', '2020-08-24 10:00:00', '2020-08-24 11:00:00', 37),
(100, 'lolo', 'lolo coif', '2020-08-24 10:00:00', '2020-08-24 11:00:00', 37);

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
) ENGINE=MyISAM AUTO_INCREMENT=316 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sauvegarde`
--

INSERT INTO `sauvegarde` (`id`, `id_utilisateurs`, `id_produit`, `datepanier`, `prixtotal`, `mode`, `nom`, `prenom`) VALUES
(315, 7, 60, '2020-08-25 13:42:35', 27, 'espece', 'test', 'test');

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
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `id_produit`, `quantiteproduit`) VALUES
(36, 44, 3),
(38, 46, 6),
(35, 43, 2),
(40, 48, 1);

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
  `tel` varchar(25) NOT NULL,
  `fiche` text,
  `datefiche` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `email`, `password`, `date`, `tel`, `fiche`, `datefiche`) VALUES
(7, 'vanessa', 'lolo', 'lolo', 'lolo@hotmail.fr', '$2y$12$g5tPklLnYD.2q9tT7VlRQOME.mH2v5ExTOnRm/aVH1ZtXg060KnL.', '2020-06-10', '0000000000', NULL, NULL),
(31, 'test', 'test', 'test', 'test13@hotmail.fr', '$2y$12$WqCzQgVouDMi.Hrtdae2NOgt3MfmRLJbvy1T34Cfv4ixMNNqvVnu2', '2020-08-25', '0605', 'belle vue', '2020-08-25'),
(32, 'FAUVEL', 'FAUVEL', 'gregory', 'gregory.fauvel@laplateforme.io', '$2y$12$Ggei1L2z2ETF.oGLQ3aAku6t5.288BkxRwDCx0EMnUiDVJ3sZ9d6.', '2020-08-07', '491445566', NULL, NULL),
(35, 'fifi', 'fifi', 'fifi', 'fifi@gamil.com', '$2y$12$5z2KDHrcWDYoabf26iDVXOK986.k78YVXybcQ/gjUjPVLCHTpP8yW', '2015-08-25', '0663033142', NULL, NULL),
(36, 'toto', 'lolo', 'lolo', 'lolo@hotmail.fr', '$2y$12$ytwljuVod0wqIjQOsTsP2..N0o/EkNbyDOKB/T5KxsYR.gpipxvWS', '2020-08-24', '0000000000', NULL, NULL),
(37, 'lolaa', 'lolo', 'lolo', 'lolo@hotmail.fr', '$2y$12$Aui9ksz2V6K5pmNlm7RrMORvhABpKzl2BAw1xk3SXnQykjNZY7xXq', '2020-08-25', '0000000000', 'jaime le chocolat', '2020-08-24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
